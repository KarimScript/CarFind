<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['alogin']) && !isset($_SESSION['super']))
	{	
header('location:index.php');
}
else{

    if(isset($_POST['create']))
    {
    $uname=$_POST['uname'];
    $password=$_POST['pass']; 
    $confpassword=$_POST['confpass'];
    $type=$_POST['type'];
    $check="SELECT * FROM admin WHERE UserName='$uname'";
    $res=mysqli_query($con,$check) or die($mysqli_error($con));
    $num=mysqli_num_rows($res);
    if($num>0){
    
      echo '<script> alert("Choose another Username !")</script>';
    
    }
    elseif($password !== $confpassword){
      
      echo '<script> alert("Invalid Password Confirmation !")</script> ';
    }else{
        $sql="INSERT INTO `admin`(`id`, `UserName`, `Password`,`type`) VALUES ('','$uname','$password','$type')";
      $result = mysqli_query($con, $sql) or die(mysqli_error($con));
      if($result){
      echo '<script> alert("Admin Created Successfully !")</script> ';
      
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
	
		
	<title>CarFind | Create Admin</title>

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
					
						<h2 class="page-title">Create New Admin</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
							
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" enctype="multipart/form-data">
										   <div class="form-group">
												<label class="col-sm-4 control-label">Username</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" name="uname"  required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="pass"  required>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-sm-4 control-label">Confirm Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="confpass"  required>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-sm-4 control-label">Admin type</label>
												<div class="col-sm-8">
                                                   <select  name="type" id="type">
                                                   <option value="Admin">Admin</option>
                                                   <option value="superAdmin">superAdmin</option>
                                                   </select>                                               
												</div>
											</div>
										   
											


</br>		
							
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary btn-block" name="create" type="submit">Create</button>
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