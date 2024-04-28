<?php
    $servername='localhost';
    $username='root';
    $password='';
    $database='clinic record';
    
    $id=$_POST['id'];
    $password1=$_POST['passw'];
    $conn=mysqli_connect($servername,$username,$password,$database);
    $sql="Select * from user where UserID='$id'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password1,$row['Password'])){
            $login=true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['userid']=$id;
            $_SESSION['firstname']=$row['First_Name'];
            $_SESSION['lasttname']=$row['Last_Name'];
            $_SESSION['Phoneno']=$row['Phoneno'];
            $_SESSION['Email']=$row['Email'];
            $_SESSION['feedback']=$row['Feedback'];
            $_SESSION['Image']=$row['Image'];
            $_SESSION['Address1']=$row['Address1'];
            $_SESSION['Address2']=$row['Address2'];
            $_SESSION['Address3']=$row['Address3'];
            $_SESSION['Password']=$row['Password'];
            echo '<script type="text/javascript">window.open("UserInterface.php")</script>';
            echo '<script type="text/javascript">location.href="Home.html";</script>';
            }
            else{
                header('location:Login(fail).html');
            }
        }
    }
    else{
        header('location:Login(fail).html');
    }
?>