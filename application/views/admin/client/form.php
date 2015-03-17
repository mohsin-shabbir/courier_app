<style>
	.errorDivUkCode 
	{
		display: none;
	}
	.error_red
	{
		color:red !important;
	}
</style>
<?php
	$creator_id	   =	(set_value('creator_id'))?set_value('creator_id'):(isset($data['creator_id'])?$data['creator_id']:'0'); 
	$ci_error	     =	((set_value('addressUkCode1'))?TRUE:FALSE); 
	$id	   		   =	(set_value('id'))?set_value('id'):(isset($data['id'])?$data['id']:'-1'); 
	$salutation	   =	(set_value('salutation'))?set_value('salutation'):(isset($data['salutation'])?$data['salutation']:''); 
	$first_name	   =	(set_value('first_name'))?set_value('first_name'):(isset($data['first_name'])?$data['first_name']:''); 
	$last_name		=	(set_value('last_name'))?set_value('last_name'):(isset($data['last_name'])?$data['last_name']:''); 
	$company_name     =	(set_value('company_name'))?set_value('company_name'):(isset($data['company_name'])?$data['company_name']:''); 
	$country_code	 =	(set_value('country_code'))?set_value('country_code'):(isset($data['country_code'])?$data['country_code']:''); 	
	$post_code		=	(set_value('addressUkCode1'))?set_value('addressUkCode1'):(isset($data['post_code'])?$data['post_code']:''); 
	$address_line1    =	(set_value('house_numberUkCode1'))?set_value('house_numberUkCode1'):(isset($data['address_line1'])?$data['address_line1']:''); 
	$address_line2    =	(set_value('streetUkCode1'))?set_value('streetUkCode1'):(isset($data['address_line2'])?$data['address_line2']:''); 
	$address_line3    =	(set_value('townUkCode1'))?set_value('townUkCode1'):(isset($data['address_line3'])?$data['address_line3']:''); 
	$address_line4    =	(set_value('countyUkCode1'))?set_value('countyUkCode1'):(isset($data['address_line4'])?$data['address_line4']:''); 
	$latitude         =	(set_value('latitudeUkCode1'))?set_value('latitudeUkCode1'):(isset($data['latitude'])?$data['latitude']:''); 
	$longitude		=	(set_value('longitudeUkCode1'))?set_value('longitudeUkCode1'):(isset($data['longitude'])?$data['longitude']:''); 
	$telephone		=	(set_value('telephone'))?set_value('telephone'):(isset($data['telephone'])?$data['telephone']:''); 
	$mobile           =	(set_value('mobile'))?set_value('mobile'):(isset($data['mobile'])?$data['mobile']:''); 
	$email            =	(set_value('email'))?set_value('email'):(isset($data['email'])?$data['email']:''); 
	$password         =	(set_value('password'))?set_value('password'):(isset($data['password'])?$data['password']:''); 
	$confirm_password =	(set_value('confirm_password'))?set_value('confirm_password'):(isset($data['password'])?$data['password']:''); 
	$created_date     =	(set_value('created_date'))?set_value('created_date'):(isset($data['created_date'])?$data['created_date']:date('Y-m-d')); 
	$last_update      =	(set_value('last_update'))?set_value('last_update'):date('Y-m-d h:i:s'); 
    $old_profile_image=    (set_value('old_profile_image'))?set_value('old_profile_image'): (isset($data['profile_image'])?$data['profile_image']:"");
	$question_id	  =	(set_value('security_question'))?set_value('security_question'):(isset($data['security_question'])?$data['security_question']:''); 
	$security_answer  =	(set_value('security_answer'))?set_value('security_answer'):(isset($data['security_answer'])?$data['security_answer']:''); 
	$status		   =	(set_value('status'))?set_value('status'):(isset($data['status'])? $data['status']:"Active"); 

?>
         <div class="workplace">
