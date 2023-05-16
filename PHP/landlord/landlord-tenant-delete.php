<?php
$con = require "../database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM tenant WHERE Tenant_ID='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "Tenant Deleted";
    } else {
        echo "Tenant Not Deleted";

    }
}


$con->close();
?>