<?php include 'header.php';


$con = require "../PHP/database.php";




$property = require '../PHP/properties/property.php';


$properties = $property->getAllProperties();
$cities = $property->getAllCitiesFromProperties();
$recentProperties = $property->getRecentProperies();

?>

<div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">

            <div class="item"><img src="assets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>
            <div class="item"><img src="assets/img/slide1/slider-image-2.jpg" alt="The Last of us"></div>
            <div class="item"><img src="assets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>

        </div>
    </div>
    <div class="slider-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                <h2>property Searching Just Got So Easy</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi
                    sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!</p>
                <div class="search-form wow pulse" data-wow-delay="0.8s">

                    <form action="filterdProperties.php" method="POST" class=" form-inline">
                        <button class="btn  toggle-btn" type="button"><i class="fa fa-bars"></i></button>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" placeholder="Key word" id="keyword"
                                    name="keyword">
                            </div>
                        </div>
                        <div class="form-group">
                            <select id="lunchBegins" class="selectpicker" data-live-search="true"
                                data-live-search-style="begins" title="Select Your City" name="city">
                                <?php
                                foreach ($cities as $city) {
                                    $propertyCity = $city['Property_City'];
                                    echo "<option value='$propertyCity '>" . $city['Property_City'] . "</option>";
                                }

                                ?>

                            </select>
                        </div>
                        <button class="btn search-btn" type="submit" name="theSubmit"><i
                                class="fa fa-search"></i></button>

                        <div style="display: none;" class="search-toggle">

                            <div class="search-row">

                                <div class="form-group mar-r-20">
                                    <input type="hidden" name="minPrice" id="min-price" value="">
                                    <input type="hidden" name="maxPrice" id="max-price" value="">

                                    <label for="price-range">Price range (€):</label>
                                    <input type="text" class="span2" value="" data-slider-min="100"
                                        data-slider-max="1000" data-slider-step="10" data-slider-value="[100,500]"
                                        id="price-range"><br />
                                    <b class="pull-left color">100€</b>
                                    <b class="pull-right color">1000€</b>
                                </div>
                                <!-- End of  -->

                                <div class="form-group mar-l-20">
                                    <input type="hidden" name="minSize" id="min-size" value="">
                                    <input type="hidden" name="maxSize" id="max-size" value="">
                                    <label for="property-geo">Property size (m2) :</label>
                                    <input type="text" class="span2" value="" data-slider-min="40" data-slider-max="500"
                                        data-slider-step="10" data-slider-value="[40,300]" id="property-geo"><br />
                                    <b class="pull-left color">40m²</b>
                                    <b class="pull-right color">500m²</b>
                                </div>
                                <!-- End of  -->
                            </div>
                            <br>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- property area -->
<div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                <!-- /.feature title -->
                <h2>Top submitted property</h2>
                <p>Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies .
                </p>
            </div>
        </div>

        <div class="row">
            <div class="proerty-th">
                <?php
                foreach ($properties as $row) {
                    $id = $row['Property_ID'];
                    $number = $row['Property_Number'];
                    $type = $row['Property_Type'];
                    $img = $row['Property_Cover'];
                    $rent = $row['RentAmount'];
                    $text = $number . " " . $type;
                    echo "
                    <form action='' method='POST'>
                    <div class='col-sm-6 col-md-3 p0'>
                            <div class='box-two proerty-item'>
                                <div class='item-thumb'>
                                    <a href='property.php?id=$id'><img src='../uploads/property/$img'></a>
                                </div>
                                <div class='item-entry overflow'>
                                    <h5><a href='property.php?id=$id'>$text</a></h5>
                                    <div class='dot-hr'></div>
                                    <span class='pull-left'><b>Area :</b> 50m  </span>
                                    <span class='proerty-price pull-right'>$rent €</span>
                                </div>
                            </div>
                        </div> 
                    </form>";
                }
                ?>




                <div class="col-sm-6 col-md-3 p0">
                    <div class="box-tree more-proerty text-center">
                        <div class="item-tree-icon">
                            <i class="fa fa-th"></i>
                        </div>
                        <div class="more-entry overflow">
                            <h5><a href="properties.php">CAN'T DECIDE ? </a></h5>
                            <h5 class="tree-sub-ttl">Show all properties</h5>
                            <button class="btn border-btn more-black" value="All properties">All properties</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!--Welcome area -->
