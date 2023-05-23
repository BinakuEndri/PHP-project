<?php
session_start();
$con = require "../database.php";

function addPhotos($name, $path)
{
    $images = array();
    for ($i = 1; $i < 6; $i++) {
        $image_name = $_FILES[$name . "" . $i]['name'];
        $image_temp_name = $_FILES[$name . "" . $i]['tmp_name'];
        $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
        $img_lc = strtolower($img_ex);
        $allowed_array = array("jpg", "jpeg", "png");
        if (in_array($img_lc, $allowed_array)) {
            $new_img_name = $_POST['number'] . "-" . "pic" . $i . "." . $img_lc;
            $upload_path = '../../uploads/' . $path . '/' . $new_img_name;
            move_uploaded_file($image_temp_name, $upload_path);

        } else {
            echo "Wrong format";
        }
        array_push($images, $new_img_name);
    }
    return $images;
}
if (
    empty($_POST['type']) ||
    empty($_POST['number']) ||
    empty($_POST['city']) ||
    empty($_POST['address']) ||
    empty($_POST['rent']) ||
    $_POST['owner'] == 'Default select'
) {
    $_SESSION['EmptyFields'] = "Empty fields, please fill all the fileds!";
    header("Location: ../../dashboardTemplate/html/landlord/landlord-property-add.php");
} else if ($stmt = $con->prepare('SELECT * FROM property WHERE Property_Number = ?')) {
    $stmt->bind_param('s', $_POST['number']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['Property_number_error'] = "This number is already used";
        header("Location: ../../dashboardTemplate/html/landlord/landlord-property-add.php");
    } else {
        $sql = 'INSERT INTO property(
        Property_Type,
        Property_Number,s
        Property_City,
        Property_Address,
        RentAmount,
        Size,
        Property_Owner,
        Property_Cover,
        Property_img_2,
        Property_img_3,
        Property_img_4,
        Property_img_5,
        Property_RegisterDate
        ) 
        Values(?,?,?,?,?,?,?,?,?,?,?,?,?)';
        if ($stmt = $con->prepare($sql)) {
            $date = date('y-m-d');
            $images = addPhotos("image", "property");
            $stmt->bind_param(
                'ssssssssssss',
                $_POST['type'],
                $_POST['number'],
                $_POST['city'],
                $_POST['address'],
                $_POST['rent'],
                $_POST['size'],
                $_POST['owner'],
                $images[0],
                $images[1],
                $images[2],
                $images[3],
                $images[4],
                $date

            );
            $stmt->execute();
            $_SESSION['Property_add'] = "Property added successfuly";
            header("Location: ../../dashboardTemplate/html/landlord/landlord-property-add.php");
        } else {
            $_SESSION['Property_error'] = "Error ocured while adding Property";
            header("Location: ../../dashboardTemplate/html/landlord/landlord-property-add.php");
        }
    }
    $stmt->close();
} else {
    $_SESSION['Property_error'] = "Error ocured while adding Property";
    header("Location: ../../dashboardTemplate/html/landlord/landlord-property-add.php");
}
$con->close();
?>