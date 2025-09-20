<?php
require_once 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setClientId('410622163909-9v2upvbgtmf9784umajlrrpvq7mmsora.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/carrental/includes/google-callback.php');
$client->addScope('email');
$client->addScope('profile');

$authUrl = $client->createAuthUrl();
header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
