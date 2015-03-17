<?php
	$id	   		   =	(isset($data['id'])?$data['id']:'-1'); 
	$salutation	   =	(isset($data['salutation'])?$data['salutation']:''); 
	$first_name	   =	(isset($data['first_name'])?$data['first_name']:''); 
	$last_name		=	(isset($data['last_name'])?$data['last_name']:''); 
	$company_name     =	(isset($data['company_name'])?$data['company_name']:''); 
	$post_code		=	(isset($data['post_code'])?$data['post_code']:''); 
	$address_line1    =	(isset($data['address_line1'])?$data['address_line1']:''); 
	$address_line2    =	(isset($data['address_line2'])?" , ".$data['address_line2']:''); 
	$address_line3    =	(isset($data['address_line3'])?" , ".$data['address_line3']:''); 
	$address_line4    =	(isset($data['address_line4'])?" , ".$data['address_line4']:''); 
	$latitude         =	(isset($data['latitude'])?$data['latitude']:''); 
	$longitude		=	(isset($data['longitude'])?$data['longitude']:''); 
	//$country_id	   =	(isset($data['country_id'])?$data['country_id']:''); 
	$telephone		=	(isset($data['telephone'])?$data['telephone']:''); 
	$mobile           =	(isset($data['mobile'])?$data['mobile']:''); 
	$email            =	(isset($data['email'])?$data['email']:''); 
	$created_date     =	(isset($data['created_date'])?$data['created_date']:"");  
    $profile_image	=    (isset($data['profile_image'])?$data['profile_image']:"");
	$preferred_cities =	(isset($data['preferred_cities'])? $data['preferred_cities']:""); 
	$experience_year  =	(isset($data['experience_year'])? $data['experience_year']:0); 
	$experience_month =	(isset($data['experience_month'])? $data['experience_month']:0); 
	$status		   =	(isset($data['status'])? $data['status']:""); 
	
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
                                <h4></h4>
                                <div class="image">
                                
                                    <a href="#">
                                        <img src="<?php if(!empty($profile_image)) 
														{
															if(file_exists(CLIENT_IMAGE_PATH.$profile_image))
																 echo base_url(CLIENT_IMAGE_PATH)."/".$profile_image; 
															else  
																echo base_url('upload')."/image_not_found.png"; 
														}
														else  
															echo base_url('upload')."/placeholder.jpg"; ?>" width="100" height="100" />
</a>                            
                                </div>
                                <ul class="control">                
                                    <li><span class="icon-pencil"></span> <a href="<?php echo site_url('admin/clients/save/'.$id); ?>">Edit</a></li>
                                    <li><span class="icon-user"></span> <?php echo $status; ?></li>
                                    <?php /*?><li><span class="icon-info-sign"></span> <a href="users.html">Information</a></li><?php */?>
                                    
                                </ul>                               
                            </div>
                            <div class="info">                                                                
                                <ul class="rows">
                                    <li class="heading">Client&nbsp;&nbsp;info</li>
                                    <li>
                                        <div class="title">Name:</div>
                                        <div class="text"><?php echo $salutation." ".substr($first_name." ".$last_name,0,20); ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Surname:</div>
                                        <div class="text"><?php echo substr($last_name,0,20); ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Email:</div>
                                        <div class="text"><?php echo substr($email,0,20); ?></div>
                                    </li>
                                    <li>
                                        <div class="title">Contact No:</div>
                                        <div class="text"><?php if(!empty($telephone)) echo substr($telephone,0,30); else if(!empty($mobile)) echo substr($mobile,0,30); ?></div>
                                    </li>
                                                                        
                                    
                                                                         
                                    <li>
                                        <div class="title">Address:</div>
                                        <div class="text"><?php echo substr($address_line1.$address_line2.$address_line3.$address_line4,0,100); ?></div>
                                    </li>                                     

                                </ul>                                                      
                            </div>       
                                <ul class="rows">
                                	<li class="info">
                                    	&nbsp;
                                    </li>
                                </ul>                                                     
                                <ul class="rows">
                            		<li class="heading info"><?php echo $salutation." ".substr($first_name." ".$last_name,0,20); ?>'s Jobs</li>
                                </ul>
                                <ul class="rows info">
                            		
                                    	<div  id="status_filter" class="info">
                                        </div>
                                    
                                </ul>
                                <div class="info table-sorting clearfix">     
                                     <table cellpadding="0" cellspacing="0" width="100%" id="client_job_table" class="table client_list_datatable" >
                                    	<thead>
                                           <tr>
                                            <th width="20%">Title</th>
                                            <th width="40%">Pickup Address</th>
                                            <th width="30%">Agent</th>
                                            <th width="10%">Status</th>
                                        	</tr>
                                        </thead>
                                        <tbody>
										<?php
								if(isset($listData))
									foreach($listData as $job)
									{
							?>
                                   <tr>
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
                    </div>
                </div>                                
                </div>
                
            </div>
            <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                </div>
                <div class="span4" style="text-align:center;">
                <div class="span12"><a class="btn btn-block" href="<?php echo site_url('admin/clients/save/'.$id); ?>" >Edit</a></div>
                            
                 </div>
                <div class="span4">
                </div>
                 </div>
            </div>
            <div class="dr"><span></span></div>
<script>
jQuery(window).load(function(){
				source='<?php echo site_url('admin/clients/client_jobs/'.$id); ?>';
				var oTable=jQuery("#client_job_table").dataTable({
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
							{ sSelector: "#status_filter", type: "select", values: ['Waiting','Awarded','Collected','Completed','INACTIVE','EXPIRED'] }
						]
				});
			}
});
</script>