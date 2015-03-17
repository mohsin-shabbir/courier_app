
    <section id="contact">
        <!--<div id="google-map" style="height:600px" data-latitude="52.365629" data-longitude="4.871331"></div>-->
       <iframe src="https://www.google.com/maps/embed?pb=!1m27!1m12!1m3!1d108865.56945480309!2d74.23491264626213!3d31.49533568811008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m12!1i0!3e6!4m5!1s0x391903f963e1b891%3A0x36490e5d7ddd65e!2zRkFJU0FMIFRPV04g2YHbjNi12YQg2bnYp9mI2ZTZhg!3m2!1d31.483333!2d74.3!4m3!3m2!1d31.492847299999998!2d74.2936208!5e0!3m2!1sen!2s!4v1424428716620" width="600" height="600" frameborder="0" style="border:0" id="google-map"></iframe>
        <div class="container-wrapper">
            <div class="container">
            	<div class="section-header text-center">
                    <div class="section-title-shape">
                        <h2 class="section-title text-center text-white">Get in touch</h2>
                    </div>
                </div>
                <div class="">
                    <div class="col-sm-4">
                        <div class="contact-info"> 
                            <ul class="address">
                            	<li class="location-icon icon">
                            	DieSachbearbeiter<br>
                                Sch&ouml;nhauser Allee 167c<br />
                                Canada.</li>
                              	<li class="call-icon icon"></abbr> <a href="tel:+21123456789">+21 123 456 789</a></li>
                              	<li class="email-icon icon"><a href="mailto:info@yoursite.com">info@yoursite.com</a>
                            </ul>
                        </div> <!-- contact info -->
                    </div> <!-- column -->
                    <div class="col-sm-8">
                    	<div class="row">
						<div class="contact-form">
	
                            <form id="demo-form" data-parsley-validate  name="contact-form" method="post" action="<?php echo base_url() ?>home/contact_us">
                            	
                                	<div class="col-sm-6 padding-right-zero">
                                        <div class="form-group">
                                        	<label>Name:</label>
                                            <input type="text" name="name" id="name" required class="form-control txt-field" placeholder = "Name" onfocus="(this.value == 'Name') && (this.value = '')"  onblur="(this.value == '') && (this.value = 'Name')" data-parsley-trigger="change" >
                                        </div>
                                        <div class="form-group">
                                        	<label>Email:</label>
                                            <input type="email" name="email"  placeholder = "Email"  data-parsley-trigger="change" required class="form-control txt-field"
                                             onfocus="(this.value == 'Email') && (this.value = '')"
                                             onblur="(this.value == '') && (this.value = 'Email')">
                                        </div>
                                        <div class="form-group"> 
                                        <label>Subject:</label>
                                            <input type="text" required name="subject" class="form-control txt-field" placeholder = "Subject" value="" onfocus="(this.value == 'Subject') && (this.value = '')"
       onblur="(this.value == '') && (this.value = 'Subject')">
                                        </div>
                                    </div> <!-- column --> 
                                    <div class="col-sm-6">   
                                        <div class="form-group">
                                        	<label>Message:</label>
                                            <textarea name="message" class="form-control txt-area" rows="10" placeholder = "Message" 
                                            value="" onfocus="(this.value == 'Message') && (this.value = '')"
                                            onblur="(this.value == '') && (this.value = 'Message')" required ></textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="col-sm-6">   
                                        <div class="form-group">
                                            <img src="<?php echo base_url(); ?>application/assets/front/images/captcha-placeholder.png" class="img-responsive">
                                        </div>
                                        <div class="form-group">
                                        	<label>Security Code:</label>
                                            <input type="text" name="name" id="name" required class="form-control txt-field" placeholder = "Name" onfocus="(this.value == 'Name') && (this.value = '')"  onblur="(this.value == '') && (this.value = 'Name')" data-parsley-trigger="change" >
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Send Message">
                                        </div> <!-- column -->    
                               
                            </form>
                        </div> <!-- contact form -->
                         </div> <!-- row -->
                    </div> <!-- column -->
                </div> <!-- row -->
            </div>
        </div>
        <div class="clear"></div>
	</section><!--/#bottom-->
    
    <section id="social">
    	 <div class="container">

            <div class="section-header text-center">
            	<div class="section-title-shape">
                	<h2 class="section-title text-center">Stay updated</h2>
                </div>
            </div>
            <!--<div class="row">
            	<ul class="social-icons">
                	<li><a href="javascript:;"><img src="<?php echo base_url(); ?>application/assets/front/images/icons/twitter.png" alt="" /></a></li>
                    <li><a href="javascript:;"><img src="<?php echo base_url(); ?>application/assets/front/images/icons/facebook.png" alt="" /></a></li>
                    <li><a href="javascript:;"><img src="<?php echo base_url(); ?>application/assets/front/images/icons/google-plus.png" alt="" /></a></li>
                </ul>
            </div>--> <!-- row -->
            <!--
            <div class="row">
            	<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                    <ul class="social-icons">
                    	<div class="flipper">
                            <div class="front">
                        		<li><a href="javascript:;"><img src="<?php echo base_url(); ?>application/assets/front/images/icons/twitter.png" alt="" /></a></li>
                            </div>
                            <div class="back">
                            	 <li><a href="javascript:;"><img src="<?php echo base_url(); ?>application/assets/front/images/icons/twitter-flip.png" alt="" /></a></li>
                            </div>
                          </div>
                    </ul>
                </div>
            </div>-->
            <div class="row social-icons">
                <div class="f1_container">
                    <div class="f1_card">
                      <div class="front face">
                         <a href="#"><img src="<?php echo base_url(); ?>application/assets/front/images/icons/twitter.png"/></a>
                      </div>
                      <div class="back face center hidden-ie">
                        <img src="<?php echo base_url(); ?>application/assets/front/images/icons/twitter-flip.png"/>
                      </div>
                    </div>
                </div>
                
                 <div class="f1_container">
                    <div class="f1_card">
                      <div class="front face">
                        <a href="#"><img src="<?php echo base_url(); ?>application/assets/front/images/icons/facebook.png"/></a>
                      </div>
                      <div class="back face center hidden-ie">
                        <img src="<?php echo base_url(); ?>application/assets/front/images/icons/facebook-flip.png"/>
                      </div>
                    </div>
                </div>
                
                 <div class="f1_container">
                    <div class="f1_card">
                      <div class="front face">
                         <a href="#"><img src="<?php echo base_url(); ?>application/assets/front/images/icons/google-plus.png"/></a>
                      </div>
                      <div class="back face center hidden-ie">
                        <img src="<?php echo base_url(); ?>application/assets/front/images/icons/google-plus-flip.png"/>
                      </div>
                    </div>
                </div>
                
            </div> <!-- row -->
            
        </div> <!-- container -->    
    </section>
