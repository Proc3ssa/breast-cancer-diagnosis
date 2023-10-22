<?php
$connection = new mysqli("localhost","root","root", "cancer");
if ($connection->connect_error) { die('Connect Error: ' . $connection->connect_error); }
?>>