<div class="row-fluid">
            	    <?php if($this->session->flashdata('error_message')){?>
        <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-ban-circle"></i><strong>Sorry! </strong>  <?php echo $this->session->flashdata('error_message'); ?>
        </div>
    <?php } ?>
    <?php if($this->session->flashdata('success_message')){?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fa fa-ok-sign"></i><strong>Success! </strong> <?php echo $this->session->flashdata('success_message'); ?>
        </div>
	<?php } ?>
    
    <?php if(isset($error_message)){?>
        <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-ban-circle"></i><strong>Sorry! </strong>  <?php echo $error_message; ?>
        </div>
    <?php } ?>
    <?php if(isset($sucess_message)){?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fa fa-ok-sign"></i><strong>Success! </strong> <?php echo $sucess_message; ?>
        </div>
	<?php } ?>
            </div>         
         
            <div class="row-fluid">
            		<form id="validation" class="validation_form_UkCode" method="POST" enctype="multipart/form-data" action="<?php echo site_url('admin/clients/save'); ?>" >
                    <div class="span12 block-fluid">
                        <div class="head clearfix">
                                <div class=""></div>
                                <h1>Client Form</h1>
                        </div>
                        <div style="margin-left:0 !important;" class="span6  block-fluid">
                            <div class="">                        
                                <div class="row-form clearfix">
                                    <div class="span3">Name:</div>
                                    <div class="span2">
                                        <select name="salutation" id="salutation">
                                            <option <?php echo ($salutation=="Mr")?"selected":""; ?> value="Mr">Mr.</option>
                                            <option <?php echo ($salutation=="Miss")?"selected":""; ?> value="Miss">Miss.</option>
                                            <option <?php echo ($salutation=="Mrs")?"selected":""; ?> value="Mrs">Mrs.</option>
                                        </select>
                                        <span class='error_red'><?php echo form_error('salutation'); ?>&nbsp;</span>
                                    </div>
                                    <div class="span3"><input placeholder="First Name" class="validate[required]" type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>"/>
                                    <span class='error_red'><?php echo form_error('first_name'); ?>&nbsp;</span></div>
                                    <div class="span3"><input  placeholder="Last Name" class="validate[required]" type="text" name="last_name" id="last_name"  value="<?php echo $last_name; ?>"/>
                                    <span class='error_red'><?php echo form_error('last_name'); ?>&nbsp;</span></div>
                                </div>                         
                                <?php /*?><div class="row-form clearfix">
                                    <div class="span3">Company Name:</div>
                                    <div class="span8">
                                      <input type="text" placeholder="" class="validate[required]" name="company_name" id="company_name"  value="<?php echo $company_name; ?>"/>
                                    <span class='error_red'><?php echo form_error('company_name'); ?>&nbsp;</span></div>
                                </div><?php */?>  

                                <div class="row-form clearfix">
                                    <div class="span3">Security Question:</div>
                                    <div class="span8">
                                    	<select class="chosen-select validate[required]" name="security_question" id="security_question">
                                        	<option value="">Select Security Question</option>
                                            <?php
												foreach($security_questions as $question)
												{ 
											?>
                                           			<option value="<?php echo $question['id']; ?>" <?php echo ($question['id']==$question_id)?"selected":""; ?> />
													<?php echo strtolower($question['question']); ?></option>
                                            <?php
												}
											?>
                                        </select>
                                    
                                    <span><?php echo form_error('security_question'); ?></span></div>
                                </div>
                                <div class="row-form clearfix">
                                    <div class="span3">Answer:</div>
                                    <div class="span8">
                                      <input type="text" placeholder="" class="validate[required ,maxSize[200]]" name="security_answer" id="security_answer"  value="<?php echo $security_answer; ?>"/>
                                    <span class='error_red'><?php echo form_error('security_answer'); ?>&nbsp;</span></div>
                                </div>  
                            <div class="row-form clearfix">
                                    <div class="span3">Country:</div>
                                    <div class="span8">
                                    	<select class="chosen-select validate[required]" name="country_code" id="country_code">
                                        	<option value="">Select Country :</option>
                                            <?php
												foreach($countries as $country)
												{ 
											?>
                                           			<option value="<?php echo $country['code']; ?>" <?php echo (($country['code'] == $country_code)?"selected":""); ?> />
													<?php echo $country['name']; ?></option>
                                            <?php
												}
											?>
                                        </select>
                                    
                                    <span class='error_red'><?php echo form_error('country_code'); ?></span></div>
                                </div>                                                                 
                                <div class="row-form clearfix">
                                    <div class="span3" >Postcode:</div>
                                    <div class="span8">
                                        <input type="text" name="addressUkCode1" class="addressUkCode" id="addressUkCode1"  value="<?php echo $post_code; ?>"/>
                                        <span class='error_red'><?php echo form_error('addressUkCode1'); ?></span>
                                        <span class="errorDivUkCode" id="addressErrorDivUkCode1">
                                            <span id="address_errorUkCode1" class="error_red">* Please provide a valid Status </span>
                                        </span>
                                    </div>
                                    <div class="span5" style="margin-left:27% !important;">
                                        <a style="text-decoration:underline;" id="findAddressUkCode1" class="findAddressUkCode" href="" >Find Address</a> &nbsp;&nbsp;
                                        <a style="text-decoration:underline;" href="" class="dontKnowUkCode" id="dontKnowUkCode1" > Don't Know? </a>
                                    </div>
                                </div>
                                <div id='hiddenAddressFieldsUkCode1' class='hiddenAddressFieldsUkCode row-form clearfix <?php if((isset($id) && $id>0) || ($ci_error ==TRUE)) echo ""; else echo "errorDivUkCode"; ?>'>
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Address:</div>
                                                <div class="span8">
                                                    <input type="text"  class="house_numberUkCode validate[required]" name="house_numberUkCode1" id="house_numberUkCode_hidden1"  value="<?php echo $address_line1; ?>"/>
                                                    <span class='error_red'><?php echo form_error('house_numberUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="house_number_noDivUkCode1">
                                                        <span id="house_number_noErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>      
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Street:</div>
                                                <div class="span8">
                                                    <input type="text" class="streetUkCode" name="streetUkCode1" id="streetUkCode_hidden1"  value="<?php echo $address_line2; ?>"  />
                                                    <span class='error_red'><?php echo form_error('streetUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="streetDivUkCode1">
                                                        <span id="streetErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>      
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Town:</div>
                                                <div class="span8">
                                                    <input type="text" class="townUkCode" name="townUkCode1" id="townUkCode_hidden1"  value="<?php echo $address_line3; ?>" />
                                                    <span class='error_red'><?php echo form_error('townUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="townDivUkCode1">
                                                        <span id="townErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>      
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Country:</div>
                                                <div class="span8">
                                                    <input type="text" class="countyUkCode" name="countyUkCode1" id="countyUkCode_hidden1"  value="<?php echo $address_line4; ?>" />
                                                    <span class='error_red'><?php echo form_error('countyUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="countyDivUkCode1">
                                                        <span id="countyErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Longitude:</div>
                                                <div class="span8">
                                                    <input type="text"  class="longitudeUkCode" readonly="readonly" name="longitudeUkCode1" id="longitudeUkCode_hidden1" value = "<?php echo $longitude; ?>"/>
                                                    <span class='error_red'><?php echo form_error('longitudeUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="longitudeDivUkCode1">
                                                        <span id="longitudeErrorUkCode1" class="txt-pink span11">&nbsp; </span>
                                                     </span>
                                                </div>
                                            </div>
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Latitude:</div>
                                                <div class="span8">
<input type="text" class="latitudeUkCode" readonly="readonly" name="latitudeUkCode1" id="latitudeUkCode_hidden1" value = "<?php echo $latitude; ?>"/>
                                                    <span class='error_red'><?php echo form_error('latitudeUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="latitudeDivUkCode1">
                                                        <span id="latitudeErrorUkCode1" class="txt-pink span11">&nbsp;</span>
                                                     </span>
                                                </div>
                                            </div>                                    
                                        </div>                         
                                <div class="row-form clearfix">
                                    <div class="span12 responseUkCode" id="responseUkCode1">
                                    </div>
                                 </div>                           
                            </div>
                        </div>
                        <div class="span6 block-fluid">
                            <div class="">                        

                                <div class="row-form clearfix">
                                	<div class="span4">
                                    	&nbsp;
                                    </div>
                                    <div class="span8">        
                                        <img src="<?php if(!empty($old_profile_image)) 
														{
															if(file_exists(CLIENT_IMAGE_PATH.$old_profile_image))
																 echo base_url(CLIENT_IMAGE_PATH)."/".$old_profile_image; 
															else  
																echo base_url('upload')."/image_not_found.png"; 
														}
														else  
															echo base_url('upload')."/placeholder.jpg"; ?>" width="200" height="200" />
                                        <span>&nbsp;</span>
                                    </div>
                                </div>                            

                                <div class="row-form clearfix">
                                    <div class="span3">Profile Image:</div>
                                    <div class="span9">        
                                        <input type="file" name="profile_image" id="profile_image"/>
                                        <span class='error_red'><?php echo form_error('profile_image'); ?>&nbsp;</span>
                                    </div>
                                </div>                            
 
                                <div class="row-form clearfix">
                                    <div class="span3">Telephone:</div>
                                    <div class="span9"><input class="validate[groupRequired[phone_group],custom[phone]]" type="text" name="telephone" id="telephone"  value="<?php echo  $telephone; ?>"/> 
                                    <span class='error_red'><?php echo form_error('telephone'); ?> &nbsp;</span></div>
                                </div>                         
        
                                <div class="row-form clearfix">
                                    <div class="span3">Mobile phone:</div>
                                    <div class="span9"><input  class="validate[groupRequired[phone_group],custom[phone]]" type="text" name="mobile" id="mobile"  value="<?php echo $mobile; ?>" />  
                                    <span class='error_red'><?php echo form_error('mobile'); ?>&nbsp;</span></div>
                                </div>                                                                                 
        
                                <div class="row-form clearfix">
                                    <div class="span3">Email address:</div>
                                    <div class="span9">
                                   <input class="validate[required,custom[email]]" type="text" name="email" id="email"  value="<?php echo $email;  ?>" />  
                                    <span class='error_red'><?php echo form_error('email'); ?>&nbsp;</span></div>
                                </div>                                                                                 
                                    
                                <div class="row-form clearfix">
                                    <div class="span3">Password:</div>
                                    <div class="span9">        
                                        <input <?php if(($id < 0)){ ?> class="validate[required,minSize[8]]"  type="password" <?php } else{ echo "type='text'";  } ?>value="<?php echo $password; ?>" name="password" id="password" />
                                        <span class='error_red'><?php echo form_error('password'); ?>&nbsp;</span>
                                    </div>
                                </div>      
                                <div class="row-form clearfix">
                                    <div class="span3">Re-Type Password:</div>
                                    <div class="span9">        
                                        <input <?php if(empty($id)){ ?> class="validate[required,equals[password]]" <?php } ?> type="password" name="confirm_password" id="confirm_password" value="<?php echo $confirm_password; ?>"/>
                                        <span class='error_red'><?php echo form_error('confirm_password'); ?>&nbsp;</span>
                                    </div>
                                </div>                                  
                              </div>
                        </div>
                        <div class="span11">
                        	&nbsp;
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="span4">
                                	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                                    <input type="hidden" name="creator_id" id="creator_id" value="<?php echo $creator_id; ?>" />
                                   <input type="hidden" name="status" id="status" value="<?php echo $status; ?>" />                                    
                                   <input type="hidden" name="old_profile_image" id="old_profile_image" value="<?php echo $old_profile_image; ?>" />
                                	<input type="hidden" name="created_date" id="created_date" value="<?php echo $created_date; ?>" />
                                    <input type="hidden" name="last_update" id="last_update" value="<?php echo $last_update; ?>" />
                                </div>
                                <div class="span4" style="text-align:center;">
                                    <div class="span6"><input type="submit" class="btn btn-block" id="submit_button_client" value="<?php if($id== -1) echo "SAVE"; else echo "UPDATE"; ?>"></div>
                                    <div class="span6"><input type="reset" class="btn btn-block btn-danger" value="RESET" /></div>
                                 </div>
                                 <div class="span4">
                                 </div>
                              </div>
                            </div>                
                    </div>
                    </form>
            </div>
         </div>
         <div class="dr"><span></span></div>
   <script>
		var url   = "<?php echo site_url('admin/clients/uniqueLogin'); ?>";
		var form  = 'validation';
		var type = 'clients';
		jQuery('#email').on('blur',function(){validateUnique(form,url,type);});

	</script>