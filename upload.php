<?php 
error_reporting(0);
$servername='localhost';
$username='root';
$password='';
$database='clinic record';
$conn=mysqli_connect($servername,$username,$password,$database);
$id=$_SESSION['userid'];
$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="photo/".$filename;
move_uploaded_file($tempname,$folder);
$sql=" UPDATE `user` SET `Image`='$folder' WHERE UserID='$id' ";
$result=mysqli_query($conn,$sql);
?>

