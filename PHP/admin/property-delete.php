<?php
session_start();
$con = require "../database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM property WHERE Property_ID='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Property_delete'] = "Property deleted successfuly";
        header("Location: ../../dashboardTemplate/html/admin/admin-property.php");
    } else {
        $_SESSION['Property_delete_fail'] = "Failed to delete ";
        header("Location: ../../dashboardTemplate/html/admin/admin-property.php");
    }
}

$con->close();
?>