



<!doctype html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dexter & Bruno</title>

    <meta name="description" content="Dextern Bruno">

    <meta name="keywords" content="Dextern Bruno">

    <meta property="og:title" content="Dextern Bruno" />

    <meta property="og:description" content="Dextern Bruno" />

    <meta property="og:site_name" content="Dextern Bruno" />

    <meta property="og:type" content="website" />

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="shortcut icon" type="image/x-icon" href="<?php echo THEMEURL; ?>assets/img/favicon.png">

    <link rel='stylesheet' href='<?php echo THEMEURL; ?>assets/css/theme.min.css' type='text/css' />

    

    <script type='text/javascript' src='<?php echo THEMEURL; ?>assets/js/jquery.min.js'></script>

</head>     



<body class="home page-template page-template-page-templates page-template-home page-template-page-templateshome-php page page-id-4 circular-menu-present group-blog">

    <div id="site" class="hfeed theme-site">

        <div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

            <div class="navbar-spacer"></div>

            <nav class="navbar site-navigation">

                <div class="navbar-header">

                    <a class="navbar-brand hide" href="<?php echo SITEURL.'index/'; ?>" title="Dexter & Bruno" rel="home">

                        <img src="<?php echo THEMEURL; ?>assets/img/logo.png" class="site-logo main-logo" />

                    </a>

                    <div class="navbar-right light stay-open">

                        <a href="<?php echo SITEURL.'pages/pagedetails/career/'; ?>" class="navbar-link semi-circle-small">Join Us</a>

                        <button class="navbar-search button-icon-swap semi-circle-small">

                            <span class="navbar-toggler-search"><i class="fa fa-fw fa-search"></i></span>

                            <span class="navbar-toggler-close"></span>

                        </button>

                        <button class="navbar-toggler button-icon-swap semi-circle-small" data-toggle="collapse" data-target=".exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">

                            <span class="navbar-toggler-hamburger">☰</span>

                            <span class="navbar-toggler-close"></span>

                        </button>

                    </div>

                    <div class="navbar-responsive-right">

                        <button class="navbar-search button-icon-swap semi-circle-small">

                            <span class="navbar-toggler-search"><i class="fa fa-fw fa-search"></i></span>

                            <span class="navbar-toggler-close"></span>

                        </button>

                        <button class="navbar-toggler button-icon-swap semi-circle-small" data-toggle="collapse" data-target=".exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">

                            <span class="navbar-toggler-hamburger">☰</span>

                            <span class="navbar-toggler-close"></span>

                        </button>

                    </div>

                </div>


<div class="off-canvas-menu" style="background-image: url(''); display: none;">
            <div class="off-canvas-menu-inner">

                        <div>

                            <div class="menu-main-navigation-container">

                                <ul id="main-menu" class="nav navbar-nav">
                                         <?php $homeservice_ids = explode(",", $this->homeservices->res[0]->homeservice_id) ; 
                                             $services = $this->services->res; 
                                         foreach ($services as $service) {
                                                if (in_array($service->service_id, $homeservice_ids)) { 
                                                ?>

                                    <li class="menu-item"><a title="<?php echo $services->service_title;?>" href="<?php echo SITEURL.'services/'; ?>" class="nav-link active"><?php echo $service->service_title;?></a></li>

                                <?php }}?>

                                </ul>

                            </div>

                            <div class="menu-secondary-navigation-container">

                                <ul id="secondary-menu" class="nav navbar-nav">
                                    <?php  $menus = $this->menus->res; 
                                    foreach($menus as $val){?>

                                    <li class="menu-item"><a title="<?php echo $val->menu_name; ?>" href="<?php 
                                    if($val->menu_type == 'module'){
                                            echo SITEURL.$val->menu_module;
                                    }
                                    elseif($val->menu_type =='page'){
                                        echo SITEURL.'pages/pagedetails/'.$val->menu_module; 
                                    }
                                        else{
                                            echo SITEURL;

                                        } ?>" class="nav-link"><?php echo $val->menu_name;?></a></li>
                                <?php } ?>
                                </ul>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="site-search" style="display: none;">

                    <form id="searchform" role="search">

                        <label class="assistive-text" for="s">Search</label>

                        <div class="input-group">

                            <input class="field form-control" id="s" name="s" type="text" placeholder="Search …" autocomplete="off">

                            <span class="input-group-btn">

                                <input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search" autocomplete="off">

                            </span>

                        </div>

                    </form>

                    <div class="site-search-results search-results-container"></div>

                </div>
                 </nav>
 </div>
