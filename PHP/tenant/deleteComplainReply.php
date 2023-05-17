<?php
session_start();
$con = require "../database.php";


if (isset($_POST['deleteReply'])) {

    $id = $_POST['id'];

    $query = "UPDATE complains SET Reply = NULL, Reply_Date = NULL
    WHERE ID ='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Complain_Reply'] = "Complain Reply Deleted successfuly";
        header("Location: ../../dashboardTemplate/html/tenant/complainsTenant.php");
    } else {
        $_SESSION['Complain_reply_fail'] = "Failed to delete reply to complain";
        header("Location: ../../dashboardTemplate/html/tenant/complainsTenant.php");

    }
}
$con->close();
?>