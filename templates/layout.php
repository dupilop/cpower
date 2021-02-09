<?php
// if (!(isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == true)) {
//     header('Location: ../login.php');
// }

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?php echo $title; ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="HandheldFriendly" content="true" />
    <link rel="stylesheet" href="assets/css/master.css" />
    <!-- SWITCHER-->
    <link href="assets/plugins/switcher/css/switcher.css" rel="stylesheet" id="switcher-css" />
    <link href="assets/plugins/switcher/css/color1.css" rel="alternate stylesheet" title="color1" />
    <link href="assets/plugins/switcher/css/color2.css" rel="alternate stylesheet" title="color2" />
    <link href="assets/plugins/switcher/css/color3.css" rel="alternate stylesheet" title="color3" />
    <link href="assets/plugins/switcher/css/color4.css" rel="alternate stylesheet" title="color4" />
    <link href="assets/plugins/switcher/css/color5.css" rel="alternate stylesheet" title="color5" />
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <!--[if lt IE 9 ]>
<script src="assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script><meta content="no" http-equiv="imagetoolbar">
<![endif]-->
</head>

<body>
    <!-- Loader-->
    <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span>
    </div>
    <!-- Loader end-->
    <!-- ==========================-->
    <!-- MOBILE MENU-->
    <!-- ==========================-->
    <div data-off-canvas="mobile-slidebar left overlay">
        <a class="navbar-brand scroll" href="home.html">
            <img class="normal-logo img-resonsive visible-xs visible-sm" src="assets/media/general/crystal-logo.png" alt="logo" />
            <img class="scroll-logo img-resonsive hidden-xs hidden-sm" src="assets/media/general/crystal-logo.png.png" alt="logo" />
        </a>
        <ul class="nav navbar-nav">
            <li>
                <h4><a href="">Mobile sidebar</a></h4>
            </li>
            <li><a href="./">Home</a>
            </li>
            <li><a href="repair-shop.html">Products</a>
            </li>
            <li><a href="car-rental.html">About</a>
            </li>
            <li><a href="#">Contact Us</a>
            </li>
            <li><a href="blog-main.html">Blog/News</a>
            </li>
        </ul>
    </div>
    <div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">
        <!-- Start Switcher-->
        <div class="switcher-wrapper">
            <div class="demo_changer">
                <div class="demo-icon text-primary"><i class="fa fa-cog fa-spin fa-2x"></i>
                </div>
                <div class="form_holder">
                    <div class="predefined_styles">
                        <div class="skin-theme-switcher">
                            <h4>Color</h4>
                            <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color1" style="background-color:#d01818"></a>
                            <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color2" style="background-color:#FFAC3A"></a>
                            <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color3" style="background-color:#28af0f"></a>
                            <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color4" style="background-color:#e425e9"></a>
                            <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color5" style="background-color:#0a16ad"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end switcher-->
        <!-- ==========================-->
        <!-- SEARCH MODAL-->
        <!-- ==========================-->
        <div class="header-search open-search">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                        <div class="navbar-search">
                            <form class="search-global">
                                <input class="search-global__input" type="text" placeholder="Type to search" autocomplete="off" name="s" value="" />
                                <button class="search-global__btn"><i class="icon stroke icon-Search"></i>
                                </button>
                                <div class="search-global__note">Begin typing your search above and press return to search.</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <button class="search-close close" type="button"><i class="fa fa-times"></i>
            </button>
        </div>
        <div data-off-canvas="slidebar-1 left overlay">
            <ul class="nav navbar-nav">
                <li><a class="scrollTo" href="#features-section">features</a>
                </li>
                <li><a class="scrollTo" href="#services-section">Services</a>
                </li>
                <li><a class="scrollTo" href="#works-section">Works</a>
                </li>
                <li><a class="scrollTo" href="#about-section">About</a>
                </li>
                <li><a class="scrollTo" href="#team-section">Team</a>
                </li>
                <li><a href="#">News</a>
                </li>
                <li><a href="#">Portfolio</a>
                    <div class="wrap-inside-nav">
                        <div class="inside-col">
                            <ul class="inside-nav">
                                <li><a href="portfolio.html">Portfolio</a>
                                </li>
                                <li><a href="portfolio-single.html">Portfolio single</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li><a href="#">Contact</a>
                    <div class="wrap-inside-nav">
                        <div class="inside-col">
                            <ul class="inside-nav">
                                <li><a href="contact.html">Contact 1</a>
                                </li>
                                <li><a href="contact-2.html">Contact 2</a>
                                </li>
                                <li><a href="contact-3.html">Contact 3</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <header class="header header-boxed-width navbar-fixed-top header-background-white header-color-black header-topbar-dark header-logo-black header-topbarbox-1-left header-topbarbox-2-right header-navibox-1-left header-navibox-2-right header-navibox-3-right header-navibox-4-right">
            <div class="container container-boxed-width">
                <div class="top-bar">
                    <div class="container">
                        <div class="header-topbarbox-1">
                            <ul>
                                <li><i class="icon fa fa-clock-o"></i> Sun - Fri : 10:00 am to 5:00 pm</li>
                                <li><i class="icon fa fa-phone"></i><a href="tel:+0427983549">071-437424, +977 9857023662 / 9857026224</a>
                                </li>
                                <li><i class="icon fa fa-envelope-o"></i><a href="mailto:crystalplimited@gmail.com"> crystalplimited@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                        <div class="header-topbarbox-2">
                            <ul class="social-links">
                                <li><a href="./" target="_blank"><i class="social_icons fa fa-twitter"></i></a>
                                </li>
                                <li><a href="https://www.facebook.com/Crystalplimited/" target="_blank"><i class="social_icons fa fa-facebook"></i></a>
                                </li>
                                <li><a href="./" target="_blank"><i class="social_icons fa fa-linkedin"></i></a>
                                </li>
                                <li class="li-last"><a href="./" target="_blank"><i class="social_icons fa fa-instagram"></i></a>
                                </li>
                                <li><a href="./" target="_blank"><i class="social_icons fa fa-youtube-play"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <nav class="navbar" id="nav">
                    <div class="container">
                        <div class="header-navibox-1">
                            <!-- Mobile Trigger Start-->
                            <button class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button"><i class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i>
                            </button>
                            <!-- Mobile Trigger End-->
                            <a class="navbar-brand scroll" href="home.html">
                                <img class="normal-logo img-responsive" src="assets/media/general/logo-small.png" alt="logo" />
                                <img class="scroll-logo hidden-xs img-responsive" src="assets/media/general/logo-small.png" alt="logo" />
                            </a>
                        </div>
                        <div class="header-navibox-3">
                            <ul class="nav navbar-nav hidden-xs clearfix vcenter">
                                <li>
                                    <div class="header-cart"><a href="#"><i class="icon fa fa-shopping-basket" aria-hidden="true"></i><span class="header-cart-count bg-primary">3</span></a>
                                    </div>
                                </li>
                                <li><a class="btn_header_search" href="#"><i class="icon fa fa-search"></i></a>
                                </li>
                            </ul><a class="btn btn-primary" href="home.html">sell car</a>
                        </div>
                        <div class="header-navibox-2">
                            <ul class="yamm main-menu nav navbar-nav">
                                <li><a href="./">Home</a>
                                </li>
                                <li><a href="products">Products</a>
                                </li>
                                <li><a href="car-rental.html">About</a>
                                </li>
                                <li><a href="#">Contact Us</a>
                                </li>
                                <li><a href="blog-main.html">Blog/News</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <div>
            <?php echo $content; ?>
        </div>
        <!-- end .section-default-->
        <footer class="footer area-bg">
            <div class="area-bg__inner">
                <div class="footer__main">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="footer-section">
                                    <a class="footer__logo" href="home.html">
                                        <img class="img-responsive" src="assets/media/general/logo-small.png" alt="Logo" />
                                    </a>
                                    <div class="footer__info">Crystal Eye (P) LTD is an Electrical Equipment Supplier Located at Kalikanagar, Butwal-10, Nepal. , having its registered office at Butwal Sub-metropolitan City Ward No.-10, Kalikanagar, Rupandehi Nepal.</div>
                                    <ul class="social-net list-inline">
                                        <li class="social-net__item"><a class="social-net__link text-primary_h" href="https://www.facebook.com/Crystalplimited/"><i class="icon fa fa-facebook"></i></a>
                                        </li>
                                        <li class="social-net__item"><a class="social-net__link text-primary_h" href="twitter.com"><i class="icon fa fa-twitter"></i></a>
                                        </li>
                                        <li class="social-net__item"><a class="social-net__link text-primary_h" href="linkedin.com"><i class="icon fa fa-linkedin"></i></a>
                                        </li>
                                        <li class="social-net__item"><a class="social-net__link text-primary_h" href="instagram.com"><i class="icon fa fa-instagram"></i></a>
                                        </li>
                                        <li class="social-net__item"><a class="social-net__link text-primary_h" href="youtube.com"><i class="icon fa fa-youtube-play"></i></a>
                                        </li>
                                    </ul>
                                    <!-- end .social-list-->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <section class="footer-section footer-section_list-columns">
                                    <h3 class="footer-section__title ui-title-inner">Pages</h3>
                                    <ul class="footer-list footer-list_columns list-unstyled">
                                        <li class="footer-list__item"><a class="footer-list__link" href="about.html">Home</a>
                                        </li>
                                        <li class="footer-list__item"><a class="footer-list__link" href="about.html">Products</a>
                                        </li>
                                        <li class="footer-list__item"><a class="footer-list__link" href="about.html">About</a>
                                        </li>
                                        <li class="footer-list__item"><a class="footer-list__link" href="about.html">Contact Us</a>
                                        </li>
                                        <li class="footer-list__item"><a class="footer-list__link" href="about.html">Blogs/News</a>
                                        </li>



                                    </ul>
                                </section>
                            </div>
                            <div class="col-md-2">
                                <section class="footer-section footer-section_list-one">
                                    <h3 class="footer-section__title ui-title-inner">Categories</h3>
                                    <ul class="footer-list list-unstyled">
                                        <li class="footer-list__item"><a class="footer-list__link" href="about.html">Generator</a>
                                        </li>
                                        <li class="footer-list__item"><a class="footer-list__link" href="about.html">Online UPS</a>
                                        </li>
                                        <li class="footer-list__item"><a class="footer-list__link" href="about.html">Transformer</a>
                                        </li>
                                        <li class="footer-list__item"><a class="footer-list__link" href="about.html">Voltage Stablizier</a>
                                        </li>

                                    </ul>
                                </section>
                            </div>
                            <div class="col-md-3">
                                <section class="footer-section">
                                    <h3 class="footer-section__title ui-title-inner">Address Information</h3>
                                    <div class="footer-contact footer-contact_lg">Call us<span class="text-primary"> (071) 437424</span>
                                    </div>
                                    <div class="footer-contact"><i class="icon icon-xs fa fa-envelope-o"></i>crystalplimited@gmail.com</div>
                                    <div class="footer-contact"><i class="icon icon-lg fa fa-map-marker"></i>Kalikanagar, Butwal, Rupandehi Nepal</div>
                                    <div class="footer-contact"><i class="icon fa fa-clock-o"></i>Sun - Fri : 10:00 am to 5:00 pm</div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">Copyrights 2021<a class="copyright__brand" href="home.html"> Crystalpower</a> All Rights Reserved<a class="copyright__link" href="privacy-policy.html">Privacy Policy</a><a class="copyright__link" href="terms-of-use.html">Terms & Conditions</a>
                            </div>
                        </div>
                    </div>
                </div><span class="btn-up" id="toTop">TOP</span>
            </div>
        </footer>
        <!-- .footer-->
    </div>
    <!-- end layout-theme-->


    <!-- ++++++++++++-->
    <!-- MAIN SCRIPTS-->
    <!-- ++++++++++++-->
    <script src="assets/libs/jquery-1.12.4.min.js"></script>
    <script src="assets/libs/jquery-migrate-1.2.1.js"></script>
    <!-- Bootstrap-->
    <script src="assets/libs/bootstrap/bootstrap.min.js"></script>
    <!-- User customization-->
    <script src="assets/js/custom.js"></script>
    <!-- Headers scripts-->
    <script src="assets/plugins/headers/slidebar.js"></script>
    <script src="assets/plugins/headers/header.js"></script>
    <!-- Color scheme-->
    <script src="assets/plugins/switcher/js/dmss.js"></script>
    <!-- Select customization & Color scheme-->
    <script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
    <!-- Slider-->
    <script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- Pop-up window-->
    <script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Mail scripts-->
    <script src="assets/plugins/jqBootstrapValidation.js"></script>
    <script src="assets/plugins/contact_me.js"></script>
    <!-- Filter and sorting images-->
    <script src="assets/plugins/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/plugins/isotope/imagesLoaded.js"></script>
    <!-- Progress numbers-->
    <script src="assets/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/plugins/rendro-easy-pie-chart/waypoints.min.js"></script>
    <!-- NoUiSlider-->
    <script src="assets/plugins/noUiSlider/nouislider.min.js"></script>
    <script src="assets/plugins/noUiSlider/wNumb.js"></script>
    <!-- Animations-->
    <script src="assets/plugins/scrollreveal/scrollreveal.min.js"></script>
    <!-- Main slider-->
    <script src="assets/plugins/slider-pro/jquery.sliderPro.min.js"></script>
</body>

</html>