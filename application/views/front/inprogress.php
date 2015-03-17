
<div class="container container-top-padding">
<div class="bredcrumb">
	<ul>
    	<li><a href="#">Home</a></li>
        <li><a href="#">Login</a></li>
        <li>Dashboard</li>
    </ul>
    <div class="clear"></div>
</div>   <!-- breadcrumb -->
<section id="dashboard">
	 
	<div class="simple-panel2 padding-bottom">
    	  
    	<div class="row">
        	<div class="col-sm-3">
            	<div class="usr-avatar">
                	<div class="usr-img"><img src="<?php echo base_url() ?>application/assets/front/images/client-img-rounded.png" alt=""></div>
                    <div class="welcome">
                    	<h3>Welcome <span>Emily Madison</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="col-sm-3 activity-summary">
                	<a href="#" class="link-wrap">
                    <h4 class="total-activity">350</h4>
                    <p class="activity-desc">Total posted jobs</p>
                    </a>
                </div>
                <div class="col-sm-3 activity-summary">
                	<a href="#" class="link-wrap">
                    <h4 class="total-activity">320</h4>
                    <p class="activity-desc">Completed jobs</p>
                    </a>
                </div>
                <div class="col-sm-3 activity-summary">
                	<a href="#" class="link-wrap">
                    <h4 class="total-activity">15</h4>
                    <p class="activity-desc">Inprogress jobs</p>
                    </a>
                </div>
                <div class="col-sm-3 activity-summary">
                	<a href="#" class="link-wrap">
                    <h4 class="total-activity">05</h4>
                    <p class="activity-desc">Waiting jobs</p>
                    </a>
                </div>
            </div>
        </div>
    	<div class="row">
        
            <div class="col-sm-3">
                <?php $this->load->view("templates/left_dashboard"); ?>
            </div>
             <div class="col-sm-8 col-sm-push-1">
            	<div class="dashboard-content">
                	<div class="db-search">
                    	<input type="text" name="search" value="search by title, service provider, date, offer" class="db-search-field" onfocus="(this.value == 'search by title, service provider, date, offer') && (this.value = '')"  onblur="(this.value == '') && (this.value = 'search by title, service provider, date, offer')">
                    </div>
                    <div class="db-title">
                    	<h2>Inprogress Jobs (15)</h2>
                        <div class="quick-summary">
                        	<p><b>Waiting:</b> Not yet awarded</p>
                            <p><b>Collected:</b> Collected from client</p>
                            <p><b>Completed:</b> When the job is done</p>
                        </div>
                        <div class="clear"></div>
                        
                        <div class="sp-offers">
                        
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="<?php echo base_url() ?>application/assets/front/images/sp-pic.png" alt="...">
                              <span class="bid-agent-name">John Doe</span>
                            </a>
                          </div>
                          
                          <div class="media-body">
                            <div class="bider-info sp-info">
                            	<h3>Please send me quotes</h3>
                                <p class="c-from">Collection from: <b>Bradfrod</b> Delivery-to: <b>Cambridge</b></p>
                                <p class="completion">Delivery Completion: After 01 day</p>
                                <p class="c-status hidden-xs">Current status: <span class="status">Waiting</span></p>
                            </div> <!-- bider info -->
                            <div class="clear"></div>
                            <div class="visible-xs">
                            	<p class="c-status left">Current status: <span class="status">Waiting</span></p>
                            	<div class="sp-offer right">
                            		<a href="<?php echo base_url() ?>home/offer_detail" class="offer-price"><span>$20</span></a>
                                offer
                            </div>	
                            </div>
                            
                            <div class="clear"></div>
                             
                          </div> <!-- media body -->
                          <div class="media-right hidden-xs">
                          	<div class="sp-offer">
                            	<a href="<?php echo base_url() ?>home/offer_detail" class="offer-price"><span>$20</span></a>
                                offer
                            </div>
                          </div>
                        </div> <!-- media -->
                        
						<div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="<?php echo base_url() ?>application/assets/front/images/sp-pic.png" alt="...">
                              <span class="bid-agent-name">John Doe</span>
                            </a>
                          </div>
                          <div class="media-body">
                            <div class="bider-info sp-info">
                            	<h3>Please send me quotes</h3>
                                <p class="c-from">Collection from: <b>Bradfrod</b> Delivery-to: <b>Cambridge</b></p>
                                <p class="completion">Delivery Completion: After 01 day</p>
                                <p class="c-status hidden-xs">Current status: <span class="status">Waiting</span></p>
                            </div> <!-- bider info -->
                            <div class="clear"></div>
                            <div class="visible-xs">
                            	<p class="c-status left">Current status: <span class="status">Waiting</span></p>
                            	<div class="sp-offer right">
                            		<a href="#" class="offer-price"><span>$20</span></a>
                                offer
                            </div>	
                            </div>
                            
                            <div class="clear"></div>
                             
                          </div> <!-- media body -->
                          <div class="media-right hidden-xs">
                          	<div class="sp-offer">
                            	<a href="#" class="offer-price"><span>$20</span></a>
                                offer
                            </div>
                          </div>
                        </div> <!-- media -->
                        
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="<?php echo base_url() ?>application/assets/front/images/sp-pic.png" alt="...">
                              <span class="bid-agent-name">John Doe</span>
                            </a>
                          </div>
                          
                          <div class="media-body">
                            <div class="bider-info sp-info">
                            	<h3>Please send me quotes</h3>
                                <p class="c-from">Collection from: <b>Bradfrod</b> Delivery-to: <b>Cambridge</b></p>
                                <p class="completion">Delivery Completion: After 01 day</p>
                                <p class="c-status hidden-xs">Current status: <span class="status">Waiting</span></p>
                            </div> <!-- bider info -->
                            <div class="clear"></div>
                            <div class="visible-xs">
                            	<p class="c-status left">Current status: <span class="status">Waiting</span></p>
                            	<div class="sp-offer right">
                            		<a href="#" class="offer-price"><span>$20</span></a>
                                offer
                            </div>	
                            </div>
                            
                            <div class="clear"></div>
                             
                          </div> <!-- media body -->
                          <div class="media-right hidden-xs">
                          	<div class="sp-offer">
                            	<a href="#" class="offer-price"><span>$20</span></a>
                                offer
                            </div>
                          </div>
                        </div> <!-- media -->
                        
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="<?php echo base_url() ?>application/assets/front/images/sp-pic.png" alt="...">
                              <span class="bid-agent-name">John Doe</span>
                            </a>
                          </div>
                         
                          <div class="media-body">
                            <div class="bider-info sp-info">
                            	<h3>Please send me quotes</h3>
                                <p class="c-from">Collection from: <b>Bradfrod</b> Delivery-to: <b>Cambridge</b></p>
                                <p class="completion">Delivery Completion: After 01 day</p>
                                <p class="c-status hidden-xs">Current status: <span class="status">Waiting</span></p>
                            </div> <!-- bider info -->
                            <div class="clear"></div>
                            <div class="visible-xs">
                            	<p class="c-status left">Current status: <span class="status">Waiting</span></p>
                            	<div class="sp-offer right">
                            		<a href="#" class="offer-price"><span>$20</span></a>
                                offer
                            </div>	
                            </div>
                            
                            <div class="clear"></div>
                             
                          </div> <!-- media body -->
                          <div class="media-right hidden-xs">
                          	<div class="sp-offer">
                            	<a href="#" class="offer-price"><span>$20</span></a>
                                offer
                            </div>
                          </div>
                        </div> <!-- media -->
                      
                     
                        
                      </div> <!-- service provider offers (SP Offers) -->
                        
                    </div>
                </div> <!-- dashboard content -->
            </div> <!-- column -->
        </div> <!-- row -->

 
        <div class="clear"></div>
    </div> <!-- simple panel -->
</section>  

</div> <!-- container -->
    
