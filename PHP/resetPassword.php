<?php

if (isset($_POST["reset-password"])) {


    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];


    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../dashboardTemplate/html/createNewPassword.php");
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location: ../dashboardTemplate/html/createNewPassword.php");
        exit();
    }

    $currentDate = date("U");

    $con = require 'database.php';

    $sql = "SELECT * FROM passwordreset WHERE ResetSelector=? AND ResetExpire >= ?";

    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!!!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to re-submit your reset request.";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["ResetToken"]);

            if ($tokenCheck === false) {
                echo "You need to re-submit your reset request.";
                exit();
            } elseif ($tokenCheck === true) {

                $tokenEmail = $row['ResetEmail'];

                $sql = "SELECT * FROM owner WHERE Owner_Email=?;";
                $stmt = mysqli_stmt_init($con);

                $query = "SELECT * FROM tenant WHERE Tenant_Email=?;";
                $stmtt = mysqli_stmt_init($con);


                if (!mysqli_stmt_prepare($stmt, $sql) || !mysqli_stmt_prepare($stmtt, $query)) {
                    echo "There was an error!1";
                    exit();
                } else if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if (!$row = mysqli_fetch_assoc($result)) {
                        if (mysqli_stmt_prepare($stmtt, $query)) {
                            mysqli_stmt_bind_param($stmtt, "s", $tokenEmail);
                            mysqli_stmt_execute($stmtt);
                            $result = mysqli_stmt_get_result($stmtt);

                            if (!$row = mysqli_fetch_assoc($result)) {
                                echo "There was an error!5";
                                exit();
                            } else {

                                $sql = "UPDATE tenant SET Tenant_Password=? WHERE Tenant_Email=?";
                                $stmt = mysqli_stmt_init($con);

                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    echo "There was an error!6";
                                    exit();
                                } else {
                                    $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                    mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                                    mysqli_stmt_execute($stmt);

                                    $sql = "DELETE FROM passwordreset WHERE ResetEmail=?";
                                    $stmt = mysqli_stmt_init($con);

                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "There was an error!7";
                                        exit();
                                    } else {
                                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                        mysqli_stmt_execute($stmt);
                                        header("Location: ../dashboardTemplate/html/login.php");
                                    }
                                }

                            }
                        }
                        exit();
                    } else {

                        $sql = "UPDATE owner SET Owner_Password=? WHERE Owner_Email=?";
                        $stmt = mysqli_stmt_init($con);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error!3";
                            exit();
                        } else {
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM passwordreset WHERE ResetEmail=?";
                            $stmt = mysqli_stmt_init($con);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error!4";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../dashboardTemplate/html/login.php");
                            }
                        }

                    }

                }
            }
        }
    }




} else {
    header("Location: ../dashboardTemplate/html/login.php");
    exit();
}



?>