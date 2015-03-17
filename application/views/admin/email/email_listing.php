<script type="text/javascript" language="JavaScript">
    $(document).ready( function () {
        if($("#t_listing_company").length > 0)
        {
            $("#t_listing_company").dataTable({"iDisplayLength": 5, "aLengthMenu": [5,10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": false }, null, null, null, null,null]});
        }
    });
	</script>
         
        <div class="workplace">
     
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
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Pages List</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="t_listing_company">
                            <thead>
                            <tr>
                            <th width="8%">#</th>
                            <th width="20%">Title</th>
                            <th width="25%">Subject</th>
                            <th width="25%">Description</th>
                            <th width="7%">Status</th>
                            <th width="10%">Options</th>
                        </tr>
                            </thead>
                            <tbody>
                    	<?php
						global $i;
						$i = 1;
						if(isset($listData))
						foreach($listData as $page)
							{
							if(strlen(stripslashes(strip_tags($page['description'])))>30)
							{
							$url = site_url('admin/emails/save/'.$page['id']);
							$viewmoredescription = '<a href="'.$url.'">  View More...</a>';
							} 
							$description =  substr(stripslashes(strip_tags($page['description'])),0, 80).$viewmoredescription;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php if(isset($page['title']))echo $page['title']; ?></td>
								<td><?php if(isset($page['subject']))echo $page['subject']; ?></td>
								<td><?php if(isset($page['description']))echo $description; ?></td>
								<td>                    
								<?php
								if(isset($page['status']))
								switch($page['status'])
								{
								case 1:
								print  'Active';
								break;
								case 0:
								print '<font color="red">Disable</font>';
								break;
								}
								?>
								
								</td>
								<td>
								<p class="about">
								<a href="<?php echo site_url('admin/emails/save/'.$page['id']); ?>"><span class=""><img src="<?php echo base_url('application/assets/img/ic_edit.png'); ?>"  title="Edit"/></span></a> 
								<a href="<?php echo site_url('admin/emails/delete/'.$page['id']); ?>"><span class=""><img src="<?php echo base_url('application/assets/img/ic_delete.png'); ?>"  title="Delete"/></span></a>  
								
								
								</p>
								</td>
							</tr>
							<?php
							$i++;
						}
						?>
                       
                                                 
                            </tbody>
                        </table>
                    </div>
                </div>                                
                
            </div>            
            
            <div class="dr"><span></span></div>            
            
        </div>