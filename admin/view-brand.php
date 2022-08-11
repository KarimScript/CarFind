<?php
session_start();

include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{

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
	
	<title>CarFind | Edit Brand</title>

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
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
<?php	
$id=$_GET['id'];
$img=$_GET['img'];
$query="select * from tblbrands where id='$id'";
$res=mysqli_query($con, $query)or die($mysqli_error($con));
if(mysqli_num_rows($res) > 0)
{
while($record = mysqli_fetch_array($res))
{
?>
<div class="form-group text-center">
<div class="col-sm-8">
<img src="img/<?php echo $img ?>" width="300" height="200" style="border:solid 1px #000">
</div>
</div>
                                    
											
<label class="col-sm-4 control-label">Brand Name : <?php echo $record['BrandName'] ?></label>
												
										
											
										<?php }} ?>
								
											
											

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