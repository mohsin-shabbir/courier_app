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

	$ci_error	   				=	((set_value('addressUkCode1'))?TRUE:FALSE); 
	$weight_type				 =	(set_value('weight_type')?set_value('weight_type'):''); 
	$title					   =	(set_value('title')?set_value('title'):''); 
	$post_date				   =	(set_value('post_date')?set_value('post_date'):''); 
	$description				 =	(set_value('description')?set_value('description'):''); 
	$pickup_post_code			=	(set_value('addressUkCode1')?set_value('addressUkCode1'):''); 
	$destination_post_code	   =	(set_value('addressUkCode2')?set_value('addressUkCode2'):''); 

	$pickup_address_line1    	=	(set_value('house_numberUkCode1')?set_value('house_numberUkCode1'):''); 
	$pickup_address_line2    	=	(set_value('streetUkCode1')?set_value('streetUkCode1'):''); 
	$pickup_address_line3    	=	(set_value('townUkCode1')?set_value('townUkCode1'):''); 
	$pickup_address_line4    	=	(set_value('countyUkCode1')?set_value('countyUkCode1'):''); 

	$destination_address_line1   =	(set_value('house_numberUkCode2')?set_value('house_numberUkCode2'):''); 
	$destination_address_line2   =	(set_value('streetUkCode2')?set_value('streetUkCode2'):''); 
	$destination_address_line3   =	(set_value('townUkCode2')?set_value('townUkCode2'):''); 
	$destination_address_line4   =	(set_value('countyUkCode2')?set_value('countyUkCode2'):''); 
	$pickup_latitude     	     =	(set_value('latitudeUkCode1')?set_value('latitudeUkCode1'):'');
	$pickup_longitude			=	(set_value('longitudeUkCode1')?set_value('longitudeUkCode1'):'');
	$destination_latitude		=	(set_value('latitudeUkCode2')?set_value('latitudeUkCode2'):''); 
	$destination_longitude       =	(set_value('longitudeUkCode2')?set_value('longitudeUkCode2'):''); 

?>
<div class="container container-top-padding margin-bottom">
<div class="bredcrumb">
	<ul>
    	<li><a href="index.php">Home</a></li>
        <li>Post a Job</li>
    </ul>
    <div class="clear"></div>
