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
		$this->template->load('main_front','front/agent-finded-job',$this->data);  
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