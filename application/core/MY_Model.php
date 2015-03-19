<?php

// ------------------------------------------------------------------------

/**
 * CodeIgniter MY_Model Class
 *
 * This class enables you perform essential custom CRUD functionality using CodeIgniter db class,
 * without writing complex queries and building query object manually
 * Just pass the parameters in correct format to the function to achieve desired functionality
 *
 * @package			CodeIgniter
 * @subpackage		Thir Party Libraries
 * @category		Libraries
 * @author			Atta-Ul-Mohsin
 * @author_email	attaulmohsin@gmail.com
*/


 class MY_Model extends CI_Model
 {
	 /*
	 * get results using where clause
	 * format of where is defined in comments of build_where function
	 */ 
	 public function get($table,$where="",$value="")
	 {
		 $result=false;
		 if(!empty($table))
		 {
			$this->build_where($where,$value);
			$result=$this->db->get($table)->result('array');
		 }
		 return $result;
	 }
	 
	 /*
	 *	function to delete record from the database table using where condtion
	 *	format of where is defined in comments of build_where function
	 */
	 public function delete($table="",$where="",$value="")
	 {
		$result=false;		 
		 if(!empty($table))
		 {
			 $where_clause=$this->build_where($where,$value);
			 if($where_clause)
			 	$result=$this->db->delete($table);
		 }
		 return $result;
	 }
	 
	 /*
	 *	updates data in table based on where condition
	 *	format of where is defined in comments of build_where function
	 */
	 public function update($table="",$data=array(),$where="",$value="")
	 {
		 $result=false;
		 if(!empty($table) && !empty($data) && !empty($where))
		 {
			 $where_clause=$this->build_where($where,$value);
			 if($where_clause)
				 if($this->db->update($table,$data))
					$result=(!empty($data['id'])?$data['id']:"true");
		 }
		 return $result;
	 }
	 
	 /*
	 * count total sresults using where clause
	 * format of where is defined in comments of build_where function
	 */ 
	 public function count($table,$where="",$value="")
	 {
		 $result=false;
		 if(!empty($table))
		 {
			 $this->build_where($where,$value);
			 $result=$this->db->count_all_results($table);
		 }
		 return $result;
	 }
	 
	 /*
	 * saves data in database (insert/update) depending upon 
	 * whether id is set as index in the associative data array passed
	 */
	 public function save($table,$data)
	 {
		 $result=false;
		 if(!empty($table))
		 {
			if(!empty($data))
			{
				if(!empty($data['id']) && ($data['id'] > 0) )
				{
					$result=$this->update($table,$data,'id',$data['id']);
				}
				else
					$result=$this->insert($table,$data);
			}
		 }
		return $result;
	 }

	 
	 // function to run custom queries and get the result.
	 // for select queries pass true as second argument to get result in array form
	 public function sql($query,$is_array)
	 {
		 $result=false;
		 if(!empty($query))
		 {
			// $query=$this->db->escape($query);
			 if(!empty($is_array))
			 	$result=$this->db->query($query)->result('array');
			 else
			 	$result=$this->db->query($query);			 	
		 }
		 return $result;
	 }
	//checks whether email already exists for some other user
	 public function uniqueLogin($table,$loginEmail,$id)
     {
		 if(!empty($table) && !empty($loginEmail))
		 {
			$loginId=trim_slashes($loginEmail);
			$this->db->where('email',$loginEmail);
			if(!empty($id)  && ($id > 0))
				$this->db->where('id !=',$id);
			if($result=$this->db->get($table,1)->result('array'))
			{
			   if(!empty($result))
					return true;
			}
		 }
        return false;
    }

	 //function for creating a new record in the database table
	 private function insert($table,$data)
	 {
		 if($this->db->insert($table,$data))
		 	return $this->db->insert_id();
		 else
		 	return false;	 
	 }

/*
	 * Both single where condition and multiple where conditions can be used
	 * For single where condition call function as build_where('id','1');
	 * For multi where conditions keep column names as array indexes	
	 * 
	 * For or_where condition follow this pattern 
     * 1-single string   $where['or_where'] = "status = 'Awarded'";
     * 2-single array    $where['or_where'] =  array("status" => "Awarded");
     * 3-multidimensional array  $where['or_where'] =  array("status"=>array("Awarded","Collected"),"country"=>array("Pakistan","UK"));
	 * 
	 *	For where in clause pass $where['where_in'] = array('first_field_to_search'=>array('first_val','2nd_val'),
	 *	'second_field_to_search'=>array('first_val','2nd_val'));
*/	 
	
	 private function build_where($where="",$value="")
	 {
		$result=true;
		if(!empty($where))
		{
			if(is_array($where))
			{
				$or_conditions="";
				if(isset($where['or_where']))
				{
					$or_conditions=$where['or_where'];
					unset($where['or_where']);
				}
				if(isset($where['where_string']))
				{ 
					foreach($where['where_string'] as $where_str)
						$this->db->where($where_str, NULL, FALSE);
					unset($where['where_string']);
				}				
				if(isset($where['where_in']))
				{
					if(is_array($where['where_in']))
					{
						foreach($where['where_in'] as $field => $where_in)
						{
							$this->db->where_in($field,$where_in);
						}
					}
					unset($where['where_in']);
				}
				
				$this->db->where($where);
				
				if(!empty($or_conditions))
				{
					if(is_array($or_conditions))
					{
						$or_clause=array();
						$or_where_str=array();
						foreach($or_conditions as $field=>$value)
						{
							if(!empty($field) && !empty($value))
							{								
								$or_where	=	"";
								if(is_array($value))
								{
									$counter=1;									
									foreach($value as $val)
										if($counter++ == 1)
											$or_where.=$field." = '".$val."'";
										else
											$or_where.=" OR ".$field." = '".$val."'";
									$or_clause[]	=	$or_where;
								}
								else if($field=='or_where_str')
								{
									$or_where_str[]	=	$value;
								}
								else 
								{
									$or_where=$field." = '".$value."'";
									$or_clause[]	=	$or_where;
								}
							}
						}
						if(!empty($or_clause))
						{
							$or_clause	=	implode(' OR ',$or_clause);
							$or_clause	=	'('.$or_clause.')';
							$this->db->where($or_clause);
						}
						if(!empty($or_where_str))
							foreach($or_where_str as $or_str)
								$this->db->or_where($or_str);
					}
					else
					{
						$or_where=$or_conditions;
						$this->db->or_where($or_where);
					}
				}
			}
			else if(!empty($value))
				$this->db->where($where,$value);
			else
				$result=false;
		}
		else
			$result=false;
		return $result;
	 }
	 //function to support ajax based dynamic pagination and search used in jquery datatables
	 public function get_paged_data_by_sql($select,$from,$where="", $join_array="",$limit=0,$offset=-1,$search_array="",$is_count="",$order_by="",$group_by="")
	 {
		 $result=false;
		 $this->db->select($select);
		 $this->db->from($from);
		 if(!empty($join_array) && is_array($join_array))
		 	$this->db->join($join_array[0],$join_array[1],$join_array[2]);
		 
		 if(!empty($where))
		 {
			 $this->build_where($where);
/*			 if(isset($where['where_string']))
			 { 
				foreach($where['where_string'] as $where_str)
					$this->db->where($where_str, NULL, FALSE);
				unset($where['where_string']);
			 }
		 	$this->db->where($where);
*/		 }
		 if(!empty($search_array) && is_array($search_array))
		 {
			 $counter=1;
 			 $like_str="( ";
			 foreach($search_array as $field=>$value)
			 {
				if(is_array($value))
				{
					foreach($value as $val)
						if($counter++ ==1)
							$like_str.=$field." LIKE '%".$val."%'";
						 else
							$like_str.= " OR ". $field." LIKE '%".$val."%'";
					 continue;
				}
				else
				{
					if($counter++ ==1)
						$like_str.=$field." LIKE '%".$value."%'";
					 else
						$like_str.= " OR ". $field." LIKE '%".$value."%'";
				}
			 }
			 $like_str.=" )";
			 $this->db->where($like_str);
		 } 
		 if(!empty($group_by))
		 	$this->db->group_by($group_by);

		 if(!empty($is_count))
		 {
			 $count=clone $this->db;
			 $count=$count->count_all_results();	
		 }

		 if(!empty($order_by))
		 	$this->db->order_by($order_by);
			
		 if(($offset > -1) && ($limit > 0))
		 {
			 $this->db->limit($limit,$offset);
		 }
		 else if($limit > 0)
		 {
			 $this->db->limit($limit);
		 }
		 $result=$this->db->get()->result('array');
		 if(!empty($count))
		 {
			 $result['total']=$count;
		 }
		 return $result;	
	 } 
	 
 }
?>