<?php
require 'db/connect.php';
$abc = $pdo->prepare("SELECT * FROM products WHERE p_id=:pid");
$abc->execute(['pid' => $_GET['p_id']]);
$abc2 = $abc->fetch();
?>
<div class="section-title-page area-bg area-bg_dark area-bg_op_70">
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="b-title-page bg-primary_a">Product details</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end .b-title-page-->
<div class="bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="./"><i class="icon fa fa-home"></i></a>
                    </li>
                    <li><a href="./products">Products</a>
                    </li>
                    <li class="active">Product Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb-->
<main class="l-main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="b-car-details">
                    <div class="b-car-details__header">
                        <h2 class="b-car-details__title"><?php echo $abc2['p_name'] ?></h2>
                        <div class="b-car-details__subtitle">AWD 430i xSmart Drive Coupe</div>
                        <div class="b-car-details__address"><i class="icon fa fa-map-marker text-primary"></i> 13165 N Auto Show Ave Surprise, AZ 85388</div>
                        <div class="b-car-details__links"><a class="b-car-details__link" href="car-details.html"><i class="icon fa fa-exchange text-primary"></i> Add to Compare</a><a class="b-car-details__link" href="car-details.html"><i class="icon fa fa-car text-primary"></i> Car Brochure</a>
                            <a class="b-car-details__link" href="car-details.html"><i class="icon fa fa-share-alt text-primary"></i> Share</a>
                        </div>
                    </div>
                    <div class="slider-car-details slider-pro" id="slider-car-details">
                        <div class="sp-slides">
                            <div class="sp-slide">
                                <img class="sp-image" src="assets/media/content/gallery/car-details/main/1.jpg" alt="img" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="assets/media/content/gallery/car-details/main/1.jpg" alt="img" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="assets/media/content/gallery/car-details/main/1.jpg" alt="img" />
                            </div>
                            <div class="sp-slide">
                                <iframe class="sp-video" src="https://www.youtube.com/embed/AAfLTYZKFTc" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="assets/media/content/gallery/car-details/main/1.jpg" alt="img" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="assets/media/content/gallery/car-details/main/1.jpg" alt="img" />
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="assets/media/content/gallery/car-details/main/1.jpg" alt="img" />
                            </div>
                        </div>
                        <div class="sp-thumbnails">
                            <div class="sp-thumbnail">
                                <img class="img-responsive" src="assets/media/content/gallery/car-details/thumb/1.jpg" alt="img" />
                            </div>
                            <div class="sp-thumbnail">
                                <img class="img-responsive" src="assets/media/content/gallery/car-details/thumb/2.jpg" alt="img" />
                            </div>
                            <div class="sp-thumbnail">
                                <img class="img-responsive" src="assets/media/content/gallery/car-details/thumb/3.jpg" alt="img" />
                            </div>
                            <div class="sp-thumbnail sp-thumbnail_video">
                                <img class="img-responsive" src="assets/media/content/gallery/car-details/thumb/4.jpg" alt="img" />
                            </div>
                            <div class="sp-thumbnail">
                                <img class="img-responsive" src="assets/media/content/gallery/car-details/thumb/5.jpg" alt="img" />
                            </div>
                            <div class="sp-thumbnail">
                                <img class="img-responsive" src="assets/media/content/gallery/car-details/thumb/1.jpg" alt="img" />
                            </div>
                            <div class="sp-thumbnail">
                                <img class="img-responsive" src="assets/media/content/gallery/car-details/thumb/2.jpg" alt="img" />
                            </div>
                        </div>
                    </div>
                    <!-- end .b-thumb-slider-->
                    <div class="b-car-details__section">
                        <h3 class="b-car-details__section-title ui-title-inner">Car Overview</h3>
                        <div class="b-car-details__section-subtitle">Eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</div>
                        <p>Motorland nisi aliquip exea consequat duis lorem ipsum dolor sit amet consectetura dipisicing elit dui sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.
                            Slamco em laborisa aliquip ex ea comdo consequat uis aute irure dolor sraeprehenderit voluptate velit.</p>
                    </div>
                    <ul class="b-car-details__nav nav nav-tabs bg-primary">
                        <li class="active"><a href="#specifications" data-toggle="tab">specifications</a>
                        </li>
                        <li><a href="#details" data-toggle="tab">technical details</a>
                        </li>
                        <li><a href="#contact" data-toggle="tab">contact</a>
                        </li>
                    </ul>
                    <div class="b-car-details__tabs tab-content">
                        <div class="tab-pane active fade in" id="specifications">
                            <p>This 2018 model car is Brilliant Black Crystal Pearlcoat with a Black/Diesel Gray interior. Buy confidence knowing Jeep Dodge Ram Surprise has been exceeding customer expectations for many years and always provide
                                customers with a great value!</p>
                            <p>Sit amet consectetura dipisicing elit dui sed eiusmod tempor incididunt ut labore uset dolore magna aliqua minim veniam quis nostrud exercitation. Slamco em laborisa aliquip ex ea comdo consequat uis auted irure
                                rehenderit voluptate velit esse cillum dolore eu fugiat nulla sed pariatura ipsum dolor ame consecteu adipis elit sed do eiusmod tempora incididunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sed
                                do eius tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea comodo consequat aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint cupidatat non proident sunt in culpa qui officia deserunt mollit anim.</p>
                            <div class="b-car-details__tabs-title">more features</div>
                            <ul class="list list-mark-5 list_mark-prim list-2-col">
                                <li>Drivetrain Oil Cooler: Auxiliary</li>
                                <li>Engine Alternator: 160 Amps</li>
                                <li>Exterior Mirrors Manual Folding</li>
                                <li>Seatbelts Seatbelt Warning Sensors</li>
                                <li>Front Headrests Adjustable</li>
                                <li>Cruise Control System</li>
                                <li>Crumple Zones Front</li>
                                <li>Roll Stability Control</li>
                                <li>Multi-Function Display</li>
                                <li>ABS Brakes (4-Wheel)</li>
                                <li>Audio System 6 Speakers</li>
                                <li>Electronic Brakeforce Distribution</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="details">
                            <p>This 2018 model car is Brilliant Black Crystal Pearlcoat with a Black/Diesel Gray interior. Buy confidence knowing Jeep Dodge Ram Surprise has been exceeding customer expectations for many years and always provide
                                customers with a great value!</p>
                            <p>Sit amet consectetura dipisicing elit dui sed eiusmod tempor incididunt ut labore uset dolore magna aliqua minim veniam quis nostrud exercitation. Slamco em laborisa aliquip ex ea comdo consequat uis auted irure
                                rehenderit voluptate velit esse cillum dolore eu fugiat nulla sed pariatura ipsum dolor ame consecteu adipis elit sed do eiusmod tempora incididunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sed
                                do eius tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea comodo consequat aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint cupidatat non proident sunt in culpa qui officia deserunt mollit anim.</p>
                        </div>
                        <div class="tab-pane fade" id="contact">
                            <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea comodo consequat aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint cupidatat non proident sunt in culpa qui officia deserunt mollit anim.</p>
                            <p>This 2018 model car is Brilliant Black Crystal Pearlcoat with a Black/Diesel Gray interior. Buy confidence knowing Jeep Dodge Ram Surprise has been exceeding customer expectations for many years and always provide
                                customers with a great value!</p>
                            <p>Sit amet consectetura dipisicing elit dui sed eiusmod tempor incididunt ut labore uset dolore magna aliqua minim veniam quis nostrud exercitation. Slamco em laborisa aliquip ex ea comdo consequat uis auted irure
                                rehenderit voluptate velit esse cillum dolore eu fugiat nulla sed pariatura ipsum dolor ame consecteu adipis elit sed do eiusmod tempora incididunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit sed
                                do eius tempor incididunt ut labore et dolore magna aliqua.</p>
                            <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea comodo consequat aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint cupidatat non proident sunt in culpa qui officia deserunt mollit anim.</p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <aside class="l-sidebar-2">
                    <div class="b-car-info">
                        <div class="b-car-info__price">$49,500<span class="b-car-info__price-msrp">MSRP $40,000</span>
                        </div>
                        <dl class="b-car-info__desc dl-horizontal bg-grey">
                            <dt class="b-car-info__desc-dt">body</dt>
                            <dd class="b-car-info__desc-dd">sedan</dd>
                            <dt class="b-car-info__desc-dt">year</dt>
                            <dd class="b-car-info__desc-dd">2016</dd>
                            <dt class="b-car-info__desc-dt">MILEAGe</dt>
                            <dd class="b-car-info__desc-dd">20,300mi</dd>
                            <dt class="b-car-info__desc-dt">ENGINE</dt>
                            <dd class="b-car-info__desc-dd">5.7L V8</dd>
                            <dt class="b-car-info__desc-dt">TRANSMISSION</dt>
                            <dd class="b-car-info__desc-dd">Auto 8-Speed</dd>
                            <dt class="b-car-info__desc-dt">FUEL</dt>
                            <dd class="b-car-info__desc-dd">hybird</dd>
                            <dt class="b-car-info__desc-dt">colors</dt>
                            <dd class="b-car-info__desc-dd">brown, Black</dd>
                            <dt class="b-car-info__desc-dt">DRIVE TRAIN</dt>
                            <dd class="b-car-info__desc-dd">4x2</dd>
                            <dt class="b-car-info__desc-dt">STOCK #</dt>
                            <dd class="b-car-info__desc-dd">CXH207</dd>
                        </dl>
                        <div class="b-car-info__item"><span class="b-car-info__item-name"><i class="icon flaticon-fuel"></i> Economy</span>
                            <div class="b-car-info__item-inner"><span class="b-car-info__item-info"><span class="b-car-info__item-info_lg">16</span><span class="b-car-info__item-info_sm"> CITY</span></span><span class="b-car-info__item-info"><span class="b-car-info__item-info_lg">24</span>
                                    <span class="b-car-info__item-info_sm">HWY</span>
                                </span>
                            </div>
                        </div>
                        <div class="b-car-info__item"><span class="b-car-info__item-name"><i class="icon flaticon-car"></i> Vehicle Demand</span>
                            <div class="b-car-info__item-inner"><span class="b-car-info__item-info">HIGH</span>
                            </div>
                        </div>
                        <div class="b-bnr-2">
                            <div class="b-bnr-2__icon flaticon-smartphone"></div>
                            <div class="b-bnr-2__inner">
                                <div class="b-bnr-2__title">Call Dealer</div>
                                <div class="b-bnr-2__info">1-820-431-5815</div>
                            </div>
                        </div>
                        <!-- end .b-banner-->
                        <form class="b-calculator">
                            <div class="b-calculator__header"><i class="icon flaticon-calculator text-primary"></i>
                                <div class="b-calculator__header-inner">
                                    <div class="b-calculator__name">Finance Calculator</div>
                                    <div class="b-calculator__info">Calculate The Car Financing</div>
                                </div>
                            </div>
                            <div class="b-calculator__group">
                                <div class="b-calculator__label">VEHICLE PRICE ($)</div>
                                <input class="b-calculator__input form-control" type="text" placeholder="$28.600" />
                            </div>
                            <div class="b-calculator__group">
                                <div class="b-calculator__label">INTEREST RATE (%)</div>
                                <input class="b-calculator__input form-control" type="text" placeholder="10%" />
                            </div>
                            <div class="b-calculator__group">
                                <div class="b-calculator__label">period in months</div>
                                <input class="b-calculator__input form-control" type="text" placeholder="15 Months" />
                            </div>
                            <div class="b-calculator__group">
                                <div class="b-calculator__label">down payment</div>
                                <input class="b-calculator__input form-control" type="text" placeholder="$5,000" />
                            </div>
                            <button class="btn btn-dark">Cauculate</button>
                        </form>
                        <!-- end .b-calculator-->
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- end .b-car-details-->
    <section class="section-default_top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="ui-title-block">Related Cars</h2>
                    <div class="ui-decor"></div>
                    <div class="related-carousel owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel" data-min768="2" data-min992="3" data-min1200="3" data-margin="30" data-pagination="false" data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
                        <div class="b-goods-feat">
                            <div class="b-goods-feat__img">
                                <img class="img-responsive" src="assets/media/components/b-goods/featured-1.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                            </div>
                            <ul class="b-goods-feat__desc list-unstyled">
                                <li class="b-goods-feat__desc-item">35,000 mi</li>
                                <li class="b-goods-feat__desc-item">Model: 2017</li>
                                <li class="b-goods-feat__desc-item">Auto</li>
                                <li class="b-goods-feat__desc-item">320 hp</li>
                            </ul>
                            <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                            <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
                        </div>
                        <!-- end .b-goods-featured-->
                        <div class="b-goods-feat">
                            <div class="b-goods-feat__img">
                                <img class="img-responsive" src="assets/media/components/b-goods/featured-2.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                            </div>
                            <ul class="b-goods-feat__desc list-unstyled">
                                <li class="b-goods-feat__desc-item">35,000 mi</li>
                                <li class="b-goods-feat__desc-item">Model: 2017</li>
                                <li class="b-goods-feat__desc-item">Auto</li>
                                <li class="b-goods-feat__desc-item">320 hp</li>
                            </ul>
                            <h3 class="b-goods-feat__name"><a href="car-details.html">Toyota Avalon TX</a></h3>
                            <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
                        </div>
                        <!-- end .b-goods-featured-->
                        <div class="b-goods-feat">
                            <div class="b-goods-feat__img">
                                <img class="img-responsive" src="assets/media/components/b-goods/featured-3.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                            </div>
                            <ul class="b-goods-feat__desc list-unstyled">
                                <li class="b-goods-feat__desc-item">35,000 mi</li>
                                <li class="b-goods-feat__desc-item">Model: 2017</li>
                                <li class="b-goods-feat__desc-item">Auto</li>
                                <li class="b-goods-feat__desc-item">320 hp</li>
                            </ul>
                            <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                            <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
                        </div>
                        <!-- end .b-goods-featured-->
                        <div class="b-goods-feat">
                            <div class="b-goods-feat__img">
                                <img class="img-responsive" src="assets/media/components/b-goods/featured-4.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                            </div>
                            <ul class="b-goods-feat__desc list-unstyled">
                                <li class="b-goods-feat__desc-item">35,000 mi</li>
                                <li class="b-goods-feat__desc-item">Model: 2017</li>
                                <li class="b-goods-feat__desc-item">Auto</li>
                                <li class="b-goods-feat__desc-item">320 hp</li>
                            </ul>
                            <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                            <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
                        </div>
                        <!-- end .b-goods-featured-->
                        <div class="b-goods-feat">
                            <div class="b-goods-feat__img">
                                <img class="img-responsive" src="assets/media/components/b-goods/featured-5.jpg" alt="foto" /><span class="b-goods-feat__label">$45,000<span class="b-goods-feat__label_msrp">MSRP $27,000</span></span>
                            </div>
                            <ul class="b-goods-feat__desc list-unstyled">
                                <li class="b-goods-feat__desc-item">35,000 mi</li>
                                <li class="b-goods-feat__desc-item">Model: 2017</li>
                                <li class="b-goods-feat__desc-item">Auto</li>
                                <li class="b-goods-feat__desc-item">320 hp</li>
                            </ul>
                            <h3 class="b-goods-feat__name"><a href="car-details.html">Lexus GX 490i Hybird</a></h3>
                            <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur excepteur ipsum.</div>
                        </div>
                        <!-- end .b-goods-featured-->
                    </div>
                    <!-- end .related-carousel-->
                </div>
            </div>
        </div>
    </section>
    <!-- end .section-default_top-->
</main>