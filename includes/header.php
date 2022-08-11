<style>
  a.btn{
    background:#1f67ec;
    border-radius:20px;
  }
  a.btn:hover{
    background:#1e3be0;
  }
</style>
  <nav id="navigation_bar" class="navbar navbar-default" style="position:fixed;z-index:1000;width:100vw">
    <div class="container">
      <div class="navbar-header" style="">
      <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button" style="float:inherit"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li style="border-bottom:none"><a href="index.php" style="font-size:30px;margin-right:10px">Car<span style="color:#1f67ec">Find</span></a></li>
          <li style="border-bottom:none"><a href="index.php">Home</a></li>
          <li style="border-bottom:none"><a href="aboutus.php">About Us</a></li>
          <li style="border-bottom:none"><a href="All-cars.php">Cars</a>
          <li style="border-bottom:none"><a href="condition.php">Conditions</a></li>
          <li style="border-bottom:none"><a href="contact-us.php">Contact Us</a></li>

        </ul>
      </div>
       
      </div>
      <?php
        $href = "";
        $username = "";
        if(isset($_SESSION['login'])){
          $username = $_SESSION['fname'];
          $href = "./profile.php";
        }else{
          $href = "#loginform";
          $username = "profile";
        }
       ?>
      <div class="header_wrap" >
        <div class="user_login" style="border:none">
          
        <a href=<?php echo $href; ?> data-toggle="modal" data-dismiss="modal" style="font-size:20px;color:white;margin-right:15px;position:relative;top:4px"><i class="fa fa-user-circle" aria-hidden="true"></i><span style="font-size:13px;margin-left:7px"><?php echo $username; ?></span></a>


       <?php 
        if(!isset($_SESSION['login'])){

       ?>  
        <div class="login_btn"> <a href="#loginform" class="btn btn-xs" data-toggle="modal" data-dismiss="modal">Login | Register</a> </div>
       <?php }else {?>
        <div style="display:inline-block;background:#1f67ec;color:white;padding:5px 15px;border-radius:20px"> <a href="logout.php" style="color:white" onclick="return confirm('Do you really want to Logout?')" >Logout</a> </div>
      <?php } ?>
      </div>
     
      
    </div>
  </nav>

</header>
