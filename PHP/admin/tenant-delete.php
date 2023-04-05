<?php
session_start();
$con = require "../database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM tenant WHERE Tenant_ID='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Tenant_delete'] = "Tenant deleted successfuly";
        header("Location: ../../dashboardTemplate/html/admin/admin-tenant.php");
    } else {
        $_SESSION['Tenant_delete_fail'] = "Tenat to delete ";
        header("Location: ../../dashboardTemplate/html/admin/admin-tenant.php");
    }
}


$con->close();
?>