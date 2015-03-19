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
                    <div class="span1">
                         Status
                    </div>			
                    <div class="span3" id="status_filter">
                            
                    </div>
                    <div class="span1">
                            &nbsp;
                    </div>

                    <div class="span7" id="from_date_filter">
                            
                    </div>
             	</div>
             </div>
            <div class="row-fluid">
            	<div class="span12">
                    <div class="span1">
                         Country
                    </div>			
                    <div class="span3" id="country_filter">
                            
                    </div>
				</div>
             </div>           
              <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Clients Listing</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" id="client_list_table" class="table datatable_list">
                            <thead>
                                <tr>
                            <th width="5%">ID</th>
                            <th width="17%">Name</th>
                            <th width="20%">E-mail</th>
                            <th width="15%">Contact</th>
                            <th width="20%">Address</th>
                            <th width="7%">All</th>
                            <th width="15%">Options</th>
                        </tr>
                            </thead>
                            <tbody>
                            
                            <?php
								if(isset($listData))
									foreach($listData as $client)
									{
							?>
                                   <tr>
                                        <td><?php if(isset($client['id']))echo $client['id']; ?></td>
                                        <td><?php if(isset($client['first_name']) && isset($client['last_name']))echo $client['first_name']." ".$client['last_name']; ?></td>
                          <td><?php if(isset($client['email']))echo $client['email']; ?></td>
                          <td><?php  if(isset($client['address_line1']))$home_address= $client['address_line1']; if(isset($client['address_line2'])) $street_address=", ".$client['address_line2']; if(isset($client['address_line3'])) $town_address=", ".$client['address_line3']; if(isset($client['address_line4'])) $country=", ".$client['address_line4']; echo $home_address .$street_address.$town_address.$country; ?></td>
                                        <td><?php if(isset($client['status']))echo $client['status']; ?></td>
                                       <td>
                                        <p class="about">
                                        <a href="<?php echo site_url('admin/clients/save/'.$client['id']); ?>"><span class="icon-edit" title="Edit"></span></a> 
                                        <a href="<?php echo site_url('admin/clients/change_status/delete/'.$client['id']); ?>"><span class="icon-remove" title="Inactive"> </span></a> 
                                        <?php
											
											if(isset($client['status']))
												switch($client['status'])
												{
													case 'Blocked':
										?>
                                        <a class="alert-success" href="<?php echo site_url('admin/clients/change_status/active/'.$client['id']); ?>"><span class="icon-ok" title="Activate"></span></a> 
                                        <?php
															break;
													case 'Active':
										?>
                                        <a class="alert-danger" href="<?php echo site_url('admin/clients/change_status/block/'.$client['id']); ?>"><span class="icon-ban-circle" title="Block"></span></a> 
                                                                                
                                        <?php
															break;
													case 'Pending':
										?>
                                        <a class="alert-danger" href="<?php echo site_url('admin/clients/change_status/block/'.$client['id']); ?>"><span class="icon-ban-circle" title="Block"></span></a> 
                                        <a class="alert-success" href="<?php echo site_url('admin/clients/change_status/active/'.$client['id']); ?>"><span class="icon-ok" title="Activate"></span></a> 
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
        <script>
jQuery(window).load(function(){

			var oTable=jQuery("#client_list_table").dataTable();
			if(typeof oTable != "undefined")
			{
				oTable.columnFilter({
				sPlaceHolder: "head:after",
				aoColumns: [ 
							 { type: "date-range" ,sSelector: "#from_date_filter" },
							 null,
							 null,
							 null,
							 null,
							 { sSelector: "#status_filter", type: "select", values: ["Active", "Inactive","Blocked","Pending"] },
							 { sSelector: "#country_filter", type: "select", values: [<?php echo $countries_list; ?>] }

					]
				});
			}
 
});
</script>