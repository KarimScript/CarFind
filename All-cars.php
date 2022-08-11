<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>CarFind | Our Cars</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<style>
  .menu-filter{
    background:#1f67ec;
    min-height:80px;
   position:sticky;
   display:flex;
   align-items:center;
   justify-content:center;
   z-index: 999;
   top:60px;
   flex-wrap:wrap;
   padding-bottom:10px;
 }
 .menu-filter h3{
   color:white;
   flex:auto;
  margin:10px 10px 10px 30px;
 }
 .menu-filter form{
   width:80%;
   display:flex;
   flex-wrap:wrap;
   align-items:center;
   margin-top:10px;
  
 }
 .menu-filter form label{
   color:white;

 }
 .menu-filter form select{
   margin:10px 15px;
   padding:10px;
   background:transparent;
   border-color:white;
   color:black;
   border-radius:5px;
 }
</style>
</head>
<body>

<?php include('includes/header.php');?>

<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Our Cars</h1>
      </div>
    </div>
  </div>
  
  <div class="dark-overlay"></div>
</section>

 <div class="menu-filter">
   <h3><i class="fa fa-filter" aria-hidden="true"></i> Filter</h3>
   <form id="form1" method="GET" action="All-cars.php">
            <div class="option">
            <label for="location">Location :</label>
						<select name="location" onchange="this.form.submit()">
						  <option value="all">All</option>
                          <option value="beirut" <?=($_GET['location']=='beirut'?' selected':'' ) ?>>beirut</option>
                          <option value="saida" <?=($_GET['location']=='saida'?' selected':'' ) ?>>saida</option>
	                        <option value="nabatieh" <?=($_GET['location']=='nabatieh'?' selected':'' ) ?>>nabatieh</option>
                          <option value="sour" <?=($_GET['location']=='sour'?' selected':'' ) ?>>sour</option>
                        </select>
            </div>
            
						<?php
						$q="SELECT * FROM tblbrands";
						$r = mysqli_query($con, $q)or die($mysqli_error($con));
						
						?>
            <div class="option">
            <label for="brand">Brand :</label>
						<select name="brand" onchange="this.form.submit()">
<option value="all"> All </option>
<?php if(mysqli_num_rows($r) > 0)
{
	while($record=mysqli_fetch_array($r))
	{
		$bid=$record['id']; ?>
 <option value=<?php echo $bid;?> <?=($_GET['brand']==$bid ?' selected':'' ) ?>><?php echo $record['BrandName'];?></option>
 <?php } } ?>
</select>
            </div>
           <div class="option">
           <label for="transmission">Transmission :</label>
<select name="transmission" onchange="this.form.submit()">
						  <option value="all">All</option>
                          <option value="automatic" <?=($_GET['transmission']=='automatic'?' selected':'' ) ?>>automatic</option>
                          <option value="manual" <?=($_GET['transmission']=='manual'?' selected':'' ) ?>>manual</option>
                        </select>
           </div> 
           <div class="option">
            <label for="price">Price :</label>
						<select name="price" onchange="this.form.submit()">
						  <option value="all">All</option>
                          <option value="20-40" <?=($_GET['price']=='20-40'?' selected':'' ) ?>>20$-40$</option>
                          <option value="40-60" <?=($_GET['price']=='40-60'?' selected':'' ) ?>>40$-60$</option>
	                        <option value="60-100" <?=($_GET['price']=='60-100'?' selected':'' ) ?>>60$-100$</option>
                          <option value="100-150" <?=($_GET['price']=='100-150'?' selected':'' ) ?>>100$-150$</option>
                          <option value="150-200" <?=($_GET['price']=='150-200'?' selected':'' ) ?>>150$-200$</option>
                          <option value="200>" <?=($_GET['price']=='200>'?' selected':'' ) ?>>200$ ></option>
                        </select>
            </div>

                         </form>
 </div>

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3" style="left:10%">


<?php
$arguments=array();
if(isset($_GET['location']) && $_GET['location']!=='all') {
	$location=$_GET['location'];
	$arguments[]="tblcars.location='$location'"; 

  }
  if(isset($_GET['brand']) && $_GET['brand']!=='all') {
	$brand=$_GET['brand']; 
	$arguments[]="tblcars.brand='$brand'";
  }

  if(isset($_GET['transmission']) && $_GET['transmission']!=='all') {
    $trans=$_GET['transmission']; 
    $arguments[]="tblcars.transmission='$trans'";
    }

  if(isset($_GET['price']) && $_GET['price']!=='all'){
    $price=$_GET['price'];
    if($price=='200>'){
      $arguments[]="tblcars.price >=200";
    }else{
      $range = explode("-",$price);
      $price1=$range[0];
      $price2=$range[1];
      $arguments[]="tblcars.price BETWEEN '$price1' AND '$price2'";
    }
  }
 
  if(sizeof($arguments)>1) {
   
	$str = implode(" AND ",$arguments);
  
	$sql = "SELECT tblcars.*,tblbrands.BrandName from tblcars join tblbrands on tblbrands.id=tblcars.brand WHERE " . $str ;
   
  }
  if(sizeof($arguments)==1){
	$str = implode('',$arguments);
  
	$sql = "SELECT tblcars.*,tblbrands.BrandName from tblcars join tblbrands on tblbrands.id=tblcars.brand WHERE " . $str ;
  }
  if(sizeof($arguments)==0){
	$sql = "SELECT tblcars.*,tblbrands.BrandName from tblcars join tblbrands on tblbrands.id=tblcars.brand";
  }
 
$result = mysqli_query($con, $sql)or die($mysqli_error($con));
if(mysqli_num_rows($result)> 0)
{
while($row=mysqli_fetch_array($result))

{
  $status=$row['status'];
  $stat="";
  if($status=='available'){
  $stat= "<span style='color:green'> available </span>";
  }elseif($status=='rented'){
    $stat= "<span style='color:red'> Not available </span>";
  } 
  
  ?>
        <div class="product-listing-m " style="color:black">
          <div class="product-listing-img"><img src="admin/img/<?php echo $row['img'];?>"  class="img-responsive" alt="Image" /> </a> 
          </div>
          <div class="product-listing-content">
            <h5><?php echo $row['name'];?></h5>
            <p class="list-price"><span style="color:blue;margin-right:8px">$<?php echo $row['price'];?></span> per day  |  <?php echo $stat; ?></p>
            <ul>
              <li><i class="fa fa-map" aria-hidden="true"></i><?php echo $row['location'];?></li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row['model'];?> </li>
              <li><i class="fa fa-car" aria-hidden="true"></i><?php echo $row['transmission'];?></li>
            </ul>
            <a href="car-details.php?id=<?php echo $row['id'];?>" class="btn">View Details </a>
          </div>
        </div>
      <?php }
    }else{echo '<h2 style="text-align:center;color:#4a4a4a;font-weight:200;font-size:30px">No Car Found ...<i class="fa fa-filter" aria-hidden="true"></i> </h2>';}
      ?>
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
