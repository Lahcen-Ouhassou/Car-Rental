<script src="assets/js/sweetalert.js"></script>

<?php 
session_start();
include('includes/config.php');
error_reporting(0);

if(isset($_POST['submit'])) {
    $fromdate = $_POST['FromDate'];
    $todate = $_POST['ToDate']; 
    $message = $_POST['message'];
    $useremail = $_SESSION['login'];
    $status = 0;
    $vhid = $_GET['vhid'];

    // Calculate number of days
    $startDate = strtotime($fromdate);
    $endDate = strtotime($todate);
    $daysB = ceil(($endDate - $startDate) / (60 * 60 * 24)); // Calculate number of days and round up

    // Fetch vehicle details
    $sqlVehicle = "SELECT PricePerDay FROM cars WHERE id = :vhid";
    $queryVehicle = $dbh->prepare($sqlVehicle);
    $queryVehicle->bindParam(':vhid', $vhid, PDO::PARAM_STR);
    $queryVehicle->execute();
    $vehicleDetails = $queryVehicle->fetch(PDO::FETCH_ASSOC);

    if($vehicleDetails) {
        $pricePerDay = $vehicleDetails['PricePerDay'];
        $totalPrice = $pricePerDay * $daysB; // Calculate total price
    } else {
        // Handle error if car details not found
        ?>
&nbsp;<script>
  
  
swal({
title: "Car details Not Found",
text: "                     ",
icon: "warning",
button: false,
});
</script>

<?php
        exit;
    }

    // Check for existing reservations
    $sqlCheck = "SELECT * FROM reservation 
                 WHERE carsId = :vhid 
                 AND ((FromDate <= :ToDate AND ToDate >= :FromDate) OR (FromDate <= :FromDate AND ToDate >= :ToDate))";
    $queryCheck = $dbh->prepare($sqlCheck);
    $queryCheck->bindParam(':vhid', $vhid, PDO::PARAM_STR);
    $queryCheck->bindParam(':FromDate', $fromdate, PDO::PARAM_STR);
    $queryCheck->bindParam(':ToDate', $todate, PDO::PARAM_STR);
    $queryCheck->execute();
    $numRows = $queryCheck->rowCount();

    if($numRows > 0) {
        // There are overlapping reservations

        ?>
        &nbsp;<script>
        
          
        swal({
        title: "This car is already reserve for the selected Dates.",
        text: "Please choose different dates.",
        icon: "error",
        button: false,
        });
        </script>
        
        <?php


    } else {
        // Insert booking into database
        $sql = "INSERT INTO reservation (userEmail, carsId, FromDate, ToDate, message, Status, daysB, T_price) 
                VALUES (:useremail, :vhid, :FromDate, :ToDate, :message, :status, :daysB, :totalPrice)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
        $query->bindParam(':FromDate', $fromdate, PDO::PARAM_STR);
        $query->bindParam(':ToDate', $todate, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':daysB', $daysB, PDO::PARAM_INT);
        $query->bindParam(':totalPrice', $totalPrice, PDO::PARAM_INT);
        $query->execute();

        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {
            
        ?>
        &nbsp;<script>
        
          
        swal({
        title: "Reservation Successful.",
        text: "                        ",
        icon: "success",
        button: false,
        });
        </script>
        
        <?php
        }
        else 
        {   
        ?>
        &nbsp;<script>
        
          
        swal({
        title: "Something went wrong.",
        text: "Please try again",
        icon: "error",
        button: false,
        });
        </script>
        
        <?php

            
        ?>
        &nbsp;<script>
        
          
        swal({
        title: "This car is already reserve for the selected Dates.",
        text: "Please choose different dates.",
        icon: "error",
        button: false,
        });
        </script>
        
        <?php

        }
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
<title> Car Details - CarRental</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!-- Style -->
<link rel="stylesheet" href="assets/stylee.css" type="text/css">
<!--Carousel slider Cars-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<!--fonts family-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

<!--flatpickr input date-->
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"/>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="shortcut icon" href="assets/images/favicon-icon/LOGOrent.jpg">

</head>

<style>
   .owl-buttons div {
  display: none;
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
                @media (max-width:767px) {
                  .btnreserve{
                    margin-right: 214px !important;
                  }
                }
 
</style>
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


<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <?php
        // Fetch necessary data from the database
        $vhid = intval($_GET['vhid']);
        $sql = "SELECT cars.*, brands.BrandName FROM cars JOIN brands ON brands.id = cars.carsBrand WHERE cars.id = :vhid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':vhid', $vhid, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Sanitize and display brand name and car title
        $brandName = htmlentities($result['BrandName']);
        $carTitle = htmlentities($result['carsTitle']);
        ?>
        <h1><?php echo $brandName; ?>  <?php echo $carTitle; ?></h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="car-listing.php">Showroom</a></li>
        <li><?php echo $brandName; ?>  <?php echo $carTitle; ?></li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>

<br><br>
<!--Listing-Image-Slider-->
<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT cars.*,brands.BrandName,brands.id as bid  from cars join brands on brands.id=cars.carsBrand where cars.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

<section id="listing_img_slider">
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Cimage1);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Cimage2);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Cimage3);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Cimage4);?>" class="img-responsive"  alt="image" width="900" height="560"></div>
  <?php if($result->Cimage5=="")
{

} else {
  ?>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Cimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?>
</section>
<!--/Listing-Image-Slider-->


<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2><?php echo htmlentities($result->BrandName);?> - <?php echo htmlentities($result->carsTitle);?></h2>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p class="dh"><?php echo htmlentities($result->PricePerDay);?> DH </p>Per Day
         
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
          <li> <i class="fa-solid fa-gas-pump" style="color: #9c805c;" aria-hidden="true" ></i> 
              <h5 style="
    font-weight: unset;
"><?php echo htmlentities($result->FuelType);?></h5>
              <p style="font-weight: 500;font-size: 13px;">Fuel Type</p>
            </li>

            <li> <i class="fa fa-calendar" style="color: #9c805c;" aria-hidden="true"></i>
              <h5 style="
    font-weight: unset;
"><?php echo htmlentities($result->ModelYear);?></h5>
              <p style="font-weight: 500;font-size: 13px;">Module Year</p>
            </li>
            <li> <i class="fa-solid fa-oil-can" style="color: #9c805c;" aria-hidden="true"></i>
              <h5 style="
    font-weight: unset;
"><?php echo htmlentities($result->consumption);?></h5>
              <p style="font-weight: 500;font-size: 13px;">Consumption Car</p>
            </li>
            
            <li> <i class="fa-solid fa-gauge" style="color: #9c805c;" aria-hidden="true"></i>  
              <h5 style="
    font-weight: unset;
"><?php echo htmlentities($result->Btv);?></h5>
              <p style="font-weight: 500;font-size: 13px;">Boite De Vitesse</p>
            </li>

            <li> <i class="fa fa-user" style="color: #9c805c;" aria-hidden="true"></i>
              <h5 style="
    font-weight: unset;
"><?php echo htmlentities($result->SeatingCapacity);?></h5>
              <p style="font-weight: 500;font-size: 13px;">Seats</p>
            </li>

            <li><i class="fa-solid fa-paint-roller" style="color: #9c805c;" aria-hidden="true"></i>
              <h5 style="
    font-weight: unset;
"><?php echo htmlentities($result->colorC);?></h5>
              <p style="font-weight: 500;font-size: 13px;">Color Car</p>
            </li>
            
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Car Description </a></li>
          
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Options</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                
                <p><?php echo htmlentities($result->carsOverview);?></p>
              </div>
              
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Air Conditioner</td>
<?php if($result->AirConditioner==1)
{
?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?> 
   <td><i class="fa fa-close" aria-hidden="true"></i></td>
  <?php } ?> </tr>

<tr>
<td>AntiLock Braking System</td>
<?php if($result->AntiLockBrakingSystem==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
                    </tr>

<tr>
<td>Power Steering</td>
<?php if($result->PowerSteering==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>


<tr>

<td>Power Windows</td>

<?php if($result->PowerWindows==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>CD Player</td>
<?php if($result->CDPlayer==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Leather Seats</td>
<?php if($result->LeatherSeats==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Central Locking</td>
<?php if($result->CentralLocking==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Power Door Locks</td>
<?php if($result->PowerDoorLocks==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
                    </tr>
                    <tr>
<td>Brake Assist</td>
<?php if($result->BrakeAssist==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php  } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Driver Airbag</td>
<?php if($result->DriverAirbag==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
 </tr>
 
 <tr>
 <td>Passenger Airbag</td>
 <?php if($result->PassengerAirbag==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Crash Sensor</td>
<?php if($result->CrashSensor==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
   
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3">
  <div class="sidebar_widget">
    <div class="widget_heading">
      <h5 style="
    color: white;
"><i class="fa fa-envelope" style="color:white;" aria-hidden="true"></i>Reserve Now</h5>
    </div>
    <form method="post">
      <div class="form-group">
        <label for="">From Date</label>
        <input type="text"  id="datepicker" class="form-control" name="FromDate" placeholder="From Date"    required>
      </div>
      <div class="form-group">
        <label for="">To Date</label>
        <input type="text"  id="datepicker" class="form-control" name="ToDate" placeholder="To Date"    required>

      </div>
      <div class="form-group">
        <label for="">Message</label>
        <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
      </div>
      <?php if($_SESSION['login']) { ?>
      <div class="form-group">
        <input type="submit" class="btn btnreserve btn-search" name="submit" value="Reserve" style="
    margin-right: 112px;
">
      </div>
      <?php } else { ?>
      <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Reserve</a>
      <?php } ?>
    </form>
  </div>
</aside>

      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    <div class="similar_cars">
      <h3>Similar Cars</h3>
      <div class="row">
<?php 
$bid=$_SESSION['brndid'];
$sql="SELECT cars.carsTitle,brands.BrandName,cars.PricePerDay,cars.FuelType,cars.consumption,cars.ModelYear,cars.id,cars.SeatingCapacity,cars.Btv,cars.carsOverview,cars.colorC,cars.Cimage1 from cars join brands on brands.id=cars.carsBrand where cars.carsBrand=:bid";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>      
        <div class="col-md-3 grid_listing">
          <div class="product-listing-m gray-bg">
          <a href="cars-details.php?vhid=<?php echo htmlentities($result->id);?>">
          <div class="imgb">
            <div class="product-listing-img"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Cimage1);?>" class="img-responsive" alt="image" />
            <div class="overlay"></div>
            </div>
            </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="cars-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?>-<?php echo htmlentities($result->carsTitle);?></a></h5>
              <p class="list-price"><?php echo htmlentities($result->PricePerDay);?> DH | Day</p>
          
              <ul class="features_list">
              <li><i class="fa-solid fa-gas-pump" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i>Model <?php echo htmlentities($result->ModelYear);?> </li>
              <li><i class="fa-solid fa-oil-can" aria-hidden="true"></i><?php echo htmlentities($result->consumption);?> </li>
              <li><i class="fa-solid fa-gauge" aria-hidden="true"></i><?php echo htmlentities($result->Btv);?></li>
              <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> Seats</li>
              <li><i class="fa-solid fa-paint-roller" aria-hidden="true"></i><?php echo htmlentities($result->colorC);?> </li>                
              </ul>
            </div>
          </div>
        </div>
 <?php }} ?>       

      </div>
    </div>
    <!--/Similar-Cars--> 
    
  </div>
</section>
<!--/Listing-detail--> 

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

<!-- script flatpickr --> 
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- / -->

    <script>
      flatpickr("#datepicker", {
        dateFormat: "Y-m-d", // Set the date format
        allowInput: true, // Allow manual input of dates
        altInput: true, // Enable an alternative input field
        altFormat: "F j, Y", // Set the format for the alternative input field
        minDate: "today", // Restrict dates to today and future dates
        // Placeholder text
        // You can add more customization options as needed
      });
    </script>
</body>
</html>