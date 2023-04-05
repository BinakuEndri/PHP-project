<?php include 'admin-menu.php' ?>
<?php include '../../../PHP/message.php' ?>
<?php include 'admin-navbar.php' ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Tenants/</span> Add Tenants
    </h4>
    <?php
    if (isset($_SESSION["Tenant_add"])) {
        showMessage($_SESSION["Tenant_add"], "success");
        unset($_SESSION["Tenant_add"]);
    }
    ?>
    <?php
    if (isset($_SESSION["EmptyFields"])) {

        showMessage($_SESSION["EmptyFields"], "warning");
        unset($_SESSION["EmptyFields"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Tenant_username_error"])) {

        showMessage($_SESSION["Tenant_username_error"], "warning");
        unset($_SESSION["Tenant_username_error"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Tenant_error"])) {

        showMessage($_SESSION["Tenant_error"], "danger");
        unset($_SESSION["Tenant_error"]);

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
                    <form action="../../../PHP/admin/tenant-add.php" method="Post">
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">First Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="Fist Name" aria-label="Fist Name"
                                    aria-describedby="basic-icon-default-fullname2" name="firstname" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Last Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="Last Name" aria-label="Last Name"
                                    aria-describedby="basic-icon-default-company2" name="lastname" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Username</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="User Name" aria-label="User Name"
                                    aria-describedby="basic-icon-default-company2" name="username" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="text" id="basic-icon-default-email" class="form-control"
                                    placeholder="john.doe" aria-label="john.doe"
                                    aria-describedby="basic-icon-default-email2" name="email" />
                                <span id="basic-icon-default-email2" class="input-group-text">@gmail.com</span>
                            </div>
                            <div class="form-text">
                                You can use letters, numbers &amp; periods
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Password</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-phone"></i></span>
                                <input type="password" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="Password" aria-label="Password"
                                    aria-describedby="basic-icon-default-phone2" name="password" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Number</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="Number" aria-label="Number"
                                    aria-describedby="basic-icon-default-company2" name="number" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">City</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="City" aria-label="City" aria-describedby="basic-icon-default-company2"
                                    name="city" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Birthday</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="date" id="basic-icon-default-company" class="form-control"
                                    placeholder="Birthday" aria-label="Birthday"
                                    aria-describedby="basic-icon-default-company2" name="birthday" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">Select Property</label>
                            <select id="defaultSelect" class="form-select" name="property">
                                <option>Default select</option>

                                <?php
                                $con = require "../../../PHP/database.php";

                                $query = "select * from property ";

                                $result = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['Property_ID'] ?>">
                                        <?php echo $row['Property_Number'] . " " . $row['Property_Type'] ?>
                                    </option>
                                    <?php
                                }
                                $con->close();
                                ?>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary" name="register">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'admin-footer.php' ?>