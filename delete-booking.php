<?php
include('includes/config.php');
include('function.php');
if(isset($_GET['id']) && isset($_GET['carid'])){
    $id=$_GET['id'];
    $carid=$_GET['carid'];
    $sql="DELETE FROM tblbooking WHERE Status='pending' AND id='$id'";
    $result= mysqli_query($con,$sql) or die($mysqli_error($con));
    car_available($carid);
if($result)
{
    header("location:my-booking.php");
}
}