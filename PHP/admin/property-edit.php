<?php
session_start();
$con = require "../database.php";

function editPhotos($name, $hidden, $path)
{
    $images = array();
    for ($i = 1; $i < 6; $i++) {
        if (isset($_FILES[$name . "" . $i])) {
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
        }
        if (empty($image_name)) {
            $new_img_name = $_POST[$hidden . "" . $i];
        }
        array_push($images, $new_img_name);
    }
    return $images;
}

if (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $owner = $_POST['owner'];
    $rent = $_POST['rent'];

    $images = editPhotos("image", "img", "property");
    $date = date('y-m-d');
    $query = "UPDATE property SET Property_Number ='$number',
    Property_Address ='$address',
    Property_City ='$city',
    Property_Owner='$owner', 
    RentAmount='$rent', 
    Property_Cover = '$images[0]',
    Property_img_2 = '$images[1]',
    Property_img_3 = '$images[2]',
    Property_img_4= '$images[3]',
    Property_img_5 = '$images[4]',
    Property_ModifiedDate = '$date'
    WHERE Property_ID ='$id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['Property_edit'] = "Property edited successfuly";
        header("Location: ../../dashboardTemplate/html/admin/admin-property.php");
    } else {
        $_SESSION['Property_edit_fail'] = "Property failed to edit";
        header("Location: ../../dashboardTemplate/html/admin/admin-property.php");

    }
}
$con->close();
?>