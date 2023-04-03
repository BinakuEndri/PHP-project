<?php
$con = require "../database.php";
if (!isset( /*$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['username']*/$_POST['register'])) {
    exit('Empty Fields');
}

if ($stmt = $con->prepare('SELECT * FROM tenant WHERE tenant_Username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'Username excists';
    } else {
        $sql = 'INSERT INTO tenant(Tenant_FirstName,Tenant_LastName,Tenant_Email,Tenant_Password,Tenant_Username) Values(?,?,?,?,?)';
        if ($stmt = $con->prepare($sql)) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sssss', $_POST['firstname'], $_POST['lastname'], $_POST['email'], $password, $_POST['username']);
            $stmt->execute();
            header("Location: ../../dashboardTemplate/html/admin/admin-tenant-add.php");
        } else {
            echo ' Error';
        }
    }
    $stmt->close();
} else {
    echo 'Error ocured';
}
$con->close();
?>