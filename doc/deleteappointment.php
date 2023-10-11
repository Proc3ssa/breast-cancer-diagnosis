<?php

include "../connection.php";
include "../notification.php";

$id = $_GET['appointmentid'];
$user = $_GET['user'];
if(mysqli_query($connection, "DELETE FROM appointments WHERE appointmentid = '$id'")){
  notification($user,$message,$date);
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

