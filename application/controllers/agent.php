<?php
class Agent extends MY_Controller
{
	private $image_data;
	private $thumb_data;
	public function __construct()
	{
		parent::__agent();
		$this->image_data="";
		$this->thumb_data="";
	}
	//cases
	public function index()
	{
		redirect('agent/login');
		$current_url=current_url();
		$list_url=$current_url.'/list_datatable';
		$this->data['list_url']=$list_url;
		$this->template->load('main','admin/client/client_listing',$this->data);
	}
	private function delete_image()
	{
		$image_data=$this->image_data;
		$response		=	array();
		$response['error']	  =2;
		$response['image_error']=1;
		$response['thumb_error']=1;
		if(!empty($image_data['profile_image']))
		{
			if(file_exists(AGENT_IMAGE_PATH .$image_data['profile_image']))
			{
				if(unlink(AGENT_IMAGE_PATH .$image_data['profile_image']))
				{
					$response['image_error']=0;
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
					$response['thumb_error']=0;
				}
			}
		}
		return $response;
	}

	public function signup()
	{
		if($agent_data=$this->input->post())
		{	
			$this->form_validation->set_rules('salutation', 'Salutation', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('company_name', 'Company Name', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('addressUkCode1', 'Post Code', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('house_numberUkCode1', 'Address Line 1', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('streetUkCode1', 'Street address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('townUkCode1', 'town address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('countyUkCode1', 'country address', 'trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('longitudeUkCode1', 'Longitude', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('latitudeUkCode1', 'Latitude', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('telephone', 'Telephone', 'required|trim|strip_tags|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|trim|strip_tags|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|strip_tags|xss_clean|valid_email');
			$this->form_validation->set_rules('security_question', 'Security Question', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('security_answer', 'Security Answer', 'required|trim|strip_tags|xss_clean|max_length[200]');
			$this->form_validation->set_rules('country_code', 'Country', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('preferred_cities', 'cities', 'check_cities');			
			$this->form_validation->set_rules('password', 'Password', 'required|trim|strip_tags|xss_clean|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|strip_tags|xss_clean|matches[password]');
			$this->form_validation->set_rules('security_code', 	'Security Code', 'callback_validate_captcha[AGENT]');
			$this->form_validation->set_rules('profile_image', 'Profile Image', 'callback_upload_files');
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
	
					$agent_data['created_by']	  =	"AGENT";

					if(!empty($agent_data['security_code']))
						unset($agent_data['security_code']);
					if(!empty($agent_data['str_check']))
						unset($agent_data['str_check']);


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
						
					if($insert_id=$this->db_handler->save('agents',$agent_data))
					{
						$msg = $this->db_handler->prepMsg($insert_id , '8' ,'agents');
						$subject = $msg['subject'];
						$message = $msg['template'];
						send_email($this->input->post('email') , $subject ,$message );
						
						$this->session->set_flashdata('success_message',' SignUp successful '.(!empty($image_message)?$image_message:''). "   ".(!empty($thumb_message)?$thumb_message:''));
						if(!empty($image_error) || !empty($thumb_error))
							$this->session->set_flashdata('error_message','   '.(!empty($image_error)?$image_error:''). "   ".(!empty($thumb_error)?$thumb_error:''));						
						redirect('agent');	
						
					}
					else
					{
						$this->data['error_message']	=	'Database Error: SignUp failed ';
						if(!empty($image_error) || !empty($thumb_error))
							$this->data['error_message'].='   '.(!empty($image_error)?$image_error:''). "   ".(!empty($thumb_error)?$thumb_error:'');						
						if(!empty($this->image_data['profile_image']))
						{
							$this->delete_image();
						}
					}
			}
			else
			{
				if($this->input->post('country_code'))
					$this->data['cities']	   =	$this->db_handler->get('cities',array('country'=>$this->input->post('country_code')));
				$this->data['error_message']	=	'Please Enter correct information';	
				
				if(!empty($this->image_data['profile_image']))
				{
					$this->delete_image();
				}
				
			}
		}
		$this->data['security_questions']	=	$this->db_handler->get('security_questions');
		$this->data['countries']			 =	$this->db_handler->get('countries');
		if(empty($this->data['cities']))
			$this->data['cities']			=	$this->db_handler->get('cities',array('country'=>'GB'));
		
		$captcha					=	$this->generate_captcha("AGENT");
		if(!empty($captcha['image']) && !empty($captcha['time']))
		{
			$this->data['captcha']	  =	$captcha['image'];
			$this->data['str_check']	=	$captcha['time'];
		}
		$this->template->load('main_front','front/agent_signup',$this->data);
	}
	/////////////////////////////////////XEESHAN///////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////
	public function login()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules( 'email', 'Email', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules( 'password', 'Password', 'required|trim|strip_tags|xss_clean|min_length[8]');
			if ($this->form_validation->run() == TRUE)
			{
				$result = $this->db_handler->authenticate();
				$result = json_decode($result,true);
				if(!empty($result['error']))
				{
					$this->session->set_flashdata('error_message',$result['message']);
					redirect('agent/login');
				}
				else
				{
					$this->session->set_flashdata('info_message',$result['message']);
					redirect('agent/dashboard');
				}

			}
			else
				$this->data['error_message']='Please enter correct information';
		}
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		//$agent = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if( !empty($user['user_id']) )// || !empty($agent['user_id']) )
		{
			redirect('agent/dashboard');
		}
		$this->template->load('main_front','front/agent/login',$this->data);
		//$this->load->view('admin/login',$this->data);
	}

	public function dashboard()
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if(!empty($user['user_id']))
		{
			redirect('agent/total_jobs');
		}
		else
		{
			$this->session->set_flashdata('error_message','Please login to proceed');
			redirect('agent/login');
		}
	}

	public function total_jobs()
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if(!empty($user['user_id']))
		{
			$results = $this->db_handler->sql("SELECT COUNT(*) AS total FROM jobs WHERE agent_id='".$user['user_id']."'",true);
			if( $results )
			{
				$get_total_rows = $results[0]['total']; //total records
				//break total records into pages
				$total_pages = ceil($get_total_rows/ITEMS_PER_PAGE);
				//$this->data['notifications'] = $result['data'];
				$this->data['total_pages'] = $total_pages;
			}
			else
			{
				$this->data['total_pages'] = 0;
			}
			$this->jobs_counters( $user['user_id'] );
			$this->data['job_type'] = 'total';
			$this->template->load('main_front','front/agent/inprogress',$this->data);
		}
		else
		{
			$this->session->set_flashdata('error_message','Please login to proceed');
			redirect('agent/login');
		}
	}
	public function jobs_counters($user_id)
	{
		if( !empty( $user_id ) )
		{
			$results = $this->db_handler->sql("SELECT COUNT(*) AS total FROM jobs WHERE agent_id='".$user_id."'",true);
			$results1 = $this->db_handler->sql("SELECT COUNT(*) AS total FROM jobs WHERE agent_id='".$user_id."' AND status='Completed'",true);
			$results2 = $this->db_handler->sql("SELECT COUNT(*) AS total FROM jobs WHERE agent_id='".$user_id."' AND (status='Collected' OR status='Awarded')",true);
			$results3 = $this->db_handler->sql("SELECT COUNT(*) AS total FROM jobs WHERE agent_id='".$user_id."' AND status='Waiting'",true);
			if( $results )
			{
				$this->data['total_jobs'] = $results[0]['total'];
				$this->data['completed_jobs'] = $results1[0]['total'];
				$this->data['inprogress_jobs'] = $results2[0]['total'];
				$this->data['waiting_jobs'] = $results3[0]['total'];
			}
			else
			{
				$this->data['total_jobs'] = 0;
				$this->data['completed_jobs'] = 0;
				$this->data['inprogress_jobs'] = 0;
				$this->data['waiting_jobs'] = 0;
			}
		}
		else
		{
			$this->session->set_flashdata('error_message','Please login to proceed');
			redirect('agent/login');
		}
	}
	public function completed_jobs()
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if(!empty($user['user_id']))
		{
			$results = $this->db_handler->sql("SELECT COUNT(*) AS total FROM jobs WHERE agent_id='".$user['user_id']."'",true);
			if( $results )
			{
				$get_total_rows = $results[0]['total']; //total records
				//break total records into pages
				$total_pages = ceil($get_total_rows/ITEMS_PER_PAGE);
				//$this->data['notifications'] = $result['data'];
				$this->data['total_pages'] = $total_pages;
			}
			else
			{
				$this->data['total_pages'] = 0;
			}
			$this->data['job_type'] = 'completed';
			$this->jobs_counters( $user['user_id'] );
			$this->template->load('main_front','front/agent/inprogress',$this->data);
		}
		else
		{
			$this->session->set_flashdata('error_message','Please login to proceed');
			redirect('agent/login');
		}
	}
	public function inprogress_jobs()
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if(!empty($user['user_id']))
		{
			$results = $this->db_handler->sql("SELECT COUNT(*) AS total FROM jobs WHERE agent_id='".$user['user_id']."'",true);
			if( $results )
			{
				$get_total_rows = $results[0]['total']; //total records
				//break total records into pages
				$total_pages = ceil($get_total_rows/ITEMS_PER_PAGE);
				//$this->data['notifications'] = $result['data'];
				$this->data['total_pages'] = $total_pages;
			}
			else
			{
				$this->data['total_pages'] = 0;
			}
			$this->data['job_type'] = 'inprogress';
			$this->jobs_counters( $user['user_id'] );
			$this->template->load('main_front','front/agent/inprogress',$this->data);
		}
		else
		{
			$this->session->set_flashdata('error_message','Please login to proceed');
			redirect('agent/login');
		}
	}
	public function waiting_jobs()
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if(!empty($user['user_id']))
		{
			$results = $this->db_handler->sql("SELECT COUNT(*) AS total FROM jobs WHERE agent_id='".$user['user_id']."'",true);
			if( $results )
			{
				$get_total_rows = $results[0]['total']; //total records
				//break total records into pages
				$total_pages = ceil($get_total_rows/ITEMS_PER_PAGE);
				//$this->data['notifications'] = $result['data'];
				$this->data['total_pages'] = $total_pages;
			}
			else
			{
				$this->data['total_pages'] = 0;
			}
			$this->data['job_type'] = 'waiting';
			$this->jobs_counters( $user['user_id'] );
			$this->template->load('main_front','front/agent/inprogress',$this->data);
		}
		else
		{
			$this->session->set_flashdata('error_message','Please login to proceed');
			redirect('agent/login');
		}
	}

	public function notifications()
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		//$agent = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if(!empty($user['user_id']))
		{
			$result = $this->db_handler->get_notifications( 'AGENT' , $user['user_id'] , "status='UNREAD'" );
			$result = json_decode($result,true);
			if(!empty($result['error']))
			{
				$this->session->set_flashdata('error_message',$result['message']);
				$this->data['total_pages'] = 0;
			}
			else
			{
				//$this->session->set_flashdata('success_message',$result['message']);
				$results = $this->db_handler->sql("SELECT COUNT(*) AS total FROM notifications WHERE created_for='AGENT' and created_for_id='".$user['user_id']."'",true);
				$get_total_rows = $results[0]['total']; //total records
				//break total records into pages
				//$item_per_page=5;
				$total_pages = ceil($get_total_rows/ITEMS_PER_PAGE);
				$this->data['notifications'] = $result['data'];
				$this->data['total_pages'] = $total_pages;
			}
			$this->jobs_counters( $user['user_id'] );
			$this->template->load('main_front','front/agent/notification',$this->data);
		}
		//else if(!empty($agent['user_id']))
		//{
		//	$this->template->load('main_front','front/agent/notification',$this->data);
		//}
		else
		{
			$this->session->set_flashdata('error_message','Please login to proceed');
			redirect('agent/login');
		}
	}
	public function fetch_notifications($page)
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		$agent = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		$page_number = filter_var( $page , FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		//throw HTTP error if page number is not valid
		if(!is_numeric($page_number)){
			header('HTTP/1.1 500 Invalid page number!');
			exit();
		}
		//get current starting point of records
		$position = ( $page_number * ITEMS_PER_PAGE );
		//Limit our results within a specified range.
		//$results = mysqli_query( $connecDB,"SELECT id,name,message FROM paginate ORDER BY id DESC LIMIT $position, $item_per_page");
		$results = $this->db_handler->sql("
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
				N.created_for='AGENT' and N.created_for_id='".$user['user_id']."' ORDER BY id DESC LIMIT ".$position.", ".ITEMS_PER_PAGE."",true);

		$get_total_rows = $results; //total records
		//echo '<ul class="page_result">';
		if( $results ) {
			foreach ($results as $key => $val) {
				$start_date = new DateTime(date('Y-m-d H:m:s', time()));
				$since_start = $start_date->diff(new DateTime($val["created_date"]));
				if ($since_start->d > 0) {
					$days = $since_start->d . ' days ago';
				} else if ($since_start->h > 0) {
					$days = $since_start->h . ' hours ago';
				} else if ($since_start->i > 0) {
					$days = $since_start->i . ' minutes ago';
				} else if ($since_start->s > 0) {
					$days = $since_start->s . ' seconds ago';
				}
				echo '
			<div class="alert notification-alert"><a href="#" class="close" data-dismiss="alert">&times;</a><a href="' . $val["link"] . '"><div class="media"><div class="media-left"><span class="alert-icon"></span></div><div class="media-body"><em class="time-elapsed visible-xs">10 mins ago</em><p>' . $val["title"] . '<em class="time-elapsed hidden-xs">' . $days . '</em></p><h4>' . $val["description"] . '<span class="offer-price"></span></h4><p>by: ' . $val["created_by_name"] . '</p></div></div></a></div>
			';
			}
		}
		else {
			echo 'No more records';
		}
		//echo '</ul>';
	}

	public function search_service_provider()
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		//$agent = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if(!empty($user['user_id']))
		{
			$results = $this->db_handler->sql("SELECT COUNT(*) AS total FROM agents WHERE status='Active'",true);
			if( $results )
			{
				$get_total_rows = $results[0]['total']; //total records
				//break total records into pages
				$total_pages = ceil($get_total_rows/ITEMS_PER_PAGE);
				//$this->data['notifications'] = $result['data'];
				$this->data['total_pages'] = $total_pages;
				$this->template->load('main_front','front/agent/search-service-provider',$this->data);
			}
			else
			{
				//$this->session->set_flashdata('error_message',$result['message']);
				$this->data['total_pages'] = 0;
				$this->template->load('main_front','front/agent/search-service-provider',$this->data);
			}
		}
		//else if(!empty($agent['user_id']))
		//{
		//	$this->template->load('main_front','front/agent/notification',$this->data);
		//}
		else
		{
			$this->session->set_flashdata('error_message','Please login to proceed');
			redirect('agent/login');
		}
	}
	public function fetch_service_provider($page)
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		$page_number = filter_var( $page , FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		//throw HTTP error if page number is not valid
		if(!is_numeric($page_number)){
			header('HTTP/1.1 500 Invalid page number!');
			exit();
		}
		//get current starting point of records
		$position = ( $page_number * ITEMS_PER_PAGE );
		//Limit our results within a specified range.
		$results = $this->db_handler->sql("
SELECT * FROM agents WHERE status='Active' ORDER BY id DESC LIMIT ".$position.", ".ITEMS_PER_PAGE,true);

		$get_total_rows = $results; //total records
		if( $results ) {
			foreach ($results as $key => $val) {
				$start_date = new DateTime(date('Y-m-d H:m:s', time()));
				$since_start = $start_date->diff(new DateTime($val["created_date"]));
				if ($since_start->d > 0) {
					$days = $since_start->d . ' days ago';
				} else if ($since_start->h > 0) {
					$days = $since_start->h . ' hours ago';
				} else if ($since_start->i > 0) {
					$days = $since_start->i . ' minutes ago';
				} else if ($since_start->s > 0) {
					$days = $since_start->s . ' seconds ago';
				}
				if(!empty($val['profile_thumb']))
					$profile_image= (file_exists(AGENT_THUMB_PATH.$val['profile_thumb'])?base_url('upload/agents/thumbs/'.$val['profile_thumb']):base_url('upload/agents/thumbs/image_not_found.png'));
				else
					$profile_image = base_url("upload/agents/thumbs/placeholder.jpg");
				echo '
					<div class="media"><div class="media-left search_media_left"><a href="#"><img class="media-object" src="'.$profile_image.'" alt="..."></a></div><div class="media-body"><p class="item-id">Agent ID: <span>'.$val["id"].'</span></p><div class="job-title"><h2>Please send me invitation</h2><h3 class="client-name">'.$val["salutation"].' '.$val["first_name"].' '.$val["last_name"].'</h3></div><div class="job-detail"><p>Company name:<strong>'.$val["company_name"].'</strong></p></div><div class="clear"></div><div class="action-btns"><a href="#" class="more-detail">More details</a> <a href="#" class="invite-btn"></a></div></div></div>
			';
			}
		}
		else {
			echo 'No more records';
		}
	}

	public function search_jobs()
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		//$agent = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if(!empty($user['user_id']))
		{
			$results = $this->db_handler->sql("SELECT COUNT(*) AS total FROM jobs WHERE status='Waiting'",true);
			if( $results )
			{
				$get_total_rows = $results[0]['total']; //total records
				//break total records into pages
				$total_pages = ceil($get_total_rows/ITEMS_PER_PAGE);
				//$this->data['notifications'] = $result['data'];
				$this->data['total_pages'] = $total_pages;
				$this->template->load('main_front','front/agent/agent-finded-job',$this->data);
			}
			else
			{
				//$this->session->set_flashdata('error_message',$result['message']);
				$this->data['total_pages'] = 0;
				$this->template->load('main_front','front/agent/agent-finded-job',$this->data);
			}
		}
		else
		{
			$this->session->set_flashdata('error_message','Please login to proceed');
			redirect('agent/login');
		}
	}
	public function fetch_jobs($page)
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		$page_number = filter_var( $page , FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		//throw HTTP error if page number is not valid
		if(!is_numeric($page_number)){
			header('HTTP/1.1 500 Invalid page number!');
			exit();
		}
		//get current starting point of records
		$position = ( $page_number * ITEMS_PER_PAGE );
		//Limit our results within a specified range.
		$results = $this->db_handler->sql("
SELECT jobs.*,(SELECT clients.profile_thumb FROM clients WHERE clients.id=jobs.client_id) AS client_img FROM jobs WHERE status='Waiting' ORDER BY id DESC LIMIT ".$position.", ".ITEMS_PER_PAGE,true);

		$get_total_rows = $results; //total records
		if( $results ) {
			foreach ($results as $key => $val) {
				$start_date = new DateTime(date('Y-m-d H:m:s', time()));
				$since_start = $start_date->diff(new DateTime($val["created_date"]));
				if ($since_start->d > 0) {
					$days = $since_start->d . ' days ago';
				} else if ($since_start->h > 0) {
					$days = $since_start->h . ' hours ago';
				} else if ($since_start->i > 0) {
					$days = $since_start->i . ' minutes ago';
				} else if ($since_start->s > 0) {
					$days = $since_start->s . ' seconds ago';
				}
				if(!empty($val['client_img']))
					$profile_image= (file_exists(CLIENT_THUMB_PATH.$val['client_img'])?base_url('upload/clients/thumbs/'.$val['client_img']):base_url('upload/clients/thumbs/image_not_found.png'));
				else
					$profile_image = base_url("upload/clients/thumbs/placeholder.jpg");
				echo '
					<div class="media"><div class="media-left search_media_left"><a href="#"><img class="media-object" src="'.$profile_image.'" alt="..."></a></div><div class="media-body"><p class="item-id">Job ID: <span>'.$val["id"].'</span></p><div class="job-title"><h2>Please send me invitation</h2><h3 class="client-name">'.$val["title"].'</h3></div><div class="job-detail"><p>Description:<strong>'.$val["description"].'</strong></p></div><div class="clear"></div><div class="action-btns"><a href="#" class="more-detail">More details</a> <a href="#" class="invite-btn"></a></div></div></div>
			';
			}
		}
		else {
			echo 'No more records';
		}
	}
	public function fetch_agent_jobs($page,$job_type)
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		$page_number = filter_var( $page , FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		//throw HTTP error if page number is not valid
		if(!is_numeric($page_number)){
			header('HTTP/1.1 500 Invalid page number!');
			exit();
		}
		//get current starting point of records
		$position = ( $page_number * ITEMS_PER_PAGE );
		$query='';
		if( $job_type == 'total' ){
			$query = "
					SELECT J.*,C.profile_thumb AS client_img,A.profile_thumb AS agent_img, CONCAT(C.first_name,' ',C.last_name) AS client_name, CONCAT(A.first_name,' ',A.last_name) AS agent_name,P.amount AS offer
					FROM jobs AS J
					LEFT JOIN clients as C ON ( C.id = J.client_id )
					LEFT JOIN agents as A ON ( A.id = J.agent_id )
					LEFT JOIN payments as P ON ( P.job_id = J.id )
					WHERE J.agent_id='".$user['user_id']."' ORDER BY id DESC LIMIT ".$position.", ".ITEMS_PER_PAGE;
		}
		else if( $job_type == 'completed' ){
			$query = "
					SELECT J.*,C.profile_thumb AS client_img,A.profile_thumb AS agent_img, CONCAT(C.first_name,' ',C.last_name) AS client_name, CONCAT(A.first_name,' ',A.last_name) AS agent_name,P.amount AS offer
					FROM jobs AS J
					LEFT JOIN clients as C ON ( C.id = J.client_id )
					LEFT JOIN agents as A ON ( A.id = J.agent_id )
					LEFT JOIN payments as P ON ( P.job_id = J.id )
					WHERE J.agent_id='".$user['user_id']."' AND J.status='Completed' ORDER BY id DESC LIMIT ".$position.", ".ITEMS_PER_PAGE;
		}
		else if( $job_type == 'inprogress' ){
			$query = "
					SELECT J.*,C.profile_thumb AS client_img,A.profile_thumb AS agent_img, CONCAT(C.first_name,' ',C.last_name) AS client_name, CONCAT(A.first_name,' ',A.last_name) AS agent_name,P.amount AS offer
					FROM jobs AS J
					LEFT JOIN clients as C ON ( C.id = J.client_id )
					LEFT JOIN agents as A ON ( A.id = J.agent_id )
					LEFT JOIN payments as P ON ( P.job_id = J.id )
					WHERE J.agent_id='".$user['user_id']."' AND (J.status='Collected' OR J.status='Awarded')  ORDER BY id DESC LIMIT ".$position.", ".ITEMS_PER_PAGE;
		}
		else if( $job_type == 'waiting' ){
			$query = "
					SELECT J.*,C.profile_thumb AS client_img,A.profile_thumb AS agent_img, CONCAT(C.first_name,' ',C.last_name) AS client_name, CONCAT(A.first_name,' ',A.last_name) AS agent_name,P.amount AS offer
					FROM jobs AS J
					LEFT JOIN clients as C ON ( C.id = J.client_id )
					LEFT JOIN agents as A ON ( A.id = J.agent_id )
					LEFT JOIN payments as P ON ( P.job_id = J.id )
					WHERE J.agent_id='".$user['user_id']."' AND J.status='Waiting' ORDER BY id DESC LIMIT ".$position.", ".ITEMS_PER_PAGE;
		}
		//Limit our results within a specified range.
		$results = $this->db_handler->sql($query,true);
		$get_total_rows = $results; //total records
		if( $results ) {
			foreach ($results as $key => $val) {
				$start_date = new DateTime(date('Y-m-d H:m:s', time()));
				$since_start = $start_date->diff(new DateTime($val["created_date"]));
				if ($since_start->d > 0) {
					$days = $since_start->d . ' days ago';
				} else if ($since_start->h > 0) {
					$days = $since_start->h . ' hours ago';
				} else if ($since_start->i > 0) {
					$days = $since_start->i . ' minutes ago';
				} else if ($since_start->s > 0) {
					$days = $since_start->s . ' seconds ago';
				}

				$delivery_date = new DateTime($val["post_date"]);
				$diff = $delivery_date->diff( $start_date );
				if ($diff->d > 0) {
					$days = 'After'. $diff->d . ' days';
				} else if ($diff->h > 0) {
					$days = 'After'. $diff->h . ' hours';
				} else if ($diff->i > 0) {
					$days = 'After'. $diff->i . ' minutes';
				} else if ($diff->s > 0) {
					$days = 'After'. $diff->s . ' seconds';
				}
				$pickup_address=$val['pickup_address_line1'].' '.$val['pickup_address_line2'].' '.$val['pickup_address_line3'].' '.$val['pickup_address_line4'];
				$destination_address=$val['destination_address_line1'].' '.$val['destination_address_line2'].' '.$val['destination_address_line3'].' '.$val['destination_address_line4'];
				if(!empty($val['client_img']))
					$profile_image= (file_exists(CLIENT_THUMB_PATH.$val['client_img'])?base_url('upload/clients/thumbs/'.$val['client_img']):base_url('upload/clients/thumbs/image_not_found.png'));
				else
					$profile_image = base_url("upload/clients/thumbs/placeholder.jpg");
				if(!empty($val['offer']))
					$offer= '<div class="sp-offer"><a href="'.base_url().'agent/offer_detail/'.$val['id'].'" class="offer-price"><span>$'.$val['offer'].'</span></a>offer</div>';
				else
					$offer = '';

				echo '
					<div class="media"><div class="media-left search_media_left"><a href="#"><img class="media-object" src="'.$profile_image.'" alt="..."><span class="bid-agent-name">'.$val["agent_name"].'</span></a></div><div class="media-body"><div class="bider-info sp-info"><h3>'.$val["title"].'</h3><p class="c-from">Collection from: <b>'.$pickup_address.'</b> Delivery-to: <b>'.$destination_address.'</b></p><p class="completion">Delivery Completion: '.$days.'</p><p class="c-status hidden-xs">Current status: <span class="status">'.$val['status'].'</span></p></div><div class="clear"></div><div class="visible-xs"><p class="c-status left">Current status: <span class="status">Waiting</span></p><div class="sp-offer right"><a href="'.base_url().'agent/offer_detail/'.$val['id'].'" class="offer-price"><span>$20</span></a>offer</div></div><div class="clear"></div></div><div class="media-right hidden-xs">'.$offer.'</div></div>
			';
			}
		}
		else {
			echo 'No more records';
		}
	}

	public function forget_password()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules( 'email', 'Email', 'required|trim|strip_tags|xss_clean');
			if ($this->form_validation->run() == TRUE)
			{
				$result = $this->db_handler->request_password();
				$result = json_decode($result,true);
				if(!empty($result['error']))
				{
					$this->session->set_flashdata('error_message',$result['message']);
					redirect('agent/forget_password');
				}
				//else
				//{
				//	$this->session->set_flashdata('success_message',$result['message']);
				//	redirect('user/forget_password');
				//}
			}
			else
				$this->data['error_message']='Please enter correct information';
		}
		$this->template->load('main_front','front/agent/forget-password',$this->data);
	}
	public function logout($level)
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		//$agent = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if(!empty($level))
		{
			if( $level == 'agent' ){
				if(!empty($user['user_id']))
				{
					$this->session->unset_userdata('agent');
					$this->session->set_flashdata('success_message','Successfully logout' );
				}
			}
			//else if( $level == 'agent' ){
			//	if(!empty($agent['user_id']))
			//	{
			//		$this->session->unset_userdata('agent');
			//	}
			//}
			//redirect('user/login');
		}
		redirect('agent/login');
	}

	public function offer_detail($id)
	{
		$user = ($this->session->userdata('agent'))?$this->session->userdata('agent'):array();
		if(!empty($user['user_id']))
		{
			$query = "
					SELECT J.*,C.profile_thumb AS client_img,A.profile_thumb AS agent_img, CONCAT(C.first_name,' ',C.last_name) AS client_name, CONCAT(A.first_name,' ',A.last_name) AS agent_name,P.amount AS offer
					FROM jobs AS J
					LEFT JOIN clients as C ON ( C.id = J.client_id )
					LEFT JOIN agents as A ON ( A.id = J.agent_id )
					LEFT JOIN payments as P ON ( P.job_id = J.id )
					WHERE J.id=".$id;

			$results = $this->db_handler->sql($query,true);
			if( $results ) {
				$response = array() ;
				$start_date = new DateTime(date('Y-m-d H:m:s', time()));

				$delivery_date = new DateTime( $results[0]['post_date'] );
				$diff = $delivery_date->diff( $start_date );
				if ($diff->d > 0) {
					$days = 'After '. $diff->d . ' days';
				} else if ($diff->h > 0) {
					$days = 'After '. $diff->h . ' hours';
				} else if ($diff->i > 0) {
					$days = 'After '. $diff->i . ' minutes';
				} else if ($diff->s > 0) {
					$days = 'After '. $diff->s . ' seconds';
				}
				$pickup_address=$results[0]['pickup_address_line1'].' '.$results[0]['pickup_address_line2'].' '.$results[0]['pickup_address_line3'].' '.$results[0]['pickup_address_line4'];
				$destination_address=$results[0]['destination_address_line1'].' '.$results[0]['destination_address_line2'].' '.$results[0]['destination_address_line3'].' '.$results[0]['destination_address_line4'];

				$response['id']				=$results[0]['id'];
				$response['title']			=$results[0]['title'];
				$response['post_date']		=$results[0]['post_date'];
				$response['from']			=$results[0]['pickup_address_line2'];
				$response['pickup']			=$pickup_address;
				$response['to']				=$results[0]['destination_address_line2'];
				$response['destination']	=$destination_address;
				$response['agent_name']		=$results[0]['agent_name'];
				$response['offer']			=$results[0]['offer'];
				$response['weight_type']	=$results[0]['weight_type'];
				$response['delivery_days']	=$days;

				$this->data['job_details']=$response;
			}
			$this->jobs_counters( $user['user_id'] );
			$this->template->load('main_front','front/agent/offer-summary',$this->data);
		}
		else
		{
			$this->session->set_flashdata('error_message','Please login to proceed');
			redirect('agent/login');
		}
	}
	///////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////
	public function upload_files($img_data="")
	{
		$client=$this->session->userdata('client');
		$user_id							  =	(!empty($client['user_id'])?$client['user_id']:1);
		$return_data						  =	array();
		$return_data['image_message']		 =	"";
		$return_data['thumb_message']		 =	"";
		$return_data['thumb_error']		   =	'No thumb created';
		$return_data['image_error']		   =	'No Image Uploaded';
		$return_data['error']	  			 =	'1';
		if(isset($_FILES['profile_image']['name']) && !empty($_FILES['profile_image']['name']) && !empty($user_id))
		{
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
				else if(isset($response['error']))
					$return_data['image_error'] =	$response['error'];
				else // some unknowon error
					$return_data['image_error'] =	"some error in image uploading.";
			}
			else
				$return_data['image_error'] ="file type not recognized.";
		}
		$this->image_data=$return_data;
		if(!empty($return_data['image_error']))
			$this->form_validation->set_message('upload_files', $return_data['image_error']);
		return (!empty($return_data['profile_image'])?TRUE:FALSE);
	}
	private function make_thumb($image_name)
	{			
		if(!empty($image_name))
		{
			$this->load->library('image_lib');
						
			$config['image_library'] 		 =    'gd2';			
			$config['width']				 =	CLIENT_THUMB_WIDTH;
			$config['height']				=	CLIENT_THUMB_HEIGHT;
			$config['new_image']			 =	CLIENT_THUMB_PATH;
			$config['source_image']		  = 	CLIENT_IMAGE_PATH.$image_name;
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