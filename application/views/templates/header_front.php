<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Courier App</title>
	<!-- core CSS -->
    <link href="<?php echo base_url(); ?>application/assets/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/assets/front/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/assets/front/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/assets/front/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/assets/front/css/owl.transitions.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/assets/front/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/assets/front/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/assets/front/css/responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/assets/front/css/jquery.bxslider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/assets/front/css/parsely.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/assets/front/css/dev_css.css" rel="stylesheet"> 
    <link href="<?php echo base_url(); ?>application/assets/front/css/sb-admin-2.css" rel="stylesheet"> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
     <link rel='stylesheet' type='text/css' href="<?php echo base_url('application/assets/css/chosen/chosen.min.css'); ?>"  />
    
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>application/assets/front/js/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>application/assets/front/js/respond.min.js"></script>
    <![endif]-->    
    <!--[if IE]>
     <style>
     .section-title-shape h2 { -ms-filter: "progid:DXImageTransform.Microsoft.Matrix(M11=1, M12=0.3639702342662022, M21=0.3639702342662022, M22=1, SizingMethod='auto expand')";}
     </style>
    <![endif]--> 
    <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/assets/front/css/ie.css" />
    <![endif]-->  
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/jquery-1.9.1.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/jquery-ui.min.js'); ?>"></script>
    <!--<script src="<?php echo base_url(); ?>application/assets/front/js/modernizr-2.6.2.min.js"></script>-->
    <script src="<?php echo base_url(); ?>application/assets/front/js/parsley.js"></script>


    <script type="text/javascript">
  	//$('#demo-form').parsley();
	</script>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>application/assets/front/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>application/assets/front/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>application/assets/front/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>application/assets/front/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>application/assets/front/images/ico/apple-touch-icon-57-precomposed.png">
  
</head><!--/head-->

<body>

<header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="<?php echo base_url(); ?>application/assets/front/images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-left">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="<?php echo base_url() ?>home">Home</a></li>
                        <li class="scroll dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Hire</a>
                              <!-- Link or button to toggle dropdown -->
                              <div class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                              <ul>
                                <li><a tabindex="-1" href="<?php echo base_url() ?>client/search_service_provider">Search Service Provider</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url() ?>home/post_job">Post a job</a></li>
                              </ul>
							</div>
                        </li>
                        <li class="scroll"><a href="<?php echo base_url() ?>client/search_jobs">Find a job</a></li>
                        <li class="scroll"><a href="<?php echo base_url() ?>agent/search_service_provider" class="two-lines">Companies / <br />Service Provider</a></li>
                        <li class="scroll"><a href="<?php echo base_url() ?>home#features">How it works</a></li>
                        <li class="scroll"><a href="<?php echo base_url() ?>home#about">About us</a></li>
                        <li class="scroll"><a href="<?php echo base_url() ?>home#contact">Contact us</a></li> 
                        <li class="hidden-sm hidden-md hidden-lg"><a href="login.php">Login</a></li> 
                        <li class="hidden-sm hidden-md hidden-lg"><a href="#contact">Register</a></li>                    
                    </ul>
                </div>
                
                <div class="secondary-menu hidden-xs">
                    <div class="login-links">
                        <a href="<?php echo base_url(); ?>home/login">Login</a> | <a href="<?php echo base_url(); ?>home/signup">Register</a>        
                    </div> <!-- login links -->
                </div>
            </div><!--/.container-->
            
            
            
        </nav><!--/nav-->
        
        
        
        <div class="clear"></div>
        
    </header><!--/header-->

    