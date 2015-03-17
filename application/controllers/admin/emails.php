<?php
class Emails extends MY_Controller
{
	public function __construct()
	{
		parent::__admin();
		$current_url=explode('/',current_url());
		$last_index=end($current_url);
		$current_url[$last_index]='list_datatable';
		$this->data['list_url']=implode('/',$current_url);
	}
	//cases
	public function index()
	{
		$result_set 			 = 	$this->db_handler->get('tbl_emailsetting');
		$this->data['listData'] = 	$result_set;
		$this->template->load('main','admin/email/email_listing',$this->data);
	}

	public function save($update_id="")
	{
		if(!empty($update_id))
		{
			$update_data	=	$this->db_handler->get('tbl_emailsetting','id',$update_id);
			if(isset($update_data[0]))
			{
				$this->data['data']=$update_data[0];
			}
		}
		else
		if($email_data = $this->input->post())
		{	
			$this->form_validation->set_rules('id', 'id', 'required|trim|strip_tags|xss_clean');		
			$this->form_validation->set_rules('title', 'Email Title', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('subject', 'Email Subject', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('status', 'Status', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('description', 'Description', 'required|trim|strip_tags|xss_clean');
			
			if($this->form_validation->run())
			{					
				if($insert_id = $this->db_handler->save('tbl_emailsetting',$email_data))
				{					
					if($email_data['id']>0)
					{
						$this->session->set_flashdata('success_message','Page updated successfully   ');
					}
					else
					{
						$this->session->set_flashdata('success_message','Page created successfully   ');
					}
										
					redirect('admin/emails');
				}
				else
				{
					if($email_data['id'] > 0)
						$this->data['error_message']='Database Error: Page could not be updated   ';
					else
					{
						$this->data['error_message']='Database Error: Page could not be created   ';				
					}
				}
			}
			else
			{
				$this->data['error_message']='Please Enter correct information';	
			}
		}
		$this->template->load('main','admin/email/add_email',$this->data);
	}
	
	public function delete($id)
	{
		if(!empty($id))
		{
			if($this->db_handler->delete('tbl_emailsetting','id',$id))
				$this->session->set_flashdata('success_message','Record deleted successfully');
			else
				$this->session->set_flashdata('error_message','Record could not be deleted');
		}
		else
			$this->session->set_flashdata('error_message','Invalid id!! Record could not be deleted');
		redirect('admin/emails');
	}

}