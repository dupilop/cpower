<?php
require 'db/connect.php';
?>

<div id="user_data">

</div>
<div class="section-title-page area-bg area-bg_dark area-bg_op_70">
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="b-title-page bg-primary_a">Products</h1>
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
                    <li class="active">Products</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb-->
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-push-3">
            <main class="l-main-content">
                <div class="filter-goods">
                    <div class="filter-goods__info">Showing results from<strong> 1 - 10</strong> of total<strong> 35</strong>
                    </div>
                    <div class="filter-goods__select"><span class="hidden-xs">Sort</span>
                        <select class="selectpicker" data-width="172">
                            <option>Most Revelant</option>
                            <option>A-Z</option>
                            <option>Z-A</option>
                        </select>
                        <div class="btns-switch"><i class="btns-switch__item js-view-th active icon fa fa-th-large"></i><i class="btns-switch__item js-view-list icon fa fa-th-list"></i>
                        </div>
                    </div>
                </div>
                <!-- end .filter-goods-->
                <div class="goods-group-2 list-goods list-goods_th">
                    <?php
                    $abc = $pdo->prepare("SELECT * FROM products");
                    $abc->execute();
                    $rcabc2 = $abc->rowCount();
                    if ($rcabc2 > 0) {
                        foreach ($abc as $abc2)
                            echo '<section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img imagecss" >
                                    <a href="productsingle?p_id=' . $abc2['p_id'] . '">
                                        <img class="img-responsive" src="./assets/images/inventory/' . $abc2['p_image1'] . '" alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">Rs.' . $abc2['p_price'] . '</span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                        <h2 class="b-goods-1__name"><a href="productsingle?p_id=' . $abc2['p_id'] . '">' . $abc2['p_name'] . '</a></h2>
                                    </div>
                                    <div class="b-goods-1__info">' . strip_tags($abc2['p_desc']) . '
                                        
                                    </div><span class="b-goods-1__price_th text-primary visible-th">Rs. ' . $abc2['p_price'] . '<a class="b-goods-1__choose" href="listing-1.html"><i class="icon fa fa-heart-o"></i></a>
                                    </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-1">Highlights</h3>
                                        <div class="collapse in" id="desc-1">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">Size: ' . $abc2['p_size'] . '</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span> 2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-1">specifications</h3>
                                        <div class="collapse in" id="list-1">
                                            ' . strip_tags($abc2['p_specification']) . '
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>';
                    }
                    ?>

                    <!-- end .b-goods-1-->
                </div>
                <!-- end .goods-group-2-->
            </main>
            <!-- end .l-main-content-->
        </div>
        <div class="col-md-3 col-md-pull-9">
            <aside class="l-sidebar">
                <form class="b-filter-2 bg-grey">
                    <h3 class="b-filter-2__title">search options</h3>
                    <div class="b-filter-2__inner">
                        <div class="b-filter-2__group">
                            <div class="b-filter-2__group-title">keyword</div>
                            <input class="form-control" type="text" placeholder="Keyword..." />
                        </div>
                        <div class="b-filter-2__group">
                            <div class="b-filter-2__group-title">Vehicle Type</div>
                            <select class="selectpicker" data-width="100%">
                                <option>All Types</option>
                                <option>Type 1</option>
                                <option>Type 2</option>
                                <option>Type 3</option>
                            </select>
                        </div>
                        <div class="b-filter-2__group">
                            <div class="b-filter-2__group-title">Make</div>
                            <select class="selectpicker" data-width="100%">
                                <option>All Makes</option>
                                <option>Make 1</option>
                                <option>Make 2</option>
                            </select>
                        </div>
                        <div class="b-filter-2__group">
                            <div class="b-filter-2__group-title">Model</div>
                            <select class="selectpicker" data-width="100%">
                                <option>All Models</option>
                                <option>Model 1</option>
                                <option>Model 2</option>
                                <option>Model 3</option>
                            </select>
                        </div>
                        <div class="b-filter-2__group">
                            <div class="b-filter-2__group-title">Model Year</div>
                            <select class="selectpicker" data-width="100%">
                                <option>Min Year</option>
                                <option>Year 1</option>
                                <option>Year 2</option>
                            </select>
                            <select class="selectpicker" data-width="100%">
                                <option>Max Year</option>
                                <option>Year 1</option>
                                <option>Year 2</option>
                            </select>
                        </div>
                        <div class="b-filter-2__group">
                            <div class="b-filter-2__group-title">fuel type</div>
                            <select class="selectpicker" data-width="100%">
                                <option>All Fuel Types</option>
                                <option>Type 1</option>
                                <option>Type 2</option>
                                <option>Type 3</option>
                            </select>
                        </div>
                        <div class="b-filter-2__group">
                            <div class="b-filter-2__group-title">Filter Price</div>
                            <div class="ui-filter-slider">
                                <div id="slider-price"></div>
                                <div class="ui-filter-slider__info">
                                    <div class="ui-filter-slider__label">Price Range:</div><span class="ui-filter-slider__current" id="slider-snap-value-lower"></span>-<span class="ui-filter-slider__current" id="slider-snap-value-upper"></span>
                                </div>
                            </div>
                        </div>
                        <div class="b-filter-2__group">
                            <div class="b-filter-2__group-title">Body style</div>
                            <div class="b-filter-type-2">
                                <div class="b-filter-type-2__item">
                                    <input class="b-filter-type-2__input" id="typePickup" type="checkbox" />
                                    <label class="b-filter-type-2__label" for="typePickup"><i class="b-filter-type-2__icon flaticon-pick-up"></i><span class="b-filter-type-2__title">PICKUP</span>
                                    </label>
                                </div>
                                <div class="b-filter-type-2__item">
                                    <input class="b-filter-type-2__input" id="typeSuv" type="checkbox" />
                                    <label class="b-filter-type-2__label" for="typeSuv"><i class="b-filter-type-2__icon flaticon-car-of-hatchback-model"></i><span class="b-filter-type-2__title">SUV</span>
                                    </label>
                                </div>
                                <div class="b-filter-type-2__item">
                                    <input class="b-filter-type-2__input" id="typeCoupe" type="checkbox" />
                                    <label class="b-filter-type-2__label" for="typeCoupe"><i class="b-filter-type-2__icon flaticon-coupe-car"></i><span class="b-filter-type-2__title">coupe</span>
                                    </label>
                                </div>
                                <div class="b-filter-type-2__item">
                                    <input class="b-filter-type-2__input" id="typeConvertible" type="checkbox" checked="checked" />
                                    <label class="b-filter-type-2__label" for="typeConvertible"><i class="b-filter-type-2__icon flaticon-cabrio-car"></i><span class="b-filter-type-2__title">CONVERTIBLE</span>
                                    </label>
                                </div>
                                <div class="b-filter-type-2__item">
                                    <input class="b-filter-type-2__input" id="typeSedan" type="checkbox" />
                                    <label class="b-filter-type-2__label" for="typeSedan"><i class="b-filter-type-2__icon flaticon-sedan-car-model"></i><span class="b-filter-type-2__title">sedan</span>
                                    </label>
                                </div>
                                <div class="b-filter-type-2__item">
                                    <input class="b-filter-type-2__input" id="typeMinicar" type="checkbox" />
                                    <label class="b-filter-type-2__label" for="typeMinicar"><i class="b-filter-type-2__icon flaticon-car-1"></i><span class="b-filter-type-2__title">MINICAR</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="b-filter-2__group">
                            <div class="b-filter-2__group-title">TRANSMISSION</div>
                            <div class="checkbox-group">
                                <input class="forms__check hidden" id="check-1" type="checkbox" />
                                <label class="forms__label forms__label-check forms__label-check-1" for="check-1">4 Speed Automatic</label>
                                <input class="forms__check hidden" id="check-2" type="checkbox" />
                                <label class="forms__label forms__label-check forms__label-check-1" for="check-2">4 Speed Manual</label>
                                <input class="forms__check hidden" id="check-3" type="checkbox" checked="checked" />
                                <label class="forms__label forms__label-check forms__label-check-1" for="check-3">5 Speed Automatic</label>
                                <input class="forms__check hidden" id="check-4" type="checkbox" />
                                <label class="forms__label forms__label-check forms__label-check-1" for="check-4">5 Speed Manual</label>
                                <input class="forms__check hidden" id="check-5" type="checkbox" checked="checked" />
                                <label class="forms__label forms__label-check forms__label-check-1" for="check-5">6-Speed Semi-Auto</label>
                                <input class="forms__check hidden" id="check-6" type="checkbox" />
                                <label class="forms__label forms__label-check forms__label-check-1" for="check-6">6-Speed Manual</label>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end .b-filter-->
            </aside>
            <!-- end .l-sidebar-->
        </div>
    </div>
