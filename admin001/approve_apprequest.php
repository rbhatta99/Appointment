<?php
	include('notification.php');
	session_start();
	if ($_SESSION['login']==0) header('Location: login_page.php');
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
	
	$conn=mysqli_connect("localhost","root","root")or die("can not connect");
	mysqli_select_db("healthcare",$conn) or die("can not select database");
	
	$approve = $_POST['approveid'];
	$username = $_SESSION['username'];
	
	$receiver_query = mysqli_query("SELECT app_patientusername FROM appointment WHERE app_number='$approve'",$conn);
	$receiver_array = mysqli_fetch_array($receiver_query);
	
	mysqli_close($conn);
	send_notification($username, $receiver_array[0], 3);
	
	//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
	
	$conn=mysqli_connect("localhost","root","root")or die("can not connect");
	mysqli_select_db("healthcare",$conn) or die("can not select database");
	
	$query = "UPDATE appointment SET app_status='Approved' WHERE app_number='$approve'";
	$result = mysqli_query($query,$conn);	
	mysqli_close($conn); 
?>