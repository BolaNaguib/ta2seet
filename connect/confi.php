<?php

$server_name = "localhost";
$user_name = "bolanagu_ta2seet";
$pass = "123qwe!@#QWE";
$db_name = "bolanagu_ta2seet";

$mu2 = @mysqli_connect($server_name,$user_name,$pass,$db_name);

mysqli_set_charset($mu2,'utf8');
?>
