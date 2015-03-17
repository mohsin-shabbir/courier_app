<div class="container container-top-padding">
<script>
$(document).ready(function(){
	 $(".panel-body").hide();
    $(".lbl-adv-search").click(function()
	{
        $(".panel-body").toggle("100");
    });
});
</script>
<script type="text/javascript" language="JavaScript" >
    $(document).ready(function() {
        var track_click = 0; //track user click on "load more" button, righ now it is 0 click
        var total_pages = <?php echo $total_pages; ?>;
        $('#results').load('<?php echo base_url() ?>client/fetch_service_provider/'+track_click, {'page':track_click}, function() {track_click++;}); //initial data to load
        $(".load_more").click(function (e) { //user clicks on button
            $(this).hide(); //hide load more button on click
            $('.animation_image').show(); //show loading image
            //alert(total_pages+'--'+track_click);
            if(track_click <= total_pages) //make sure user clicks are still less than total pages
            {
                //post page number and load returned data into result element
                $.post('<?php echo base_url() ?>client/fetch_service_provider/'+track_click,{'page': track_click}, function(data) {
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
<div class="bredcrumb">
	<ul>
    	<li><a href="#">Home</a></li>
        <li>Find a job</li>
    </ul>
    <div class="clear"></div>
</div>   <!-- breadcrumb -->
<section id="search-results">
	<div class="search-form">
    	<div class="search-box">
        	<div class="search-lbl">Search</div>
            <input type="text" class="search-field" placeholder="job  title   date  city   country  postcode">
            <input type="submit" class="search-btn" value="" name="">
            <div class="clear"></div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                   
                    <span class="pull-right clickable panel-collapsed lbl-adv-search">Advance Search <i class="fa fa-plus-square"></i></span>
                </div>
                <div class="panel-body">
                 	<form class="form-inline" role="form">
                      <div class="form-group">
                        <label for="postcode">Your post code:</label>
                        <input type="text" class="form-control" id="postcode"> 
                      </div>
                      <div class="form-group">
                        <label for="distance">Distance:</label>
                        <select class="form-control" id="distance">
                        	<option>Nation wide</option>
                            <option>With in 10 miles</option>
                            <option>20 miles</option>
                            <option>50 miles</option>
                        </select>
                      </div>
                      <div class="clear"></div>
                      <div class="form-group">
                        <label for="price">Price:</label>
                        <select class="form-control" id="price">
                        	<option>Not sure</option>
                        	<option>Below 10&pound;</option>
                            <option>20&pound;</option>
                            <option>50&pound;</option>
                            <option>80&pound;</option>
                            <option>100&pound;</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="rating">Rating:</label>
                        <select class="form-control" id="rating">
                        	<option>5 Stars only</option>
                            <option>4 or more</option>
                            <option>any</option>
                        </select>
                      </div>
                      <!--<button type="submit" class="btn btn-default">Submit</button>-->
                    </form>
                </div>
            </div>
           <!-- <p class="lbl-adv-search"><a href="#" class="clickable">Advance search [<i class="glyphicon glyphicon-minus"></i>]</a></p>-->
        </div> <!-- search box -->    
        <div class="clear"></div>
    </div> <!-- search form -->
	<div class="simple-panel2 padding-bottom padding-top-20">
    	<div class="row">
        
        <div class="col-sm-3">
        	<div class="find-other-countries">
            	<div class="panel-title">
                	<h3>Find Service Providers <span>in other countries</span></h3>
                </div>
                <div class="panel-content">
                    <div class="form-group"><input type="checkbox"> <label>England</label></div>
                    <div class="form-group"><input type="checkbox"> <label>Scotland</label></div>
                    <div class="form-group"><input type="checkbox"> <label>Wales</label></div>
                    <div class="form-group"><input type="checkbox"> <label>Northern Ireland</label></div>
                </div>
            </div>
        </div>
         <div class="col-sm-9">
            	<h2>Results for 'service providers'</h2>
                <!--<ul class="pagination">
                  <li class="active"><a href="#"><span>1</span></a></li>
                  <li><a href="#"><span>2</span></a></li>
                  <li><a href="#"><span>3</span></a></li>
                  <li><a href="#"><span>4</span></a></li>
                  <li><a href="#"><span>5</span></a></li>
                </ul>-->

                <div class="clear"></div>
                <div class="job-results">
                    <?php /* ?>
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="<?php echo base_url() ?>application/assets/front/images/client-img.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                      	<p class="item-id">Job ID: <span>345672</span></p>
                      	<div class="job-title">
                        	<h2>Please send me quotes</h2>
                        	<h3 class="client-name">Emily Madison</h3>
                        </div>    
                        <p class="job-desc">I have to send parcel to my friend from Bradford to Cambridge.</p>
                        <div class="job-detail">
                            <p>Package size: <strong>3kg</strong></p>
                            <p>Colection from: <strong>Bradfrod</strong> Delivery-to: <strong>Cambridge</strong></p>
                            <p>Date posted: <strong>1hr before</strong></p>
						</div> <!-- job detail -->
                        <div class="clear"></div>
                            <div class="action-btns">
                                <a href="#" class="more-detail">More details</a> <a href="#" class="invite-btn"></a>
                            </div>
                      </div> <!-- media body -->
                    </div>
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="<?php echo base_url() ?>application/assets/front/images/client-img.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                      	<p class="item-id">Job ID: <span>345672</span></p>
                      	<div class="job-title">
                        	<h2>Please send me quotes</h2>
                        	<h3 class="client-name">Emily Madison</h3>
                        </div>    
                        <p class="job-desc">I have to send parcel to my friend from Bradford to Cambridge.</p>
                        <div class="job-detail">
                            <p>Package size: <strong>3kg</strong></p>
                            <p>Colection from: <strong>Bradfrod</strong> Delivery-to: <strong>Cambridge</strong></p>
                            <p>Date posted: <strong>1hr before</strong></p>
						</div> <!-- job detail -->
                        <div class="clear"></div>
                            <div class="action-btns">
                                <a href="#" class="more-detail">More details</a> <a href="#" class="invite-btn"></a>
                            </div>
                      </div> <!-- media body -->
                    </div>
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="<?php echo base_url() ?>application/assets/front/images/client-img.png" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                      	<p class="item-id">Job ID: <span>345672</span></p>
                      	<div class="job-title">
                        	<h2>Please send me quotes</h2>
                        	<h3 class="client-name">Emily Madison</h3>
                        </div>    
                        <p class="job-desc">I have to send parcel to my friend from Bradford to Cambridge.</p>
                        <div class="job-detail">
                            <p>Package size: <strong>3kg</strong></p>
                            <p>Colection from: <strong>Bradfrod</strong> Delivery-to: <strong>Cambridge</strong></p>
                            <p>Date posted: <strong>1hr before</strong></p>
						</div> <!-- job detail -->
                        <div class="clear"></div>
                            <div class="action-btns">
                                <a href="#" class="more-detail">More details</a> <a href="#" class="invite-btn"></a>
                            </div>
                      </div> <!-- media body -->
                    </div>
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" src="<?php echo base_url() ?>application/assets/front/images/client-img.png" class="img-responsive" alt="...">
                        </a>
                      </div>
                      <div class="media-body">
                      	<p class="item-id">Job ID: <span>345672</span></p>
                      	<div class="job-title">
                        	<h2>Please send me quotes</h2>
                        	<h3 class="client-name">Emily Madison</h3>
                        </div>    
                        <p class="job-desc">I have to send parcel to my friend from Bradford to Cambridge.</p>
                        <div class="job-detail">
                            <p>Package size: <strong>3kg</strong></p>
                            <p>Colection from: <strong>Bradfrod</strong> Delivery-to: <strong>Cambridge</strong></p>
                            <p>Date posted: <strong>1hr before</strong></p>
						</div> <!-- job detail -->
                        <div class="clear"></div>
                            <div class="action-btns">
                                <a href="#" class="more-detail">More details</a> <a href="#" class="invite-btn"></a>
                            </div>
                      </div> <!-- media body -->
                    </div>
                    <?php */?>
                    <div id="results"></div>
                    <div align="center">
                        <button class="load_more" id="load_more_button">load More</button>
                        <div class="animation_image" style="display:none;"><img src="<?php echo base_url() ?>application/assets/front/images/ajax-loader.gif"> Loading...</div>
                    </div>
                    
            	</div> <!-- job results -->
                 <ul class="pagination">
                  <li><img style="height:50%; cursor:pointer; height:35px" src="<?php echo base_url(); ?>application/assets/front/images/load-more.png"  /></li>
                 <!-- <li><a href="#"><span>2</span></a></li>
                  <li><a href="#"><span>3</span></a></li>
                  <li><a href="#"><span>4</span></a></li>
                  <li><a href="#"><span>5</span></a></li>-->
                </ul>
            </div> <!-- column -->
        </div> <!-- row -->

        </div> <!-- panel content -->
        <div class="clear"></div>
    </div> <!-- simple panel -->
</section>  

</div> <!-- container -->
    
