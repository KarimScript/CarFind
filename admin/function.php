<?php
include('includes/config.php');

function car_rented($id){
    $con = mysqli_connect("localhost", "root", "", "carrental") or die(mysqli_error($con));
    $sql3="UPDATE tblcars SET status='rented' WHERE  id='$id'";
    $result3 = mysqli_query($con, $sql3) or die($mysqli_error($con));
}
function car_available($id){
    $con = mysqli_connect("localhost", "root", "", "carrental") or die(mysqli_error($con));
    $sql4="UPDATE tblcars SET status='available' WHERE id='$id'";
    $result4 = mysqli_query($con, $sql4) or die($mysqli_error($con));
}