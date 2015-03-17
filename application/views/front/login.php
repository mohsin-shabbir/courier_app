<div class="container container-top-padding margin-bottom">
<style>
@charset "utf-8";
/* CSS Document */
</style>
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
<div class="bredcrumb">
	<ul>
    	<li><a href="index.php">Home</a></li>
        <li>Login</li>
    </ul>
    <div class="clear"></div>
</div>   <!-- breadcrumb -->
<section id="signup">
	<div class="simple-panel">
    	<div class="panel-content">
    	<h2>Login Information</h2>
        
        <div class="login-form signup-form">
        	<div class="signup_options">
            	I am :<br />
                <a href="<?php echo base_url(); ?>client/login">Client</a>
                <a href="<?php echo base_url(); ?>agent/login">Service Provider</a>
            </div>
            <div class="clear"></div>
        </div> <!-- login form -->
        </div> <!-- panel content -->
        
        <div class="clear"></div>
    </div> <!-- simple panel -->
</section>  

</div>