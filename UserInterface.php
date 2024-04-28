<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: UserRegister.html");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - <?php echo $_SESSION['userid']?></title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="Menu.css">
    <link rel="stylesheet" href="UserInterface.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <navbar id="nav">
            <div id="logo">
                <img src="logo.PNG">
            </div>
            <div id="name">
                Welcome to LIFEcure Homeopathic  
            </div>
        </navbar>
    </header>
    <?php
    $id=$_SESSION['userid'];
    $servername='localhost';
    $username='root';
    $password='';
    $database='clinic record';
    $conn=mysqli_connect($servername,$username,$password,$database);
    $sql="SELECT * FROM `user` where UserID='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if($row['Link']==''){
        $link="#";
    }
    else{
    $link=$row['Link'];
    }
    $folder=$row['Image'];
    ?>
    <div id="top">
        <div id="details">
        <div class="subhead"><strong> UserID: </strong><span><?php echo $_SESSION['userid']; ?> </span><br><br></div>
        <div class="subhead"><strong> Name:  </strong><span><?php echo  $_SESSION['firstname'].'  '.$_SESSION['lasttname']; ?></span><br><br></div>
        <div class="subhead"><strong> Phone no. : </strong><span><?php echo $_SESSION['Phoneno']; ?></span><br><br></div>
        <div class="subhead"><strong> Email:  </strong><span><?php echo $_SESSION['Email']; ?></span><br><br></div>
        </div>
        <span class="upload">
        <?php
    	    echo '<img src="';
		    echo $folder;
		    echo '" height="130vh" width="120vw">';
        ?> 
        <form action="" method="post"  enctype="multipart/form-data">
            <div class="round">
                <input type="file" name="uploadfile" required>
                <i class="fa fa-camera blue-color"></i>
            </div>
            <input type="submit" name="submit" value="Upload" style=" width:3.5vw; margin-left:2vw;margin-top:2vh;" id="upload">
            </form>
        </span>
    </form>
    </div>
    <?php
    if(array_key_exists("submit",$_POST)){
        error_reporting(0);
        session_start();
        $servername='localhost';
        $username='root';
        $password='';
        $database='clinic record';
        $conn=mysqli_connect($servername,$username,$password,$database);
        $id=$_SESSION['userid'];
        $filename=$_FILES["uploadfile"]["name"];

        $tempname=$_FILES["uploadfile"]["tmp_name"];
        $folder="photo/".$filename;
        move_uploaded_file($tempname,$folder);
        $sql=" UPDATE `user` SET `Image`='$folder' WHERE UserID='$id' ";
        $result=mysqli_query($conn,$sql);
    }
    ?>
    <?php
    function func(){ 
        
    }
    ?>
    <div id="bottom">
        <a href="Appointment.php" > <div id="booking"><span>Book an Appointment</span></div></a>
        <a href="Prescription.php"> <div id="prescription"><span>Get your Prescription</span></div></a> 
        <a href="<?php echo $link ?>"> <div id="consult"><span>Video Call</span></div></a> 
        <a href="update.html"> <div id="edit"><span>Edit Profile</span></div></a> 
        <a href="Appointment_letter.php"><div id="download"><span> Download Appointment Letter</span></div></a>
        <a href="Appointment_record.php"> <div id="record"><span>Appointment Record</span></div></a>
        <a href="Feedback.html"> <div id="feedback"><span>Feedback</span></div></a>
        <a href="Logout.php"> <div id="logout"><span>Logout</span></div></a>    
    </div>
</body>
</html>
