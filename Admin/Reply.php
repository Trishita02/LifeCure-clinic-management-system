<?php
error_reporting(0);
$reply=$_POST['Reply'];
if($reply!=''){
$sql="UPDATE `querybox` SET `Reply`='$reply'";
$result=mysqli_query($conn,$sql);
if($result){
    echo $reply;
}
}
?>