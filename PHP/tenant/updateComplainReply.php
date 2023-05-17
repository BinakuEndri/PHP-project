<?php
session_start();
$con = require "../database.php";


if (isset($_POST['updateReply'])) {

    $id = $_POST['id'];
    $reply = $_POST['reply'];

    $query = "UPDATE complains SET Reply = '$reply'
    WHERE ID ='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Complain_Reply'] = "Complain Updated successfuly";
        header("Location: ../../dashboardTemplate/html/tenant/complainsTenant.php");
    } else {
        $_SESSION['Complain_reply_fail'] = "Failed to update reply to complain";
        header("Location: ../../dashboardTemplate/html/tenant/complainsTenant.php");

    }
}
$con->close();
?>