<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{
if(isset($_GET['cancelid']))
	{
$cancelid=$_GET['cancelid'];
$status="canceled";
$sql = "UPDATE tblfeedback SET status='$status' WHERE  id='$cancelid'";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
if($result){
	echo '<script> alert("Feedback Canceled !")</script>';
}else{
	echo '<script> alert("Something Wrong !")</script>';
}
}


if(isset($_GET['confid']))
	{
$confid=$_GET['confid'];
$status="confirmed";

$query = "UPDATE tblfeedback SET status='$status' WHERE  id='$confid'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
if($result){
	echo '<script> alert("Feedback Confirmed !")</script>';
}else{
	echo '<script> alert("Something Wrong !")</script>';
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
	
		
	<title>CarFind | Manage feedback</title>

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

						<h2 class="page-title">Manage Feedback</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default" style="overflow:auto">
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>feedback</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

									<?php $sql = "SELECT * from tblfeedback";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
$cnt=1;
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{				?>	
										<tr>
										<td><?php echo $cnt;?></td>
											<td><?php echo $row['UserName'];?></td>
											<td><?php echo $row['text'];?></td>
											<td><?php echo $row['PostingDate'];?></td>
											<td><?php echo $row['status']?></td>
										<td>

<a href="feedback.php?confid=<?php echo $row['id'];?>" onclick="return confirm('Do you really want to confirm')"> Confirm</a>


<a href="feedback.php?cancelid=<?php echo $row['id'];?>" onclick="return confirm('Do you really want to Cancel')"> Cancel</a>
</td>
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
