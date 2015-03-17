<div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, Admin
            </div>
        </div>
        
        
        
        <ul class="navigation">            
            <li class="active">
                <a href="<?php echo base_url(); ?>admin">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Agent</span>
                </a>
                <ul>
                    <li>
                    	 <a href="<?php echo site_url('admin/agents/save'); ?>">
                       
                            <span class="icon-th"></span><span class="text">Agents Registration</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="<?php echo site_url('admin/agents'); ?>">
                            <span class="icon-th-large"></span><span class="text">Agent Management</span>
                        </a>                  
                    </li>
                   <?php /*?> <li>
                        <a href="<?php echo site_url('admin/agents/deleted'); ?>">
                            <span class="icon-th-large"></span><span class="text">Inactive Agents</span>
                        </a>                  
                    </li>  <?php */?>                   
                </ul>                
            </li>    
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Client</span>
                </a>
                <ul>
                    <li>
                    	 <a href="<?php echo site_url('admin/clients/save'); ?>">
                       
                            <span class="icon-th"></span><span class="text">Client Registration</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="<?php echo site_url('admin/clients'); ?>">
                            <span class="icon-th-large"></span><span class="text">Client Management</span>
                        </a>                  
                    </li>
                   <?php /*?> <li>
                        <a href="<?php echo site_url('admin/clients/deleted'); ?>">
                            <span class="icon-th-large"></span><span class="text">Inactive Clients</span>
                        </a>                  
                    </li> <?php */?>                    
                </ul>                
            </li>    
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Job Posting</span>
                </a>
                <ul>
                    <li>
                    	 <a href="<?php echo base_url(); ?>admin/jobs/save">
                            <span class="icon-th"></span><span class="text">Post Jobs</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="<?php echo base_url(); ?>admin/jobs">
                            <span class="icon-th-large"></span><span class="text">Job Managment</span>
                        </a>                  
                    </li>                     
                   <?php /*?>  <li>
                        <a href="<?php echo site_url('admin/jobs/deleted'); ?>">
                            <span class="icon-th-large"></span><span class="text">Inactive Jobs</span>
                        </a>                  
                    </li><?php */?>
                                        
                </ul>                
            </li>  
            
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">CMS</span>
                </a>
                <ul>
                    <li>
                    	 <a href="<?php echo base_url(); ?>admin/pages/save">
                            <span class="icon-th"></span><span class="text">Add Page</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="<?php echo base_url(); ?>admin/pages/index">
                            <span class="icon-th-large"></span><span class="text">View Page</span>
                        </a>                  
                    </li>                     
                     
                                        
                </ul>                
            </li>
            
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">SEO</span>
                </a>
                <ul>
                    <li>
                    	 <a href="<?php echo base_url(); ?>admin/seo/save">
                            <span class="icon-th"></span><span class="text">Add SEO</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="<?php echo base_url(); ?>admin/seo/index">
                            <span class="icon-th-large"></span><span class="text">SEO Management</span>
                        </a>                  
                    </li>                     
                     
                                        
                </ul>                
            </li>
            
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Email</span>
                </a>
                <ul>
                    <li>
                    	 <a href="<?php echo base_url(); ?>admin/emails/save">
                            <span class="icon-th"></span><span class="text">Add Email</span>
                        </a>                  
                    </li>          
                    <li>
                        <a href="<?php echo base_url(); ?>admin/emails/index">
                            <span class="icon-th-large"></span><span class="text">Email Management</span>
                        </a>                  
                    </li>                     
                     
                                        
                </ul>                
            </li>    
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">Reports</span>
                </a>
                <ul>
                    <li>
                    	 <a href="<?php echo base_url(); ?>admin/reports/load_client_report">
                            <span class="icon-th"></span><span class="text">Client Report</span>
                        </a>                  
                    </li>          
                    <li>
                    	 <a href="<?php echo base_url(); ?>admin/reports/load_agent_report">
                            <span class="icon-th"></span><span class="text">Agent Report</span>
                        </a>                  
                    </li>
                   <?php /*?> <li>
                    	 <a href="<?php echo base_url(); ?>admin/reports/load_agent_report">
                            <span class="icon-th"></span><span class="text">Agent Jobs Report</span>
                        </a>                  
                    </li>
                    <li>
                    	 <a href="<?php echo base_url(); ?>admin/reports/load_agent_report">
                            <span class="icon-th"></span><span class="text">Job Invoice</span>
                        </a>                  
                    </li><?php */?>
                    <li>
                    	 <a href="<?php echo base_url(); ?>admin/reports/load_general_report">
                            <span class="icon-th"></span><span class="text">General Report</span>
                        </a>                  
                    </li>                     
                     
                                        
                </ul>                
            </li>
        </ul>
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        
        <div class="dr"><span></span></div>
        
        
        
        <div class="dr"><span></span></div>
        
        <div class="widget-fluid">
            
            
            
        </div>
        
    </div>