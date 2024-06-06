<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['updateprofile']))
  {
$name=$_POST['fullname'];
$mobileno=$_POST['mobilenumber'];
$dob=$_POST['dob'];
$adress=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$email=$_SESSION['login'];
$sql="update users set FullName=:name,PhoneNumber=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country where EmailU=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':adress',$adress,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
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
<title> My Profile - CarRental</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/sty.css" type="text/css">
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
              color: #ffffff; /* White text */
                }
                .form-control:focus {
    border: 1px solid #9c805c;
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
    <!-- Header -->
    <?php include('includes/header.php');?>
    <!-- Page Header -->
    <section class="page-header">
    <div class="container">
        <div class="page-heading">
            <h1>My Profile</h1>
        </div>
        <ul class="coustom-breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li>My Profile</li>
        </ul>
    </div>
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
        ?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo text-center">
        <img src="uploads/<?php echo htmlspecialchars($profilePicture); ?>" alt="User Photo" class="center-block img-responsive " style="
    border-radius: 36px;
">
      </div>


      <div class="dealer_info">
        <h5><?php echo htmlentities($result->FullName);?></h5>
        <p><?php echo htmlentities($result->Country);?><br>
          <?php echo htmlentities($result->City);?>&nbsp;-  <?php echo htmlentities($result->Address);?></p>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          
        <div class="gray-bg field-title">
          <h6 class="uppercase ">Genral Settings</h6>
            </div>
          <?php  
         if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
          <form  method="post">
           <div class="form-group">
              <label class="control-label">Reg Date -</label>
             <?php echo htmlentities($result->RegDate);?>
            </div>
             <?php if($result->UpdationDate!=""){?>
            <div class="form-group">
              <label class="control-label">Last Update at  -</label>
             <?php echo htmlentities($result->UpdationDate);?>
            </div>
            <?php } ?>
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control white_bg" name="fullname" value="<?php echo htmlentities($result->FullName);?>" id="fullname" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="<?php echo htmlentities($result->EmailU);?>" name="EmailU" id="email" type="email" required readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="mobilenumber" value="<?php echo htmlentities($result->PhoneNumber);?>" id="phone-number" type="text"  maxlength="10" required>
            </div>
            <div class="form-group">
              <label class="control-label">Date of Birth&nbsp;</label>
              <input class="form-control white_bg" value="<?php echo htmlentities($result->dob);?>" name="dob" id="birth-date" type="date" >
            </div>
            
            <div class="form-group">
              <label class="control-label">Country</label>
              <input class="form-control white_bg"  id="country" name="country" value="<?php echo htmlentities($result->City);?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">City</label>
              <input class="form-control white_bg" id="city" name="city" value="<?php echo htmlentities($result->City);?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">Your Address</label>
              <textarea class="form-control white_bg" name="address" rows="4" ><?php echo htmlentities($result->Address);?></textarea>
              
            </div>
            <?php }} ?>
           
            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn btn-search" style="
    padding: 17px 28px 15px;
    width: 100%;
    margin-right: 317px;
">Save Changes </button>
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
<?php } ?>