<?php
class Common_Model extends MY_Model
{
	//function for user authentication
	public function authenticate()
	{
		$response	 		 =	array();
		$response['error']	=	'1';
		$response['message']  =	'';
		$response['data']	 =	'';
		$email				=	$this->input->post('email');
		$password	 		 =	$this->input->post('password');
		$user_level		   =	$this->input->post('level');

		switch($user_level)
		{
			case '1':
					$user_level='admins';
					break;
			case '2':
					$user_level='agents';
					break;
			case '3':
					$user_level='clients';
					break;
			default:
					$user_level='0';
					break;
		}
		
		if(empty($user_level))
		{
			$response['message']	=	'Invalid Request !!! Please contact admin';
		}
		else
			$user				   =	$this->db_handler->get($user_level,array('email'=>$email));
		if(!empty($user[0]))
		{
			$user=$user[0];
			$user['password']=$this->encrypt->decode($user['password'],ENCRYPT_KEY);
			//if password don't match
			if(strcmp($user['password'],$password) != 0)
			{
				$response['message']  =	'Wrong Password';
			}
			else //if password match
			{
				$response['message']  =	' Welcome to Courier App ';
				$response['error']    =	'0';
				$session_array		=	array();
				if($user_level == 'admins')
				{
					$session_array['user_id']	   =	$user['id'];
					$session_array['last_name']     =	((isset($user['last_name']))?$user['last_name']:"");
					$session_array['first_name']    =	((isset($user['first_name']))?$user['first_name']:"");
					$session_array['status']	    =	((isset($user['status']))?$user['status']:"");
					$session_array['profile_image'] =	((isset($user['profile_image']))?$user['profile_image']:"");
					$session_array['email']		 =	((isset($user['email']))?$user['email']:"");
					$session_array['salutation']	=	((isset($user['salutation']))?$user['salutation']:"");
					$response['data']	 		   =	$session_array;
					$this->session->set_userdata('admin',$session_array);
				}
				else if($user_level == 'agents')
				{
					$session_array['user_id']	   =	$user['id'];
					$session_array['last_name']     =	((isset($user['last_name']))?$user['last_name']:"");
					$session_array['first_name']    =	((isset($user['first_name']))?$user['first_name']:"");
					$session_array['status']	    =	((isset($user['status']))?$user['status']:"");
					$session_array['profile_image'] =	((isset($user['profile_image']))?$user['profile_image']:"");
					$session_array['email']		 =	((isset($user['email']))?$user['email']:"");
					$session_array['salutation']	=	((isset($user['salutation']))?$user['salutation']:"");
					$response['data']	 		   =	$session_array;
					$this->session->set_userdata('agent',$session_array);
				}
				else if($user_level == 'clients')
				{
					$session_array['user_id']	   =	$user['id'];
					$session_array['last_name']     =	((isset($user['last_name']))?$user['last_name']:"");
					$session_array['first_name']    =	((isset($user['first_name']))?$user['first_name']:"");
					$session_array['status']	    =	((isset($user['status']))?$user['status']:"");
					$session_array['profile_image'] =	((isset($user['profile_image']))?$user['profile_image']:"");
					$session_array['email']		 =	((isset($user['email']))?$user['email']:"");
					$session_array['salutation']	=	((isset($user['salutation']))?$user['salutation']:"");
					$response['data']	 		   =	$session_array;
					$this->session->set_userdata('client',$session_array);
				}
			}
		}
		else
		{
			if(empty($response['message']))
				$response['message']  =	'Invalid Email';
		}
		$response	=	json_encode($response);
		return $response;
	}

