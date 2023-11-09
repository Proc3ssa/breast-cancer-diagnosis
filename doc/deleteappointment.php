<?php

include "../connection.php";
include "../notification.php";


$id = $_GET['appointmentid'];
$query = mysqli_query($connection, "SELECT patient FROM appointments WHERE appointmentid = $id");
$noid = date('hyid');
$date = date('Y-m-d');
$fetch = mysqli_fetch_assoc($query);
$patient = $fetch['patient'];

if(mysqli_query($connection, "DELETE FROM appointments WHERE appointmentid = '$id'")){
  notification($noid, "appointment",$patient,'your appointment has been canceled',$date);
echo '
<script>alert("appointment deleted")</script>
';
}
else{
    echo '
<script>alert("error:something went wrong")</script>
';
}

header("refresh:1;url=appointments.php");

