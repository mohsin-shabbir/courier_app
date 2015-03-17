<?php
class Seo extends MY_Controller
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
		$result_set 			 = 	$this->db_handler->get('tbl_seo');
		$this->data['listData'] = 	$result_set;
		$this->template->load('main','admin/seo/seo_listing',$this->data);
	}

	public function save($update_id="")
	{
		if(!empty($update_id))
		{
			$update_data	=	$this->db_handler->get('tbl_seo','id',$update_id);
			if(isset($update_data[0]))
			{
				$this->data['data']=$update_data[0];
			}
		}
		else
		if($seo_data = $this->input->post())
		{	
			$this->form_validation->set_rules('id', 'id', 'required|trim|strip_tags|xss_clean');		
			$this->form_validation->set_rules('pagename', 'Page Name', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('pagetitle', 'Page Title', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('status', 'Status', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('description', 'Description', 'required|trim|strip_tags|xss_clean');
			$this->form_validation->set_rules('keyword', 'Keyword', 'required|trim|strip_tags|xss_clean');
			
			if($this->form_validation->run())
			{					
				if($insert_id = $this->db_handler->save('tbl_seo',$seo_data))
				{					
					if($seo_data['id']>0)
					{
						$this->session->set_flashdata('success_message','Page updated successfully   ');
					}
					else
					{
						$this->session->set_flashdata('success_message','Page created successfully   ');
					}
										
					redirect('admin/seo');
				}
				else
				{
					if($seo_data['id'] > 0)
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
		$this->template->load('main','admin/seo/add_seo',$this->data);
	}
	
	public function delete($id)
	{
		if(!empty($id))
		{
			if($this->db_handler->delete('tbl_seo','id',$id))
				$this->session->set_flashdata('success_message','Record deleted successfully');
			else
				$this->session->set_flashdata('error_message','Record could not be deleted');
		}
		else
			$this->session->set_flashdata('error_message','Invalid id!! Record could not be deleted');
		redirect('admin/seo');
	}

}