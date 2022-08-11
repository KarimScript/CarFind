<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{

if(isset($_POST['submit']))
	{
$password=$_POST['password'];
$newpassword=$_POST['newpassword'];
$username=$_SESSION['alogin'];
$sql ="SELECT Password FROM admin WHERE UserName='$username' and Password='$password'";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
if( mysqli_num_rows($result) > 0)
{
$query="update admin set Password='$newpassword' where UserName='$username'";
$res = mysqli_query($con, $query)or die($mysqli_error($con));
if($res){
	echo '<script> alert("Password Changed !")</script>';	
}
}
else {
	echo '<script> alert("Current Password Incorrect ?")</script>';	
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
	
	<title>CarFind | Change Password</title>

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
					
						<h2 class="page-title">Change Password</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" ">
										
											<div class="form-group">
												<label class="col-sm-4 control-label">Current Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password" id="password" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
											<div class="form-group">
												<label class="col-sm-4 control-label">New Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="newpassword" id="newpassword" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

										
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
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

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
<?php } ?>