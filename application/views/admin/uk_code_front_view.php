<?php
	if(isset($case) && $case == '1st')
	{
?>
		 <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Address:</label>
                <select class="form-control field fullAddressUkCode">
					<option value=''> Please Select Address</option>
<?php
            	foreach($Addresses as $address)
				{
?>
                   <option value='<?php echo $address; ?>'><?php echo $address; ?></option>
<?php
				}
?>
				</select>
				<input type='hidden' readonly="readonly" name='latitudeUkCode' class="latitudeUkCode" value='<?php if(isset($latitude)) echo $latitude; ?>' id='latitudeUkCode' />
				<input type='hidden'  readonly="readonly"  name='longitudeUkCode' class="longitudeUkCode" value='<?php if(isset($longitude)) echo $longitude; ?>' id='longitudeUkCode' />
			</div>
          </div>
        </div>
<?php
	}
	else if(isset($case) && $case=='2nd')
	{
		if(!isset($counter) || $counter < 1)
			$counter=1;
?>	
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Address:</label>
            	<input type="text" class="field" name="house_numberUkCode<?php echo $counter; ?>" id="house_numberUkCode<?php echo $counter; ?>" value = "<?php if(isset($receiptName)) echo $receiptName; ?>" />
                <span class="mendatory-field">*</span>
                <div class="clear"></div>
                	<span class='error_red'><?php echo form_error('house_numberUkCode1'); ?></span>
                     	<span class="errorDivUkCode" id="house_number_noDivUkCode1">
                        	<span id="house_number_noErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                        </span>
                   </div>
                  </div>
                 </div>
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                        	<label>Street:</label>
            	<input type="text" class="field"  name="streetUkCode<?php echo $counter; ?>" id="streetUkCode<?php echo $counter; ?>" value = "<?php if(isset($street)) echo $street; ?>"  /><span class="mendatory-field">*</span>
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
            	<input type="text" class="field"  name="townUkCode<?php echo $counter; ?>" id="townUkCode<?php echo $counter; ?>" value = "<?php if(isset($town)) echo $town; ?>" />
                            <span class="mendatory-field">*</span>
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
            	<input type="text" class="field"  name="countyUkCode<?php echo $counter; ?>" id="countyUkCode<?php echo $counter; ?>" value = "<?php if(isset($county)) echo $county; ?>" />
                             <span class="mendatory-field">*</span>
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
            	<input type="text"  readonly="readonly" class="field"  name="longitudeUkCode<?php echo $counter; ?>" id="longitudeUkCode<?php echo $counter; ?>" value ="<?php if(isset($longitude)) echo $longitude; ?>" />
                              <span class="mendatory-field">*</span>
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
            	<input type="text"  readonly="readonly"  class="field" name="latitudeUkCode<?php echo $counter; ?>" id="latitudeUkCode" value ="<?php if(isset($latitude)) echo $latitude; ?>" />
                            <span class="mendatory-field">*</span>
                            <div class="clear"></div>
                          <span class='error_red'><?php echo form_error('latitudeUkCode1'); ?></span>
                                                    <span class="errorDivUkCode" id="latitudeDivUkCode1">
                                                        <span id="latitudeErrorUkCode1" class="txt-pink span11">&nbsp;</span>
                                                     </span>
                        </div> <!-- form group -->
                    </div>
                </div>              
<?php
	}
?>