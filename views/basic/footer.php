<div class="wrapper-clocks js-section js-section-light">

            <a class="location-clock london" href="#" title="London">

                <div class="clock" data-timezone="1">

                    <div class="clock-semi-circle"></div>

                    <div class="clock-face">

                        <div id="hour" class="clock-hour"></div>

                        <div id="minute" class="clock-minute"></div>

                        <div id="second" class="clock-second"></div>

                    </div>

                </div>

                <div class="location-details">

                    <p class="location-time">06:29</p>

                    <p class="location-name">London</p>

                </div>

            </a>

            <a class="location-clock vancouver" href="#" title="Vancouver">

                <div class="clock" data-timezone="-7">

                    <div class="clock-semi-circle"></div>

                    <div class="clock-face">

                        <div id="hour" class="clock-hour"></div>

                        <div id="minute" class="clock-minute"></div>

                        <div id="second" class="clock-second"></div>

                    </div>

                </div>

                <div class="location-details">

                    <p class="location-time">22:29</p>

                    <p class="location-name">Vancouver</p>

                </div>

            </a>

            <a class="location-clock mumbai" href="#" title="Mumbai">

                <div class="clock" data-timezone="5.5">

                    <div class="clock-semi-circle"></div>

                    <div class="clock-face">

                        <div id="hour" class="clock-hour"></div>

                        <div id="minute" class="clock-minute"></div>

                        <div id="second" class="clock-second"></div>

                    </div>

                </div>

                <div class="location-details">

                    <p class="location-time">10:59</p>

                    <p class="location-name">Mumbai</p>

                </div>

            </a>

            <a class="location-clock los-angeles" href="#" title="Los Angeles">

                <div class="clock" data-timezone="-7">

                    <div class="clock-semi-circle"></div>

                    <div class="clock-face">

                        <div id="hour" class="clock-hour"></div>

                        <div id="minute" class="clock-minute"></div>

                        <div id="second" class="clock-second"></div>

                    </div>

                </div>

                <div class="location-details">

                    <p class="location-time">22:29</p>

                    <p class="location-name">Los Angeles</p>

                </div>

            </a>

            <a class="location-clock chennai" href="#" title="Chennai">

                <div class="clock" data-timezone="5.5">

                    <div class="clock-semi-circle"></div>

                    <div class="clock-face">

                        <div id="hour" class="clock-hour"></div>

                        <div id="minute" class="clock-minute"></div>

                        <div id="second" class="clock-second"></div>

                    </div>

                </div>

                <div class="location-details">

                    <p class="location-time">10:59</p>

                    <p class="location-name">Chennai</p>

                </div>

            </a>

            <a class="location-clock montreal" href="#" title="Montréal">

                <div class="clock" data-timezone="-4">

                    <div class="clock-semi-circle"></div>

                    <div class="clock-face">

                        <div id="hour" class="clock-hour"></div>

                        <div id="minute" class="clock-minute"></div>

                        <div id="second" class="clock-second"></div>

                    </div>

                </div>

                <div class="location-details">

                    <p class="location-time">01:29</p>

                    <p class="location-name">Montréal</p>

                </div>

            </a>

            <a class="location-clock mohali" href="#" title="Mohali">

                <div class="clock" data-timezone="5.5">

                    <div class="clock-semi-circle"></div>

                    <div class="clock-face">

                        <div id="hour" class="clock-hour"></div>

                        <div id="minute" class="clock-minute"></div>

                        <div id="second" class="clock-second"></div>

                    </div>

                </div>

                <div class="location-details">

                    <p class="location-time">10:59</p>

                    <p class="location-name">Mohali</p>

                </div>

            </a>

            <a class="location-clock bangalore" href="#" title="Bangalore">

                <div class="clock" data-timezone="5.5">

                    <div class="clock-semi-circle"></div>

                    <div class="clock-face">

                        <div id="hour" class="clock-hour"></div>

                        <div id="minute" class="clock-minute"></div>

                        <div id="second" class="clock-second"></div>

                    </div>

                </div>

                <div class="location-details">

                    <p class="location-time">10:59</p>

                    <p class="location-name">Bangalore</p>

                </div>

            </a>

            <a class="location-clock toronto" href="#" title="Toronto">

                <div class="clock" data-timezone="-4">

                    <div class="clock-semi-circle" style="transform: rotate(314.883deg);"></div>

                    <div class="clock-face">

                        <div id="hour" class="clock-hour"></div>

                        <div id="minute" class="clock-minute"></div>

                        <div id="second" class="clock-second"></div>

                    </div>

                </div>

                <div class="location-details">

                    <p class="location-time">01:29</p>

                    <p class="location-name">Toronto</p>

                </div>

            </a>

            <a class="location-clock sydney" href="#" title="Sydney">

                <div class="clock" data-timezone="10">

                    <div class="clock-semi-circle"></div>

                    <div class="clock-face">

                        <div id="hour" class="clock-hour"></div>

                        <div id="minute" class="clock-minute"></div>

                        <div id="second" class="clock-second"></div>

                    </div>

                </div>

                <div class="location-details">

                    <p class="location-time">15:29</p>

                    <p class="location-name">Sydney</p>

                </div>

            </a>

        </div>

