<?php 

include('includes/config.php');


function check_for_active(){
    $con = mysqli_connect("localhost", "root", "", "carrental") or die(mysqli_error($con));
    $sql1="UPDATE tblbooking SET Status='active' WHERE Status='confirmed' AND CONCAT(FromDate,' ',pickTime) <=CURRENT_TIMESTAMP ()";
    $result1 = mysqli_query($con, $sql1) or die($mysqli_error($con));
}

function check_for_finished(){
    $con = mysqli_connect("localhost", "root", "", "carrental") or die(mysqli_error($con));
    $sql2="UPDATE tblbooking SET Status='finished' WHERE Status='active' AND CONCAT(ToDate,' ',dropTime) <=CURRENT_TIMESTAMP ()";
    $result2 = mysqli_query($con, $sql2) or die($mysqli_error($con));
    if($result2){
        $sql3= "SELECT carId FROM tblbooking  WHERE CONCAT(ToDate,' ',dropTime) <=CURRENT_TIMESTAMP ()"; 
        $result3=mysqli_query($con, $sql3) or die($mysqli_error($con));
        while($row2=mysqli_fetch_array($result3)){
            $carid=$row2['carId'];
            car_available($carid);
        }
    
    
    
}
}

function car_available($id){
    $con = mysqli_connect("localhost", "root", "", "carrental") or die(mysqli_error($con));
    $sql4="UPDATE tblcars SET status='available' WHERE id='$id'";
    $result4 = mysqli_query($con, $sql4) or die($mysqli_error($con));
}

check_for_active();
check_for_finished();
