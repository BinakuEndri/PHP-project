<?php include 'admin-menu.php' ?>
<?php include 'admin-navbar.php' ?>
<?php
$con = require "../../../PHP/database.php";

$idd = $admin["Admin_ID"];
$firstname = $admin["Admin_FirstName"];
$lastname = $admin["Admin_LastName"];
$username = $admin["Admin_Username"];
$number = $admin["Admin_Number"];
$email = $admin["Admin_Email"];
$city = $admin["Admin_City"];
$birthday = $admin["Admin_Birthday"];
$img = $admin["Admin_Img"];
$address = $admin["Admin_address"];
$registerdate = $admin["Admin_RegisterDate"];
$modifieddate = $admin["Admin_ModifiedDate"];

?>

<div class="container-xxl flex-grow-1 container-p-y">
  <!-- <form action="../../../PHP/admin/admin-profile.php" method="Post" enctype="multipart/form-data"> -->

  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span>
    <?php echo $firstname . " " . $lastname ?>
  </h4>

  <script>
    function submitForm() {
      document.querySelector('#form1').submit();
    }

    function resetForm() {
      if (confirm("Are you sure you want to reset the image?")) {
        document.querySelector('#form1 input[name="reset"]').value = "reset";
        document.querySelector('#form1').submit();
      }
    }
  </script>

  <div class="row">
    <div class="col-md-12">

      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <div class="card-body">
          <form action="../../../PHP/admin/admin-profile.php" method="Post" enctype="multipart/form-data" id="form1">
            <input type="hidden" value="<?php echo $username ?>" name="username">
            <input type="hidden" value="<?php echo $idd ?>" name="id">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img src="<?php echo "../../../uploads/admin/" . $img ?>" alt="admin photo" class="d-block rounded"
                height="100" width="100" id="uploadedAvatar">

              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Upload new photo</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg"
                    name="image" value="<?php echo $img ?>" onchange="submitForm()">
                </label>
                <!-- <form action="../../../PHP/admin/admin-profile.php" method="Post" enctype="multipart/form-data"
                  id="form2"> -->
                  <input type="hidden" name="reset" value="reset">
                  <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" name="reset"
                    onclick="resetForm()">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                  </button>
                <!-- </form> -->

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
          </form>
        </div>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <form action="../../../PHP/admin/admin-profile.php" method="Post" enctype="multipart/form-data">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <input class="form-control" type="text" id="firstName" name="firstName" value="<?php echo $firstname ?>"
                autofocus="">
            </div>
            <div class="mb-3 col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input class="form-control" type="text" name="lastName" id="lastName" value="<?php echo $lastname ?>">
            </div>

            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">E-mail</label>
              <input class="form-control" type="text" id="email" name="email" value="<?php echo $email ?>"
                placeholder="name@example.com">
            </div>
            <div class="mb-3 col-md-6">
              <label for="organization" class="form-label">Organization</label>
              <input type="text" class="form-control" id="organization" name="organization" value="ThemeSelection">
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Phone Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">(+383)</span>
                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                  value="<?php echo $number ?>">
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="birthday">Birthday</label>
              <div class="input-group input-group-merge">

                <input type="date" id="birthday" name="birthday" class="form-control" value="<?php echo $birthday ?>"
                  readonly>
              </div>
            </div>

            <div class="mb-3 col-md-6">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                value="<?php echo $address ?>">
            </div>

            <div class="mb-3 col-md-6">
              <label class="form-label" for="country">City</label>
              <select id="country" class="select2 form-select" name="city">
                <option value="<?php echo $city ?>">
                  <?php echo $city ?>
                </option>
                <option value="Prishtina">Prishtina</option>
                <option value="Vushtrri">Vushtrri</option>
                <option value="Prizren">Prizren</option>
                <option value="Skenderaj">Skenderaj</option>
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="register_date">Register date</label>
              <div class="input-group input-group-merge">

                <input type="date" id="register_date" name="register_date" class="form-control"
                  value="<?php echo $registerdate ?>" readonly>
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="modifiedDate">Modified Date</label>
              <div class="input-group input-group-merge">

                <input type="date" id="modifiedDate" name="modifiedDate" class="form-control"
                  value="<?php echo $modifieddate ?>" readonly>
              </div>
            </div>

            <div class="mb-3 col-md-6">
              <label for="username" class="form-label">Username</label>
              <input class="form-control" type="text" id="username" name="username" value="<?php echo $username ?>"
                autofocus="">
            </div>

          </div>
          <input type="hidden" value="<?php echo $idd ?>" name="id">
          <div class="mt-2">

            <button type="submit" class="btn btn-primary me-2" name="edit">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
    <div class="card">
      <h5 class="card-header">Delete Account</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
          </div>
          <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- </form> -->
</div>

<?php include 'admin-footer.php' ?>