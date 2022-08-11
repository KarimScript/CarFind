<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}else{ 

if(isset($_POST['submit']))
  {
	$carname=$_POST['carname'];
	$brand=$_POST['brandname'];
	$overview=$_POST['overview'];
	$price=$_POST['priceperday'];
	$model=$_POST['modelyear'];
	$seatingcapacity=$_POST['seatingcapacity'];
	$doors=$_POST['doors'];
	$location=$_POST['location'];
	$transmission=$_POST['transmission'];
	$airconditioner=$_POST['airconditioner'];
	$aux=$_POST['aux'];
	$status=$_POST['status'];
    $id=$_GET['id'];

$sql="UPDATE `tblcars` SET `name`='$carname',`overview`='$overview',`brand`='$brand',`location`='$location',`transmission`='$transmission',`price`='$price',`model`='$model',`aux`='$aux',`airconditioner`='$airconditioner',`seat`='$seatingcapacity',`door`='$doors',`status`='$status' where id='$id'";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
if($result){
	echo '<script> alert("Car Updated Successfully !")</script>';
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
	
	<title>Car Rental Portal | Admin Edit Vehicle Info</title>

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
					
						<h2 class="page-title">Edit Car</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									

									<div class="panel-body">

									<?php
$id=$_GET['id'];
$sql ="SELECT tblcars.*,tblbrands.BrandName,tblbrands.id as bid from tblcars join tblbrands on tblbrands.id=tblcars.brand where tblcars.id='$id'";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
if(mysqli_num_rows($result) > 0)
{
	$row = mysqli_fetch_array($result);
	
	?>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Car Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="carname" class="form-control" value= <?php echo $row['name'] ;?>  required>
</div>
</br>
<label class="col-sm-2 control-label">Car Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" required>
<option value="<?php echo $row['bid'];?>"><?php echo $row['BrandName'];?></option>
<?php $query="select id,BrandName from tblbrands";
$res = mysqli_query($con, $query)or die($mysqli_error($con));
if(mysqli_num_rows($res) > 0)
{
while($record=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $record['id'];?>"><?php echo $record['BrandName'];?></option>
<?php }} ?>
</select>
</div>
</br>
<label class="col-sm-2 control-label">Transmission type<span style="color:red">*</span></label> 
<div class="col-sm-4">
<select class="selectpicker" name="transmission"  required>
    <option value=<?php echo $row['transmission'];?>><?php echo $row['transmission'];?></option>
    <option value="manual">manual</option>
	<option value="automatic">automatic</option>

  </select>
</div>


<label class="col-sm-2 control-label">location<span style="color:red">*</span></label>

<div class="col-sm-4">
</br>
<select class="selectpicker" name="location" id="cars">
<option value=<?php echo $row['location']; ?>><?php echo $row['location']; ?></option>
    <option value="beirut">beirut</option>
    <option value="saida">saida</option>
	<option value="nabatieh">nabatieh</option>
    <option value="sour">sour</option>
  </select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Car Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="overview" rows="3" required><?php echo $row['overview']; ?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Day(in USD)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperday" class="form-control" value=<?php echo $row['price']; ?> required>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="modelyear" class="form-control" value=<?php echo $row['model']; ?> required>
</div>
</br>
<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="seatingcapacity" class="form-control" value=<?php echo $row['seat']; ?> required>
</div>
</br>
<label class="col-sm-2 control-label">Doors<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="doors" class="form-control" value=<?php echo $row['door']; ?> required>
</div>
</div>
<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
</div>
</div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="airconditioner" name="airconditioner"  value="1">
<label for="airconditioner"> Air Conditioner </label>
</div>
</div>
  
<div class="col-sm-3">
<div class="checkbox ">
<input type="checkbox" id="aux" name="aux"   value="1">
<label for="aux"> Aux </label>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
<select class="selectpicker" name="status" id="status" required>
    <option value=<?php echo $row['status']; ?>><?php echo $row['status']; ?></option>
    <option value="available">available</option>
    <option value="rented">rented</option>
  </select>

</div>
</div>
							




											<div class="form-group" style="margin-top:30px;text-align:start">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-primary btn-block" name="submit" type="submit">UPDATE</button>
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
	


	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } }  ?>