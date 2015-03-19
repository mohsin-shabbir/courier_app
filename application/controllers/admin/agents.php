<?php

class Agents extends MY_Controller
{
	private $image_data;
	private $thumb_data;
	public function __construct()
	{
		parent::__admin();
		$this->load->library('email');

	}
	//cases
	public function index()
	{
		$current_url=current_url();
		$list_url=$current_url.'/list_datatable';
		$this->data['list_url']=$list_url;
		$this->template->load('main','admin/agent/agent_listing',$this->data);
	}
	public function profile($agent_id="")
	{
		if(!empty($agent_id))
		{
			$update_data	=	$this->db_handler->get('agents','id',$agent_id);
			if(isset($update_data[0]))
			{
				$this->data['data']=$update_data[0];
				//$this->data['data']['password']=$this->encrypt->decode($this->data['data']['password'],ENCRYPT_KEY);
				//$this->data['data']['security_answer']=$this->encrypt->decode($this->data['data']['security_answer'],ENCRYPT_KEY);	
			}
		}
		$this->template->load('main','admin/agent/agent_detail',$this->data);
	}
	public function save($update_id="")
	{
		if(!empty($update_id))
		{
			$update_data	=	$this->db_handler->get('agents','id',$update_id);
			if(isset($update_data[0]))
			{
				$update_data	=	$update_data[0];
				if(!empty($update_data['vat_id']))
				{
					$vat_info	=	$this->db_handler->get('vat_data',array('id'=>$update_data['vat_id']));
					
					if(isset($vat_info[0]))
						$vat_info	=	$vat_info[0];
					if(!empty($vat_info))
					{	
						$update_data['company_reg_no']	=	$vat_info['company_reg_no'];
						$update_data['vat_reg_no']		=	$vat_info['vat_reg_no'];
						$update_data['vat_reg_date']	  =	$vat_info['vat_reg_date'];
						$update_data['vat_percentage']	=	$vat_info['vat_percentage'];
					}

				}
				$this->data['data']=$update_data;
				$this->data['data']['password']=$this->encrypt->decode($this->data['data']['password'],ENCRYPT_KEY);
				$this->data['data']['security_answer']=$this->encrypt->decode($this->data['data']['security_answer'],ENCRYPT_KEY);	
				$this->data['cities']	 =	$this->db_handler->get('cities',array('or_where'=>array('country'=>array('ZZ', $this->data['data']['country_code']))));
			}
		}
		else if($agent_data=$this->input->post())
		{	
			$this->form_validation->set_rules('id', 'id', 'required|trim|strip_tags|xss_clean');		
			$this->form_validation->set_rules('salutation', 'Salutation', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('company_name', 'Company Name', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('house_numberUkCode1', 'Address Line 1', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('streetUkCode1', 'Street address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('townUkCode1', 'town address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('countyUkCode1', 'country address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('longitudeUkCode1', 'Longitude', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('latitudeUkCode1', 'Latitude', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim|strip_tags|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|trim|strip_tags|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|strip_tags|xss_clean|valid_email');
			$this->form_validation->set_rules('old_profile_image', 'old profile image', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('security_question', 'Security Question', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('security_answer', 'Security Answer', 'required|trim|strip_tags|xss_clean|max_length[200]');
			$this->form_validation->set_rules('country_code', 'Country', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('experience_year', 'year', 'required|trim|strip_tags|xss_clean|integer');
			$this->form_validation->set_rules('experience_month', 'month', 'required|trim|strip_tags|xss_clean|integer');
			$this->form_validation->set_rules('old_profile_image', 'old profile image', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('preferred_cities', 'cities', 'check_cities');			
			$this->form_validation->set_rules('profile_image', 'Profile image', 'callback_upload_files');			


			$this->form_validation->set_rules('vat_registered', 'VAT Status', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('vat_id', 'VAT ID', 'trim|strip_tags|xss_clean');

			$this->form_validation->set_rules('account_title', 'Account Title', 'trim|strip_tags|xss_clean');		
			$this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|strip_tags|xss_clean');		
			$this->form_validation->set_rules('account_no', 'Account No', 'trim|strip_tags|xss_clean');		
			$this->form_validation->set_rules('branch_code', 'Branch Code', 'trim|strip_tags|xss_clean');		


			if(!empty($agent_data['country_code']) && (strcmp($agent_data['country_code'],'GB')==0))
				$this->form_validation->set_rules('addressUkCode1', 'Post Code', 'required|trim|strip_tags|xss_clean');
			else
				$this->form_validation->set_rules('addressUkCode1', 'Post Code', 'trim|strip_tags|xss_clean');


			if(!empty($agent_data['vat_registered']))
			{
				$this->form_validation->set_rules('company_reg_no', 'company regestration no', 'required|trim|strip_tags|xss_clean');
				$this->form_validation->set_rules('vat_reg_no', 'VAT registration no', 'required|trim|strip_tags|xss_clean');
				$this->form_validation->set_rules('vat_reg_date', 'VAT registration date', 'required|trim|strip_tags|xss_clean');
				$this->form_validation->set_rules('vat_percentage', 'VAT percentage', 'required|trim|strip_tags|xss_clean');							
			}

			if(isset($agent_data['id']) && $agent_data['id']=='-1')
			{
				$this->form_validation->set_rules('password', 'Password', 'required|trim|strip_tags|xss_clean|min_length[8]');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|strip_tags|xss_clean|matches[password]');
			}
			else
			{
				$this->form_validation->set_rules('password', 'Password', 'trim|strip_tags|xss_clean|min_length[8]');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|strip_tags|xss_clean|matches[password]');
			}
				
			if ($this->form_validation->run())
			{	
				if(isset($agent_data['addressUkCode1']))
				{
					$agent_data['post_code']	=	$agent_data['addressUkCode1'];
					unset($agent_data['addressUkCode1']);
				}
				if(isset($agent_data['house_numberUkCode1']))
				{
					$agent_data['address_line1']	=	$agent_data['house_numberUkCode1'];
					unset($agent_data['house_numberUkCode1']);
				}
				if(isset($agent_data['streetUkCode1']))
				{
					$agent_data['address_line2']	=	$agent_data['streetUkCode1'];
					unset($agent_data['streetUkCode1']);
				}
				if(isset($agent_data['townUkCode1']))
				{
					$agent_data['address_line3']	=	$agent_data['townUkCode1'];
					unset($agent_data['townUkCode1']);
				}
				if(isset($agent_data['countyUkCode1']))
				{
					$agent_data['address_line4']	=	$agent_data['countyUkCode1'];
					unset($agent_data['countyUkCode1']);
				}
				if(isset($agent_data['longitudeUkCode1']))
				{
					$agent_data['longitude']	=	$agent_data['longitudeUkCode1'];
					unset($agent_data['longitudeUkCode1']);
				}
				if(isset($agent_data['latitudeUkCode1']))
				{
					$agent_data['latitude']	=	$agent_data['latitudeUkCode1'];
					unset($agent_data['latitudeUkCode1']);
				}						
				if(isset($agent_data['confirm_password']))
					unset($agent_data['confirm_password']);

				if(isset($agent_data['preferred_cities']))
					$agent_data['preferred_cities']=implode('@',$agent_data['preferred_cities']);
				
				$agent_data['password']		=	$this->encrypt->encode($agent_data['password'],ENCRYPT_KEY);
				$agent_data['security_answer'] =	$this->encrypt->encode($agent_data['security_answer'],ENCRYPT_KEY);																										

				if(isset($agent_data['old_profile_image']))
				{
					$old_profile_image=$agent_data['old_profile_image'];
					unset($agent_data['old_profile_image']);
				}
			
				// VAT information saved into separate table
				if(!empty($agent_data['vat_registered']))
				{
					$vat_data=array();
					if(!empty($agent_data['vat_id']))
						$vat_data['id']			=	$agent_data['vat_id'];
					$vat_data['company_reg_no']	=	$agent_data['company_reg_no'];
					$vat_data['vat_reg_no']		=	$agent_data['vat_reg_no'];
					$vat_data['vat_reg_date']	  =	date('Y-m-d',strtotime($agent_data['vat_reg_date']));
					$vat_data['vat_percentage']	=	$agent_data['vat_percentage'];
					if($vat_id=$this->db_handler->save('vat_data',$vat_data))
						$agent_data['vat_id']  =	$vat_id;
				}
				else
				{
					if($agent_data['id']>0)
					{
						if(!empty($agent_data['vat_id']))
						{
							$this->db_handler->delete('vat_data',array('id'=>$agent_data['vat_id']));
							$agent_data['vat_id']=0;
						}
					}
				}
				unset($agent_data['vat_registered']);				
				unset($agent_data['company_reg_no']);
				unset($agent_data['vat_reg_no']);
				unset($agent_data['vat_reg_date']);
				unset($agent_data['vat_percentage']);

				$agent_data['created_by']	=	"ADMIN";
				$agent_data['updated_by']	=	"ADMIN";
				$agent_data['updater_id']	=	"1";


				/* setup image upload data*/
				$response=$this->image_data;					
				if(isset($response['profile_thumb']))
					$agent_data['profile_image']   =	$response['profile_image'];
				if(isset($response['profile_thumb']))
					$agent_data['profile_thumb']   =	$response['profile_thumb'];

				if(isset($response['image_message']))
					$image_message   = 	$response['image_message'];
				else if(isset($response['image_error']))
					$image_error   = 	$response['image_error'];

				if(isset($response['thumb_message']))
					$thumb_message		=		$response['thumb_message'];			
				else if(isset($response['thumb_error']))
					$thumb_error		  = 	$response['thumb_error'];

				/*save data to database*/
				if($insert_id=$this->db_handler->save('agents',$agent_data))
				{
					$msg = $this->db_handler->prepMsg($insert_id , '8' ,'agents');
					$subject = $msg['subject'];
					$message = $msg['template'];
					send_email($this->input->post('email') , $subject ,$message );
					$this->db_handler->create_notification("ADMIN","AGENT",$insert_id,0,"agent_created",$insert_id);

					if(!empty($old_profile_image) && !empty($agent_data['profile_image'])) 
					{
						$thumb_image = explode('.',$old_profile_image); 
						$thumb_image_ext =end($thumb_image);
						array_pop($thumb_image);
						$thumb_image	= implode('.',$thumb_image);
						$thumb_image.="_thumb.".$thumb_image_ext;
						$this->image_data=array('profile_image'=>$old_profile_image,'profile_thumb'=>$thumb_image);
						$this->delete_image();
					}

					
					if($agent_data['id']>0)
					{
						$this->session->set_flashdata('success_message','Agent updated successfully   '.(!empty($image_message)?$image_message:''). "   ".(!empty($thumb_message)?$thumb_message:''));
					}
					else
					{
						$this->session->set_flashdata('success_message','Agent created successfully   '.(!empty($image_message)?$image_message:''). "   ".(!empty($thumb_message)?$thumb_message:''));
					}
					if(!empty($image_error) || !empty($thumb_error))
						$this->session->set_flashdata('error_message','   '.(!empty($image_error)?$image_error:''). "   ".(!empty($thumb_error)?$thumb_error:''));						

					redirect('admin/agents');
				}
				else
				{
					$this->delete_image();
					if($agent_data['id'] > 0)
						$this->data['error_message']='Database Error: Agent could not be updated ';
					else
					{
						$this->data['error_message']='Database Error: Agent could not be created  ';				
					}
					$this->data['error_message'].='   '.(!empty($image_error)?$image_error:''). "   ".(!empty($thumb_error)?$thumb_error:'');						
				}
			}
			else
			{
				$this->data['error_message']='Please Enter correct information';	

				$this->delete_image();
				if($this->input->post('country_code'))
					$this->data['cities']	=	$this->db_handler->get('cities',array('or_where'=>array('country'=>array('ZZ',$this->input->post('country_code')))));
			}
		}
		$this->data['security_questions']   =	$this->db_handler->get('security_questions');
		if(empty($this->data['cities']))
			$this->data['cities']			   =	$this->db_handler->get('cities',array('or_where'=>array('country'=>array('ZZ', 'GB'))));
		$this->template->load('main','admin/agent/form',$this->data);
	}
	//check if no city is provided
	private function check_cities($data)
	{
		if ($cities=array_filter($data))
		{
			if(empty($cities))
				return false;
		}
		return true;
	}

	public function change_status($action,$id)
	{
		if(!empty($id) && !empty($action))
		{
			if(($action == "block" || $action == "delete"))
			{
				
				$allowed	   =  $this->db_handler->is_allowed("agent",$id,$action);
				if(empty($allowed))
				{
					$this->session->set_flashdata('error_message',"Could not $action agent. Agent is involved in one or more active jobs");
					redirect('admin/agents');
				}
				
			}
			$data['id']	    =	$id;
			switch($action)
			{
				case "active":
								$remove_invites=TRUE;
								$data['status']	=	'Active';
								break;
				case "block":
								$remove_invites=TRUE;
								$data['status']	=  'Blocked';
								break;
				case "delete":
								$data['status']	=	'INACTIVE';
								break;
				default:
					$this->session->set_flashdata('error','Invalid status');
					redirect('admin/agents');
			}
			if($update_id=$this->db_handler->save('agents',$data))
			{
				$invites_status=$this->db_handler->delete('jobs_agents',array('agent_id'=>$update_id));
				$this->session->set_flashdata('success_message','Status updated successfully');
			}
			else
				$this->session->set_flashdata('error_message','Status could not be updated');
		}
		else
			$this->session->set_flashdata('error_message','Invalid request!!');
		redirect('admin/agents');
	}
	
	public function list_datatable()
	{
		$return_array=array();
		$list_data=array();
		$paged_data	=	$this->input->post();
		if(isset($paged_data['sEcho']))
			$return_array['sEcho']	=	$paged_data['sEcho'];
		$where=array();
		if($job_id=$this->input->get('job'))
		{
			$where['agents.status']='Active';
			$where['jobs_agents.job_id']=$job_id;
			if(!empty($paged_data['sSearch_4']))
			{
				$cites_data			=	$this->find_city_from_postcode($paged_data['sSearch_4']);
				if(!empty($cites_data))
				{
					$where['or_where']=array();
					if(!empty($cites_data['latitude']) && !empty($cites_data['longitude']))
					{
						$where['or_where']['or_where_str'] 	  ="(agents.latitude ='".$cites_data['latitude']."' AND agents.longitude ='".$cites_data['longitude']."')";	
					}
					if(!empty($cites_data['Addresses']))
					{
						$where['or_where']['agents.preferred_cities']  =	$cites_data['Addresses'];
					}
				}
				if(empty($where['or_where']))
					$where['or_where']  = array('agents.post_code'=>$paged_data['sSearch_4']);
			}
			$job_status_str = TRUE;
		}
		else if($is_deleted=$this->input->get('deleted'))
		{
			$where['agents.status']='INACTIVE';
			$agent_deleted = TRUE;
		}
		if(!empty($paged_data['sSearch_6']))
		{
			$where['agents.status']=$paged_data['sSearch_6'];
			$agent_deleted = TRUE;
		}
		if(!empty($paged_data['sSearch_7']))
		{
			$country_code	=	$this->db_handler->get('countries',array('name'=>$paged_data['sSearch_7']));
			if(!empty($country_code[0]))
			{
				$country_code=$country_code[0];
				if(!empty($country_code['code']))
				{
					$country_code	=	$country_code['code'];
					$where['agents.country_code']=$country_code;
					$agent_deleted = TRUE;
				}
			}
		}
		if(!empty($paged_data['sSearch_0']))
		  {
		   $date_range  =  explode("~",$paged_data['sSearch_0']);
		   if(!empty($date_range[0]) && !empty($date_range[1]))
			$where['where_string'][]= " agents.created_date BETWEEN '".date('Y-m-d',strtotime($date_range[0]))."' AND DATE_ADD('".date('Y-m-d',strtotime($date_range[1]))."', INTERVAL 1 DAY)";
		  }
		$search_term  =  isset($paged_data['sSearch'])?$paged_data['sSearch']:"";
		$order_by     =  isset($paged_data['sSortDir_0'])?"id ".$paged_data['sSortDir_0']:"id desc";
		$offset	   =  isset($paged_data['iDisplayStart'])?$paged_data['iDisplayStart']:0;
		$limit		=  isset($paged_data['iDisplayLength'])?$paged_data['iDisplayLength']:LIST_PAGE_RECORDS;
		$result_set   =  $this->db_handler->list_data_paged('agents',$search_term,$offset,$limit,$order_by,$where,(!empty($agent_deleted)?TRUE:FALSE));
		if(isset($result_set['total']))
		{
			$return_array['iTotalRecords'] = $result_set['total'];
			unset($result_set['total']);
		}
		else
			$return_array['iTotalRecords'] = 0;

		if(isset($return_array['iTotalRecords']))
			$return_array['iTotalDisplayRecords'] =	isset($return_array['iTotalRecords'])?$return_array['iTotalRecords']:0;
    
		foreach($result_set as $row)
		{
			$name=(isset($row['first_name']) && isset($row['last_name']))?"<a href='".site_url('admin/agents/profile/'.$row['id'])."'>".$row['first_name']." ".$row['last_name']."</a>":"";
			$contact="Telephone (".(!empty($row['telephone'])?$row['telephone']:"");
			$contact.=") Mobile(".(!empty($row['mobile'])?$row['mobile']:"");
			$contact.=")";
			$preferred_cities=(!empty($row['preferred_cities'])?str_replace("@"," , ",$row['preferred_cities']):"");
			if(!empty($row['preferred_cities']))
			{
				$preferred_cities=str_replace('@',', ',$row['preferred_cities']);
			}
			
			$address=(!empty($row['address_line1'])?$row['address_line1']:"");
			$address.=(!empty($row['address_line2'])?" ,  ".$row['address_line2']:"");
			$address.=(!empty($row['address_line3'])?" ,  ".$row['address_line3']:"");
			$address.=(!empty($row['address_line4'])?" ,  ".$row['address_line4']:"");

			$actions_str="<p class='about'><a href='".site_url('admin/agents/save/'.$row['id'])."'><span title='Edit'>
			<img src='".site_url('application/assets/img/icons/edit.png')."'></span></a>";
			$delete_str="<a href='".site_url('admin/agents/change_status/delete/'.$row['id'])."'><span  title='Inactive'>
			<img src='".site_url('application/assets/img/icons/inactive.png')."'>
			</span></a>"; 											
											if(isset($row['status']))
												switch($row['status'])
												{
													case 'Blocked':
										
										$status_str="<span class='label label-important'>".$row['status']."</span>";
                                        $actions_str.=$delete_str."<a  href='".site_url('admin/agents/change_status/active/'.$row['id'])."'><span  title='Activate'>
										<img src='".site_url('application/assets/img/icons/active.png')."'></span></a>";
														break;
													case 'INACTIVE':
										
										$status_str="<span class='label label-important'>".$row['status']."</span>";
                                        $actions_str.="<a href='".site_url('admin/agents/change_status/active/'.$row['id'])."'><span title='Activate'>
										<img src='".site_url('application/assets/img/icons/active.png')."'></span></a>";
														break;
														
													case 'Active':
										$status_str="<span class='label label-success'>".$row['status']."</span>";
                                        $actions_str.=$delete_str."<a  href='".site_url('admin/agents/change_status/block/'.$row['id'])."'><span title='Block'>
										<img src='".site_url('application/assets/img/icons/block.png')."'></span></a>";
														break;
													case 'Pending':
										$status_str="<span class='label label-warning'>".$row['status']."</span>";
                                        $actions_str.=$delete_str."<a href='".site_url('admin/agents/change_status/block/'.$row['id'])."'><span  title='Block'>
										<img src='".site_url('application/assets/img/icons/block.png')."'></span></a>";
                                        $actions_str.="<a  href='".site_url('admin/agents/change_status/active/'.$row['id'])."'><span title='Activate'>
										<img src='".site_url('application/assets/img/icons/active.png')."'></span></a>";
														break;
													default:
															break;
												}
                                        $actions_str.="</p>";
										
			if(empty($job_status_str))
			{
										
				$list_data[]=array($row['id'],$name,$row['email'],$contact,$preferred_cities,$address,$status_str,$actions_str);
			}
			else
			{
				if(isset($row['job_status']))
					$job_status_str="<span class='label label-info invite_award' id='".$row['id']."'>".$row['job_status']."</span>";
				else
					$job_status_str="<span class='label label-important invite_award'  id='".$row['id']."'>NOT INVITED</span>";
				$list_data[]=array($row['id'],$name,$row['email'],$contact,$preferred_cities,$address,$status_str,$job_status_str);	
			}
		
		}

		
		header('Content-type: application/json');
		$return_array['aaData']	=	$list_data;
		echo json_encode($return_array);
		exit;
	}

	public function deleted()
	{
		$current_url=explode('/',current_url());
		array_pop($current_url);
		$current_url[]='list_datatable?deleted=1';
		$this->data['list_url']=implode('/',$current_url);
		$this->template->load('main','admin/agent/agent_listing',$this->data);		
	}
	public function agent_jobs($agent_id="")
	{
		$return_array  = array();
		$list_data     = array();
		if(($paged_data =	$this->input->post()) && $agent_id > 0)
		{
			if(isset($paged_data['sEcho']))
				$return_array['sEcho'] 				=	$paged_data['sEcho'];
	
			$where=array();
			$search_term  =  isset($paged_data['sSearch'])?$paged_data['sSearch']:"";
			$order_by     =  isset($paged_data['sSortDir_0'])?"id ".$paged_data['sSortDir_0']:"id desc";
			$offset	   =  isset($paged_data['iDisplayStart'])?$paged_data['iDisplayStart']:0;
			$limit		=  isset($paged_data['iDisplayLength'])?$paged_data['iDisplayLength']:LIST_PAGE_RECORDS;
			$job_invitations	=	$this->db_handler-> get_paged_data_by_sql('job_id',"jobs_agents",array('agent_id'=>$agent_id),"","","","","","","job_id");
			
			if(!empty($job_invitations) && is_array($job_invitations))
			{
				$temp=array();
				foreach($job_invitations as $invitation)
				{
					$temp[]=$invitation['job_id'];
				}
				$job_invitations		= 	$temp;
				$where['or_where']	  =	array('jobs.id'=>$job_invitations,'jobs.agent_id' => $agent_id);
			}
			else
				$where['jobs.agent_id']	=	$agent_id;
			if(!empty($paged_data['sSearch_3']))
			{
				$where['jobs.status']=$paged_data['sSearch_3'];
			}
			
			$result_set   =  $this->db_handler->list_data_paged('jobs',$search_term,$offset,$limit,$order_by,$where,TRUE);
			$status_str;
			if(isset($result_set['total']))
			{
				$return_array['iTotalRecords'] = $result_set['total'];
				unset($result_set['total']);
			}
			else
				$return_array['iTotalRecords'] = 0;

			if(isset($return_array['iTotalRecords']))
				$return_array['iTotalDisplayRecords'] =	isset($return_array['iTotalRecords'])?$return_array['iTotalRecords']:0;
	
		
			foreach($result_set as $row)
			{
				$name_email=(isset($row['first_name']) && isset($row['last_name']))?$row['first_name']." ".$row['last_name']:"";
				$name_email.=(isset($row['email'])?"( ".$row['email']." )":"");
				$title=(isset($row['title']))?$row['title']:"";
				$job_status=(isset($row['status']))?$row['status']:"";
					
				$destination_address=(isset($row['destination_address_line1']))?$row['destination_address_line1']:"";
				$destination_address.=", ".(isset($row['destination_address_line2']))?$row['destination_address_line2']:"";
				$destination_address.=", ".(isset($row['destination_address_line3']))?$row['destination_address_line3']:"";
				$destination_address.=", ".(isset($row['destination_address_line4']))?$row['destination_address_line4']:"";
					
				if(isset($row['status']))
					switch($row['status'])
					{
						case 'Waiting':
									$status_str="<span class='label label-warning'>".$row['status']."</span>";
									break;
						case 'Awarded':
									$status_str="<span class='label label-success'>".$row['status']."</span>";
									break;
						case 'Collected':
									$status_str="<span class='label label-success'>".$row['status']."</span>";
									break;
						case 'Completed':
									$status_str="<span class='label label-success'>".$row['status']."</span>";
									break;
						case 'INACTIVE':
									$status_str="<span class='label label-inverse'>".$row['status']."</span>";
									break;
						case 'EXPIRED':
									$status_str="<span class='label label-important'>".$row['status']."</span>";
									break;
									
						default:
									break;

					}
					$list_data[]=array($title, $destination_address, $name_email, $status_str);
				}
			}
			header('Content-type: application/json');
			$return_array['aaData']	=	$list_data;
			echo json_encode($return_array);
			exit;
	}
	
	private function delete_image()
	{
		$image_data=$this->image_data;
		$response		=	array();
		$response['error']	  =2;
		$response['image_delete_error']=1;
		$response['thumb_delete_error']=1;
		if(!empty($image_data['profile_image']))
		{
			if(file_exists(AGENT_IMAGE_PATH .$image_data['profile_image']))
			{
				if(unlink(AGENT_IMAGE_PATH .$image_data['profile_image']))
				{
					$response['image_delete_error']=0;
					$response['error']--;
				}
			}
		}
		if(!empty($image_data['profile_thumb']))
		{
			if(file_exists(AGENT_THUMB_PATH .$image_data['profile_thumb']))
			{
				if(unlink(AGENT_THUMB_PATH .$image_data['profile_thumb']))
				{
					$response['error']--;
					$response['thumb_delete_error']=0;
				}
			}
		}
		$this->image_data="";
		return $response;
	}
	
	public function upload_files($img_data="")
	{

		$admin=$this->session->userdata('admin');
		$user_id							  =	(!empty($admin['user_id'])?$admin['user_id']:1);
		$return_data						  =	array();
		$return_data['image_message']		 =	"";
		$return_data['thumb_message']		 =	"";
		$return_data['thumb_error']		   =	'No thumb created';
		$return_data['image_error']		   =	'No Image Uploaded';
		$return_data['error']	  			 =	'0';
	
		if(isset($_FILES['profile_image']['name']) && !empty($_FILES['profile_image']['name']) && !empty($user_id))
		{
			$return_data['profile_image'] 		 =	"";
			$return_data['profile_thumb']		 =	"";		
			$return_data['error']	  			 =	'1';
			$file_ext=explode('.',$_FILES['profile_image']['name']);
			$file_ext=isset($file_ext[count($file_ext)-1])?$file_ext[count($file_ext)-1]:"";
			if(!empty($file_ext))
			{
				if (!is_dir(AGENT_IMAGE_PATH)) 
					mkdir(AGENT_IMAGE_PATH, 0777, TRUE);
				$config=array();
				$config['upload_path']		= 	AGENT_IMAGE_PATH;
				$config['allowed_types']	  =    AGENT_IMAGE_TYPE;
				$config['max_size']		   =    AGENT_IMAGE_SIZE ;
						
				$config['file_name']	= $user_id."_".md5(time());
				
				$this->load->library('upload', $config);
			
				if (!$this->upload->do_upload('profile_image'))
				{
					$response['image_error']   = 	$this->upload->display_errors();
				}
				else
				{
					$response		  			= 	(array)$this->upload->data();
					$response['profile_thumb']   =	$response['raw_name'].'_thumb'.$response['file_ext'];
					$this->make_thumb($response['file_name']);
				}
				 //success case
				if(isset($response['file_name']) && isset($response['file_ext']))
				{
					$return_data['image_message']	 =	'Image Uploaded';
					$return_data['profile_image']	 =	$response['file_name'];
					$return_data['image_error']	   =	'';
					$return_data['error']	   		 =	0;
					
					if(!empty($this->thumb_data))
					{
						$thumb_response		       =	$this->thumb_data;	
						if(!empty($thumb_response['thumb_error']))
							$return_data['thumb_error']		  =	$thumb_response['thumb_error'];
							
						else if(!empty($thumb_response['thumb_message']) && !empty($response['profile_thumb']))
						{
							$return_data['thumb_error']	  =	'';
							$return_data['thumb_message']	=	$thumb_response['thumb_message'];
							$return_data['profile_thumb']	=	$response['profile_thumb'];
						}
					}
				}//error messages returned by codeigniter library
				else if(isset($response['image_error']))
					$return_data['image_error'] =	$response['image_error'];
				else // some unknowon error
					$return_data['image_error'] =	"some error in image uploading.";
			}
			else
				$return_data['image_error'] ="file type not recognized.";

			$this->image_data=$return_data;
			if(!empty($return_data['image_error']))
				$this->form_validation->set_message('upload_files', $return_data['image_error']);
			return (!empty($return_data['profile_image'])?TRUE:FALSE);
		}
		$this->image_data=$return_data;
		return TRUE;
	}
	private function make_thumb($image_name)
	{			
		if(!empty($image_name))
		{
			$this->load->library('image_lib');
						
			$config['image_library'] 		 =    'gd2';			
			$config['width']				 =	AGENT_THUMB_WIDTH;
			$config['height']				=	AGENT_THUMB_HEIGHT;
			$config['new_image']			 =	AGENT_THUMB_PATH;
			$config['source_image']		  = 	AGENT_IMAGE_PATH.$image_name;
			$config['create_thumb']		  =	TRUE;
			$config['maintain_ratio']		=	FALSE ;
			
			$this->image_lib->initialize($config); 
			
			if (!$this->image_lib->resize())
			{ 
				$return_data['thumb_error']	=	$this->image_lib->display_errors();
			}				
			else
			{
				$return_data['thumb_message']	=	'thumb created successfully';	
			}
			$this->image_lib->clear();
		}
		$this->thumb_data=$return_data;
		if(empty($return_data['thumb_error']))
			return TRUE;
		return FALSE;
	}
}