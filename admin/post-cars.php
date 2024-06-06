<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {	
    header('location:index.php');
} else { 

    if(isset($_POST['submit'])) {
        $vehicletitle = $_POST['vehicletitle'];
        $brand = $_POST['brandname'];
        $vehicleoverview = $_POST['vehicalorcview'];
        $priceperday = $_POST['priceperday'];
        $fueltype = $_POST['fueltype'];
        $modelyear = $_POST['modelyear'];
        $seatingcapacity = $_POST['seatingcapacity'];
        $Cimage1 = $_FILES["img1"]["name"];
        $Cimage2 = $_FILES["img2"]["name"];
        $Cimage3 = $_FILES["img3"]["name"];
        $Cimage4 = $_FILES["img4"]["name"];
        $Cimage5 = $_FILES["img5"]["name"];
        $airconditioner = isset($_POST['airconditioner']) ? 1 : 0;
        $powerdoorlocks = isset($_POST['powerdoorlocks']) ? 1 : 0;
        $antilockbrakingsys = isset($_POST['antilockbrakingsys']) ? 1 : 0;
        $brakeassist = isset($_POST['brakeassist']) ? 1 : 0;
        $powersteering = isset($_POST['powersteering']) ? 1 : 0;
        $driverairbag = isset($_POST['driverairbag']) ? 1 : 0;
        $passengerairbag = isset($_POST['passengerairbag']) ? 1 : 0;
        $powerwindow = isset($_POST['powerwindow']) ? 1 : 0;
        $cdplayer = isset($_POST['cdplayer']) ? 1 : 0;
        $centrallocking = isset($_POST['centrallocking']) ? 1 : 0;
        $crashcensor = isset($_POST['crashcensor']) ? 1 : 0;
        $leatherseats = isset($_POST['leatherseats']) ? 1 : 0;
        $Btv = $_POST['Btv'];
        $consumption = $_POST['consumption'];
        $colorC = $_POST['colorC'];

        move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
        move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
        move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
        move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$_FILES["img4"]["name"]);
        move_uploaded_file($_FILES["img5"]["tmp_name"],"img/vehicleimages/".$_FILES["img5"]["name"]);

        $sql = "INSERT INTO cars (carsTitle, carsBrand, carsOverview, PricePerDay, FuelType, ModelYear, SeatingCapacity, Cimage1, Cimage2, Cimage3, Cimage4, Cimage5, AirConditioner, PowerDoorLocks, AntiLockBrakingSystem, BrakeAssist, PowerSteering, DriverAirbag, PassengerAirbag, PowerWindows, CDPlayer, CentralLocking, CrashSensor, LeatherSeats, Btv, consumption, colorC) VALUES (:vehicletitle, :brand, :vehicleoverview, :priceperday, :fueltype, :modelyear, :seatingcapacity, :Cimage1, :Cimage2, :Cimage3, :Cimage4, :Cimage5, :airconditioner, :powerdoorlocks, :antilockbrakingsys, :brakeassist, :powersteering, :driverairbag, :passengerairbag, :powerwindow, :cdplayer, :centrallocking, :crashcensor, :leatherseats, :Btv, :consumption, :colorC)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
        $query->bindParam(':brand', $brand, PDO::PARAM_INT);
        $query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
        $query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
        $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
        $query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
        $query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_INT);
        $query->bindParam(':Btv', $Btv, PDO::PARAM_STR);
        $query->bindParam(':consumption', $consumption, PDO::PARAM_STR);
        $query->bindParam(':colorC', $colorC, PDO::PARAM_STR);
        $query->bindParam(':Cimage1', $Cimage1, PDO::PARAM_STR);
        $query->bindParam(':Cimage2', $Cimage2, PDO::PARAM_STR);
        $query->bindParam(':Cimage3', $Cimage3, PDO::PARAM_STR);
        $query->bindParam(':Cimage4', $Cimage4, PDO::PARAM_STR);
        $query->bindParam(':Cimage5', $Cimage5, PDO::PARAM_STR);
        $query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_INT);
        $query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_INT);
        $query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_INT);
        $query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_INT);
        $query->bindParam(':powersteering', $powersteering, PDO::PARAM_INT);
        $query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_INT);
        $query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_INT);
        $query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_INT);
        $query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_INT);
        $query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_INT);
        $query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_INT);
        $query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_INT);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        
        if($lastInsertId) {
            $msg = "Car posted successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }
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
	
	<title> Admin Post Car - Agency CarRental </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
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
					
						<h2 class="page-title">Post A Car</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default df">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Car Title<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control fm" required>
</div>

<label class="col-sm-2 control-label">Select Brand<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker " name="brandname" required>
<option value=""> Select </option>
<?php $ret="select id,BrandName from brands";
$query= $dbh -> prepare($ret);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Car Overview<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control fm" name="vehicalorcview" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Day(in DH)<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<input type="number" name="priceperday" class="form-control fm" required>
</div>
<label class="col-sm-2 control-label">Select Fuel Type<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="fueltype" required>
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
        <input type="text" maxlength="4" name="modelyear" class="form-control fm" required maxlength="4">
    </div>

    <label class="col-sm-2 control-label">Seating Capacity<span style="padding-left: 8px;color:red">*</span></label>
    <div class="col-sm-4">
        <input type="number" name="seatingcapacity" class="form-control fm" required>
    </div>
</div>

<label class="col-sm-2 control-label">Car consumption<span style="padding-left: 8px;color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="consumption" class="form-control fm" required>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Boite De Vitesse<span style="padding-left: 8px;color:red">*</span></label>
    <div class="col-sm-4">
        <select class="selectpicker" name="Btv" required>
            <option value=""> Select </option>
            <option value="Manual">Manual</option>
            <option value="Automatic">Automatic</option>
        </select>
    </div>
</div>



<div class="form-group">
    <label class="col-sm-2 control-label">Car Color<span style="padding-left: 8px;color:red">*</span></label>
    <div class="col-sm-4">
        <select class="selectpicker" name="colorC" required>
            <option value=""> Select </option>
            <option value="White">White</option>
            <option value="Black">Black</option>
			<option value="Silver"> Silver </option>
            <option value="Gray">Gray</option>
            <option value="Blue">Blue</option>
			<option value="Red"> Red </option>
            <option value="Green">Green</option>
            <option value="Brown">Brown</option>
        </select>
    </div>
</div>





<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1<span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2<span style="color:red">*</span><input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Image 3<span style="color:red">*</span><input type="file" name="img3" required>
</div>
</div>


<div class="form-group">
<div class="col-sm-4" class="image4">
Image 4<span style="color:red">*</span><input type="file" name="img4" required>
</div>
<div class="col-sm-4">
Image 5<input type="file" name="img5">
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


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="airconditioner" name="airconditioner" value="1">
<label for="airconditioner"> Air Conditioner </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1">
<label for="powerdoorlocks"> Power Door Locks </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1">
<label for="antilockbrakingsys"> AntiLock Braking System </label>
</div></div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="brakeassist" name="brakeassist" value="1">
<label for="brakeassist"> Brake Assist </label>
</div>
</div>



<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powersteering" name="powersteering" value="1">
<input type="checkbox" id="powersteering" name="powersteering" value="1">
<label for="inlineCheckbox5"> Power Steering </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="driverairbag" name="driverairbag" value="1">
<label for="driverairbag">Driver Airbag</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="passengerairbag" name="passengerairbag" value="1">
<label for="passengerairbag"> Passenger Airbag </label>
</div></div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powerwindow" name="powerwindow" value="1">
<label for="powerwindow"> Power Windows </label>
</div>
</div>


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="cdplayer" name="cdplayer" value="1">
<label for="cdplayer"> CD Player </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox h checkbox-inline">
<input type="checkbox" id="centrallocking" name="centrallocking" value="1">
<label for="centrallocking">Central Locking</label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="crashcensor" name="crashcensor" value="1">
<label for="crashcensor"> Crash Sensor </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="leatherseats" name="leatherseats" value="1">
<label for="leatherseats"> Leather Seats </label>
</div>
</div>
</div><br><br>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-5">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-submit" name="submit" type="submit">Post A Car</button>
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