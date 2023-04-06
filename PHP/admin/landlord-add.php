<?php
session_start();
$con = require "../database.php";
if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['username']) || empty($_POST['number']) || empty($_POST['city'])) {
    $_SESSION['EmptyFields'] = "Empty fields, please fill all the fileds!";
    header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");
} else if ($stmt = $con->prepare('SELECT * FROM owner WHERE Owner_Username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['Landlord_username_error'] = "This username is already used";
        header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");
    } else {

        $sql = 'INSERT INTO owner(Owner_FirstName,Owner_LastName,Owner_Email,Owner_Password,Owner_Username,Owner_Number,Owner_City,Owner_RegisterDate,Owner_img) Values(?,?,?,?,?,?,?,?,?)';
        if ($stmt = $con->prepare($sql)) {
            $image_name = $_FILES['my-image']['name'];
            $image_temp_name = $_FILES['my-image']['tmp_name'];
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            $img_lc = strtolower($img_ex);
            $allowed_array = array("jpg", "jpeg", "png");
            if (in_array($img_lc, $allowed_array)) {
                $new_img_name = $_POST['username'] . "-" . "pic" . "." . $img_lc;
                $upload_path = '../../uploads/landlord/' . $new_img_name;
                move_uploaded_file($image_temp_name, $upload_path);

            } else {
                echo "Wrong format";
            }
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $date = date('y-m-d');
            $stmt->bind_param('sssssssss', $_POST['firstname'], $_POST['lastname'], $_POST['email'], $password, $_POST['username'], $_POST['number'], $_POST['city'], $date, $new_img_name);
            $stmt->execute();


            $_SESSION['Lanldlord_add'] = "Landlord added successfuly ";
            header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");
        } else {
            $_SESSION['Lanldlord_error'] = "Error ocured while adding Landlord";
            header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");

        }
    }
    $stmt->close();
} else {
    $_SESSION['Lanldlord_error'] = "Error ocured while adding Landlord";
    header("Location: ../../dashboardTemplate/html/admin/admin-landlord-add.php");

}
$con->close();
?>