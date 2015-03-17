<?php
class Jobs extends MY_Controller
{
	public function __construct()
	{
		parent::__admin();
		$this->load->library('email');
		$this->load->model("common_model");
	}
	//cases
	public function index()
	{
		$current_url=current_url();
		$list_url=$current_url.'/list_datatable';
		$this->data['list_url']=$list_url;
		$this->template->load('main','admin/job/job_listing',$this->data);
		
	}

	public function save($update_id="")
	{
		if(!empty($update_id))
		{
			$update_data	=	$this->db_handler->get('jobs','id',$update_id);
			if(isset($update_data[0]))
				$this->data['data']=$update_data[0];
		}
		else if($job_data=$this->input->post())
		{	
			
			$this->form_validation->set_rules('weight_type', 'Weight type', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('client_id', 'Client', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('title', 'Title', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('post_date', 'Expected Date', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('description', 'Description', 'required|trim|strip_tags|xss_clean');			

			$this->form_validation->set_rules('addressUkCode1', 'Pick Up Post Code', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('house_numberUkCode1', 'Address', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('streetUkCode1', 'Street address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('townUkCode1', 'Town address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('countyUkCode1', 'Country address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('longitudeUkCode1', 'Longitude', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('latitudeUkCode1', 'Latitude', 'required|trim|strip_tags|xss_clean');

			$this->form_validation->set_rules('addressUkCode2', 'Destination Up Post Code', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('house_numberUkCode2', 'Address', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('streetUkCode2', 'Street address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('townUkCode2', 'Town address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('countyUkCode2', 'Country address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('longitudeUkCode2', 'Longitude', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('latitudeUkCode2', 'Latitude', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('job_action', 'Action', 'required');
			$this->form_validation->set_rules('status', 'status', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('id', 'Id', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('created_date', 'Created Date', 'required|trim|strip_tags|xss_clean');

			if ($this->form_validation->run())
			{	
				$job_action="Waiting";
				if(isset($job_data['addressUkCode1']))
				{
					$job_data['pickup_post_code']	=	$job_data['addressUkCode1'];
					unset($job_data['addressUkCode1']);
				}
				if(isset($job_data['house_numberUkCode1']))
				{
					$job_data['pickup_address_line1']	=	$job_data['house_numberUkCode1'];
					unset($job_data['house_numberUkCode1']);
				}
				if(isset($job_data['streetUkCode1']))
				{
					$job_data['pickup_address_line2']	=	$job_data['streetUkCode1'];
					unset($job_data['streetUkCode1']);
				}
				if(isset($job_data['townUkCode1']))
				{
					$job_data['pickup_address_line3']	=	$job_data['townUkCode1'];
					unset($job_data['townUkCode1']);
				}
				if(isset($job_data['countyUkCode1']))
				{
					$job_data['pickup_address_line4']	=	$job_data['countyUkCode1'];
					unset($job_data['countyUkCode1']);
				}
				if(isset($job_data['longitudeUkCode1']))
				{
					$job_data['pickup_longitude']	=	$job_data['longitudeUkCode1'];
					unset($job_data['longitudeUkCode1']);
				}
				if(isset($job_data['latitudeUkCode1']))
				{
					$job_data['pickup_latitude']	=	$job_data['latitudeUkCode1'];
					unset($job_data['latitudeUkCode1']);
				}						
				

				if(isset($job_data['addressUkCode2']))
				{
					$job_data['destination_post_code']	=	$job_data['addressUkCode2'];
					unset($job_data['addressUkCode2']);
				}
				if(isset($job_data['house_numberUkCode2']))
				{
					$job_data['destination_address_line1']	=	$job_data['house_numberUkCode2'];
					unset($job_data['house_numberUkCode2']);
				}
				if(isset($job_data['streetUkCode2']))
				{
					$job_data['destination_address_line2']	=	$job_data['streetUkCode2'];
					unset($job_data['streetUkCode2']);
				}
				if(isset($job_data['townUkCode2']))
				{
					$job_data['destination_address_line3']	=	$job_data['townUkCode2'];
					unset($job_data['townUkCode2']);
				}
				if(isset($job_data['countyUkCode2']))
				{
					$job_data['destination_address_line4']	=	$job_data['countyUkCode2'];
					unset($job_data['countyUkCode2']);
				}
				if(isset($job_data['longitudeUkCode2']))
				{
					$job_data['destination_longitude']	=	$job_data['longitudeUkCode2'];
					unset($job_data['longitudeUkCode2']);
				}
				if(isset($job_data['latitudeUkCode2']))
				{
					$job_data['destination_latitude']	=	$job_data['latitudeUkCode2'];
					unset($job_data['latitudeUkCode2']);
				}				

				if(isset($job_data['post_date']))
				{
					$job_data['post_date']	=	date('Y-m-d',strtotime($job_data['post_date']));
				}				
				if(isset($job_data['job_action']))
				{
					$job_action=$job_data['job_action'];
					unset($job_data['job_action']);
				}
				$agent_data['created_by']	=	"ADMIN";
				$agent_data['updated_by']	=	"ADMIN";
				$agent_data['updater_id']	=	"1";
				
					
				if($insert_id=$this->db_handler->save('jobs',$job_data))
				{
					$msg = $this->common_model->job_posting_email($insert_id,17);
					$subject = $msg['subject'];
					$message = $msg['template'];
					$email = $msg['client_email'];
					send_email($email , $subject ,$message );
					/*$this->email->clear();
					$this->email->to($email);
					$this->email->from(REGISTRATION_FROM_EMAIL,FROM_NAME);
					$this->email->cc(REGISTRATION_CC);
					$this->email->bcc(REGISTRATION_BCC);
					$this->email->reply_to(REGISTRATION_REPLY_TO);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();*/
					if($job_data['id'] > 0)
					{
						$this->session->set_flashdata('success_message','Job updated successfully');
					}
					else
					{
						$this->session->set_flashdata('success_message','Job created successfully');
					}
					switch($job_action)
					{
						case  	"Awarded":
										  redirect('admin/jobs/award/'.$insert_id);
											break;
						case	"Invited":
										  redirect('admin/jobs/invite/'.$insert_id);
											break;
						default:
											break;
					}
					redirect('admin/jobs');
				}
				else
				{
					if($job_data['id'] > 0)
						$this->data['error_message']='Database Error: Job could not be updated ';
					else
					{
						$this->data['error_message']='Database Error: Job could not be created';				
					}
				}
			}
			else
			{
				$this->data['error_message']='Please Enter correct information';	
			}
		}	
		$this->data['clients']=$this->db_handler->get('clients','status','Active');
		$this->template->load('main','admin/job/form',$this->data);	
	}
	
	public function deleted()
	{
		$current_url=explode('/',current_url());
		array_pop($current_url);
		$current_url[]='list_datatable?deleted=1';
		$this->data['list_url']=implode('/',$current_url);
		$this->template->load('main','admin/job/job_listing',$this->data);		
	}
	
	public function change_status($action,$id)
	{	
		if(!empty($id) && !empty($action))
		{
			if($action == "delete" || $action == "active")
			{
				$allowed	   =  $this->db_handler->is_allowed("job",$id,$action);
				if(empty($allowed))
				{
					$this->session->set_flashdata('error_message',"Could not $action job.".($action=='active'?"client is not active":""));
					redirect('admin/jobs');
				}
				
			}
			$data['id']	=	$id;
			switch($action)
			{
				case "active":
								$data['status']	=	'Waiting';
								break;
				case "delete":
								$remove_invites	=	TRUE;
								$data['status']	=	'INACTIVE';
								break;
				default:
								$this->session->set_flashdata('error','Invalid status');
								redirect('admin/jobs');
			}
			if($update_id=$this->db_handler->save('jobs',$data))
			{
				if(!empty($remove_invites))
					$invites_status=$this->db_handler->delete('jobs_agents',array('job_id'=>$update_id));
				$this->session->set_flashdata('success_message','Status updated');
			}
			else
				$this->session->set_flashdata('error_message','Status could not be updated');
		}
		else
			$this->session->set_flashdata('error_message','Invalid request!!');
			
		redirect('admin/jobs');
	}
	public function clear_payment($job_id="")
	{  
		if($this->input->post())
		{	
			$job_id	= $this->input->post('job_id');
			$job=$this->db_handler->get('jobs',array('id'=>$job_id));
			if(!empty($job[0]))
				$job=$job[0];
			$client=$this->db_handler->get('clients',array('id'=>$job['client_id']));
			if(!empty($client[0]))
				$client=$client[0];
					
			if(!empty($job) && !empty($client))
			{
				$firstName		   		   = $client['first_name'];
				$lastName					= $client['last_name'];			
				$paymentType		 		 = urlencode('Sale');
				$creditCardType	 	 	  = urlencode($this->input->post('customer_credit_card_type'));
				$creditCardNumber			= urlencode($this->input->post('customer_credit_card_number'));			
				$expDateMonth				= $this->input->post('cc_expiration_month');
				$padDateMonth				= urlencode(str_pad($expDateMonth, 2, '0', STR_PAD_LEFT));
			//	$ref_id			  			 = urlencode($this->input->post('ref_id'));
				$expDateYear				 = urlencode($this->input->post('cc_expiration_year'));
				$cvv2Number				  = urlencode($this->input->post('cc_cvv2_number'));
				$address1					= urlencode($client['address_line1']);
				$address2					= urlencode($client['address_line2']);
				$city						= urlencode($client['address_line3']);
				$state			   		   = urlencode($client['address_line4']);
				$zip				 		 = '';
				$country			 		 = urlencode($this->input->post('customer_country'));				// US or other valid country code
				$amount			  		  = urlencode($this->input->post('payment_amuont'));
				$CURRENCY_ID = 'GBP';
				
				$this->load->library('Paypal_Caller','paypal_caller');
			//	$ref_id			  = urlencode($this->input->post('ref_id'));	
		/*	$nvpStr =	"&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber".
			"&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName".
			"&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=GBP";*/
			
				$nvpStr	= "&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber".
						"&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName".
					"&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$CURRENCY_ID";
				
				//debug($nvpStr,true);
				$httpParsedResponseAr= $this->paypal_caller->hash_call("DoDirectPayment",$nvpStr);
				/*echo '<pre>';
				print_r($httpParsedResponseAr);
				echo '</pre>';
				debug($httpParsedResponseAr,true);
				exit;*/
				if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
				{
					$job_id				  =		$this->input->post('job_id');
					$mc_gross				=		$httpParsedResponseAr["AMT"];
					$txn_id				  =		$httpParsedResponseAr["TRANSACTIONID"];
					$payment_status	      =		$httpParsedResponseAr["ACK"];
					
					
					$where			 	   =		array();
					$where['totalamount'] 	= 		$mc_gross;
					$where['job_id']	 	 =  		$job_id;
					$result 				  =		$this->db_handler->get_paged_data_by_sql("tbl_payment.totalamount","tbl_payment",$where);
					if (!empty($result))
					{
						//job status changed to collected
						$updateJob["id"]     = 		$job_id;
						$updateJob["status"] = 		"Collected";
						$job_updated		 =		$this->db_handler->save('jobs',$updateJob);
	
						//payment table updated
						$where				 =		array();
						$where['paymethod']	= 		'Credit Card';
						$where['paypal_notes'] =  		'';
						$where['transactionid']=  		$txn_id;
						$where['staus']		=  		$payment_status;
						$result				=		$this->db_handler->update('tbl_payment',$where,array("job_id"=>$job_id));
							  //////?invoice='.$booking_id;
						 $this->session->set_flashdata('success_message','Payment cleared regarding job');
						exit;
				 }	
				} 
				
				else  
				{
					 $this->session->set_flashdata('error_message','Payment could not be cleared regarding job '.$httpParsedResponseAr["ACK"]);
					 //$_SESSION["paypalmsg"]=$httpParsedResponseAr["ACK"];
				}
			}
			else
			{
				$this->session->set_flashdata('error_message','Job OR Client not found in the system');
			}
			redirect('admin/jobs');
		}
		if(empty($job_id))
		{
			$this->session->set_flashdata('error_message','Invalid Request');
			redirect('admin/jobs');
		}

		$this->data['countries']			=	$this->db_handler->get('countries');
		$this->data['job_id']			   =	$job_id;
		$this->template->load('main','admin/job/payment_form',$this->data);
	}
	public function list_datatable()
	{
		$return_array  = array();
		$list_data     = array();
		if($paged_data =	$this->input->post())
		{
			if(isset($paged_data['sEcho']))
				$return_array['sEcho'] 				=	$paged_data['sEcho'];
	
			$where=array();
			$search_term  =  isset($paged_data['sSearch'])?$paged_data['sSearch']:"";
			$order_by     =  isset($paged_data['sSortDir_0'])?"id ".$paged_data['sSortDir_0']:"id desc";
			$offset	   =  isset($paged_data['iDisplayStart'])?$paged_data['iDisplayStart']:0;
			$limit		=  isset($paged_data['iDisplayLength'])?$paged_data['iDisplayLength']:LIST_PAGE_RECORDS;
		
			if($is_deleted=$this->input->get('deleted'))
			{
				$where['jobs.status']='INACTIVE';
				$job_deleted = TRUE;
			}		
			$result_set   =  $this->db_handler->list_data_paged('jobs',$search_term,$offset,$limit,$order_by,$where,(!empty($job_deleted)?TRUE:FALSE));
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
				//$title=(isset($row['title']))?$row['title']:"";
				$title=(isset($row['title']))?"<a href='".site_url('admin/jobs/save/'.$row['id'])."'>".$row['title']."</a>":"";
				
				$expected_date=(isset($row['post_date'])?date('d-m-Y',strtotime($row['post_date'])):"");
				$job_status=(isset($row['status']))?$row['status']:"";
					
				$pickup_address=(isset($row['pickup_address_line1']))?$row['pickup_address_line1']:"";
				$pickup_address.=", ".(isset($row['pickup_address_line2']))?$row['pickup_address_line2']:"";
				$pickup_address.=", ".(isset($row['pickup_address_line3']))?$row['pickup_address_line3']:"";
				$pickup_address.=", ".(isset($row['pickup_address_line4']))?$row['pickup_address_line4']:"";
					
				$destination_address=(isset($row['destination_address_line1']))?$row['destination_address_line1']:"";
				$destination_address.=", ".(isset($row['destination_address_line2']))?$row['destination_address_line2']:"";
				$destination_address.=", ".(isset($row['destination_address_line3']))?$row['destination_address_line3']:"";
				$destination_address.=", ".(isset($row['destination_address_line4']))?$row['destination_address_line4']:"";
					
	$actions_str="<p class='about'><a href='".site_url('admin/jobs/save/'.$row['id'])."'><span class='icon-edit' title='Edit'></span></a>"; 											
	$delete_str="<a href='".site_url('admin/jobs/change_status/delete/'.$row['id'])."'><span class='icon-remove' title='Delete'></span></a>";
				if(isset($row['status']))
					switch($row['status'])
					{
						case 'INACTIVE':
									$actions_str.="<a class='alert-success' href='".site_url('admin/jobs/change_status/active/'.$row['id'])."'><span class='icon-ok' title='activate'></span></a>";
										break;
						case 'Waiting':
									$actions_str.=$delete_str;
									$actions_str.="<a class='alert-success' href='".site_url('admin/jobs/invite/'.$row['id'])."'><span class='icon-ok' title='Invite Agents'></span></a>";
									break;
									
						default:
									$actions_str.=$delete_str;
									break;
					}
					$actions_str.="</p>";
					$list_data[]=array($row['id'], $title, $expected_date , $pickup_address, $destination_address, $job_status, $name_email, $actions_str);
				}
			}
			header('Content-type: application/json');
			$return_array['aaData']	=	$list_data;
			echo json_encode($return_array);
			exit;
	}
	
	public function award($job_id="")
	{
		if($award_data=$this->input->post())
		{
			if(!empty($award_data['job']) && !empty($award_data['agents'][0]))
			{
				$already_awarded=$this->db_handler->get('jobs',array('id'=>$award_data['job']));
				if(!empty($already_awarded[0]))
					$already_awarded=$already_awarded[0];
				if($already_awarded['agent_id']>0)
				{
					$this->session->set_flashdata('error_message','Job already awarded');
					redirect('admin/jobs');
				}
				
				$update_data=array();
				$update_data['id']		  =	$award_data['job'];
				$update_data['agent_id']	=	$award_data['agents'][0];
				$update_data['status']  =	"Awarded";
				if($job_id = $this->db_handler->save('jobs',$update_data))
				{
					$msgClient = $this->common_model->job_assign_email($job_id,18);
					$subjectClient = $msgClient['subject'];
					$messageClient = $msgClient['template'];
					$client_email =  $msgClient['client_email'];
					send_email($client_email , $subjectClient ,$messageClient );
					/*$this->email->clear();
					$this->email->to($client_email);
					$this->email->from(REGISTRATION_FROM_EMAIL,FROM_NAME);
					$this->email->cc(REGISTRATION_CC);
					$this->email->bcc(REGISTRATION_BCC);
					$this->email->reply_to(REGISTRATION_REPLY_TO);
					$this->email->subject($subjectClient);
					$this->email->message($messageClient);
					$this->email->send();*/
					//$this->email->clear();
					$msgAgent = $this->common_model->job_assign_email($job_id,19);
					$subjectAgent = $msgAgent['subject'];
					$messageAgent = $msgAgent['template'];
					$agent_email =  $msgAgent['agent_email'];
					send_email($agent_email , $subjectAgent ,$messageAgent );
					/*$this->email->clear();
					$this->email->to($agent_email);
					$this->email->from(REGISTRATION_FROM_EMAIL,FROM_NAME);
					$this->email->cc(REGISTRATION_CC);
					$this->email->bcc(REGISTRATION_BCC);
					$this->email->reply_to(REGISTRATION_REPLY_TO);
					$this->email->subject($subjectAgent);
					$this->email->message($messageAgent);
					$this->email->send();*/
					if($this->db_handler->delete('jobs_agents',array('job_id'=>$update_data['id'])))
						$this->session->set_flashdata('success_message','Job Awarded to agent');
					
				}
				else
					$this->session->set_flashdata('error_message','Job could not be Awarded to agent');
									
			}
			redirect('admin/jobs');
		}
		if(!empty($job_id))
		{
			$this->data['job_id']		=	$job_id;
			$this->data['job_action']	=	"award";				
			$this->data['list_url']	  =	site_url('admin/agents/list_datatable?job='.$job_id);
		}
		$this->template->load('main','admin/job/invite_award_job',$this->data);
	}
	public function invite($job_id="")
	{
		if($invite_data=$this->input->post())
		{
			$invite_error=0;
			if(!empty($invite_data['job']) && !empty($invite_data['agents']))
			{
				$already_awarded=$this->db_handler->get('jobs',array('id'=>$invite_data['job']));
				if(!empty($already_awarded[0]))
					$already_awarded=$already_awarded[0];
				if($already_awarded['agent_id']>0)
				{
					$this->session->set_flashdata('error_message','Job already awarded');
					redirect('admin/jobs');
				}
				$already_invited=$this->db_handler->get('jobs_agents',array('job_id'=>$invite_data['job']));
				if(empty($already_invited))
					$already_invited=array();
				foreach($invite_data['agents'] as $agent)
				{
					if(in_array_r($agent, $already_invited))
						continue;
					$update_data=array();
					$update_data['job_id']	=	$invite_data['job'];
					$update_data['agent_id']  =	$agent;
					$update_data['status']    =	"INVITED";
					if($this->db_handler->save('jobs_agents',$update_data) === false)
						$invite_error++;
				}
				if($invite_error==0)
					$this->session->set_flashdata('success_message','Agents invited to job');
				else
					$this->session->set_flashdata('error_message','error in sending invitaitons');
									
			}
			redirect('admin/jobs');
		}
		if(!empty($job_id))
		{
			$this->data['job_id']	  =	$job_id;				
			$this->data['job_action']  =	"invite";							
			$this->data['list_url']	=	site_url('admin/agents/list_datatable?job='.$job_id);
		}
		$this->template->load('main','admin/job/invite_award_job',$this->data);
	}



	
}