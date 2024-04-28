<?php 
include 'Connection.php';

  $date = date('Y-m-d');

  $year =  date('Y'); 
  $month =  date('m');

  $queryToday = "SELECT count(*) as `today` 
  from `payment` 
  where `Payment_status`='complete' and `Date` = CURRENT_DATE();";

  $queryWeek = "SELECT count(*) as `week` 
  from `payment` 
  where `Payment_status`='complete' and YEARWEEK(`Date`) = YEARWEEK('$date');";

$queryYear = "SELECT count(*) as `year` 
  from `payment` 
  where `Payment_status`='complete' and YEAR(`Date`) = YEAR('$date');";

$queryMonth = "SELECT count(*) as `month` 
  from `payment` 
  where `Payment_status`='complete' and MONTH(`Date`) = $month;";

  $todaysCount = 0;
  $currentWeekCount = 0;
  $currentMonthCount = 0;
  $currentYearCount = 0;


  try {

    $stmtToday = $con->prepare($queryToday);
    $stmtToday->execute();
    $r = $stmtToday->fetch(PDO::FETCH_ASSOC);
    $todaysCount = $r['today'];

    $stmtWeek = $con->prepare($queryWeek);
    $stmtWeek->execute();
    $r = $stmtWeek->fetch(PDO::FETCH_ASSOC);
    $currentWeekCount = $r['week'];

    $stmtYear = $con->prepare($queryYear);
    $stmtYear->execute();
    $r = $stmtYear->fetch(PDO::FETCH_ASSOC);
    $currentYearCount = $r['year'];

    $stmtMonth = $con->prepare($queryMonth);
    $stmtMonth->execute();
    $r = $stmtMonth->fetch(PDO::FETCH_ASSOC);
    $currentMonthCount = $r['month'];

  } catch(PDOException $ex) {
     echo $ex->getMessage();
   echo $ex->getTraceAsString();
   exit;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include './config/site_css_links.php';?>
 <title>Admin Dashboard</title>
</head>
<link rel="icon" href="logo.png">
<body>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->

<?php 

include 'config/header.php';
include 'config/sidebar.php';
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <span class="lead font-weight-bold" style="margin-left:2vw;">Total Patients visited</span>
    <section class="content" style="margin-top:3vh;">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="Today_Patient.php"><div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $todaysCount;?></h3>
                <p>Today's Patients</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar-day"></i>
              </div>
            </div></a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="Week_Patients.php"><div class="small-box bg-purple">
              <div class="inner">
                <h3><?php echo $currentWeekCount;?></h3>

                <p>Current Week</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar-week"></i>
              </div>
             
            </div></a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="Month_Patients.php"><div class="small-box bg-fuchsia text-reset">
              <div class="inner">
                <h3><?php echo $currentMonthCount;?></h3>

                <p>Current Month</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar"></i>
              </div>
             
            </div></a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="Year_Patients.php"><div class="small-box bg-maroon text-reset">
              <div class="inner">
                <h3><?php echo $currentYearCount;?></h3>

                <p>Current Year</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-injured"></i>
              </div>
              
            </div></a>
          </div>
        </div>
      </div>
    </section>

  
    <hr style="border:0.1vw solid black; margin-top:11vh;">
    <span class="lead font-weight-bold" style="margin-left:2vw;">View Revenue Report</span>
     <section class="content" style="margin-top:5vh;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <a href="day_revenue.php"><p style="color:black;">Daily Revenue</p></a>
                </div>             
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-orange">
              <div class="inner">
              <a href="month_revenue.php"><p style="color:black;">Monthly Revenue</p></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <a href="year_revenue.php"><p style="color:black;">Yearly Revenue</p></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  

<?php include './config/site_js_links.php';?>
<script>
  $(function(){
    showMenuSelected("#mnu_dashboard", "");
  })
</script>

</body>
</html>