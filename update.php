<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: UserRegister.html");
    exit;
}
error_reporting(0);
$servername='localhost';
$username='root';
$password='';
$database='clinic record';
$conn=mysqli_connect($servername,$username,$password,$database);

$userid=$_SESSION['userid'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$address3=$_POST['address3'];
$Password1=$_POST['Password'];
$Password=password_hash($_POST['Password'],PASSWORD_DEFAULT);
if($firstname==''){
    $firstname=$_SESSION['firstname'];
}
if($lastname==''){
    $lastname=$_SESSION['lasttname'];
}
if($phone==''){
    $phone=$_SESSION['Phoneno'];
}
if($email==''){
    $email=$_SESSION['Email'];
}
if($address1==''){
    $address1=$_SESSION['Address1'];
}
if($address2==''){
    $address2=$_SESSION['Address2'];
}
if($address3==''){
    $address3=$_SESSION['Address3'];
}
if($Password==''){
    $Password=$_SESSION['Password'];
}
if(strlen($Password1)<8){
    echo '<script>alert("* Please enter Password of 8 characters * ");
    window.location="UserInterface.php"
    </script>';
}
else{
$sql="UPDATE `user` SET `First_Name`='$firstname',`Last_Name`='$lastname',`Phoneno`=' $phone',
`Email`='$email',`Address1`='$address1',`Address2`='$address2',`Address3`='$address3',`Password`='$Password' WHERE UserID='$userid'";
$result=mysqli_query($conn,$sql);
echo '<script>alert("Your details are updated successfully!! Please Re-login to get your updated profile");
window.location="UserInterface.php";
</script>'; 
}
?>