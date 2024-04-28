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
 <title>Monthly Revenue</title>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    <?php include './config/header.php';
include './config/sidebar.php';?>  
    <div class="content-wrapper">
      <hr>
      <section class="content" >
        <div class="card card-outline card-primary rounded-0 shadow" style="height:25vh; padding:2vh;">
          <div class="card-header">
            <h3 class="card-title"><strong>Select Date</strong></h3>
          </div>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
          <div class="card-body" style="float:left;">
          <span style="margin-left:2vw;">
            <select name="year" required>
            <option selected hidden value="">Year</option>
                <option value="2023">2023</option>
            </select>
            </span>
            <span style="margin-left:2vw;">
            <select name="month" required>
            <option selected hidden value="">Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            </span>
            <input type="submit" name="submit"
            class="btn btn-primary btn-sm btn-flat btn-block" style="width:7vw;margin-top:5vh;">
</div>           
</div>
</form>
<?php include './config/site_js_links.php';
?>
<?php
if(array_key_exists('submit',$_POST)){
$month=$_POST['month'];
$year=$_POST['year'];
$servername='localhost';
$username='root';
$password='';
$database='clinic record';
$conn=mysqli_connect($servername,$username,$password,$database);
$sql="SELECT * FROM `payment` WHERE Payment_status='complete' and MONTH(DOA)='$month' and YEAR(DOA)='$year';";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
echo '<div class="small-box bg-blue" style="width:19vw;height:10vh;padding:1.5vw;"><strong><span>Total Revenue Earned-&#8377</span>';
echo $count*150;
echo '</strong></div>';
echo'<table class="table table-striped table-bordered">
<thead class="bg-primary">
  <tr>
    <th>S.No</th>
    <th>Patient\'s ID</th>
    <th>Name</th>
    <th>Phone no</th>
  </tr>
</thead>';
$i=1;
while($row=mysqli_fetch_assoc($result)){ 
echo '<tr>
<td>';
    echo $i;
echo '</td>
<td>';
    echo $row['UserID'];
echo '</td>
<td>';
   echo $row['Name'];
echo '</td>
<td>';
    echo $row['Phoneno'];
    $i=$i+1;
echo '</td></tr>';
}
echo '<table>';
}
?>
<?php include './config/site_js_links.php';
?>
</body>
</html>