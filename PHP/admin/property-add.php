<?php
$con = require "../database.php";
if (!isset( /*$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['username']*/$_POST['register'])) {
    exit('Empty Fields');
}

if ($stmt = $con->prepare('SELECT * FROM property WHERE Property_Number = ?')) {
    $stmt->bind_param('s', $_POST['Property_Number']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'Username excists';
    } else {
        $sql = 'INSERT INTO property(Property_Type,Property_Number,Property_City,Property_Address,Property_Owner) Values(?,?,?,?,?)';
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param('sssss', $_POST['type'], $_POST['number'], $_POST['city'], $_POST['address'], $_POST['owner']);
            $stmt->execute();
            header("Location: ../../dashboardTemplate/html/admin/admin-dashboard.php");
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