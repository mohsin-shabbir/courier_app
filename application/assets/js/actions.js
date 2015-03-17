$(document).ready(function(){
    
    // collapsing widgets
    
        $(".toggle a").click(function(){
            
            var box = $(this).parents('[class^=head]').parent('div[class^=span]').find('div[class^=block]');
            
            if(box.length == 1){
                
                if(box.is(':visible')){        
                    
                    if(box.attr('data-cookie'))                    
                        $.cookies.set(box.attr('data-cookie'),'hidden');
                                        
                    $(this).parent('li').addClass('active');
                    box.slideUp(100);
                    
                }else{
                    
                    if(box.attr('data-cookie'))                    
                        $.cookies.set(box.attr('data-cookie'),'visible');
                                        
                    $(this).parent('li').removeClass('active');
                    box.slideDown(200);
                    
                }
            }
            
            return false;
        });
    
    // collapsing widgets
    
    // setting for list with button <<more>>
        
    var cList = 5; // count list items
        
    $(".withList").each(function(){

        if($(this).find('.list li').length > cList){
        
            $(this).find('.list li').hide().filter(':lt('+cList+')').show();
        
            $(this).append('<div class="footer"><button type="button" class="btn btn-small more">show more...</button></div>');
                        
        }
        
        if($(this).hasClass('scrollBox'))
                $(this).find('.scroll').mCustomScrollbar("update");
    });
    
    
    $(".more").live('click',function(){
        
        if(!$(this).hasClass('disabled')){
        
            cList = cList+5;

            var wl = $(this).parents('.withList');
            var list = wl.find('.list li');

            list.filter(':lt('+cList+')').show();

            if(list.length < cList) $(this).addClass('disabled');


            if($(wl).hasClass('scrollBox'))
                $(wl).find('.scroll').mCustomScrollbar("update");

        }
    });    
    // eof setting for list with button <<more>>

    
    $(".header_menu .list_icon").click(function(){
        
        var menu = $("body > .menu");
        
        if(menu.is(":visible"))
            menu.fadeOut(200);
        else
            menu.fadeIn(300);
        
        return false;
    });
    
    if($(".adminControl").hasClass('active')){
        $('.admin').fadeIn(300);
    }
    
    
    $(".adminControl").click(function(){
        
        if($(this).hasClass('active')){
            
            $.cookies.set('b_Admin_visibility','hidden');
            
            $('.admin').fadeOut(200);
            
            $(this).removeClass('active');
            
        }else{
            
            $.cookies.set('b_Admin_visibility','visible');
            
            $('.admin').fadeIn(300);
            
            $(this).addClass('active');
        }
        
    });
    
    
    $(".navigation .openable > a").click(function(){
        var par = $(this).parent('.openable');
        var sub = par.find("ul");

        if(sub.is(':visible')){
            par.find('.popup').hide();
            par.removeClass('active');            
        }else{
            par.addClass('active');            
        }
        
        return false;
    });
    
    $(".jbtn").button();
    
    $(".alert").click(function(){
        $(this).fadeOut(300, function(){            
                $(this).remove();            
        });
    });
    
    $(".buttons li > a").click(function(){
        
        var parent   = $(this).parent();
        
        if(parent.find(".dd-list").length > 0){
        
            var dropdown = parent.find(".dd-list");

            if(dropdown.is(":visible")){
                dropdown.hide();
                parent.removeClass('active');
            }else{
                dropdown.show();
                parent.addClass('active');
            }

            return false;
            
        }
        
    });


    $("#menuDatepicker").datepicker();
    
    
    $(".link_navPopMessages").click(function(){
        if($("#navPopMessages").is(":visible")){
            $("#navPopMessages").fadeOut(200);
        }else{
            $("#navPopMessages").fadeIn(300);
        }
        return false;
    });
    
    $(".link_bcPopupList").click(function(){
        if($("#bcPopupList").is(":visible")){
            $("#bcPopupList").fadeOut(200);
        }else{
            $("#bcPopupList").fadeIn(300);
        }
        return false;
    });    
    
    $(".link_bcPopupSearch").click(function(){
        if($("#bcPopupSearch").is(":visible")){
            $("#bcPopupSearch").fadeOut(200);
        }else{
            $("#bcPopupSearch").fadeIn(300);
        }
        return false;
    });        
    
    $("input[name=checkall]").click(function(){
    
        if(!$(this).is(':checked'))
            $(this).parents('table').find('.checker span').removeClass('checked').find('input[type=checkbox]').attr('checked',false);
        else
            $(this).parents('table').find('.checker span').addClass('checked').find('input[type=checkbox]').attr('checked',true);
            
    });    
    
    
    $(".fancybox").fancybox();
    
    gallery();
    thumbs();
    headInfo();
});

