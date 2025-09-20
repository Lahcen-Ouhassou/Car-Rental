<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendWelcomeEmail($email, $fullname) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.your-email-provider.com';         // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'agency.carrental999@gmail.com';               // SMTP username
        $mail->Password   = 'afik qxge fssk qzuf';                  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('agency.carrental999@gmail.com', 'CARrental');
        $mail->addAddress($email, $fullname);                       // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Welcome to CARrental';
        $mail->Body    = "
        <html>
        <head>
            <style>
                .header {
                    background-color: #3b5998;
                    color: white;
                    padding: 10px;
                    text-align: center;
                }
                .body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }
            </style>
        </head>
        <body>
            <div class='header'>
                <h1>Welcome to CARrental!</h1>
            </div>
            <div class='body'>
                <p>Hey $fullname,</p>
                <p>Welcome aboard CARrental! 🚀 Thanks for signing up! We're thrilled to have you join our community.</p>
                <p>Happy Renting!</p>
                <p>Best regards,<br>The CARrental Team</p>
            </div>
        </body>
        </html>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
?>
