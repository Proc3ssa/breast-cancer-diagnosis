<?php
include './connection.php';
$id = $_GET['id'];
$type = $_GET['type'];

mysqli_query($connection, "DELETE from notification WHERE id = $id");

if($type == 'scan'){
    echo '<script>window.location.href="patient/dashboard.php#'.$id.'";</script>';
}
elseif($type == 'appointment'){
    echo '<script>window.location.href="patient/appointments.php";</script>';
}

?>