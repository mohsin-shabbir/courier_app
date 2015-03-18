<?php
		$countries_list="";
		foreach($countries as $country) 
		{
			if(!empty($country["name"]))
				$countries_list.="\"".$country["name"]."\",";
		}
		if(!empty($countries_list))
			$countries_list=trim($countries_list, ",");
			
?>
<style>
	.datatable_list
	{
		cursor:pointer !important;
	}
	.ui-selected {
			background-color: #00B4F5 !important;
	}
</style>
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
            <div class="span6">
           		<b> Search Agent By Destination's Postal Code</b>
                <div class="span12" id="status_filter">
                		
                </div>
                </div>
            <div class="span6">
            	<b> Search Agent By country</b>
                    			
                    <div class="span12" id="country_filter">
                            
                    </div>
				</div>
             </div>   
			
               <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Invite Agents</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" id="invitation_table" class="table datatable_list" >
                            <thead>
                                <tr>
                            <th width="5%">ID</th>
                            <th width="15%">Name</th>
                            <th width="10%">E-mail</th>
                            <th width="10%">Contact#</th>
                            <th width="20%">Preferred Cities</th>
                            <th width="20%">Address</th>
                            <th width="10%">Status</th>
                            <th width="10%">Options</th>
                        </tr>
                            </thead>
                            <tbody>
                            
                            <?php
								if(isset($listData))
									foreach($listData as $agent)
									{
							?>
                                   <tr>
                                        <td><?php if(isset($agent['id']))echo $agent['id']; ?></td>
                                        <td><?php if(isset($agent['first_name']) && isset($agent['last_name']))echo $agent['first_name']." ".$agent['last_name']; ?></td>
                          <td><?php if(isset($agent['email']))echo $agent['email']; ?></td>
                          <td><?php  if(isset($agent['address_line1']))$home_address= $agent['address_line1']; if(isset($agent['address_line2'])) $street_address=" ,  ".$agent['address_line2']; if(isset($agent['address_line3'])) $town_address=" ,  ".$agent['address_line3']; if(isset($agent['address_line4'])) $country=" ,  ".$agent['address_line4']; echo $home_address .$street_address.$town_address.$country; ?></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><?php if(isset($agent['status']))echo $agent['status']; ?></td>
                                        
                                       <td>
                                        <p class="about">
                                        <a href="<?php echo site_url('admin/agents/save/'.$agent['id']); ?>"><span class="icon-edit" title="Edit"></span></a> 
                                        <a href="<?php echo site_url('admin/agents/delete/'.$agent['id']); ?>"><span class="icon-remove" title="Delete"> </span></a> 
                                        <?php
											
											if(isset($agent['status']))
												switch($agent['status'])
												{
													case 'Blocked':
										?>
                                        <a class="alert-success" href="<?php echo site_url('admin/agents/change_status/active/'.$agent['id']); ?>"><span class="icon-ok" title="Activate"></span></a> 
                                        <?php
															break;
													case 'Active':
										?>
                                        <a class="alert-danger" href="<?php echo site_url('admin/agents/change_status/block/'.$agent['id']); ?>"><span class="icon-ban-circle" title="Block"></span></a> 
                                                                                
                                        <?php
															break;
													case 'Pending':
										?>
                                        <a class="alert-danger" href="<?php echo site_url('admin/agents/change_status/block/'.$agent['id']); ?>"><span class="icon-ban-circle" title="Block"></span></a> 
                                        <a class="alert-success" href="<?php echo site_url('admin/agents/change_status/active/'.$agent['id']); ?>"><span class="icon-ok" title="Activate"></span></a> 
                                        <?php
															break;
													default:
															break;
												}
										?>
                                        </p>
                                        </td>
                                     </tr>
                         <?php
									}
						 ?>
                            </tbody>
                        </table>
	                    </div>
                    </div>                                
				</div>    
                <div class="row-fluid">
                            <div class="span12">
                            	<form action="<?php if(!empty($job_action)) echo site_url('admin/jobs/'.$job_action.'/'); else echo "#"; ?>" method="post" enctype="multipart/form-data" id="invite_award_form" >
                                    <div class="span4">
                                    	<input type="hidden" name="job" value="<?php if(!empty($job_id)) echo $job_id; ?>" />
                                    </div>
                                    <div class="span4" style="text-align:center;">
                                        <div class="span6"><input type="submit" class="btn btn-block" id="submit_button_agent" value="<?php if(!empty($job_action)) echo strtoupper($job_action); ?>"></div>
                                        <div class="span6"><input type="reset" id="reset_list" class="btn btn-block btn-danger" value="RESET" /></div>
                                     </div>
                                    <div class="span4">
                                     </div>
                                 </form>
                              </div>
                            </div>
                        
			<div class="dr"><span></span></div>  
                      
        </div>
