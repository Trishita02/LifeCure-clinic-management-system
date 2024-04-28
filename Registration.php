<?php
  
    $servername='localhost';
    $username='root';
    $password='';
    $database='clinic record';

    static $id="LF";
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['select'];
    $dob=$_POST['birth'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $address3=$_POST['address3'];
    $userid=$id.$phone;
    $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%&*";
    $password1=substr(str_shuffle($chars),0,8);
    $hash=password_hash($password1,PASSWORD_DEFAULT);
    $conn=mysqli_connect($servername,$username,$password,$database);

    $flag=false;
    $sql1="Select * from user";
    $result1=mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_assoc($result1))
    {
      if($userid==$row['UserID']){
        $flag=true;
        header('location:Registrationform(fail).html');
        break;
      }
    }
    if($flag!=true){
      $sql="INSERT INTO `user` (`UserID`, `First_Name`, `Last_Name`, `Gender`, `DOB`, `Phoneno`, `Email`, `Address1`, `Address2`, `Address3`, `Feedback`,`Rating`,`Password`, `DateTime`, `Date`,`Image`,`Link`) VALUES 
       ('$userid', '$firstname', '$lastname', '$gender', '$dob', '$phone', '$email', '$address1', '$address2', ' $address3', '','', '$hash', now(),CURDATE(),'photo/no profile.jpg','');";
        $result=mysqli_query($conn,$sql);
        include('mail.php');
      $subject="Registration Successful";
      $msg="Hello Sir/Madam, Your registration on our site LIFEcure homeopathy is successful.\nYour Userid is $userid \n Your Password is $password1 <br><br>
      Note:Login and change your password in the edit profile section";
      smtp_mailer($email,$subject, $msg);
    }
?>