<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//=====================================================//
// Author: Sarfraz Sadiq
// Usage: to be used with sending out SMTP emails
/*   $config['protocol'] = "smtp";
   $config['smtp_host'] = "ssl://smtp.gmail.com";
   $config['smtp_port'] = "465";
   $config['smtp_user'] = "test@smonte.com"; 
   $config['smtp_pass'] = "test@123";
   $config['charset'] = "utf-8";
   $config['mailtype'] = "html";
   $config['newline'] = "\r\n";*/
   
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'mail.mobitsolutions.com';
$config['smtp_port'] = 587;
$config['smtp_user'] = 'zeeshan@mobitsolutions.com';
$config['smtp_pass'] = 'mobit1234';
$config['mailtype'] = 'html';
$config['charset']  = 'iso-8859-1';
