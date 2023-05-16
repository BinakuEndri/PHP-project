<?php
session_start();
$con = require "../database.php";

if (isset($_POST['delete']) && isset($_POST['accountActivation'])) {
    $id = $_POST['id'];
    $photo_query = "SELECT Owner_img from owner where Owner_ID ='$id'";

    $res = mysqli_query($con, $photo_query);

    $photo = $res->fetch_assoc();

    $path = "../../uploads/landlord/" . $photo["Owner_Img"];

    $query = "DELETE FROM owner WHERE Owner_ID='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        if (!empty($photo)) {
            unlink($path);
        }
        header("Location: ../../template/index.php");
    } else {
        $_SESSION['Landlord_delete_fail'] = "Failed to delete ";
        header("Location: ../../dashboardTemplate/html/landlord/landlord-account-edit.php");
    }
} else {

    $_SESSION['Delete_fail'] = "Check the box to delete ";
    header("Location: ../../dashboardTemplate/html/landlord/landlord-account-edit.php");
}



$con->close();
?>