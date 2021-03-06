<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');
/* Custom constants */

define('ACCOUNT_CREATION_EMAIL_SUBJECT','New account set up at Law Firm Application');
//define('UPDATE_EMAIL_MESSAGE','New account set up at Law Firm Application');

define('ENCRYPT_KEY',	 'ATTA-UL-MOHSIN');
define('GOOGLE_GEOLOC_API_KEY','AIzaSyC5j_OO13fkM3W2p4rmu-8upuCfGkaL9L0');
//define('UK_POSTCODE_API_KEY','C3LeKog1a0qed9WFf_1x7Q217');
//define('UK_POSTCODE_API_KEY','3EMCjOmV9UeYfgNqWcnOUQ127');
///define('UK_POSTCODE_API_KEY','C3LeKog1a0qed9WFf_1x7Q217');
///define('UK_POSTCODE_API_KEY','3EMCjOmV9UeYfgNqWcnOUQ127');
//define('UK_POSTCODE_API_KEY','oir-VpQFv0-J-2xbgVYdlw335');
//define('UK_POSTCODE_API_KEY','eJPzEWS-zEqYJvQgRzyGYQ336');
define('UK_POSTCODE_API_KEY','nODC1CHQZUqqVb39CGtSQw339');


define('AGENT_IMAGE_PATH','upload/agents/');
define('AGENT_IMAGE_SIZE','1024');
define('AGENT_IMAGE_TYPE',"jpeg|jpg|png|bmp");


define('AGENT_THUMB_PATH','upload/agents/thumbs/');
define('AGENT_THUMB_WIDTH','150');
define('AGENT_THUMB_HEIGHT',"150");

define('CLIENT_IMAGE_PATH','upload/clients/');
define('CLIENT_IMAGE_SIZE','1024');
define('CLIENT_IMAGE_TYPE',"jpeg|jpg|png|bmp");


define('CLIENT_THUMB_PATH','upload/clients/thumbs/');
define('CLIENT_THUMB_WIDTH','150');
define('CLIENT_THUMB_HEIGHT',"150");

define('LIST_PAGE_RECORDS',"10");


//CAPTCHA CONSTANTS
define('CAPTCHA_IMAGE_PATH','captcha/');
define('CAPTCHA_EXPIRY_TIME','1800');
define('CAPTCHA_FONT_PATH','application/assets/fonts/captcha/zreaks nfi.ttf');


//SEARCH FIELDS 
define('AGENT_SEARCH_COLS',serialize (array('agents.first_name','agents.last_name','agents.email','agents.address_line1','agents.address_line2','agents.address_line3','agents.address_line4','agents.telephone','agents.mobile','agents.preferred_cities','agents.status')));
define('CLIENT_SEARCH_COLS',serialize (array('clients.first_name','clients.last_name','clients.email','clients.address_line1','clients.address_line2','clients.address_line3','clients.address_line4','clients.telephone','clients.mobile','clients.status')));
define('JOB_SEARCH_COLS',serialize (array('title','jobs.status', 'post_date', 'pickup_address_line1', 'pickup_address_line2', 'pickup_address_line3', 'pickup_address_line4', 'destination_address_line1', 'destination_address_line2', 'destination_address_line3', 'destination_address_line4','first_name','last_name','email')));

///////////////////////Emails Settings/////////////////////////////////
define('REGISTRATION_REPLY_TO',	 'replyto@mobitsolutions.com');
define('REGISTRATION_FROM_EMAIL','from@courierapp.com');
define('REGISTRATION_CC','cc@mobitsolutions.com');
define('REGISTRATION_BCC','bcc@mobitsolutions.com');
define('FROM_NAME','From:Courier App');

/////////////////////////////////////////Pay pal pro/////////////////////////////////
 define('API_USERNAME', 'mohsin_api1.mobitsoutions.com'); 
 define('API_PASSWORD', '8GW6AH897Y24JPFR');
 define('API_SIGNATURE', 'A.wv1CuktldG9Iq2MJ-.vc9vxQVXAxphRI5y.pzXzHUa7aBqiHZie8qu');
 define('API_ENDPOINT', 'https://api-3t.sandbox.paypal.com/nvp');
 define('SUBJECT','');
 define('USE_PROXY',FALSE);
 define('PROXY_HOST', '127.0.0.1');
 define('PROXY_PORT', '808');
 define('PAYPAL_URL', 'https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=');
 define('VERSION', '65.1');
 define('ACK_SUCCESS', 'SUCCESS');
 define('ACK_SUCCESS_WITH_WARNING', 'SUCCESSWITHWARNING');
 define('CURRENCY_ID','GBP');
 define('URL','198.50.129.105/mohsin/paypalPro/');
 define('SSL_URL','198.50.129.105/mohsin/paypalPro/');
 define('AUTH_TOKEN','');
 define('AUTH_SIGNATURE','');
 define('AUTH_TIMESTAMP','');
 define('ITEMS_PER_PAGE','2');
 define('JOB_EXPIRY_DURATION','28');
/* End of file constants
.php */
/* Location: ./application/config/constants.php */