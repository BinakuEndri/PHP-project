<?php include 'admin-menu.php' ?>
<?php include 'admin-navbar.php' ?>

<?php
$con = require "../../../PHP/database.php";

if (isset($_POST['edit'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM property WHERE Property_ID = '$id'";
    $result = $con->query($query);
    $row = $result->fetch_assoc();

    $type = $row["Property_Type"];
    $number = $row["Property_Number"];
    $city = $row["Property_City"];
    $address = $row["Property_Address"];

}

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Landlords/ </span>Edit Landlord:
        <?php echo $number ?>
    </h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Register Form</h5>
                    <small class="text-muted float-end">
                        <?php echo $number . " " . $type ?>
                    </small>
                </div>
                <div class="card-body">
                    <form action="../../../PHP/admin/property-edit.php" method="Post">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Proerty Number</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="Proerty Number" aria-label="Proerty Number" value="<?php echo $number?>"
                                    aria-describedby="basic-icon-default-fullname2" name="number" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Property Type</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="Property Type" aria-label="Property Type" value="<?php echo $type?>"
                                    aria-describedby="basic-icon-default-company2" name="type" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Property City</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="Property City" aria-label="Property City" value="<?php echo $city?>"
                                    aria-describedby="basic-icon-default-company2" name="city" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Property Address</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="Property Address" aria-label="Property Address" value="<?php echo $address?>"
                                    aria-describedby="basic-icon-default-company2" name="address" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">Default select</label>
                            <select id="defaultSelect" class="form-select" name="owner">
                                <option>Default</option>

                                <?php

                                $query1 = "select * from owner";

                                $resultt = mysqli_query($con, $query1);


                                while ($row1 = mysqli_fetch_assoc($resultt)) {
                                    ?>
                                    <option value="<?php echo $row1['Owner_ID'] ?>">
                                        <?php echo $row1['Owner_FirstName'] . " " . $row1['Owner_LastName'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" value="<?php echo $id ?>" name="id">
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
<?php include 'admin-footer.php' ?>