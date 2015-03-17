<div class="container container-top-padding margin-bottom">
<style>
.errorDivUkCode 
	{
		display: none;
	}
	.error_red
	{
		color:red !important;
	}
@charset "utf-8";
/* CSS Document */
</style>
<script type="text/javascript">
function sunmitClick()
{
	$( ".parsley-errors-list filled" ).appendTo( $( ".field" ));

}
$(document).ready( function(){ 
	$(".hide_agent").hide();
	$(".cb-enable").click(function(){
		var parent = $(this).parents('.switch');
		$('.cb-disable',parent).removeClass('selected');
		$(this).addClass('selected');
		$('.checkbox',parent).attr('checked', true);
	});
	$(".cb-disable").click(function(){
		var parent = $(this).parents('.switch');
		$('.cb-enable',parent).removeClass('selected');
		$(this).addClass('selected');
		$('.checkbox',parent).attr('checked', false);
	});
});
</script>
<style type="text/css">
	/* Used for the Switch effect: */
	.cb-enable, .cb-disable { width:auto !important; float:none; padding:0 !important; margin:0 !important; font-size:12px !important;}
	.cb-enable, .cb-disable, .cb-enable span, .cb-disable span { background: url(<?php echo base_url();?>application/assets/front/images/switch.gif) repeat-x; display: block; float: left; }
	.cb-enable span, .cb-disable span { line-height: 30px; display: block; background-repeat: no-repeat; font-weight: bold; }
	.cb-enable span { background-position: left -90px; padding: 0 10px; }
	.cb-disable span { background-position: right -180px;padding: 0 10px; }
	.cb-disable.selected { background-position: 0 -30px; }
	.cb-disable.selected span { background-position: right -210px; color: #fff; }
	.cb-enable.selected { background-position: 0 -60px; }
	.cb-enable.selected span { background-position: left -150px; color: #fff; }
	.switch label { cursor: pointer; }
	.signup_options{font-size:20px; padding-bottom:30px;}
	.signup_options a{
		display: inline-block;
  padding: 15px 0px;
  width:210px;
  background: #5ECADB;
  margin: 10px 5px;
  font-size: 20px;
  color: #FFF;
		}
	.signup_options a:hover{background:#397E88;}
	

	@media all and (max-width: 767px){
		.login-form label.cb-enable{width:49px !important; height:30px; float:left}
		.login-form label.cb-disable{width:101px !important; height:30px; float:left !important;}
		}
</style>
<script type="text/javascript">
	function hide_agent()
	{
		$(".hide_agent").hide();
	}
	function hide_client()
	{
		$(".hide_agent").show();
	}
</script>
<?php
	$ci_error	     =	((set_value('addressUkCode1'))?TRUE:FALSE); 
	$id	   		   =	(set_value('id'))?set_value('id'):(isset($data['id'])?$data['id']:'-1'); 
	$salutation	   =	(set_value('salutation'))?set_value('salutation'):(isset($data['salutation'])?$data['salutation']:''); 
	$first_name	   =	(set_value('first_name'))?set_value('first_name'):(isset($data['first_name'])?$data['first_name']:''); 
	$last_name		=	(set_value('last_name'))?set_value('last_name'):(isset($data['last_name'])?$data['last_name']:''); 
	$company_name     =	(set_value('company_name'))?set_value('company_name'):(isset($data['company_name'])?$data['company_name']:''); 
	$post_code		=	(set_value('addressUkCode1'))?set_value('addressUkCode1'):(isset($data['post_code'])?$data['post_code']:''); 
	$address_line1    =	(set_value('house_numberUkCode1'))?set_value('house_numberUkCode1'):(isset($data['address_line1'])?$data['address_line1']:''); 
	$address_line2    =	(set_value('streetUkCode1'))?set_value('streetUkCode1'):(isset($data['address_line2'])?$data['address_line2']:''); 
	$address_line3    =	(set_value('townUkCode1'))?set_value('townUkCode1'):(isset($data['address_line3'])?$data['address_line3']:''); 
	$address_line4    =	(set_value('countyUkCode1'))?set_value('countyUkCode1'):(isset($data['address_line4'])?$data['address_line4']:''); 
	$latitude         =	(set_value('latitudeUkCode1'))?set_value('latitudeUkCode1'):(isset($data['latitude'])?$data['latitude']:''); 
	$longitude		=	(set_value('longitudeUkCode1'))?set_value('longitudeUkCode1'):(isset($data['longitude'])?$data['longitude']:''); 
	$country_id	   =	(set_value('country_id'))?set_value('country_id'):(isset($data['country_id'])?$data['country_id']:''); 
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
	$preferred_cities =	(isset($data['preferred_cities'])? explode('@',$data['preferred_cities']):array()); 
	$experience_year  =	(set_value('experience_year'))?set_value('experience_year'):(isset($data['experience_year'])? $data['experience_year']:0); 
	$experience_month =	(set_value('experience_month'))?set_value('experience_month'):(isset($data['experience_month'])? $data['experience_month']:0); 
	$status		   =	(set_value('status'))?set_value('status'):(isset($data['status'])? $data['status']:"Active"); 
	
	?>
<div class="bredcrumb">
	<ul>
    	<li><a href="index.php">Home</a></li>
        <li>Register</li>
    </ul>
    <div class="clear"></div>
</div>   <!-- breadcrumb -->
<section id="signup">
	<div class="simple-panel">
    	<div class="panel-content">
    	<h2>Sign up Information</h2>
        
        <div class="login-form signup-form">
        	<div class="signup_options">
            	I am :<br />
                <a href="#">Client</a>
                <a href="#">Service Provider</a>
            </div>
        	<form class="form-horizontal" data-parsley-validate action="#" onsubmit="return sunmitClick()">
            
            	<div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        
                            <label>I'm:</label>
                            
                             <div class="form-field type-select">
                            <p class="switch">
                                    <input type="radio" id="radio1" name="level" value="3" onClick="return hide_agent()" style="display:none" checked />
                                    <input type="radio" id="radio2" name="level" value="2" style="display:none"  onClick="return hide_client()"  />
                                    <label for="radio1" class="cb-enable selected"><span>Client</span></label>
                                    <label for="radio2" class="cb-disable"><span>Service Provider</span></label>
									</p>
								<!--<a href="#" class="client">Client</a> <a href="#" class="sprovider active">Service Provider</a> <span class="mendatory-field">*</span>-->
                               		<!-- Client
                                	<input type="radio" name="level" onClick="return hide_agent()" value="3" required data-parsley-trigger="change"  />
                                    Service Provider
                                     <input type="radio" onClick="return hide_client()" name="level" value="2">-->
                                </div> 
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                    
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                    	<div class="control-group">
                            <div class="form-group">
                                <label for="email" class="control-label">Name:</label>
                                <div class="form-field">
                                    <select class="form-control field genre" name="salutation"  required data-parsley-trigger="change">
                                        <option  value="Mr">Mr.</option>
                                            <option  value="Miss">Miss.</option>
                                            <option  value="Mrs">Mrs.</option>
                                    </select>
                                    <span class='error_red'><?php echo form_error('salutation'); ?>&nbsp;</span>
                                </div>
                                <div class="form-field"><input required data-parsley-trigger="change" type="text" id="first_name" name="first_name" value=""  placeholder="First Name" class="field field-sm"> 
                                <span class='error_red'><?php echo form_error('first_name'); ?>&nbsp;</span>
                                </div>
                                <div class="form-field"><input type="text" id="last_name" value="" name="last_name" placeholder="Last Name" class="field field-sm"> 
                                <span class='error_red'><?php echo form_error('last_name'); ?>&nbsp;</span>
                                </div> <span class="mendatory-field">*</span>
                                <div class="clear"></div>
                            </div> <!-- form group -->
                            
                        </div> <!-- control group -->
                    </div>
                    <div class="clear"></div>
                </div> <!-- row -->
                
                <div class="row hide_agent">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Company Name:</label>
                            <input type="text" name="company"  required data-parsley-trigger="change" value="" placeholder="Your company name" class="field" />
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Address:</label>
                            <input type="text" name="address"  required data-parsley-trigger="change" value="" placeholder="Your address" class="field" /> 
                            <span class="mendatory-field">*</span>
                            
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Postcode:</label>
                            <input type="text"  name="addressUkCode1" id="addressUkCode1" required data-parsley-trigger="change" placeholder="Your postcode" class="addressUkCode field field-sm" /> 
                            <span class="mendatory-field">*</span>
                            <div class="form-addon"><a href="" class="dontKnowUkCode" id="dontKnowUkCode1">Find Adderess </a>Don't know? <a id="findAddressUkCode1" class="findAddressUkCode" href="">Click here</a>
                            
                            </div>
                            <div class="clear"></div>
                            <span class="errorDivUkCode" id="addressErrorDivUkCode1">
                           		 <span id="address_errorUkCode1" class="error_red">* Please provide a valid Status </span>
                            </span>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
              
                <div id='hiddenAddressFieldsUkCode1' class='hiddenAddressFieldsUkCode row-form clearfix <?php if((isset($id) && $id>0) || ($ci_error ==TRUE)) echo ""; else echo "errorDivUkCode"; ?>'> 
             		<div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Address:</label>
                            <input  required data-parsley-trigger="change" value="" type="text"  name="house_numberUkCode1" id="house_numberUkCode_hidden1" placeholder="Mention your experience here" class="field house_numberUkCode" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                             <span class='error_red'><?php echo form_error('house_numberUkCode1'); ?></span>
                             <span class="errorDivUkCode" id="house_number_noDivUkCode1">
                                                        <span id="house_number_noErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                        </div> <!-- form group -->
                    </div>
                </div>
                                             
                	<div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Street:</label>
                            <input  required data-parsley-trigger="change" value="" type="text" name="streetUkCode" id="streetUkCode_hidden1" placeholder="Mention your experience here" class="field streetUkCode" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                           <span class='error_red'><?php echo form_error('streetUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="streetDivUkCode1">
                                                        <span id="streetErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                        </div> <!-- form group -->
                    </div>
                </div>  
                	<div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Town:</label>
                            <input  required data-parsley-trigger="change" value="" type="text" name="townUkCode1" id="townUkCode_hidden1" placeholder="Mention your experience here" class="field townUkCode" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                          <span class='error_red'><?php echo form_error('townUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="townDivUkCode1">
                                                        <span id="townErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                        </div> <!-- form group -->
                    </div>
                </div> 
             						   <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Country:</label>
                            <input  required data-parsley-trigger="change" value="" type="text" name="countyUkCode1" id="countyUkCode_hidden1" placeholder="Mention your experience here" class="field countyUkCode" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                          <span class='error_red'><?php echo form_error('countyUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="countyDivUkCode1">
                                                        <span id="countyErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                        </div> <!-- form group -->
                    </div>
                </div>              
         			<div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Longitude:</label>
                            <input  required data-parsley-trigger="change" value="" type="text" readonly="readonly" name="longitudeUkCode1" id="longitudeUkCode_hidden1" 
                             class="field longitudeUkCode" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                          <span class='error_red'><?php echo form_error('longitudeUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="longitudeDivUkCode1">
                                                        <span id="longitudeErrorUkCode1" class="txt-pink span11">&nbsp; </span>
                                                     </span>
                        </div> <!-- form group -->
                    </div>
                </div>  
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Latitude:</label>
                            <input  required data-parsley-trigger="change" value="" type="text" readonly="readonly" name="latitudeUkCode1" id="latitudeUkCode_hidden1" class="field latitudeUkCode" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                          <span class='error_red'><?php echo form_error('latitudeUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="latitudeDivUkCode1">
                                                        <span id="latitudeErrorUkCode1" class="txt-pink span11">&nbsp;</span>
                                                     </span>
                        </div> <!-- form group -->
                    </div>
                </div>              
                
                                                                                
                                        </div>
             
               
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Country:</label>
                            <select class="form-control field chosen-select" name="country_id" value=""  required data-parsley-trigger="change"> 
                            	<option value="">Select Country :</option>
                                            <?php
												foreach($countries as $country)
												{ 
											?>
                                           			<option value="<?php echo $country['id']; ?>" />
													<?php echo $country['name']; ?></option>
                                            <?php
												}
											?>
                            </select> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Preferred Cities:</label>
                            <select class="form-control field chosen-select" multiple="multiple" name="preferred_cities[]" id="preferred_cities" required data-parsley-trigger="change"> 
                            	<option value="">Select City :</option>
                                            <?php
												foreach($cities as $city)
												{ 
											?>
                    <option value="<?php echo $city['id']; ?>" <?php echo (in_array($city['id'],$preferred_cities)?"selected":""); ?> />
                        <?php echo $city['name']; ?>
                    </option>
                                            <?php
												}
											?>
                            </select> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div>
                <div class="row hide_agent" >
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Prefered cities:</label>
                            <div class="control-group-list">
                            	<div class="row">
                                    <div class="controls col-sm-4">
                                   
                                        <label class="checkbox">
                                            <input type="checkbox" value="option1" id="inlineCheckbox1"> All cities
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" value="option2" id="inlineCheckbox2"> Central London
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" value="option3" id="inlineCheckbox3"> Luton
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="checkbox">
                                            <input type="checkbox" value="option1" id="inlineCheckbox1"> Manchester
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" value="option2" id="inlineCheckbox2"> Bradford
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" value="option3" id="inlineCheckbox3"> Chatham Kent
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="checkbox">
                                            <input type="checkbox" value="option1" id="inlineCheckbox1"> Birmingham
                                        </label>
                                        <label>Other</label>
                                        <input type="text" value="" id="" class="field-sm"> 
                                    </div>
                                </div>
                            </div> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Experience:</label>
                            <input  required data-parsley-trigger="change" value="" type="text" name="experience" placeholder="Mention your experience here" class="field" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Telephone:</label>
                            <input  required data-parsley-trigger="change" value="" type="text" name="telephone" placeholder="Your telephone no" class="field" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Mobile phone:</label>
                            <input  required data-parsley-trigger="change" value="" type="text" name="mobile" placeholder="Your mobile no" class="field" />
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Email address:</label>
                            <input  required data-parsley-trigger="change" value="" type="email" name="email" placeholder="Your email address" class="field" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Password:</label>
                            <input  required data-parsley-trigger="change" value="" type="text" name="password" placeholder="Your password" class="field" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Re-type password:</label>
                            <input  required data-parsley-trigger="change"  value="" type="text" name="company" placeholder="Confirm your password" class="field" /> <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                  <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Security Question:</label>
                            <select class="form-control field" name="security_question" id="security_question"  required data-parsley-trigger="change">
                           
                            	<option value="">Select Security Question</option>
                                            <?php
												foreach($security_questions as $question)
												{ 
											?>
                                           			<option value="<?php echo $question['id']; ?>" />
													<?php echo $question['question']; ?></option>
                                            <?php
												}
											?>
                            </select>    <span class="mendatory-field">*</span>
                             <span><?php echo form_error('security_question'); ?></span></div>
                         
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                  
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Answer:</label>
                            <input  required data-parsley-trigger="change" value="" type="text" name="security_answer" placeholder="Mention your experience here" class="field" /> <span class="mendatory-field">*</span>
                            <span class='error_red'><?php echo form_error('security_answer'); ?>&nbsp;</span>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div>
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>&nbsp;</label>
                            <div class="captcha"><img src="<?php echo base_url(); ?>application/assets/front/images/captcha-placeholder.png" class="img-responsive"></div>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>&nbsp;</label>
                        	<div class="signup-btn"><input type="submit" class="register-btn" value=""></div>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                
            </form>
            <div class="clear"></div>
        </div> <!-- login form -->
        </div> <!-- panel content -->
        
        <div class="clear"></div>
    </div> <!-- simple panel -->
</section>  

</div>
<script>
		var url   = "<?php echo site_url('admin/agents/uniqueLogin'); ?>";
		var form  = 'validation';
		var type = 'agents';
		jQuery(function(){
		jQuery('#email').on('blur',function(){validateUnique(form,url,type);});
	
		jQuery('#country_code').on('change',function(){
		
			jQuery("#preferred_cities").html('');
			jQuery('#preferred_cities').trigger("chosen:updated");
			
			jQuery.ajax({
				url:"<?php echo site_url('admin/agents/get_cities'); ?>",
				dataType:"json",
				data:{country_code:jQuery("#country_code").val()},
				type:"POST",
				success: function(data){
					
					if(jQuery.isArray(data))
						for(var i=0; i<data.length; i++)
						{
							if(typeof data[i]['id'] != 'undefined' && typeof data[i]['name'] != 'undefined')
								jQuery("#preferred_cities").append("<option value='"+data[i]['id']+"' >"+data[i]['name']+"</option>");
						}
						jQuery("#preferred_cities").trigger("chosen:updated");
						console.log(data);
					},
				error: function(msg){
					console.log(msg);
					}
				});
			
		
		});
		
		jQuery("[name='vat_registered']").on("click",function(){

			if(jQuery(this).is(':checked'))
			{
				var id_vat=jQuery(this).attr('id');
				switch(id_vat)
				{
					case "vat_registered":
							jQuery("#vat_div").show(1000);
							break;
					case "not_vat_registered":
							jQuery("#vat_div").hide(1000);
							break;
					default:
							break;
				}
			}
		});
		
		jQuery( "#vat_reg_date" ).datepicker();
	});	
	</script>