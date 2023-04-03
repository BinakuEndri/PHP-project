<?php
$con = require "../database.php";
if (!isset( /*$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['username']*/$_POST['register'])) {
    exit('Empty Fields');
}

if ($stmt = $con->prepare('SELECT * FROM owner WHERE Owner_Username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'Username excists';
    } else {
        $sql = 'INSERT INTO owner(Owner_FirstName,Owner_LastName,Owner_Email,Owner_Password,Owner_Username,Owner_Number,Owner_City,Owner_RegisterDate) Values(?,?,?,?,?,?,?,?)';
        if ($stmt = $con->prepare($sql)) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $date = date('y-m-d');
            $stmt->bind_param('ssssssss', $_POST['firstname'], $_POST['lastname'], $_POST['email'], $password, $_POST['username'], $_POST['number'], $_POST['city'], $date);
            $stmt->execute();
            header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");
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