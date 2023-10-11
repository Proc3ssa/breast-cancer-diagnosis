<?php
include "../connection.php";
$id = $_GET['id'];
$date = $_GET['date'];
$time = $_GET['time'];

if(mysqli_query($connection, "UPDATE appointments SET date = '$date' time = 'time' WHERE appointmentid='$id'")){

    echo '
    <script>alert("Appointment successfully rescheduled")</script>
    ';
}
else{
    echo '
    <script>alert("error:something went wrong try again after some time")</script>
    ';
}

header("refresh:1;url=appointments.php");