<script>

jQuery("#reset_list").on("click",function(){
		
	$('#invitation_table').find("tr").each(function(){
			jQuery(this).removeClass('ui-selected');
			jQuery(this).removeClass('ui-selectee');
			jQuery(this).find('td').removeClass('ui-selectee');			
			jQuery(this).find('td').removeClass('ui-selected');
	});
	
});

jQuery("#invite_award_form").on("submit",function(e){
	var is_selected=false;
	$('#invitation_table').find("tr").each(function(){
			if(jQuery(this).hasClass('ui-selected'))
			{
				var id= jQuery(this).find("td > span.invite_award").attr('id');
				if(typeof id !="undefined")
				{
					jQuery("#invite_award_form").append("<input type='hidden' name='agents[]' value='"+id+"'/>");
					is_selected=true;
				}
			}
	});
	if(is_selected !== true)
	{
		e.preventDefault();
		alert('select an agent');
	}

});

<?php 
	if(!empty($job_action))
	{  
		
		switch($job_action)
		{
			case "award":
?>
					jQuery(function(){
					$('#invitation_table').on("click",function(event)
						 {
							 if(jQuery(event.target).parent('tr').hasClass('ui-selected'))
							 {
								 jQuery(event.target).parent('tr').removeClass('ui-selected');
								 jQuery(event.target).parent('tr').find('td').removeClass('ui-selected');
							 }
							else
							{
								$(this).find("tr").each(function(){
									 if(jQuery(this).hasClass('ui-selected'))
									 	jQuery(this).removeClass('ui-selected');
									 jQuery(this).find('td').removeClass('ui-selected');
								});
								jQuery(event.target).parent('tr').find('td').addClass('ui-selected');
								jQuery(event.target).parent('tr').addClass('ui-selectee ui-selected');
							}
						});
					});
<?php
						 break;
			case "invite":
?>
					
							jQuery(function(){
							$('#invitation_table').on("click",function(event)
								 {
									 if(jQuery(event.target).parent('tr').hasClass('ui-selected'))
									 {
										 jQuery(event.target).parent('tr').removeClass('ui-selected');
										 jQuery(event.target).parent('tr').find('td').removeClass('ui-selected');
									 }
									else
									{
										if(jQuery(event.target).parent('tr').find('.label-info').length == 0)
										{
											jQuery(event.target).parent('tr').find('td').addClass('ui-selectee ui-selected');
											jQuery(event.target).parent('tr').addClass('ui-selectee ui-selected');
										}
									}
								});
							});
<?php			
						break;
			default:
						break;
		}
	}
?>



jQuery(window).load(function(){

			var oTable=jQuery("#invitation_table").dataTable();
			if(typeof oTable != "undefined")
			{
				oTable.columnFilter({
				sPlaceHolder: "head:after",
				aoColumns: [ 		 
							 null,
							 null,
							 null,
							 null,
							 {sSelector: "#status_filter", type: "text"},
							 null,
							 null,
							{ sSelector: "#country_filter", type: "select", values: [<?php echo $countries_list; ?>] }
					]
				});
			}

	
});
</script>