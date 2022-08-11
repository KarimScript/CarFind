<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{

if(isset($_GET['del']))
	{
$id=$_GET['del'];
$query = "delete from tblcars WHERE id='$id'";
$res = mysqli_query($con, $query)or die($mysqli_error($con));
if($res){
	echo '<script> alert("Car Deleted !")</script>';
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
	
	<title>CarFind | Available Cars   </title>


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

						<h2 class="page-title">Available Cars</h2>

						
						<div class="panel panel-default" style="overflow:auto">
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Car Title</th>
											<th>Brand </th>
											<th>Price Per day</th>
											<th>transmission</th>
											<th>Model Year</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $sql = "SELECT tblcars.name,tblbrands.BrandName,tblcars.price,tblcars.transmission,tblcars.model,tblcars.status,tblcars.id from tblcars join tblbrands on tblbrands.id=tblcars.brand WHERE tblcars.status='available'";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
$cnt=1;
if(mysqli_num_rows($result) > 0)
{
while($row=mysqli_fetch_array($result))
{				?>	
										<tr>
											<td><?php echo $cnt;?></td>
											<td><?php echo $row['name'];?></td>
											<td><?php echo $row['BrandName'];?></td>
											<td><?php echo $row['price'];?></td>
											<td><?php echo $row['transmission'];?></td>
											<td><?php echo $row['model'];?></td>
											<td><?php echo $row['status'];?></td>
												
		<td><a href="edit-cars.php?id=<?php echo $row['id'];?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="availablecars.php?del=<?php echo $row['id'];?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a>&nbsp;&nbsp;
<a href="changeimage.php?id=<?php echo $row['id'];?>">change image</a>
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
