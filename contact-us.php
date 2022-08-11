<?php
session_start();
error_reporting(0);
include('includes/config.php');
$username='';
$uid='';
$email='';
$contactno='';
$timestamp = date('Y-m-d H:i:s');
if(isset($_SESSION['login'])){
  $username=$_SESSION['fname'];
  $uid=$_SESSION['id'];
  $email=$_SESSION['login'];
  $contactno=$_SESSION['phone'];
  }
if(isset($_POST['send']))
  {

$phone=$_POST['phone'];
$message=$_POST['message'];
$sql="INSERT INTO `tblcontact`(`id`, `userId`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES ('','$uid','$username','$email','$phone','$message','$timestamp','unread')";
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
if($result){
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  echo '<script>
  swal({
    title: "Ok!",
    text: "Message Sent..",
    icon: "success",
    button: "ok",
  });
  </script>'; 
}else{
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  echo '<script>
  swal({
    title: "oops!",
    text: "something wrong",
    icon: "error",
    button: "ok",
  });
  </script>';
}

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
<title>CarFind | Contact</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

</head>
<body>  
        

<?php include('includes/header.php');?>

<section class="page-header contactus_page" style="background-position:center">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Contact Us</h1>
      </div>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

<section class="contact_us section-padding" >
  <div class="container">
    <div  class="row">
      <div class="col-md-6">
        <h3>Feel free to Contact Us</h3>
         
        <div class="contact_form gray-bg">
          <form  method="post">
            <div class="form-group">
              <label class="control-label">Full Name <span>*</span></label>
              <input type="text" name="fullname" class="form-control white_bg" value="<?php echo $username ?>" readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address <span>*</span></label>
              <input type="email" name="email" class="form-control white_bg" value="<?php echo $email ?>" readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number <span>*</span></label>
              <input type="number" name="phone" class="form-control white_bg" value="<?php echo $contactno ?>" required>
            </div>
            <div class="form-group">
              <label class="control-label">Message <span>*</span></label>
              <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
            </div>
            <div class="form-group">
              <?php
              if(isset($_SESSION['login'])){?>
                 <button class="btn" type="submit" name="send" type="submit">Send Message </button>
             <?php }
             else{ ?>
              <button class="btn" type="submit" name="send" type="submit" disabled>Send Message </button>
              <p style="margin-top:10px">Please Login to your account .</p>
             <?php }
              ?>
              
              
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6 " >
        <h3>Contact Info</h3>
        <div class="contact_detail">
              <?php 
$query="SELECT * FROM contactinfo";
$res = mysqli_query($con, $query)or die($mysqli_error($con));
if(mysqli_num_rows($res)>0){
  $row=mysqli_fetch_array($res);
}
 ?>
          <ul>
            <li>
              <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
              <div class="contact_info_m"><a href="#"><?php echo $row['Email']; ?></a></div>
            </li>
            <li>
              <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
              <div class="contact_info_m"><a href="#">phone1 : <?php echo $row['phone1']; ?></a></div>
            </li>
            <li>
              <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
              <div class="contact_info_m"><a href="#">phone2 : <?php echo $row['phone2']; ?></a></div>
            </li>
          </ul>
          
        </div>
      </div>
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
