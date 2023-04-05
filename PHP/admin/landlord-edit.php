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

    $query = "UPDATE owner SET Owner_FirstName ='$firstname', Owner_LastName ='$lastname', Owner_Number='$number',Owner_Username='$username', Owner_City='$city',Owner_Email ='$email',Owner_ModifiedDate='$modifiedDate' WHERE Owner_ID='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Landlord_edit'] = "Landlord edited successfuly";
        header("Location: ../../dashboardTemplate/html/admin/admin-landlord.php");
    } else {
        $_SESSION['Landlord_edit_fail'] = "Landlord failed to edit";
        header("Location: ../../dashboardTemplate/html/admin/admin-landlord.php");


    }
}


$con->close();
?>