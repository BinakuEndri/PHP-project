<?php include 'landlord-menu.php' ?>
<?php include 'landlord-navbar.php' ?>

<?php

$con = require "../../../PHP/database.php";


$id = $landlord['Owner_ID'];
$name = $landlord['Owner_FirstName'] . " " . $landlord['Owner_LastName'];
$firstname = $landlord['Owner_FirstName'];
$lastname = $landlord['Owner_LastName'];
$city = $landlord['Owner_City'];
$number = $landlord['Owner_Number'];
$username = $landlord['Owner_Username'];
$email = $landlord['Owner_Email'];
$birthday = $landlord['Owner_Birthday'];
$img = $landlord['Owner_img'];


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



function countTenants($con, $id)
{
    $query = "select COUNT(*) as tenants from tenant 
    INNER JOIN property ON tenant.Tenant_Property = property.Property_ID
    where property.Property_Owner = '$id'";

    $result = mysqli_query($con, $query);

    $tenants = $result->fetch_assoc();

    return $tenants['tenants'];
}

function countProperties($con, $id)
{
    $query = "select COUNT(*) as properties from property where Property_Owner = '$id'";

    $result = mysqli_query($con, $query);

    $properties = $result->fetch_assoc();

    return $properties['properties'];
}


function calculateProfit($con, $id)
{
    $profit = 0;
    $query = "select sum(p.RentAmount) as rent from property p where p.Property_Owner = '$id' and p.Property_Id in (select p.Property_Id from tenant t where t.Tenant_Property = p.Property_ID)";

    $result = mysqli_query($con, $query);

    $sum = $result->fetch_assoc();
    $profit = $sum['rent'] - ($sum['rent'] * 0.05);
    return $profit;
}

function calculateProfitGrowth($con, $id)
{
    if (idate('m') < 10) {
        $month = "-0";
    } else {
        $month = "-";
    }
    $date = date('Y') . $month . idate('m') . "-01";
    $profit = 0;
    $query = "select sum(RentAmount) as rent from property where Property_RegisterDate > '$date' and Property_Owner = '$id'";

    $result = mysqli_query($con, $query);

    $sum = $result->fetch_assoc();
    $profit = $sum['rent'] - ($sum['rent'] * 0.05);

    if (calculateProfit($con, $id) == 0) {
        return 0;
    }

    $Growth = round(($profit * 100) / calculateProfit($con, $id), 2);
    return $Growth;
}

function getMostProfitFromProperties($con, $id)
{
    $query = "SELECT p.Property_Number AS number,p.Property_Type as type, p.Property_Cover AS img, p.RentAmount AS rent From property p 
    where p.Property_Owner = '$id' 
        ORDER BY p.RentAmount DESC LIMIT 10";

    $result = mysqli_query($con, $query);

    while ($property = mysqli_fetch_assoc($result)) {
        $name = $property['number'] . " " . $property['type'];
        $rent = $property['rent'];
        $img = $property['img'];
        $src = "../../../uploads/property/" . $img;
        echo "
        <li class='d-flex mb-4 pb-1'>
            <div class='avatar flex-shrink-0 me-3'>
                <img src='$src' alt='User' class='rounded'>
            </div>
            <div class='d-flex w-100 flex-wrap align-items-center justify-content-between gap-2'>
                <div class='me-2'>
                    <small class='text-muted d-block mb-1'></small>
                    <h6 class='mb-0'>
                        $name 
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

function getMostProfitFromTenants($con, $id)
{
    $query = "SELECT t.Tenant_FirstName AS name, t.Tenant_LastName AS lastname, t.Tenant_img AS img, 
    (p.RentAmount / tenant_count.count) AS rent 
    FROM tenant t 
    INNER JOIN property p ON t.Tenant_Property = p.Property_ID
    INNER JOIN (
        SELECT Tenant_Property, COUNT(*) AS count
        FROM tenant
        GROUP BY Tenant_Property
    ) AS tenant_count ON tenant_count.Tenant_Property = p.Property_ID
    WHERE p.Property_Owner = '$id' 
    ORDER BY p.RentAmount DESC 
    LIMIT 10";

    $result = mysqli_query($con, $query);

    while ($tenant = mysqli_fetch_assoc($result)) {
        $name = $tenant['name'] . " " . $tenant['lastname'];
        $rent = round($tenant['rent'], 2);

        $img = $tenant['img'];
        $src = "../../../uploads/tenant/" . $img;
        echo "
        <li class='d-flex mb-4 pb-1'>
            <div class='avatar flex-shrink-0 me-3'>
                <img src='$src' alt='User' class='rounded'>
            </div>
            <div class='d-flex w-100 flex-wrap align-items-center justify-content-between gap-2'>
                <div class='me-2'>
                    <small class='text-muted d-block mb-1'></small>
                    <h6 class='mb-0'>
                        $name 
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


function countComplains($con, $id)
{

    $query = "SELECT COUNT(*) as complains FROM complains c Where Landlord_ID = '$id'";

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
    $query = "select COUNT(*) as complains from complains where Date > '$date' and Landlord_ID = '$id'";

    $result = mysqli_query($con, $query);

    $sum = $result->fetch_assoc();

    if (countComplains($con, $id) == 0) {
        return 0;
    }

    $Growth = round(($sum['complains'] * 100) / countComplains($con, $id), 2);

    return $Growth;
}

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Landlord/</span>
        <?php echo $name ?>
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
                                <?= countProperties($con, $id) ?>
                            </h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
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
                            <span>Number of Tenants</span>
                            <h3 class="card-title text-nowrap mb-1">
                                <?= countTenants($con, $id) ?>

                            </h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
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
                            <span class="fw-semibold d-block mb-1">Total Profits</span>
                            <h3 class="card-title mb-2">
                                <?= calculateProfit($con, $id) ?> €
                            </h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                <?= calculateProfitGrowth($con, $id) ?>% Monthly incrase
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
                            <span>Complains</span>
                            <h3 class="card-title text-nowrap mb-1">
                                <?= countComplains($con, $id) ?>
                            </h3>
                            <small class="text-danger fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                <?= complainsGrowthMonthly($con, $id) ?>% Monthly incrase
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 col-lg-6 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Most Profitable Properties</h5>
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
                        <?php getMostProfitFromProperties($con, $id); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Most Profit By Tenants</h5>
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
                        <?php getMostProfitFromTenants($con, $id); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include 'landlord-footer.php' ?>