<div class="wrapper wrapper-site-footer js-section js-section-dark">

            <footer class="site-footer" role="contentinfo">

                    <div class="site-footer-left">
                        <ul class="nav site-footer-nav">
                            <?php foreach ($this->footer_menus->res as $val) { ?>
                                <li class="menu-item">
                                    <a 
                                        title="<?php echo $val->menu_name; ?>" 
                                        href="<?php 
                                            if ($val->menu_type == 'page') {
                                                echo SITEURL . 'pages/pagedetails/' . $val->menu_module;
                                            } elseif ($val->menu_type == 'module') {
                                                echo SITEURL . 'pages/moduledetails/' . $val->menu_module;
                                            }
                                        ?>" 
                                        class="nav-link">
                                        <?php echo $val->menu_name; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>


                <div class="site-footer-right">

                    <div class="footer-social">

                        <p>Follow us</p>

                        <ul class="social-links hover">

                            <li><a href="#" target="blank" class="social-vimeo"><i class="fa fa-vimeo"></i></a></li>

                            <li><a href="#" target="blank" class="social-youtube"><i class="fa fa-youtube"></i></a></li>

                            <li><a href="#" target="blank" class="social-linkedin"><i class="fa fa-linkedin"></i></a></li>

                            <li><a href="#" target="blank" class="social-instagram"><i class="fa fa-instagram"></i></a></li>

                            <li><a href="#" target="blank" class="social-facebook"><i class="fa fa-facebook"></i></a></li>

                            <li><a href="#" target="blank" class="social-twitter"><i class="fa fa-twitter"></i></a></li>

                        </ul>

                    </div><!-- .footer-social -->

                    <div class="footer-site-info">

                        <div class="dneg-credit text-right">

                            <a href="<?php echo SITEURL; ?>" title="Dexter & Bruno" rel="home">

                                <img src="<?php echo THEMEURL; ?>assets/img/logo.png" width="120" style="margin-bottom: 12px;" />

                            </a>

                            <p><i class="fa fa-copyright"></i> Dexter & Bruno 2023.<br>

                                All rights reserved</p>

                                <p style="    display: flex;

    align-items: center;">Powered by : &nbsp;<a href="https://siriinnovations.com/" target="_blank"><img src="<?php echo THEMEURL; ?>assets/img/siri.png" style="width: 55px;" /></a></p>

                        </div>

                    </div>

                </div>

                <script>

                $(function() {

                    $(window).scroll(function() {

                            if ($(window).scrollTop() >= 50) {

                                $('.site-navigation').addClass('shrink');

                            } else {

                                $('.site-navigation').removeClass('shrink');

                            }

                        }



                    );

                });

                </script>

            </footer>

        </div>

         <script type="text/javascript" src="<?php echo THEMEURL; ?>assets/js/theme.min.js"></script>

</body>



</html>