<?php
session_start();

include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$brand=$_POST['brand'];
$logo=$_FILES['logo']['name'];
$sql="INSERT INTO `tblbrands`(`id`, `BrandName`, `logo`) VALUES ('','$brand','$logo')";
move_uploaded_file($_FILES["logo"]["tmp_name"],"img/".$_FILES["logo"]["name"]);
$result = mysqli_query($con, $sql )or die($mysqli_error($con));
if($result)
{
	echo '<script> alert("Brand Added !")</script>';
}
else 
{
	echo '<script> alert("Something wrong ?")</script>';
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
	
	<title>CarFind | Create Brand</title>

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
					
						<h2 class="page-title">Create Brand</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
							
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" enctype="multipart/form-data">
										   <div class="form-group">
												<label class="col-sm-4 control-label">Logo</label>
												<div class="col-sm-8">
													<input type="file" class="form-control" name="logo" id="logo" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Brand Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="brand" id="brand" required>
												</div>
											</div>
										
											


</br>		
							
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
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