<?php
$con = require "../database.php";

if (isset($_POST['edit'])) {    
    $id = $_POST['id'];
    $type = $_POST['type'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $number = $_POST['number'];

    $query = "UPDATE property SET Property_Type ='$type', Property_Address ='$address',Property_City ='$city',Property_Number='$number' WHERE Property_ID ='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<h1> Property Edited </h1>";

    } else {
        echo "Property Not Edited";

    }
}


$con->close();
?>