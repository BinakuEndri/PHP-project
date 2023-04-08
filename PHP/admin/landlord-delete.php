<?php
session_start();
$con = require "../database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $photo_query = "SELECT Owner_img from owner where Owner_ID ='$id'";
    $res = mysqli_query($con, $photo_query);
    $photo = $res->fetch_assoc();
    $path = "../../uploads/landlord/" . $photo['Owner_img'];


    $query = "DELETE FROM owner WHERE Owner_ID ='$id' ";
    $query_run = mysqli_query($con, $query);




    if ($query_run) {
        unlink($path);
        $_SESSION['Landlord_delete'] = "Landlord deleted successfuly";
        header("Location: ../../dashboardTemplate/html/admin/admin-landlord.php");
    } else {
        $_SESSION['Landlord_delete_fail'] = "Failed to delete ";
        header("Location: ../../dashboardTemplate/html/admin/admin-landlord.php");
    }
}


$con->close();
?>