<?php
function notification($user,$message,$date){
    
    echo $date;
    include 'connection.php';

    mysqli_query($connection, "INSERT INTO notification VALUES('$user','$message','$date')");
}

