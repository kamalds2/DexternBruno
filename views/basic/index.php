

        <div id="page" class="theme-page">

            <div class="full-screen js-section js-section-dark circular-menu video-active ">
               <?php if (!empty($this->testimonial->res[0]->testimonial_name)) { ?>
              <video class="fitvid" autoplay muted playsinline loop>
            <source src="<?php  echo UPLOADURL.'testimonials/'.$this->testimonial->res[0]->testimonial_name;?>" type="video/mp4">
                </video>
                   

                  <?php } else {$video_url = $this->testimonial->res[0]->video_url;
                    $video_id = explode("v=", $video_url)[1];?>

                   <style>.fitvid{pointer-events: none;}</style>
                <iframe class="fitvid" src="https://www.youtube.com/embed/<?php echo $video_id; ?>?autoplay=1&mute=1&controls=0&playsinline=1&loop=1playlist=<?php echo $video_id; ?>&rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                    </iframe><?php }?>
                <div>

                    <img src="<?php echo THEMEURL; ?>assets/img/logo_text.png" class="slider-logo main-logo" />

                </div>

                    <?php 
            $services = $this->services->res; 
            $homeservice_ids = explode(",", $this->homeservices->res[0]->homeservice_id) ;
            $i = 1;
            foreach ($services as $service) {
                if (in_array($service->service_id, $homeservice_ids)) { 
                    ?>
                    <div>
                        <p class="side-text text-<?php echo $i; ?>">
                            <?php echo htmlspecialchars($service->service_description); // Escape output for security ?>
                            <a href="<?php echo SITEURL . 'services/'; ?>" class="side-text-read-more">Read more</a>
                        </p>
                    </div>
                    <?php 
                    $i++; 
                } 
            }
            ?>

            <div class="circle-menu">

                <!-- Circle SVG -->
                <svg id="home-circle" viewBox="0 0 32.5 32.5" class="outline-circle">
                    <path class="circle-bg" d="M16.25 0.3345 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                    <path class="circle" stroke-dasharray="25, 100" d="M16.25 0.3345 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"></path>
                </svg>

                <!-- Circle Navigation -->
                <ul class="circle-nav">
                    <?php 
                    $origins = [0, 90, 180, 270];
                    $i = 0; 
                    foreach ($services as $servicess) { 
                        // Check if the service_id is in the homeservice_ids array
                        if (in_array($servicess->service_id, $homeservice_ids)) { 
                            $randomClass = rand(1000, 99999); // Generate a random class
                            $origin = $origins[$i % count($origins)]; // Calculate position based on index
                            ?>
                            <li class="page-<?php echo $randomClass; ?>" data-section-origin="<?php echo $origin; ?>">
                                <a href="<?php echo SITEURL . 'services/'; ?>" class="circle-nav-link">
                                    <?php echo htmlspecialchars($servicess->service_title); // Escape output for security ?>
                                </a>
                            </li>
                            <?php 
                            $i++; 
                        } 
                    } 
                    ?>
                </ul>

            </div>




                <div class="scroll-assist arrow-colour-white">

                    <i class="fa fa-fw fa-angle-down"></i>

                </div>

            </div>

            <div class="container">

                <div class="archive-posts">

                 

                         <?php
            $slidersList = $this->sliders->res; 
            if(!empty($slidersList)){
                foreach ($slidersList as $slider) {  ?>
                       <article>
                     <div class="post-content xcta-info">

                            <div class="xcta-title">

                                <header class="entry-header">

                                    <span class="post-date"><?php echo $slider->slider_date; ?></span>

                                </header>

                                <div class="entry-content">

                                    <h2 class="entry-title"><a href="#" rel="bookmark"><?php echo $slider->slider_title; ?></a></h2>

                                </div>

                            </div>

                            

                    <footer class="entry-footer">

                                <a class="plus-link xcta-link post-link" href="<?php echo SITEURL.'sliders/getsliders/'.$slider->slider_id; ?>">Read More</a>

                            </footer>

                        </div>

                        <a class="post-image" style="background-image:  url(<?php echo UPLOADURL.'sliders/'.$slider->slider_image; ?>); background-position-x: 0%;" href="#" title=""></a>

                        </article>                <?php }
            }
        ?>
                       

                    


                    <a class="archive-action-link" href="#" title="View all news">

                        <span class="arrow-link">View all news</span>

                    </a>

                </div>

            </div>

        </div>


        

    </div>

   