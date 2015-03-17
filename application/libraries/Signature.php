<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Sarfraz Sadiq
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Signature Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Security
 * @author		Sarfraz Sadiq
 * @link		
 */
class CI_Signature {

	/**
	 * Constructor
	 *
	 * @access	public
	 */
	public function __construct()
	{
		log_message('debug', "Signature Class Initialized");
	}

	// --------------------------------------------------------------------

	public function create_signature($data_arr=array())
	{

	ksort($data_arr);
	$signature='';
	foreach($data_arr as $data)
	{
			$signature .= $data;	
	}	
	
	$signature = md5($signature.LAWAPP_HASH);	
	return $signature;

	}//create_signature
	

public function verify_signature($data_arr=array(), $signature)
{

ksort($data_arr);

$sig='';
	foreach($data_arr as $data)
	{
			$sig .= $data;	
	}

$sig = md5($sig.LAWAPP_HASH);	

if($signature == $sig)	return true; else 	return false;


}//verify_signature

//--------------------------------------

}
