<?php
session_start();

include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$carname=$_POST['carname'];
$brand=$_POST['brandname'];
$overview=$_POST['overview'];
$overview=mysqli_real_escape_string($con,$overview);
$price=$_POST['priceperday'];
$model=$_POST['modelyear'];
$seatingcapacity=$_POST['seatingcapacity'];
$doors=$_POST['doors'];
$location=$_POST['location'];
$transmission=$_POST['transmission'];
$image=$_FILES["img"]["name"];
$airconditioner=$_POST['airconditioner'];
$aux=$_POST['aux'];

move_uploaded_file($_FILES["img"]["tmp_name"],"img/".$_FILES["img"]["name"]);


$sql="INSERT INTO `tblcars`(`id`, `name`, `overview`, `brand`, `location`, `transmission`, `price`, `img`, `model`, `aux`, `airconditioner`, `seat`, `door`, `status`) VALUES ('','$carname','$overview','$brand','$location','$transmission','$price','$image','$model','$aux','$airconditioner','$seatingcapacity','$doors','available')";
$result = mysqli_query($con, $sql) or die($mysqli_error($con));

if($result)
{
	echo '<script> alert("Car Added Successfully !")</script>';
}
else 
{
	echo '<script> alert("Something Wrong ?")</script>';
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
	
	<title>CarFind | Add Car</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
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
					
						<h2 class="page-title">Add a Car</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Car Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="carname" class="form-control" required>
</div>
</br>
<label class="col-sm-2 control-label">Car Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" required>
<option value=""> Select </option>
<?php $query="select id,BrandName from tblbrands";
$res = mysqli_query($con, $query)or die($mysqli_error($con));
if(mysqli_num_rows($res) > 0)
{
while($row=mysqli_fetch_array($res))
{
?>
<option value=<?php echo $row['id'];?>><?php echo $row['BrandName'];?></option>
<?php }} ?>

</select>
</div>
</br>
<label class="col-sm-2 control-label">Transmission type<span style="color:red">*</span></label> 
<div class="col-sm-4">
<select class="selectpicker" name="transmission" id="cars" required>
    <option value="automatic">automatic</option>
    <option value="manual">manual</option>
  </select>
</div>


<label class="col-sm-2 control-label">location<span style="color:red">*</span></label>

<div class="col-sm-4">
</br>
<select class="selectpicker" name="location">
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
<textarea class="form-control" name="overview" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Day(in USD)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperday" class="form-control" required>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="modelyear" class="form-control" required>
</div>
</br>
<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="seatingcapacity" class="form-control" required>
</div>
</br>
<label class="col-sm-2 control-label">Doors<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="doors" class="form-control" required>
</div>
</div>
<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="airconditioner" name="airconditioner" value="1">
<label for="airconditioner"> Air Conditioner </label>
</div>
</div>

<div class="col-sm-3">
<div class="checkbox ">
<input type="checkbox" id="aux" name="aux" value="1">
<label for="aux"> Aux </label>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
Image <span style="color:red">*</span><input type="file" name="img" required>
</div>
</div>
							






											<div class="form-group" style="margin-top:30px;text-align:start">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default btn-block" type="reset">Cancel</button>
													<button class="btn btn-primary btn-block" name="submit" type="submit">Submit</button>
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
<?php } ?>