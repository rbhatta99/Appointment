<?php 
session_start();
ob_start();
$servername= "localhost";
$dbusername= "root";
$dbpassword= "root";
$dbname= "healthcare";
$conn=mysqli_connect($servername,$dbusername,$dbpassword,$dbname) or die(mysql_error());
// mysql_select_db($dbname);



?>