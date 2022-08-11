<?php
session_start();
error_reporting(0);
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
	
	<title>CarFind |  Manage Contact  </title>

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

						<h2 class="page-title">Manage Contact</h2>
						<form id="form1" method="GET" action="manage-contact.php">
						<select name="status" onchange="this.form.submit()">
						  <option value="all">All</option>
                          <option value="unread" <?=($_GET['status']=='unread'?' selected':'' ) ?>>No Reply Message</option>
                        </select>
                        </form>

						
						<div class="panel panel-default" style="overflow:auto">
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Name</th>
											<th>Email</th>
											<th>Contact No</th>
											<th>Message</th>
											<th>Reply</th>
											<th>Posting date</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>

									<?php
									$sql="";
									if(isset($_GET['status']) && $_GET['status']=='unread'){
										$sql = "SELECT * from  tblcontact WHERE status='unread' ";
									}else{
                                        $sql = "SELECT * from  tblcontact ";
									}
									
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
$num= mysqli_num_rows($result);
$cnt=1;
if($num > 0){
while($row = mysqli_fetch_array($result))
{				?>	
										<tr>
											<td> <?php echo $cnt; ?></td>
											<td><?php echo $row['name'];?></td>
											<td><?php echo $row['EmailId'];?></td>
											<td><?php echo $row['ContactNumber'];?></td>
											<td><?php echo $row['Message'];?></td>
											<td><?php echo $row['reply'];?></td>
											<td><?php echo $row['PostingDate']?></td>
											
																<?php if($row['status'] == 'read')
{
	?><td>Read<i class="fa fa-check"></i></td>
<?php } else {?>

<td><a href="reply-message.php?contactid=<?php echo $row['id'];?>" >reply</a>
</td>
<?php } ?>
										</tr>
										<?php }
									 $cnt++;} ?>
										
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
