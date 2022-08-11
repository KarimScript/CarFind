<?php
session_start();
include('includes/config.php');

if(isset($_SESSION['login'])){
    $email=$_SESSION['login'];
    $name=$_SESSION['fname'];
    $phone=$_SESSION['phone'];
  
  

  if(isset($_GET['dropDate']) && isset($_GET['pickDate'])  && isset($_GET['id'])  && isset($_GET['price'])){
    $pick=$_GET['pickDate'];
    $drop=$_GET['dropDate'];
    $bookingID=$_GET['id'];
    $pricePerDey=$_GET['price'];
  }
  if(isset($_POST['update']))
  {
  
  $pickdate=$_POST['pickdate'];
  $picktime=$_POST['picktime'];
  $dropdate=$_POST['dropdate'];
  
  function dateDiff($date1, $date2) 
  {
      $diff = strtotime($date2) - strtotime($date1);
      return abs(round($diff /86400)); //86400=24*60*60
  }
  $days=dateDiff($pickdate,$dropdate);
  $cost=$days * $pricePerDey ;
  $sql ="UPDATE tblbooking SET FromDate='$pickdate' , ToDate='$dropdate' , pickTime='$picktime' , dropTime='$picktime', cost='$cost' WHERE id='$bookingID'";
  $result= mysqli_query($con,$sql) or die($mysqli_error($con));
  if($result)
  {
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    echo '<script>
    swal({
      title: "Ok!",
      text: "Booking Updated",
      icon: "success",
      button: "ok",
    });
    </script>'; 
    header("location:my-booking.php");
  
 
  } else{
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    echo '<script>
    swal({
      title: "oops!",
      text: "Something Wrong",
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
<title>CarFind | Edit Booking</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 

</head>
<body>
       

<section class="user_profile inner_pages">
  <div class="container">
    <h1 style="text-align:center;">Update Booking</h1>
  
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
        <form method="post">
              <div class="form-group">
                  <input type="text" class="form-control" name="username" value="<?php echo $name;?>" readonly>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" value="<?php echo $email;?>" readonly>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" name="phone" value="<?php echo $phone;?>" required>
                </div>
                <div class="form-group">
                  <label for="pickdate">Pickup-date:</label>
                  <input type="date" class="form-control" min="<?php echo date("Y-m-d") ?>"   name="pickdate" value="<?php echo $pick;?>" required >
                </div>
                <div class="form-group">
                  <label for="pickdate">Pickup-time:</label>
                  <input type="time" class="form-control"    name="picktime" required >
                </div>
                <div class="form-group">
                  <label for="dropdate">Drop-date:</label>
                  <input type="date" class="form-control" min="<?php echo date("Y-m-d") ?>"   name="dropdate" value="<?php echo $drop;?>" required >
                </div> 
                           
                <div class="form-group">
                  <input type="submit" name="update" value="Update" class="btn btn-block">
                </div>
              </form>
            
        </div>
      </div>
    </div>
  </div>
</section>


<<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 







<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
<?php } ?>