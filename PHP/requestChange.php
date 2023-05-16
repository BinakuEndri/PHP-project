<?php

if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
        //

    }
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "localhost/PHP-project/dashboardTemplate/html/createNewPassword.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    $con = require 'database.php';

    $userEmail = $_POST['email'];

    $sql = "DELETE FROM PasswordReset WHERE ResetEmail=?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO PasswordReset (ResetEmail, ResetSelector, ResetToken, ResetExpire) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    require_once('../../API/vendor/autoload.php');

    include_once 'api/templateForgotPassword.php';

    $template = emailTemplate($url);

    $config = ElasticEmail\Configuration::getDefaultConfiguration()
        ->setApiKey('X-ElasticEmail-ApiKey', 'B92A36032DD9532C11B5A842E67C13B77C13D6C734D796CEF0232A2F2B532BF41A69DF4D026D90A83FA7D10FD87AB4AF');

    $apiInstance = new ElasticEmail\Api\EmailsApi(
        new GuzzleHttp\Client(),
        $config
    );

    $email = new \ElasticEmail\Model\EmailMessageData(
        array(
            "recipients" => array(
                new \ElasticEmail\Model\EmailRecipient(array("email" => $userEmail))
            ),
            "content" => new \ElasticEmail\Model\EmailContent(
                array(
                    "body" => array(
                        new \ElasticEmail\Model\BodyPart(
                            array(
                                "content_type" => "HTML",
                                "content" => $template
                            )
                        )
                    ),
                    "from" => "therentopia@gmail.com",
                    "subject" => "Passwrod Recovery"
                )
            )
        )
    );

    try {
        $apiInstance->emailsPost($email);
    } catch (Exception $e) {
        echo 'Exception when calling EE API: ', $e->getMessage(), PHP_EOL;
    }

} else {
    //
}


?>