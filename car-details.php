<?php 
session_start();
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
<title>CarFind | Car Details</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<style>
  .listing-page .container{
     margin-top:80px;
  }
  .listing-page ul{
    display:flex;
    flex-wrap:wrap;
    row-gap:20px;
  }
   .btn.disable{
    pointer-events: none;
    opacity:50%;
  }
  
</style>
<body>


<!--Header-->
<?php include('includes/header.php');?>
<?php include('includes/login.php');?>

<?php include('includes/registration.php');?>

<?php include('includes/forgotpassword.php');?>

<?php 
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query="SELECT tblcars.*,tblbrands.BrandName,tblbrands.logo from tblcars join tblbrands on tblbrands.id=tblcars.brand WHERE tblcars.id='$id'";
  $res = mysqli_query($con, $query)or die($mysqli_error($con));
   if(mysqli_num_rows($res)> 0){
       $row=mysqli_fetch_array($res);

       $status=$row['status'];
  $stat="";
  if($status=='available'){
  $stat= "<span style='color:green'> available </span>";
  }elseif($status=='rented'){
    $stat= "<span style='color:red'> not available </span>";
  } 

   }}?>
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3" style="left:0">

       <div class="product-listing-m " style="color:black">
          <div class="product-listing-img"><img src="admin/img/<?php echo $row['img'];?>"  class="img-responsive" width="800px"/> </a> 
          </div>
          <div class="product-listing-content">
            <h2><?php echo $row['name'];?> </h2>
            <h3 class="list-price"><span style="color:blue;margin-right:8px">$<?php echo $row['price'];?></span> per day  |  <?php echo $stat; ?></h3>
            <img src="admin/img/<?php echo $row['logo'];?>"  class="img-responsive" width="70px"/>
            <br>
            <p style="font-size:18px"><?php echo $row['overview'] ?></p>
            <ul>
              <li><i class="fa fa-map" aria-hidden="true"></i><?php echo $row['location'];?></li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row['model'];?> </li>
              <li><i class="fa fa-car" aria-hidden="true"></i><?php echo $row['transmission'];?></li>
              <li>Seats : <?php echo $row['seat'];?></li>
              <li>Doors : <?php echo $row['door'];?></li>
            </ul>
            <ul>
              <?php
              $airstr='';
              $auxstr='';
              if($row['airconditioner']==1){
                $airstr='yes';
              }
              else{ 
                $airstr='no';
              }
              if($row['aux']==1){
                $auxstr='yes';
              }else{ $auxstr='no';}
              ?>
              <li>air conditioner :  <?php echo $airstr; ?></li>
              <li>aux :  <?php echo $auxstr; ?></li>
            </ul>
            <?php 
            $href="";
            if(!isset($_SESSION['login'])){
               $href="#loginform";
            }else{
              $href="#bookingform";
            }
            ?>
            <a href=<?php echo $href; ?> data-toggle="modal" data-dismiss="modal" class="btn btn-block <?=($row['status']=='rented'? " disable ":'' ) ?>">Rent Car </a>
          </div>
        </div>

 </div>
      
    
      </div>
    </div>
  </section>

  
<?php include('includes/bookingform.php');?>
<?php include('includes/footer.php');?>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 


</body>
</html>