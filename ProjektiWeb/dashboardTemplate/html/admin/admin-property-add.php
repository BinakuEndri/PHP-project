<?php include 'admin-menu.php' ?>
<?php include 'admin-navbar.php' ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Forms/</span> Vertical Layouts
    </h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic with Icons</h5>
                    <small class="text-muted float-end">Merged input group</small>
                </div>
                <div class="card-body">
                    <form action="../../../PHP/admin/property-add.php" method="Post">
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
                            <label for="defaultSelect" class="form-label">Default select</label>
                            <select id="defaultSelect" class="form-select" name="owner">
                                <option>Default select</option>

                                <?php
                                $con = require "../../../PHP/database.php";

                                $query = "select * from owner";

                                $result = mysqli_query($con, $query);


                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['Owner_ID'] ?>">
                                        <?php echo $row['Owner_FirstName'] . " " . $row['Owner_LastName'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="register">
                            Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'admin-footer.php' ?>