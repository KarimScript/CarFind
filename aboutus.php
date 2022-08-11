<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>CarFind | About Us</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>
      

<?php include('includes/header.php');?>
                      <?php 

$sql = "SELECT text from tblpages where PageName='aboutus'";
$result= mysqli_query($con,$sql) or die($mysqli_error($con));
$row=mysqli_fetch_array($result);

 ?>

<section class="about_us section-padding" >
  <div class="container" style="margin-top:70px">
    <div class="section-header text-center">


      <h2>Who We Are ?</h2>
      <p style="font-size:30px;color:black;font-weight:700;text-align:center">CAR<span style="color:#1f67ec">FIND</span></p>
      <p style="color:#464646;margin-top:20px"><?php  echo $row['text']; ?> </p>
     
   
   
    </div>
  </div>
</section>








<?php include('includes/footer.php');?>



<?php include('includes/login.php');?>


<?php include('includes/registration.php');?>

<?php include('includes/forgotpassword.php');?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
</body>


</html>