<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
    header('location:index.php');
}
else{

if(isset($_REQUEST['del']))
{
    $delid=intval($_GET['del']);
    $sql = "DELETE FROM cars WHERE id=:delid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':delid',$delid, PDO::PARAM_STR);
    $query->execute();
    $msg="Car Deleted Successfully";
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
    
    <title>Admin Manage Cars - Agency CarRental </title>

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

                        <h2 class="page-title">Manage Cars</h2>

                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default fm">
                            <div class="panel-heading">Car Details</div>
                            <div class="panel-body">
    <?php if ($error) { ?>
        <div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div>
    <?php } elseif ($msg) { ?>
        <div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
    <?php } ?>
    <div class="table-responsive">
    <input type="text" id="searchInput" placeholder="Search Cars ..." class="searchinput">
    <table id="zctb" class="table table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Car Title</th>
                <th>Brand</th>
                <th>Price Per day</th>
                <th>Boite de vitesse</th>
                <th>Fuel Type</th>
                <th>Model Year</th>
                <th>Consumption</th>
                <th>Car Color</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT cars.id, cars.carsTitle, brands.BrandName, cars.PricePerDay, cars.Btv, cars.FuelType, cars.ModelYear, cars.Consumption, cars.ColorC, cars.id FROM cars JOIN brands ON brands.id=cars.carsBrand";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
         
            if ($query->rowCount() > 0) {
                foreach ($results as $result) { ?>
                    <tr style="background-color: white;">
                        <td><?php echo htmlentities($result->id); ?></td>
                        <td><?php echo htmlentities($result->carsTitle); ?></td>
                        <td><?php echo htmlentities($result->BrandName); ?></td>
                        <td><?php echo htmlentities($result->PricePerDay); ?></td>
                        <td><?php echo htmlentities($result->Btv); ?></td>
                        <td><?php echo htmlentities($result->FuelType); ?></td>
                        <td><?php echo htmlentities($result->ModelYear); ?></td>
                        <td><?php echo htmlentities($result->Consumption); ?></td>
                        <td><?php echo htmlentities($result->ColorC); ?></td>
                        <td>
                            <a href="edit-cars.php?id=<?php echo $result->id; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                            <a href="manage-cars.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to delete this car ?');"><i class="fa fa-close"></i></a>
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
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php } ?>