	public function request_password()
	{
		$response	 		 =	array();
		$response['error']	=	'1';
		$response['message']  =	'';
		$response['data']	 =	'';
		$email				=	$this->input->post('email');
		$user_level		   =	$this->input->post('level');

		switch($user_level)
		{
			case '1':
				$user_level='admins';
				break;
			case '2':
				$user_level='agents';
				break;
			case '3':
				$user_level='clients';
				break;
			default:
				$user_level='0';
				break;
		}

		if(empty($user_level))
		{
			$response['message']	=	'Invalid Request !!! Please contact admin';
		}
		else
			$user				   =	$this->db_handler->get($user_level,array( 'email'=>$email ));
		if(!empty($user[0]))
		{
			$user=$user[0];
			$user['password']=$this->encrypt->decode($user['password'],ENCRYPT_KEY);

			if( $this->forgot_password_email( $user_level,$user['id'],'',$user['password'] ) ) {
				$response['message']=	' Password has been sent to your email ';
				$response['error']	=	'0';
				$response['data']	=	$user['password'];
			}
			else {
				$response['message']=	' Email sending fail ';
			}
		}
		else
		{
			if(empty($response['message']))
				$response['message']  =	'Invalid Email';
		}
		$response	=	json_encode($response);
		return $response;
	}

	public function get_notifications( $created_for , $created_for_id , $status = '1' )
	{
		$response	 		 =	array();
		$response['error']	=	'1';
		$response['message']  =	'';
		$response['data']	 =	'';

		//debug( $status , true);
		if( !empty($created_for) && !empty($created_for) )
		{
			$query="
				SELECT N.*,
					case N.created_by
						when 'AGENT' then (SELECT first_name FROM agents WHERE id=N.created_by_id)
						when 'CLIENT' then (SELECT first_name FROM clients WHERE id=N.created_by_id)
						when 'ADMIN' then N.created_by
					end as created_by_name,
					case N.created_for
						when 'AGENT' then (SELECT first_name FROM agents WHERE id=N.created_for_id)
						when 'CLIENT' then (SELECT first_name FROM clients WHERE id=N.created_for_id)
						when 'ADMIN' then N.created_for
					end as created_for_name
				FROM notifications AS N
				WHERE
				N.created_for='$created_for' and N.created_for_id=$created_for_id AND N.".$status."
			";
			//$result = $this->db_handler->get('notifications',array( 'created_for'=>$created_for , 'created_for_id' => $created_for_id , 'status' => $status ));
			//debug( $query , true );
			$result = $this->db_handler->sql($query,true);
			if( $result ) {
				$response['message']=	' All notifications ';
				$response['error']	=	'0';
				$response['data']	=	$result ;
			}
			else {
				$response['message']=	' No notifications';
			}
		}
		else {
			$response['message'] = 'Invalid Request !!! Please contact admin';
		}
		$response	=	json_encode($response);
		return $response;
	}

