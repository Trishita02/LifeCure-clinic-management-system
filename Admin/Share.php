<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './config/site_css_links.php';?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Table.css">
    <link rel="icon" href="logo.png">
    <title>Share Link</title>
</head>
<body>
<div class="wrapper">
<?php 
error_reporting(0);
include './config/header.php';
include './config/sidebar.php';
?>  
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="margin-top:7vh">Share Link</h1>
          </div>
        </div>
      </div>
    </section>
        <?php
          func();
          $servername='localhost';
          $username='root';
          $password='';
          $database='clinic record';
          $conn=mysqli_connect($servername,$username,$password,$database);
        ?>
        <form  method="post" action="">
           <input type="text" style="margin-top:10vh; margin-left:27vw; height:6vh;width:25vw;" name="link"><br>
            <a> 
            <input type="submit"  class="btn btn-primary btn-sm btn-flat btn-block" style="margin-top:4vh; margin-left:37vw; height:5vh;width:6vw;" value="Send" name="Send"></a>
        </form>
<?php include './config/site_js_links.php'; ?>
<?php
   error_reporting(0);
    function func(){
        $ID=$_GET['ID'];
        if($ID!=''){
        $link=$_POST['link'];
        $servername='localhost';
        $username='root';
        $password='';
        $database='clinic record';
        $conn=mysqli_connect($servername,$username,$password,$database);
        $sql="UPDATE `user` SET `Link`='$link' where UserID='$ID'"; 
        $result=mysqli_query($conn,$sql);
        }
      }
      if(array_key_exists("Send",$_POST)){
          $ID=$_GET['ID'];
          $sql="SELECT * FROM `user` where UserID='$ID';";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
          $email=$row['Email'];
          $subject="Consult with doctor";
          $msg="Hello Sir/Madam, Doctor has shared link for online meeting.Please join within 1 hour otherwise you are not able to consult.";
          include('mail.php');
          smtp_mailer($email,$subject, $msg);
      }
?>
</body>
</html>