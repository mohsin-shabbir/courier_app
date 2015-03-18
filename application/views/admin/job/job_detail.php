<?php
	$id	=		(isset($row['id'])?$row['id']:"");
	$client_name_email	 =	((isset($row['first_name']) && isset($row['last_name']))?$row['first_name']." ".$row['last_name']:"&nbsp;");
	$client_name_email	.=	(isset($row['email'])?"( ".$row['email']." )":"");
	$title				 =	(isset($row['title'])?$row['title']:"&nbsp;");
	$expected_date		 =	(isset($row['post_date'])?date('d-m-Y',strtotime($row['post_date'])):"&nbsp;");
	$job_status			=	(isset($row['status'])?$row['status']:"&nbsp;");
	$agent_id			  =	(isset($row['agent_id'])?$row['agent_id']:0);
	$status_class="";
	switch($job_status)
	{
		case	'Waiting':
							$status_class="label-warning";
							break;
		case	'Awarded':
		case	'Collected':
		case	'Completed':
							$status_class="label-success";
							break;
		case	'INACTIVE':
							$status_class="label-inverse";
							break;
		case	'EXPIRED':
							$status_class="label-important";
							break;
		default:
							break;
	}
	
	$pickup_address =(isset($row['pickup_address_line1']))?$row['pickup_address_line1']:"";
	$pickup_address.=", ".(isset($row['pickup_address_line2']))?$row['pickup_address_line2']:"";
	$pickup_address.=", ".(isset($row['pickup_address_line3']))?$row['pickup_address_line3']:"";
	$pickup_address.=", ".(isset($row['pickup_address_line4']))?$row['pickup_address_line4']:"";
					
	$destination_address=(isset($row['destination_address_line1']))?$row['destination_address_line1']:"";
	$destination_address.=", ".(isset($row['destination_address_line2']))?$row['destination_address_line2']:"";
	$destination_address.=", ".(isset($row['destination_address_line3']))?$row['destination_address_line3']:"";
	$destination_address.=", ".(isset($row['destination_address_line4']))?$row['destination_address_line4']:"";
	$client_id=(isset($row['client'])?$row['client']:'0');
				
	if(!empty($assigned_agent))
	{
		
		$assigned_agent	=	$assigned_agent[0];
		$agent_name		=	(!empty($assigned_agent['first_name'])?$assigned_agent['first_name']:"&nbsp;");
		$agent_surname	 =	(!empty($assigned_agent['last_name'])?$assigned_agent['last_name']:"");
		$agent_name	   .=	$agent_surname;
		$agent_email	   =	(!empty($assigned_agent['email'])?$assigned_agent['email']:"");
		$agent_company	 =	(!empty($assigned_agent['company_name'])?$assigned_agent['company_name']:"");

		$agent_address 	 =	(isset($assigned_agent['address_line1'])?$assigned_agent['address_line1']:"");
		$agent_address 	.=	", ".(isset($assigned_agent['address_line2'])?$assigned_agent['address_line2']:"");
		$agent_address	.=	", ".(isset($assigned_agent['address_line3'])?$assigned_agent['address_line3']:"");
		$agent_address	.=	", ".(isset($assigned_agent['address_line4'])?$assigned_agent['address_line4']:"");
	}