$(document).resize(function(){
    
    if($("body > .content").css('margin-left') == '220px'){
        if($("body > .menu").is(':hidden'))
            $("body > .menu").show();
    }
    
    gallery();
    thumbs();
    headInfo();
	
	/* custom code atta-ul-mohsin*/
		var old_post_code1='';
	jQuery("#addressUkCode1").on("focus",function(e){
		old_post_code1=jQuery("#addressUkCode1").val();
	});

	jQuery("#addressUkCode1").on("blur",function(e){
		if(jQuery("#addressUkCode1").val() != old_post_code1)
		{
			var hidden_div	=	jQuery('#hiddenAddressFieldsUkCode1');
			var response_div  =	jQuery('#responseUkCode1');
			if(jQuery(hidden_div).is(":visible"))
				jQuery(hidden_div).hide(1500);
			
			jQuery(hidden_div).find("input[type='text']").each(function() {
               jQuery(this).val(''); 
            });
			
			jQuery(response_div).hide(1500);
			jQuery(response_div).html("");
		}
	});


	var old_post_code2='';
	jQuery("#addressUkCode2").on("focus",function(e){
		old_post_code2=jQuery("#addressUkCode2").val();
	});

	jQuery("#addressUkCode2").on("blur",function(e){
		if(jQuery("#addressUkCode2").val() != old_post_code2)
		{
			var hidden_div	=	jQuery('#hiddenAddressFieldsUkCode2');
			var response_div  =	jQuery('#responseUkCode2');
			if(jQuery(hidden_div).is(":visible"))
				jQuery(hidden_div).hide(1500);
			
			jQuery(hidden_div).find("input[type='text']").each(function() {
               jQuery(this).val(''); 
            });
			
			jQuery(response_div).hide(1500);
			jQuery(response_div).html("");
		}
	});

	
	
	
});

function headInfo()
{
    var block = $(".headInfo .input-append");
    var input = block.find("input[type=text]");
    var button = block.find("button");
    input.width(block.width()-button.width()-44);
}

function thumbs()
{
    
    var w_block = $(".thumbs.block").width()-20;
    var w_item  = $(".thumbs.block .thumbnail").width()+10;
    
    var c_items = Math.floor(w_block/w_item);
    
    var m_items = Math.floor( (w_block-w_item*c_items)/(c_items*2) );
    
    $(".thumbs.block .thumbnail").css('margin',m_items);

}

function gallery()
{
    
    var w_block = $(".block.gallery").width()-20;
    var w_item  = $(".block.gallery a").width();
    
    var c_items = Math.floor(w_block/w_item);
    
    var m_items = Math.round( (w_block-w_item*c_items)/(c_items*2) );    
    
    $(".block.gallery a").css('margin',m_items);
}


// JavaScript Document

/*==================================================================================================

Application:   checkPostCode Function
Author:        John Gardner

Parameters:    toCheck - postcodeto be checked. 

This function checks the value of the parameter for a valid postcode format. The space between the 
inward part and the outward part is optional, although is inserted if not there as it is part of the 
official postcode.

If the postcode is found to be in a valid format, the function returns the postcode properly 
formatted (in capitals with the outward code and the inward code separated by a space. If the 
postcode is deemed to be incorrect a value of false is returned.

*/

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
				data: {email_to_test :jQuery('#email').val(),id_to_test:jQuery('#id').val(),type:type},
				beforeSend: function(){
				},
                success: function(msg){
					var error_placeholder=jQuery('#email').next('span');
                    if(msg==true)
                    {
						if(jQuery(error_placeholder).length)
							jQuery(error_placeholder).html("<b style='color:red'>Email Already Exists</b>");
                        jQuery('#email').focus();
                    }
					else if(/Email Already Exists/.test(jQuery(error_placeholder).html()))
						jQuery(error_placeholder).html("");
						
					console.log(JSON.stringify(msg));
                },   
                error: function(msg)
                {
					var error=JSON.stringify(msg);
					console.log('this is inside ajax func'+error);
                }
                
            });
 }

