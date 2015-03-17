<style>
.parsley-errors-list filled
{
	color:#33C;
}
</style>
<script type="text/javascript">
    $(document).ready( function(){
        $(".cb-enable").click(function(){
            var parent = $(this).parents('.switch');
            $('.cb-disable',parent).removeClass('selected');
            $(this).addClass('selected');
            $('.checkbox',parent).attr('checked', true);
        });
        $(".cb-disable").click(function(){
            var parent = $(this).parents('.switch');
            $('.cb-enable',parent).removeClass('selected');
            $(this).addClass('selected');
            $('.checkbox',parent).attr('checked', false);
        });
    });
</script>
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
</style>
<div class="container container-top-padding margin-bottom">
<div class="bredcrumb">
	<ul>
    	<li><a href="index.php">Home</a></li>
        <li>Login</li>
    </ul>
    <div class="clear"></div>
</div>   <!-- breadcrumb -->
<section id="login">
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
	<div class="simple-panel">
    	<div class="panel-content">
    	<h2>Recover Password</h2>
        <div class="login-form">
        	<form  method="post" data-parsley-validate action="<?php echo base_url() ?>user/forget_password">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">

                            <label>I'm:</label>

                            <div class="form-field type-select">
                                <p class="switch">
                                    <input type="radio" id="radio1" name="level" value="3" style="display:none" checked />
                                    <input type="radio" id="radio2" name="level" value="2" style="display:none"  />
                                    <label for="radio1" class="cb-enable selected"><span>Client</span></label>
                                    <label for="radio2" class="cb-disable"><span>Service Provider</span></label>
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>

                </div>
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <div class="form-field"><input type="email" name="email" required placeholder="Enter your email address" class="field" /></div>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                            <input type="submit" name="submit" value="" class="login-btn" />
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
            </form>
            <div class="clear"></div>
        </div> <!-- login form -->
        </div> <!-- panel content -->
         <!-- login form action buttons -->
        <div class="clear"></div>
    </div> <!-- simple panel -->
</section>  

</div> <!-- container -->
