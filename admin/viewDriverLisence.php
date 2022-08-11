<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{

if(isset($_POST['verify']))
{
$id=$_GET['id'];
$sql="update tblusers set status='verified' where id='$id'";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
if($result){
	echo '<script> alert("User Verified !")</script>';
	header("location:users.php");
}else{
	echo '<script> alert("Something Wrong !")</script>';
}


}
if(isset($_POST['unverify']))
{
$id=$_GET['id'];
$sql="update tblusers set status='unverified' where id='$id'";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
if($result){
	echo '<script> alert("User unVerified !")</script>';
	header("location:users.php");
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
					
						<h2 class="page-title"> Customer Driver Lisence </h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data">


<div class="form-group">
											
<?php 
$img=$_GET['driver'];
?>
<div class="col-sm-8" >
<img src="img/<?php echo $img;?>" width="550" height="300" style="border:solid 1px #000">
</div>

</div>

										
								
											
											<div class="form-group">
												<div class="col-sm-8 ">
								
													<button style="font-size:18px" class="btn btn-primary btn-block" name="verify" type="submit">Verify user</button>
												</div>
											</div>
                                            <div class="form-group">
												<div class="col-sm-8 ">
								
													<button style="font-size:18px" class="btn btn-primary btn-block" name="unverify" type="submit">unverified</button>
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