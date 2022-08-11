<?php

if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$fname=mysqli_real_escape_string($con, $fname);
$email=$_POST['email']; 
$email=mysqli_real_escape_string($con, $email);
$mobile=$_POST['mobileno'];
$mobile=mysqli_real_escape_string($con, $mobile);
$password=$_POST['password']; 
$password=mysqli_real_escape_string($con, $password);
$confpassword=$_POST['confirmpassword'];
$confpassword=mysqli_real_escape_string($con, $confpassword);
$driverlis=$_FILES["img"]["name"];
move_uploaded_file($_FILES["img"]["tmp_name"],"./admin/img/".$driverlis);
$check="SELECT * FROM tblusers WHERE EmailId='$email'";
$res=mysqli_query($con,$check) or die($mysqli_error($con));
$num=mysqli_num_rows($res);
if($num>0){
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  echo ' <script> swal({
    title: "oops!",
    text: "This Email Already Exist ,Choose another",
    icon: "error",
    button: "ok",
  });
  </script> ';

}
elseif($password !== $confpassword){
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  echo ' <script> swal({
    title: "oops!",
    text: "Wrong password confirmation",
    icon: "error",
    button: "ok",
  });
  </script> ';
}else{
  
 

    $sql="INSERT INTO `tblusers`(`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `Driving License`, `status`) VALUES ('','$fname','$email','$password','$mobile','$driverlis','unverified')";
  $result = mysqli_query($con, $sql) or die(mysqli_error($con));


  if($result){
    ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  echo ' <script> swal({
    title: "Good!",
    text: "Registration Success!,now you can login",
    icon: "success",
    button: "ok",
  });
  </script> ';
  
  }
}

}


?>




<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
            
              <form  method="POST" name="signup" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
                </div>
                      <div class="form-group">
                  <input type="number" class="form-control" name="mobileno" placeholder="Mobile Number" min="8"  required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Email Address" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" minlength="5" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" minlength="5" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                 <p style="color:black">Driver Lisence :</p> <input type="file"  name="img"  required>
                </div>
                
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required checked>
                  <label for="terms_agree">I Agree with <a href="condition.php">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>