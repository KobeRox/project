<?php
//get data and configure file
require_once("../../conf/auth.php");
$bookingNum=$_POST['bookingNum'];

if(isset($bookingNum)){

    $connection = mysqli_connect("$host","$user","$pswd","$dbnm");
    if ($connection === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
//check if number exist in the database

    $sqlCheck = "SELECT COUNT(1) FROM booking WHERE bookingNum='".$bookingNum."'" ;
    $r=mysqli_query($connection, $sqlCheck);
    $row=mysqli_fetch_row($r);
    if($row[0]!=1){
        echo "<br>&nbsp&nbsp&nbsp<h1>The record does not exist for assign</h1><br><br>";
    }else{
//        change assign status and give user feedback
        $sql = "update booking set status = 'assigned' where bookingNum = '".$bookingNum."'";
        if (mysqli_query($connection, $sql)) {

            echo "<br>&nbsp&nbsp&nbsp<h2>".$bookingNum." has been assigned successfully.</h2><br><br><br>";
            include("get.php");
        }
        else{
            echo "unable to assign";
        }
    }
    mysqli_close($connection);
}
else{
    echo "Booking number is not set";
}




?>