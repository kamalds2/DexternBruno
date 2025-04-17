

        <div id="page" class="theme-page">

            

            <div class="fc-row js-section js-section-dark">

            <div class="blocks">

<div class="block block-fifty_fifty_block">

    <div class="block-inner">

        

<div class="fifty-fifty-blocks">

    <div class="background-image" style="background-image: url(<?php $pages = $this->pages->res;  echo UPLOADURL.'pages/'.$pages->banner_image;?>); background-position-x: 0%;"></div>

    

    <div class="left-block fifty-fifty-block">

                    <h1 class="size-medium"><?php echo $pages->page_title;?></h1>

            </div>



    <div class="block-circles background-colour-white">

        <div class="left-side">

            <div class="circle-inner"></div>

        </div>



        <div class="right-side">

            <div class="circle-inner">

                <div class="background-image" style="background-image: url(<?php echo THEMEURL; ?>assets/img/services_img.jpg); background-position-x: 0%;"></div>

                            </div>

        </div>

    </div>



    <div class="right-block fifty-fifty-block background-colour-white information-block">

      <?php  echo $pages->page_description;?>


<div class="scroll-assist arrow-colour-orange">

                <i class="fa fa-fw fa-angle-down"></i>

            </div>

            </div>

</div>

    </div>

</div>

</div>

</div>

        </div><div class="fc-row js-section js-section-light bg-light">

    <div class="blocks">

        <div class="block block-text">

            <div class="block-inner">

                <div class="container">

                    <div class="row justify-content-center information-block">

                        <div class="col-12 col-lg-12">

                            <?php $services = $this->servicess->res; 

                            foreach($services as $value){ ?>

                                <div class="service_item">

                                    <div class="col-12 col-lg-3">

                                        <img src="<?php echo UPLOADURL.'pages/'.$value->service_image; ?>" />

                                    </div>

                                    <div class="col-12 col-lg-9">

                                        <h2><?php echo $value->service_title; ?></h2>

                                        <p><?php echo $value->service_description; ?>.</p>

                                    </div>

                                </div>

                                <div class="clearfix">&nbsp;</div>
                            <?php } ?>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>



       