<?php
include "../connection.php";
include "../notification.php";

$id = $_GET['id'];
$date = $_GET['date'];
$time = $_GET['time'];
$nid = date('msi');
///fetch date and time

$SELECT = "SELECT patient from appointments WHERE appointmentid = '".$id."'";

$pquery = mysqli_query($connection, $SELECT);
$res = mysqli_fetch_assoc($pquery);
$patient = $res['patient'];
$tdate = date('Y-m-d');

if(isset($_POST['update'])){
    $time2 = $_POST['time'];
    $date2 = $_POST['date'];
$UPDATE = 'UPDATE appointments SET data = "'.$date2.'", time = "'.$time2.'" where appointmentid = "'.$id.'"';

//echo $UPDATE;

if(mysqli_query($connection, $UPDATE)){

    notification($nid, 'appointment', $patient, 'Your appointment has been rescheduled',$tdate);
    
    echo '
   <script>alert("Appointment has been rescheduled");
   window.location.href = "appointments.php";
   </script>
   ';
   

   
}
else{
    echo '
    <script>alert("Appointment could not be rescheduled, try again");
    window.location.href = "appointments.php";
    </script>
    ';
}

    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reschedule appointment</title>
    
</head>
<body>
    <form action="reschedule.php?date=<?php echo $date ?>&time=<?php echo $time ?>&id=<?php echo $id?>" method="POST">
    <h1 align="center">Reschedule appointment</h1>
    <div class="main">
    <label><b>Date</b></lable></br>
     <input type="date" name="date" value="<?php echo $date ?>"></br>
     <label><b>Time</b></lable></br>
     <input type="time" name="time" value="<?php echo $time ?>">
     <button type="submit" name="update" >Set</button>
</form>
    </div>

    <style>
        h1{
            color: #21C375;
        }
        .main{
            border:1px solid #21C375;
            border-radius: 5px;
            width:350px;
            height: :fit-content;
            margin:auto;
            padding:10px;
            
        }
        input[type='date'] , input[type='time']{
            width:90%;
            margin-top: 10px;
             margin-bottom: 10px;
             margin-left: auto;
             margin-right: auto;
        }
        button{
            width:90px;
            height: 30px;
            background-color:  #21C375;
            border: none;
            color:white;
            border-radius: 4px;

        }


    </style>
    
</body>
</html>