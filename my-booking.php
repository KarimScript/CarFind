<?php
session_start();

include('includes/config.php');
if(!isset($_SESSION['login']))
  { 
header('location:index.php');
}
else{


if(isset($_POST['update']))
  {

}

?>
  <!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>CarFind | My Booking</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 

</head>
<body>
       
<?php include('includes/header.php');?>


<?php 
$useremail=$_SESSION['login'];
$userid=$_SESSION['id'];
$sql = "SELECT * from tblusers where id='$userid'";
$result= mysqli_query($con,$sql) or die($mysqli_error($con));
if(mysqli_num_rows($result)>0)
{
$row=mysqli_fetch_array($result);
}?>
<section class="user_profile inner_pages">
  <div class="container">
    <h1 style="text-align:center;margin-block:40px">My Profile</h1>
    <div class="user_profile_info  padding_4x4_40">
      <div class="upload_user_logo"> <img src="admin/img/User.png" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo $row['FullName'];?></h5>
        <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $row['EmailId'];?></p>
        <p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $row['ContactNo'];?></p>
         
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include('includes/sidebar.php');?>
       <p style="color:black">Note ! : Cancel or Edit a confirmed or an active booking only accessible by administrator,so you need to contact our teams..</p>

      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase">My Bookings </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
<?php
$userid=$_SESSION['id'];
 $sql = "SELECT tblcars.img ,tblcars.id as cid,tblbooking.* from tblbooking join tblcars on tblbooking.carId=tblcars.id  where tblbooking.userId='$userid'";
 $result= mysqli_query($con,$sql) or die($mysqli_error($con));
$cnt=1;
$status="";
if(mysqli_num_rows($result) > 0)
{
while($row=mysqli_fetch_array($result))
{  
  if($row['Status']=='pending'){
    $status="<p style='color:blue'>pending</p>";
  }elseif($row['Status']=='canceled'){
    $status="<p style='color:red'>canceled</p>";
  }elseif($row['Status']=='active'){
    $status="<p style='color:green'>active</p>";
  }elseif($row['Status']=='finished'){
    $status="<p style='color:gray'>finished</p>";
  }else{
    $status="<p style='color:green'>confirmed</p>";
  }
  ?>

<li>
                <div class="vehicle_img"> <a href="car-details.php?id=<?php echo $row['cid'];?>"><img src="admin/img/<?php echo $row['img'];?>" ></a> </div>
                <div class="vehicle_title">
                  <h6><a href="car-details.php?id=<?php echo $row['cid'];?>"><?php echo $row['carname'];?></a>-<?php echo $row['pricePerDay'].'$/day' ?></h6>
                  <p><b>From Date:</b> <?php echo $row['FromDate'];?><br /> <b>To Date:</b> <?php echo $row['ToDate'];?><br /> <b>Request Date:</b> <?php echo $row['PostingDate'];?></p>
                  <p style="color:black"> location: <?php echo $row['location'] ?> </p>
                  <p style="color:black;font-size:11px"> pickTime: <?php echo $row['pickTime'] ?> | dropTime: <?php echo $row['dropTime'] ?></p>
                  <p style="color:black"> total cost: <?php echo $row['cost'].'$' ?> - refund: <?php echo $row['refund'].'$' ?></p>
                </div>
    
              
                <div class="vehicle_status"><?php echo $status; ?>
              <?php  if($row['Status']=='pending'){?>
                <a href="edit-booking.php?id=<?php echo $row['id'];?>&pickDate=<?php echo $row['FromDate'] ?>&dropDate=<?php echo $row['ToDate'] ?>&price=<?php echo $row['pricePerDay'] ?>"><i class="fa fa-edit"></i> edit</a><br>
                <a href="delete-booking.php?id=<?php echo $row['id'];?>&carid=<?php echo $row['cid'];?>" onclick="return confirm('Do you want to Cancel this Booking?');"><i class="fa fa-close"></i> cancel</a>
             <?php }
               ?>
              </div>

               
              </li>
              <?php }} ?>


            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('includes/footer.php');
include('includes/feedbackForm.php');
?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
<?php } ?>
