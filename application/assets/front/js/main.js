jQuery(function($) {'use strict';

	// Navigation Scroll
/*	$(window).scroll(function(event) {
		Scroll();
	});
*/
	$('.navbar-collapse ul li a').on('click', function() {  
		$('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
		return false;
	});

	// User define function
	function Scroll() {
		var contentTop      =   [];
		var contentBottom   =   [];
		var winTop      =   $(window).scrollTop();
		var rangeTop    =   200;
		var rangeBottom =   500;
		$('.navbar-collapse').find('.scroll a').each(function(){
			contentTop.push( $( $(this).attr('href') ).offset().top);
			contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
		})
		$.each( contentTop, function(i){
			if ( winTop > contentTop[i] - rangeTop ){
				$('.navbar-collapse li.scroll')
				.removeClass('active')
				.eq(i).addClass('active');			
			}
		})
	};

	$('#tohash').on('click', function(){
		$('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
		return false;
	});

	// accordian
	$('.accordion-toggle').on('click', function(){
		$(this).closest('.panel-group').children().each(function(){
		$(this).find('>.panel-heading').removeClass('active');
		 });

	 	$(this).closest('.panel-heading').toggleClass('active');
	});

	//Slider
	$(document).ready(function() {
		var time = 7; // time in seconds

	 	var $progressBar,
	      $bar, 
	      $elem, 
	      isPause, 
	      tick,
	      percentTime;
	 
	    //Init the carousel
/*	    $("#main-slider").find('.owl-carousel').owlCarousel({
	      slideSpeed : 500,
	      paginationSpeed : 500,
	      singleItem : true,
	      navigation : true,
			navigationText: [
			"<i class='fa fa-angle-left'></i>",
			"<i class='fa fa-angle-right'></i>"
			],
	      afterInit : progressBar,
	      afterMove : moved,
	      startDragging : pauseOnDragging,
	      //autoHeight : true,
	      transitionStyle : "fadeUp"
	    });
*/	 
	    //Init progressBar where elem is $("#owl-demo")
	    function progressBar(elem){
	      $elem = elem;
	      //build progress bar elements
	      buildProgressBar();
	      //start counting
	      start();
	    }
	 
	    //create div#progressBar and div#bar then append to $(".owl-carousel")
	    function buildProgressBar(){
	      $progressBar = $("<div>",{
	        id:"progressBar"
	      });
	      $bar = $("<div>",{
	        id:"bar"
	      });
	      $progressBar.append($bar).appendTo($elem);
	    }
	 
	    function start() {
	      //reset timer
	      percentTime = 0;
	      isPause = false;
	      //run interval every 0.01 second
	      tick = setInterval(interval, 10);
	    };
	 
	    function interval() {
	      if(isPause === false){
	        percentTime += 1 / time;
	        $bar.css({
	           width: percentTime+"%"
	         });
	        //if percentTime is equal or greater than 100
	        if(percentTime >= 100){
	          //slide to next item 
	          $elem.trigger('owl.next')
	        }
	      }
	    }
	 
	    //pause while dragging 
	    function pauseOnDragging(){
	      isPause = true;
	    }
	 
	    //moved callback
	    function moved(){
	      //clear interval
	      clearTimeout(tick);
	      //start again
	      start();
	    }
	});

	//Initiat WOW JS
	/* atta-ul-mohsin */
	//new WOW().init();
	/* atta-ul-mohsin */
	//smoothScroll
	smoothScroll.init();

	// portfolio filter
	$(window).load(function(){'use strict';
		var $portfolio_selectors = $('.portfolio-filter >li>a');
		var $portfolio = $('.portfolio-items');
/*		$portfolio.isotope({
			itemSelector : '.portfolio-item',
			layoutMode : 'fitRows'
		});
*/		
		$portfolio_selectors.on('click', function(){
			$portfolio_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$portfolio.isotope({ filter: selector });
			return false;
		});
	});

	$(document).ready(function() {
		//Animated Progress
		$('.progress-bar').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
			if (visible) {
				$(this).css('width', $(this).data('width') + '%');
				$(this).unbind('inview');
			}
		});

		//Animated Number
		$.fn.animateNumbers = function(stop, commas, duration, ease) {
			return this.each(function() {
				var $this = $(this);
				var start = parseInt($this.text().replace(/,/g, ""));
				commas = (commas === undefined) ? true : commas;
				$({value: start}).animate({value: stop}, {
					duration: duration == undefined ? 1000 : duration,
					easing: ease == undefined ? "swing" : ease,
					step: function() {
						$this.text(Math.floor(this.value));
						if (commas) { $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); }
					},
					complete: function() {
						if (parseInt($this.text()) !== stop) {
							$this.text(stop);
							if (commas) { $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); }
						}
					}
				});
			});
		};

		$('.animated-number').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
			var $this = $(this);
			if (visible) {
				$this.animateNumbers($this.data('digit'), false, $this.data('duration')); 
				$this.unbind('inview');
			}
		});
	});

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			url: $(this).attr('action'),
			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success">Thank you for contact us. As early as possible  we will contact you</p>').delay(3000).fadeOut();
		});
	});

	//Pretty Photo
	/*$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});*/

	//Google Map
	var latitude = $('#google-map').data('latitude');
	var longitude = $('#google-map').data('longitude');
	function initialize_map() {
		var myLatlng = new google.maps.LatLng(latitude,longitude);
		var mapOptions = {
			zoom: 14,
			scrollwheel: false,
			center: myLatlng
		};
		var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize_map);

