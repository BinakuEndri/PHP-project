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
            $upload_path = '../../uploads/landlord/' . $img;
            move_uploaded_file($image_temp_name, $upload_path);

        } else {
            echo "Wrong format";
        }

    }
    if (empty($image_name)) {
        $img = $_POST['img'];
    }

    $query = "UPDATE owner SET Owner_FirstName ='$firstname', 
    Owner_LastName ='$lastname', 
    Owner_Number='$number',
    Owner_Username='$username', 
    Owner_City='$city',
    Owner_Email ='$email',
    Owner_ModifiedDate='$modifiedDate',
    Owner_img ='$img' 
    WHERE Owner_ID='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Landlord_edit'] = "Landlord edited successfuly: " . $img;
        header("Location: ../../dashboardTemplate/html/admin/admin-landlord.php");
    } else {
        $_SESSION['Landlord_edit_fail'] = "Landlord failed to edit";
        header("Location: ../../dashboardTemplate/html/admin/admin-landlord.php");


    }
}


$con->close();
?>