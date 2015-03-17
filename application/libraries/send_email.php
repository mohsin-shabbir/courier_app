<?php

class Send_Email extends CI_Email
{

	public function __construct()
	{
		
	}
	function send_email($to , $subject , $message ) 
	{
		$this->email->to($to);
		$this->email->from(REGISTRATION_FROM_EMAIL,FROM_NAME);
		$this->email->cc(REGISTRATION_CC);
		$this->email->bcc(REGISTRATION_BCC);
		$this->email->reply_to(REGISTRATION_REPLY_TO);
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}
?>
