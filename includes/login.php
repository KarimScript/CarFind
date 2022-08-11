<?php

if(isset($_POST['login']))
{
$email=$_POST['email'];
$email=mysqli_real_escape_string($con, $email);
$password=$_POST['password'];
$password=mysqli_real_escape_string($con, $password);
$sql ="SELECT * FROM tblusers WHERE EmailId='$email' and Password='$password'";
$result= mysqli_query($con,$sql) or die($mysqli_error($con));
if(mysqli_num_rows($result)>0)
{
  $row=mysqli_fetch_array($result);
  if($row['status']=="verified"){
    $_SESSION['login']=$email;
    $_SESSION['fname']=$row['FullName'];
    $_SESSION['id']=$row['id'];
    $_SESSION['phone']=$row['ContactNo'];
     
    echo "<meta http-equiv='refresh' content='0'>";
  }else{
    ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  echo '<script>
  swal({
    title: "oops!",
    text: "Your account is not Verified yet..",
    icon: "error",
    button: "ok",
  });
  </script>';

  }


} else{
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  echo '<script>
  swal({
    title: "oops!",
    text: "Invalid infromation",
    icon: "error",
    button: "ok",
  });
  </script>';

}

}

?>

<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Login</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post" >
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email address*" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password*" required>
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="remember">
               
                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="Login" class="btn btn-block">
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
        <p><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal">Forgot Password ?</a></p>
      </div>
    </div>
  </div>
</div>