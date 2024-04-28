<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin/Table.css">
    <link rel="icon" href="logo.png">
    <title>Get your Prescription</title>
</head>
<body>
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Download your Prescriptions</h1>
          </div>
        </div>
      </div>
    </section>
    <div>
    <table id="table" >
        <tr>
            <th>Sno.</th>
            <th>User ID</th>
            <th>Name</th>
			<th>Phone no.</th>
            <th>Date of Appointment <br> (yyyy/mm/dd)</th>
            <th>Prescription</th>
        </tr>
        <?php
	session_start();
    $servername='localhost';
    $username='root';
    $password='';
    $database='clinic record';
	$userid=$_SESSION['userid'];
    $conn=mysqli_connect($servername,$username,$password,$database);
    $sql="SELECT `UserID`, `Name`, `phoneno`,`DOA`,`Prescription` FROM `payment` WHERE `UserID`='$userid' and `Prescription`!='';";
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
              echo $row['Name']; 
              ?>
          </td>   
          <td>
              <?php
              echo $row['phoneno']; 
              ?>
          </td>   
          <td>
              <?php
              echo $row['DOA']; 
              ?>
          </td> 
		    <td>
                <?php $prescription=$row['Prescription'];?>
			  <a href="Admin/Prescription/<?php echo $prescription; ?>">
              <button>Download</button></a>
          </td> 
      </tr>
      <?php
      $i++;
      }
      ?>
  </table>
  </div>
  <style>
	body{
		margin:0;
		padding:0;
		font-family: Arial;
	}
	table,th,td{
		width:7vw;
		margin:auto;
		padding: 4vh;
		text-align: center;
		border: 0.4vh solid black;
		border-collapse: collapse;
	}
  h1{
    text-align: center;
    color:Blue;
  }
  </style>
</body>
</html>
