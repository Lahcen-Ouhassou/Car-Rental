<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit();
} else {
    try {
        // Update visitor_fullname in reservation table
        $sql = "UPDATE reservation r
                JOIN users u ON r.userEmail = u.EmailU
                SET r.visitor_fullname = u.FullName";
        $query = $dbh->prepare($sql);
        $query->execute();
        $count = $query->rowCount(); // Number of rows updated
       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
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
    <title>My Reservation - CarRental</title>
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
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/LOGOrent.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/LOGOrent.jpg">
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/LOGOrent.jpg">
    <link rel="shortcut icon" href="assets/images/favicon-icon/LOGOrent.jpg">
    <!-- Google-Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
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
        .dowpdf{
  font-size: 17px;
    margin-top: 6px;
    width: 77%;
    font-weight: 800;
    line-height: 30px;
    background:#9c805c  none repeat scroll 0 0;
    border:none;
    transition: 0.6s;
    color:white !important;
}   
.dowpdf:hover{
  background-color: #6C5B45;
  fill: white;
  text-shadow:none;
  color: #ffffff;
	outline:none;
  
}
.downl{
  display: contents;
    font-size: 14px;
    transition: 0.9s;
    position: relative;
    top: 0;
}
       .page-header h1 {
            font-size: 36px;
            color: #ffffff; /* White text */
        }

        .profile_wrap {
    width: 575px;
    bottom: 305px;
    position: relative;
    left: 218px;
    margin-left: 68px;
}

.vehicle_item {
    margin-bottom: 20px;
}

.vehicle_img img {
    width: 100%;
    height: auto;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .profile_wrap {
      display: contents;
        width: 100%;
        bottom: auto;
        left: auto;
        margin-left: auto;
        padding: 15px;
    }
    .dowpdf {
      width: 33%;
    }
}
.cancelled{
    background-color:white;
}
.cancelled:hover{
    color:white !important;
    text-shadow:none;
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
    <!--Page Header-->
    <!-- /Header -->
    <!--Page Header-->
    <section class="page-header profile_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>My Reservation</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>My Reservation</li>
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
                    <p><?php echo htmlentities($result->Country); ?><br>
                    <?php echo htmlentities($result->City);?>&nbsp;- <?php echo htmlentities($result->Address); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php include('includes/sidebar.php');?>
                </div>
                <div class="col-md-6 col-sm-8">
    <div class="profile_wrap" style="
        width: 575px;
        bottom: 305px;
        position: relative;
        left: 218px;
        margin-left: 68px;
    ">
        <div class="gray-bg field-title">
            <h6 class="uppercase">My Reservation</h6>
        </div>
        <div class="my_vehicles_list">
            <ul class="vehicle_listing">
                <?php
                $sql = "SELECT cars.Cimage1 as Cimage1, cars.carsTitle, cars.id as vid, brands.BrandName, reservation.id as rid, reservation.FromDate, reservation.ToDate, reservation.daysB, reservation.T_price, reservation.Status from reservation join cars on reservation.carsId=cars.id join brands on brands.id=cars.carsBrand where reservation.userEmail=:useremail";
                $query = $dbh -> prepare($sql);
                $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0) {
                    foreach($results as $result) {
                ?>
                <li class="vehicle_item">
                    <div class="vehicle_img">
                        <a href="cars-details.php?vhid=<?php echo htmlentities($result->vid);?>">
                            <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Cimage1);?>" alt="image">
                        </a>
                    </div>
                    <div class="vehicle_title">
                        <h6>
                            <a href="cars-details.php?vhid=<?php echo htmlentities($result->vid);?>">
                                <?php echo htmlentities($result->BrandName);?> - <?php echo htmlentities($result->carsTitle);?>
                            </a>
                        </h6>
                        <p>
                            <b style="font-size: 15px; color: #69573ddc; font-weight: 800;">From :</b> <?php echo htmlentities($result->FromDate);?><br />
                            <b style="font-size: 15px; color: #69573ddc; font-weight: 800;">To :</b> <?php echo htmlentities($result->ToDate);?><br>
                            <b style="font-size: 15px; color: #69573ddc; font-weight: 800;">Reservation Days:</b> <?php echo htmlentities($result->daysB);?> Days<br/>
                            <b style="font-size: 15px; color: #69573ddc; font-weight: 800;">Total Price:</b> <?php echo htmlentities($result->T_price);?> DH<br />
                        </p>
                    </div>
                    <?php if($result->Status==1) { ?>
                        <div class="vehicle_status">
                            <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>
                            <div class="clearfix"></div>
                            <div class="download-pdf">
                      <button class="dowpdf"><a href="generate_pdf.php?download_pdf=1&reservation_id=<?php echo $result->rid; ?>"style="
    padding-left: 12px;
    margin-top: 5px;
    width: 112px;
    font-size: 12px;
    color: white;
"> PDF</a> <div class="downl"><i class="fa-solid fa-download"></i></div></button>          
                            </div>
                        </div>
                    <?php } else if($result->Status==2) { ?>
                        <div class="vehicle_status">
                            <a href="#" class="btn cancelled btn-xs" style="
    color: red;
    border: 1px solid red;
">Cancelled</a>
                            <div class="clearfix"></div>
                        </div>
                    <?php } else { ?>
                        <div class="vehicle_status">
                            <a href="#" class="btn outline btn-xs">Not Confirmed yet</a>
                            <div class="clearfix"></div>
                        </div>
                    <?php } ?>
                </li>
                <?php } } ?>
            </ul>
        </div>
    </div>
</div>
    </section>
    <?php } } ?>
    <!--/my-vehicles-->
    <?php include('includes/footer.php');?>

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
