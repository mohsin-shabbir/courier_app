<?php
 class MY_Model extends CI_Model
 {
	 /*
	 * get results using custom where clause
	 * Both single where condition and multiple where conditions can be used
	 * For multi where conditions keep column names as array indexes	
	 * 
	 *	For or_where condition follow this pattern 
     * 1-single string   $where['or_where'] = "status = 'Awarded'";
     * 2-single array    $where['or_where'] =  array("status" => "Awarded");
     * 3-multidimensional array  $where['or_where'] =  array("status"=>array("Awarded","Collected"),"country"=>array("Pakistan","UK"));
	 * 
	 *	For where in clause pass $where['where_in'] = array('first_field_to_search'=>array('first_val','2nd_val'),
	 *	'second_field_to_search'=>array('first_val','2nd_val'));
	 */ 
	 public function get($table,$where="",$value="")
	 {
		 $result=false;
		 if(!empty($table))
		 {
			if(!empty($where))
			{
				if(is_array($where))
				{
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
					if(!empty($where['or_where']))
					{
						$or_conditions=$where['or_where'];
						unset($where['or_where']);
						$this->db->where($where);
						if(is_array($or_conditions))
						{
							foreach($or_conditions as $field=>$value)
							{
								if(is_array($value))
								{
									$or_where="( ";
									$counter=1;									
									foreach($value as $val)
										if($counter++ == 1)
											$or_where.=$field." = '".$val."'";
										else
											$or_where.=" OR ".$field." = '".$val."'";
									 $or_where.=" )";
									$this->db->where($or_where);
								}
								else
								{
									$or_where=$field." = '".$value."'";
									$this->db->or_where($or_where);
								}
								
							}
						}
						else
						{
							$or_where=$or_conditions;
							$this->db->or_where($or_where);
						}
					}
					else
			 			$this->db->where($where);
						
				}
				else if(!empty($value))
			 		$this->db->where($where,$value);
			}
			$result=$this->db->get($table)->result('array');
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
					$result=$this->update($table,$data);
				}
				else
					$result=$this->insert($table,$data);
			}
		 }
		return $result;
	 }
	 
	 //function for updating an existing record in the database table
	 private function update($table,$data)
	 {
		 $this->db->where('id',$data['id']);
		 if($this->db->update($table,$data))
		 	return $data['id'];
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
	 
	 //function to delete record from the database table using id field
	 public function delete($table,$id="")
	 {
		$result=false;		 
		 if(!empty($table) && !empty($id))
		 {
			$this->db->where('id',$id);
			$result=$this->db->delete($table);
		 }
		 return $result;
	 }
	
	 //function to delete record from the database table using where condtion
	 public function delete_where($table="",$where=array())
	 {
		$result=false;		 
		 if(!empty($table) && !empty($where))
		 {
			$this->db->where($where);
			$result=$this->db->delete($table);
		 }
		 return $result;
	 }
	 
	 //updates data in table based on where condition
	 public function update($table="",$data=array(),$where=array())
	 {
		 $result=FALSE;
		 if(!empty($table) && !empty($data) && !empty($where))
		 {
			 foreach($where as $where_clause)
			 {
				$this->db->where($where_clause);
			 }
			 $result=$this->db->update($table,$data);
		 }
		 return $result;
	 }
	 private function build_where($where="",$value="")
	 {
		if(!empty($where))
		{
			if(is_array($where))
			{
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
				if(!empty($where['or_where']))
				{
					$or_conditions=$where['or_where'];
					unset($where['or_where']);
					$this->db->where($where);
					if(is_array($or_conditions))
					{
						foreach($or_conditions as $field=>$value)
						{
							if(is_array($value))
							{
								$or_where="( ";
								$counter=1;									
								foreach($value as $val)
									if($counter++ == 1)
										$or_where.=$field." = '".$val."'";
									else
										$or_where.=" OR ".$field." = '".$val."'";
								$or_where.=" )";
								$this->db->where($or_where);
							}
							else
							{
								$or_where=$field." = '".$value."'";
								$this->db->or_where($or_where);
							}
								
						}
					}
					else
					{
						$or_where=$or_conditions;
						$this->db->or_where($or_where);
					}
				}
				else
			 		$this->db->where($where);
						
			}
			else if(!empty($value))
				$this->db->where($where,$value);
		}
		 
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
			 if(isset($where['where_string']))
			 { 
				foreach($where['where_string'] as $where_str)
					$this->db->where($where_str, NULL, FALSE);
				unset($where['where_string']);
			 }
		 	$this->db->where($where);
		 }
		 if(!empty($search_array) && is_array($search_array))
		 {
			 $counter=1;
 			 $like_str="( ";
			 foreach($search_array as $field=>$value)
			 {
				if($counter++ ==1)
					$like_str.=$field." LIKE '%".$value."%'";
				 else
				 	$like_str.= " OR ". $field." LIKE '%".$value."%'";
			 }
			 $like_str.=" )";
			 $this->db->where($like_str);
		 } 
		 if(!empty($is_count))
		 {
			 $count=clone $this->db;
			 $count=$count->count_all_results();	
		 }
		 if(!empty($group_by))
		 	$this->db->group_by($group_by);

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
	 
	 public function count_where($table,$where)
	 {
	 }
 }
?>