//atta-ul-mohsin custom code
		window.ParsleyConfig = {
			excluded: 'input[type=button], input[type=submit], input[type=reset]',
			inputs: 'input, textarea, select, input[type=hidden], :hidden',
		};
	
		if(typeof jQuery(".chosen-select") != "undefined")
			jQuery(".chosen-select").chosen();
	
		var hidden_divs=jQuery(".hiddenAddressFieldsUkCode");
		var total_postCode_divs=hidden_divs.length;
		var counter=0;
		var select_flag=0;
		var source='';
		jQuery(".validation_form_UkCode").on("submit",function(e){
		
		alert('submit event');
		if(jQuery(this).parsley( 'isValid'))
		{
			alert('submit event 2');
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
				
					if(house_no != "" && street_no !="" && longitude == "" && latitude == "")
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
		
	jQuery(".dontKnowUkCode").on("click",function(e)
    {
			alert('hi2');
			e.preventDefault();
			jQuery(this).parent('div.form-addon').parent('div.form-group').find('input.addressUkCode').val('');
			var parent_div=jQuery(this).parent("div.form-addon").parent("div.form-group").parent("div.col-sm-12").parent("div.row");
			var hidden_div=jQuery(parent_div).next("div.hiddenAddressFieldsUkCode");
        	jQuery(hidden_div).next('div.responseUkCode').hide(1000);
			jQuery(hidden_div).show(1000);
 			jQuery('html, body').animate(
			{
				scrollTop: jQuery(hidden_div).offset().top
			}, 2000);
            jQuery(hidden_div).find(".house_numberUkCode").focus();
         });
		 		 
	jQuery(".findAddressUkCode").on("click",function(e)
	{
		alert('hi');
			 e.preventDefault();      
 			var parent_div=jQuery(this).parent("div.form-addon").parent("div.form-group").parent('div.col-sm-12').parent('div.row');
			  //  parent_div=jQuery(parent_div).parent("div.form-group").parent('div.col-sm-12').parent('div.row');
			var post_code_field=jQuery(parent_div).find(".addressUkCode");
			var hidden_div=jQuery(parent_div).next("div.hiddenAddressFieldsUkCode");
			var newPostCode = checkPostCode (jQuery(post_code_field).val()); //in common.js
			var div_no      =	jQuery(post_code_field).attr('id');
			var counter	 =	div_no.slice(-1);
			
			if (newPostCode)
			{
				jQuery(post_code_field).val(newPostCode);
				document.getElementById('address_errorUkCode'+counter).innerHTML='';
				document.getElementById("addressErrorDivUkCode"+counter).style.display='none'; 
				
				var postalCode = jQuery(post_code_field).val();
				jQuery.ajax(
				{
					type: "POST",
					url: ''+jQuery('#get_address_uk').val()+'',
					data: { codeUkCode: postalCode, front_side:'true'},
					error: function(msg)
					{
						alert('error');
					},
					success:function(msg)
					{
						jQuery(hidden_div).hide(1000);
						jQuery(hidden_div).next("div.responseUkCode").show(1000);
						//jQuery('#dropDownUkCode').show(1000);                 
						jQuery(hidden_div).next("div.responseUkCode").html(msg);
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
			var path=jQuery('#get_address_uk').val();
			if(address && path != "")
			{
				var lat	      =	jQuery(this).parent("div").find(".latitudeUkCode").val();
				var long	   	 =	jQuery(this).parent("div").find(".longitudeUkCode").val();
				var response_div =    jQuery(this).parent("div.form-group").parent('div.col-sm-12').parent('div.row').parent('div.responseUkCode');
				var div_no	   =	jQuery(response_div).attr('id');
				
				var counter	  =	div_no.slice(-1);
				jQuery.ajax({
							type: "POST",
							url: path,
							data: { fullDropDownAddressUkCode: address , latitudeUkCode:lat , longitudeUkCode:long, counter:counter, front_side:'true' },
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
		
	if(typeof jQuery("#preferred_cities") != 'undefined' && typeof jQuery("#country_code") !="undefined")
	{
		jQuery('#country_code').on('change',function(){
			
				jQuery("#preferred_cities").html('');
				jQuery('#preferred_cities').trigger("chosen:updated");
				
				jQuery.ajax({
					url:jQuery("#get_cities").val(),
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
						},
					error: function(msg){
						console.log(msg);
						}
					});
				
			
			});
	}

});



//atta-ul-mohsin custom code end
	function getPostCode(address,counter)
	{
		jQuery.ajax({
					url:jQuery('#get_address_uk').val(),
					dataType:"json",
					type:"post",
					data:{findPostCodeUkCode : address},
					success: function(data){
					if(typeof data['error'] != 'undefined')
					{
						if(data['error']=='0')
						{
							var flag=0;
							if(typeof data['post_code'] != 'undefined')
							{
								jQuery("#addressUkCode"+counter).val(data['post_code']);
								flag++;
							}
							if(typeof data['longitude'] != 'undefined')
							{
								jQuery("#longitudeUkCode_hidden"+counter).val(data['longitude']);
								flag++;
							}
							if(typeof data['latitude'] != 'undefined')
							{
								jQuery("#latitudeUkCode_hidden"+counter).val(data['latitude']);
								flag++;
							}
						}
						else
						{
							document.getElementById("addressErrorDivUkCode"+counter).style.display='block';
							document.getElementById('address_errorUkCode'+counter).innerHTML='* You must provide a valid Address';
							document.getElementById("addressUkCode"+counter).value="";
							document.getElementById("addressUkCode"+counter).focus();
						}
					}
				},
				error:function(msg)
				{
					console.log(msg);
				}
			});
	}
	function checkPostCode (toCheck) 
	{
		
		  // Permitted letters depend upon their position in the postcode.
		  var alpha1 = "[abcdefghijklmnoprstuwyz]";                       // Character 1 q,v,x missing
		  var alpha2 = "[abcdefghklmnopqrstuvwxy]";                       // Character 2 i,j,z
		  var alpha3 = "[abcdefghjkpmnrstuvwxy]";                         // Character 3 i,l,o,q,z
		  var alpha4 = "[abehmnprvwxy]";                                  // Character 4 
		  var alpha5 = "[abdefghjlnpqrstuwxyz]";                          // Character 5
		  var BFPOa5 = "[abdefghjlnpqrst]";                               // BFPO alpha5
		  var BFPOa6 = "[abdefghjlnpqrstuwzyz]";                          // BFPO alpha6
		  
		  // Array holds the regular expressions for the valid postcodes
		  var pcexp = new Array ();
		  
		  // BFPO postcodes
		  pcexp.push (new RegExp ("^(bf1)(\\s*)([0-6]{1}" + BFPOa5 + "{1}" + BFPOa6 + "{1})$","i"));
		
		  // Expression for postcodes: AN NAA, ANN NAA, AAN NAA, and AANN NAA
		  pcexp.push (new RegExp ("^(" + alpha1 + "{1}" + alpha2 + "?[0-9]{1,2})(\\s*)([0-9]{1}" + alpha5 + "{2})$","i"));
		  
		  // Expression for postcodes: ANA NAA
		  pcexp.push (new RegExp ("^(" + alpha1 + "{1}[0-9]{1}" + alpha3 + "{1})(\\s*)([0-9]{1}" + alpha5 + "{2})$","i"));
		
		  // Expression for postcodes: AANA  NAA
		  pcexp.push (new RegExp ("^(" + alpha1 + "{1}" + alpha2 + "{1}" + "?[0-9]{1}" + alpha4 +"{1})(\\s*)([0-9]{1}" + alpha5 + "{2})$","i"));
		  
		  // Exception for the special postcode GIR 0AA
		  pcexp.push (/^(GIR)(\s*)(0AA)$/i);
		  
		  // Standard BFPO numbers
		  pcexp.push (/^(bfpo)(\s*)([0-9]{1,4})$/i);
		  
		  // c/o BFPO numbers
		  pcexp.push (/^(bfpo)(\s*)(c\/o\s*[0-9]{1,3})$/i);
		  
		  // Overseas Territories
		  pcexp.push (/^([A-Z]{4})(\s*)(1ZZ)$/i);  
		  
		  // Anguilla
		  pcexp.push (/^(ai-2640)$/i);
		
		  // Load up the string to check
		  var postCode = toCheck;
		
		  // Assume we're not going to find a valid postcode
		  var valid = false;
		  
		  // Check the string against the types of post codes
		  for ( var i=0; i<pcexp.length; i++) {
		  
			if (pcexp[i].test(postCode)) {
			
			  // The post code is valid - split the post code into component parts
			  pcexp[i].exec(postCode);
			  
			  // Copy it back into the original string, converting it to uppercase and inserting a space 
			  // between the inward and outward codes
			  postCode = RegExp.$1.toUpperCase() + " " + RegExp.$3.toUpperCase();
			  
			  // If it is a BFPO c/o type postcode, tidy up the "c/o" part
			  postCode = postCode.replace (/C\/O\s*/,"c/o ");
			  
			  // If it is the Anguilla overseas territory postcode, we need to treat it specially
			  if (toCheck.toUpperCase() == 'AI-2640') {postCode = 'AI-2640'};
			  
			  // Load new postcode back into the form element
			  valid = true;
			  
			  // Remember that we have found that the code is valid and break from loop
			  break;
			}
		  }
		  
		  // Return with either the reformatted valid postcode or the original invalid postcode
		  if (valid) {return postCode;} else return false;
		
	}
	function validateUnique(form,url,type)
 	{
		
             jQuery.ajax({
                url: url,
                type: "POST",
                dataType: "html",
				data: {email_to_test :jQuery('#email').val(),id_to_test:"-1",type:type},
				beforeSend: function(){
				},
                success: function(msg){
					var error_placeholder=jQuery('#email').parent().find('span.error_red');
                    if(msg==true)
                    {
						if(jQuery(error_placeholder).length)
							jQuery(error_placeholder).html("<b style='color:red'>Email Already Exists</b>");
                        jQuery('#email').focus();
                    }
					else if(/Email Already Exists/.test(jQuery(error_placeholder).html()))
					{
						jQuery(error_placeholder).html("");
					}
						
					console.log(JSON.stringify(msg));
                },   
                error: function(msg)
                {
					var error=JSON.stringify(msg);
					console.log('this is inside ajax func'+error);
                }
                
            });
 
 	}

		
		