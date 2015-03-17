    <section id="main-slider">
   	<div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background:url('<?php echo base_url(); ?>application/assets/front/images/slider/bg3.jpg');"></div>
                <div id="page-background">
                  <img src="<?php echo base_url(); ?>application/assets/front/images/slider/bg3.jpg" width="100%" height="100%">
                </div>
                
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background:url('<?php echo base_url(); ?>application/assets/front/images/slider/bg2.jpg');"></div>
                
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
            <span class="prev-btn"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </div>
   
    	<!--<div id="wowslider-container1">
	<div class="ws_images"><ul>
		<li><a href="http://wowslider.com"><img src="<?php echo base_url(); ?>application/assets/front/images/slider/bg3.jpg" alt="jquery carousel slider" title="" id="wows1_0"/></a></li>
		<li><img src="<?php echo base_url(); ?>application/assets/front/images/slider/bg2.jpg" alt="bg2" title="" id="wows1_1"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="bg3"><span><img src="data1/tooltips/bg3.jpg" alt="bg3"/>1</span></a>
		<a href="#" title="bg2"><span><img src="data1/tooltips/bg2.jpg" alt="bg2"/>2</span></a>
	</div></div>
	</div>-->
        
        <div class="container text-center"><img src="<?php echo base_url(); ?>application/assets/front/images/logo-round.png" alt="" class="logo-round-center" /></div>
    </section><!--/#main-slider-->

    <section id="cta" class="wow fadeIn">
        <?php if(isset($home_page_content))
        {
          foreach($home_page_content as $key=>$val)
          {
			  echo $val['description'];
		  }
		}
              
         ?>
        </div>        
    </section><!--/#cta-->

    <section id="features">
        <?php if(isset($how_it_works_content))
        {
          foreach($how_it_works_content as $key=>$val)
          {
			  echo $val['description'];
		  }
		}
              
         ?>
    </section>
    
    <section id="about">
    
        <?php if(isset($about_us_content))
        {
          foreach($about_us_content as $key=>$val)
          {
			  echo $val['description'];
		  }
		}
              
         ?>
      
        </div>
    </section><!--/#about-->
