<?php
$con = require "../database.php";

if (!empty($_POST["id"])) {
    $id = $_POST["id"];
    $complainQuery = "select * from complains where ID = '$id' ";
    $complainResultt = mysqli_query($con, $complainQuery);
    $complainn = mysqli_fetch_assoc($complainResultt);

    $complainTittle = $complainn["Title"];
    $complainMessage = $complainn["Message"];

    $newValues = array(
        'input1' => $complainTittle,
        'input2' => $complainMessage
    );

    echo json_encode($newValues);

}

if (isset($_POST["idd"])) {
    $id = $_POST["idd"];
    $complainQuery = "select * from complains where ID = '$id' ";
    $complainResultt = mysqli_query($con, $complainQuery);


    $complainn = mysqli_fetch_assoc($complainResultt);

    $complainSender = $complainn["Sender_ID"];
    $complainReciver = $complainn["Reciver_ID"];
    $complainTittle = $complainn["Title"];
    $complainMessage = $complainn["Message"];
    $complainReply = $complainn["Reply"];

    $newValues = array(
        'input1' => $complainTittle,
        'input2' => $complainMessage,
        'input3' => $complainReply
    );

    echo json_encode($newValues);


}