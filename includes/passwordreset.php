<script src="../assets/js/sweetalert.js"></script> <!-- Ensure you have the correct path to sweetalert.min.js -->

<?php
include_once('config.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if token is valid
    $sql = "SELECT EmailU FROM users WHERE reset_token=:token AND reset_token_expiry > NOW()";
    $query = $dbh->prepare($sql);
    $query->bindParam(':token', $token, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        // Token is valid, allow user to reset password
        if (isset($_POST['reset'])) {
            $newpassword = $_POST['newpassword'];
            $confirmpassword = $_POST['confirmpassword'];

            if ($newpassword === $confirmpassword) {
                $hashedPassword = md5($newpassword); // Or use a stronger hash function like password_hash
                $email = $result->EmailU;

                $sql = "UPDATE users SET Password=:newpassword, reset_token=NULL, reset_token_expiry=NULL WHERE EmailU=:email";
                $query = $dbh->prepare($sql);
                $query->bindParam(':newpassword', $hashedPassword, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->execute();

                ?> &nbsp;<script>
                    swal({
                        title: 'Success',
                        text: 'Your Password has been Reset Successfully.',
                        icon: 'success',
                        button: false
                    }).then(function() {
                        window.location.href = '../index.php#loginform';
                    });
                    </script><?php
            } else {
                ?> &nbsp;<script>
                    swal({
                        title: 'Error',
                        text: 'Passwords Do Not Match.',
                        icon: 'error',
                        button: false
                    });
                    </script> <?php
            }
        }
    } else {
        echo "<script>
            swal({
                title: 'Error!',
                text: 'Invalid or expired token.',
                icon: 'error',
                button: false
            });
            </script>";
    }
} else {
    echo "<script>
        swal({
            title: 'Error!',
            text: 'No token provided.',
            icon: 'error',
            button: false
        });
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Added viewport meta tag -->
    <title>Password Reset - CarRental</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/stylee.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/images/favicon-icon/LOGOrent.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/images/favicon-icon/LOGOrent.jpg">
    <link rel="apple-touch-icon-precomposed" href="../assets/images/favicon-icon/LOGOrent.jpg">
    <link rel="shortcut icon" href="../assets/images/favicon-icon/LOGOrent.jpg">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 

    <style>
        .container {
            margin-top: 50px;
        }
        .panel {
            border:none;
            border-radius: 0px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
        .panel-body {
            padding: 20px;
        }
        .form-group label {
            font-weight: bold;
            font-size: 16px; /* Increase font size for better readability */
        }
        .btn-primary {
            background-color: #9c805c;
            border-color: #9c805c;
        }
        .btn-primary:focus{
            background-color:#6C5B45 !important;
            outline:none;
            border:none !important;
        }
        .text-center {
            text-align: center;
        }
        /* Media Queries */
        @media (max-width: 768px) {
            .container {
                margin-top: 20px;
            }
            .col-md-6 {
                width: 100%;
            }
            .form-group label {
                font-size: 14px; /* Reduce font size for smaller screens */
            }
            .row{
                margin-top: 75px !important;
            }
        }
        .backto:hover{
  right:9px !important;
  text-shadow:none !important;
}
    </style>
</head>
<body>
<div id="loading-screen">
        <div class="loader">
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
        </div>
  </div>
    <div class="container">
        <div class="row justify-content-center" style="
    display: flex;
    justify-content: center;
    margin-top: 160px;
">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center" style="
    padding: 7px;
    border-bottom: 1px #e5e5e5 solid;
    padding-bottom: 20px;
    text-align: justify;
">Password Recovery</h3>
                        <form method="post" onsubmit="return validatePasswords();" style="
    padding-top: 20px;
">
                            <div class="form-group">
                          
                                <input type="password" placeholder="New Password" name="newpassword" class="form-control" required>
                            </div>
                            <div class="form-group">
                               
                                <input type="password" placeholder="Confirm New Password" name="confirmpassword" class="form-control" required>
                            </div>
                            <button type="submit" name="reset" class="btn btn-primary btn-block"style="
    margin-top: 37px;
    margin-bottom: 21px;
    border-radius: 108px;
">Reset Password</button>
                        </form>
                        <div class="text-center mt-3">
                            <p><a href="../index.php#loginform"  class="backto" style="
    transition: 0.5s;
    right: 0;
    position: relative;
"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validatePasswords() {
            var newPassword = document.getElementsByName('newpassword')[0].value;
            var confirmPassword = document.getElementsByName('confirmpassword')[0].value;

            if (newPassword !== confirmPassword) {
                swal({
                    title: "Error",
                    text: "New Password and Confirm Password do not match.",
                    icon: "error",
                    button: false
                });
                return false;
            }
            return true;
        }
    </script>


    <!-- loading --> 
<script src="../assets/js/loadingscreen.js"></script> 
<!-- / -->


</body>
</html>
