<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>CarRental</title>


<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/stylee.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">

<!-- AOS animate -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">



<!-- scroll cars -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>


<!-- icons slider cars -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="shortcut icon" href="assets/images/favicon-icon/LOGOrent.jpg">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

<!-- Banners -->
<section id="banner" class="banner-section">
  <div class="container">
    <div class="div_zindex">
      <div class="row">
        <div class="col-md-5 col-md-push-7">
          <div class="banner_content" >
            <h1>Drive Into Comfort " Your Perfect Journey Awaits with us "</h1>
       
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Banners --> 

<!-- Resent Cat-->
<section class="section-padding gray-bg rcar ">
  <div class="container">
    <div class="section-header text-center">
      <h2>Premium Ads</h2>
      <div class="lineex"></div>
    </div>
    <style>
      .ic:hover{
  left:-4px;
}
  .car-slider img {
    height: auto; 
    width: auto;
  }
  .recent-car-list{
    margin:10px 10px;
  }
  .slick-dots {
    position: absolute;
    bottom: -54px;
    display: block;
    width: 100%;
    padding: 0;
    margin: 0;
    list-style: none;
    text-align: center;
}
  .slick-dots li.slick-active button:before {
    padding-left: -17px;
    font-size: 7px;
    opacity: .90;
    color: #5e503d;
    transition: transform 0.4s ease;
}
.slick-dots li button:hover:before, .slick-dots li button:focus:before {
  color: none;
  opacity: none;
}
.slick-dots li button:before{
    color:#5e503d;
    font-family: 'slick';
    font-size: 6px;
    line-height: 20px;
    position: absolute;
    left: 0;
    width: 20px;
    height: 20px;
    content: '•';
    text-align: center;
    opacity: .25;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
  .slick-arrow.slick-next {
    right: -22px !important;
    left: inherit;
  }
  .slick-next.slick-arrow::before{
    content: '\f105'; 
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 23px;
            display: inline-block;
            vertical-align: middle;
            color:#c4aea5;
  }
 
        .slick-prev.slick-arrow::before {
            content: '\f104'; 
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 23px; 
            display: inline-block;
            vertical-align: middle; 
            color:#c4aea5;
        }
        .recent-car-list {
  height: 500px;
}
.tesusers {
  text-align: left !important;
  width: 210px !important;
  color: white;
  font-size: 14px;
}
</style>

<div class="row">
  <!-- السيارات الجديدة المدرجة حديثًا -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="resentnewcar">
      <div class="car-slider" >
      <?php
$sql = "SELECT cars.carsTitle, brands.BrandName, cars.PricePerDay, cars.FuelType, cars.ModelYear, cars.consumption, cars.Btv, cars.id, cars.SeatingCapacity, cars.colorC, cars.Cimage1 
        FROM cars 
        JOIN brands ON brands.id=cars.carsBrand
        WHERE cars.ModelYear IN (2023, 2024)
        LIMIT 6";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
    foreach ($results as $result) {
?>
        <div>
          <div class="recent-car-list">
            <a href="cars-details.php?vhid=<?php echo htmlentities($result->id);?>">
              <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Cimage1);?>" class="img-responsive" alt="img">
              
            </a>
            <div class="car-title-m">
              <h6>
                <a href="cars-details.php?vhid=<?php echo htmlentities($result->id);?>">
                  <h6 class="brandc"><?php echo htmlentities($result->BrandName);?></h6>
                  <?php echo htmlentities($result->carsTitle);?>
                </a>
              </h6>
              <span class="price"><?php echo htmlentities($result->PricePerDay);?> DH | Day</span> 
            </div>
            <hr class="line_infocar">
            <br><br><br><br><br><br>
            <a href="cars-details.php?vhid=<?php echo htmlentities($result->id);?>">
              <div class="car-info-box">
                <ul>
                  <li><i class="fa-solid fa-gas-pump icon" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
                  <li><i class="fa fa-calendar icon" aria-hidden="true"></i> Model<?php echo htmlentities($result->ModelYear);?></li>
                  <li><i class="fa-solid fa-oil-can icon" aria-hidden="true"></i><?php echo htmlentities($result->consumption);?></li>
                  <li><i class="fa-solid fa-gauge icon" aria-hidden="true"></i><?php echo htmlentities($result->Btv);?></li>
                  <li><i class="fa fa-user icon" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li> 
                  <li><i class="fa-solid fa-paint-roller icon" aria-hidden="true"></i><?php echo htmlentities($result->colorC);?></li> 
                </ul>
              </div>
            </a>
          </div>
        </div>
        <?php 
          }
        } ?>
      </div>
    </div>
  </div>
