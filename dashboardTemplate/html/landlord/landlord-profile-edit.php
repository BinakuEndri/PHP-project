<?php include 'landlord-menu.php' ?>
<?php include 'landlord-navbar.php' ?>
<?php include '../../../PHP/message.php'?>
<?php

$con = require "../../../PHP/database.php";
$id = $landlord["Owner_ID"]; //$_SESSION["Landlord_ID"];
$query = "SELECT * FROM owner WHERE Owner_ID = '$id'";

$result = $con->query($query);

$landlord = $result->fetch_assoc();

$name = $landlord["Owner_FirstName"] . " " . $landlord["Owner_LastName"];
$firstName = $landlord["Owner_FirstName"];
$lastName = $landlord["Owner_LastName"];
$email = $landlord["Owner_Email"];
$image = $landlord["Owner_img"];
$id = $landlord["Owner_ID"];
$username = $landlord["Owner_Username"];
$birthday = $landlord["Owner_Birthday"];
$phone = $landlord["Owner_Number"];
$city = $landlord["Owner_City"];
$password = $landlord["Owner_Password"];

$img_path = "../../../uploads/landlord/" . $image;

?>
  

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span>
        <?=$name ?>
    </h4>
    <?php
    if (isset($_SESSION["Landlord_delete_fail"])) {

        showMessage($_SESSION["Landlord_delete_fail"], "danger");
        unset($_SESSION["Landlord_delete_fail"]);

    }
    
    ?>
     <?php
    if (isset($_SESSION["Delete_fail"])) {

        showMessage($_SESSION["Delete_fail"], "danger");
        unset($_SESSION["Delete_fail"]);

    }
    
    ?>
    
    <?php
    if (isset($_SESSION["Landlord_edit"])) {

        showMessage($_SESSION["Landlord_edit"], "success");
        unset($_SESSION["Landlord_edit"]);

    }
    ?>
    <?php
    if (isset($_SESSION["Landlord_edit_fail"])) {

        showMessage($_SESSION["Landlord_edit_fail"], "danger");
        unset($_SESSION["Landlord_edit_fail"]);

    }
    ?>
      <?php
    if (isset($_SESSION["Password_edit"])) {

        showMessage($_SESSION["Password_edit"], "danger");
        unset($_SESSION["Password_edit"]);

    }
    ?>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                </li>
            </ul>
            <form method="POST" action="../../../PHP/landlord/edit-profile.php" enctype="multipart/form-data">  
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" value="<?=$image?>" name="img" id="img">
                            <img src="<?= $img_path ?>" alt="user-avatar" class="d-block rounded" height="100"
                                width="100" id="uploadedAvatar">
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" hidden="" id="upload" name="upload" onchange="displayImage(event)"
                                    class="account-file-input"  accept="image/png, image/jpeg">
                                </label>
                                <button type="button" id="reset" onclick="resetImage()"
                                    class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input class="form-control" type="text" id="firstname" name="firstname" 
                                    value="<?=$firstName?>" autofocus="">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input class="form-control" type="text" name="lastname" id="lastname" value="<?=$lastName?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="username" class="form-label">Username</label>
                                    <input class="form-control" type="text" name="username" id="username" value="<?=$username?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="<?=$email?>" placeholder="<?=$email?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="number" name="number" class="form-control"
                                            placeholder="044 000 000" value="<?=$phone?>">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city"
                                        placeholder="City" value="<?=$city?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                   
                                   </div>
                                   <div class="mb-3 col-md-6">
                                       <button type="button" onclick="changeLocation()" id="changePassword"class="btn btn-primary me-2" name="edit">Change Password</button>
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
            <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                    </div>
                    <form action="../../../PHP/landlord/landlord-account-deactivate.php" method="POST">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation"
                                id="accountActivation">
                            <label class="form-check-label" for="accountActivation">I confirm my account
                                deactivation</label>
                        </div>
                        <input type="hidden" value="<?php echo $id ?>" name="id">
                        <button type="submit" class="btn btn-danger deactivate-account" name="delete">Deactivate Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function displayImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imagePreview = document.getElementById('uploadedAvatar');
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function resetImage() {
        const imageInput = document.getElementById('upload');
        imageInput.value = null;

        const imagePreview = document.getElementById('uploadedAvatar');
        imagePreview.src = "<?= $img_path ?>";
    }

    function resetForm() {
        const firstname = document.getElementById('firstname');
        const lastname = document.getElementById('lastname');
        const username = document.getElementById('username');
        const email = document.getElementById('email');
        const phoneNumber = document.getElementById('number'); // Updated ID
        const city = document.getElementById('city');
        const imagePreview = document.getElementById('uploadedAvatar');
        imagePreview.src = "<?= $img_path ?>";

        firstname.value = "<?=$firstName?>";
        lastname.value = "<?=$lastName?>";
        username.value = "<?=$username?>";
        email.value = "<?=$email?>";
        phoneNumber.value = "<?=$phone?>"; // Updated ID
        city.value = "<?=$city?>";
    }

    function changeLocation(){
        location.replace("change-password.php");
    }
</script>

<?php include 'landlord-footer.php' ?>