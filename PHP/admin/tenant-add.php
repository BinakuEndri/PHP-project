<?php
session_start();
$con = require "../database.php";
if (!isset( /*$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['username']*/$_POST['register'])) {
    $_SESSION['EmptyFields'] = "Empty fields, please fill all the fileds!";
    header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");
}

if ($stmt = $con->prepare('SELECT * FROM tenant WHERE tenant_Username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['Tenant_username_error'] = "This username is already used";
        header("Location: ../../dashboardTemplate/html/admin/admin-tenant-add.php");
    } else {
        $sql = 'INSERT INTO tenant(
        Tenant_FirstName,
        Tenant_LastName,
        Tenant_Email,
        Tenant_Password,
        Tenant_Username,
        Tenant_Number,
        Tenant_City,
        Tenant_RegisterDate,
        Tenant_Birthday,
        Tenant_Property) Values(?,?,?,?,?,?,?,?,?,?)';
        if ($stmt = $con->prepare($sql)) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $registerdate = date('y-m-d');
            $birthday = date('y-m-d', strtotime($_POST['birthday']));
            $stmt->bind_param(
                'ssssssssss',
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $password,
                $_POST['username'],
                $_POST['number'],
                $_POST['city'],
                $registerdate,
                $birthday,
                $_POST['property'],
            );
            $stmt->execute();
            $_SESSION['Tenant_add'] = "Tenant added successfuly";
            header("Location: ../../dashboardTemplate/html/admin/admin-tenant-add.php");
        } else {
            $_SESSION['Tenant_error'] = "Error ocured while adding Tenant";
            header("Location: ../../dashboardTemplate/html/admin/admin-tenant-add.php");
        }
    }
    $stmt->close();
} else {
    $_SESSION['Tenant_error'] = "Error ocured while adding Tenant";
    header("Location: ../../dashboardTemplate/html/admin/admin-enant-add.php");
}
$con->close();
?>