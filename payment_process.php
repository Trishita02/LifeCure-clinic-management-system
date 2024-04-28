<?php
error_reporting(0);
session_start();
$servername='localhost';
$username='root';
$password='';
$database='clinic record';
$con=mysqli_connect($servername,$username,$password,$database);
$userid=$_SESSION['userid'];
$name=$_SESSION['firstname'].'  '.$_SESSION['lasttname'];


if(isset($_POST['payment_id'])){
$payment_status="complete";
$payment_id=$_POST['payment_id'];
mysqli_query($con,"UPDATE `payment` SET `Payment_ID`='$payment_id',`Payment_status`='$payment_status' WHERE `UserID`='$userid' and Date=CURDATE()");  
}

?>


