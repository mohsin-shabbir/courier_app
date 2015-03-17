 </div>
     </body>
    </html>
    
<script>

	var href;
	function redirect(href)
	{
		window.location = href;
	}
	

	var hidden_divs=jQuery(".hiddenAddressFieldsUkCode");
	var total_postCode_divs=hidden_divs.length;
	var counter=0;
	function getPostCode(address,counter)
	{
		jQuery.ajax({
							url:"<?php echo site_url('admin/agents/get_address_uk/'); ?>",
							dataType:"json",
							type:"post",
							data:{findPostCodeUkCode : address},
							success: function(data){
								if(typeof data['error'] != 'undefined')
								{
									var post_field	=	jQuery("#addressUkCode"+counter);
									var long_field	=	jQuery("#longitudeUkCode_hidden"+counter);
									var lat_field	 =	jQuery("#latitudeUkCode_hidden"+counter);
									
									jQuery(post_field).val('');
									jQuery(long_field).val('');
									jQuery(lat_field).val('');
									
									if(typeof data['post_code'] != 'undefined')
									{
										jQuery("#addressUkCode"+counter).val(data['post_code']);
									}
									if(typeof data['longitude'] != 'undefined')
									{
										jQuery("#longitudeUkCode_hidden"+counter).val(data['longitude']);
										
									}
									if(typeof data['latitude'] != 'undefined')
									{
										jQuery("#latitudeUkCode_hidden"+counter).val(data['latitude']);
									}
									if((jQuery(long_field).val() == "") || (jQuery(lat_field).val() == "") || ((jQuery("#country_code").val() == "GB") && (jQuery(post_field).val() =="")))
									{
										document.getElementById("addressErrorDivUkCode"+counter).style.display='block';
										document.getElementById('address_errorUkCode'+counter).innerHTML='* You must provide a valid Address';
										document.getElementById("addressUkCode"+counter).value="";
										document.getElementById("addressUkCode"+counter).focus();
									}
								}
							},
							error:function(msg){
								
								console.log(msg);
							}
						});
	}

