<?php
session_start();
$con = require "../database.php";
if (empty($_POST['tenantId']) && empty($_POST['landlordId']) && empty($_POST['tittle']) && empty($_POST['message']) && isset($_POST['sendButton'])) {
    $_SESSION['EmptyFields'] = "Empty fields, please fill all the fileds!";
    header("Location: ../../dashboardTemplate/html/tenant/complain.php");
} else {
    $sql = 'INSERT INTO complains(
            Tenant_ID,
            Landlord_ID,
            Title,
            Message,
            Date
        ) Values(?,?,?,?,?)';
    if ($stmt = $con->prepare($sql)) {
        $complainDate = date('y-m-d');
        $stmt->bind_param(
            'sssss',
            $_POST['tenantId'],
            $_POST['landlordId'],
            $_POST['tittle'],
            $_POST['message'],
            $complainDate
        );
        $stmt->execute();
        $_SESSION['Complain_Success'] = "Complain sent successfuly";
        header("Location: ../../dashboardTemplate/html/tenant/complain.php");
    }
}


?>