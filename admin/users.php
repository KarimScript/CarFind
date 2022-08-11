<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['alogin']))
	{	
header('location:index.php');
}
else{

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$query="DELETE FROM tblusers WHERE id='$id'";
		$res = mysqli_query($con, $query)or die($mysqli_error($con));
		if($res){
			echo '<script> alert("User Deleted !")</script>';
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
	
	<title>CarFind | Manage Users   </title>

	
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

						<h2 class="page-title">Users</h2>
						<div class="panel panel-default">
						
							<div class="panel-body">
								<table  class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
												<th> Name</th>
											<th>Email </th>
											<th>Contact no</th>
											<th>Status</th>
											<th>Action</th>
										
										</tr>
									</thead>
									
									<tbody>

									<?php $sql = "SELECT * from  tblusers ";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
$cnt=1;
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{				?>	
										<tr>
											<td><?php echo $cnt;?></td>
											<td><?php echo $row['FullName'];?></td>
											<td><?php echo $row['EmailId'];?></td>
											<td><?php echo $row['ContactNo'];?></td>
                                            <td><?php echo $row['status'];?></td>
											<td><a href="users.php?id=<?php echo $row['id'];?>" onclick="return confirm('Do you really want to Delete this User')">Delete from system </a> |
											<a href="viewDriverLisence.php?id=<?php echo $row['id'];?>&driver=<?php echo $row['Driving License'];?>"><i class="fa fa-eye"></i> View Driver lisence </a>
										</td>
											
											
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
