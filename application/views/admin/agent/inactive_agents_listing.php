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
                        <h1>Sortable table</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table datatable_list" >
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
                                        <td><?php if(isset($agent['status']))echo $agent['status']; ?></td>
                                       <td>
                                        <p class="about">
                                        <a href="<?php echo site_url('admin/agents/save/'.$agent['id']); ?>"><span class="icon-edit" title="Edit"></span></a> 
                                        <a href="<?php echo site_url('admin/agents/change_status/delete/'.$agent['id']); ?>"><span class="icon-remove" title="Delete"> </span></a> 
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
			<div class="dr"><span></span></div>            
        </div>