?>
            <div class="dr"><span></span></div>            
            <div class="row-fluid">
                <div class="span11">
                <div class="span2">
                &nbsp;
                </div>
                <div class="span8" style="margin:0 auto">                    
                  <div class="block-fluid ucard clearfix">
                        
                            <div class="left">
                              
                          <ul class="control">                
                                    <li><span class="icon-pencil"></span> <a href="<?php echo site_url('admin/jobs/save/'.$id); ?>">Edit</a></li>
                                    <li><span class="icon-list <?php echo $status_class; ?>"></span> <?php echo $job_status; ?></li>
                                </ul>                               
                            </div>
                            <div class="info">                                                                
                                <ul class="rows">
                                    <li class="heading">Job info</li>
                                    <li>
                                        <div class="title">Title:</div>
                                        <div class="text"><?php echo $title; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Expected Date:</div>
                                        <div class="text"><?php echo $expected_date; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Pick Up Address:</div>
                                        <div class="text"><?php echo $pickup_address; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Destination Address:</div>
                                        <div class="text"><?php echo $destination_address; ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Status:</div>
                                        <div class="text"><span class="<?php echo $status_class; ?>"><?php echo $job_status; ?></span></div>
                                    </li>
                                    <li>
                                        <div class="title">Client:</div>
                                        <div class="text"><a href="<?php echo site_url('admin/clients/profile/'.$client_id); ?>" target="_blank"><?php echo $client_name_email; ?></a></div>
                                    </li>                                     
                                </ul>                                                      
                            </div>
                           <?php
						   					
								if(!empty($assigned_agent) && (strcasecmp($job_status,"Waiting")!=0))
								{
									
						   ?>
                            <div class="info">                                                                
                                <ul class="rows">
                                    <li class="heading">Assigned Agent</li>
                                    <li>
                                        <div class="title">Name:</div>
                                        <div class="text"><a target="_blank" href="<?php echo site_url('admin/agents/profile/'.$agent_id); ?>" title="detail"><?php echo substr($agent_name,0,20); ?></a></div>
                                    </li>
                                    <li>
                                        <div class="title">Surname:</div>
                                        <div class="text"><?php echo substr($agent_surname,0,20); ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Email:</div>
                                        <div class="text"><?php echo substr($agent_email,0,20); ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Company Name:</div>
                                        <div class="text"><?php echo substr($agent_company,0,50); ?></div>
                                    </li>                                    
                                    
                                    <li>
                                        <div class="title">Address:</div>
                                        <div class="text"><?php echo substr($agent_address,0,100); ?></div>
                                    </li>                                     

                                </ul>                                                      
                            </div> 
                           <?php
								}
								else if($job_status == "Waiting")
								{
							?>    
                                                            <ul class="rows">
                                	<li class="info">
                                    	&nbsp;
                                    </li>
                                </ul>                                                     
                                <ul class="rows">
                            		<li class="heading info">Agents (Invited / Applied) of <?php echo $title; ?></li>
                                </ul>
                                <ul class="rows info">
                            		
                                    	<div  id="status_filter" class="info">
                                        </div>
                                    
                                </ul>
                                <div class="info table-sorting clearfix">     
                                     <table cellpadding="0" cellspacing="0" width="100%" id="invitations_table" class="table agent_list_datatable" >
                                    	<thead>
                                           <tr>
                                            <th width="20%">Name</th>
                                            <th width="40%">Email</th>
                                            <th width="30%">Contact#</th>
                                            <th width="10%">Agent Status</th>
                                            <th width="10%">Job Status</th>
                                        	</tr>
                                        </thead>
                                        <tbody>
										<?php
								if(isset($listData))
									foreach($listData as $agent)
									{
							?>
                                   	<tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
  				                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                     </tr>
                         <?php
									}

										 ?>
                                        </tbody>
                                    </table>
                                 </div>                                        
               
                            <?php
								}
							?>
                    </div>
                </div>                                
                </div>
                
            </div>
            <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                </div>
                <div class="span4" style="text-align:center;">
                <div class="span12"><a class="btn btn-block" href="<?php echo site_url('admin/jobs/save/'.$id); ?>" >Edit</a></div>
                            
                 </div>
                <div class="span4">
                </div>
                 </div>
            </div>
            <div class="dr"><span></span></div>

<script>
jQuery(window).load(function(){
				source='<?php echo site_url('admin/jobs/list_job_invitations?job='.$id); ?>';
				var oTable=jQuery("#invitations_table").dataTable({
									"bServerSide": true,
									"sServerMethod": "POST",			
									"sPaginationType": "full_numbers",
									"iDisplayLength": '<?php  echo LIST_PAGE_RECORDS; ?>',
									"sAjaxSource": source
				});
			if(typeof oTable != "undefined")
			{
				oTable.columnFilter({
				sPlaceHolder: "head:after",
				aoColumns: [ 
							 null,
							 null,
							 null,
							 { sSelector: "#status_filter", type: "select", values: ['Active','Pending','Blocked','INACTIVE'] },
							 null
						  ]
				});
			}
});
</script>