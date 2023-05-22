<?php include 'admin-menu.php' ?>
<?php include 'admin-navbar.php';

$id = $admin['Admin_ID'];
$name = $admin['Admin_FirstName'] . " " . $admin['Admin_LastName'];

?>


<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Password Change /</span>
        <?= $name ?>
    </h4>


    <?php
    if (isset($_SESSION["Password_edit_fail"])) {

        showMessage($_SESSION["Password_edit_fail"], "danger");
        unset($_SESSION["Password_edit_fail"]);

    }
    ?>

    <?php
    if (isset($_SESSION["EmptyFields"])) {

        showMessage($_SESSION["EmptyFields"], "warning");
        unset($_SESSION["EmptyFields"]);

    }
    ?>

    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="../../../PHP/admin/changePassword.php" enctype="multipart/form-data">
                <div class="card mb-4">
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Current Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="basic-icon-default-phone" class="form-control phone-mask"
                                        placeholder="Current Password" aria-label="Current Password"
                                        aria-describedby="basic-icon-default-phone2" name="oldPassword" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="city" class="form-label">New Password</label>
                                <input type="password" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="New Password" aria-label="New Password"
                                    aria-describedby="basic-icon-default-phone2" name="newPassword" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <input type="hidden" value="<?php echo $id ?>" name="id">
                            <button type="submit" class="btn btn-primary me-2" name="edit">Save changes</button>
                            <button type="reset" onclick="resetForm()" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </form>
        </div>
    </div>
</div>



<?php include 'admin-footer.php' ?>