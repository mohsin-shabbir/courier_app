<style>
ul.rows li .title {
    color: #060606;
    font-weight: bold;
    left: 10px;
    position: absolute;
    top: 8px;
    width: 120px;
}
</style>
		<script>
        function reg_valid()
        {
			//alert("hello");
        ////////////////////////////////////////////////////Validate User Type ////////////////////////////////////////////////////////////
							if(document.getElementById('wysiwyg').value ==""  || document.getElementById('wysiwyg').value[0] == " ")
								{	
									
									document.getElementById('descriptionErrorDiv').style.display='block';					
									document.getElementById('description_error').innerHTML='* Please enter description.';
									//document.getElementById('description').focus();
									return false;
								}	
								else
								{
									document.getElementById('description_error').innerHTML='';
									document.getElementById("descriptionErrorDiv").style.display='none';
									abc=2;
								}
						////////////////////////////////////////////////////Validate User Type //////////////////////////////////////////////////////////////////
						
        }
        </script>
        <?php
		$id	 =	(set_value('id'))?set_value('id'):(isset($data['id'])?$data['id']:'-1');  
		$title = (set_value('title'))?set_value('title'):(isset($data['title'])?$data['title']:'');
		$subject = (set_value('subject'))?set_value('subject'):(isset($data['subject'])?$data['subject']:'');
		$status	   =	(set_value('status'))?set_value('status'):(isset($data['status'])?$data['status']:''); 
		$description =	(set_value('description'))?set_value('description'):(isset($data['description'])?$data['description']:''); 
		///$keyword =	(set_value('keyword'))?set_value('keyword'):(isset($data['keyword'])?$data['keyword']:''); 
		?>
           
            <div class="dr"><span></span></div>   
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
              <form onSubmit="return reg_valid()" id="validation" method="POST" enctype="multipart/form-data" action="<?php echo site_url('admin/emails/save'); ?>" >         
               <div class="row-fluid">
                <div class="span11">
                <div class="span2">
                &nbsp;
                </div>
                <div class="span8" style="margin:0 auto">                    
                  <div class="block-fluid ucard clearfix">
                        
                            <div class="left">
                               &nbsp;                            
                            </div>
                            <div class="info"> 
                                                                                 
                                <ul class="rows">
                                    <li class="heading"><h6>Add Email</h6></li>
                                    
                                    <li>
                                        <div class="title">Email Title:</div>
                                        <div class="text"><input type="text" id="title" name="title" class="validate[required]" value="<?php echo $title; ?>" />
                                        <span class='error_red'><?php echo form_error('title'); ?>&nbsp;</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">Email Subject:</div>
                                        <div class="text">
                                        <input type="text" id="subject" name="subject" class="validate[required]" value="<?php echo $subject; ?>"  />
                                        <span class='error_red'><?php echo form_error('subject'); ?>&nbsp;</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">Page Status:</div>
                                        <div class="text">
                                        <select name="status" id="status">
                                            <option <?php echo ($status=="1")?"selected":""; ?> value="1">Active</option>
                                            <option <?php echo ($status=="0")?"selected":""; ?> value="0">Inactive</option>
                                          
                                        </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="title">Description:</div>
                                        <div class="text">&nbsp;</div>
                                    </li>
                                    <li>
                                        <textarea name="description" id="wysiwyg" style="width:96%;" rows="5"  onBlur = "return reg_valid();" ><?php echo $description; ?></textarea>
                                        <span class='error_red'><?php echo form_error('description'); ?>&nbsp;</span>
                                        <div id="descriptionErrorDiv" class="errorDiv">          
                                       		 <label class="error" id="description_error"></label>
                                       	</div>
                                    </li>
                                                                       
                                </ul>    
                                                                                 
                            </div>                        
                            
                    </div>
                </div>                                
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
            </div>
               <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                </div>
                <div class="span4" style="text-align:center;">
                <div class="span6"><input type="submit"  class="btn btn-block" value="Submit" /></div>
                <div class="span6"><input type="reset" name="reset"  id="reset" class="btn btn-block" value="Reset" /></div>
                            
                 </div>
                <div class="span4">
                </div>
                 </div>
            </div>
             </form>
            <div class="dr"><span></span></div>
