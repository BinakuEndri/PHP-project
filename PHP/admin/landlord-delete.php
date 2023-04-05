<?php
session_start();
$con = require "../database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM owner WHERE Owner_ID='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Landlord_delete'] = "Landlord deleted successfuly";
        header("Location: ../../dashboardTemplate/html/admin/admin-landlord.php");
    } else {
        $_SESSION['Landlord_delete_fail'] = "Failed to delete ";
        header("Location: ../../dashboardTemplate/html/admin/admin-landlord.php");
    }
}


$con->close();
?>