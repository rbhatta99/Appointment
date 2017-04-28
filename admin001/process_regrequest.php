<?php
	require "dbconnect.php";

	// $conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
		
	
	if( (isset($_GET['id'])) && (isset($_GET['action'])) ){
		if($_GET['action'] == "delete"){
			$query1="update doctor set doctor_deleted='y' where doctor_username='{$_GET['id']}';";
			$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
		}
		if($_GET['action'] == "undelete"){
			$query2="update doctor set doctor_deleted='n' where doctor_username='{$_GET['id']}';";
			$result2 = mysqli_query($conn,$query2);
		}
		mysqli_close($conn);
	header('Location: manage_regrequest.php');
	}
		
	else if( (isset($_GET['id2'])) && (isset($_GET['action2'])) ){
		if($_GET['action2'] == "delete"){
			$query3="update patient set patient_deleted='y' where patient_username='{$_GET['id2']}';";
			$result3 = mysqli_query($conn,$query3);
		}
		if($_GET['action2'] == "undelete"){
			$query4="update patient set patient_deleted='n' where patient_username='{$_GET['id2']}';";
			$result4 = mysqli_query($conn,$query4);
		}
		mysqli_close($conn);
	header('Location: Adminpatient.php');
	}
	
?>