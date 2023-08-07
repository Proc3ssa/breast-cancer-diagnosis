<?php
if(isset($_GET['appointmentid'])){
    include "../connection.php";
    $appointmentid = $_GET['appointmentid'];

    $DELETE = "DELETE FROM appointments where appointmentid = '$appointmentid'";
  
    if(mysqli_query($connection, $DELETE)){
        echo '<script>alert("Appointment deleteted")</script>';

        header("refresh:1;url=appointments.php");
        
    }
}
else{
    header("location:appointment.php");
}
?>