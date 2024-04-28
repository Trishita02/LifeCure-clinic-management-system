<?php
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: UserRegister.html");
        exit;
    }
    $servername='localhost';
    $username='root';
    $password='';
    $database='clinic record';
    $conn=mysqli_connect($servername,$username,$password,$database);
    $feed=$_POST['feedback'];
    $id=$_SESSION['userid'];
    $sql=" UPDATE `user` SET `Feedback`='$feed' WHERE UserID='$id' ";
    $result=mysqli_query($conn,$sql);
    if($result){   
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Feedback</title>
            <link rel="icon" href="logo.png">
            <link rel="stylesheet" href="Menu.css">
            <link rel="stylesheet" href="Feedback.css">
        </head>
        <body>
            <header>
                <navbar id="nav">
                    <div id="logo">
                        <img src="logo.PNG">
                    </div>
                    <div id="name">
                        LIFEcure Homeopathic 
                    </div>
                </navbar>
            </header>
            <div id="back">
            <div id="head"><h1>Leave your Feedback :)</h1></div>
            <div class="outer">
                <p> We hope that you have enjoyed using our service. We would greatly appreciate your feedback as it will help us improve
                and provide better experiences in the future. Could you please take a few moments to share with us what you liked or did\'nt 
                like about our service? We are open to any suggestions or recommendations you may have. </p>
                <form class="btn1" action="feedback.php" method="post">
                <textarea placeholder="Write your feedback here....." rows=18 cols=95 name="feedback" required style="resize: none; margin-left: -10vw; margin-top: 6vh;"></textarea>
                <button class="btn" type="submit">Submit</button>
                </form>
            </div>
            <form action="Rate.php" method="post">
            <div class="popup-container">
            
                <div class="popup">
            
                    <h3>How do you like our services</h3>
                    
                    <input type="radio" name="buttons" id="btn1" value="Disappointing">
                    <input type="radio" name="buttons" id="btn2"  value="Bad">
                    <input type="radio" name="buttons" id="btn3"  value="Good">
                    <input type="radio" name="buttons" id="btn4"  value="Excellent">
                    <input type="radio" name="buttons" id="btn5"  value="Loved it">
            
                    <div class="icons">
                        <label for="btn1">🙁</label>
                        <label for="btn2">😐</label>
                        <label for="btn3">😊</label>
                        <label for="btn4">😀</label>
                        <label for="btn5">😍</label>
                    </div>
            
                    <input type="submit" value="submit" class="btn">
            
                </div>
            </div>
        </form>
            <script>
             let toggle = document.querySelector(\'.popup-container\')
             toggle.classList.toggle(\'toggle\');
            </script>
        </body>
        </html>';
    }
?>