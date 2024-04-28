<?php 
include './config/connection.php';
include './common_service/common_functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include './config/site_css_links.php' ?>

 <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
 <link rel="icon" href="logo.png">
 <title>Add Prescription</title>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->

    <?php include './config/header.php';
include './config/sidebar.php';?>  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Add Prescription</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content" >

        <!-- Default box -->
        <div class="card card-outline card-primary rounded-0 shadow" style="height:40vh; padding:2vh;">
          <div class="card-header">
            <h3 class="card-title">Add New Prescription</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-5 col-md-4 col-sm-4 col-xs-10">
              <label>Select Patient</label>
              <div class="search">
                      <input type="text" placeholder="Search..." name="patient"><br><br>
                      <input type="file" accept="application/pdf" name="file">
                      <div class="clearfix">&nbsp;</div>
                      <div class="col-md-4">
                      <input type="submit" name="submit"
                      class="btn btn-primary btn-sm btn-flat btn-block">
                      </div>
              </div>
              </div>
              <div class="row">
              <div>
              <label>Select Date of Appointment</label>
              <div class="search">
                      <input type="date" name="DOA">
                      </div>
              </div>
              </div>
              <br>
              <br>
              <br>
            </div>
           
</div>
<div>
</form>
<div style="margin-top:10vh;">
    <table class="table table-striped table-bordered">
      <thead class="bg-primary">
        <tr>
          <th>S.No</th>
          <th>Patient's ID</th>
          <th>Name</th>
          <th>Phone no</th>
          <th>Date of Appointment</th>
        </tr>
      </thead>
<?php
  $servername='localhost';
  $username='root';
  $password='';
  $database='clinic record';
  $conn=mysqli_connect($servername,$username,$password,$database);
if(array_key_exists('submit',$_POST)){
  $patient=$_POST['patient'];
  $DOA=$_POST['DOA'];
  $file_name=$_FILES['file']['name'];
  $file_tmp_name=$_FILES['file']['tmp_name'];
  if(move_uploaded_file($file_tmp_name,"Prescription/" . $file_name)){
    $sql1="SELECT * FROM payment;";
    $result1=mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_assoc($result1)){ 
      if($row['DOA']==$DOA){
      $flag=true;
      break;
      }
      else
      $flag=false;
    }
    $id=$row['UserID'];
    if($flag){
    $sql=" UPDATE `payment` SET `Prescription`='$file_name' WHERE `UserID`='$patient' and `DOA`='$DOA' ";
    $result=mysqli_query($conn,$sql);
    }
    else{
      echo "<script>alert('Invalid details')</script>";
    }
  }
  else{
    echo "<script>alert('Upload the prescription')</script>";
  }
}
  $sql="SELECT * FROM `payment` WHERE Payment_status='complete' and Prescription='';";
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
      echo $row['Phoneno'];
    ?>
  </td>
  <td>
    <?php
      echo $row['DOA'];
    ?>
  </td>
</tr>  
<?php
    $i=$i+1;
    }
?>
</section>
    </table>
  </div>


<?php include './config/site_js_links.php';
?>
</body>
</html>