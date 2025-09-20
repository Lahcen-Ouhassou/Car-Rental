<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login']) == 0) { 
    header('location:index.php');
    exit(); // Add an exit to prevent further execution of the script
}

if(isset($_POST['submit'])) {
    $testimonoial = $_POST['testimonial'];
    $email = $_SESSION['login'];
    $sql = "INSERT INTO testimonial(UserEmail, Testimonial) VALUES (:email, :testimonoial)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':testimonoial', $testimonoial, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId) {
        $_SESSION['msg'] = "Testimonial submitted successfully"; // Store the message in session
        header("location: post-testimonial.php"); // Redirect to the same page
        exit(); // Add an exit to prevent further execution of the script
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again"; // Store the message in session
        header("location: post-testimonial.php"); // Redirect to the same page
        exit(); // Add an exit to prevent further execution of the script
    }
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
<title>Post Testimonial - CarRental</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/stylee.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">


<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="shortcut icon" href="assets/images/favicon-icon/LOGOrent.jpg">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <style>
    .errorWrap {
    padding: 10px;      
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
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
              z-index: 1; 
              overflow: hidden; 
            }
            .page-header h1 {
              font-size: 36px;
              color: #ffffff; 
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
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Post Testimonial</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Post Testimonial</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<?php
$useremail = $_SESSION['login'];
$sql = "SELECT * FROM users WHERE EmailU = :useremail";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        $profilePicture = $result->photo;
        $photoSource = $result->photo_source;

        if ($photoSource == 'gmail') {
            $profilePictureUrl = $profilePicture;
        } else {
            $profilePictureUrl = "uploads/" . $profilePicture;
        }
        ?>
         <section class="user_profile inner_pages">
            <div class="container">
                <div class="user_profile_info gray-bg padding_4x4_40">
                  <div class="upload_user_logo text-center">
                      <!-- Display the profile picture dynamically -->
                      <img src="<?php echo htmlspecialchars($profilePictureUrl); ?>" alt="User Photo" class="center-block img-responsive" style="border-radius: 36px;">
                  </div> 

      <div class="dealer_info">
        <h5><?php echo htmlentities($result->FullName);?></h5>
        <p> <?php echo htmlentities($result->Country); }}?><br>
          <?php echo htmlentities($result->City);?>&nbsp;- <?php echo htmlentities($result->Address);?></p>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <div class="gray-bg field-title">
          <h6 class="uppercase ">Post a Testimonial</h6>
            </div>
           
           
            <?php
if(isset($_SESSION['msg'])) {
    echo '<div class="succWrap"><strong>SUCCESS</strong>:' . htmlentities($_SESSION['msg']) . '</div>';
    unset($_SESSION['msg']); // Clear the session variable
} elseif(isset($_SESSION['error'])) {
    echo '<div class="errorWrap"><strong>ERROR</strong>:' . htmlentities($_SESSION['error']) . '</div>';
    unset($_SESSION['error']); // Clear the session variable
}
?>



          <form  method="post">
          
          
            <div class="form-group">
              <label class="control-label">Testimonail</label>
              <textarea class="form-control white_bg" name="testimonial" rows="4" required=""></textarea>
            </div>
          
           
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-search btn-block" style="
    padding: 17px 28px 15px;
    width: 100%;
    margin-right: 317px;
">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Profile-setting--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<!-- slide cars --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/interface.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/slick.min.js"></script> 


<!-- icon go to top --> 
<script src="assets/js/bootstrap-slider.min.js"></script> 

<!-- loading --> 
<script src="assets/js/loadingscreen.js"></script> 
<!-- / -->

</body>
</html>
<?php  ?>   