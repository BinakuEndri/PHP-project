<?php
session_start();

$con = require "../database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM complains WHERE ID='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        deletePhotos($paths);
        $_SESSION['Complain_delete'] = "Complain deleted successfuly";
        header("Location: ../../dashboardTemplate/html/tenant/complain.php");
    } else {
        $_SESSION['Complain_delete_fail'] = "Failed to delete ";
        header("Location: ../../dashboardTemplate/html/tenant/complain.php");
    }
}

$con->close();
?>