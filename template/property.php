<?php include 'header.php';
include '../PHP/database.php';

$id = $_GET['id'];

$query = "SELECT * FROM property WHERE Property_ID = '$id'";

$result = $con->query($query);

$row = $result->fetch_assoc();

$property_id = $row['Property_ID'];
$property_type = $row['Property_Type'];
$property_rent = $row['RentAmount'];
$property_address = $row['Property_Address'];
$property_city = $row['Property_City'];
$property_Number = $row['Property_Number'];
$rooms = $row['Rooms'];
$bathrooms = $row['Bathrooms'];
$size = $row['Size'];
$kitchen = $row['Kitchen'];
$property_cover = $row['Property_Cover'];
$propert_img2 = $row['Property_img_2'];
$propert_img3 = $row['Property_img_3'];
$propert_img4 = $row['Property_img_4'];
$propert_img5 = $row['Property_img_5'];

$owner = $row['Property_Owner'];

$query2 = "SELECT * FROM owner WHERE Owner_ID = '$owner'";

$result2 = $con->query($query2);

$row2 = $result2->fetch_assoc();

$owner_name = $row2['Owner_FirstName'] . " " . $row2['Owner_LastName'];
$owner_address = $row2['Owner_City'];
$owner_number = $row2['Owner_Number'];
$owner_email = $row2['Owner_Email'];
$owner_img = $row2['Owner_img'];


$con->close();

$property = require '../PHP/properties/property.php';
$recentProperties = $property->getRecentProperies();
$cities = $property->getAllCitiesFromProperties();




?>



