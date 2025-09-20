<script src="assets/js/sweetalert.js"></script>

<?php
session_start();
include('includes/config.php');

// Custom error handler
function customError($errno, $errstr, $errfile, $errline) {
    error_log("Error: [$errno] $errstr - $errfile:$errline", 3, "errors.log");
    return true;
}
set_error_handler("customError");

if(isset($_POST['send'])) {
    $name = htmlspecialchars(trim($_POST['fullname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $PhoneNumber = htmlspecialchars(trim($_POST['PhoneNumber']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Server-side validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format";
    } elseif(!preg_match('/^[0-9]{10}$/', $PhoneNumber)) {
        $_SESSION['error'] = "Invalid phone number format";
    } else {
        try {
            $sql = "INSERT INTO contactus(name, EmailId, ContactNumber, Message) VALUES(:name, :email, :PhoneNumber, :message)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':PhoneNumber', $PhoneNumber, PDO::PARAM_STR);
            $query->bindParam(':message', $message, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId) {
                $_SESSION['msg'] = "Query Sent. We will contact you shortly";
            } else {
                $_SESSION['error'] = "Something went wrong. Please try again";
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
        }
    }
    header('Location: contact-us.php');
    exit;
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Contact Us - CarRental</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/stylee.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/LOGOrent.jpg">
    <link rel="shortcut icon" href="assets/images/favicon-icon/LOGOrent.jpg">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .page-header {
            background-image: url('assets/images/pexel.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            border: 0 none;
            margin: 0 auto;
            padding: 60px 0;
            position: relative;
            text-align: justify;
            z-index: 0;
            overflow: hidden;
        }
        .page-header h1 {
            font-size: 36px;
            color: #ffffff;
        }

       

    </style>
    <script>
    // Client-side validation
    function validateForm() {
        var email = document.getElementById('emailaddress').value;
        var phone = document.getElementById('phonenumber').value;
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        var phonePattern = /^[0-9]{10}$/;

        if (!emailPattern.test(email)) {
            swal({
title: "Please enter a valid email Address",
text: "                     ",
icon: "error",
button: false,
});

            
            return false;
        }
        if (!phonePattern.test(phone)) {
            swal({
title: "Please enter a valid phone Number",
text: "                     ",
icon: "error",
button: false,
});
            return false;
        }
        return true;
    }

</script>

</head>
<body style="background-color: #eeeeee !important;">
<div id="loading-screen">
        <div class="loader">
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
        </div>
  </div>
<?php include('includes/header.php');?>

<section class="page-header">
    <div class="container" >
        <div class="page-header_wrap" >
            <div class="page-heading">
                <h1>Contact Us</h1>
            </div>
            <ul class="coustom-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>

<section class="contact_us section-padding center-content" style="background-color: #eeeeee !important;">
    <div class="container">
        <div class="row ro">
            <div class="col-md-6">
                <h3 class="h3">Get in touch using the form below</h3><br><p>Please fill out this form to contact us</p>
                <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
                    <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($_SESSION['error']); unset($_SESSION['error']); ?> </div>
                <?php elseif(isset($_SESSION['msg']) && !empty($_SESSION['msg'])): ?>
                    <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($_SESSION['msg']); unset($_SESSION['msg']); ?> </div>
                <?php endif; ?>
                <div class="contact_form gray-bgg">
                    <form method="post" onsubmit="return validateForm()">
                        <div class="form-group">
                            <label class="control-label">Full Name <span style="color:red;">*</span></label>
                            <input type="text" name="fullname" class="form-control white_bg" id="fullname" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email Address <span style="color:red;">*</span></label>
                            <input type="email" name="email" class="form-control white_bg" id="emailaddress" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone Number <span style="color:red;">*</span></label>
                            <input type="text" name="PhoneNumber" maxlength="10" class="form-control white_bg" id="phonenumber" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Message <span style="color:red;">*</span></label>
                            <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btnhov" type="submit" name="send">Send Message <i class="fa-regular fa-message" aria-hidden="true" style="padding-left: 9px;"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>










<!-- /Contact-us-->

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer-->

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true" style="
    padding-top: 9px;
"></i> </a> </div>
<!--/Back to top-->

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form -->

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form -->

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<!-- Scripts --> 
<!-- slide cars --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/interface.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/slick.min.js"></script> 


<!-- icon go to top --> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!-- / --> 

<!-- loading --> 
<script src="assets/js/loadingscreen.js"></script> 
<!-- / -->

</body>
</html>