</div>  
</section>

<!-- /Resent Cat --> 
  
<!-- /Form --> 

<style>
  .button {
    margin-top: 43px;
    width: 202px;
    height: 56px !important;
    border: 1px solid #9c805c;
    font-size: 16px;
    cursor: pointer;
}
.btnn{
    color: white;
}

</style>


<div class="section sf">
    <div class="content">
        <div class="box" >
        <p class="pf">
        <h3 class="tit">Ultimate Comfort <br><span class="tit1">Car Rentals</span></h3>  
     <p class="p">Discover the best car rental experience in our premier service. We offer comfort quality and exceptional customer satisfaction. Enjoy smooth and safe driving with the latest models equipped with modern features , Know that you have chosen the best !</p></p>
      </div>
      <button class="button btnhov " title="Visit"> <a class="" href="car-listing.php" style="color: white;"> <i class="fa-solid fa-eye"></i> Visit The Showroom</a></button>
    </div>
    
</div>


<!-- Fun Facts-->
<h2 class="wawe" >Why Are We ?</h2>
<br>
<div class="lineex2"></div>
<section class="fun-facts-section">
    <div class="container div_zindex" >
        <div class="row">
            <div class="col-lg-3 col-xs-6 col-sm-6">
                <div class="cell">
                    <i class="fa-regular fa-circle-check icon1" aria-hidden="true"></i>
                    <h6 style="font-size: 14px;display: inline-block;font-weight: 700;">QUALITY</h6>
                    <p class="pwhy">Our cars undergo rigorous quality checks to ensure an outstanding rental experience, prioritizing visitor comfort at every step.</p>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6 col-sm-6">
                <div class="cell">
                    <i class="fa-solid fa-hand-holding-dollar icon1" aria-hidden="true"></i>
                    <h6 style="font-size: 14px;display: inline-block;font-weight: 700;">A BIG CHOICE</h6>
                   

                    <p class="pwhy">We provide a diverse selection of rental cars to fit every budget, complemented by personalized service to enhance your experience !</p>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6 col-sm-6">
                <div class="cell">
                    <i class="fa-solid fa-bolt icon1" aria-hidden="true"></i>
                    <h6 style="font-size: 14px;display: inline-block;font-weight: 700;">SELL EASILY AND QUICKLY</h6>
                    <p class="pwhy">Premium packages designed to make renting your car comfortable, easy, and hassle-free !</p>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6 col-sm-6">
                <div class="cell">
                    <i class="fa-solid fa-handshake-angle icon1" aria-hidden="true"></i>
                    <h6 style="font-size: 14px;display: inline-block;font-weight: 700;">ASSISTANCE</h6>
                    <p class="pwhy">A young team at your service, to listen to you and guide you towards the best choice.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /Fun Facts--> 


<!--Testimonial -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>Our Satisfied <span>Customers</span></h2>
      <div class="lineex2"></div>
    </div>
    <div class="row">
      <div id="testimonial-slider">
<?php 
$tid=1;
$sql = "SELECT testimonial.Testimonial,users.FullName from testimonial join users on testimonial.UserEmail=users.EmailU where testimonial.status=:tid";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


        <div class="testimonial-m">
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5 style="font-weight: 500;"><?php echo htmlentities($result->FullName);?></h5>
            <p class="tesusers"><?php echo htmlentities($result->Testimonial);?></p>
          </div>
        </div>
        </div>
        <?php }} ?>
        
      
  
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Testimonial--> 


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
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/interface.js"></script> 
<script src="./assets/js/bootstrap.min.js"></script> 
<script src="./assets/js/owl.carousel.min.js"></script>

<script src="../assets/js/slick.min.js"></script> 


<!-- icon go to top --> 
<script src="./assets/js/bootstrap-slider.min.js"></script> 
 

<!-- loading --> 
<script src="./assets/js/loadingscreen.js"></script> 
<!-- / -->

<!-- AOS animate --> 
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<!-- / -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.car-slider').slick({
      dots: true,
      infinite: true,
      speed: 300, // Increased speed for smoother transitions
      cssEase: 'ease-in-out', // Smoother easing function
      slidesToShow: 3,
      slidesToScroll: 2,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  });


</script>
</body>
</html>