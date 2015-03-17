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
			$job_id					  = (set_value('job_id')?set_value('job_id'):isset($job_id)?$job_id:0);
			$customer_credit_card_type   = (set_value('customer_credit_card_type')?set_value('customer_credit_card_type'):'');
			$customer_credit_card_number = (set_value('customer_credit_card_number')?set_value('customer_credit_card_number'):'');
			$cc_expiration_month		 = (set_value('cc_expiration_month')?set_value('cc_expiration_month'):'');
			$cc_expiration_year		  = (set_value('cc_expiration_year'))?set_value('cc_expiration_year'):(isset($data['cc_expiration_year'])?$data['cc_expiration_year']:'');
			$customer_country			= (set_value('customer_country')?set_value('customer_country'):'');
			$cc_cvv2_number			  = (set_value('cc_cvv2_number')?set_value('cc_cvv2_number'):'');
			$payment_amuont			  = (set_value('payment_amuont')?set_value('payment_amuont'):'');

?>
<div class="content">
           <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>                
                <li class="active">Dashboard</li>
            </ul>
        </div>
        
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
                    <div class="span12 block-fluid">
                        
                        <form id="validation" class="validation_form validation_form_UkCode" method="POST" enctype="multipart/form-data" action="<?php echo site_url('admin/jobs/clear_payment'); ?>" >

                        <div style="margin-left:0 !important;" class="span6  block-fluid">
                        <div class="head clearfix">
                        	<div class=""></div>
                            <h1>Pay by credit card</h1>
                        </div>
                            <div class="">                        
                                <div class="row-form clearfix">
                                    <div class="span3">Card Type:</div>
                                    <div class="span8">
                                    <select name="customer_credit_card_type" id="customer_credit_card_type" class="validate[required]">
                                        <option value="visa" <?php if($customer_credit_card_type== "visa")echo "selected"; ?>>Visa</option>
                                        <option value="master_card" <?php if($customer_credit_card_type== "master_card")echo "selected"; ?>>Master Card</option>
                                        <option value="discocer" <?php if($customer_credit_card_type== "discocer")echo "selected"; ?>>Discover</option>
                                    	<option value="american_express" <?php if($customer_credit_card_type== "american_express")echo "selected"; ?>>American Express</option>
                                    </select>
                                    <span class="error_red"><?php echo form_error('customer_credit_card_type'); ?>&nbsp;</span>
                                  </div>
                                </div>
                                <div class="row-form clearfix">
                                    <div class="span3">Credit Card No:</div>
                                    <div class="span8">
                                      <input name="customer_credit_card_number" id="customer_credit_card_number" type="text" class="validate[required]" value="<?php echo $customer_credit_card_number; ?>" >
                                    <span class='error_red'><?php echo form_error('customer_credit_card_number'); ?>&nbsp;</span></div>
                                </div>  

                                <div class="row-form clearfix">
                                    <div class="span3">Expiration Month:</div>
                                    <div class="span8">
                                    <select name="cc_expiration_month" id="cc_expiration_month" >
                            	     	<?php
											for($i=1;$i<=12;$i++)
												echo "<option value='$i' ".($cc_expiration_month==$i?"selected":"").">$i</option>";
										?>
                                     </select>
                                    <span><?php echo form_error('cc_expiration_month'); ?></span></div>
                                </div>
                                <div class="row-form clearfix">
                                    <div class="span3">Expiration Year:</div>
                                    <div class="span8">
										<select name="cc_expiration_year" id="cc_expiration_year">
                                      		<?php
												for($i=2015;$i<=2050;$i++)
													echo "<option value='$i' ".($cc_expiration_year==$i?"selected":"")." >$i</option>"; 
											?>
                                      	</select>
                                    <span class='error_red'><?php echo form_error('cc_expiration_year'); ?>&nbsp;</span></div>
                                </div>                                

                                <div class="row-form clearfix">
                                                            <div class="span3">Country:</div>
                                                            <div class="span8">
                                   <select class="chosen-select validate[required]" name="customer_country" id="customer_country">
                                        	<option value="">Select Country :</option>
                                            <?php
												foreach($countries as $country)
												{ 
											?>
                                           			<option value="<?php echo $country['code']; ?>" <?php echo (($country['code'] == $customer_country)?"selected":""); ?> />
													<?php echo $country['name']; ?></option>
                                            <?php
												}
											?>
                                    </select>
                                        <span class='error_red'><?php echo form_error('customer_country'); ?>&nbsp;</span>                        
                                                            </div>
                                                        </div>
                                <div class="row-form clearfix">
                                    <div class="span3" >Verification No:</div>
                                    <div class="span8" >
                                        <input name="cc_cvv2_number" id="cc_cvv2_number" type="text" class="validate[required]" value="<?php echo $cc_cvv2_number; ?>" >
                                    </div>
                                    
                                </div>
                                <div class="row-form clearfix">
                                    <div class="span3" >Price:</div>
                                    <div class="span8" >
                                    	<input type="text" id="payment_amuont" name="payment_amuont" value="<?php echo $payment_amuont; ?>" />
                                    </div>
                                    
                                </div>
                               <div class="row-form clearfix">
                                    <div class="span12" >
                                    	<div class="span2">&nbsp;</div>
                                    <input type="hidden" name="job_id" id="job_id" value="<?php echo $job_id; ?>"   /> 
                					<input type="submit"  class="btn span5" value="Make Payment" /> 
                					<input type="reset" name="reset"  id="reset" class="btn btn-danger  span5" value="Reset" /> 

                                    </div>
                                </div> 
                                                                                           
                            </div>
                        </div>
                        </form>

                        <div style="margin-left:0 !important;" class="span6">
                        <div class="head clearfix">
                        	<div class=""></div>
                            <h1>Pay by PayPal</h1>
                        </div>
                            <div class="">                        
                                <div class="">
                                    <div class="span3">&nbsp;</div>
                                    <div class="span8">
                                   <form name="form1" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"  class="yourquotefm" >
                        			<input type="hidden" name="cmd" value="_xclick">
                                    <input type="hidden" name="business" value="<?php //echo $paypalbusiness;?>">
                                    <!--   <input type="hidden" name="undefined_quantity" value="2">-->
                                    <input type="hidden" name="item_name" value="Courier App1">
                                    <input type="hidden" name="amount" value="3">
                                    <input type="hidden" name="quantity" value="2">
                                    <input type="hidden" name="currency_code" value="GBP">
                                    <input type="hidden" name="invoice" value="BKG-1234">
                                    <input type="hidden" name="item_number" value="REF-1234">
                                    <input type="hidden" name="no_shipping" value="3">
                                    <input type="hidden" name="cancel_return" value="<?php //echo $URL."payment_cancel.php";?>"><br />
                                    <input type="hidden" name="return" value="<?php //echo $URL."success.php";?>"><br />
                                    <input type="hidden" name="no_note" value="1">
                                    <input type="hidden" name="rm" value="2">
                                    <input type="hidden" name="notify_url" value="<?php //echo $URL."ipn.php";?>" />
                                    <!--  <a style="margin-bottom:10px;" href="payment.php" class="bluebtn" onClick="return check_checkbox();">Credit Card Payment</a>      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-->    
                                    <input type="submit" name="purchase" value="Pay By Paypal" class="bluebtn" style="margin-top:13px" id="sendNewSms" onClick="return check_checkbox();">
                                    </form>
                                    <span class='error_red'>&nbsp;</span>
                                  </div>
                                </div>
                                  
                            </div>
                        
						</div>
                        <div class="span12">
                        	&nbsp;
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="span4">
                                	<input type="hidden" name="id" id="id" value="<?php //echo $id; ?>" />
                                   <input type="hidden" name="status" id="status" value="<?php //echo $status; ?>" />
                                   <input type="hidden" name="old_profile_image" id="old_profile_image" value="<?php //echo $old_profile_image; ?>" />
                                	<input type="hidden" name="created_date" id="created_date" value="<?php //echo $created_date; ?>" />
                                    <input type="hidden" name="last_update" id="last_update" value="<?php //echo $last_update; ?>" />
                                </div>
                                <div class="span4" style="text-align:center;">
                                    <div class="span6">&nbsp;</div>
                                    <div class="span6">&nbsp;</div>
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
    </div>