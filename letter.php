<?php
session_start();
$userid=$_SESSION['userid'];
$DOA=$_GET['rn'];
require('vendor/autoload.php');
$con=mysqli_connect('localhost','root','','clinic record');
$res=mysqli_query($con,"SELECT `UserID`, `Name`, `phoneno`,`DOA`, `Branch`, `Slot` FROM `payment` WHERE `UserID`='$userid' and `DOA`='$DOA';");
$row=mysqli_fetch_assoc($res);
$Name=$row['Name'];
$phoneno=$row['phoneno'];
$Branch=$row['Branch'];
$Slot=$row['Slot'];
if(mysqli_num_rows($res)>0){
	$html='<style>
	table,th,td{
		width:7vw;
		margin:auto;
		padding: 4vh;
		text-align: center;
		border: 0.4vh solid black;
		border-collapse: collapse;
	}
	#img{
		height:120vh;
		width:120vh;
	}
	h1{
		text-align: center;
		color: rgb(0, 129, 0);
		}
		h4{
		text-align: center;
		}
		#Address1{
			text-align: left;
		}
		#Address2{
			margin-top:-55vh;
			text-align: right;
		}
		</style>  
		<div>
		<h1><img src="LOGO1.jpg" id=img></h1>
        <h1>LIFEcure Homeopathy</h1>
    </div>
    <div>
        <h4>Dr.Amit Chaurasia</h4>
    </div>
    <div>
        <div id="Address1">
            LIFEcure Clinic (Kanpur)-<br>121/621, Kamla Bhawan,<br>Shashtri Nagar.
        </div>
		<div id="Address2">
			LIFEcure Clinic (Fatehpur)-<br>  AARA Machine,<br>Hathgram Road.
		</div>
    </div>
	<br>
	<hr>
	<br><br>
	<strong>ID : </strong>'.$userid.'<br>
	<strong>Name : </strong>'.$Name.'<br>
	<strong>Phone no : </strong>'.$phoneno.'<br>
	<strong>DOA : </strong>'.$DOA;
}else{
	$html="Data not found";
}
echo $html;
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='media/'.time().'.pdf';
$mpdf->output($file,'I');
?>