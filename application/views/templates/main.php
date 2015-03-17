
<?php 
		$nav['nav']=$this->load->view('templates/left-nav', null, TRUE);
		echo $this->load->view('templates/header', $nav, TRUE);
         
            if(isset($body))echo $body; 
             
         
 echo $this->load->view('templates/footer', null, TRUE);?>