</div>
<script type="text/javascript">
    load_data();

    function load_data() {
        $("#user_data").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $.ajax({
            url: "../ajax_controller/products_controller.php",
            method: "POST",
            data: {
                action: "view"
            },
            success: function(data) {
                $('#user_data').html(data);
            }
        });
    }
    $(document).on("click", ".delete", function(e) {
        var id = $(this).attr('id');
        e.preventDefault();
        pb.confirm(
            function(outcome) {
                if (outcome) {
                    $.ajax({
                        type: "GET",
                        url: "../ajax_controller/products_controller.php?p_id=" + id + "&&action=delete",
                        data: {
                            id: id,
                            action: 'delete'
                        },
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $().msgpopup({
                                text: 'Deleted Successfully',
                                type: 'error'
                            });
                            load_data();



                        }
                    });
                }

            },
            '<h4 class="text text-danger">Are you sure you want to delete?</h4>',
            'Yes',
            'No'
        );
    });
    $(document).on("click", ".pavailable", function() {
        var pid = $(this).attr("id");
        var vall = $(this).attr("value");
        $.ajax({
            url: "../ajax_controller/products_controller.php",
            method: "POST",
            data: {
                p_id: pid,
                p_available: vall,
                action: "eavailable"
            },
            success: function(data) {
                load_data();
            }
        });
    });
    $(document).on("click", "#addrestro", function() {
        window.location.href = './addproduct'
    });
</script>