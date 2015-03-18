<style>
	.errorDivUkCode 
	{
		display: none;
	}
	.radio input[type="radio"], .checkbox input[type="checkbox"] 
	{
		margin-left: 0px !important;
	}
</style>
<script>
function checkPostalCode()
{
	if(document.getElementById("addressUkCode1").value == document.getElementById("addressUkCode2").value )
	{
		alert("Destination and pick up address can not be same.");
		return false;
	}
}
</script>
<?php
	$creator_id	   			  =	(set_value('creator_id'))?set_value('creator_id'):(isset($data['creator_id'])?$data['creator_id']:'0'); 
	$ci_error	   				=	((set_value('addressUkCode1'))?TRUE:FALSE); 
	$id						  =	(set_value('id'))?set_value('id'):(isset($data['id'])?$data['id']:'-1'); 
	$weight_type				 =	(set_value('weight_type'))?set_value('weight_type'):(isset($data['weight_type'])?$data['weight_type']:''); 
	$title					   =	(set_value('title'))?set_value('title'):(isset($data['title'])?$data['title']:''); 
	$post_date				   =	(set_value('post_date'))?set_value('post_date'):(isset($data['post_date'])?date('d-m-Y',strtotime($data['post_date'])):''); 
	$client_id				   =	(set_value('client_id'))?set_value('client_id'):(isset($data['client_id'])?$data['client_id']:''); 
	$description				 =	(set_value('description'))?set_value('description'):(isset($data['description'])?$data['description']:''); 
	$pickup_post_code			=	(set_value('addressUkCode1'))?set_value('addressUkCode1'):(isset($data['pickup_post_code'])?$data['pickup_post_code']:''); 
	$destination_post_code	   =	(set_value('addressUkCode2'))?set_value('addressUkCode2'):(isset($data['destination_post_code'])?$data['destination_post_code']:''); 

	$pickup_address_line1    	=	(set_value('house_numberUkCode1'))?set_value('house_numberUkCode1'):(isset($data['pickup_address_line1'])?$data['pickup_address_line1']:''); 
	$pickup_address_line2    	=	(set_value('streetUkCode1'))?set_value('streetUkCode1'):(isset($data['pickup_address_line2'])?$data['pickup_address_line2']:''); 
	$pickup_address_line3    	=	(set_value('townUkCode1'))?set_value('townUkCode1'):(isset($data['pickup_address_line3'])?$data['pickup_address_line3']:''); 
	$pickup_address_line4    	=	(set_value('countyUkCode1'))?set_value('countyUkCode1'):(isset($data['pickup_address_line4'])?$data['pickup_address_line4']:''); 

	$destination_address_line1   =	(set_value('house_numberUkCode2'))?set_value('house_numberUkCode2'):(isset($data['destination_address_line1'])?$data['destination_address_line1']:''); 
	$destination_address_line2   =	(set_value('streetUkCode2'))?set_value('streetUkCode2'):(isset($data['destination_address_line2'])?$data['destination_address_line2']:''); 
	$destination_address_line3   =	(set_value('townUkCode2'))?set_value('townUkCode2'):(isset($data['destination_address_line3'])?$data['destination_address_line3']:''); 
	$destination_address_line4   =	(set_value('countyUkCode2'))?set_value('countyUkCode2'):(isset($data['destination_address_line4'])?$data['destination_address_line4']:''); 
