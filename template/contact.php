<?php include 'header.php';

$property = require '../PHP/properties/property.php';


$properties = $property->getAllProperties();
$cities = $property->getAllCitiesFromProperties();
$recentProperties = $property->getRecentProperies();


?>



<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Contact Page</h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
    <div class="container">

        <div class="col-md-9">

            <div class="" id="contact1">
                <div class="row">
                    <div class="col-sm-4">
                        <h3><i class="fa fa-map-marker"></i> Address</h3>
                        <p>FIEK
                            <br>Bregu i Diellit
                            <br>10000
                            <br>Prishtinë
                            <br>
                            <strong>Republika e Kosovës</strong>
                        </p>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <h3><i class="fa fa-phone"></i> Call center</h3>
                        <p class="text-muted">This number is toll free if calling from Kosova otherwise we advise
                            you to use the electronic form of communication.</p>
                        <p><strong>+383 44 000 000</strong></p>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                        <p class="text-muted">Please feel free to write an email to us or to use our electronic
                            ticketing system.</p>
                        <ul>
                            <li><strong><a href="">therentopia@gmail.com</a></strong> </li>
                            <li><strong><a href="#">Rentopia</a></strong> - our ticketing support platform</li>
                        </ul>
                    </div>
                    <!-- /.col-sm-4 -->
                </div>
                <!-- /.row -->

                <hr>
                <h2>Contact form</h2>
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send
                                message</button>
                        </div>
                    </div>
                    <!-- /.row -->
                </form>
            </div>
        </div>
        <!-- /.col-md-9 -->

        <div class="col-md-3 ">
            <div class="blog-asside-right">
                <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                    <div class="panel-heading">
                        <h3 class="panel-title">Recent</h3>
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
            </div>
        </div>
    </div>
</div>
<!-- Footer area-->
<?php include 'footer.php' ?>