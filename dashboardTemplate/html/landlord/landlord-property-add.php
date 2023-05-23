<?php include 'landlord-menu.php' ?>
<?php include '../../../PHP/message.php' ?>
<?php include 'landlord-navbar.php';

$name = $landlord["Owner_FirstName"] . " " . $landlord["Owner_LastName"];

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Property/</span> Property Adds
    </h4>
    <?php
    if (isset($_SESSION["Property_add"])) {
        showMessage($_SESSION["Property_add"], "success");
        unset($_SESSION["Property_add"]);


    }
    ?>
    <?php
    if (isset($_SESSION["EmptyFields"])) {

        showMessage($_SESSION["EmptyFields"], "warning");
        unset($_SESSION["EmptyFields"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Property_username_error"])) {

        showMessage($_SESSION["Property_username_error"], "warning");
        unset($_SESSION["Property_username_error"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Property_error"])) {

        showMessage($_SESSION["Property_error"], "danger");
        unset($_SESSION["Property_error"]);


    }
    ?>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic with Icons</h5>
                    <small class="text-muted float-end">Merged input group</small>
                </div>
                <div class="card-body">
                    <form action="../../../PHP/landlord/property-add.php" method="Post" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-6">

                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname">Proerty Number</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" id="basic-icon-default-fullname"
                                            placeholder="Proerty Number" aria-label="Proerty Number"
                                            aria-describedby="basic-icon-default-fullname2" name="number" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Property Type</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-buildings"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Property Type" aria-label="Property Type"
                                            aria-describedby="basic-icon-default-company2" name="type" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Property City</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-buildings"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Property City" aria-label="Property City"
                                            aria-describedby="basic-icon-default-company2" name="city" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Property Address</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Property Address" aria-label="Property Address"
                                            aria-describedby="basic-icon-default-company2" name="address" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Property Rent
                                        Amount</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Rent Amount" aria-label="Rent Amount"
                                            aria-describedby="basic-icon-default-company2" name="rent" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-company">Size
                                        Amount</label>
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-company2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" id="basic-icon-default-company" class="form-control"
                                            placeholder="Size" aria-label="Size"
                                            aria-describedby="basic-icon-default-company2" name="size" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="defaultSelect" class="form-label">Owner </label>
                                    <select id="defaultSelect" class="form-select" name="owner">
                                        <option>
                                            <?= $name ?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Cover Image:</label>
                                    <input class="form-control" type="file" name="image1">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Second Image:</label>
                                    <input class="form-control" type="file" name="image2">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Third Image:</label>
                                    <input class="form-control" type="file" name="image3">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Fourth Image:</label>
                                    <input class="form-control" type="file" name="image4">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Fifth Image:</label>
                                    <input class="form-control" type="file" name="image5">
                                </div>
                                <button type="submit" class="btn btn-primary" name="register">
                                    Add
                                </button>
                            </div>


                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'landlord-footer.php' ?>