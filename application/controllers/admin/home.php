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
		parent::__admin();
	}
	public function index()
	{
		//Agents' data
		$this->data['agents']			   =	$this->db_handler->get_paged_data_by_sql("*","agents","","",10,"","","","id desc");		
		$this->data['total_agents']		 =	$this->db_handler->count('agents');
		$this->data['active_agents']		=	$this->db_handler->count('agents',array('status'=>'Active'));
		$this->data['inactive_agents']	  =	$this->db_handler->count('agents',array('status'=>'INACTIVE'));
		$this->data['blocked_agents']	   =	$this->db_handler->count('agents',array('status'=>'Blocked'));
		$this->data['pending_agents']	   =	$this->db_handler->count('agents',array('status'=>'Pending'));
		
		//Clients' data
		$this->data['clients']			   =	$this->db_handler->get_paged_data_by_sql("*","clients","","",10,"","","","id desc");
		$this->data['total_clients']		 =	$this->db_handler->count('clients');
		$this->data['active_clients']		=	$this->db_handler->count('clients',array('status'=>'Active'));
		$this->data['inactive_clients']	  =	$this->db_handler->count('clients',array('status'=>'INACTIVE'));
		$this->data['blocked_clients']	   =	$this->db_handler->count('clients',array('status'=>'Blocked'));
		$this->data['pending_clients']	   =	$this->db_handler->count('clients',array('status'=>'Pending'));

		//Jobs' data
		$this->data['jobs']		    	  =	$this->db_handler->get_paged_data_by_sql("*","jobs","","",10,"","","","id desc");
		$this->data['total_jobs']		 	=	$this->db_handler->count('jobs');
		$this->data['waiting_jobs']		  =	$this->db_handler->count('jobs',array('status'=>'Waiting'));
		$this->data['awarded_jobs']	  	  =	$this->db_handler->count('jobs',array('status'=>'Awarded'));
		$this->data['collected_jobs']	   	=	$this->db_handler->count('jobs',array('status'=>'Collected'));
		$this->data['completed_jobs']	    =	$this->db_handler->count('jobs',array('status'=>'Completed'));
		$this->data['inactive_jobs']	     =	$this->db_handler->count('jobs',array('status'=>'INACTIVE'));
		$this->data['expired_jobs']	      =	$this->db_handler->count('jobs',array('status'=>'EXPIRED'));

		$this->template->load('main','admin/home',$this->data);
	}
	public function logout()
	{
		$this->session->unset_userdata('admin');
		redirect('admin/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */