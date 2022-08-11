<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('function.php');

if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{

	function dateDiff($date1, $date2){
		$diff = strtotime($date2) - strtotime($date1);
		return abs(round($diff /86400));
	}

if(isset($_GET['cancelid']))
	{
$cid=$_GET['cancelid'];
$status=$_GET['status'];
$toDate=$_GET['toDate'];
$price=$_GET['price'];
$carId=$_GET['carid'];
$t=time();
$currentDate=date("Y-m-d",$t);

if($status=='finished'){
	echo '<script> alert(" This Booking already finished !")</script>';
}elseif($status=='canceled'){
	echo '<script> alert(" This Booking already canceled ! ")</script>';
}elseif($status=='active'){
    $remainDays=dateDiff($currentDate,$toDate);
	$refund=$remainDays * $price ;
	$stat='finished';
    car_available($carId);
	$sql = "UPDATE tblbooking SET Status='$stat',refund='$refund' WHERE  id='$cid'";
	$result = mysqli_query($con, $sql)or die($mysqli_error($con));
	if($result){
		echo '<script> alert("Booking finished !")</script>';
	}else{
		echo '<script> alert("Something Wrong !")</script>';
	}
}
else{
	$status="canceled";
	car_available($carId);
	$sql = "UPDATE tblbooking SET Status='$status' WHERE  id='$cid'";
	$result = mysqli_query($con, $sql)or die($mysqli_error($con));
	if($result){
		echo '<script> alert("Booking Canceled !")</script>';
	}else{
		echo '<script> alert("Something Wrong !")</script>';
	}
}


}


if(isset($_GET['confirmid']))
	{
$confid=$_GET['confirmid'];
$status=$_GET['status'];
if($status !=='pending'){
	echo '<script> alert(" This Booking Managed before! ")</script>';
}else{
$status="confirmed";
$query = "UPDATE tblbooking SET Status='$status' WHERE  id='$confid'";
$res = mysqli_query($con, $query)or die($mysqli_error($con));
if($res){
    echo '<script> alert("Booking Confirmed !")</script>';
}else{
    echo '<script> alert("Something Wrong !")</script>';
}


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
	
	<title>CarFind | Manage Booking   </title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Manage Bookings</h2>

						
						<div class="panel panel-default" style="overflow:auto">
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Contact No</th>
											<th>Car</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Price</th>
											<th>Cost</th>
											<th>refund</th>
											<th>Status</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>
                                   
									<?php
									$sql="";
									if(isset($_GET['pending'])){
										$sql = "SELECT tblusers.FullName,tblcars.name as carName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.carId ,tblbooking.Status,tblbooking.pricePerDay,tblbooking.PostingDate,tblbooking.phone,tblbooking.id as Bid,tblbooking.cost,tblbooking.refund from tblbooking join tblcars on tblcars.id=tblbooking.carId join tblusers on tblusers.id=tblbooking.userId WHERE tblbooking.Status='pending' ";
									}elseif(isset($_GET['active'])){
										$sql = "SELECT tblusers.FullName,tblcars.name as carName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.carId ,tblbooking.Status,tblbooking.pricePerDay,tblbooking.PostingDate,tblbooking.phone,tblbooking.id as Bid,tblbooking.cost,tblbooking.refund from tblbooking join tblcars on tblcars.id=tblbooking.carId join tblusers on tblusers.id=tblbooking.userId WHERE tblbooking.Status='active' ";
									}else{
										$sql = "SELECT tblusers.FullName,tblcars.name as carName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.carId ,tblbooking.Status,tblbooking.pricePerDay,tblbooking.PostingDate,tblbooking.phone,tblbooking.id as Bid,tblbooking.cost,tblbooking.refund from tblbooking join tblcars on tblcars.id=tblbooking.carId join tblusers on tblusers.id=tblbooking.userId ";
									}
									
$result = mysqli_query($con, $sql) or die($mysqli_error($con));
$cnt=1;
if(mysqli_num_rows($result) > 0)
{
	
while($row = mysqli_fetch_array($result))
{	 

			?>	
										<tr>
											<td><?php echo $cnt;?></td>
											<td><?php echo $row['FullName'];?></td>
											<td><?php echo $row['phone'];?></td>
											<td><?php echo $row['carName'];?></td>
											<td><?php echo $row['FromDate'];?></td>
											<td><?php echo $row['ToDate'];?></td>
											<td><?php echo $row['pricePerDay'].'$';?></td>
											<td><?php echo $row['cost'].'$';?></td>
											<td><?php echo $row['refund'].'$';?></td>
											<td><?php echo $row['Status'];?></td>
											<td><?php echo $row['PostingDate'];?></td>
										<td><a href="manage-bookings.php?confirmid=<?php echo $row['Bid'];?>&status=<?php echo $row['Status']?>" onclick="return confirm('Do you really want to Confirm this booking')"> Confirm</a> /


<a href="manage-bookings.php?cancelid=<?php echo $row['Bid'];?>&status=<?php echo $row['Status'];?>&toDate=<?php echo $row['ToDate'];?>&price=<?php echo $row['pricePerDay'];?>&carid=<?php echo $row['carId'];?>" onclick="return confirm('Do you really want to Cancel this Booking')"> Cancel</a>
</td>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
