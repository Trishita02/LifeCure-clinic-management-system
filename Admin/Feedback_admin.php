<!DOCTYPE html>
<html lang="en">
<head>
 <?php include './config/site_css_links.php';?>
 <link rel="stylesheet" href="Table.css">
 <link rel="icon" href="logo.png">
 <title>Feedback</title>
</head>
<body>
<div class="wrapper">
<?php 
include './config/header.php';
include './config/sidebar.php';
?>  
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div>
    </section>
    <div>
    <table id="table"  style="margin:auto; margin-top:8vh;">
        <tr>
            <th>Name</th>
            <th>Feedback</th>
            <th>Rating</th>
        </tr>
        <?php
        error_reporting(0);
        $servername='localhost';
        $username='root';
        $password='';
        $database='clinic record';
        $conn=mysqli_connect($servername,$username,$password,$database);
        $sql="SELECT * FROM `user` ORDER by DateTime DESC";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){    
          if($row['Feedback']!='' and  $row['Rating']!='') {
        ?>
        <tr>
            <td>
                <?php
                echo $row['First_Name']." ".$row['Last_Name']; 
                ?>
            </td>   
            <td>
                <?php
                echo $row['Feedback']; 
                ?>
            </td>   
            <td>
                <?php
                echo $row['Rating']; 
                ?>
            </td> 
        </tr>
        <?php
        }
      }
        ?>
    </table>
    </div>
<?php include './config/site_js_links.php'; ?>

</body>
</html>