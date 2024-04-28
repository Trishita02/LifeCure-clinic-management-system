<?php
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: UserRegister.html");
        exit;
    }
    $servername='localhost';
    $username='root';
    $password='';
    $database='clinic record';
    $conn=mysqli_connect($servername,$username,$password,$database);
    $rating=$_POST['buttons'];
    $id=$_SESSION['userid'];
    $sql=" UPDATE `user` SET `Rating`='$rating' WHERE UserID='$id' ";
    $result=mysqli_query($conn,$sql);
    if($result){   
        include 'UserInterface.php';
    }
?>