<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="<?php echo $property_type . $property_Number ?>"></h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">

        <div class="clearfix padding-top-40">

            <div class="col-md-8 single-property-content prp-style-1 ">
                <div class="row">
                    <div class="light-slide-item">
                        <div class="clearfix">
                            <div class="favorite-and-print">
                                <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                    <i class="fa fa-star-o"></i>
                                </a>
                                <a class="printer-icon " href="javascript:window.print()">
                                    <i class="fa fa-print"></i>
                                </a>
                            </div>

                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                <li data-thumb="../uploads/property/<?= $property_cover ?>">
                                    <img src="../uploads/property/<?= $property_cover ?>" />
                                </li>
                                <li data-thumb="../uploads/property/<?= $propert_img2 ?>">
                                    <img src="../uploads/property/<?= $propert_img2 ?>" />
                                </li>
                                <li data-thumb="../uploads/property/<?= $propert_img3 ?>">
                                    <img src="../uploads/property/<?= $propert_img3 ?>" />
                                </li>
                                <li data-thumb="../uploads/property/<?= $propert_img4 ?>">
                                    <img src="../uploads/property/<?= $propert_img4 ?>" />
                                </li>
                                <li data-thumb="../uploads/property/<?= $propert_img5 ?>">
                                    <img src="../uploads/property/<?= $propert_img5 ?>" />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="single-property-wrapper">
                    <div class="single-property-header">
                        <h1 class="property-title pull-left">
                            <?php echo $property_type . " " . $property_Number ?>
                        </h1>
                        <span class="property-price pull-right">
                            <?= $property_rent ?>€
                        </span>
                    </div>

                    <div class="property-meta entry-meta clearfix ">

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-tag">
                                <img src="assets/img/icon/sale-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Status</span>
                                <span class="property-info-value">For Rent</span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info icon-area">
                                <img src="assets/img/icon/room-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Area</span>
                                <span class="property-info-value">
                                    <?= $size ?><b class="property-info-unit">m²</b>
                                </span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-bed">
                                <img src="assets/img/icon/bed-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Bedrooms</span>
                                <span class="property-info-value">3</span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-bed">
                                <img src="assets/img/icon/cars-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Car garages</span>
                                <span class="property-info-value">1</span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-bath">
                                <img src="assets/img/icon/os-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Bathrooms</span>
                                <span class="property-info-value">3.5</span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-garage">
                                <img src="assets/img/icon/room-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Garages</span>
                                <span class="property-info-value">2</span>
                            </span>
                        </div>

                        <div class="col-xs-6 col-sm-3 col-md-3 p-b-15">
                            <span class="property-info-icon icon-garage">
                                <img src="assets/img/icon/shawer-orange.png">
                            </span>
                            <span class="property-info-entry">
                                <span class="property-info-label">Garages</span>
                                <span class="property-info-value">2</span>
                            </span>
                        </div>


                    </div>
                    <!-- .property-meta -->

                    <div class="section">
                        <h4 class="s-property-title">Description</h4>
                        <div class="s-property-content">
                            <p>Nulla quis dapibus nisl. Suspendisse ultricies Nulla quis dapibus nisl. Suspendisse
                                ultricies commodo arcu nec pretium. Nullam sed arcu ultricies commodo arcu nec pretium.
                                Nullam sed arcu ultricies Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu
                                nec pretium. Nullam sed arcu ultricies Nulla quis dapibus nisl. Suspendisse ultricies
                                commodo arcu nec pretium. Nullam sed arcu ultricies </p>
                        </div>
                    </div>
                    <!-- End description area  -->


                    <!-- End additional-details area  -->

                    <!-- End features area  -->

                    <div class="section property-video">
                        <h4 class="s-property-title">Property Video</h4>
                        <div class="video-thumb">
                            <a class="video-popup" href="yout" title="Virtual Tour">
                                <img src="assets/img/property-video.jpg" class="img-responsive wp-post-image"
                                    alt="Exterior">
                            </a>
                        </div>
                    </div>
                    <!-- End video area  -->



                    <div class="section property-share">
                        <h4 class="s-property-title">Share width your friends </h4>
                        <div class="roperty-social">
                            <ul>
                                <li><a title="Share this on dribbble " href="#"><img
                                            src="assets/img/social_big/dribbble_grey.png"></a></li>
                                <li><a title="Share this on facebok " href="#"><img
                                            src="assets/img/social_big/facebook_grey.png"></a></li>
                                <li><a title="Share this on delicious " href="#"><img
                                            src="assets/img/social_big/delicious_grey.png"></a></li>
                                <li><a title="Share this on tumblr " href="#"><img
                                            src="assets/img/social_big/tumblr_grey.png"></a></li>
                                <li><a title="Share this on digg " href="#"><img
                                            src="assets/img/social_big/digg_grey.png"></a></li>
                                <li><a title="Share this on twitter " href="#"><img
                                            src="assets/img/social_big/twitter_grey.png"></a></li>
                                <li><a title="Share this on linkedin " href="#"><img
                                            src="assets/img/social_big/linkedin_grey.png"></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End video area  -->

                </div>
            </div>


            <div class="col-md-4 p0">
                <aside class="sidebar sidebar-property blog-asside-right">
                    <div class="dealer-widget">
                        <div class="dealer-content">
                            <div class="inner-wrapper">

                                <div class="clear">
                                    <div class="col-xs-4 col-sm-4 dealer-face">
                                        <a href="">
                                            <img src="../uploads/landlord/<?= $owner_img ?>" class="img-circle">
                                        </a>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 ">
                                        <h3 class="dealer-name">
                                            <a href="">
                                                <?= $owner_name ?>
                                            </a>
                                            <span>The Owner</span>
                                        </h3>
                                        <div class="dealer-social-media">
                                            <a class="twitter" target="_blank" href="">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a class="facebook" target="_blank" href="">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a class="gplus" target="_blank" href="">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a class="linkedin" target="_blank" href="">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a class="instagram" target="_blank" href="">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                                <div class="clear">
                                    <ul class="dealer-contacts">
                                        <li><i class="pe-7s-map-marker strong"> </i>
                                            <?= $owner_address ?>
                                        </li>
                                        <li><i class="pe-7s-mail strong"> </i>
                                            <?= $owner_email ?>
                                        </li>
                                        <li><i class="pe-7s-call strong"> </i>
                                            <?= $owner_number ?>
                                        </li>
                                    </ul>
                                    <p>Duis mollis blandit tempus porttitor curabiturDuis mollis blandit tempus
                                        porttitor curabitur , est non…</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu similar-property-wdg wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Similar Properties</h3>
                        </div>
                        <div class="panel-body recent-property-widget">
                            <ul>
                                <?php foreach ($recentProperties as $recent) {
                                    ?>
                                    <li>
                                        <div class="col-md-3 col-sm-3 col-xs-3 blg-thumb p0">
                                            <a href="property.php?<?= $recent["Property_ID"] ?>">
                                                <img src="../uploads/property/<?= $recent["Property_Cover"] ?>">
                                            </a>
                                            <span class="property-seeker">
                                                <b class="b-1">A</b>
                                                <b class="b-2">S</b>
                                            </span>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 blg-entry">
                                            <h6> <a href="property.php?<?= $recent["Property_ID"] ?>"><?php echo $recent["Property_Number"] . " " . $recent["Property_Type"] ?> </a></h6>
                                            <span class="property-price">
                                                <?= $recent["RentAmount"] ?>€
                                            </span>
                                        </div>
                                    </li>

                                <?php } ?>

                            </ul>
                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Smart search</h3>
                        </div>
                        <div class="panel-body search-widget">
                            <form method="POST" action="filterdProperties.php" class="form-inline">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="text" class="form-control" placeholder="Key word" id="keyword"
                                                name="keyword">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-6">

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
                                    </div>
                                </fieldset>

                                <fieldset class="padding-5">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <input type="hidden" name="minPrice" id="min-price" value="">
                                            <input type="hidden" name="maxPrice" id="max-price" value="">

                                            <label for="price-range">Price range (€):</label>
                                            <input type="text" class="span2" value="" data-slider-min="100"
                                                data-slider-max="1000" data-slider-step="10"
                                                data-slider-value="[100,500]" id="price-range"><br />
                                            <b class="pull-left color">100€</b>
                                            <b class="pull-right color">1000€</b>
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="hidden" name="minSize" id="min-size" value="">
                                            <input type="hidden" name="maxSize" id="max-size" value="">
                                            <label for="property-geo">Property size (m2) :</label>
                                            <input type="text" class="span2" value="" data-slider-min="40"
                                                data-slider-max="500" data-slider-step="10" data-slider-value="[40,300]"
                                                id="property-geo"><br />
                                            <b class="pull-left color">40m²</b>
                                            <b class="pull-right color">500m²</b>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input class="button btn largesearch-btn" value="Search" name="theSubmit"
                                                type="submit">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>

                </aside>
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