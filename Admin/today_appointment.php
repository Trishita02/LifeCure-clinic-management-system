
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './config/site_css_links.php';?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Table.css">
    <link rel="icon" href="logo.png">
    <title>Today's Appointment</title>
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
            <h1 style="margin-top:7vh">Dashboard</h1>
          </div>
        </div>
      </div>
    </section>
    <div>
    <table id="table" style="margin:auto;">
        <tr>
            <th>Sno.</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone no</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mode of Appointment</th>
            <th>Share link</th>
        </tr>
        <?php
    $servername='localhost';
    $username='root';
    $password='';
    $database='clinic record';
    $conn=mysqli_connect($servername,$username,$password,$database);

    $date = date('Y-m-d');
    $year =  date('Y'); 
    $month =  date('m');
    $sql="SELECT p.UserID,u.First_Name,u.Last_Name,u.Gender,u.Phoneno,u.Email,u.Address1,u.Address2,p.Mode 
    FROM `payment` p join `user` u on p.UserID=u.UserID where p.Payment_status='complete' and p.DOA=CURDATE() and p.Mode='online';";
    $result=mysqli_query($conn,$sql);
    $i=1;
    while($row=mysqli_fetch_assoc($result)){ 
      ?>
      <tr>
            <td>
              <?php
              echo $i;
              ?>
          </td> 
            <td>
              <?php
              echo $row['UserID'];
              ?>
          </td>  
          <td>
              <?php
              echo $row['First_Name']." ".$row['Last_Name']; 
              ?>
          </td>   
          <td>
              <?php
              echo $row['Gender']; 
              ?>
          </td>   
          <td>
              <?php
              echo $row['Phoneno']; 
              ?>
          </td> 
          <td>
              <?php
              echo $row['Email']; 
              ?>
          </td> 
          <td>
              <?php
               echo $row['Address1']." ".$row['Address2']; 
              ?>
          </td> 
          <td>
              <?php
              echo $row['Mode']; 
              ?>
          </td> 
          <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <a href="Share.php?ID=<?php echo $row['UserID']?>"> 
              <input type="button" value="Share">
            </a> 
            </form>
          </td> 
      </tr>
      <?php
      $i++;
      }
      ?>
  </table>
  </div>
  <?php include './config/site_js_links.php'; ?>
  