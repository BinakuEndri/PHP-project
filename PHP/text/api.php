<?php
require_once('../../API/vendor/autoload.php');

$config = ElasticEmail\Configuration::getDefaultConfiguration()
    ->setApiKey('X-ElasticEmail-ApiKey', 'B92A36032DD9532C11B5A842E67C13B77C13D6C734D796CEF0232A2F2B532BF41A69DF4D026D90A83FA7D10FD87AB4AF');

$apiInstance = new ElasticEmail\Api\EmailsApi(
    new GuzzleHttp\Client(),
    $config
);

$email = new \ElasticEmail\Model\EmailMessageData(
    array(
        "recipients" => array(
            new \ElasticEmail\Model\EmailRecipient(array("email" => "binakuendri@gmail.com"))
        ),
        "content" => new \ElasticEmail\Model\EmailContent(
            array(
                "body" => array(
                    new \ElasticEmail\Model\BodyPart(
                        array(
                            "content_type" => "HTML",
                            "content" => "My content"
                        )
                    )
                ),
                "from" => "therentopia@gmail.com",
                "subject" => "My Subject"
            )
        )
    )
);

try {
    $apiInstance->emailsPost($email);
} catch (Exception $e) {
    echo 'Exception when calling EE API: ', $e->getMessage(), PHP_EOL;
}