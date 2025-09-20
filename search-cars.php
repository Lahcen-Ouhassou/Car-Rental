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
<title> Search Cars - CarRental</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/stylee.css" type="text/css">

<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/LOGOrent.jpg">
<link rel="shortcut icon" href="assets/images/favicon-icon/LOGOrent.jpg">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
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
            .page-header h1 {
              font-size: 36px;
              color: #ffffff; /* White text */
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

<!--Page Header-->
<section class="page-header ">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Search Cars</h1>
      </div>
      <ul class="coustom-breadcrumb">
      <li><a href="index.php">Home</a></li>
        <li><a href="car-listing.php">Showroom</a></li>
        <li>Search Cars</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
            <?php 
            // Récupération des valeurs postées
            $brand = $_POST['brand'];
            $fueltype = $_POST['fueltype']; 
            $model_year = $_POST['model_year'];
            $Btv = $_POST['Btv'];
            
            // Requête SQL pour compter le nombre de voitures correspondant aux critères de recherche
            $sql_count = "SELECT COUNT(*) as total FROM cars 
                          WHERE carsBrand = :brand 
                          AND FuelType = :fueltype
                          AND ModelYear = :model_year
                          AND Btv = :Btv";
                          
            $query_count = $dbh->prepare($sql_count);
            $query_count->bindParam(':brand', $brand, PDO::PARAM_STR);
            $query_count->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
            $query_count->bindParam(':model_year', $model_year, PDO::PARAM_STR);
            $query_count->bindParam(':Btv', $Btv, PDO::PARAM_STR);
            $query_count->execute();
            $total_results = $query_count->fetch(PDO::FETCH_ASSOC)['total'];
            ?>
            <p><span><?php echo htmlentities($total_results);?> Listings</span></p>
          </div>
        </div>
        <div class="car-listings">
        <?php 
        // Requête SQL pour récupérer les détails des voitures correspondant aux critères de recherche
        $sql = "SELECT cars.*,brands.BrandName,brands.id as bid  
                FROM cars 
                JOIN brands ON brands.id = cars.carsBrand 
                WHERE cars.carsBrand = :brand 
                AND cars.FuelType = :fueltype 
                AND cars.ModelYear = :model_year
                AND cars.Btv = :Btv";
               
        $query = $dbh->prepare($sql);
        $query->bindParam(':brand', $brand, PDO::PARAM_STR);
        $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);   
        $query->bindParam(':model_year', $model_year, PDO::PARAM_STR);
        $query->bindParam(':Btv', $Btv, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0) {
          foreach($results as $result) { ?>  


                <div class="car-card">
                <div class="product-listing-img">
                <div class="imgb">
                <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Cimage1);?>" class="img-responsive" alt="Image" /> 
                <div class="overlay"></div>
                </div>
              </div>




             <div class="product-listing-content">
                  <h5><a href="cars-details.php?vhid=<?php echo htmlentities($result->id);?>">
                    <?php echo htmlentities($result->BrandName);?> - <?php echo htmlentities($result->carsTitle);?></a>
                  </h5>
                  <p class="list-price pricede"><?php echo htmlentities($result->PricePerDay);?> DH | Day</p>
                  <ul>
                  <a href="cars-details.php?vhid=<?php echo htmlentities($result->id);?>" class="lisst">
                  
                    <li><i class="fa-solid fa-gas-pump" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?></li>
                    <li><i class="fa-solid fa-oil-can" aria-hidden="true"></i><?php echo htmlentities($result->consumption);?></li>
                    <li><i class="fa-solid fa-gauge" aria-hidden="true"></i><?php echo htmlentities($result->Btv);?></li>
                    <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
                    <li><i class="fa-solid fa-paint-roller" aria-hidden="true"></i><?php echo htmlentities($result->colorC);?></li>
                      </a>
                  </ul>
               
                </div>
              </div>
              <?php 
            }
          }
          ?>
        </div>
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3 col-md-pull-9">
        <div class="sidebar_widget sw">
          <div class="widget_heading">
            <h5 class="search-options"><i class="fa fa-filter icon-search-options" aria-hidden="true"></i> Find Your  Car </h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-cars.php" method="post">
              <div class="form-group select">
                <select class="form-control" name="brand" style="
    height: 40px;
    font-size: 14px;
">
                  <option> Brand</option>
                  <?php 
                  $sql = "SELECT * from brands ";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  
                  if($query->rowCount() > 0) {
                    foreach($results as $result) { ?>  
                      <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
                  <?php 
                    }
                  } ?>
                </select>
              </div>
              <div class="form-group select">
                <select class="form-control" name="fueltype" style="
    height: 40px;
    font-size: 14px;
">
                  <option> Fuel Type</option>
                  <option value="Petrol">Petrol</option>
                  <option value="Diesel">Diesel</option>
                  <option value="Hybrid">Hybrid</option>
                  <option value="Electricity">Electricity</option>
                </select>
              </div>

              <div class="form-group select">
                <select class="form-control" name="model_year" style="
    height: 40px;
    font-size: 14px;
">
                  <option> Model Year</option>
                  <?php 
                  $sql = "SELECT DISTINCT ModelYear FROM cars ORDER BY ModelYear ASC";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                      <option value="<?php echo htmlentities($result->ModelYear); ?>"><?php echo htmlentities($result->ModelYear); ?></option>
                  <?php } 
                  } ?>
                </select>
              </div>

              <div class="form-group select">
                <select class="form-control" name="Btv" style="
    height: 40px;
    font-size: 14px;
">
                  <option>Boite De Vitesse</option>
                  <option value="Manual">Manual</option>
                  <option value="Automatic">Automatic</option>
                </select>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-block btn-search"> Search Car</button>
              </div>
            </form>
          </div>
        </div>

        <div class="sidebar_widget sw">
          <div class="widget_heading">
            <h5 class="search-options"><i class="fa fa-car icon-search-options" aria-hidden="true"></i> Recently Listed Cars</h5>
          </div>
          <div class="recent_addedcars">
            <ul>
              <?php 
              $sql = "SELECT cars.*,brands.BrandName,brands.id as bid  
                      FROM cars 
                      JOIN brands ON brands.id=cars.carsBrand 
                      ORDER BY id DESC LIMIT 4";
              $query = $dbh->prepare($sql);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0) {
                foreach($results as $result) { ?>  
                  <li class="gray-bg">
                    <div class="recent_post_img"> 
                      <a href="cars-details.php?vhid=<?php echo htmlentities($result->id);?>">
                        <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Cimage1);?>" alt="image">
                      </a> 
                    </div>
                    <div class="recent_post_title"> 
                      <a href="cars-details.php?vhid=<?php echo htmlentities($result->id);?>">
                        <?php echo htmlentities($result->BrandName);?> - <?php echo htmlentities($result->carsTitle);?>
                      </a>
                      <p class="widget_price"><?php echo htmlentities($result->PricePerDay);?> DH | Day</p>
                    </div>
                  </li>
              <?php 
                }
              }
              ?>
            </ul>
          </div>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
  </div>
</section>
<!-- /Listing--> 

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