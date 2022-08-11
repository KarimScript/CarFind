<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{
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
		
	<title>CarFind | Dashboard</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<link rel="stylesheet" href="css/style.css">
</head>
<style>
	.stat-panel-number,.stat-panel-title{
		color:white;
	}
</style>
<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql ="SELECT id from tblusers ";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
$usersNum = mysqli_num_rows($result);
?>
													<div class="stat-panel-number h1 "><?php echo $usersNum ; ?></div>
													<div class="stat-panel-title text-uppercase">Users</div>
												</div>
											</div>
											<a href="users.php" class="block-anchor panel-footer text-center"> Details <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
<?php if(isset($_SESSION['super'])){
	 ?>


									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql11 ="SELECT id from admin ";
$result11 = mysqli_query($con, $sql11)or die($mysqli_error($con));
$adminNum = mysqli_num_rows($result11);
?>
													<div class="stat-panel-number h1 "><?php echo $adminNum ; ?></div>
													<div class="stat-panel-title text-uppercase">Admins</div>
												</div>
											</div>
											<a href="Alladmin.php" class="block-anchor panel-footer text-center"> Details <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
<?php }?>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sql1 ="SELECT id from tblcars ";
$result1 = mysqli_query($con, $sql1)or die($mysqli_error($con));
$carsNum = mysqli_num_rows($result1);
?>
													<div class="stat-panel-number h1 "><?php echo $carsNum ;?></div>
													<div class="stat-panel-title text-uppercase">All Cars</div>
												</div>
											</div>
											<a href="manage-cars.php" class="block-anchor panel-footer text-center"> Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sql2 ="SELECT id from tblcars WHERE status='available'";
$result2 = mysqli_query($con, $sql2)or die($mysqli_error($con));
$availablecars = mysqli_num_rows($result2);
?>
													<div class="stat-panel-number h1 "><?php echo $availablecars ;?></div>
													<div class="stat-panel-title text-uppercase">Available Cars</div>
												</div>
											</div>
											<a href="availablecars.php" class="block-anchor panel-footer text-center"> Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sqlr ="SELECT id from tblcars WHERE status='rented'";
$resultr = mysqli_query($con, $sqlr)or die($mysqli_error($con));
$rentedcars = mysqli_num_rows($resultr);
?>
													<div class="stat-panel-number h1 "><?php echo $rentedcars ;?></div>
													<div class="stat-panel-title text-uppercase">Rented Cars</div>
												</div>
											</div>
											<a href="Rentedcars.php" class="block-anchor panel-footer text-center"> Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php 
$sql3 ="SELECT id from tblbooking ";
$result3 = mysqli_query($con, $sql3)or die($mysqli_error($con));
$bookingNum = mysqli_num_rows($result3);
?>

													<div class="stat-panel-number h1 "><?php echo $bookingNum;?></div>
													<div class="stat-panel-title text-uppercase">Total Bookings</div>
												</div>
											</div>
											<a href="manage-bookings.php" class="block-anchor panel-footer text-center"> Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
<?php 
$sql7 ="SELECT id from tblbooking WHERE status='pending' ";
$result7 = mysqli_query($con, $sql7)or die($mysqli_error($con));
$pendbooking = mysqli_num_rows($result7);
?>

													<div class="stat-panel-number h1 "><?php echo $pendbooking;?></div>
													<div class="stat-panel-title text-uppercase">Pending Bookings</div>
												</div>
											</div>
											<a href="manage-bookings.php?pending=1" class="block-anchor panel-footer text-center"> Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql8 ="SELECT id from tblbooking WHERE status='active' ";
$result8 = mysqli_query($con, $sql8)or die($mysqli_error($con));
$activebooking = mysqli_num_rows($result8);
?>

													<div class="stat-panel-number h1 "><?php echo $activebooking;?></div>
													<div class="stat-panel-title text-uppercase">Active Bookings</div>
												</div>
											</div>
											<a href="manage-bookings.php?active=1" class="block-anchor panel-footer text-center"> Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
<?php 
$sql4 ="SELECT id from tblbrands ";
$result4 = mysqli_query($con, $sql4)or die($mysqli_error($con));
$brandsNum = mysqli_num_rows($result4);
?>												
													<div class="stat-panel-number h1 "><?php echo $brandsNum;?></div>
													<div class="stat-panel-title text-uppercase">Listed Brands</div>
												</div>
											</div>
											<a href="manage-brands.php" class="block-anchor panel-footer text-center"> Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">

<?php 
$sql5 ="SELECT id from tblcontact";
$result5 = mysqli_query($con, $sql5)or die($mysqli_error($con));
$messageNum = mysqli_num_rows($result5);
?>
													<div class="stat-panel-number h1 "><?php echo $messageNum;?></div>
													<div class="stat-panel-title text-uppercase">Messages</div>
												</div>
											</div>
											<a href="manage-contact.php" class="block-anchor panel-footer text-center">Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php 
$sql6 ="SELECT id from tblfeedback ";
$result6 = mysqli_query($con, $sql6)or die($mysqli_error($con));
$feedbackNum = mysqli_num_rows($result6);
?>

													<div class="stat-panel-number h1 "><?php echo $feedbackNum;?></div>
													<div class="stat-panel-title text-uppercase">FeedBack</div>
												</div>
											</div>
											<a href="feedback.php" class="block-anchor panel-footer text-center">Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-blue text-light">
												<div class="stat-panel text-center">
<?php 
$totalcost=0;
$totalrefund=0;
$earning=0;
$sql9 ="SELECT * FROM tblbooking WHERE Status='finished'";
$result9 = mysqli_query($con, $sql9)or die($mysqli_error($con));
if(mysqli_num_rows($result9)>0){
	while($row=mysqli_fetch_array($result9)){
		$cost=$row['cost'];
		$refund=$row['refund'];
       $totalcost=$totalcost+$cost;
	   $totalrefund=$totalrefund+$refund;
	   
	}
	$earning = $totalcost - $totalrefund ;
}
?>

													<div class="stat-panel-number h1 "><?php echo $earning.'$';?></div>
													<div class="stat-panel-title text-uppercase">Total Earnings</div>
												</div>
											</div>
											<a href="earning.php" class="block-anchor panel-footer text-center">Details &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	
	
</body>
</html>
<?php } ?>