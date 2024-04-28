<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './config/site_css_links.php';?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Table.css">
    <link rel="icon" href="logo.png">
    <title>Reply</title>
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
            <h1 style="margin-top:7vh">Reply</h1>
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
           <textarea style="margin-top:8vh; margin-left:10vw; height:53vh;width:60vw; resize:none;" name="reply" required></textarea>
            <a> 
            <input type="submit"  class="btn btn-primary btn-sm btn-flat btn-block" style="margin-top:4vh; margin-left:37vw; height:5vh;width:6vw;" value="Send" name="Send"></a>
        </form>
<?php include './config/site_js_links.php'; ?>
<?php
   error_reporting(0);
    function func(){
        $query=$_GET['Query'];
        if($query!=''){
        $reply=$_POST['reply'];
        $servername='localhost';
        $username='root';
        $password='';
        $database='clinic record';
        $conn=mysqli_connect($servername,$username,$password,$database);
        }
      }
      if(array_key_exists("Send",$_POST)){
          $query=$_GET['Query'];
          $reply=$_POST['reply'];
          $subject="Reply from LIFEcure Homeopathy";
          $msg="Hello Sir/Madam,<br>
          Following is the answer to your query - <b>$query<b> <br><br> $reply";
          $sql="SELECT * FROM `querybox` where Query='$query'";
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
          $email=$row['Email'];
          include('mail.php');
          smtp_mailer($email,$subject, $msg);
          $sql="DELETE FROM `querybox` WHERE Query='$query'"; 
          $result=mysqli_query($conn,$sql);
      }
?>
</body>
</html>