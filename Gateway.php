<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="icon" href="logo.png">
</head>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               success:function(result){
                   var options = {
                        "key": "rzp_test_tnHaMgRjdlp4ln", 
                        "amount": 150*100, 
                        "currency": "INR",
                        "name": "LIFEcure Clinic",
                        "description": "Test Transaction",
                        "image": "logo.png",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="UserInterface.php";
                               }
                               
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
</script>
<?php
session_start();
$servername='localhost';
$username='root';
$password='';
$database='clinic record';
$con=mysqli_connect($servername,$username,$password,$database);
$userid=$_SESSION['userid'];
$name=$_SESSION['firstname'].'  '.$_SESSION['lasttname'];
$phoneno=$_POST['phoneno'];
$branch=$_POST['branch'];
$DOA=$_POST['DOA'];
$slot=$_POST['slot'];
$mode=$_POST['select'];
mysqli_query($con,"INSERT INTO `payment`(`UserID`, `Name`, `Phoneno`, `Payment_ID`, `Payment_status`, `Date`, `Branch`, `DOA`, `Slot`, `Mode`,`Prescription`) 
VALUES ('$userid','$name','$phoneno','','pending',CURDATE(),'$branch','$DOA','$slot','$mode','')");  
?>
