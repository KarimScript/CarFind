<?php 
session_start();

include('includes/config.php');

if(isset($_POST['find'])){

 $city=$_POST['city'];
 $pickdate=$_POST['pickdate'];
 $dropdate=$_POST['dropdate'];
 $_SESSION['pickDate']=$pickdate;
 $_SESSION['dropDate']=$dropdate;
 header("location:All-cars.php?location=$city");
}

?>

<!DOCTYPE HTML>
<html lang="en" style="overflow-x:hidden">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>CarFind</title>

<style>
  a.btn{
    background:#1f67ec;
    border-radius:20px;
  }
  a.btn:hover{
    background:#1e3be0;
  }
</style>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

<link rel="stylesheet" href="assets/css/style.css" type="text/css">

<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<style>
.reviews{
  margin-top:50px;
}
.reviews .slide{
  margin-block:60px;
  min-width:250px;
}
.reviews .swiper{
  padding:30px;
  
}
.reviews .swiper-wrapper{
  display:flex;
  

}
.reviews h1{
  text-align: center;
  font-size: 40px;
  margin-bottom: 40px;
}
.reviews .slide .text {
  padding: 2rem;
  font-size: 13px;
  background: #3447d3fc;
  border-radius: .5rem;
  color: white;
  line-height: 2;
  position: relative;
  z-index: 0;
  margin-bottom: 3rem;
}

.reviews .slide .text::before {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 1rem;
  height: 2rem;
  width: 2rem;
  background: #3447d3fc;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
}

.reviews .slide .user {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  gap: 1rem;
}

.reviews .slide .user img {
  height: 5rem;
  width: 5rem;
  border-radius: 50%;
}

.reviews .slide .user h3 {
  font-size: 20px;
  color: #10221b;
}


</style>

</head>
<body style="background:#f9f9f9">

<?php 
 include('includes/login.php');
 include('includes/registration.php');
 include('includes/feedbackForm.php');
include('includes/header.php');

?>

<section id="banner" class="banner-section" style="min-height:100vh;">
  <div class="container">
          <div class="banner_content" style="margin-top:70px">
            <h1>The Fastest Way <br> To Find Your Daily Car</h1>
            <p>Rent a car from your city ,We are available arround lebanon. </p>
            <a href="./All-cars.php" class="btn">Our Cars</a>
        </div>
    
    <form class="form-inline" method="POST"  style="margin-top:200px;color:grey;font-size:15px;display:flex;justify-content:center;align-items:center;gap:20px;flex-wrap:wrap;background:white;padding:50px 30px;border-radius:5px">
    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" class="form-control" id="city" placeholder="pickup location" name="city" required style="background:transparent;border:1px solid grey">
    </div>
    <div class="form-group">
      <label for="pickdate">Pickup-date:</label>
      <input type="date" class="form-control" id="pickdate"  name="pickdate" min="<?php echo date("Y-m-d") ?>" required style="background:transparent;border:1px solid grey">
    </div>
    <div class="form-group">
      <label for="dropdate">Drop-date:</label>
      <input type="date" class="form-control" id="dropdate"  name="dropdate" min="<?php echo date("Y-m-d") ?>" required style="background:transparent;border:1px solid grey">
    </div>
    <button type="submit" name="find" class="btn" style="margin:0">Find Car</button>
  </form>  
  </div>
 
</section>
<!-- /Banners --> 



<section class="brand-section" style="background:#f9f9f9">

  <div class="container div_zindex">
    <h1 style="text-align:center;font-size:50px;margin-block:70px">Our Brands</h1>
    <div class="row">
<?php 
$sqlBrand="SELECT * FROM tblbrands";
$resultBrand= mysqli_query($con,$sqlBrand) or die($mysqli_error($con));
if(mysqli_num_rows($resultBrand) > 0)
{
while($rowBrand = mysqli_fetch_array($resultBrand))
{  ?>

      <div class="col-lg-3 col-xs-6 col-sm-3">
        <div class="fun-facts-m">
            <img src="./admin/img/<?php echo $rowBrand['logo'] ?>" alt="" width="130px"> 
        </div>
      </div>
     <?php } }?> 

    </div>
  </div>
 

</section>
 



<section class="reviews" id="reviews" style="background:#f9f9f9">

        <h1 class="heading">Client's Feedback</h1>
    
        <div class="swiper review-slider">
    
            <div class="swiper-wrapper">
            <?php 
$sql = "SELECT * FROM tblfeedback WHERE status='confirmed'";
$result= mysqli_query($con,$sql) or die($mysqli_error($con));
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{  ?>
    
                <div class="swiper-slide slide">
                    <p class="text"><?php echo $row['text'] ?></p>
                    <div class="user">
                        <div class="info">
                            <h3><?php echo $row['UserName'] ?></h3>
                        </div>
                    </div>
                </div>
    <?php } } ?>
          
       
               
            </div>
          
        </div>
        <?php
        $link="";
        if(!isset($_SESSION['login'])){
          $link="#loginform";
        }else{
          $link="#feedbackform";
        }
         ?>
       <a href=<?php echo $link; ?> class="btn" data-toggle="modal" data-dismiss="modal" style="display:table;margin-bottom:80px">Add Feedback</a>
    </section>
 
    <script>
  var swiper = new Swiper(".review-slider", {
    
    slidesPerView:5,
  grabCursor:true,
  spaceBetween: 30,
  centeredSlides: true,
  autoplay:{
    delay:2500,
    disableOnInteraction:false,
  },
  breakpoints: {
      0: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      991: {
        slidesPerView: 4,
      },
  },

});
</script>


<?php include('includes/footer.php');?>

<?php include('includes/forgotpassword.php');?>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 




</body>


</html>
<!-- 