<?php
$con = require "../database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM owner WHERE Owner_ID='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "User Deleted";
    } else {
        echo "User Not Deleted";

    }
}


$con->close();
?>