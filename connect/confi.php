<?php

$server_name = "localhost";
$user_name = "root";
$pass = "root";
$db_name = "scotchbox";

$mu2 = @mysqli_connect($server_name,$user_name,$pass,$db_name);

mysqli_set_charset($mu2,'utf8');
?>
