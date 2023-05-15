<?php
$con = require "../database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM property WHERE Property_Id='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "Property Deleted";
    } else {
        echo "Property Not Deleted";

    }
}


$con->close();
?>