<?php
require_once 'vendor/autoload.php';
session_start();

// Charger le .env depuis le même dossier
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // __DIR__ = includes/
$dotenv->load();

// Utilisation des variables
$client = new Google_Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);
$client->addScope('email');
$client->addScope('profile');

$authUrl = $client->createAuthUrl();
header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));

