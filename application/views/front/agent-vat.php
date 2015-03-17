
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
                	<div class="usr-img"><img src="<?php echo base_url() ?>application/assets/front/images/agent.png" alt=""></div>
                    <div class="welcome">
                    	<h3>Welcome <span>John Doe</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="col-sm-3 activity-summary">
                	<a href="#" class="link-wrap">
                    <h4 class="total-activity">350</h4>
                    <p class="activity-desc">Completed jobs</p>
                    </a>
                </div>
                <div class="col-sm-3 activity-summary">
                	<a href="#" class="link-wrap">
                    <h4 class="total-activity">320</h4>
                    <p class="activity-desc">Inprogress jobs</p>
                    </a>
                </div>
                <div class="col-sm-3 activity-summary">
                	<a href="#" class="link-wrap">
                    <h4 class="total-activity">15</h4>
                    <p class="activity-desc">Waiting jobs</p>
                    </a>
                </div>
                <div class="col-sm-3 activity-summary">
                	<a href="#" class="link-wrap">
                    <h4 class="total-activity"><img src="<?php echo base_url() ?>application/assets/front/images/rating-stars.png" alt=""></h4>
                    <p class="activity-desc">Ranking</p>
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
                    	<h2>VAT Information</h2> 
                                        
                    </div>
                    <div class="clear"></div>      
                     <div class="vat-info-form vat-form">
                        
                        <form>
                        	<div class="form-group">
                            	<label class="control-label" for="company_registration">Company registration No.</label>
                                <input type="text" name="company_registration" value="" class="field">
                                <div class="clear"></div>
                            </div>
                            <div class="form-group">
                            	<label class="control-label">VAT registered?</label>
                                <div class="checkbox">
                                  <label><input type="radio" value="" name="vat_registered">Yes</label>
                                </div>
                                <div class="checkbox">
                                  <label><input type="radio" value="" name="vat_registered">No</label>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="form-group">
                            	<label class="control-label">VAT registration No.</label>
                                <input type="text" name="company_registration" value="" class="field">
                                <div class="clear"></div>
                            </div>
                            <div class="form-group">
                            	<label class="control-label">VAT registration Date:</label>
                                <select class="field">
                                	<option>Select Date</option>
                                </select>
                                <div class="clear"></div>
                            </div>
                            <div class="action-buttons">
                            	<input type="button" name="" id="" class="action-btn" value="Save">
                                <input type="button" name="" id="" class="action-btn" value="Update">
                            </div>
                        </form>
                       
                      </div> <!-- VAT info form -->
                      
                      <div class="table-responsive vat-table">
                      <table class="table">
                       		<thead>
                            	<tr>
                                	<th><span>Company</span> Registration No.</th>
                                    <th><span>VAT</span> Registered</th>
                                    <th><span>VAT</span> Registration No.</th>
                                    <th><span>VAT</span> Registration Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr>
                                	<td>UK 35467214</td>
                                    <td>Yes</td>
                                    <td>232443 12</td>
                                    <td>15/01/2015</td>
                                </tr>
                            </tbody>
                      </table>
                    </div>
                    
                </div> <!-- dashboard content -->
            </div> <!-- column -->
        </div> <!-- row -->

 
        <div class="clear"></div>
    </div> <!-- simple panel -->
</section>  

</div> <!-- container -->
    
