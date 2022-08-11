<?php
session_start();

include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{


	function change_aboutus($txt){
		$con = mysqli_connect("localhost", "root", "", "carrental") or die(mysqli_error($con));
		$sql = "UPDATE tblpages SET text='$txt' WHERE PageName='aboutus'";
		$result = mysqli_query($con, $sql) or die($mysqli_error($con));
		if($result){
			echo '<script> alert("About Us Updated !")</script>';
		}
	}
	function change_terms($txt){
		$con = mysqli_connect("localhost", "root", "", "carrental") or die(mysqli_error($con));
		$query = "UPDATE `tblpages` SET `text`='$txt' WHERE `PageName`='terms'";
		$res = mysqli_query($con, $query) or die($mysqli_error($con));
		if($res){
			echo '<script> alert("Conditions Updated !")</script>';
		}
	}


	if(isset($_POST['save'])){
		$aboutus=mysqli_real_escape_string($con,$_POST['aboutus']);
        $terms=mysqli_real_escape_string($con,$_POST['terms']);
		change_aboutus($aboutus);
		change_terms($terms);

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
	
	<title>CarFind | Manage pages</title>


	<link rel="stylesheet" href="css/font-awesome.min.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">>

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
					
						<h2 class="page-title">Manage Pages </h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
	
									<div class="panel-body">
										<form method="POST"  class="form-horizontal" action="manage-pages.php">
									
									<div class="form-group">
												<label class="col-sm-4 control-label">About Us </label>
												<div class="col-sm-8">
			<textarea class="form-control" rows="5" cols="50" name="aboutus"  required>

<?php


$sql1 = "SELECT text from tblpages where PageName='aboutus'";
$result1 = mysqli_query($con, $sql1) or die($mysqli_error($con));
if(mysqli_num_rows($result1) > 0)
{
 $row=mysqli_fetch_array($result1);		
 echo  $row['text'];
}

?>

										</textarea> 
												</div>
											</div>
										

                        
											<div class="form-group">
												<label class="col-sm-4 control-label">Terms&Conditions </label>
												<div class="col-sm-8">
			<textarea class="form-control" rows="5" cols="50" name="terms"   required>

<?php


$sql2 = "SELECT text from tblpages where PageName='terms'";
$result2 = mysqli_query($con, $sql2) or die($mysqli_error($con));
if(mysqli_num_rows($result2) > 0)
{
 $row=mysqli_fetch_array($result2);		
 echo  $row['text'];
}

?>

										</textarea> 
												</div>
											</div>
											
											<div class="form-group" style="margin-top:30px;text-align:start">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-primary btn-block" name="save" type="submit">Save</button>
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