
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
                    <p class="activity-desc">Total post jobs</p>
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
                	
                    <div class="db-title">
                    	<h2>Offer summary</h2> 
                                        
                    </div>
                    <div class="clear"></div>      
                     <div class="offer-summary">
                        
                        
                       
                      
                      
                      <div class="table-responsive vat-table">
                      <table class="table">
                       		<thead>
                            	<tr>
                                	<th>Job ID</th>
                                    <th>Job title</th>
                                    <th>Delivery</th>
                                    <th>From</th>
                                    <th>To</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr>
                                	<td>354672</td>
                                    <td>3Kg Parcel</td>
                                    <td>01 Day</td>
                                    <td>Bradford</td>
                                    <td>Cambridge</td>
                                </tr>
                            </tbody>
                      </table>
                    </div>
                    
                    <div class="tbl-summary">
                    	<div class="row">
                            <div class="col-sm-3 th-col">Service Provider:</div>
                            <div class="col-sm-8 td-data">Alex Murphy</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 th-col">Job Offer:</div>
                            <div class="col-sm-8 td-data"><span class="text-red">$12.00</span></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 th-col">Parcel Size:</div>
                            <div class="col-sm-8 td-data">3Kg</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 th-col">Delivery within:</div>
                            <div class="col-sm-8 td-data">01 day</div>
                        </div>
                         <div class="row">
                            <div class="col-sm-3 th-col">From:</div>
                            <div class="col-sm-8 td-data">H c33 Sector 44, Bradford, UK, London.</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 th-col">To:</div>
                            <div class="col-sm-8 td-data">H b78 Sector 786, Cambridge, UK, London.</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 th-col">Delivery Date:</div>
                            <div class="col-sm-8 td-data last-child">16/01/2015</div>
                        </div>
                    </div> <!-- table summary -->
                    
                    
                     <!--<div class="table-responsive tbl-summary">
                     	<table class="table">
                        	<tr>
                            	<th scope="row" class="th-col">Service Provider:</th>
                                <td class="td-data">Alex Murphy</td>
                            </tr>
                            <tr>
                            	<th scope="row" class="th-col">Job Offer:</th>
                                <td class="td-data text-red">$12.00</td>
                            </tr>
                            <tr>
                            	<th scope="row" class="th-col">Parcel Size:</th>
                                <td class="td-data">3Kg</td>
                            </tr>
                            <tr>
                            	<th scope="row" class="th-col">Delivery within:</th>
                                <td class="td-data">01 day</td>
                            </tr>
                            <tr>
                            	<th scope="row" class="th-col">From:</th>
                                <td class="td-data">H c33 Sector 44, Bradford, UK, London.</td>
                            </tr>
                            <tr>
                            	<th scope="row" class="th-col">To:</th>
                                <td class="td-data">H b78 Sector 786, Cambridge, UK, London.</td>
                            </tr>
                            <tr>
                            	<th scope="row" class="th-col">Delivery Date:</th>
                                <td class="td-data">16/01/2015</td>
                            </tr>
                        </table>
                     </div>-->
                     
                     	<!--<div class="checkbox">
                          <label><input type="checkbox" value="">Are you sure you want to pay for this using PayPal?</label>
                        </div>-->
                        <!--<p class="pay-with-paypal"><a href="" class="paypal-btn"></a></p>-->
                    
                    </div> <!-- VAT info form -->
                    
                </div> <!-- dashboard content -->
            </div> <!-- column -->
        </div> <!-- row -->

 
        <div class="clear"></div>
    </div> <!-- simple panel -->
</section>  

</div> <!-- container -->
    
