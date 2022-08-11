<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$sql ="SELECT * FROM admin WHERE UserName='$username' and Password='$password'";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
$row = mysqli_num_rows($result);
if($row> 0)
{
	$record=mysqli_fetch_array($result);
$_SESSION['alogin']=$record['UserName'];
   if($record['type']=='superAdmin'){ $_SESSION['super']=$record['type'];}
 header('location:dashboard.php');
} else{

  echo '<div class="alert alert-danger" role="alert" style="margin:0">
  Invalid Username Or Password !
</div>';

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

	<title>Car Rental Portal | Admin Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<div class="login-page bk-img" style="background-image: url(img/back.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row" style="margin-top:50px">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Admin Login</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">

									<label for="" class="text-uppercase text-sm">Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb" style="margin-bottom:20px">

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">



									<button class="btn btn-primary btn-block" name="login" type="submit" style="margin-top:40px">LOGIN</button>

								</form>
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
