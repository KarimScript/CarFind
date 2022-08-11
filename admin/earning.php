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
	
	<title>CarFind | Earnings </title>

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

						<h2 class="page-title">Manage Bookings</h2>

						
						<div class="panel panel-default" style="overflow:auto">
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>total Cost</th>
											<th>refund</th>
											<th>Status</th>
											<th>Posting date</th>
											<th>Earning</th>
										</tr>
									</thead>
									
									<tbody>

									<?php


$cnt=1;
$earning=0;
$total=0;
$sql = "SELECT * from tblbooking  WHERE Status='finished'";
$res = mysqli_query($con, $sql) or die($mysqli_error($con));

if(mysqli_num_rows($res) > 0)
{
  
while($row = mysqli_fetch_array($res)){
$cost=$row['cost'];
$refund=$row['refund'];
$earning=$cost-$refund;

$pickdate=$row['FromDate']; $picktime=$row['pickTime'];
$fromDate= $pickdate .' '. $picktime;

$dropdate=$row['ToDate']; $droptime=$row['dropTime'];
$toDate= $dropdate .' '. $droptime;
				
    ?>	
										<tr>
											<td><?php echo $cnt;?></td>
											<td><?php echo $fromDate;?></td>
											<td><?php echo $toDate;?></td>
											<td><?php echo $row['cost'].'$';?></td>
											<td><?php echo $row['refund'].'$';?></td>
											<td><?php echo $row['Status'];?></td>
											<td><?php echo $row['PostingDate'];?></td>
										    <td><?php echo $earning.'$';  ?></td>

										</tr>
                                        
										<?php $cnt=$cnt+1;
                                          $total=$total+$earning; }} ?>
									
									</tbody>
                                   
								</table>

                                <tr>
                                    <h3>Total Earnings : <?php echo $total.'$'; ?></h3></tr>

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
