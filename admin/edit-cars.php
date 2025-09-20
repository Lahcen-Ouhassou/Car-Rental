<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$vehicletitle=$_POST['vehicletitle'];
$brand=$_POST['brandname'];
$vehicleoverview=$_POST['vehicalorcview'];
$priceperday=$_POST['priceperday'];
$fueltype=$_POST['fueltype'];
$modelyear=$_POST['modelyear'];
$seatingcapacity=$_POST['seatingcapacity'];
$airconditioner=$_POST['airconditioner'];
$powerdoorlocks=$_POST['powerdoorlocks'];
$antilockbrakingsys=$_POST['antilockbrakingsys'];
$brakeassist=$_POST['brakeassist'];
$powersteering=$_POST['powersteering'];
$driverairbag=$_POST['driverairbag'];
$passengerairbag=$_POST['passengerairbag'];
$powerwindow=$_POST['powerwindow'];
$cdplayer=$_POST['cdplayer'];
$centrallocking=$_POST['centrallocking'];
$crashcensor=$_POST['crashcensor'];
$leatherseats=$_POST['leatherseats'];
$Btv=$_POST['Btv'];
$consumption=$_POST['consumption'];

$id=intval($_GET['id']);

$sql="update cars set carsTitle=:vehicletitle,carsBrand=:brand,carsOverview=:vehicleoverview,PricePerDay=:priceperday,FuelType=:fueltype,ModelYear=:modelyear,SeatingCapacity=:seatingcapacity,AirConditioner=:airconditioner,PowerDoorLocks=:powerdoorlocks,AntiLockBrakingSystem=:antilockbrakingsys,BrakeAssist=:brakeassist,PowerSteering=:powersteering,DriverAirbag=:driverairbag,PassengerAirbag=:passengerairbag,PowerWindows=:powerwindow,CDPlayer=:cdplayer,CentralLocking=:centrallocking,CrashSensor=:crashcensor,LeatherSeats=:leatherseats,Btv=:Btv,consumption=:consumption  where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
$query->bindParam(':airconditioner',$airconditioner,PDO::PARAM_STR);
$query->bindParam(':powerdoorlocks',$powerdoorlocks,PDO::PARAM_STR);
$query->bindParam(':antilockbrakingsys',$antilockbrakingsys,PDO::PARAM_STR);
$query->bindParam(':brakeassist',$brakeassist,PDO::PARAM_STR);
$query->bindParam(':powersteering',$powersteering,PDO::PARAM_STR);
$query->bindParam(':driverairbag',$driverairbag,PDO::PARAM_STR);
$query->bindParam(':passengerairbag',$passengerairbag,PDO::PARAM_STR);
$query->bindParam(':powerwindow',$powerwindow,PDO::PARAM_STR);
$query->bindParam(':cdplayer',$cdplayer,PDO::PARAM_STR);
$query->bindParam(':centrallocking',$centrallocking,PDO::PARAM_STR);
$query->bindParam(':crashcensor',$crashcensor,PDO::PARAM_STR);
$query->bindParam(':leatherseats',$leatherseats,PDO::PARAM_STR);
$query->bindParam(':Btv',$Btv,PDO::PARAM_STR);
$query->bindParam(':consumption',$consumption,PDO::PARAM_STR);




$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";


}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title> Admin Edit Car Info - Agency CarRental </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/new2.css">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon-icon/LOGOrent.jpg">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon-icon/LOGOrent.jpg">
<link rel="apple-touch-icon-precomposed" href="img/favicon-icon/LOGOrent.jpg">
<link rel="shortcut icon" href="img/favicon-icon/LOGOrent.jpg">
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
		</style>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit A Car</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default fm">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT cars.*,brands.BrandName,brands.id as bid from cars join brands on brands.id=cars.carsBrand where cars.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Car Title<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control fm" value="<?php echo htmlentities($result->carsTitle)?>" required>
</div>
<label class="col-sm-2 control-label">Select Brand<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" required>
<option value="<?php echo htmlentities($result->bid);?>"><?php echo htmlentities($bdname=$result->BrandName); ?> </option>
<?php $ret="select id,BrandName from brands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$resultss = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($resultss as $results)
{
if($results->BrandName==$bdname)
{
continue;
} else{
?>
<option value="<?php echo htmlentities($results->id);?>"><?php echo htmlentities($results->BrandName);?></option>
<?php }}} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Car Overview<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control fm" name="vehicalorcview" rows="3" required><?php echo htmlentities($result->carsOverview);?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Day(in DH)<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="priceperday" class="form-control fm" value="<?php echo htmlentities($result->PricePerDay);?>" required>
</div>
<label class="col-sm-2 control-label">Select Fuel Type<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="fueltype" required>
<option value="<?php echo htmlentities($results->FuelType);?>"> <?php echo htmlentities($result->FuelType);?> </option>

