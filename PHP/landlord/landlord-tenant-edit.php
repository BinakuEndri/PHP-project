<?php
session_start();
$con = require "../database.php";

if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $modifiedDate = date('y-m-d');

    if (isset($_FILES['image'])) {
        $image_name = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
        $img_lc = strtolower($img_ex);
        $allowed_array = array("jpg", "jpeg", "png");
        if (in_array($img_lc, $allowed_array)) {
            $img = $_POST['username'] . "-" . "pic" . "." . $img_lc;
            $upload_path = '../../uploads/tenant/' . $img;
            move_uploaded_file($image_temp_name, $upload_path);

        } else {
            echo "Wrong format";
        }

    }
    if (empty($image_name)) {
        $img = $_POST['img'];
    }


    $query = "UPDATE tenant SET 
    Tenant_FirstName ='$firstname', 
    Tenant_LastName ='$lastname', 
    Tenant_Number='$number',
    Tenant_Username='$username', 
    Tenant_City='$city',
    Tenant_Email ='$email',
    Tenant_ModifiedDate='$modifiedDate',
    Tenant_Img = '$img'
    WHERE Tenant_ID='$id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Tenant_edit'] = "Tenant edited successfuly: ";
        header("Location: ../../dashboardTemplate/html/landlord/landlord-tenant.php");
    } else {
        $_SESSION['Tenant_edit_fail'] = "Tenant failed to edit";
        header("Location: ../../dashboardTemplate/html/landlord/landlord-tenant.php");


    }
}


$con->close();
?>