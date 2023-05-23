<?php
session_start();

function paths($con, $id)
{
    $photos_query = "SELECT Property_Cover as img1, 
    Property_img_2 as img2, 
    Property_img_3 as img3,
    Property_img_4 as img4,
    Property_img_5 as img5
    from property Where Property_ID = '$id';
    ";
    $res = mysqli_query($con, $photos_query);

    $paths = array();
    $photo = $res->fetch_assoc();
    for ($i = 1; $i < 6; $i++) {
        if (!empty($photo['img' . $i])) {
            $path = "../../uploads/property/" . $photo['img' . $i];
        } else {
            $path = "";
        }
        array_push($paths, $path);
    }

    return $paths;
}
function deletePhotos($paths)
{
    for ($i = 1; $i < 6; $i++) {
        if (!empty($paths[$i - 1])) {
            unlink($paths[$i - 1]);
        }
    }
}
$con = require "../database.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $paths = paths($con, $id);
    $query = "DELETE FROM property WHERE Property_ID='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        deletePhotos($paths);
        $_SESSION['Property_delete'] = "Property deleted successfuly";
        header("Location: ../../dashboardTemplate/html/landlord/landlord-property.php");
    } else {
        $_SESSION['Property_delete_fail'] = "Failed to delete ";
        header("Location: ../../dashboardTemplate/html/landlord/landlord-property.php");
    }
}

$con->close();
?>