<?php
session_start();
$con = require "../database.php";

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    if (empty($_POST['oldPassword']) && empty($_POST['newPassword'])) {
        $_SESSION['EmptyFields'] = "Empty fields, please fill all the fileds!";
        header("Location: ../../dashboardTemplate/html/landlord/change-password.php");
    }

    $oldPassword = password_hash($_POST['oldPassword'], PASSWORD_DEFAULT);
    $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);


    $query = "SELECT * FROM Owner WHERE Owner_ID='$id'";

    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($result);

    $password = $row['Owner_Password'];

    if ($oldPassword != $password) {

        $_SESSION['Password_edit_fail'] = "Current password is not correct";
        header("Location: ../../dashboardTemplate/html/landlord/change-password.php");
    } else {
        if ($oldPassword == $newPassword) {
            $_SESSION['Password_edit_fail'] = "New password can't be the same as the old one";
            header("Location: ../../dashboardTemplate/html/landlord/change-password.php");
        }


        $query = "UPDATE Owner SET 
        Owner_Password='$newPassword'
        WHERE Owner_ID='$id'";

        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['Password_edit'] = "Password changed successfuly: ";
            header("Location: ../../dashboardTemplate/landlord/Owner/edit-profile.php");
        } else {
            $_SESSION['Password_edit_fail'] = "Password failed to change";
            header("Location: ../../dashboardTemplate/html/landlord/change-password.php");


        }
    }


}


$con->close();
?>