<?php
session_start();

function addPhotos($name, $path)
{
    $images = array();
    for ($i = 0; $i < 5; $i++) {
        $image_name = $_FILES[$name . "" . $i]['name'];
        $image_temp_name = $_FILES[$name . "" . $i]['tmp_name'];
        $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
        $img_lc = strtolower($img_ex);
        $allowed_array = array("jpg", "jpeg", "png");
        if (in_array($img_lc, $allowed_array)) {
            $new_img_name = $_POST['username'] . "-" . "pic" . "." . $img_lc;
            $upload_path = '../../uploads/.' . $path . '/' . $new_img_name;
            move_uploaded_file($image_temp_name, $upload_path);

        } else {
            echo "Wrong format";
        }
        array_push($images, $new_img_name);
    }
}
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
        $sql = 'INSERT INTO property(Property_Type,Property_Number,Property_City,Property_Address,RentAmount,Property_Owner,Property_img) Values(?,?,?,?,?,?,?)';
        if ($stmt = $con->prepare($sql)) {
            addPhotos("image", "property");
            $stmt->bind_param('sssssss', $_POST['type'], $_POST['number'], $_POST['city'], $_POST['address'], $_POST['rent'], $_POST['owner'], $images[0], $images[1], $images[2], $images[3], $images[4]);
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