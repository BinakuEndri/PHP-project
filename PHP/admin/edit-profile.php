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

    if (isset($_FILES['upload'])) {
        $image_name = $_FILES['upload']['name'];
        $image_temp_name = $_FILES['upload']['tmp_name'];
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


    $query = "UPDATE user SET 
    Admin_FirstName ='$firstname', 
    Admin_LastName ='$lastname', 
    Admin_Number='$number',
    Admin_Username='$username', 
    Admin_City='$city',
    Admin_Email ='$email',
    Admin_ModifiedDate='$modifiedDate',
    Admin_Img = '$img'
    WHERE Admin_ID='$id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Admin_edit'] = "Edited successfuly: ";
        header("Location: ../../dashboardTemplate/html/admin/admin-editprofile.php");
    } else {
        $_SESSION['Admin_edit_fail'] = "Failed to edit";
        header("Location: ../../dashboardTemplate/html/admin/admin-editprofile.php");


    }
}


$con->close();
?>