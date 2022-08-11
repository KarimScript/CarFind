<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{

if(isset($_POST['update']))
{
$newimage=$_FILES["img"]["name"];
$id=$_GET['id'];
move_uploaded_file($_FILES["img"]["tmp_name"],"img/".$_FILES["img"]["name"]);
$sql="update tblcars set img='$newimage' where id='$id'";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
if($result){
	echo '<script> alert("Image Changed Successfully !")</script>';
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
	
	<title>CarFind | Update Image </title>

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
					
						<h2 class="page-title"> Change Car Image </h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data">


<div class="form-group">
												<label class="col-sm-4 control-label">Current Image</label>
<?php 
$id=$_GET['id'];
$query ="SELECT img from tblcars where id='$id'";
$res = mysqli_query($con, $query)or die($mysqli_error($con));
if(mysqli_num_rows($res) > 0)
{
  $record=mysqli_fetch_array($res);
	?>

<div class="col-sm-8">
<img src="img/<?php echo $record['img'];?>" width="300" height="200" style="border:solid 1px #000">
</div>
<?php }?>
</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Upload New Image <span style="color:red">*</span></label>
												<div class="col-sm-8">
											<input type="file" name="img" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="update" type="submit">Update</button>
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