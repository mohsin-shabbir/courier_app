<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__admin();
	}
	
	public function index()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|strip_tags|xss_clean|min_length[8]');
			if ($this->form_validation->run() == TRUE) 
			{
				$result = $this->db_handler->authenticate();
				$result = json_decode($result,true);
				if(!empty($result['error']))
				{
					$this->session->set_flashdata('error_message',$result['message']);
					redirect('admin/login');
				}
				else
				{
					$this->session->set_flashdata('info_message',$result['message']);
					redirect('admin');
				}
					
			}
			else
				$this->data['error_message']='Please enter correct information';
		}
		 $this->load->view('admin/login',$this->data);
	}
}