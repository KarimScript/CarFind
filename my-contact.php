<?php
session_start();
error_reporting(0);
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
<title>CarFind | My Contact</title>
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
      <div class="col-md-8 col-sm-8">

        <div class="profile_wrap">
          <h5 class="uppercase">My Contact Messages </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
<?php 
$userid=$_SESSION['id'];
$sql1 = "SELECT * from tblcontact where userId='$userid'";
$result1= mysqli_query($con,$sql1) or die($mysqli_error($con));
if(mysqli_num_rows($result1)>0)
{
while($row=mysqli_fetch_array($result1))
{ ?>

              <li>
           
                <div>
                 <p style="color:black;font-size:16px"><b><?php echo $row['Message'];?></b>  </p>
                   <p style="font-size:13px">Sending Date : <?php echo $row['PostingDate'];?> </p>
                </div>
                <?php if($row['reply']==''){ ?>
                 <div > <p style="color:gray">no reply</p> </div>
                 
                  <?php }else{?>
                <div><p style="color:black">Reply : <?php echo $row['reply'] ;?></p> </div>
                <?php  } ?>
              </li>
              <?php } } ?>
              
            </ul>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('includes/footer.php');?>


<?php include('includes/login.php');

 include('includes/registration.php');

 include('includes/forgotpassword.php');
 include('includes/feedbackForm.php');

 ?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
</body>
</html>
<?php } ?>