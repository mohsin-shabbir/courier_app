<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	protected $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('common_model','db_handler',true);
		$this->encrypt->set_cipher(MCRYPT_BLOWFISH);
		$this->encrypt->set_mode(MCRYPT_MODE_CBC);		
	}
	
		//function that controls the access to admin panel
		public function __admin() 
		{
			parent::__construct();
			$this->load->model('common_model','db_handler',true);
			$this->manage_tasks();
			$this->data['project_name']   =  $this->config->item('project_name');
			$this->data['s_controller']   =  $this->uri->segment_array();
			
			if(isset($this->data['s_controller'][1]))
				$this->data['s_controller']	=	$this->data['s_controller'][1];
	
			$this->data['s_class']		= 	$this->router->class;
			$this->data['s_function']     =    $this->router->method;
			  
			$this->encrypt->set_cipher(MCRYPT_BLOWFISH);
			$this->encrypt->set_mode(MCRYPT_MODE_CBC);  
		
			$admin = ($this->session->userdata('admin'))?$this->session->userdata('admin'):array();
			$this->load->model('common_model', 'db_handler');
   			$notAuth_functions = array('login', 'logout');
		  
		  	$this->data['countries']	=	$this->db_handler->get('countries');

			if(!empty($admin['user_id']))
			{
				if($this->data['s_class'] == 'login')
				{
					redirect('admin');
				}
		  	}
		  	else
			{
				if(!in_array($this->data['s_function'],$notAuth_functions) && $this->data['s_class'] != 'login')
				{
					$this->session->set_flashdata('error_message','Please login to proceed');
					redirect('admin/login');
				}
			}

	}
	public function __agent()
	{
		parent::__construct();
		$this->load->model('common_model','db_handler',true);
		$this->manage_tasks();
	}
	
	public function __client()
	{
		parent::__construct();
		$this->load->model('common_model','db_handler',true);
		$this->manage_tasks();
	}

	private function manage_tasks()
	{
		$this->db_handler->delete_expired_captcha();
		$this->db_handler->update_expired_jobs();
	}

	public function get_address_uk()
	{
		$address_fields		=	"Error: Address not found.";
		if($address = $this->input->post('codeUkCode'))
		{	
			$string			=	preg_replace('/\s+/','',$address);
			$ch 				=	curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://api.getAddress.io/uk/$string?api-key=".UK_POSTCODE_API_KEY);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$result 			=	curl_exec($ch);
			if(!empty($result))
			{
				$response				       =	json_decode($result,true);
				if(isset($response['Latitude']) && isset($response['Longitude']))
				{
					$this->data['case']		 =	"1st";
					$this->data['latitude']  	 =	$response['Latitude'];
					$this->data['longitude'] 	=	$response['Longitude'];
					$this->data['Addresses'] 	=	$response['Addresses'];
					if($this->input->post('front_side'))				
						$address_fields=$this->load->view('admin/uk_code_front_view',$this->data,true);
					else
						$address_fields=$this->load->view('admin/uk_code_view',$this->data,true);
				}
			}
			curl_close($ch);
		}//end of if condition
		else if($fullDropDownAddress	    =	$this->input->post('fullDropDownAddressUkCode'))
		{
			$this->data['case']		  	 = "2nd";
			$splitArray	             	 = explode(',' , $fullDropDownAddress);
			if(isset($splitArray[0]))
				$this->data['receiptName']  = $splitArray[0];
			if(isset($splitArray[1]))
				$this->data['street']	   = $splitArray[1];
			if(isset($splitArray[2]))
				$this->data['town']		 = $splitArray[2];
			if(isset($splitArray[3]))
				$this->data['county']	   = $splitArray[3];
			$this->data['latitude']  	     = $this->input->post('latitudeUkCode');  
			$this->data['longitude'] 	    = $this->input->post('longitudeUkCode');
			$this->data['counter']		  = $this->input->post('counter');
			if($this->input->post('front_side'))				
				$address_fields=$this->load->view('admin/uk_code_front_view',$this->data,true);
			else
				$address_fields=$this->load->view('admin/uk_code_view',$this->data,true);
		}
		else if($findPostCode	  =	$this->input->post('findPostCodeUkCode'))
		{
			$address	  		   = 	urlencode($findPostCode);
			$string				=	preg_replace('/\s+/','',$address);
			$ch					=	curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/geocode/json?address=".$string."&key=".GOOGLE_GEOLOC_API_KEY);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$result 	=	curl_exec($ch);
			$result	=	json_decode($result,true);
			$data=array();
			curl_close($ch);
			header('Content-Type: application/json');
			if(isset($result['status']))
			{
				
				switch($result["status"])
				{
					case "OK":
								if(isset($result['results']))
								{
									$results=$result['results'];
									$first_result=reset($results);
									if(isset($first_result['address_components']))
									{
										$response_addresses=$first_result['address_components'];
										foreach($response_addresses as $address_component)
										{
											if(isset($address_component['types']) && in_array('postal_code',$address_component['types']))
											{
												if(isset($address_component['long_name']))
												{
													$data['post_code']	=	$address_component['long_name'];
												}
											}
										}
										if(isset($first_result['geometry']['location']['lat']) && isset($first_result['geometry']['location']['lng']))
										{
											$data['longitude']	=	$first_result['geometry']['location']['lng'];
											$data['latitude']	 =	$first_result['geometry']['location']['lat'];
										}
										
									}
								}
								
								if(isset($data['post_code']) && isset($data['latitude']) && isset($data['longitude']))
								{
									$data['error']='0';
									echo json_encode($data);
									exit;
								}
								break;
					default:
								break;
				}
			}
			$data['error']='1';
			$data['message']=isset($result['message'])?$result['message']:"error getting post code";
			$data['response']=$result;
			echo json_encode($data);
			exit;
		}
		echo $address_fields;
		exit;
	}
	protected function find_city_from_postcode($post_code="")
	{
		$cities=array();
		if(!empty($post_code) && (strcmp('valid',$this->check_uk_postcode($post_code))==0))
		{
			$string			=	preg_replace('/\s+/','',$post_code);
			$ch 				=	curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://api.getAddress.io/uk/$string?api-key=".UK_POSTCODE_API_KEY);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$result 			=	curl_exec($ch);
			 /*
			 $result['Latitude']	 =	52.205721;
			 $result['Longitude']	=	0.114703;
			 $result['Addresses']	=	array('Trinity Hall, CAMBRIDGE','city hall, oxford');
     						[Longitude] => 0.114703
    [Addresses] => Array
        (
            [0] => Trinity Hall, CAMBRIDGE
        )*/
			if(!empty($result))
			{
				$response				 =	json_decode($result,true);
				$data	     			 =	array();
				if(isset($response['Latitude']) && isset($response['Longitude']))
				{
					$data['latitude']  	 =	$response['Latitude'];
					$data['longitude'] 	=	$response['Longitude'];
				}
				$data['Addresses'] 	=	array();
				if(!empty($response['Addresses']) && is_array($response['Addresses']))
				{
					foreach($response['Addresses'] as $addresses)
					{
						$splitArray	       =	explode(',' , $addresses);
						if(isset($splitArray[1]))
							$data['Addresses'][] =	$splitArray[1];
						if(isset($splitArray[2]))
							$data['Addresses'][] =	$splitArray[2];
						if(isset($splitArray[3]))
							$data['Addresses'][] =	$splitArray[3];
					}
					$data['Addresses']=array_unique($data['Addresses']);
				}
				$cities	=	$data;
			}
			curl_close($ch);
		}
		return $cities;
	}
	protected function check_uk_postcode($string)
	{
    	// Start config
    	$valid_return_value = 'valid';
    	$invalid_return_value = 'invalid';
    	$exceptions = array('BS981TL', 
							'BX11LT', 
							'BX21LB', 
							'BX32BB', 
							'BX55AT', 
							'CF101BH', 
							'CF991NA', 
							'DE993GG', 
							'DH981BT', 
							'DH991NS', 
							'E161XL', 
							'E202AQ', 
							'E202BB', 
							'E202ST', 
							'E203BS', 
							'E203EL', 
							'E203ET', 
							'E203HB', 
							'E203HY',
							'E981SN', 
							'E981ST', 
							'E981TT', 
							'EC2N2DB', 
							'EC4Y0HQ', 
							'EH991SP', 
							'G581SB', 
							'GIR0AA', 
							'IV212LR', 
							'L304GB', 
							'LS981FD', 
							'N19GU', 
							'N811ER', 
							'NG801EH', 
							'NG801LH', 
							'NG801RH', 
							'NG801TH', 
							'SE18UJ', 
							'SN381NW', 
							'SW1A0AA', 
							'SW1A0PW', 
							'SW1A1AA', 
							'SW1A2AA', 
							'SW1P3EU', 
							'SW1W0DT', 
							'TW89GS', 
							'W1A1AA', 
							'W1D4FA', 
							'W1N4DJ');
    	// Add Overseas territories ?
    	array_push($exceptions, 'AI-2640', 'ASCN1ZZ', 'STHL1ZZ', 'TDCU1ZZ', 'BBND1ZZ', 'BIQQ1ZZ', 'FIQQ1ZZ', 'GX111AA', 'PCRN1ZZ', 'SIQQ1ZZ', 'TKCA1ZZ');
    	// End config

    	$string = strtoupper(preg_replace('/\s/', '', $string)); // Remove the spaces and convert to uppercase.
    	$exceptions = array_flip($exceptions);
    	if(isset($exceptions[$string]))
		{
			return $valid_return_value;
		} // Check for valid exception
    	$length = strlen($string);
    	if($length < 5 || $length > 7)
		{
			return $invalid_return_value;
		} // Check for invalid length
    	$letters = array_flip(range('A', 'Z')); // An array of letters as keys
    	$numbers = array_flip(range(0, 9)); // An array of numbers as keys
    	switch($length)
		{
        	case 7:
            	if(!isset($letters[$string[0]], $letters[$string[1]], $numbers[$string[2]], $numbers[$string[4]], $letters[$string[5]], $letters[$string[6]]))
				{
					break;
				}
            	if(isset($letters[$string[3]]) || isset($numbers[$string[3]]))
				{
                	return $valid_return_value;
        		}
        		break;
        case 6:
            if(!isset($letters[$string[0]], $numbers[$string[3]], $letters[$string[4]], $letters[$string[5]]))
			{
				break;
			}
            if(isset($letters[$string[1]], $numbers[$string[2]]) || isset($numbers[$string[1]], $letters[$string[2]]) || isset($numbers[$string[1]], $numbers[$string[2]]))
			{
                return $valid_return_value;
            }
        	break;
        case 5:
            if(isset($letters[$string[0]], $numbers[$string[1]], $numbers[$string[2]], $letters[$string[3]], $letters[$string[4]]))
			{
                return $valid_return_value;
            }
        	break;
    	}
	    return $invalid_return_value;
	}
	public function uniqueLogin()
    {
		$result=false;
        if($this->input->post('email_to_test') && $this->input->post('type'))
		{
			$result=$this->db_handler->uniqueLogin($this->input->post('type'),$this->input->post('email_to_test'),$this->input->post('id_to_test')); 
		}
		echo $result;
    }
	public function generate_captcha($inquirer="")
	{
		$refresh_captcha=$this->input->post('refresh_captcha');
		$captcha = array();
		if(!empty($inquirer))
		{
			switch($inquirer)
			{
				case "CLIENT":
				case "AGENT":
				case "JOB":
						$this->load->helper('captcha');
						if(!empty($refresh_captcha))
						{
							$bad_request		  =	FALSE;
							$ip				   =	$this->input->ip_address();
							$old_captcha	   	  =	explode('/',$refresh_captcha);
							if(!empty($old_captcha) && is_array($old_captcha) && !empty($ip))
							{
								$old_captcha	  =	end($old_captcha);
								$full_name		=	$old_captcha;
								$old_captcha	  =	explode('.',$full_name);
								
								if(!empty($old_captcha[0]) && !empty($old_captcha[1]) && !empty($old_captcha[2]))
								{
									if(!$this->db_handler->delete("captcha",array("time"=>$old_captcha[0],"ip_address"=>$ip,"form_type"=>$inquirer)))
									{	echo "error in database";
										exit;
									}
									if(file_exists(CAPTCHA_IMAGE_PATH.$full_name))
										unlink(CAPTCHA_IMAGE_PATH.$full_name);
								}
								else
									$bad_request	=	TRUE;
							}
							else
								$bad_request	=	TRUE;
							if(!empty($bad_request))
							{
								$this->output->set_status_header('400');
								echo json_encode(array('error'=>'1'));
								exit;
							}
						}
						$bits	=	4;
						$random_string=bin2hex(openssl_random_pseudo_bytes($bits));
						$vals = array(
									'word'		=>	$random_string,
									'img_path'	=>	CAPTCHA_IMAGE_PATH,
									'img_url'	 =>	base_url().CAPTCHA_IMAGE_PATH,
									'font_path'   =>	CAPTCHA_FONT_PATH,
									'img_width'   =>	'280',
									'img_height'  =>	'100',
									'expiration'  =>	CAPTCHA_EXPIRY_TIME
								);
						$captcha	=	create_captcha($vals);
						if(!empty($captcha))
						{
							$ip				    	 	=	$this->input->ip_address();
							$captcha_data				  =	array();
							$captcha_data['time']		  =	$captcha['time'];
							$captcha_data['ip_address']	=	$ip;
							$captcha_data['word']		  =	$captcha['word'];
							$captcha_data['form_type']	 =	$inquirer;
							$this->db_handler->save('captcha',$captcha_data);
						}
							break;
				default:
							break;
			}
		}
		if(!empty($refresh_captcha))
		{
			$captcha	=	json_encode($captcha);
			header('Content-Type:application/json');
			echo $captcha;
			exit;
		}
		return $captcha;
	}

	public function validate_captcha($word="",$form_type="")
	{ 
		if(!empty($word) && !empty($form_type) && $this->input->post('str_check'))
		{
			$time	  =	$this->input->post('str_check');
			if(!empty($time))
			{
				$time  =	explode('.',$time);
				if(!empty($time[0]))
					$time	=	$time[0];
				else
					$time	=	"";
			}
			$ip		=	$this->input->ip_address();
			$is_image  =	$this->db_handler->get('captcha',array('ip_address'=>$ip,'form_type'=>$form_type,'time'=>$time, 'where_string'=>array("created >= (NOW() - INTERVAL ".CAPTCHA_EXPIRY_TIME." SECOND)" ,"UPPER(word)='".strtoupper($word)."'")));
			if(!empty($is_image[0]))
				return TRUE;
		}
		$this->form_validation->set_message('validate_captcha', "Plz enter correct security code");
		return FALSE;
	}

	public function get_cities()
	{//array("status"=>array("Awarded","Collected")
		if($country_code=$this->input->post('country_code'))
		{
		$cities=$this->db_handler->get_paged_data_by_sql('cities.id, cities.name','cities', array('or_where'=> array("country" => array('ZZ',$country_code)),"where_string"=>array("cities.name <> ''")),"","","","","","",'cities.name');
			echo json_encode($cities,true);
			exit;
		}
	}
}