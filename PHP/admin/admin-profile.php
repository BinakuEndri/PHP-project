<?php
session_start();
$con = require "../database.php";




if (isset($_FILES['image'])) {
    $id = $_POST['id'];
    $image_name = $_FILES['image']['name'];
    $image_temp_name = $_FILES['image']['tmp_name'];
    $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
    $img_lc = strtolower($img_ex);
    $allowed_array = array("jpg", "jpeg", "png");
    if (in_array($img_lc, $allowed_array)) {
        $img = $_POST['username'] . "-" . "pic" . "." . $img_lc;
        $upload_path = '../../uploads/admin/' . $img;
        move_uploaded_file($image_temp_name, $upload_path);

        $query = "UPDATE user SET Admin_Img ='$img'
        WHERE Admin_ID='$id'";
        $query_run = mysqli_query($con, $query);
    
        if ($query_run) {
            echo "<script>console.log('Success' );</script>";
            $_SESSION['Admin_profile'] = "Admin edited successfully: ";
            header("Location: ../../dashboardTemplate/html/admin/admin-profile.php");
        } else {
            echo "<script>console.log('Failed' );</script>";
            $_SESSION['Admin_Profile_fail'] = "Admin failed to edit";
            header("Location: ../../dashboardTemplate/html/admin/admin-profile.php");
        }

    } else {
        echo "Wrong format";
    }
}


if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstName'];
    $lastname = $_POST['lastName'];
    $city = $_POST['city'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['phoneNumber'];
    $modifiedDate = date('y-m-d');

    $query = "UPDATE user SET Admin_FirstName ='$firstname',
    Admin_LastName ='$lastname',
    Admin_Number='$number',
    Admin_Username='$username',
    Admin_City='$city',
    Admin_Email ='$email',
    Admin_ModifiedDate='$modifiedDate',
    WHERE Admin_ID='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<script>console.log('Success' );</script>";
        $_SESSION['Admin_profile'] = "Admin edited successfully: " . $img;
        header("Location: ../../dashboardTemplate/html/admin/admin-dashboard.php");
    } else {
        echo "<script>console.log('Failed' );</script>";
        $_SESSION['Admin_Profile_fail'] = "Admin failed to edit";
        header("Location: ../../dashboardTemplate/html/admin/admin-profile.php");
    }
}

$con->close();
?>