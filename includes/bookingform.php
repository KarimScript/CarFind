<?php
include('function.php');
if(isset($_SESSION['login'])){
  $userid=$_SESSION['id'];
  $email=$_SESSION['login'];
  $name=$_SESSION['fname'];
  $phone=$_SESSION['phone'];
}
$carname=$row['name'];
$carid=$row['id'];
$loc=$row['location'];
$pricePerDey=$row['price'];
$timestamp = date('Y-m-d H:i:s');
$pick='';
$drop='';
if(isset($_SESSION['dropDate']) && isset($_SESSION['pickDate'])){
  $pick=$_SESSION['pickDate'];
  $drop=$_SESSION['dropDate'];
}
if(isset($_POST['submit']))
{
$phoneNum=$_POST['phone'];
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
car_rented($carid);
$sql ="INSERT INTO `tblbooking`(`id`, `userId`,`username`, `phone`, `carId`,`carname`,`pricePerDay`, `FromDate`, `ToDate`, `pickTime`, `dropTime`, `location`, `cost`, `refund`, `Status`, `PostingDate`) VALUES ('','$userid','$name','$phoneNum','$carid','$carname','$pricePerDey','$pickdate','$dropdate','$picktime','$picktime','$loc','$cost','0','pending','$timestamp')";
$result= mysqli_query($con,$sql) or die($mysqli_error($con));
if($result)
{
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  echo '<script>
  swal({
    title: "Ok!",
    text: "Request Sent..",
    icon: "success",
    button: "ok",
  });
  </script>'; 

  echo "<meta http-equiv='refresh' content='0'>";
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

<div class="modal fade" id="bookingform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Rent the Car</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
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
                  <input type="submit" name="submit" value="submit" class="btn btn-block">
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>