<?php
session_start();
if (isset($_SESSION["Admin_ID"])) {

    $con = require "../PHP/database.php";

    $query = "SELECT * FROM user WHERE Admin_ID = {$_SESSION["Admin_ID"]}";

    $result = $con->query($query);

    $admin = $result->fetch_assoc();

    $user = $admin;

}



if (isset($_SESSION["Landlord_ID"])) {
    $con = require "../PHP/database.php";
    $query = "SELECT * FROM owner WHERE Owner_ID = {$_SESSION["Landlord_ID"]}";
    $result = $con->query($query);
    $landlord = $result->fetch_assoc();

    $user = $landlord;
}
if (isset($_SESSION["Tenant_ID"])) {
    $con = require "../PHP/database.php";
    $query = "SELECT * FROM tenant WHERE Tenant_ID = {$_SESSION["Tenant_ID"]}";
    $result = $con->query($query);
    $tenant = $result->fetch_assoc();

    $user = $tenant;
}


if (isset($_SESSION["Admin_ID"]) || isset($_SESSION["Landlord_ID"]) || isset($_SESSION["Tenant_ID"])) {
    $logedIn = true;
    if (isset($_SESSION["Admin_ID"])) {
        $userType = 1;
    } elseif (isset($_SESSION["Landlord_ID"])) {
        $userType = 2;
    } elseif (isset($_SESSION["Tenant_ID"])) {
        $userType = 3;
    }


} else {
    $logedIn = false;

}
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GARO ESTATE | Home page</title>
        <meta name="description" content="GARO is a real-estate template">
        <meta name="author" content="Kimarotec">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/fontello.css">
        <link href="assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="assets/css/price-range.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.theme.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css">
        <link rel="stylesheet" href="assets/css/lightslider.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>

    <body>

        <!-- <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>* -->
        <!-- Body content -->

        <div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="pe-7s-call"></i> +1 234 567 7890</span>
                                <span><i class="pe-7s-mail"></i> your@company.com</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End top header -->

        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                        <?php if (!$logedIn) { ?>
                            <button class="navbar-btn nav-button wow bounceInRight login"
                                onclick=" location.replace('../dashboardTemplate/html/login.php')"
                                data-wow-delay="0.45s">Login</button>
                            <button class="navbar-btn nav-button wow fadeInRight"
                                onclick=" location.replace('../dashboardTemplate/html/register.php')"
                                data-wow-delay="0.48s">Register</button>
                        <?php } else { ?>
                            <button class="navbar-btn nav-button wow fadeInRight"
                                onclick=" location.replace('../dashboardTemplate/html/logout.php')"
                                data-wow-delay="0.48s">Log
                                Out</button>
                            <?php if ($userType == 1) { ?>
                                <button class="navbar-btn nav-button wow bounceInRight login"
                                    onclick=" location.replace('../dashboardTemplate/html/admin/admin-dashboard.php')"
                                    data-wow-delay="0.48s">Dashboard</button>
                            <?php } elseif ($userType == 2) { ?>
                                <button class="navbar-btn nav-button wow bounceInRight login"
                                    onclick=" location.replace('../dashboardTemplate/html/landlord/landlord-dashboard.php')"
                                    data-wow-delay="0.48s">Dashboard</button>
                            <?php } elseif ($userType == 3) { ?>
                                <button class="navbar-btn nav-button wow bounceInRight login"
                                    onclick=" location.replace('../dashboardTemplate/html/tenant/tenant-dashboard.php')"
                                    data-wow-delay="0.48s">Dashboard</button>
                            <?php } ?>
                        <?php }
                        ?>
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                            <a href="index.html" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown"
                                data-delay="200">Home <b class="caret"></b></a>
                            <ul class="dropdown-menu navbar-nav">
                                <li>
                                    <a href="index-2.html">Home Style 2</a>
                                </li>
                                <li>
                                    <a href="index-3.html">Home Style 3</a>
                                </li>
                                <li>
                                    <a href="index-4.html">Home Style 4</a>
                                </li>
                                <li>
                                    <a href="index-5.html">Home Style 5</a>
                                </li>

                            </ul>
                        </li>

                        <li class="wow fadeInDown" data-wow-delay="0.2s"><a class=""
                                href="properties.php">Properties</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.3s"><a class="" href="property.html">Property</a>
                        </li>
                        <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="contact.html">Contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->