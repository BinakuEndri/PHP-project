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

    $query = "UPDATE owner SET 
    Tenant_FirstName ='$firstname', 
    Tenant_LastName ='$lastname', 
    Tenant_Number='$number',
    Tenant_Username='$username', 
    Tenant_City='$city',
    Tenant_Email ='$email',
    Tenant_ModifiedDate='$modifiedDate' 
    WHERE Tenant_ID='$id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Tenant_edit'] = "Tenant edited successfuly";
        header("Location: ../../dashboardTemplate/html/admin/admin-tenant.php");
    } else {
        $_SESSION['Tenant_edit_fail'] = "Tenant failed to edit";
        header("Location: ../../dashboardTemplate/html/admin/admin-tenant.php");


    }
}


$con->close();
?>