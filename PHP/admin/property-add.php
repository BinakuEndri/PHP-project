<?php
session_start();
$con = require "../database.php";
echo '<script>console.log(' . $_POST['type'] . ');</script>';
if (empty($_POST['type']) || empty($_POST['number']) || empty($_POST['city']) || empty($_POST['address']) || empty($_POST['rent']) || $_POST['owner'] == 'Default select') {
    $_SESSION['EmptyFields'] = "Empty fields, please fill all the fileds!";
    header("Location: ../../dashboardTemplate/html/admin/admin-property-add.php");
} else if ($stmt = $con->prepare('SELECT * FROM property WHERE Property_Number = ?')) {
    $stmt->bind_param('s', $_POST['number']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['Property_number_error'] = "This number is already used";
        header("Location: ../../dashboardTemplate/html/admin/admin-property-add.php");
    } else {
        $sql = 'INSERT INTO property(Property_Type,Property_Number,Property_City,Property_Address,RentAmount,Property_Owner) Values(?,?,?,?,?,?)';
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param('ssssss', $_POST['type'], $_POST['number'], $_POST['city'], $_POST['address'], $_POST['rent'], $_POST['owner']);
            $stmt->execute();
            $_SESSION['Property_add'] = "Property added successfuly";
            header("Location: ../../dashboardTemplate/html/admin/admin-property-add.php");
        } else {
            $_SESSION['Property_error'] = "Error ocured while adding Property";
            header("Location: ../../dashboardTemplate/html/admin/admin-property-add.php");
        }
    }
    $stmt->close();
} else {
    $_SESSION['Property_error'] = "Error ocured while adding Property";
    header("Location: ../../dashboardTemplate/html/admin/admin-property-add.php");
}
$con->close();
?>