<?php include 'landlord-menu.php' ?>
<?php include 'landlord-navbar.php' ?>

<?php
$con = require "../../../PHP/database.php";

if (isset($_POST['edit'])) {
    $idd = $_POST['id'];

    $query = "SELECT * FROM tenant WHERE Tenant_ID = '$idd'";
    $result = $con->query($query);
    $row = $result->fetch_assoc();

    $firstname = $row["Tenant_FirstName"];
    $lastname = $row["Tenant_LastName"];
    $username = $row["Tenant_Username"];
    $number = $row["Tenant_Number"];
    $email = $row["Tenant_Email"];
    $city = $row["Tenant_City"];
    $birthday = $row["Tenant_Birthday"];
    $img = $row["Tenant_Img"];


}

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Tenants/ </span>Edit Tenant:
        <?php echo $firstname . " " . $lastname ?>
    </h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Register Form</h5>
                    <small class="text-muted float-end">
                        <?php echo $firstname . " " . $lastname ?>
                    </small>
                </div>
                <div class="card-body">
                    <form action="../../../PHP/tenant/landlord-tenant-edit.php" method="Post"
                        enctype="multipart/form-data">

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">First Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder=""
                                    aria-label="First Name" value="<?php echo $firstname ?>"
                                    aria-describedby="basic-icon-default-fullname2" name="firstname" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Last Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="Last Name" aria-label="Last Name" value="<?php echo $lastname ?>"
                                    aria-describedby="basic-icon-default-company2" name="lastname" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Username</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="User Name" aria-label="User Name" value="<?php echo $username ?>"
                                    aria-describedby="basic-icon-default-company2" name="username" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="text" id="basic-icon-default-email" class="form-control"
                                    placeholder="john.doe" aria-label="john.doe" value="<?php echo $email ?>"
                                    aria-describedby="basic-icon-default-email2" name="email" />
                                <span id="basic-icon-default-email2" class="input-group-text">@gmail.com</span>
                            </div>
                            <div class="form-text">
                                You can use letters, numbers &amp; periods
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-phone"></i></span>
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="658 799 8941" aria-label="658 799 8941" value="<?php echo $number ?>"
                                    aria-describedby="basic-icon-default-phone2" name="number">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">City</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-phone"></i></span>
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="City" aria-label="City" value="<?php echo $city ?>"
                                    aria-describedby="basic-icon-default-phone2" name="city">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">City</label>
                            <div class=" input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-phone"></i></span>
                                <input type="hidden" name="img" value="<?php echo $img ?>">
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div>
                                <label class="form-label" for="basic-icon-default-phone">Foto e Userit: </label>
                                <div>
                                    <img src="<?php echo "../../../uploads/tenant/" . $img ?>" alt="user" height="75px"
                                        width="55px">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" value="<?php echo $idd ?>" name="id">
                        <button type="submit" class="btn btn-primary" name="edit">
                            Edit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php


$con->close();
?>
<?php include 'landlord-footer.php' ?>