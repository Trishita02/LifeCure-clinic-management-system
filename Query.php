<?php            
    $servername='localhost';
    $username='root';
    $password='';
    $database='clinic record';
    
    $query=$_POST['query'];
    $email=$_POST['email'];
    $conn=mysqli_connect($servername,$username,$password,$database);
    $sql="INSERT INTO `querybox` (`Email`, `Query`,`Reply`) VALUES ('$email', '$query','');";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<script>alert("Your Query is submitted. It will be soon replied through email");
        window.location.replace("Home.html");
        </script>'; 
    }
?>