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
    <?php if($this->session->flashdata('info_message')){?>
        	
        <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-ban-circle"></i><strong>Hi! </strong>&nbsp;&nbsp; <?php echo $this->session->flashdata('info_message'); ?>
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
                    
                    <div class="widgetButtons">                        
                        
                        <div class="bb"><a href="<?php echo site_url('admin/clients/save'); ?>" class="tipb" title="Add new Client"><span class="ibw-plus"></span></a></div>
                        <div class="bb"><a href="<?php echo site_url('admin/agents/save'); ?>" class="tipb" title="Add new Agent"><span class="ibw-plus"></span></a></div>
                        <div class="bb"><a href="<?php echo site_url('admin/jobs/save'); ?>" class="tipb" title="Add new Job"><span class="ibw-plus"></span></a></div>
                       
                    </div>
                    
                </div>
            </div>
            
            <div class="row-fluid">

                <div class="span4">                    

                    <div class="wBlock blue clearfix">
                        <div class="dSpace">
                            <h3>Total Clients</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>
                            <span class="number"><?php echo (!empty($total_clients)?$total_clients:"0"); ?></span>
                        </div>
                        <div class="rSpace">                                                                           
       <span> <a href=""><b><?php echo (!empty($active_clients)?$active_clients:"0"); ?>&nbsp;&nbsp;</b><b class="" >ACTIVE</b></a></span>	   
       <span> <a href=""><b><?php echo (!empty($inactive_clients)?$inactive_clients:"0"); ?>&nbsp;&nbsp;</b><b class="" >INACTIVE</b></a></span>
       <span> <a href=""><b><?php echo (!empty($pending_clients)?$pending_clients:"0"); ?>&nbsp;&nbsp;</b><b class="" >PENDING</b></a></span>
       <span> <a href=""><b><?php echo (!empty($blocked_clients)?$blocked_clients:"0"); ?>&nbsp;&nbsp;</b><b class="" >BLOCKED</b></a></span>
       <span> <a href=""><b>&nbsp;&nbsp;</b><b class="" >&nbsp;</b></a></span>
   	   <span> <a href=""><b>&nbsp;&nbsp;</b><b class="" >&nbsp;</b></a></span>
 	</div>
                    </div>                      
                    
                </div>                
                
                <div class="span4">                    

                    <div class="wBlock blue clearfix">
                        <div class="dSpace">
                            <h3>Total Agents</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>
                            <span class="number"><?php echo (!empty($total_agents)?$total_agents:"0"); ?></span>
                        </div>
                        <div class="rSpace">                                                                           
       <span> <a href=""><b><?php echo (!empty($active_agents)?$active_agents:"0"); ?>&nbsp;&nbsp;</b><b class="" >ACTIVE</b></a></span>	   
       <span> <a href=""><b><?php echo (!empty($inactive_agents)?$inactive_agents:"0"); ?>&nbsp;&nbsp;</b><b class="" >INACTIVE</b></a></span>
       <span> <a href=""><b><?php echo (!empty($pending_agents)?$pending_agents:"0"); ?>&nbsp;&nbsp;</b><b class="" >PENDING</b></a></span>
   	   <span> <a href=""><b><?php echo (!empty($blocked_agents)?$blocked_agents:"0"); ?>&nbsp;&nbsp;</b><b class="" >BLOCKED</b></a></span>
   	   <span> <a href=""><b>&nbsp;&nbsp;</b><b class="" >&nbsp;</b></a></span>
   	   <span> <a href=""><b>&nbsp;&nbsp;</b><b class="" >&nbsp;</b></a></span>
   						</div>
                    </div>                      
                    
                </div>

                <div class="span4">                    

                    <div class="wBlock blue clearfix">
                        <div class="dSpace">
                            <h3>Total Jobs</h3>
                            <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>
                            <span class="number"><?php echo (!empty($total_jobs)?$total_jobs:"0"); ?></span>
                        </div>
                        <div class="rSpace">                                                                           
       <span> <a href=""><b><?php echo (!empty($waiting_jobs)?$waiting_jobs:"0"); ?>&nbsp;&nbsp;</b><b class="" >Waiting</b></a></span>	   
       <span> <a href=""><b><?php echo (!empty($awarded_jobs)?$awarded_jobs:"0"); ?>&nbsp;&nbsp;</b><b class="" >Awarded</b></a></span>
       <span> <a href=""><b><?php echo (!empty($collected_jobs)?$collected_jobs:"0"); ?>&nbsp;&nbsp;</b><b class="" >Collected</b></a></span>
   	   <span> <a href=""><b><?php echo (!empty($completed_jobs)?$completed_jobs:"0"); ?>&nbsp;&nbsp;</b><b class="" >Completed</b></a></span>
   	   <span> <a href=""><b><?php echo (!empty($inactive_jobs)?$inactive_jobs:"0"); ?>&nbsp;&nbsp;</b><b class="" >INACTIVE</b></a></span>
   	   <span> <a href=""><b><?php echo (!empty($expired_jobs)?$expired_jobs:"0"); ?>&nbsp;&nbsp;</b><b class="" >EXPIRED</b></a></span>
                        </div>
                    </div>                      
                    
                </div>                
            </div>            
            
            <div class="dr"><span></span></div> 
            
            <div class="row-fluid">
                
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-users"></div>
                        <h1>Clients</h1>
                        <ul class="buttons">        
                            <li>
                                <a href="<?php echo site_url('admin/clients/save'); ?>" class="isw-documents" title="add client"></a>
                            </li>
                            <li>
                                <a href="#" class="isw-settings" title="list"></a>
                                <ul class="dd-list">
                                    <li><a href="<?php echo site_url('admin/clients'); ?>"><span class="isw-list"></span> Show all</a></li>
                                    
                                </ul>
                            </li>
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block users scrollBox">
                        
                        <div class="scroll" style="height: 270px;">
                            
                            <?php 
								if(!empty($clients))
									foreach($clients as $client)
									{
										
							?>
                            <div class="item clearfix">
             <div class="image"><a href="#"><img src="<?php
			 if(!empty($client['profile_thumb']))
			 {
				  if(file_exists(CLIENT_THUMB_PATH.$client['profile_thumb']))
					echo base_url('upload/clients/thumbs/'.$client['profile_thumb']);
				  else
					echo base_url('upload/clients/thumbs/image_not_found.png');
			 }
			 else
			  echo base_url('upload/clients/thumbs/placeholder.jpg');
             ?>" width="32"/></a></div>
                                <div class="info">
                                    <a href="<?php echo site_url('admin/clients/profile/'.$client['id']); ?>" class="name"><?php echo substr($client['first_name']." ".$client['last_name'],0,15);if(strlen($client['first_name']." ".$client['last_name'])>15)echo '...'; ?></a>                                    
                                    <span><?php echo $client['status']; ?></span>
                                </div>
                            </div>                            
                            <?php
									}
							?>
                        </div>
                        
                    </div>
                </div>
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-users"></div>
                        <h1>Agents</h1>
                        <ul class="buttons">        
                            <li>
                                <a href="<?php echo site_url('admin/agents/save'); ?>" class="isw-documents" title="add agent"></a>
                            </li>
                            <li>
                                <a href="#" class="isw-settings" title="list"></a>
                                <ul class="dd-list">
                                    <li><a href="<?php echo site_url('admin/agents'); ?>"><span class="isw-list"></span> Show all</a></li>
                                  
                                </ul>
                            </li>
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block users scrollBox">
                        <div class="scroll" style="height: 270px;">
                        	<div class="scroll" style="height: 270px;">
                            <?php 
								if(!empty($agents))
									foreach($agents as $agent)
									{
							?>
                            <div class="item clearfix">
             <div class="image"><a href="#"><img src="<?php
			 if(!empty($agent['profile_thumb']))
			  echo (file_exists(AGENT_THUMB_PATH.$agent['profile_thumb'])?base_url('upload/agents/thumbs/'.$agent['profile_thumb']):base_url('upload/agents/thumbs/image_not_found.png'));
			 else
			  echo base_url('upload/agents/thumbs/placeholder.jpg');
			 	 
			 ?>" width="32"/></a></div>
                                <div class="info">
                                    <a href="<?php echo site_url('admin/agents/profile/'.$agent['id']); ?>" class="name"><?php echo substr($agent['first_name']." ".$agent['last_name'],0,15);if(strlen($agent['first_name']." ".$agent['last_name'])>15)echo '...'; ?></a>                                    
                                    <span><?php echo $agent['status']; ?></span>
                                </div>
                            </div>                            
                            <?php
									}
							?>
                        </div>
                        </div>
                        
                    </div>
                </div>
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Jobs</h1>
                        <ul class="buttons">        
                            <li>
                                <a href="<?php echo site_url('admin/jobs/save'); ?>" title="add job" class="isw-documents"  ></a>
                            </li>
                            <li>
                                <a href="#" title="list" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="<?php echo site_url('admin/jobs'); ?>"><span class="isw-list"></span> Show all</a></li>
                                   
                                </ul>
                            </li>
                            <li class="toggle"><a href="#"></a></li>
                        </ul> 
                    </div>
                    <div class="block users scrollBox">
                        
                        <div class="scroll" style="height: 270px;">
                                                    <?php 
								if(!empty($jobs))
									foreach($jobs as $job)
									{
							?>
                            <div class="item clearfix">
             <div class="image"><a href="#"><img src="<?php
			 if(!empty($job['profile_thumb']))
			  echo (file_exists(AGENT_THUMB_PATH.$job['profile_thumb'])?base_url('upload/jobs/thumbs/'.$job['profile_thumb']):base_url('upload/agents/thumbs/image_not_found.png'));
			 else
			  echo base_url('upload/placeholder2.png');
			 	 
			 ?>" width="32"/></a></div>
                                <div class="info">
                                    <a href="<?php echo site_url('admin/jobs/detail/'.$job['id']); ?>" class="name"><?php echo substr($job['description'],0,15);if(strlen($job['description'])>15)echo '...'; ?></a>                                    
                                    <span><?php echo $job['status']; ?></span>
                                </div>
                            </div>                            
                            <?php
									}
							?>

                            
                        </div>
                        
                    </div>
                </div>                
                
                
            </div>

            <div class="dr"><span></span></div>            
        </div>