<div class="container container-top-padding margin-bottom">
    <style>
        .errorDivUkCode
        {
            display: none;
        }
        .error_red
        {
            color:red !important;
        }
        @charset "utf-8";
        /* CSS Document */
    </style>
    <script type="text/javascript">
        function sunmitClick()
        {
            $( ".parsley-errors-list filled" ).appendTo( $( ".mendatory-field" ));
        }
        $(document).ready( function(){
            $(".hide_agent").hide();
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
    <script type="text/javascript">
        function hide_agent()
        {
            $(".hide_agent").hide();
        }
        function hide_client()
        {
            $(".hide_agent").show();
        }
    </script>
    <?php
    $creator_id	   =	(set_value('creator_id')?set_value('creator_id'):'0');
    $ci_error	     =	((set_value('addressUkCode1'))?TRUE:FALSE);
    $id	   		   =	(set_value('id')?set_value('id'):'-1');
    $salutation	   =	(set_value('salutation')?set_value('salutation'):'');
    $first_name	   =	(set_value('first_name')?set_value('first_name'):'');
    $last_name		=	(set_value('last_name')?set_value('last_name'):'');
    $company_name     =	(set_value('company_name')?set_value('company_name'):'');
    $country_code	 =	(set_value('country_code')?set_value('country_code'):'');
    $post_code		=	(set_value('addressUkCode1')?set_value('addressUkCode1'):'');
    $address_line1    =	(set_value('house_numberUkCode1')?set_value('house_numberUkCode1'):'');
    $address_line2    =	(set_value('streetUkCode1')?set_value('streetUkCode1'):'');
    $address_line3    =	(set_value('townUkCode1')?set_value('townUkCode1'):'');
    $address_line4    =	(set_value('countyUkCode1')?set_value('countyUkCode1'):'');
    $latitude         =	(set_value('latitudeUkCode1')?set_value('latitudeUkCode1'):'');
    $longitude		=	(set_value('longitudeUkCode1')?set_value('longitudeUkCode1'):'');
    $telephone		=	(set_value('telephone')?set_value('telephone'):'');
    $mobile           =	(set_value('mobile')?set_value('mobile'):'');
    $email            =	(set_value('email')?set_value('email'):'');
    $password         =	(set_value('password')?set_value('password'):'');
    $confirm_password =	(set_value('confirm_password')?set_value('confirm_password'):'');
    $created_date     =	(set_value('created_date')?set_value('created_date'):date('Y-m-d'));
    $last_update      =	(set_value('last_update')?set_value('last_update'):date('Y-m-d h:i:s'));
    $old_profile_image=    (set_value('old_profile_image')?set_value('old_profile_image'): "");
    $question_id	  =	(set_value('security_question')?set_value('security_question'):'');
    $security_answer  =	(set_value('security_answer')?set_value('security_answer'):'');
    $status		   =	(set_value('status')?set_value('status'):"Active");
    $security_code  =	(set_value('security_code')?set_value('security_code'):'');
    $security_code  =	(set_value('security_code')?set_value('security_code'):'');



    ?>
    <div class="bredcrumb">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>Register</li>
        </ul>
        <div class="clear"></div>
    </div>   <!-- breadcrumb -->
    <div class="row-fluid">
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
    <section id="signup">
        <div class="simple-panel">
            <div class="panel-content">
                <h2>Sign up Information</h2>

                <div class="login-form signup-form">
                    <form class="form-horizontal validation_form_UkCode" method="post"  data-parsley-validate  enctype="multipart/form-data" action="<?php echo base_url(); ?>agent/save"  >
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="control-group">
                                    <div class="form-group">
                                        <label for="email" class="control-label">Name:</label>
                                        <div class="form-field">
                                            <select class="form-control field genre" name="salutation"  required data-parsley-trigger="change">
                                                <option  value="Mr" <?php if($salutation=='Mr')echo 'selected'; ?> >Mr.</option>
                                                <option  value="Miss" <?php if($salutation=='Miss')echo 'selected'; ?> >Miss.</option>
                                                <option  value="Mrs" <?php if($salutation=='Mrs')echo 'selected'; ?> >Mrs.</option>
                                            </select>
                                            <span class='error_red'><?php echo form_error('salutation'); ?>&nbsp;</span>
                                        </div>
                                        <div class="form-field"><input required data-parsley-trigger="change" type="text" id="first_name" name="first_name"   placeholder="First Name" class="field field-sm validate[required]" value="<?php echo $first_name; ?>">
                                            <span class='error_red'><?php echo form_error('first_name'); ?>&nbsp;</span>
                                        </div>
                                        <div class="form-field"><input type="text" id="last_name"  value="<?php echo $last_name; ?>" name="last_name" placeholder="Last Name" class="field field-sm">
                                            <span class='error_red'><?php echo form_error('last_name'); ?>&nbsp;</span>
                                        </div> <span class="mendatory-field">*</span>
                                        <div class="clear"></div>
                                    </div> <!-- form group -->

                                </div> <!-- control group -->
                            </div>
                            <div class="clear"></div>
                        </div> <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Image:</label>
                                    <input type="file" name="profile_image" id="profile_image" value="<?php //echo $address; ?>" required data-parsley-trigger="change" placeholder="Your address" class="field" />
                                    <span class="mendatory-field">*</span>

                                    <div class="clear"></div>
                                </div> <!-- form group -->
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Postcode:</label>
                                    <input type="text"  name="addressUkCode1" id="addressUkCode1" placeholder="Your postcode" class="addressUkCode field field-sm" value="<?php echo $post_code; ?>" />
                                    <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                    <span class='error_red'><?php echo form_error('addressUkCode1'); ?></span>
                                    <div class="form-addon">
                                        <a id="findAddressUkCode1" class="findAddressUkCode" href="">Find Adderess</a>&nbsp;&nbsp;&nbsp;
                                        <a href="" class="dontKnowUkCode" id="dontKnowUkCode1">Don't know?</a>
                                    </div>
                                    <div class="clear"></div>
                                <span class="errorDivUkCode" id="addressErrorDivUkCode1">
                                     <span id="address_errorUkCode1" class="error_red">* Please provide a valid Status </span>
                                </span>
                                </div> <!-- form group -->
                            </div>
                        </div> <!-- row -->

                        <div id='hiddenAddressFieldsUkCode1' class='hiddenAddressFieldsUkCode row-form clearfix <?php if((isset($id) && $id>0) || ($ci_error ==TRUE)) echo ""; else echo "errorDivUkCode"; ?>'>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input  value="" type="text" required data-parsley-trigger="change" name="house_numberUkCode1" id="house_numberUkCode_hidden1" placeholder="Mention your experience here" class="field house_numberUkCode" /> <span class="mendatory-field">*</span>
                                        <div class="clear"></div>
                                        <span class='error_red'><?php echo form_error('house_numberUkCode1'); ?></span>
                                     <span class="errorDivUkCode" id="house_number_noDivUkCode1">
                                        <span id="house_number_noErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                     </span>
                                    </div> <!-- form group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Street:</label>
                                        <input value="" type="text" name="streetUkCode" id="streetUkCode_hidden1" placeholder="Mention your experience here" class="field streetUkCode" /> <span class="mendatory-field">*</span>
                                        <div class="clear"></div>
                                        <span class='error_red'><?php echo form_error('streetUkCode1'); ?></span>
                                                            <span class="errorDivUkCode" id="streetDivUkCode1">
                                                                <span id="streetErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                             </span>
                                    </div> <!-- form group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Town:</label>
                                        <input value="" type="text" name="townUkCode1" id="townUkCode_hidden1" placeholder="Mention your experience here" class="field townUkCode" /> <span class="mendatory-field">*</span>
                                        <div class="clear"></div>
                                        <span class='error_red'><?php echo form_error('townUkCode1'); ?></span>
                                                            <span class="errorDivUkCode" id="townDivUkCode1">
                                                                <span id="townErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                             </span>
                                    </div> <!-- form group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Country:</label>
                                        <input value="" type="text" name="countyUkCode1" id="countyUkCode_hidden1" placeholder="Mention your experience here" class="field countyUkCode" /> <span class="mendatory-field">*</span>
                                        <div class="clear"></div>
                                        <span class='error_red'><?php echo form_error('countyUkCode1'); ?></span>
                                                            <span class="errorDivUkCode" id="countyDivUkCode1">
                                                                <span id="countyErrorUkCode1" class="txt-pink span11">* Please provide a valid Status </span>
                                                             </span>
                                    </div> <!-- form group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Longitude:</label>
                                        <input value="" type="text" readonly="readonly" name="longitudeUkCode1" id="longitudeUkCode_hidden1"
                                               class="field longitudeUkCode" /> <span class="mendatory-field">*</span>
                                        <div class="clear"></div>
                                        <span class='error_red'><?php echo form_error('longitudeUkCode1'); ?></span>
                                                            <span class="errorDivUkCode" id="longitudeDivUkCode1">
                                                                <span id="longitudeErrorUkCode1" class="txt-pink span11">&nbsp; </span>
                                                             </span>
                                    </div> <!-- form group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Latitude:</label>
                                        <input value="" type="text" readonly="readonly" name="latitudeUkCode1" id="latitudeUkCode_hidden1" class="field latitudeUkCode" /> <span class="mendatory-field">*</span>
                                        <div class="clear"></div>
                                        <span class='error_red'><?php echo form_error('latitudeUkCode1'); ?></span>
                                                            <span class="errorDivUkCode" id="latitudeDivUkCode1">
                                                                <span id="latitudeErrorUkCode1" class="txt-pink span11">&nbsp;</span>
                                                             </span>
                                    </div> <!-- form group -->
                                </div>
                            </div>
                        </div>
                        <div class="row-form clearfix responseUkCode" id="responseUkCode1">
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Country:</label>
                                    <select class="form-control field chosen-select" name="country_id" required data-parsley-trigger="change">
                                        <option value="">Select Country :</option>
                                        <?php
                                        foreach($countries as $country)
                                        {
                                            ?>
                                                        <option value="<?php echo $country['id']; ?>" />
                                                        <?php echo $country['name']; ?></option>
                                                <?php
                                        }
                                        ?>
                                    </select> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                    <span class='error_red'><?php echo form_error('country_id'); ?></span>
                                </div> <!-- form group -->
                            </div>
                        </div> <!-- row -->
                        <!-- row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Telephone:</label>
                                    <input  required data-parsley-trigger="change" value="<?php echo $telephone; ?>" type="text" name="telephone" placeholder="Your telephone no" class="field" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                    <span class='error_red'><?php echo form_error('telephone'); ?></span>
                                </div> <!-- form group -->
                            </div>
                        </div> <!-- row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Mobile phone:</label>
                                    <input  required data-parsley-trigger="change" value="<?php echo $mobile; ?>" type="text" name="mobile" placeholder="Your mobile no" class="field" />
                                    <div class="clear"></div>
                                    <span class='error_red'><?php echo form_error('mobile'); ?></span>
                                </div> <!-- form group -->
                            </div>
                        </div> <!-- row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email address:</label>
                                    <input  required data-parsley-trigger="change" value="<?php echo $email; ?>" type="email" name="email" placeholder="Your email address" class="field" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                    <span class='error_red'><?php echo form_error('email'); ?></span>
                                </div> <!-- form group -->
                            </div>
                        </div> <!-- row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input  required data-parsley-trigger="change" value="<?php echo $password; ?>" type="text" name="password" placeholder="Your password" class="field" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                    <span class='error_red'><?php echo form_error('password'); ?></span>
                                </div> <!-- form group -->
                            </div>
                        </div> <!-- row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Re-type password:</label>
                                    <input  required value="<?php echo $confirm_password; ?>" type="text" name="confirm_password" placeholder="Confirm your password" class="field" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                    <span class='error_red'><?php echo form_error('confirm_password'); ?></span>
                                </div> <!-- form group -->
                            </div>
                        </div> <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Security Question:</label>
                                    <select class="form-control field" name="security_question" id="security_question"  required data-parsley-trigger="change">

                                        <option value="">Select Security Question</option>
                                        <?php
                                        foreach($security_questions as $question)
                                        {
                                            ?>
                                                        <option value="<?php echo $question['id']; ?>" <?php if($question_id==$question['id'])echo "selected"; ?> />
                                                        <?php echo $question['question']; ?></option>
                                                <?php
                                        }
                                        ?>
                                    </select>    <span class="mendatory-field">*</span>
                                    <span><?php echo form_error('security_question'); ?></span></div>

                                <div class="clear"></div>
                            </div> <!-- form group -->
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Answer:</label>
                                    <input  required data-parsley-trigger="change" value="<?php echo $security_answer; ?>" type="text" name="security_answer" placeholder="Mention your experience here" class="field" /> <span class="mendatory-field">*</span>
                                    <span class='error_red'><?php echo form_error('security_answer'); ?>&nbsp;</span>
                                    <div class="clear"></div>
                                </div> <!-- form group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <div class="captcha"><img src="<?php echo base_url(); ?>application/assets/front/images/captcha-placeholder.png" class="img-responsive"></div>
                                    <span>Can't Read Please <a href="">Refresh</a></span>
                                    <div class="clear"></div>
                                </div> <!-- form group -->
                            </div>
                        </div> <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Security Code:</label>
                                    <input  required data-parsley-trigger="change" value="<?php echo $security_code; ?>" name="security_code" id="security_code" type="text" placeholder="" class="field" /> <span class="mendatory-field">*</span>
                                    <div class="clear"></div>
                                    <span class='error_red'><?php echo form_error('security_code'); ?>&nbsp;</span>
                                </div> <!-- form group -->
                            </div>
                        </div> <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                                    <input type="hidden" name="creator_id" id="creator_id" value="<?php echo $creator_id; ?>" />
                                    <input type="hidden" name="status" id="status" value="<?php echo $status; ?>" />
                                    <input type="hidden" name="old_profile_image" id="old_profile_image" value="<?php echo $old_profile_image; ?>" />
                                    <input type="hidden" name="created_date" id="created_date" value="<?php echo $created_date; ?>" />
                                    <input type="hidden" name="last_update" id="last_update" value="<?php echo $last_update; ?>" />
                                    <label>&nbsp;</label>
                                    <div class="signup-btn"><input type="submit" class="register-btn" ></div>
                                    <div class="clear"></div>
                                </div> <!-- form group -->
                            </div>
                        </div> <!-- row -->

                    </form>
                    <div class="clear"></div>
                </div> <!-- login form -->
            </div> <!-- panel content -->

            <div class="clear"></div>
        </div> <!-- simple panel -->
    </section>

</div>
<input type="hidden" name="get_address_uk" id="get_address_uk" value="<?php echo site_url('client/get_address_uk'); ?>"/>
<script>
    var url   = "<?php echo site_url('admin/agents/uniqueLogin'); ?>";
    var form  = 'validation';
    var type = 'agents';
    jQuery(function(){
        jQuery('#email').on('blur',function(){validateUnique(form,url,type);});

        jQuery('#country_code').on('change',function(){

            jQuery("#preferred_cities").html('');
            jQuery('#preferred_cities').trigger("chosen:updated");

            jQuery.ajax({
                url:"<?php echo site_url('admin/agents/get_cities'); ?>",
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
                    console.log(data);
                },
                error: function(msg){
                    console.log(msg);
                }
            });
        });
    });
</script>