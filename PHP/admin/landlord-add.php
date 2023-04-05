<?php
session_start();
$con = require "../database.php";
if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['username']) || empty($_POST['number']) || empty($_POST['city'])) {
    $_SESSION['EmptyFields'] = "Empty fields, please fill all the fileds!";
    header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");
} else if ($stmt = $con->prepare('SELECT * FROM owner WHERE Owner_Username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['Landlord_username_error'] = "This username is already used";
        header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");
    } else {
        $sql = 'INSERT INTO owner(Owner_FirstName,Owner_LastName,Owner_Email,Owner_Password,Owner_Username,Owner_Number,Owner_City,Owner_RegisterDate) Values(?,?,?,?,?,?,?,?)';
        if ($stmt = $con->prepare($sql)) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $date = date('y-m-d');
            $stmt->bind_param('ssssssss', $_POST['firstname'], $_POST['lastname'], $_POST['email'], $password, $_POST['username'], $_POST['number'], $_POST['city'], $date);
            $stmt->execute();
            $_SESSION['Lanldlord_add'] = "Landlord added successfuly";
            header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");
        } else {
            $_SESSION['Lanldlord_error'] = "Error ocured while adding Landlord";
            header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");

        }
    }
    $stmt->close();
} else {
    $_SESSION['Lanldlord_error'] = "Error ocured while adding Landlord";
    header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");

}
$con->close();
?>