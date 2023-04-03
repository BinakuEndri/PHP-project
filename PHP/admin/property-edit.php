<?php
$con = require "../database.php";

if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $number = $_POST['number'];
    $address = $_POST['lastname'];
    $city = $_POST['city'];
    $owner = $_POST['owner'];

    $query = "UPDATE owner SET Property_Number ='$number', Property_Address ='$address',Property_City ='$city',Property_Owner='$owner' WHERE Property_ID ='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<h1> User Edited </h1>";

    } else {
        echo "User Not Editeds";

    }
}


$con->close();
?>