<div class="clear"></div>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="copyright">&copy; Copyright - 2015</p>
                    <p class="poweredby">Powered by: <a href="http://www.mobitsolutions.com" target="_blank">MobitSolutions</a></p>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    <!--------------Comment It to apply jquery calendar-------------->
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->

   <!-- <script type="text/javascript" src="<?php echo base_url(); ?>application/assets/front/js/jquery.validate.min.js"></script>-->
<script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/chosen/chosen.min.js'); ?>"></script>	
<script src="<?php echo base_url(); ?>application/assets/front/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="<?php echo base_url(); ?>application/assets/front/js/mousescroll.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/front/js/smoothscroll.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/front/js/main.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/front/js/jquery.bxslider.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/front/js/TweenMax.min.js"></script>
	<script src="<?php echo base_url(); ?>application/assets/front/js/EasePack.min.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/front/js/animate-scroll.js"></script>

	<script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>
    <script>
		  $('.bxslider').bxSlider({
				nextSelector: '#slider-next',
				prevSelector: '#slider-prev',
				auto: true,
				default: false
		  });
		  
		  
		  
		  
	</script>
	<!--<script>
	$(function (){ 
	  	$("[data-toggle='popover']").popover();
      });
	  
   </script>-->
   
   <!--<script type="text/javascript">
		 $('#foo').popover({
			placement : 'top',
			title : 'Title',
			content : '<div id="popOverBox"><img src="http://i.telegraph.co.uk/multimedia/archive/01515/alGore_1515233c.jpg" /></div>'
		});
	</script>-->
    <script>
			$('#popper').popover({
				placement : 'top',
				container: 'body',
				html: true,
				content: function () {
					return $(this).next('.popper-content').html();
				}
			});
			$(document).animateScroll();
    </script>
   
  </body>
</html>