$pickup_latitude     	     =	(set_value('latitudeUkCode1'))?set_value('latitudeUkCode1'):(isset($data['pickup_latitude'])?$data['pickup_latitude']:'');
$pickup_longitude			=	(set_value('longitudeUkCode1'))?set_value('longitudeUkCode1'):(isset($data['pickup_longitude'])?$data['pickup_longitude']:'');$destination_latitude		=	(set_value('latitudeUkCode2'))?set_value('latitudeUkCode2'):(isset($data['destination_latitude'])?$data['destination_latitude']:''); 
$destination_longitude       =	(set_value('longitudeUkCode2'))?set_value('longitudeUkCode2'):(isset($data['destination_longitude'])?$data['destination_longitude']:''); 
$created_date     			=	(set_value('created_date'))?set_value('created_date'):(isset($data['created_date'])?$data['created_date']:date('Y-m-d')); 
$last_update      			 =	(set_value('last_update'))?set_value('last_update'):date('Y-m-d h:i:s'); 
$job_action				  =	(set_value('job_action')?set_value('job_action'):"Waiting"); 	
$job_status				  =    (set_value('status'))?set_value('status'): (isset($data['status'])?$data['status']:"Waiting");

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
            		<form id="validation" onsubmit="return checkPostalCode()" class="validation_form_UkCode" method="POST" enctype="multipart/form-data" action="<?php echo site_url('admin/jobs/save'); ?>" >
                    <div class="span12 block-fluid">
                        <div class="head clearfix">
                            <div class=""></div>
                            <h1>Job Form</h1>
                        </div>
                        <div style="margin-left:0 !important;" class="span6">
                            <div class="block-fluid">    
                                <div class="row-form clearfix">
                                    <div class="span5">Select Weight Type:</div>
                                    <div class="span7">
                                        <label class="checkbox inline">
                                            <input type="radio" name="weight_type"  checked="checked" value="500g"/> 500g Satchal
                                        </label>
                                        <label class="checkbox inline">
                                            <input type="radio" name="weight_type" <?php if($weight_type=='1kg')echo "checked='checked'"; ?> value="1kg" /> 1kg Satchal
                                        </label>
                                        <label class="checkbox inline">
                                            <input type="radio" name="weight_type" <?php if($weight_type=='3kg')echo "checked='checked'"; ?> value="3kg"/>  3kg Satchal
                                        </label>
                                        <label class="checkbox inline">
                                            <input type="radio" name="weight_type" <?php if($weight_type=='5kg')echo "checked='checked'"; ?> value="5kg"/> 5kg Satchal
                                        </label>
                                        <label class="checkbox inline">
                                            <input type="radio" name="weight_type" <?php if($weight_type=='10kg')echo "checked='checked'"; ?> value="10kg"/> 10kg Satchal
                                        </label>
                                        <label class="checkbox inline">
                                            <input type="radio" name="weight_type" <?php if($weight_type=='more')echo "checked='checked'"; ?> value="more"/> More
                                        </label>
                                        <span><?php echo form_error('weight_type'); ?></span>
                                    </div>
                                </div>
                                <div class="row-form clearfix">
                                    <div class="span3">Clients:</div>
                                    <div class="span9">
                                    	<select class="chosen-select validate[required]" name="client_id" id="client_id">
                                        	<option value="">Select Client</option>
                                            <?php
												foreach($clients as $client)
												{ 
											?>
                                            		<option value="<?php echo $client['id']; ?>" <?php echo ($client['id']==$client_id)?"selected":""; ?> />
													<?php echo " ".$client['salutation']." ".$client['first_name']."&nbsp;&nbsp;(".$client['email'].")"; ?></option>
                                            <?php
												}
											?>
                                        </select>
                                        <a href="<?php echo site_url('admin/clients/save/'); ?>" target="_blank" class="isb-user" title="add client"></a>
                                        <a href="javascript:void(0);" class="isb-refresh" id="refresh_clients" title="refresh clients"></a>
                                    <span><?php echo form_error('client_id'); ?></span></div>
                                </div>                                 
                                <div class="row-form clearfix">
                                    <div class="span3">Job Title:</div>
                                    <div class="span9"><input class="validate[required]" type="text" id="title" name="title" value="<?php echo $title; ?>" /> <span><?php echo form_error('title'); ?></span></div>
                                </div>  
                                <div class="row-form clearfix">
                                    <div class="span3">Delivery Date:</div><?php /* for validation engine rule future[now]*/ ?>
                                    <div class="span9"><input class="validate[required]" style="width:100% !important;" readonly="readonly" type="text" name="post_date" id="post_date"  value="<?php echo $post_date; ?>" /> <span><?php echo form_error('post_date'); ?></span></div>
                                </div>
                                <div class="row-form clearfix">
                                <div class="head clearfix">
                                    <div class=""></div>
                                    <h1>Description:</h1>
                              </div>
                            <div class="block-fluid" id="wysiwyg_container">
                                <textarea id="wysiwyg" class="required_wysiwyg validate[required]" name="description" style="height: 230px;"/><?php echo $description; ?></textarea>
                               </div>
                             <span><?php echo form_error('description'); ?></span>       
                         </div>

                                <div class="row-form clearfix">
                                    <div class="span3">Status:</div>
                                    <div class="span9">
                                    	<select class="validate[required]" name="status" id="status">
                                        	<option value="<?php echo $job_status; ?>"><?php echo $job_status; ?></option>
                                            <?php
												if($job_status=="Awarded")
													echo "<option value='Collected'>Collected</option>"; 
												else if($job_status=="Collected")
													echo "<option value='Completed'>Completed</option>"; 
													
											?>
                                        </select>
                                    </span></div>
                                </div>                         
                         
						</div>
                        </div>
                        <div class="span6">
                            <div class="block-fluid">                        
                                <div class="row-form clearfix">
                                    <div class="span4" >Pickup Postcode:</div>
                                    <div class="span7">
                              <input type="text" name="addressUkCode1" class="addressUkCode" id="addressUkCode1"  value="<?php echo $pickup_post_code; ?>"/>
                                        <span><?php echo form_error('addressUkCode1'); ?></span>
                                        <span class="errorDivUkCode" id="addressErrorDivUkCode1">
                                            <span id="address_errorUkCode1" class="error_red">* Please provide a valid Status </span>
                                        </span>
                                    </div>
                                    
                                    <div class="span8" style="margin-left:35% !important;">
                                        <a style="text-decoration:underline;" id="findAddressUkCode1" class="findAddressUkCode" href="" >Find Address</a> &nbsp;&nbsp;
                                        <a style="text-decoration:underline;" href="" class="dontKnowUkCode" id="dontKnowUkCode1" > Don't Know? </a>
                                           &nbsp;&nbsp;
                                        <a style="text-decoration:underline;" href="http://www.royalmail.com/" target="_blank" > Can't Find </a>
                                    </div>
                                </div>
                                <div id='hiddenAddressFieldsUkCode1' class='hiddenAddressFieldsUkCode row-form clearfix <?php if((isset($id) && $id>0) || $ci_error == TRUE) echo ""; else echo "errorDivUkCode"; ?>'>
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Address:</div>
                                                <div class="span8">
                                                    <input type="text"  class="house_numberUkCode validate[required]" name="house_numberUkCode1" id="house_numberUkCode_hidden1"  value="<?php echo $pickup_address_line1; ?>"/>
                                                    <span><?php echo form_error('house_numberUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="house_number_noDivUkCode1">
                                                        <span id="house_number_noErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>      
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Street:</div>
                                                <div class="span8">
                                                    <input type="text" class="streetUkCode" name="streetUkCode1" id="streetUkCode_hidden1"  value="<?php echo $pickup_address_line2; ?>"  />
                                                    <span><?php echo form_error('streetUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="streetDivUkCode1">
                                                        <span id="streetErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>      
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Town:</div>
                                                <div class="span8">
                                                    <input type="text" class="townUkCode" name="townUkCode1" id="townUkCode_hidden1"  value="<?php echo $pickup_address_line3; ?>" />
                                                    <span><?php echo form_error('townUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="townDivUkCode1">
                                                        <span id="townErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>      
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>County:</div>
                                                <div class="span8">
                                                    <input type="text" class="countyUkCode" name="countyUkCode1" id="countyUkCode_hidden1"  value="<?php echo $pickup_address_line4; ?>" />
                                                    <span><?php echo form_error('countyUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="countyDivUkCode1">
                                                        <span id="countyErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Longitude:</div>
                                                <div class="span8">
                                                    <input type="text"  class="longitudeUkCode" readonly="readonly" name="longitudeUkCode1" id="longitudeUkCode_hidden1" value = "<?php echo $pickup_longitude; ?>"/>
                                                    <span><?php echo form_error('longitudeUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="longitudeDivUkCode1">
                                                        <span id="longitudeErrorUkCode1" class="txt-pink span11">&nbsp; </span>
                                                     </span>
                                                </div>
                                            </div>
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Latitude:</div>
                                                <div class="span8">
<input type="text" class="latitudeUkCode" readonly="readonly" name="latitudeUkCode1" id="latitudeUkCode_hidden1" value = "<?php echo $pickup_latitude; ?>"/>
                                                    <span><?php echo form_error('latitudeUkCode1'); ?></span>
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
                                <div class="row-form clearfix">
                                    <div class="span4" >Destination Postcode:</div>
                                    <div class="span7">
                      <input type="text"  name="addressUkCode2" class="addressUkCode" id="addressUkCode2"  value="<?php echo $destination_post_code; ?>"/>
                                        <span><?php echo form_error('addressUkCode2'); ?></span>
                                        <span class="errorDivUkCode" id="addressErrorDivUkCode2">
                                            <span id="address_errorUkCode2" class="txt-pink span11">* Please provide a valid Status </span>
                                        </span>
                                    </div>
                                    <div class="span8" style="margin-left:35% !important;">
                                        <a style="text-decoration:underline;" id="findAddressUkCode2" class="findAddressUkCode" href="" >Find Address</a> &nbsp;&nbsp;
                                        <a style="text-decoration:underline;" href="" class="dontKnowUkCode" id="dontKnowUkCode2" > Don't Know? </a>
                                           &nbsp;&nbsp;
                                        <a style="text-decoration:underline;" href="http://www.royalmail.com/" target="_blank" > Can't Find </a>
                                    </div>
                                </div>
                                <div id='hiddenAddressFieldsUkCode2' class='hiddenAddressFieldsUkCode row-form clearfix <?php if((isset($id) && $id>0) || ($ci_error==TRUE))  echo ""; else echo "errorDivUkCode"; ?>'>
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Address:</div>
                                                <div class="span8">
        <input type="text"  class="house_numberUkCode" name="house_numberUkCode2" id="house_numberUkCode_hidden2"  value="<?php echo $destination_address_line1; ?>"/>
                                                    <span><?php echo form_error('house_numberUkCode2'); ?></span>
                                                    <span class="errorDivUkCode" id="house_number_noDivUkCode2">
                                                        <span id="house_number_noErrorUkCode2" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>      
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Street:</div>
                                                <div class="span8">
                                                    <input type="text" class="streetUkCode" name="streetUkCode2" id="streetUkCode_hidden2"  value="<?php echo $destination_address_line2; ?>"  />
                                                    <span><?php echo form_error('streetUkCode2'); ?></span>
                                                    <span class="errorDivUkCode" id="streetDivUkCode2">
                                                        <span id="streetErrorUkCode2" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>      
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Town:</div>
                                                <div class="span8">
                                                    <input type="text" class="townUkCode" name="townUkCode2" id="townUkCode_hidden2"  value="<?php echo $destination_address_line3; ?>" />
                                                    <span><?php echo form_error('townUkCode2'); ?></span>
                                                    <span class="errorDivUkCode" id="townDivUkCode2">
                                                        <span id="townErrorUkCode2" class="txt-pink span11">* Please provide a valid Status </span>
                                                     </span>
                                                </div>
                                            </div>      
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>County:</div>
                                                <div class="span8">
                                                    <input type="text" class="countyUkCode" name="countyUkCode2" id="countyUkCode_hidden2"  value="<?php echo $destination_address_line4; ?>" />
                                                    <span><?php echo form_error('countyUkCode2'); ?></span>
                                                    <span class="errorDivUkCode" id="countyDivUkCode2">
                                                        <span id="countyErrorUkCode2" class="txt-pink span11">* Please provide a valid county </span>
                                                     </span>
                                                </div>
                                            </div>
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Longitude:</div>
                                                <div class="span8">
                                                    <input type="text"  class="longitudeUkCode" readonly="readonly" name="longitudeUkCode2" id="longitudeUkCode_hidden2" value = "<?php echo $destination_longitude; ?>"/>
                                                    <span><?php echo form_error('longitudeUkCode2'); ?></span>
                                                    <span class="errorDivUkCode" id="longitudeDivUkCode2">
                                                        <span id="longitudeErrorUkCode2" class="txt-pink span11">&nbsp; </span>
                                                     </span>
                                                </div>
                                            </div>
                                            <div class="row-form span12">
                                                <div class="span3"><span class="txt_red">*</span>Latitude:</div>
                                                <div class="span8">
                                                    <input type="text" class="latitudeUkCode" readonly="readonly" name="latitudeUkCode2" id="latitudeUkCode_hidden2" value = "<?php echo $pickup_latitude; ?>"/>
                                                    <span><?php echo form_error('latitudeUkCode2'); ?></span>
                                                    <span class="errorDivUkCode" id="latitudeDivUkCode2">
                                                        <span id="latitudeErrorUkCode2" class="txt-pink span11">&nbsp;</span>
                                                     </span>
                                                </div>
                                            </div>                                    
                                        </div>                         
                                <div class="row-form clearfix">
                                    <div class="span12 responseUkCode" id="responseUkCode2">
                                    </div>
                                 </div>                           
                            </div>
                        </div>
                        <div class="span11">
                        	&nbsp;
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                              <div class="span4">&nbsp;</div>
                              	<div class="span4">
                                	<table align="left" width="100%">
                                    	<tr>
                                        	<td>				
                                             	<input type="radio" name="job_action" value="Waiting"
                                                 <?php if($job_action=="Waiting"){ ?> checked="checked" <?php } ?> style="" />
                                                   Skip & Save
                                             </td>
                                            <?php 
													if($job_status == "Waiting" || $job_status == "Invited")
												  	{
											?>
                                            <td>
                                            	<input type="radio" name="job_action" <?php if($job_action=="Invited"){ ?> checked="checked" <?php } ?>  value="Invited" />
                                                    Invite & Save
                                             </td>                                             
                                            <td>
                                                 <input type="radio" name="job_action" <?php if($job_action=="Awarded"){ ?> checked="checked" <?php } ?>  value="Awarded" />
                                                    Award & Save
                                             </td>
											 <?php
													}
											?>

                                            </tr>
                                            </table>
                                </div>
                                <div class="span4">&nbsp;</div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="span4">
                                	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                                    <input type="hidden" name="creator_id" id="creator_id" value="<?php echo $creator_id; ?>" />
                                	<input type="hidden" name="created_date" id="created_date" value="<?php echo $created_date; ?>" />
                                    <input type="hidden" name="last_update" id="last_update" value="<?php echo $last_update; ?>" />
                                </div>
                                <div class="span4" style="text-align:center;">
                                    <div class="span6"><input type="submit" class="btn btn-block" id="submit_button_agent" value="<?php if($id== -1) echo "Go To Step2"; else echo "UPDATE"; ?>"></div>
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
		jQuery(function(){
			
				jQuery('#refresh_clients').on('click',function(){
		
			jQuery("#client_id").html('');
			jQuery('#client_id').trigger("chosen:updated");
			
			jQuery.ajax({
				url:"<?php echo site_url('admin/jobs/get_clients'); ?>",
				dataType:"json",
				data:{job_clients:1},
				type:"POST",
				success: function(data){
					
					jQuery("#client_id").append("<option value=''>Select Client</option>");
					if(jQuery.isArray(data))
						for(var i=0; i<data.length; i++)
						{
							if(typeof data[i]['id'] != 'undefined' && typeof data[i]['first_name'] != 'undefined' && typeof data[i]['salutation'] != 'undefined' && typeof data[i]['email'] != 'undefined')
							        jQuery("#client_id").append("<option value='"+data[i]['id']+"' >"+data[i]['salutation']+" "+data[i]['first_name']+" ("+data[i]['email']+")</option>");
						}
						jQuery("#client_id").trigger("chosen:updated");
					},
				error: function(msg){
					console.log(msg);
					}
				});
			
		
		});
				jQuery( "#post_date" ).datepicker({ minDate: 0 , dateFormat: "dd-mm-yy"}); 
		});
	</script>