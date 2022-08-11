<?php
session_start();

include('includes/config.php');
if(!isset($_SESSION['alogin']) && !isset($_SESSION['super']))
	{	
header('location:index.php');
}
else{

function oneSuperAdmin(){

	$con = mysqli_connect("localhost", "root", "", "carrental") or die(mysqli_error($con));
	$q="SELECT * FROM admin WHERE type='superAdmin'";
	$qr= mysqli_query($con, $q) or die($mysqli_error($con));
	if(mysqli_num_rows($qr)==1){
       return true ;
	}else{
	   return false ;
	}
}

function deleteAdmin(int $i){
	$con = mysqli_connect("localhost", "root", "", "carrental") or die(mysqli_error($con));
	$query="DELETE FROM admin WHERE id='$i'";
	$res = mysqli_query($con, $query)or die($mysqli_error($con));
	if($res){
		echo '<script> alert("Admin Deleted !")</script>';
	}
}

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$check="SELECT type FROM admin WHERE id='$id'";
        $checkresult= mysqli_query($con, $check)or die($mysqli_error($con));
		if($checkresult){
			$record=mysqli_fetch_array($checkresult);
			if($record['type']=='superAdmin'){
				if(oneSuperAdmin()){
                    echo '<script> alert("This is the only superAdmin in the System ,You cannot Delete !")</script>';
				}else{
					deleteAdmin($id);
				}
				
			}else{
				deleteAdmin($id);
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
	
	<title>CarFind | Manage Admins   </title>


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

						<h2 class="page-title">Admins</h2>
						<div class="panel panel-default">
						
							<div class="panel-body">
								<table  class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
												<th> UserName</th>
											<th>Password </th>
											<th>Type</th>
											<th>Action</th>
										
										</tr>
									</thead>
									
									<tbody>

									<?php $sql = "SELECT * from  admin ";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
$cnt=1;
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{				?>	
										<tr>
											<td><?php echo $cnt;?></td>
											<td><?php echo $row['UserName'];?></td>
											<td><?php echo $row['Password'];?></td>
											<td><?php echo $row['type'];?></td>
											<td><a href="Alladmin.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you really want to Delete this Admin)">Delete from system</a></td>
											
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

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