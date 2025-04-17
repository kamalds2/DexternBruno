

        <div id="page" class="theme-page">

            

            <div class="fc-row js-section js-section-dark">

            <div class="blocks">

<div class="block block-wide_image_block" style="min-height: 30vh;">

    <div class="block-inner">

        <div class="background-image-stretch"

    style="background-image: url(<?php $pages = $this->pages->res;  echo UPLOADURL.'pages/'.$pages->banner_image;?>);"></div>

    </div>

</div>

</div>

</div>





        </div>

        <div class="fc-row js-section js-section-light bg-light">

    <div class="blocks">

<div class="block block-text">

    <div class="block-inner">

        <div class="container">

    <div class="row justify-content-center information-block">

        <div class="col-12 col-lg-12">

          <?php   echo $pages->meta_description;?>

        <div class="apply_btn"><a href="<?php echo SITEURL.'apply_jobs';?>"><img src="<?php echo THEMEURL;?>assets/img/expand.svg"/> Apply</a></div>

         </div>

        <div class="col-lg-12 job-d mt-20">
            <?php 

            echo $pages->page_description;?>


        </div>
        


       

    </div>

</div>    </div>

</div></div>

</div>




