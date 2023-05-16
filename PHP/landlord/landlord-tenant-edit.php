<?php
$con = require "../database.php";

if (isset($_POST['edit'])) {    
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $modifiedDate = date('y-m-d');

    $query = "UPDATE tenant SET 
    Tenant_FirstName ='$firstname', 
    Tenant_LastName ='$lastname', 
    Tenant_Number='$number',
    Tenant_Username='$username', 
    Tenant_City='$city',
    Tenant_Email ='$email',
    Tenant_ModifiedDate='$modifiedDate',
    Tenant_Img = '$img'
    WHERE Tenant_ID='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<h1> Tenant edited successfuly</h1>";

    } else {
        echo "Tenant failed to edit";

    }
}


$con->close();
?>