<?php
class Content_Model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_content($page_name)
	{
		//echo $page_name;
		$this->db->select('*');
		$this->db->where('pagename',$page_name);
		$this->db->where('status' , 1);
		return $this->db->get('tbl_pages')->result("array");
		//echo $this->db->last_query();
		//exit;
		
	}
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
?>