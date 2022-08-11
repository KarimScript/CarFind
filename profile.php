<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(!isset($_SESSION['login']))
  { 
header('location:index.php');
}
else{
  $userid=$_SESSION['id'];

if(isset($_POST['update']))
  {
    $currentPass=$_POST['password'];
    $newPass=$_POST['newpass'];
    $confPass=$_POST['confpass'];
    $check="SELECT Password FROM tblusers WHERE id='$userid'";
    $res= mysqli_query($con,$check) or die($mysqli_error($con));
    $record=mysqli_fetch_array($res);
    if($currentPass !== $record['Password']){
      echo '<script> alert("Current Password Incorrect !")</script>';
    }elseif($newPass !== $confPass){
      echo '<script> alert("Password Confirmation Incorrect !")</script>';
    }else{
      $query="UPDATE tblusers SET Password='$newPass' WHERE id='$userid'";
      $res= mysqli_query($con,$query) or die($mysqli_error($con));
      if($res){
        echo '<script> alert("Password Updated ! !")</script>';
      }
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
<title>CarFind | My Profile</title>
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
 ?>
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
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase">Update Password</h5>
          <form  method="post">
          
            <div class="form-group">
              <label class="control-label">Current Password</label>
              <input class="form-control white_bg" id="password" name="password"  type="pass" required>
            </div>
            
            <div class="form-group">
              <label class="control-label"> New Password</label>
              <input class="form-control white_bg"  type="password" name="newpass" required>
            </div>
            <div class="form-group">
              <label class="control-label">Confirm Password</label>
              <input class="form-control white_bg"  type="password" name="confpass"  required>
            </div>
            <?php } ?>
           
            <div class="form-group">
              <button type="submit" name="update" class="btn btn-block">Update Password </button>
            </div>
          </form>
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