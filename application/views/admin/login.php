<?php

	$email	   =	(set_value('email'))?set_value('email'):'';
	$password    =	(set_value('password'))?set_value('password'):'';

?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    
    <title>..::Courier App::..</title>

    <link rel="icon" type="image/ico" href="favicon.ico"/>
    
    <link href="<?php echo base_url('application/assets/css/stylesheets.css'); ?>" rel="stylesheet" type="text/css" />  

    <!--[if lt IE 8]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />
    <![endif]-->            
     <link rel='stylesheet' type='text/css' href="<?php echo base_url('application/assets/css/dev_css.css'); ?>"  />

    <script type='text/javascript' src="<?php echo base_url('application/assets/js/jquery-1.7.2.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/bootstrap.min.js'); ?>"></script>

  
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/validation/languages/jquery.validationEngine-en.js'); ?>" charset='utf-8'></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/validation/jquery.validationEngine.js'); ?>" charset='utf-8'></script>
    
<style>
	.alert
	{
		margin-bottom: 2px !important;
		word-wrap:break-word !important;
	}
</style>
</head>
<body>

    
<div class="loginBox">  
	<div class="workplace">
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
        <div >
            <img src="<?php echo base_url(); ?>application/assets/img/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/>
        </div>
        <form class="form-horizontal" id="validation" action="<?php echo site_url('admin/login'); ?>" method="POST">            
            <div class="control-group">
                <label for="inputEmail">Email</label>                
                <input type="text" class="validate[required, custom[email]]" id="inputEmail" name="email" value="<?php echo $email; ?>"/>
                <span class="">
                	<?php	echo form_error('email'); ?>
                </span>

            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>                
                <input type="password" id="inputPassword" class="validate[required,minSize[8]] " name="password"  value="<?php echo $password; ?>"/>                <span class="">
                	<?php	echo form_error('password'); ?>
                </span>
            </div>
            <div class="control-group" style="margin-bottom: 5px;">                
                &nbsp;                                               
            </div>
            <div class="form-actions">
            	<input type="hidden" name="level" value="1" />
                <button type="submit" class="btn btn-block">Sign in</button>
            </div>
        </form>        
    </div>
    <script>
		 $("#validation").validationEngine({
				promptPosition : "topRight", 
				scroll: true		
		});        
	</script>