<option value=""> Select </option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="Hybrid">Hybrid</option>
<option value="Electricity">Electricity</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Model Year<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<input type="text" maxlength="4" name="modelyear"  class="form-control fm" value="<?php echo htmlentities($result->ModelYear);?>" required>
</div>
<label class="col-sm-2 control-label">Seating Capacity<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="seatingcapacity" class="form-control" value="<?php echo htmlentities($result->SeatingCapacity);?>" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Boite De Vitesse<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="Btv" required>
<option value="<?php echo htmlentities($results->btv);?>" > <?php echo htmlentities($result->btv);?> Select</option>

            <option value="Manual">Manual</option>
            <option value="Automatic">Automatic</option>
</select>
</div>
<label class="col-sm-2 control-label">Car Consumption<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="consumption" class="form-control fm" value="<?php echo htmlentities($result->consumption)?>" required>
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">Car Color<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="colorC" required>
<option value="<?php echo htmlentities($results->colorC);?>"> <?php echo htmlentities($result->colorC);?> Select</option>
			
            <option value="White">White</option>
            <option value="Black">Black</option>
			<option value="Silver"> Silver </option>
            <option value="Gray">Gray</option>
            <option value="Blue">Blue</option>
			<option value="Red"> Red </option>
            <option value="Green">Green</option>
            <option value="Brown">Brown</option>
            <option value="Orange">Orange</option>
</select>
</div>
</div>





<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-12">
<h4><b>Car Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
 <img src="img/vehicleimages/<?php echo htmlentities($result->Cimage1);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id)?>"><span class="changeimg">Change Image 1</span></a>
</div>
<div class="col-sm-4">
<img src="img/vehicleimages/<?php echo htmlentities($result->Cimage2);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id)?>"><span class="changeimg">Change Image 2</span></a>
</div>
<div class="col-sm-4">
<img src="img/vehicleimages/<?php echo htmlentities($result->Cimage3);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id)?>"><span class="changeimg">Change Image 3</span></a>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
<img src="img/vehicleimages/<?php echo htmlentities($result->Cimage4);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id)?>"><span class="changeimg">Change Image 4</span></a>
</div>
<div class="col-sm-4">

<?php if($result->Cimage5=="")
{
echo htmlentities("File not available");
} else {?>
<img src="img/vehicleimages/<?php echo htmlentities($result->Cimage5);?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id)?>"><span class="changeimg">Change Image 5</span></a>
<?php } ?>
</div>

</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
	
							

<div class="row">
            <div class="col-md-12">
                <div class="panel panel-default fm">
                    <div class="panel-heading">Accessories</div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="airconditioner" name="airconditioner" <?php if($result->AirConditioner==1) echo 'checked'; ?> value="1">
                                        <label for="airconditioner"> Air Conditioner </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" <?php if($result->PowerDoorLocks==1) echo 'checked'; ?> value="1">
                                        <label for="powerdoorlocks"> Power Door Locks </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" <?php if($result->AntiLockBrakingSystem==1) echo 'checked'; ?> value="1">
                                        <label for="antilockbrakingsys"> AntiLock Braking System </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="brakeassist" name="brakeassist" <?php if($result->BrakeAssist==1) echo 'checked'; ?> value="1">
                                        <label for="brakeassist"> Brake Assist </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="powersteering" name="powersteering" <?php if($result->PowerSteering==1) echo 'checked'; ?> value="1">
                                        <label for="powersteering"> Power Steering </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="driverairbag" name="driverairbag" <?php if($result->DriverAirbag==1) echo 'checked'; ?> value="1">
                                        <label for="driverairbag"> Driver Airbag </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="passengerairbag" name="passengerairbag" <?php if($result->PassengerAirbag==1) echo 'checked'; ?> value="1">
                                        <label for="passengerairbag"> Passenger Airbag </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="powerwindows" name="powerwindows" <?php if($result->PowerWindows==1) echo 'checked'; ?> value="1">
                                        <label for="powerwindows"> Power Windows </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="cdplayer" name="cdplayer" <?php if($result->CDPlayer==1) echo 'checked'; ?> value="1">
                                        <label for="cdplayer"> CD Player </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="centrallocking" name="centrallocking" <?php if($result->CentralLocking==1) echo 'checked'; ?> value="1">
                                        <label for="centrallocking"> Central Locking </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="crashsensor" name="crashsensor" <?php if($result->CrashSensor==1) echo 'checked'; ?> value="1">
                                        <label for="crashsensor"> Crash Sensor </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" id="leatherseats" name="leatherseats" <?php if($result->LeatherSeats==1) echo 'checked'; ?> value="1">
                                        <label for="leatherseats"> Leather Seats </label>
                                    </div>
                                </div>
                            </div>

<?php }} ?>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-5" >
													<button class="btn btn-submit" name="submit" type="submit" style="margin-top:4%">Save changes</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>