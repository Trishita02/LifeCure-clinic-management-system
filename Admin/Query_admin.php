<!DOCTYPE html>
<html lang="en">
<head>
     <?php include './config/site_css_links.php';?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Table.css">
    <link rel="icon" href="logo.png">
    <title>Query</title>
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
          </div>
        </div>
      </div>
    </section>
    <table id="table" style="margin:auto; margin-top:10vh;">
        <tr>
            <th>Email</th>
            <th>Query</th>
            <th>Reply</th>
        </tr>
        <?php
        error_reporting(0);
        $servername='localhost';
        $username='root';
        $password='';
        $database='clinic record';
        $conn=mysqli_connect($servername,$username,$password,$database);
        $sql="SELECT * FROM `querybox`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){    
          if($row['Email']!='' and  $row['Query']!='') {
        ?>
        <tr>
            <td>
                <?php
                echo $row['Email'];
                ?>
            </td>   
            <td>
                <?php
                echo $row['Query']; 
                ?>
            </td>   
            <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <a href="Query_reply.php?Query=<?php echo $row['Query'];?>"> 
              <input type="button" value="Reply">
            </a> 
            </form>
            </td> 
        </tr>
        <?php
        }
      }

        ?>
    </table>
    </div>

</body>
<?php include './config/site_js_links.php'; ?>
</html>
