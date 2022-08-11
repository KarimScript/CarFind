<?php
$username='';
$uid='';
if(isset($_SESSION['fname'])){
$username=$_SESSION['fname'];
$uid=$_SESSION['id'];
}
$timestamp = date('Y-m-d H:i:s');

if(isset($_POST['add']))
{

$text=$_POST['text'];
$sql ="INSERT INTO `tblfeedback`(`id`, `userId`, `UserName`, `text`, `PostingDate`, `status`) VALUES ('','$uid','$username','$text','$timestamp','pending')";
$result= mysqli_query($con,$sql) or die($mysqli_error($con));
if($result)
{
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  echo '<script>
  swal({
    title: "Ok!",
    text: "Feedback Sent..",
    icon: "success",
    button: "ok",
  });
  </script>'; 
 


} else{
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

<div class="modal fade" id="feedbackform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Add Feedback</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post" >
                <div class="form-group">
                  <input type="text" class="form-control" name="name" value="<?php echo $username; ?>" readonly>
                </div>
                <div class="form-group">
                <textarea rows="4"  class="form-control" name="text" placeholder="your feedback" required></textarea>
                </div>
                
                <div class="form-group">
                  <input type="submit" name="add" class="btn btn-block">
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>