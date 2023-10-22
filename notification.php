<?php
function notification($id, $type, $user, $message, $date){
include "connection.php";

mysqli_query($connection, "INSERT INTO notification VALUES($id, '$type', '$user','$message', '$date')");

}