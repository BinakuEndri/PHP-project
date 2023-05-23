<?php include 'tenant-menu.php' ?>
<?php include 'tenant-navbar.php' ?>

<?php

$con = require "../../../PHP/database.php";

$id = $tenant["Tenant_ID"];

$query = "Select * from Property p inner join tenant t on t.Tenant_Property = p.Property_ID where t.Tenant_ID = $id";

$result = mysqli_query($con, $query);

$property = mysqli_fetch_assoc($result);

$property_id = $property["Property_ID"];
$property_number = $property["Property_Number"];
$property_type = $property["Property_Type"];
$property_city = $property["Property_City"];
$property_address = $property["Property_Address"];
$property_rent = $property["RentAmount"];
$property_size = $property["Size"];
$property_cover = $property["Property_Cover"];
$property_img_2 = $property["Property_img_2"];
$property_img_3 = $property["Property_img_3"];
$property_img_4 = $property["Property_img_4"];
$property_img_5 = $property["Property_img_5"];



function countComplains($con, $id)
{

    $query = "SELECT COUNT(*) as complains FROM complains c Where Reciver_ID = '$id'";

    $result = mysqli_query($con, $query);

    $complains = $result->fetch_assoc();

    return $complains['complains'];
}

function complainsGrowthMonthly($con, $id)
{

    if (idate('m') < 10) {
        $month = "-0";
    } else {
        $month = "-";
    }
    $date = date('Y') . $month . idate('m') . "-01";
    $query = "select COUNT(*) as complains from complains where Date > '$date' and Reciver_ID = '$id'";

    $result = mysqli_query($con, $query);

    $sum = $result->fetch_assoc();

    if (countComplains($con, $id) == 0) {
        return 0;
    }

    $Growth = round(($sum['complains'] * 100) / countComplains($con, $id), 2);

    return $Growth;
}

function countComplainsWritten($con, $id)
{
    $query = "SELECT COUNT(*) as complains FROM complains c Where Sender_ID = '$id'";

    $result = mysqli_query($con, $query);

    $complains = $result->fetch_assoc();

    return $complains['complains'];
}

function complainsSendedGrowthMonthly($con, $id)
{

    if (idate('m') < 10) {
        $month = "-0";
    } else {
        $month = "-";
    }
    $date = date('Y') . $month . idate('m') . "-01";
    $query = "select COUNT(*) as complains from complains where Date > '$date' and Sender_ID = '$id'";

    $result = mysqli_query($con, $query);

    $sum = $result->fetch_assoc();

    if (countComplainsWritten($con, $id) == 0) {
        return 0;
    }

    $Growth = round(($sum['complains'] * 100) / countComplainsWritten($con, $id), 2);

    return $Growth;

}

function countRespondedComplains($con, $id)
{

    $query = "SELECT COUNT(*) as complains FROM complains c Where Reciver_ID = '$id' AND Reply IS NOT NULL";

    $result = mysqli_query($con, $query);

    $complains = $result->fetch_assoc();

    return $complains['complains'];

}

function countUnrespondedComplains($con, $id)
{

    $query = "SELECT COUNT(*) as complains FROM complains c Where Reciver_ID = '$id' AND Reply IS NULL";

    $result = mysqli_query($con, $query);

    $complains = $result->fetch_assoc();

    return $complains['complains'];

}

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Admin/</span>
        <?php echo $tenant["Tenant_FirstName"] . " " . $tenant["Tenant_LastName"] ?>
    </h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-12 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../../static/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Number of Complains To You</span>
                            <h3 class="card-title mb-2">
                                <?= countComplains($con, $id) ?>
                            </h3>
                            <small class="text-danger fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                <?= complainsGrowthMonthly($con, $id) ?>%
                                Monthly incrase
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../../static/assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                        class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span>Number of complains you have written</span>
                            <h3 class="card-title text-nowrap mb-1">
                                <?= countComplainsWritten($con, $id) ?>
                            </h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                <?= complainsSendedGrowthMonthly($con, $id) ?>%
                                Monthly incrase
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../../static/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Number of Responded Complains</span>
                            <h3 class="card-title mb-2">
                                <?= countRespondedComplains($con, $id) ?>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../../static/assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                        class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span>Number of UnResponded Complaisn</span>
                            <h3 class="card-title text-nowrap mb-1">
                                <?= countUnrespondedComplains($con, $id) ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 order-2 mb-4">
            <h5 class="my-4">My Property</h5>

            <div id="carouselExample-cf" class="carousel carousel-dark slide carousel-fade pointer-event"
                data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active" aria-current="true">
                    </li>
                    <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1" class=""></li>
                    <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2" class=""></li>
                    <li data-bs-target="#carouselExample-cf" data-bs-slide-to="3" class=""></li>
                    <li data-bs-target="#carouselExample-cf" data-bs-slide-to="4" class=""></li>

                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../../../uploads/property/<?= $property_cover ?>"
                            alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>
                                <?= $property_number ?>
                            </h3>
                            <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="../../../uploads/property/<?= $property_img_2 ?>"
                            alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>
                                <?= $property_number ?>
                            </h3>
                            <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="../../../uploads/property/<?= $property_img_3 ?>"
                            alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>
                                <?= $property_number ?>
                            </h3>
                            <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../../uploads/property/<?= $property_img_4 ?>"
                            alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>
                                <?= $property_number ?>
                            </h3>
                            <p>In numquam omittam sea.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../../uploads/property/<?= $property_img_5 ?>"
                            alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>
                                <?= $property_number ?>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExample-cf" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample-cf" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>

    </div>

</div>
<?php include 'tenant-footer.php' ?>