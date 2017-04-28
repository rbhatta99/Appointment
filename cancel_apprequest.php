<?php
	require "dbconnect.php";
	// include('notification.php');
	//session_start();
	if ($_SESSION['login']==0) header('Location: login_page.php');
	

	$cancel = $_POST['cancelid'];
	$username = $_SESSION['username'];
	
	/*Get status of appointment to be cancelled*/
	$appstatus_query = mysqli_query($conn,"SELECT app_status FROM appointment WHERE app_number='$cancel'");
	$appstatus_array = mysqli_fetch_array($appstatus_query);
	
	/*Get the user who will be receiving the cancel notification
	  Assume for now that the sender will be the patient*/
	$receiver_query = mysqli_query($conn,"SELECT app_doctorusername FROM appointment WHERE app_number='$cancel'");
	$receiver_array = mysqli_fetch_array($receiver_query);
	

	
	$delete_query = "DELETE FROM appointment WHERE app_number='$cancel'"; 
	$delete_result = mysqli_query($conn,$delete_query);

	mysqli_close($conn);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>