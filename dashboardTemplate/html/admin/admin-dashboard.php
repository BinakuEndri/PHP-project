<?php include 'admin-menu.php' ?>
<?php include 'admin-navbar.php' ?>

<?php

$con = require "../../../PHP/database.php";

function highestProfitProperty($con)
{
    $query = "SELECT * FROM property 
    ORDER BY RentAmount DESC 
    Limit 3";

    $result = mysqli_query($con, $query);

    while ($property = mysqli_fetch_assoc($result)) {
        $number = $property['Property_Number'];

        echo
            "<div class='carousel-item active'>
             <img class='d-block w-100' src='../../static/assets/img/elements/18.jpg' alt='First slide'>
            <div class='carousel-caption d-none d-md-block'>
                <h3>
                     $number
                </h3>
                <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
             </div>
          </div>";
    }

}

function countUsers($con, $type)
{
    $query = "select COUNT(*) as cnt from $type";

    $result = mysqli_query($con, $query);

    $user = $result->fetch_assoc();

    return $user['cnt'];
}

function calculateGrowth($con, $type)
{
    if (idate('m') < 10) {
        $month = "-0";
    } else {
        $month = "-";
    }
    $date = date('Y') . $month . idate('m') . "-01";
    $column = $type . "_RegisterDate";
    $query = "select COUNT(*) as added from $type where $column > '$date' ";
    $result = mysqli_query($con, $query);

    $Added = $result->fetch_assoc();

    $Growth = round(($Added['added'] * 100) / countUsers($con, $type), 2);

    return $Growth;
}

function calculateProfit($con)
{
    $profit = 0;
    $query = "select sum(RentAmount) as rent from property";

    $result = mysqli_query($con, $query);

    $sum = $result->fetch_assoc();
    $profit += $sum['rent'] * 0.05;
    return $profit;
}

function calculateProfitGrowth($con)
{
    if (idate('m') < 10) {
        $month = "-0";
    } else {
        $month = "-";
    }
    $date = date('Y') . $month . idate('m') . "-01";
    $profit = 0;
    $query = "select sum(RentAmount) as rent from property where Property_RegisterDate > '$date'";

    $result = mysqli_query($con, $query);

    $sum = $result->fetch_assoc();
    $profit += $sum['rent'] * 0.05;

    $Growth = round(($profit * 100) / calculateProfit($con), 2);
    return $Growth;
}

function getMostProfitFromandlords($con)
{
    $query = "SELECT o.Owner_FirstName AS name, 
    o.Owner_LastName AS lastname, o.Owner_img as img,
    SUM(p.RentAmount) AS total_rent
    FROM Owner o 
    INNER JOIN property p ON o.Owner_ID = p.Property_Owner
    GROUP BY o.Owner_ID
    ORDER BY total_rent DESC
    LIMIT 10;";
    $result = mysqli_query($con, $query);

    while ($resultt = mysqli_fetch_assoc($result)) {

        $name = $resultt["name"];
        $lastname = $resultt["lastname"];
        $fullname = $name . " " . $lastname;
        $rent = $resultt["total_rent"];
        $img = $resultt["img"];
        $src = "../../../uploads/landlord/" . $img;
        echo "
        <li class='d-flex mb-4 pb-1'>
            <div class='avatar flex-shrink-0 me-3'>
                <img src='$src' alt='User' class='rounded'>
            </div>
            <div class='d-flex w-100 flex-wrap align-items-center justify-content-between gap-2'>
                <div class='me-2'>
                    <small class='text-muted d-block mb-1'></small>
                    <h6 class='mb-0'>
                        $fullname 
                    </h6>
                </div>
                <div class='user-progress d-flex align-items-center gap-1'>
                    <h6 class='mb-0'>$rent</h6>
                    <span class='text-muted'>€</span>
                </div>
            </div>
        </li>
       ";
    }
}

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Admin/</span>
        <?php echo $admin["Admin_FirstName"] . " " . $admin["Admin_LastName"] ?>
    </h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6 order-1">
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
                            <span class="fw-semibold d-block mb-1">Number of Properties</span>
                            <h3 class="card-title mb-2">
                                <?= countUsers($con, 'property') ?>
                            </h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                <?= calculateGrowth($con, "property") ?>%
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
                            <span>Number of Landlords</span>
                            <h3 class="card-title text-nowrap mb-1">
                                <?= countUsers($con, 'owner') ?>
                            </h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                <?= calculateGrowth($con, "owner") ?>%
                                Monthly incrase

                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 order-1">
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
                            <span class="fw-semibold d-block mb-1">Number of Tenants</span>
                            <h3 class="card-title mb-2">
                                <?= countUsers($con, "tenant") ?>
                            </h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                <?= calculateGrowth($con, "tenant") ?>%
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
                            <span>Monthly Profit</span>
                            <h3 class="card-title text-nowrap mb-1">€
                                <?= calculateProfit($con) ?>
                            </h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                <?= calculateProfitGrowth($con) ?> % Monthly incrase
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md col-lg-6">
            <h5 class="my-4">Bootstrap crossfade carousel (dark)</h5>

            <div id="carouselExample-cf" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1" class=""></li>
                    <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2" class="" aria-current="true">
                    </li>
                </ol>
                <div class="carousel-inner">
                    <?= highestProfitProperty($con) ?>
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
        <div class="col-md-6 col-lg-6 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Transactions</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <?php getMostProfitFromandlords($con); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include 'admin-footer.php' ?>