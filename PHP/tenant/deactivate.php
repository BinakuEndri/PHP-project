<?php
session_start();
$con = require "../database.php";

if (isset($_POST['delete']) && isset($_POST['accountActivation'])) {
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
        header("Location: ../../template/index.php");
    } else {
        $_SESSION['Tenant_delete_fail'] = "Failed to delete ";
        header("Location: ../../dashboardTemplate/html/tenant/tenant-editprofile.php");
    }
} else {

    $_SESSION['Delete_fail'] = "Check the box to delete ";
    header("Location: ../../dashboardTemplate/html/tenant/tenant-editprofile.php");
}



$con->close();
?>