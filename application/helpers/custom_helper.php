<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('debug'))
{
    function debug($data,$exit=false)
    {
		if(is_object($data) || is_array($data))
		{
			echo "<pre>";
			print_r($data);
			echo "</pre>";
		}
		else
			echo $data;
		if($exit)
			exit;
    }   
}


if(!function_exists('in_array_r'))
{
	function in_array_r($needle, $haystack, $strict = false) 
	{
		foreach ($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
				return true;
			}
		}
		return false;
	}
}

if(!function_exists('send_email'))
{
	function send_email($to , $subject , $message ) 
	{
		$CI =& get_instance();
     	$CI->load->library('email');
		$CI->email->to($to);
		$CI->email->from(REGISTRATION_FROM_EMAIL,FROM_NAME);
		$CI->email->cc(REGISTRATION_CC);
		$CI->email->bcc(REGISTRATION_BCC);
		$CI->email->reply_to(REGISTRATION_REPLY_TO);
		$CI->email->subject($subject);
		$CI->email->message($message);
		if($CI->email->send())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}