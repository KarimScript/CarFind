<?php
session_start();

include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{



    $id=$_GET['contactid'];


if(isset($_POST['send'])){
    $reply=mysqli_real_escape_string($con,$_POST['reply']);
    $sql="UPDATE tblcontact SET reply='$reply',status='read' WHERE id='$id'";
    $result = mysqli_query($con, $sql) or die($mysqli_error($con));
		if($result){
            header("location:manage-contact.php");
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
					
						<h2 class="page-title">Message Reply</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
	
									<div class="panel-body">
										<form method="POST"  class="form-horizontal" >
									
									<div class="form-group">
												<label class="col-sm-4 control-label">reply </label>
												<div class="col-sm-8">
			<textarea class="form-control" rows="5" cols="50" name="reply"  required></textarea> 
												</div>
											</div>
										

                        
											
											
											<div class="form-group" style="margin-top:30px;text-align:start">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-primary btn-block" name="send" type="submit">send</button>
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