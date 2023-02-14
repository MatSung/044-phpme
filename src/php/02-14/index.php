<?php

require_once './vendor/autoload.php';

$text = 'Hello World';
$host = 'smtp.gmail.com';
$port = 587;
$username = 'testtest@gmail.com';
$password = 'testtest';
$emailMessaenger = new App\Services\Messengers\EmailMessengerService($host, $username, $password);
$emailMessaenger->send('hello@nonamez.name', $text);
$smsMessager = new App\Services\Messengers\SmsMessengerService();
$smsMessager->send('+37061234567', $text);
$facebookAppName = 'test-name';
$facebookAppKey  = '';
$facebookConnector = new App\Connectors\FacebookConnector($facebookAppName, $facebookAppKey);
$facebookMessenger = new App\Services\Messengers\FacebookMessengerService($facebookConnector);
$facebookMessenger->send(4, $text);

echo 'done';