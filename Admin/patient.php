<?php
include './common_service/common_functions.php';
include './config/site_js_links.php';
error_reporting(0);
if(isset($_POST)){
$servername='localhost';
$username='root';
$password='';
$database='clinic record';

static $id="LF";
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$gender=$_POST['gender'];
$dob=$_POST['birth'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$address3=$_POST['address3'];
$userid=$id.$phone;
$conn=mysqli_connect($servername,$username,$password,$database);

$sql1="Select * from user";
$result1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_assoc($result1))
{
  if($userid==$row['UserID'] && $userid!="LF"){
    $flag=true;
    echo ' <div class="alert alert-danger" style="margin-top:7vh; width:85vw; margin-left:16vw;">
    <strong>This phone no. is already registered!! Try with another phone no.</strong>
  </div>';
  break;
  }
}
  if($flag!=true){
    if($userid!="LF"){
    $sql="INSERT INTO `user` (`UserID`, `First_Name`, `Last_Name`, `Gender`, `DOB`, `Phoneno`, `Email`, `Address1`, `Address2`, `Address3`, `Feedback`,`Rating`,`Password`, `DateTime`,`Date`, `Image`,`Link`) VALUES 
    ('$userid', '$firstname', '$lastname', '$gender', '$dob', '$phone', '$email', '$address1', '$address2', ' $address3', '','', '', now(),CURDATE(),'','');";
    $result=mysqli_query($conn,$sql);
    echo ' <div class="alert alert-success" style="margin-top:7vh; width:85vw; margin-left:16vw;">
    <strong>Registration successful!!</strong>
  </div>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include './config/site_css_links.php';?>

 <?php include './config/data_tables_css.php';?>

  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="icon" href="logo.png">
  <title>Add Patients</title>

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
    <section>
          <div class="col-sm-6">
            <h2>Patients</h2>
          </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
          <h3 class="card-title">Add Patients</h3>
          
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
          <form method="post">
            <div class="row">
              <div class="col-lg-5 col-md-4 col-sm-4 col-xs-10">
              <label>First Name</label>
              <input type="text" id="first_name" name="firstname" required="required">
              </div>
              <br>
              <br>
              <br>
              <div class="col-lg-5 col-md-4 col-sm-4 col-xs-10">
              <label>Last Name</label>
              <input type="text" id="patient_name" name="lastname" required="required">
              </div>
              <div class="col-lg-5 col-md-4 col-sm-4 col-xs-10">
              <label>Gender</label>
                <select id="gender" name="gender">
                <option selected hidden>Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
                </select>
                
              </div>
              <div class="col-lg-5 col-md-4 col-sm-4 col-xs-10">
                <div class="form-group">
                  <label>Date of Birth</label>
                    <div class="input-group date" 
                    id="date_of_birth" >
                       <input type="date" name="birth">
                    </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-4 col-sm-4 col-xs-10">
                <label>Phone Number</label>
                <input type="text" id="phone_number" name="phone" maxlength=10 required="required">
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-10">
                <label>Email</label>
                <input type="email" id="cnic" name="email" required="required">
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10" style="margin-top:6vh;">
                <label>House no./Flat no.</label> 
                <input type="text" id="address" name="address1" required="required">
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10" style="margin-top:6vh;">
                <label>Area/Loacality/Landmark</label>
                <input type="text" id="address" name="address2" required="required">
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-10" style="margin-top:6vh;">
                <label>PIN code</label> 
                <input type="text" id="address" name="address3" required="required">
              </div>
             
              </div>
              <div class="clearfix">&nbsp;</div>

              <div class="row">
                <div class="col-lg-11 col-md-10 col-sm-10 xs-hidden">&nbsp;</div>

              <div class="col-lg-1 col-md-2 col-sm-2 col-xs-12">
                <button type="submit" id="save_Patient" 
                name="save_Patient" class="btn btn-primary btn-sm btn-flat btn-block">Save</button>
              </div>
            </div>
          </form>
        </div>
        
      </div>
      
    </section>

     <br/>
     <br/>
     <br/>

 
  </div>
</body>
</html>