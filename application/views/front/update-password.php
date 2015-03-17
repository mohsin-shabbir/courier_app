<style>
.parsley-errors-list filled
{
	color:#33C;
}
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
	<div class="simple-panel">
    	<div class="panel-content">
    	<h2>Update Password</h2>
        <div class="login-form">
        	<form  method="post" data-parsley-validate action="<?php echo base_url() ?>home/dashboard">
            	          
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
                            <label for="password">Old Password:</label>
                            <div class="form-field">
                            <input type="password" required data-parsley-trigger="change"  name="pwd"  placeholder="Enter your password" value="" class="field" /></div>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                	<div class="col-sm-12">
                        <div class="form-group">
                            <label for="password">New Password:</label>
                            <div class="form-field">
                            <input type="password" required data-parsley-trigger="change"  name="pwd"  placeholder="Enter your password" value="" class="field" /></div>
                            <div class="clear"></div>
                        </div> <!-- form group -->
                    </div>
                </div>
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
