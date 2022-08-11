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
$img=$_GET['img'];
unlink("img/".$img);
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
	
	<title>CarFind | Manage Cars</title>

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

						<h2 class="page-title">Manage Cars</h2>
						<form id="form1" method="GET" action="manage-cars.php">
						<select name="location" onchange="this.form.submit()">
						  <option value="all">All</option>
                          <option value="beirut" <?=($_GET['location']=='beirut'?' selected':'' ) ?>>beirut</option>
                          <option value="saida" <?=($_GET['location']=='saida'?' selected':'' ) ?>>saida</option>
	                      <option value="nabatieh" <?=($_GET['location']=='nabatieh'?' selected':'' ) ?>>nabatieh</option>
                          <option value="sour" <?=($_GET['location']=='sour'?' selected':'' ) ?>>sour</option>
                        </select>
						<?php
						$q="SELECT * FROM tblbrands";
						$r = mysqli_query($con, $q)or die($mysqli_error($con));
						
						?>
						<select name="brand" onchange="this.form.submit()">
<option value="all"> All </option>
<?php if(mysqli_num_rows($r) > 0)
{
	while($record=mysqli_fetch_array($r))
	{
		$bid=$record['id']; ?>
 <option value=<?php echo $bid;?> <?=($_GET['brand']==$bid ?' selected':'' ) ?>><?php echo $record['BrandName'];?></option>
 <?php } } ?>
</select>
                         </form>

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
											<th>location</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php

$arguments=array();
if(isset($_GET['location']) && $_GET['location']!=='all') {
	$location=$_GET['location'];
	$arguments[]="tblcars.location='$location'"; 

  }
  if(isset($_GET['brand']) && $_GET['brand']!=='all') {
	$brand=$_GET['brand']; 
	$arguments[]="tblcars.brand='$brand'";
  }
  
  if(sizeof($arguments)>1) {
	$str = $arguments[0] . " and " . $arguments[1] ;
  
	$sql = "SELECT tblcars.name,tblbrands.BrandName,tblcars.price,tblcars.transmission,tblcars.model,tblcars.location,tblcars.status,tblcars.id from tblcars join tblbrands on tblbrands.id=tblcars.brand WHERE " . $str ;
   
  }
  if(sizeof($arguments)==1){
	$str = implode('',$arguments);
  
	$sql = "SELECT tblcars.name,tblbrands.BrandName,tblcars.price,tblcars.transmission,tblcars.model,tblcars.location,tblcars.status,tblcars.id from tblcars join tblbrands on tblbrands.id=tblcars.brand WHERE " . $str ;
  }
  if(sizeof($arguments)==0){
	$sql = "SELECT tblcars.name,tblbrands.BrandName,tblcars.price,tblcars.transmission,tblcars.model,tblcars.location,tblcars.status,tblcars.id from tblcars join tblbrands on tblbrands.id=tblcars.brand";
  }


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
											<td><?php echo $row['location'];?></td>
											<td><?php echo $row['status'];?></td>
												
		<td><a href="edit-cars.php?id=<?php echo $row['id'];?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="manage-cars.php?del=<?php echo $row['id'];?>&img=<?php echo $row['img'] ;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a>&nbsp;&nbsp;
<a href="changeimage.php?id=<?php echo $row['id'];?>&img=<?php echo $row['img'] ;?>">change image</a>
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




