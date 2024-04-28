<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <link rel="stylesheet" href="Menu.css">
    <link rel="stylesheet" href="appointment.css">
    <link rel="icon" href="logo.png">
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
    </script>
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
    <div id="appointment">
        <form action="Gateway.php" method="post" autocomplete="off">
            <h2>Appointment Form</h2>
            <div>
                <input id="select1" type="radio" name="select"  checked onclick="func(0)" value="Offline"> Offline
                <input id="select2" type="radio" name="select" onclick="func(1)" value="Online">Online<br>
            </div>
            <div>
                <label id="phone">Phone no. :</label>  <input type="text" id="field1" maxlength="10"
                placeholder="Enter Phone no." required name="phoneno">
            </div>
            <div>
                <label id="branch">Branch : </label><select id="field2"  name="branch"> 
                <option selected hidden value="">Select branch</option>
                <option value="Kanpur">Kanpur</option>
                <option value="Fatehpur">Fatehpur</option>
                </select>
            </div>
            <div>
                <label id="date">Date of Appointment :</label><input type="text" id="Adate" placeholder="Select date" required name="DOA">
            </div>
            <div>
                <label id="time" >Time slot: </label><select id="field3" name="slot">
                <option selected hidden value="">Select time</option>
                <option value="10 A.M - 2 P.M">10 A.M - 2 P.M</option>
                <option value="4:30 P.M - 9 P.M">4:30 P.M - 9 P.M</option>
                </select>
            </div>
            <div>
                <input id="sub" type="submit" id="field4" value="Pay to Book appointment">
                <input type="Reset" id="reset">
            </div>
        </form>
        <script src="Registrationform.js"></script>
    </div>
</body>
<script>
    $(document).ready(function() {
    $(function() {
        $("#Adate").datepicker({
            dateFormat: 'yy-mm-dd',
            beforeShowDay: my_check
        });
    });

    function my_check(in_date) {
        if (in_date.getDay() == 0 ) {
            return [false, "notav", 'Not Available'];
        } else {
            return [true, "av", "available"];
        }
    }
})
    function func(x){
        if(x==0){
            document.getElementById('phone').style.display='inline';
            document.getElementById('field1').style.display='inline';
            document.getElementById('date').style.display='inline';
            document.getElementById('Adate').style.display='inline';
            document.getElementById('branch').style.display='inline';
            document.getElementById('field2').style.display='inline';
            document.getElementById('time').style.display='inline';
            document.getElementById('field3').style.display='inline';
        }
        else{
            document.getElementById('Adate').style.display='inline';
            document.getElementById('branch').style.display='none';
            document.getElementById('field2').style.display='none';
            document.getElementById('time').style.display='none';
            document.getElementById('field3').style.display='none';
            x=0;
        }
    }
    
</script>

</html>