</div>   <!-- breadcrumb -->
<section id="signup">
	<div class="simple-panel">
    	<div class="panel-content">
    	<h2>Post a Job</h2>
        <div class="login-form post-job">
        	 <form class="form-horizontal validation_form_UkCode" method="post"  data-parsley-validate  enctype="multipart/form-data" action="<?php echo site_url('client/post_job/'); ?>"  >
                <div class="row">
                	<div class="col-sm-12">
                            <div class="form-group">
                                <label for="weight_type" class="control-label">Select weight type:</label>
                                <div class="form-field">
                                    <select class="form-control field field-sm weight" id="weight_type" name="weight_type" required data-parsley-trigger="change">
                                    	<option value="">Select Weight</option>
                                        <option <?php echo (($weight_type=='500g')?"checked='checked'":""); ?> value="500g">500g Satchal</option>
                                        <option  <?php echo (($weight_type=='3kg')?"checked='checked'":""); ?> value="3kg">3kg Satchal</option>
                                        <option  <?php echo (($weight_type=='10kg')?"checked='checked'":""); ?> value="10kg">10kg Satchal</option>
                                        <option  <?php echo (($weight_type=='1kg')?"checked='checked'":""); ?> value="1kg">1kg Satchal</option>
                                        <option  <?php echo (($weight_type=='1kg')?"checked='checked'":""); ?> value="1kg">1kg Satchal</option>
                                        <option  <?php echo (($weight_type=='more')?"checked='checked'":""); ?> value="more">More</option>
                                    </select>
                                    
                                </div>
								<span class="mendatory-field">*</span>
                                <div class="clear"></div>
                                <span class='error_red'><?php echo form_error('weight_type'); ?></span>
                            </div> <!-- form group -->
                    </div>
                    <div class="clear"></div>
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Job Title:</label>
                            <input type="text" placeholder="Job Title" name="title" id="title" required data-parsley-trigger="change" value="<?php echo $title; ?>" class="field" /> 
								<span class="mendatory-field">*</span>
                                <div class="clear"></div>
                                <span class='error_red'><?php echo form_error('title'); ?></span>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Description:</label>
                            <textarea type="text" name="description" <?php echo $description; ?> placeholder="description" required data-parsley-trigger="change" class="field desc-field" /></textarea> 
								<span class="mendatory-field">*</span>
                                <div class="clear"></div>
                                <span class='error_red'><?php echo form_error('description'); ?></span>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Delivery Date:</label>
                           
                            <input readonly="readonly" type="text" id="post_date" name="post_date" required data-parsley-trigger="change" value="<?php echo $post_date; ?>" class="field" />
								<span class="mendatory-field">*</span>
                                <div class="clear"></div>
                                <span class='error_red'><?php echo form_error('description'); ?></span>
                        </div> <!-- form group -->
                    </div>
                </div>
                 <!-- row -->
                
                <h3 class="text-left">Pickup address</h3> 
                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Postcode:</label>
                                <input type="text" name="addressUkCode1" id="addressUkCode1" placeholder="Your postcode" class="addressUkCode field field-sm" value="<?php echo $pickup_post_code; ?>" /> 
                                <span class="mendatory-field">*</span>
                                 <div class="clear"></div>
                                <span class='error_red'><?php echo form_error('addressUkCode1'); ?></span>
                                <div class="form-addon">
                                    <a id="findAddressUkCode1" class="findAddressUkCode" href="">Find Adderess</a>&nbsp;&nbsp;&nbsp;
                                    <a href="" class="dontKnowUkCode" id="dontKnowUkCode1">Don't know?</a> 
                                </div>
                                <div class="clear"></div>
                                <span class="errorDivUkCode" id="addressErrorDivUkCode1">
                                     <span id="address_errorUkCode1" class="error_red">* Please provide a valid Status </span>
                                </span>
                            </div> <!-- form group -->
                        </div>
                    </div> <!-- row -->
                    <div id='hiddenAddressFieldsUkCode1' class='hiddenAddressFieldsUkCode row-form clearfix <?php if($ci_error ==TRUE) echo ""; else echo "errorDivUkCode"; ?>'> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input   value="<?php echo $pickup_address_line1; ?>" type="text"  name="house_numberUkCode1" id="house_numberUkCode_hidden1"  class="field house_numberUkCode" /> <span class="mendatory-field">*</span>
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
                                    <input  value="<?php echo $pickup_address_line2; ?>" type="text" name="streetUkCode1" id="streetUkCode_hidden1" class="field streetUkCode" /> <span class="mendatory-field">*</span>
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
                                    <input  value="<?php echo $pickup_address_line3; ?>" type="text" name="townUkCode1" id="townUkCode_hidden1" class="field townUkCode" /> <span class="mendatory-field">*</span>
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
                                    <input  value="<?php echo $pickup_address_line4; ?>" type="text" name="countyUkCode1" id="countyUkCode_hidden1" class="field countyUkCode" /> <span class="mendatory-field">*</span>
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
                                    <input  value="<?php echo $pickup_longitude; ?>" type="text" readonly="readonly" name="longitudeUkCode1" id="longitudeUkCode_hidden1" class="field longitudeUkCode" /> <span class="mendatory-field">*</span>
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
                                    <input   value="<?php echo $pickup_latitude; ?>" type="text" readonly="readonly" name="latitudeUkCode1" id="latitudeUkCode_hidden1" class="field latitudeUkCode" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                  <span class='error_red'><?php echo form_error('latitudeUkCode1'); ?></span>
                                                            <span class="errorDivUkCode" id="latitudeDivUkCode1">
                                                                <span id="latitudeErrorUkCode1" class="txt-pink span11">&nbsp;</span>
                                                             </span>
                                </div> <!-- form group -->
                            </div>
                        </div>              
                     </div>                        
                    <div class="row-form clearfix responseUkCode" id="responseUkCode1">
                    </div>                           
                
                <h3 class="text-left">Destinatin address</h3>
                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Postcode:</label>
                                <input type="text" name="addressUkCode2" id="addressUkCode2" placeholder="Your postcode" class="addressUkCode field field-sm" value="<?php echo $destination_post_code; ?>" /> 
                                <span class="mendatory-field">*</span>
                                 <div class="clear"></div>
                                <span class='error_red'><?php echo form_error('addressUkCode2'); ?></span>
                                <div class="form-addon">
                                    <a id="findAddressUkCode2" class="findAddressUkCode" href="">Find Adderess</a>&nbsp;&nbsp;&nbsp;
                                    <a href="" class="dontKnowUkCode" id="dontKnowUkCode2">Don't know?</a> 
                                </div>
                                <div class="clear"></div>
                                <span class="errorDivUkCode" id="addressErrorDivUkCode2">
                                     <span id="address_errorUkCode2" class="error_red">* Please provide a valid Status </span>
                                </span>
                            </div> <!-- form group -->
                        </div>
                    </div> <!-- row -->
                    <div id='hiddenAddressFieldsUkCode2' class='hiddenAddressFieldsUkCode row-form clearfix <?php if($ci_error ==TRUE) echo ""; else echo "errorDivUkCode"; ?>'> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input   value="<?php echo $destination_address_line1; ?>" type="text"  name="house_numberUkCode2" id="house_numberUkCode_hidden2"  class="field house_numberUkCode" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                     <span class='error_red'><?php echo form_error('house_numberUkCode2'); ?></span>
                                     <span class="errorDivUkCode" id="house_number_noDivUkCode2">
                                        <span id="house_number_noErrorUkCode2" class="txt-pink span11">* Please provide a valid Status </span>
                                     </span>
                                </div> <!-- form group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Street:</label>
                                    <input  value="<?php echo $destination_address_line2; ?>" type="text" name="streetUkCode2" id="streetUkCode_hidden2" class="field streetUkCode" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                   <span class='error_red'><?php echo form_error('streetUkCode2'); ?></span>
                                                            <span class="errorDivUkCode" id="streetDivUkCode2">
                                                                <span id="streetErrorUkCode2" class="txt-pink span11">* Please provide a valid Status </span>
                                                             </span>
                                </div> <!-- form group -->
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Town:</label>
                                    <input  value="<?php echo $destination_address_line3; ?>" type="text" name="townUkCode2" id="townUkCode_hidden2" class="field townUkCode" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                  <span class='error_red'><?php echo form_error('townUkCode2'); ?></span>
                                                            <span class="errorDivUkCode" id="townDivUkCode2">
                                                                <span id="townErrorUkCode2" class="txt-pink span11">* Please provide a valid Status </span>
                                                             </span>
                                </div> <!-- form group -->
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Country:</label>
                                    <input  value="<?php echo $destination_address_line4; ?>" type="text" name="countyUkCode2" id="countyUkCode_hidden2" class="field countyUkCode" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                  <span class='error_red'><?php echo form_error('countyUkCode2'); ?></span>
                                                            <span class="errorDivUkCode" id="countyDivUkCode2">
                                                                <span id="countyErrorUkCode2" class="txt-pink span11">* Please provide a valid Status </span>
                                                             </span>
                                </div> <!-- form group -->
                            </div>
                        </div>              
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Longitude:</label>
                                    <input  value="<?php echo $destination_longitude; ?>" type="text" readonly="readonly" name="longitudeUkCode2" id="longitudeUkCode_hidden2" class="field longitudeUkCode" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                  <span class='error_red'><?php echo form_error('longitudeUkCode2'); ?></span>
                                                            <span class="errorDivUkCode" id="longitudeDivUkCode2">
                                                                <span id="longitudeErrorUkCode2" class="txt-pink span11">&nbsp; </span>
                                                             </span>
                                </div> <!-- form group -->
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Latitude:</label>
                                    <input   value="<?php echo $destination_latitude; ?>" type="text" readonly="readonly" name="latitudeUkCode2" id="latitudeUkCode_hidden2" class="field latitudeUkCode" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                  <span class='error_red'><?php echo form_error('latitudeUkCode2'); ?></span>
                                                            <span class="errorDivUkCode" id="latitudeDivUkCode2">
                                                                <span id="latitudeErrorUkCode2" class="txt-pink span11">&nbsp;</span>
                                                             </span>
                                </div> <!-- form group -->
                            </div>
                        </div>              
                     </div>                        
                    <div class="row-form clearfix responseUkCode" id="responseUkCode2">
                    </div>                           

                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>&nbsp;</label>
                        	<div class=""><input type="submit" class="nextstep-btn"  value=""></div>
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

</div> <!-- container -->
<input type="hidden" name="get_address_uk" id="get_address_uk" value="<?php echo site_url('client/get_address_uk'); ?>"/>
<input type="hidden" name="get_cities" id="get_cities" value="<?php echo site_url('client/get_cities/'); ?>"/>
<script>
	jQuery(function(){
		jQuery( "#post_date" ).datepicker({ minDate: 0 , dateFormat: "dd-mm-yy"}); 
	});
</script>