	public function list_data_paged($table,$search_term,$offset,$limit,$order_by,$where=array(),$del_list=false)
	{
		$select = "$table.*";
		$from="$table";
		$join_array=array();
		switch($table)
		{
			case 'agents' :	$search_cols	=	unserialize (AGENT_SEARCH_COLS);
								if(!empty($where['jobs_agents.job_id']))
								{
									$select .= ",jobs_agents.status as job_status";
									$join_array[0] =	'jobs_agents';
									$join_array[1] =	"$table.id = jobs_agents.agent_id AND jobs_agents.job_id = '".$where['jobs_agents.job_id']."'";
									if($del_list=='invitations')
										$join_array[2] =	"inner";
									else
										$join_array[2] =	"left";	
									unset($where['jobs_agents.job_id']);
								}
							  break;
			case 'clients':	$search_cols	=	unserialize (CLIENT_SEARCH_COLS);
							  break;							  
			case 'jobs'   :	$search_cols	=	unserialize (JOB_SEARCH_COLS);
								$select .= ", agents.first_name, agents.last_name, agents.email";
								$join_array[0] =	'agents';
								$join_array[1] =	"$table.agent_id = agents.id";
								$join_array[2] =	"left";	
							  break;
			default	   :
							  break;							  
		}
		//if(empty($del_list))
			//$where['where_string'][]=" $table.status != 'INACTIVE' ";
		if(!empty($search_cols) && is_array($search_cols))
		{
			foreach($search_cols as $col)
			{
				$search_array[$col]	=	$search_term;
			}
		}		
		$result=$this->get_paged_data_by_sql($select,$from,$where,$join_array,$limit,$offset,$search_array,"1",$order_by);
		return $result;
	}
	public function delete_expired_captcha()
	{
		$this->delete('captcha',array('where_string'=>array("created < (NOW() - INTERVAL ".CAPTCHA_EXPIRY_TIME." SECOND)")));
	}
	
	
	public function update_expired_jobs()
	{
		$job_update['status']		 =	'EXPIRED';
		$this->update('jobs',$job_update,array('where_string'=>array("DATE(NOW())  >= DATE_ADD(`jobs`.`post_date` , INTERVAL 28 DAY)","status = 'Waiting'")));
						
			$where['status']	= "EXPIRED";
			$expired_jobs=$this->get('jobs',$where);			
			foreach($expired_jobs as $job)
			{
				if($job['status'] 	==	'EXPIRED')
					$this->delete('jobs_agents',array('job_id'=>$job['id']));
			}
	}
	public function is_allowed($type="",$id="",$action="")
	{
		$is_allowed=FALSE;
		
		if(!empty($type) && !empty($id) && !empty($action))
		{
			switch($type)
			{
				case "agent":
								$is_allowed=$this->check_agent_actions($id,$action);
								break;
				case "client":	
								$is_allowed=$this->check_client_actions($id,$action);
								break;
				case "job":	
								$is_allowed=$this->check_job_actions($id,$action);				
								break;
				default:
								break;
			}
		}
		return $is_allowed;
	}
	private function check_agent_actions($id="",$action="")
	{
		$allowed	=	FALSE;
		switch($action)
		{
			case "block" :
			case "delete":
							$where['agent_id'] =  $id;
							$where['or_where'] =  array("status"=>array("Awarded","Collected"));	
							$allowed	   	   =  $this->get('jobs',$where);
							$allowed=(empty($allowed)?TRUE:FALSE);
							break;
			default:	
							BREAK;
		}
		return $allowed;
	}
	private function check_client_actions($id="",$action="")
	{
		$allowed	=	FALSE;
		switch($action)
		{
			case "block" :
			case "delete":
							$where['client_id'] =  $id;
							$where['or_where'] =  array("status"=>array("Awarded","Collected"));	
							$allowed	   	   =  $this->get('jobs',$where);
							$allowed=(empty($allowed)?TRUE:FALSE);
							break;
			default:	
							BREAK;
		}
		return $allowed;
	}
	private function check_job_actions($id="",$action="")
	{
		$allowed	=	FALSE;
		switch($action)
		{
			case "delete":
							$where['id']	 =  $id;
							$where['status'] =  "Waiting";	
							$allowed		 =  $this->get('jobs',$where);
							$allowed=(!empty($allowed)?TRUE:FALSE);
							break;
			case "active":
							$where['id']	 =  $id;
							$where['status'] =  "INACTIVE";	
							$allowed		 =  $this->get('jobs',$where);
							if(!empty($allowed[0]))
							{
								$allowed			  =	$allowed[0];
								$job_client		   =    array();
								$job_client['id']     =	$allowed['client_id'];
								$job_client['status'] =	"Active";
								$allowed			  =	$this->get('clients',$job_client);
								$allowed			  =	(!empty($allowed)?TRUE:FALSE);
							}
							else
								$allowed	=	FALSE;
							break;							
			default:	
							break;
		}
		return $allowed;
			
	}
	

	public function prepMsg($user_id, $template_id, $table_name) 
	{
		$selectUser = $this->db_handler->get($table_name,$where="id",$value=$user_id);
		$query = mysql_query("select * from tbl_emailsetting WHERE id='".$template_id."'");
		$email_template = mysql_fetch_assoc($query);
		$emailtemp = $email_template['description'];
		$subject = $email_template['subject'];
		foreach($selectUser[0] as $key => $val )
		{
				if($key == 'password')
				{
					$pass = $this->encrypt->decode($val,ENCRYPT_KEY);
					$new_key = "#".$key."#";
					$emailtemp = str_replace($new_key, $pass, $emailtemp);	
				}
				else
				{
				$new_key = "#".$key."#";
				$emailtemp = str_replace($new_key, $val, $emailtemp);
				}
		}
		return $subject_template = array("subject" =>$subject , "template" => $emailtemp);			
	}
	
