<?php
session_start();
$con = require "../database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $photo_query = "SELECT Tenant_Img from tenant where Tenant_ID ='$id'";

    $res = mysqli_query($con, $photo_query);

    $photo = $res->fetch_assoc();

    $path = "../../uploads/tenant/" . $photo["Tenant_Img"];

    $query = "DELETE FROM tenant WHERE Tenant_ID='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        if (!empty($photo)) {
            unlink($path);
        }
        $_SESSION['Tenant_delete'] = "Tenant deleted successfuly";
        header("Location: ../../dashboardTemplate/html/admin/admin-tenant.php");
    } else {
        $_SESSION['Tenant_delete_fail'] = "Tenat to delete ";
        header("Location: ../../dashboardTemplate/html/admin/admin-tenant.php");
    }
}


$con->close();
?>