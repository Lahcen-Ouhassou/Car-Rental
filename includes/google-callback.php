<?php
require_once 'vendor/autoload.php'; // Ensure the path to autoload.php is correct
require_once 'config.php';
session_start();

$client = new Google_Client();
$client->setClientId('410622163909-9v2upvbgtmf9784umajlrrpvq7mmsora.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/carrental/includes/google-callback.php');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Get user info
    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();

    $email = $userInfo->email;
    $fullName = $userInfo->name;
    $profilePicture = $userInfo->picture;

    // Check if user already exists in the database
    $sql = "SELECT * FROM users WHERE EmailU = :email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // User exists, log them in
        $_SESSION['login'] = $email;
        $_SESSION['fname'] = $user['FullName'];
        $_SESSION['photo'] = $user['photo']; // Store the profile picture in session
        header('Location: ../index.php'); // Redirect to your main page
    } else {
        // User doesn't exist, register them
        $sql = "INSERT INTO users (FullName, EmailU, Password, photo, photo_source) VALUES (:fullname, :email, :password, :photo, 'gmail')";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fullname', $fullName, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', md5(rand()), PDO::PARAM_STR); // Generate a random password
        $query->bindParam(':photo', $profilePicture, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

        if ($lastInsertId) {
            $_SESSION['login'] = $email;
            $_SESSION['fname'] = $fullName;
            $_SESSION['photo'] = $profilePicture; // Store the profile picture in session
            header('Location: ../index.php'); // Redirect to your main page
        } else {
            echo "Error in registration. Please try again.";
        }
    }
} else {
    header('Location: ../login.php'); // Redirect to login page
}
?>