	public function job_posting_email($user_id , $template_id) 
	{
		$this->db->select('*');
		$this->db->from('clients');
		$this->db->join('jobs', 'jobs.client_id = clients.id','inner');	
		$this->db->where("clients.id",$user_id);	
		$selectUser = $this->db->get()->result('array');
		$query = mysql_query("select * from tbl_emailsetting WHERE id='".$template_id."'");
		$email_template = mysql_fetch_assoc($query);
		$emailtemp = $email_template['description'];
		$subject = $email_template['subject'];
		$email = $selectUser[0]['email'];
		foreach($selectUser[0] as $key => $val)
		{
				
				$new_key = "#".$key."#";
				$emailtemp = str_replace($new_key, $val, $emailtemp);
				
		}
		return $subject_template = array("subject" =>$subject , "template" => $emailtemp , 'client_email'=>$email);			
	}

	public function forgot_password_email($level , $user_id , $template_id , $password)
	{
		$this->db->select('*');
		$this->db->from($level);
		//$this->db->join('jobs', 'jobs.client_id = clients.id','inner');
		$this->db->where($level.".id",$user_id);
		$selectUser = $this->db->get()->result('array');
		//$query = mysql_query("select * from tbl_emailsetting WHERE id='".$template_id."'");
		//$email_template = mysql_fetch_assoc($query);
		//$emailtemp = $email_template['description'];
		//$subject = $email_template['subject'];
		$emailtemp = 'Your password is '.$password;
		$subject = 'Password recovered';
		$email = $selectUser[0]['email'];
		//foreach($selectUser[0] as $key => $val)
		//{
		//	$new_key = "#".$key."#";
		//	$emailtemp = str_replace($new_key, $val, $emailtemp);
		//}
		//return $subject_template = array("subject" =>$subject , "template" => $emailtemp , 'client_email'=>$email);
		return send_email( $email , $subject ,$emailtemp );
	}
	public function job_assign_email($job_id , $template_id) 
	{
		//echo $job_id;
		///exit;
		$this->db->select('jobs.id AS jobId , jobs.title AS jobTitle , jobs.post_date AS jobPostDate , jobs.pickup_post_code AS jobPickup , jobs.destination_post_code AS jobDeatination , agents.id AS agentId , agents.salutation AS agentSalutation ,agents.first_name AS agentFirstName , agents.last_name AS agentLastName , agents.email AS agentEmail , agents.company_name AS agentCompany , agents.telephone AS agentTelephone , agents.mobile AS agentMobile , agents.post_code AS agentPostcode , clients.id AS clientId , clients.salutation AS clientSalutation ,clients.first_name AS clientFirstName , clients.last_name AS clientLastName , clients.email AS clientEmail , clients.telephone AS clientTelephone , clients.mobile AS clientMobile , clients.post_code AS clientPostcode');
		$this->db->from('jobs');
		$this->db->join('clients', 'clients.id = jobs.client_id','inner');
		$this->db->join('agents', 'agents.id = jobs.agent_id','inner');	
		$this->db->where("jobs.id",$job_id);	
		$selectUser = $this->db->get()->result('array');
		$query = mysql_query("select * from tbl_emailsetting WHERE id='".$template_id."'");
		$email_template = mysql_fetch_assoc($query);
		
		$emailtemp = $email_template['description'];
		$subject = $email_template['subject'];
		$agent_email = $selectUser[0]['agentEmail'];
		$client_email = $selectUser[0]['clientEmail'];
		foreach($selectUser[0] as $key => $val)
		{
				
				$new_key = "#".$key."#";
				$emailtemp = str_replace($new_key, $val, $emailtemp);
				
		}
		return $subject_template = array("subject" =>$subject , 'agent_email'=>$agent_email , 'client_email'=>$client_email , "template" => $emailtemp);			
	}
}