<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{

	/**
	 * Index Page for this controller.
	 *		
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
   public function __construct()
   {
		parent::__construct();
		// Your own constructor code
		$this->load->model('content_model');
   }
	public function index()
	{
		$data['about_us_content'] = $this->content_model->get_content("about-us");
		$data['how_it_works_content'] = $this->content_model->get_content("how-it-works");
		$data['home_page_content'] = $this->content_model->get_content("home-page");
		$this->template->load('main_front','front/home' , $data);
	}
	////////////////////////////////////////////////////////signup//////////////////////////////////////////////////////////////
	public function signup()
	{
		$this->data['security_questions']=$this->db_handler->get('security_questions');
		$this->data['countries']			=	$this->db_handler->get('countries');
		$this->template->load('main_front','front/signup',$this->data);
	}
	////////////////////////////////////////////////////////login//////////////////////////////////////////////////////////////
	public function login()
	{
		$this->template->load('main_front','front/login',$this->data);
	}
	////////////////////////////////////////////////////////dashboard//////////////////////////////////////////////////////////////
	public function dashboard()
	{
		$this->template->load('main_front','front/inprogress',$this->data);  
	}
	////////////////////////////////////////////////////////Notifications//////////////////////////////////////////////////////////////
	public function notifications()
	{
		$this->template->load('main_front','front/notification',$this->data);  
	}
	////////////////////////////////////////////////////////contact_us//////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////post_job//////////////////////////////////////////////////////////////
	public function post_job()
	{
		$this->template->load('main_front','front/post-job',$this->data);
	}
	////////////////////////////////////////////////////////search_service_provider//////////////////////////////////////////////////////////////
	public function search_service_provider()
	{
		$this->template->load('main_front','front/search-service-provider',$this->data);  
	}
	////////////////////////////////////////////////////////search_service_provider//////////////////////////////////////////////////////////////
	public function post_job_step2()
	{
		$this->template->load('main_front','front/post-job-step2',$this->data);  
	}
	////////////////////////////////////////////////////////search_service_provider//////////////////////////////////////////////////////////////
	public function offers()
	{
		$this->template->load('main_front','front/quotes-on-job',$this->data);  
	}
	////////////////////////////////////////////////////////agent_vat//////////////////////////////////////////////////////////////
	public function agent_vat()
	{
		$this->template->load('main_front','front/agent-vat',$this->data);  
	}
	////////////////////////////////////////////////////////agent_vat//////////////////////////////////////////////////////////////
	public function search_jobs()
	{
		$results = $this->db_handler->sql("SELECT COUNT(*) AS total FROM jobs WHERE status='Waiting'",true);
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
			//$this->session->set_flashdata('error_message',$result['message']);
			$this->data['total_pages'] = 0;
		}
		$this->template->load('main_front','front/agent-finded-job',$this->data);
	}
	public function fetch_jobs($page)
	{
		$page_number = filter_var( $page , FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		//throw HTTP error if page number is not valid
		if(!is_numeric($page_number)){
			header('HTTP/1.1 500 Invalid page number!');
			exit();
		}
		$search=$this->input->post('search');
		$search_pattern = '';
		if( !empty($search) && $search != 'job  title   date  city   country  postcode' ) {
			$search_pattern .= " AND (";
			$search_pattern .= " J.title LIKE '%".$search."%'";
			$search_pattern .= " OR J.pickup_post_code LIKE '%".$search."%' ";
			$search_pattern .= " OR J.destination_post_code LIKE '%".$search."%' ";
			$search_pattern .= " OR J.pickup_address_line2 LIKE '%".$search."%' ";
			$search_pattern .= " OR J.destination_address_line2 LIKE '%".$search."%' ";
			$search_pattern .= " OR J.created_date LIKE '%".$search."%' ";
			$search_pattern .= " OR J.post_date LIKE '%".$search."%' ";
			$search_pattern .= " )";
		}
		//get current starting point of records
		$position = ( $page_number * ITEMS_PER_PAGE );
		//Limit our results within a specified range.
		$query="
				SELECT
				J.*,
				(SELECT clients.profile_thumb FROM clients WHERE clients.id=J.client_id) AS client_img
				FROM jobs AS J
				WHERE J.status='Waiting'".$search_pattern."
				ORDER BY J.id DESC
				LIMIT ".$position.", ".ITEMS_PER_PAGE;
		$results = $this->db_handler->sql( $query , true );

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
					<div class="media"><div class="media-left search_media_left"><a href="#"><img class="media-object" src="'.$profile_image.'" alt="..."></a></div><div class="media-body"><p class="item-id">Job ID: <span>'.$val["id"].'</span></p><div class="job-title"><h2>Please send me invitation</h2><h3 class="client-name">'.$val["title"].'</h3></div><div class="job-detail"><p>Description:<strong>'.$val["description"].'</strong></p></div><div class="clear"></div><div class="action-btns"><a href="#" class="more-detail">More details</a> <a href="#" role="button" class="invite-btn"></a></div></div></div>
			';
			}
		}
		else {
			echo 'No more records';
		}
	}
	////////////////////////////////////////////////////////agent_vat//////////////////////////////////////////////////////////////
	public function forget_password()
	{
		$this->template->load('main_front','front/forget-password',$this->data);  
	}
	
	////////////////////////////////////////////////////////agent_vat//////////////////////////////////////////////////////////////
	public function update_password()
	{
		$this->template->load('main_front','front/update-password',$this->data);  
	}
	
	////////////////////////////////////////////////////////search_service_provider//////////////////////////////////////////////////////////////
	public function offer_detail()
	{
		$this->template->load('main_front','front/offer-summary',$this->data);  
	}
	public function contact_us()
	{
		if($client_data=$this->input->post())
		{
		$this->form_validation->set_rules('name', 'Name', 'required|trim|strip_tags|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|strip_tags|xss_clean');
		$this->form_validation->set_rules('subject', 'Subject', 'required|trim|strip_tags|xss_clean');
		$this->form_validation->set_rules('message', 'Message', 'required|trim|strip_tags|xss_clean');
		if ($this->form_validation->run())
		{
			if($this->db_handler->save('tbl_contact_us',$client_data))
				{
					send_email($this->input->post('email') , $subject ,$message );	
					redirect('home');
				}
		}
		}
		else
		{
			//header("Location:");
			redirect('home');
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */