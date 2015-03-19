<script type="text/javascript" language="JavaScript" >
    var track_click = 0; //track user click on "load more" button, righ now it is 0 click
    var total_pages = <?php echo $total_pages; ?>;
    var job_type = '<?php echo $job_type; ?>';
    $(document).ready(function() {
        $('#results').load('<?php echo base_url() ?>agent/fetch_agent_jobs/'+track_click+'/'+job_type, {'page':track_click}, function() {track_click++;}); //initial data to load
        $(".load_more").click(function (e) { //user clicks on button
            $(this).hide(); //hide load more button on click
            $('.animation_image').show(); //show loading image
            //alert(total_pages+'--'+track_click);
            if(track_click <= total_pages) //make sure user clicks are still less than total pages
            {
                //post page number and load returned data into result element
                $.post('<?php echo base_url() ?>agent/fetch_agent_jobs/'+track_click+'/'+job_type,{'page': track_click,'search': $('#search').val()}, function(data) {
                    $(".load_more").show(); //bring back load more button
                    $("#results").append(data); //append data received from server
                    //$( data ).hide().appendTo('#results').show(1000);
                    //scroll page to button element
                    //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
                    //hide loading image
                    $('.animation_image').hide(); //hide loading image once data is received
                    track_click++; //user click increment on load button
                }).fail(function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError); //alert any HTTP error
                    $(".load_more").show(); //bring back load more button
                    $('.animation_image').hide(); //hide loading image once data is received
                });
                if(track_click >= total_pages-1)
                {
                    //reached end of the page yet? disable load button
                    //$(".load_more").attr("disabled", "disabled");
                }
            }
            else {
                $('.animation_image').hide();
                $(".load_more").show();
                //$(".load_more").attr("disabled", "disabled");
            }
        });
        $(document).on('blur','#search',function(){
            //alert( $(this).val() );
            track_click=0;
            $('#results').empty();
            $( ".load_more" ).trigger( "click" );
        });
    });
</script>
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
    	  
    	<?php echo $this->load->view('front/agent/filters_menu'); ?>

    	<div class="row">
        
            <div class="col-sm-3">
                <?php $this->load->view("templates/left_dashboard_agent"); ?>
            </div>
             <div class="col-sm-8 col-sm-push-1">
            	<div class="dashboard-content">
                	<div class="db-search">
                    	<input type="text" id="search" name="search" value="search by title, service provider, date, offer" class="db-search-field" onfocus="(this.value == 'search by title, service provider, date, offer') && (this.value = '')"  onblur="(this.value == '') && (this.value = 'search by title, service provider, date, offer')">
                    </div>
                    <div class="db-title">
                    	<h2>
                            <?php
                            if( $job_type== 'waiting' ) {
                                echo 'Waiting Jobs ('.$waiting_jobs.')';
                            }else if( $job_type== 'inprogress' ) {
                                echo 'Inprogress Jobs ('.$inprogress_jobs.')';
                            }else if( $job_type== 'completed' ) {
                                echo 'Completed Jobs ('.$completed_jobs.')';
                            }else if( $job_type== 'total' ) {
                                echo 'Total Jobs ('.$total_jobs.')';
                            }
                            ?>
                        </h2>
                        <div class="quick-summary">
                        	<p><b>Waiting:</b> Not yet awarded</p>
                            <p><b>Collected:</b> Collected from client</p>
                            <p><b>Completed:</b> When the job is done</p>
                        </div>
                        <div class="clear"></div>
                        
                        <div class="sp-offers">

                            <div id="results"></div>
                            <div align="center">
                                <button class="load_more" id="load_more_button">load More</button>
                                <div class="animation_image" style="display:none;"><img src="<?php echo base_url() ?>application/assets/front/images/ajax-loader.gif"> Loading...
                                </div>
                            </div>
                      </div> <!-- service provider offers (SP Offers) -->
                        
                    </div>
                </div> <!-- dashboard content -->
            </div> <!-- column -->
        </div> <!-- row -->

 
        <div class="clear"></div>
    </div> <!-- simple panel -->
</section>  

</div> <!-- container -->
    
