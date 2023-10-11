<?php
function notification($user, $message, $date){
include "connection.php";

mysqli_query($connection, "INSERT INTO notification VALUES('$user','$message', '$date')");

}