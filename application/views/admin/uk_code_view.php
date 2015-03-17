<?php
	if(isset($case) && $case == '1st')
	{
?>
		<div class='row-form clearfix'>
			<div class='span3'>Address:</div>
				<div class='span9'>
					<select class="fullAddressUkCode">
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
				<input type='hidden'  readonly="readonly"  name='latitudeUkCode' class="latitudeUkCode" value='<?php if(isset($latitude)) echo $latitude; ?>' id='latitudeUkCode' />
				<input type='hidden'  readonly="readonly"  name='longitudeUkCode' class="longitudeUkCode" value='<?php if(isset($longitude)) echo $longitude; ?>' id='longitudeUkCode' />
			</div>
          </div>
<?php
	}
	else if(isset($case) && $case=='2nd')
	{
		if(!isset($counter) || $counter < 1)
			$counter=1;
?>	
     <div id='ajaxResponse' class='row-form clearfix'>
     	<div class="row-form span12">
            <div class="span3"><span class="txt_red">*</span>Address:</div>
           	<div class="span8">
            	<input type="text" name="house_numberUkCode<?php echo $counter; ?>" id="house_numberUkCode<?php echo $counter; ?>" value = "<?php if(isset($receiptName)) echo $receiptName; ?>" />
            	<span class="errorDivUkCode" id="house_number_noDivUkCode">
                	<span id="house_number_noErrorUkCode" class="txt-pink span11">* Please provide a valid Status </span>
                 </span>
            </div>
		</div>      
     	<div class="row-form span12">
            <div class="span3"><span class="txt_red">*</span>Street:</div>
           	<div class="span8">
            	<input type="text" name="streetUkCode<?php echo $counter; ?>" id="streetUkCode<?php echo $counter; ?>" value = "<?php if(isset($street)) echo $street; ?>" />
            	<span class="errorDivUkCode" id="streetDivUkCode">
                	<span id="streetErrorUkCode" class="txt-pink span11">* Please provide a valid Status </span>
                 </span>
            </div>
		</div>      
     	<div class="row-form span12">
            <div class="span3"><span class="txt_red">*</span>Town:</div>
           	<div class="span8">
            	<input type="text" name="townUkCode<?php echo $counter; ?>" id="townUkCode<?php echo $counter; ?>" value = "<?php if(isset($town)) echo $town; ?>" />
            	<span class="errorDivUkCode" id="townDivUkCode">
                	<span id="townErrorUkCode" class="txt-pink span11">* Please provide a valid Status </span>
                 </span>
            </div>
		</div>      
     	<div class="row-form span12">
            <div class="span3"><span class="txt_red">*</span>County:</div>
           	<div class="span8">
            	<input type="text" name="countyUkCode<?php echo $counter; ?>" id="countyUkCode<?php echo $counter; ?>" value = "<?php if(isset($county)) echo $county; ?>" />
            	<span class="errorDivUkCode" id="countyDivUkCode">
                	<span id="countyErrorUkCode" class="txt-pink span11">* Please provide a valid county </span>
                 </span>
            </div>
		</div>      
     	<div class="row-form span12">
            <div class="span3"><span class="txt_red">*</span>Longitude:</div>
           	<div class="span8">
            	<input type="text"  readonly="readonly"  name="longitudeUkCode<?php echo $counter; ?>" id="longitudeUkCode<?php echo $counter; ?>" value ="<?php if(isset($longitude)) echo $longitude; ?>" />
            	<span class="errorDivUkCode" id="longitudeDivUkCode">
                	<span id="longitudeErrorUkCode" class="txt-pink span11">* Please provide a valid Longitude </span>
                 </span>
            </div>
		</div>      
        <div class="row-form span12">
            <div class="span3"><span class="txt_red">*</span>Latitude:</div>
           	<div class="span8">
            	<input type="text"  readonly="readonly"  name="latitudeUkCode<?php echo $counter; ?>" id="latitudeUkCode" value ="<?php if(isset($latitude)) echo $latitude; ?>" />
            	<span class="errorDivUkCode" id="latitudeDivUkCode">
                	<span id="latitudeErrorUkCode" class="txt-pink span11">* Please provide a valid Longitude </span>
                 </span>
            </div>
		</div>
	</div>
<?php
	}
?>