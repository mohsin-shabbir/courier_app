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
    <link rel='stylesheet' type='text/css' href="<?php echo base_url('application/assets/css/fullcalendar.print.css'); ?>" media='print' />
     <link rel='stylesheet' type='text/css' href="<?php echo base_url('application/assets/css/dev_css.css'); ?>"  />
     <link rel='stylesheet' type='text/css' href="<?php echo base_url('application/assets/css/chosen/chosen.min.css'); ?>"  />
<?php /*?>     <link rel='stylesheet' type='text/css' href="<?php echo base_url('application/assets/css/dataTables.min.css'); ?>"  />
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/jquery-1.8.3.min.js'); ?>"></script>


<?php */?>   

    <script type='text/javascript' src="<?php echo base_url('application/assets/js/jquery-1.7.2.min.js'); ?>"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/jquery-ui.min.js'); ?>"></script>


    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/jquery/jquery.mousewheel.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/cookie/jquery.cookies.2.2.0.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/bootstrap.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/charts/excanvas.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/charts/jquery.flot.js'); ?>"></script>    
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/charts/jquery.flot.stack.js'); ?>"></script>    
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/charts/jquery.flot.pie.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/charts/jquery.flot.resize.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/sparklines/jquery.sparkline.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/fullcalendar/fullcalendar.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/select2/select2.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/uniform/uniform.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/validation/languages/jquery.validationEngine-en.js'); ?>" charset='utf-8'></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/validation/jquery.validationEngine.js'); ?>" charset='utf-8'></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/animatedprogressbar/animated_progressbar.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/cleditor/jquery.cleditor.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/dataTables/dataTables.min.old.js'); ?>"></script>   
	<script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/dataTables/column_filter.js'); ?>"></script>    
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/fancybox/jquery.fancybox.pack.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/cookies.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/actions.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/charts.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/plugins/chosen/chosen.min.js'); ?>"></script>
    
    
     <script type='text/javascript' src="<?php echo base_url('application/assets/js/ckeditor.js'); ?>"></script>
    <script type='text/javascript' src="<?php echo base_url('application/assets/js/config.js'); ?>"></script>
    
</head>
<body>
    <div class="header">
        
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    <?php
		if(!empty($nav))
			echo $nav;
	?>
    <div class="content">
<div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Admin</a> <span class="divider">></span></li>                
                <li class="active">Dashboard</li>
            </ul>
            <ul class="buttons">
                <li>
                    <a href="<?php echo site_url('admin/logout'); ?>" class="" title="logout"><span class="icon-off"></span><span class="text">Logout</span></a>
                </li>                
            </ul>
        </div>