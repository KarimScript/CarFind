<?php
if(isset($_POST['update']))
  {
$email=$_POST['email'];
$email=mysqli_real_escape_string($con, $email);
$mobile=$_POST['mobile'];
$newpassword=$_POST['newpassword'];
$newpassword=mysqli_real_escape_string($con, $newpassword);
$sql ="SELECT EmailId FROM tblusers WHERE EmailId='$email' and ContactNo='$mobile'";
$res= mysqli_query($con, $sql) or die(mysqli_error($con));
if(mysqli_num_rows($res) > 0)
{
$update="update tblusers set Password='$newpassword' where EmailId='$email' and ContactNo='$mobile'";
$result= mysqli_query($con, $update) or die(mysqli_error($con));
if($result){
echo "<script>alert('Your Password succesfully changed');</script>";
}
}
else {
echo "<script>alert('Email id or Mobile no is Incorrect');</script>"; 
}
}

?>

<div class="modal fade" id="forgotpassword">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Password Recovery</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="forgotpassword_wrap">
            <div class="col-md-12">
              <form name="chngpwd" method="post" >
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Your Email address*" required="">
                </div>
  <div class="form-group">
                  <input type="text" name="mobile" class="form-control" placeholder="Your Reg. Mobile*" required="">
                </div>
  <div class="form-group">
                  <input type="password" name="newpassword" class="form-control" placeholder="New Password*" required="">
                </div>
  <div class="form-group">
                  <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password*" required="">
                </div>
                <div class="form-group">
                  <input type="submit" value="Reset My Password" name="update" class="btn btn-block">
                </div>
              </form>
              <div class="text-center">
                <p><a href="#loginform" data-toggle="modal" data-dismiss="modal"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>