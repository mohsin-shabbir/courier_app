<script type="text/javascript" language="JavaScript" >
    $(document).ready(function() {
        var track_click = 0; //track user click on "load more" button, righ now it is 0 click
        var total_pages = <?php echo $total_pages; ?>;
        $('#results').load('<?php echo base_url() ?>client/fetch_notifications/'+track_click, {'page':track_click}, function() {track_click++;}); //initial data to load
        $(".load_more").click(function (e) { //user clicks on button
            $(this).hide(); //hide load more button on click
            $('.animation_image').show(); //show loading image
            //alert(total_pages+'--'+track_click);
            if(track_click <= total_pages) //make sure user clicks are still less than total pages
            {
                //post page number and load returned data into result element
                $.post('<?php echo base_url() ?>client/fetch_notifications/'+track_click,{'page': track_click}, function(data) {
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
                    $(".load_more").attr("disabled", "disabled");
                }
            }
            else {
                $('.animation_image').hide();
                $(".load_more").show();
                $(".load_more").attr("disabled", "disabled");
            }
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

        <?php echo $this->load->view('front/client/filters_menu'); ?>

    	<div class="row">
        
            <div class="col-sm-3">
                <?php $this->load->view("templates/left_dashboard_client"); ?>
            </div>
             <div class="col-sm-8 col-sm-push-1">
            	<div class="dashboard-content">
                	<div class="db-search">
                    	<input type="text" name="search" value="search by title, service provider, date, offer" class="db-search-field" onfocus="(this.value == 'search by title, service provider, date, offer') && (this.value = '')"  onblur="(this.value == '') && (this.value = 'search by title, service provider, date, offer')">
                    </div>
                    <div class="db-title">
                    	<h2>Notifications</h2> 
                                        
                    </div>
                    <div class="clear"></div>      
                        <div class="notifications">
                        <?php
                        /*
                        foreach( $notifications as $key=>$val) {
                         //echo '<pre>';
                         //print_r($val);
                         //echo '</pre>';
                         ?>
                         <div class="alert notification-alert">
                             <a href="#" class="close" data-dismiss="alert">&times;</a>

                             <a href="<?php echo $val["link"];?>">
                             <div class="media">
                                 <div class="media-left"><span class="alert-icon"></span></div>
                                 <div class="media-body">
                                     <em class="time-elapsed visible-xs">10 mins ago</em>
                                     <p><?php echo $val["title"];?><em class="time-elapsed hidden-xs">
                                             <?php
                                             $start_date = new DateTime( date('Y-m-d H:m:s',time()) );
                                             $since_start = $start_date->diff(new DateTime($val["created_date"]));
                                             if( $since_start->d > 0 ){
                                                 echo $since_start->d.' days ago';echo '<br>';
                                             } else if( $since_start->h > 0) {
                                                 echo $since_start->h.' hours ago';
                                             } else if( $since_start->i > 0) {
                                                 echo $since_start->i.' minutes ago';
                                             } else if( $since_start->s > 0) {
                                                 echo $since_start->s.' seconds ago';
                                             }
                                             ?>
                                         </em></p>
                                     <h4><?php echo $val["description"];?> <span
                                             class="offer-price"></span></h4>

                                     <p>by: <?php echo $val["created_by_name"];?></p>
                                 </div>
                                 <!-- media body -->
                             </div>
                             </a>
                             <!-- media -->
                         </div> <!-- notification alert -->
                        <?php
                        }
                        */
                        ?>
                        <?php /*?>
                        <div class="alert notification-alert">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <div class="media">
                                <div class="media-left"><span class="alert-icon"></span></div>
                                <div class="media-body">
                                    <em class="time-elapsed visible-xs">10 mins ago</em>
                                    <p>You have received a proposal for <em class="time-elapsed hidden-xs">10 mins ago</em></p>
                                    <h4>Please send quotes (03kg parcel) <span class="offer-price">Offer: $12.0</span></h4>
                                    <p>by: alex Murphy</p>
                                </div> <!-- media body -->
                            </div> <!-- media -->
                        </div> <!-- notification alert -->

                        <?php */?>

                            <div id="results"></div>
                            <div align="center">
                                <button class="load_more" id="load_more_button">load More</button>
                                <div class="animation_image" style="display:none;"><img src="<?php echo base_url() ?>application/assets/front/images/ajax-loader.gif"> Loading...</div>
                            </div>
                        </div>
                </div> <!-- dashboard content -->
            </div> <!-- column -->
        </div> <!-- row -->

 
        <div class="clear"></div>
    </div> <!-- simple panel -->
</section>  

</div> <!-- container -->
    
