<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{

if(isset($_POST['save']))
{
$email=$_POST['email'];
$phone1=$_POST['phone1'];
$phone2=$_POST['phone2'];

$sql="update contactinfo set Email='$email',phone1='$phone1',phone2='$phone2'";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
if($result){
	echo '<script> alert("info Changed Successfully !")</script>';
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
					
						<h2 class="page-title"> Manage System Contact Info </h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data">

<?php 
$query ="SELECT * from contactinfo";
$res = mysqli_query($con, $query)or die($mysqli_error($con));
if(mysqli_num_rows($res) > 0)
{
  $row=mysqli_fetch_array($res);
}
	?>




                                                <div class="form-group">
												<label class="col-sm-4 control-label">System Email</label>
												<div class="col-sm-8">
													<input type="email" class="form-control" name="email" value=<?php echo $row['Email']; ?>  required>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-sm-4 control-label">Phone 1</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" name="phone1" value=<?php echo $row['phone1']; ?>  required>
												</div>
											</div>
                                            <div class="form-group">
												<label class="col-sm-4 control-label">Phone 2</label>
												<div class="col-sm-8">
													<input type="number" class="form-control" name="phone2" value=<?php echo $row['phone2']; ?>  required>
												</div>
											</div>
											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="save" type="submit">Save</button>
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