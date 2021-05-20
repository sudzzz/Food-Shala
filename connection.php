<?php 
SESSION_START();
//Get Heroku ClearDB connection information
$username = 'bd43d5a4d91ec2';
$password = 'aeb4ff93';
$database = 'heroku_bd6668f3079e644';
$hostname = 'eu-cdbr-west-01.cleardb.com';

$mysqli = new mysqli($hostname, $username, $password, $database) or die(mysqli_error($mysqli));
?>