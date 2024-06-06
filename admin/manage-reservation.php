<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql = "UPDATE reservation SET Status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Reservation Cancelled";
}


if(isset($_REQUEST['aeid'])) {
    $aeid=intval($_GET['aeid']);
    $status=1;

    $sql = "UPDATE reservation SET Status=:status WHERE  id=:aeid";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':status',$status, PDO::PARAM_STR);
    $query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
    $query -> execute();

    $msg="Reservation Successfully Confirmed";

    // Redirect after confirming reservation
    header("Location: generate_pdf.php?reservation_id=$aeid");
    exit();
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
	
	<title>Admin Manage Reservation - Agency CarRental   </title>

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

@media screen and (max-width: 767px) {
    .table-responsive {
        width: 100%;
        padding-top: 31px;
        margin-bottom: 15px;
        overflow-y: hidden;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        border: 1px solid #dfd7ca;
    }
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

						<h2 class="page-title">Manage Reservation</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default fm">
							<div class="panel-heading">Reservation Info</div>
							
							<div class="panel-body">
    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
    else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  <div class="table-responsive">
    
    <input type="text" id="searchInput" placeholder="Search Reserve ..."class="searchinput">
    <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Car</th>
                <th>Price per day</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Days Reservation</th>
                <th>Total Price</th>
                <th>Message</th>
                <th>Status</th>
                <th>Posting date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php 
    $sql = "SELECT reservation.id, users.FullName, brands.BrandName, cars.carsTitle, cars.PricePerDay, reservation.FromDate, reservation.ToDate, reservation.daysB, reservation.T_price, reservation.message, reservation.carsId as vid, reservation.Status, reservation.PostingDate, reservation.id 
            FROM reservation 
            JOIN cars ON cars.id = reservation.carsId 
            JOIN users ON users.EmailU = reservation.userEmail 
            JOIN brands ON cars.carsBrand = brands.id
            ORDER BY reservation.PostingDate asc";

    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
   
    if($query->rowCount() > 0) {
        foreach($results as $result) { ?>
            <tr style="background-color: white;">
                <td><?php echo htmlentities($result->id); ?></td>
                <td><?php echo htmlentities($result->FullName); ?></td>
                <td><a href="edit-cars.php?id=<?php echo htmlentities($result->vid); ?>"><?php echo htmlentities($result->BrandName); ?>, <?php echo htmlentities($result->carsTitle); ?></a></td>
                <td><?php echo htmlentities($result->PricePerDay); ?></td>
                <td><?php echo htmlentities($result->FromDate); ?></td>
                <td><?php echo htmlentities($result->ToDate); ?></td>
                <td><?php echo htmlentities($result->daysB); ?></td>
                <td><?php echo htmlentities($result->T_price); ?></td>
                <td><?php echo htmlentities($result->message); ?></td>
                <td><?php 
                    if($result->Status == 0) {
                        echo '<span style="margin-top: 6px;font-size: 11px;padding-top: 6px;padding-left: 6px;height: 27px;width: 102px;display: flex;background-color: #5e503d;color: white;border-radius: 20px;">' . htmlentities('Not Confirmed yet') . '</span>';
                    } elseif ($result->Status == 1) {
                        echo '<span style="margin-top: 4px;font-size: 13px;padding-top: 5px;padding-left: 13px;height: 27px;width: 88px;display: flex;background-color: green;color: white;border-radius: 20px;">' . htmlentities('Confirmed') . '</span>';
                    } else {
                        echo '<span style="margin-top: 4px;font-size: 13px;padding-top: 5px;padding-left: 13px;height: 27px;width: 88px;display: flex;background-color: red;color: white;border-radius: 20px;">' . htmlentities('Cancelled') . '</span>';
                    }
                ?></td>
                <td><?php echo htmlentities($result->PostingDate); ?></td>
                <td>
                    <a href="manage-reservation.php?aeid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to Confirm this Reservation?')"> Confirm</a> | 
                    <a href="manage-reservation.php?eid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to Cancel this Reservation?')"> Cancel</a>
                </td>
            </tr>
            <?php  
        }
    } ?>
</tbody>
    </table>
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
    <script src="js/search-input.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
