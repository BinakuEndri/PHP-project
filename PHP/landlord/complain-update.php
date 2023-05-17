<?php
session_start();
$con = require "../database.php";


if (isset($_POST['sendButton'])) {

    $id = $_POST['id'];
    $message = $_POST['message'];
    $tittle = $_POST['tittle'];
    $reciver_id = $_POST['tenantId'];

    $query = "UPDATE complains SET Title ='$tittle', Message ='$message' , Reciver_ID = '$reciver_id'
    WHERE ID ='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Complain_edit'] = "Complain edited successfuly";
        header("Location: ../../dashboardTemplate/html/landlord/landlord-complain.php");
    } else {
        $_SESSION['Complain_edit_fail'] = "Complain failed to edit";
        header("Location: ../../dashboardTemplate/html/landlord/landlord-complain.php");

    }
}
$con->close();
?>