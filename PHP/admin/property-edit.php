<?php
session_start();
$con = require "../database.php";

if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $owner = $_POST['owner'];

    $query = "UPDATE property SET Property_Number ='$number', Property_Address ='$address',Property_City ='$city',Property_Owner='$owner' WHERE Property_ID ='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Property_edit'] = "Property edited successfuly";
        header("Location: ../../dashboardTemplate/html/admin/admin-property.php");
    } else {
        $_SESSION['Property_edit_fail'] = "Property failed to edit";
        header("Location: ../../dashboardTemplate/html/admin/admin-property.php");

    }
}
$con->close();
?>