<?php include 'header.php';

$property = require '../PHP/properties/property.php';


$properties = $property->getAllProperties();
$cities = $property->getAllCitiesFromProperties();



?>

<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">List Layout With Sidebar</h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row">

            <div class="col-md-3 p0 padding-top-40">
                <div class="blog-asside-right pr0">
                    <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Smart search</h3>
                        </div>
                        <div class="panel-body search-widget">
                            <form action="" class=" form-inline">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="text" class="form-control" placeholder="Key word" id="keyword">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-6">

                                            <select id="lunchBegins" class="selectpicker" data-live-search="true"
                                                data-live-search-style="begins" title="Select Your City">
                                                <?php
                                                foreach ($cities as $city) {
                                                    echo "<option>" . $city['Property_City'] . "</option>";
                                                }

                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-xs-6">

                                            <select id="basic" class="selectpicker show-tick form-control">
                                                <option> -Status- </option>
                                                <option>Rent </option>
                                                <option>Boy</option>
                                                <option>used</option>

                                            </select>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="padding-5">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label for="price-range">Price range (€):</label>
                                            <input type="text" class="span2" value="" data-slider-min="100"
                                                data-slider-max="1000" data-slider-step="10"
                                                data-slider-value="[100,500]" id="price-range"><br />
                                            <b class="pull-left color">100€</b>
                                            <b class="pull-right color">1000€</b>
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="property-geo">Property size (m2) :</label>
                                            <input type="text" class="span2" value="" data-slider-min="40"
                                                data-slider-max="500" data-slider-step="10" data-slider-value="[40,300]"
                                                id="property-geo"><br />
                                            <b class="pull-left color">40m²</b>
                                            <b class="pull-right color">500m²</b>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="padding-5">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <label for="price-range">Min baths :</label>
                                            <input type="text" class="span2" value="" data-slider-min="0"
                                                data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]"
                                                id="min-baths"><br />
                                            <b class="pull-left color">1</b>
                                            <b class="pull-right color">120</b>
                                        </div>


                                        <div class="col-xs-6">
                                            <label for="property-geo">Min bed :</label>
                                            <input type="text" class="span2" value="" data-slider-min="0"
                                                data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]"
                                                id="min-bed"><br />
                                            <b class="pull-left color">1</b>
                                            <b class="pull-right color">120</b>

                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input class="button btn largesearch-btn" value="Search" type="submit">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Recommended</h3>
                        </div>
                        <div class="panel-body recent-property-widget">
                            <ul>
                                <li>
                                    <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                        <a href="single.html"><img src="assets/img/demo/small-property-2.jpg"></a>
                                        <span class="property-seeker">
                                            <b class="b-1">A</b>
                                            <b class="b-2">S</b>
                                        </span>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                        <h6> <a href="single.html">Super nice villa </a></h6>
                                        <span class="property-price">3000000$</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9  pr0 padding-top-40 properties-page">
                <div class="col-md-12 clear">
                    <div class="col-xs-10 page-subheader sorting pl0">
                        <ul class="sort-by-list">
                            <li class="active">
                                <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date"
                                    data-order="ASC">
                                    Property Date <i class="fa fa-sort-amount-asc"></i>
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price"
                                    data-order="DESC">
                                    Property Price <i class="fa fa-sort-numeric-desc"></i>
                                </a>
                            </li>
                        </ul><!--/ .sort-by-list-->

                        <div class="items-per-page">
                            <label for="items_per_page"><b>Property per page :</b></label>
                            <div class="sel">
                                <select id="items_per_page" name="per_page">
                                    <option value="3">3</option>
                                    <option value="6">6</option>
                                    <option value="9">9</option>
                                    <option selected="selected" value="12">12</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                </select>
                            </div><!--/ .sel-->
                        </div><!--/ .items-per-page-->
                    </div>

                    <div class="col-xs-2 layout-switcher">
                        <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i> </a>
                        <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                    </div><!--/ .layout-switcher-->
                </div>

                <div class="col-md-12 clear" id="theDiv">
                    <div id="list-type" class="proerty-th">
                        <?php // make a for each of all properties 
                        foreach ($properties as $prope) {
                            $property_name = $prope['Property_Number'] . " " . $prope['Property_Type'];
                            $property_size = $prope['Size'];
                            $property_rent = $prope['RentAmount'];
                            $property_img = $prope['Property_Cover'];
                            $property_city = $prope['Property_City'];
                            $property_address = $prope['Property_Address'];
                            $property_id = $prope['Property_ID'];
                            ?>
                            <div class="col-sm-6 col-md-4 p0">
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="property.php?id=<?= $property_id ?>"><img
                                                src="../uploads/property/<?= $property_img ?>"></a>
                                    </div>

                                    <div class="item-entry overflow">
                                        <h5><a href="property.php?id=<?= $property_id ?>">
                                                <?php echo $property_name . " " . $property_city ?>
                                            </a></h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left"><b> Area :</b>
                                            <?= $property_size ?> m2
                                        </span>
                                        <span class="proerty-price pull-right"> $
                                            <?= $property_rent ?>
                                        </span>
                                        <p style="display: none;">Suspendisse ultricies Suspendisse ultricies Nulla quis
                                            dapibus nisl. Suspendisse ultricies commodo arcu nec pretium ...</p>
                                        <div class="property-icon">
                                            <img src="assets/img/icon/bed.png">(5)|
                                            <img src="assets/img/icon/shawer.png">(2)|
                                            <img src="assets/img/icon/cars.png">(1)
                                        </div>
                                    </div>


                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="pull-right">
                        <div class="pagination">
                            <ul>
                                <li><a href="#">Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function () {

                    // create ajax function that takes #keyword as value and sends to search.php
                    $("#keyword").keyup(function () {
                        var keyword = $("#keyword").val();
                        $.ajax({
                            url: "../PHP/properties/search.php",
                            method: "POST",
                            data: { keyword: keyword },
                            success: function (data) {
                                $("#theDiv").html(data);
                                if (keyword == "") {
                                    $("#list-type").show;
                                }
                                $("#list-type").hide;
                            }
                        });
                    });

                    // Initialize the slider
                    $('#price-range').slider();

                    // Add an event listener for the slide event
                    $('#price-range').on('slide', function (event) {

                        var values = event.value;

                        // ajax function

                        $.ajax({
                            url: "../PHP/properties/search.php",
                            method: "POST",
                            data: { rentValue: values },
                            success: function (data) {
                                $("#theDiv").html(data);
                                if (keyword == "") {
                                    $("#list-type").show;
                                }
                                $("#list-type").hide;
                            }
                        });
                    });
                });

            </script>
        </div>
    </div>
</div>

<!-- Footer area-->
<?php include 'footer.php' ?>