<div class="Welcome-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 Welcome-entry  col-sm-12">
                <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                    <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                <!-- /.feature title -->
                                <h2>GARO ESTATE </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="welcome_services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
                        <div class="row">
                            <div class="col-xs-6 m-padding">
                                <div class="welcome-estate">
                                    <div class="welcome-icon">
                                        <i class="pe-7s-home pe-4x"></i>
                                    </div>
                                    <h3>Any property</h3>
                                </div>
                            </div>
                            <div class="col-xs-6 m-padding">
                                <div class="welcome-estate">
                                    <div class="welcome-icon">
                                        <i class="pe-7s-users pe-4x"></i>
                                    </div>
                                    <h3>More Clients</h3>
                                </div>
                            </div>


                            <div class="col-xs-12 text-center">
                                <i class="welcome-circle"></i>
                            </div>

                            <div class="col-xs-6 m-padding">
                                <div class="welcome-estate">
                                    <div class="welcome-icon">
                                        <i class="pe-7s-notebook pe-4x"></i>
                                    </div>
                                    <h3>Easy to use</h3>
                                </div>
                            </div>
                            <div class="col-xs-6 m-padding">
                                <div class="welcome-estate">
                                    <div class="welcome-icon">
                                        <i class="pe-7s-help2 pe-4x"></i>
                                    </div>
                                    <h3>Any help </h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--TESTIMONIALS -->
<div class="testimonial-area recent-property" style="background-color: #FCFCFC; padding-bottom: 15px;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                <!-- /.feature title -->
                <h2>Our Customers Said </h2>
            </div>
        </div>

        <div class="row">
            <div class="row testimonial">
                <div class="col-md-12">
                    <div id="testimonial-slider">
                        <div class="item">
                            <div class="client-text">
                                <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                            </div>
                            <div class="client-face wow fadeInRight" data-wow-delay=".9s">
                                <img src="assets/img/client-face1.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-text">
                                <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                            </div>
                            <div class="client-face">
                                <img src="assets/img/client-face2.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-text">
                                <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                            </div>
                            <div class="client-face">
                                <img src="assets/img/client-face1.png" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="client-text">
                                <p>Nulla quis dapibus nisl. Suspendisse llam sed arcu ultried arcu ultricies !</p>
                                <h4><strong>Ohidul Islam, </strong><i>Web Designer</i></h4>
                            </div>
                            <div class="client-face">
                                <img src="assets/img/client-face2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Count area -->
<div class="count-area">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                <!-- /.feature title -->
                <h2>You can trust Us </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="count-item">
                            <div class="count-item-circle">
                                <span class="pe-7s-users"></span>
                            </div>
                            <div class="chart" data-percent="5000">
                                <h2 class="percent" id="counter">0</h2>
                                <h5>HAPPY CUSTOMER </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="count-item">
                            <div class="count-item-circle">
                                <span class="pe-7s-home"></span>
                            </div>
                            <div class="chart" data-percent="12000">
                                <h2 class="percent" id="counter1">0</h2>
                                <h5>Properties in stock</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="count-item">
                            <div class="count-item-circle">
                                <span class="pe-7s-flag"></span>
                            </div>
                            <div class="chart" data-percent="120">
                                <h2 class="percent" id="counter2">0</h2>
                                <h5>City registered </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="count-item">
                            <div class="count-item-circle">
                                <span class="pe-7s-graph2"></span>
                            </div>
                            <div class="chart" data-percent="5000">
                                <h2 class="percent" id="counter3">5000</h2>
                                <h5>DEALER BRANCHES</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- boy-sale area -->
<div class="boy-sale-area">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                <div class="asks-first">
                    <div class="asks-first-circle">
                        <span class="fa fa-search"></span>
                    </div>
                    <div class="asks-first-info">
                        <h2>ARE YOU LOOKING FOR A Property?</h2>
                        <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>
                    </div>
                    <div class="asks-first-arrow">
                        <a href="properties.php"><span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                <div class="asks-first">
                    <div class="asks-first-circle">
                        <span class="fa fa-usd"></span>
                    </div>
                    <div class="asks-first-info">
                        <h2>DO YOU WANT TO SELL A Property?</h2>
                        <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>
                    </div>
                    <div class="asks-first-arrow">
                        <a href="../dashboardTemplate/html/login.php"><span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <p class="asks-call">QUESTIONS? CALL US : <span class="strong">+383 44 000 000</span></p>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        // create ajax function that takes #keyword as value and sends to search.php

        // Initialize the slider
        $('#price-range').slider();

        // Add an event listener for the slide event
        $('#price-range').on('slide', function (event) {

            var values = event.value;

            $("#min-price").val(values[0]);
            $("#max-price").val(values[1]);



        });
        $('#property-geo').slider();

        // Add an event listener for the slide event
        $('#property-geo').on('slide', function (event) {

            var values = event.value;

            $("#min-size").val(values[0]);
            $("#max-size").val(values[1]);
        });
    });


</script>

<?php include 'footer.php' ?>