var select_flag=0;
var source='';
var group_input_flag;
jQuery(function(){

	$(document).on('click','input[type="reset"]',function(){
		jQuery('.chosen-select').val('');
		jQuery('.chosen-select').trigger('chosen:updated');
	});

		jQuery('.datatable_list').each(function() {

			source='<?php echo (!empty($list_url)?$list_url:""); ?>';
			var oTable = jQuery(this).dataTable( {
					"bServerSide": true,
					"sServerMethod": "POST",			
					"sPaginationType": "full_numbers",
					"iDisplayLength": '<?php echo LIST_PAGE_RECORDS; ?>',
					"sAjaxSource": source
			} );
		});

var group_input  = jQuery('.group_table');
if(typeof group_input != "undefined")
	var all_checkbox = jQuery(group_input).find('input[type="checkbox"]');

if(typeof all_checkbox != "undefined")
{
	jQuery("#all_select").on('click',function(){
		if(jQuery(this).is(':checked'))
		{
			jQuery(all_checkbox).each(function(){
				jQuery(this).attr("checked", "checked");
				//if(jQuery(this).is(':checked'))
					//alert(jQuery(this).val());
				//this.checked = true;
			});
		}
	});
}



//submit form function
jQuery(".validation_form_UkCode").on("submit",function(e){
		
		var editor=jQuery(this).find(".required_wysiwyg");
		var chosen_select=jQuery(this).find(".chosen-select");
		
		 
		if(jQuery(this).validationEngine('validate'))
		{
			if(typeof chosen_select != "undefined")
			{
				jQuery(chosen_select).each(function(){
					if((jQuery(this).val()=="" || jQuery(this).val()==null) && select_flag == 0)
					{
						e.preventDefault();
						
								var message =jQuery(this).parent().prev().html();
								if(typeof message !="undefined")
									alert('Select '+message);
								else
									alert('select some option');

						
						select_flag=1;	
						jQuery(this).trigger('chosen:activate');
						return;			
					}
                });
				if(select_flag==1)
				{
					select_flag=0;
					return;
				}
			}
			
			
			if(typeof editor != "undefined" &&  jQuery(editor).val()=="")
			{
				e.preventDefault();
				alert('description is empty');				
				return;
			}
			
			hidden_divs=jQuery(".hiddenAddressFieldsUkCode");
			total_postCode_divs=hidden_divs.length;
			counter=1;
		var current_div,house_no,street_no,town_no,county_no,longitude,latitude;
		
		for(var i=0; i<hidden_divs.length; i++)
		{
			current_div=hidden_divs[i];		
			counter	  =	i+1;		
			if(jQuery(current_div).is(":visible"))
			{
				house_no	 =	jQuery(current_div).find(".house_numberUkCode").val();
				street_no	=	jQuery(current_div).find(".streetUkCode").val();
				town_no	  =	jQuery(current_div).find(".townUkCode").val();
				county_no	=	jQuery(current_div).find(".countyUkCode").val();
				longitude	=	jQuery(current_div).find(".longitudeUkCode").val();
				latitude	 =	jQuery(current_div).find(".latitudeUkCode").val();
				post_code	=	jQuery("#addressUkCode"+counter).val();
				country_code =	jQuery('#country_code').val();

				if(house_no != "" && street_no !="" && (((longitude == "" || latitude == "" || post_code=="") && country_code == "GB") || ((longitude == "" || latitude == "" ) && country_code != "GB" && country_code != "")))
				{
					e.preventDefault();
					var address=house_no+", "+street_no+", "+town_no+", "+county_no;
					jQuery.when(getPostCode(address,counter)).then(function(){
					
						return;
					});
				}
			}
			else
			{
				if((!jQuery('#longitudeUkCode'+counter).length) && (!jQuery('#latitudeUkCode'+counter).length ) && (!jQuery('#house_numberUkCode'+counter).length ))
				{
					alert('please enter a valid post code and click on "Find Address" link to find an address,  or click on   "Don\'t Know?" link to enter an address manually');
					e.preventDefault();
					jQuery("#addressUkCode"+counter).focus();					
					return;
				}
			}
		}
	}
});
		jQuery(".datepicker" ).datepicker({dateFormat: "dd-mm-yy"});
		jQuery(".dontKnowUkCode").on("click",function(e)
        {
			e.preventDefault();
			jQuery(this).parent('div').prev('div').find('input.addressUkCode').val('');
			var parent_div=jQuery(this).parent("div").parent("div");
			var hidden_div=jQuery(parent_div).next("div.hiddenAddressFieldsUkCode");
        	jQuery(hidden_div).next('div').find(".responseUkCode").hide(1000);
			jQuery(hidden_div).show(1000);
			jQuery('html, body').animate(
			{
				scrollTop: jQuery(hidden_div).offset().top
			}, 2000);
            jQuery(hidden_div).find(".house_numberUkCode").focus();
         });
		 		 
		 jQuery(".findAddressUkCode").on("click",function(e)
		 {
			 e.preventDefault();
			 
			var parent_div=jQuery(this).parent("div").parent("div");
			var post_code_field=jQuery(parent_div).find(".addressUkCode");
			var hidden_div=jQuery(parent_div).next("div.hiddenAddressFieldsUkCode");
			var div_no      =	jQuery(post_code_field).attr('id');
			var counter	 =	div_no.slice(-1);
			 
			 
			if(jQuery('#country_code').length)
			{
				if(jQuery(country_code).val() != "GB")
				{
					document.getElementById("addressErrorDivUkCode"+counter).style.display='block';
					document.getElementById('address_errorUkCode'+counter).innerHTML='* Auto post code service is available for UK only';
					jQuery(hidden_div).next('div').find(".responseUkCode").focus();
					jQuery(hidden_div).find("input[type='text']").each(function(){
								jQuery(this).val('');
							});
					jQuery(hidden_div).hide(1500);
					jQuery(hidden_div).next('div').find(".responseUkCode").html("");
					jQuery(post_code_field).val('');
					return false;
				}
			}

			var newPostCode = checkPostCode (jQuery(post_code_field).val()); //in common.js

			if (newPostCode)
			{
				
				jQuery(post_code_field).val(newPostCode);
				document.getElementById('address_errorUkCode'+counter).innerHTML='';
				document.getElementById("addressErrorDivUkCode"+counter).style.display='none'; 
				abc=2;
				var postalCode = jQuery(post_code_field).val();
				jQuery.ajax(
				{
					type: "POST",
					url: '<?php echo site_url('admin/agents/get_address_uk'); ?>',
					data: { codeUkCode: postalCode },
					error: function(msg)
					{
						document.getElementById("addressErrorDivUkCode"+counter).style.display='block';
						document.getElementById('address_errorUkCode'+counter).innerHTML='* '+msg;
						jQuery(hidden_div).next('div').find(".responseUkCode").focus();
					},
					success:function(msg)
					{
						document.getElementById("addressErrorDivUkCode"+counter).style.display='none';
						document.getElementById('address_errorUkCode'+counter).innerHTML='';
						
						jQuery(hidden_div).hide(1000);
						jQuery(hidden_div).find("input[type='text']").each(function(){
								jQuery(this).val('');
							});
						jQuery(hidden_div).next('div').find(".responseUkCode").show(1000);
						//jQuery('#dropDownUkCode').show(1000);                 
						jQuery(hidden_div).next('div').find(".responseUkCode").html(msg);
					}
				});
			} //end of if (newPostCode) condition
			else
			{	
				document.getElementById("addressErrorDivUkCode"+counter).style.display='block';
				document.getElementById('address_errorUkCode'+counter).innerHTML='* You must provide a valid UK postcode';
				jQuery(hidden_div).next('div').find(".responseUkCode").focus();
				return false;
			}
	
		});//end of findResult click function

		jQuery(".responseUkCode").on("change","select.fullAddressUkCode",function(){
			var address=jQuery(this).val();		
			var path="<?php echo site_url('admin/agents/get_address_uk'); ?>";
			if(address)
			{
				var lat	      =	jQuery(this).parent("div").find(".latitudeUkCode").val();
				var long	   	 =	jQuery(this).parent("div").find(".longitudeUkCode").val();
				var response_div =    jQuery(this).parent('div').parent('div').parent('div.responseUkCode');
				var div_no	   =	jQuery(response_div).attr('id');
				
				var counter	  =	div_no.slice(-1);
				jQuery.ajax({
							type: "POST",
							url: path,
							data: { fullDropDownAddressUkCode: address , latitudeUkCode:lat , longitudeUkCode:long, counter:counter },
							success: function (msg){
						
													$(response_div).html(msg);
													$('html, body').animate(
																				{scrollTop: $(response_div).offset().top}, 
																				2000
																			);
												},
							error: function(msg){
								alert( "Invalid Postal Code" );
							}
					 });				
			} // end of if(Res) condition
												
		});
	});
</script>