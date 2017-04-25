 <?php 
require "dbconnect.php"
?>
<html>
	<head>
		<title>Healthcare System</title>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">

	</head>
	
<body>
<div id = "menu_container">
		<div id="menu_wrapper">
			<ul class = "main_menu_left">
					<li> <a class="top_menu" href = "dboardDoctor.php"> Dashboard </a> </li>
					<li> <a class="top_menu" href = "doctor_profile.php"> &nbsp;&nbsp;&nbsp;&nbsp;Profile&nbsp;&nbsp;&nbsp;&nbsp; </a> </li>
					<li> <a class="top_menu" href = "appointments_doctor.php"> Appointment </a> </li>
					
			</ul>
			
			<ul class = "main_menu_right">
				
				<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li>
			</ul>
		</div>
	</div>
	<div class="clearance"></div>
<div id = "main_wrapper">
		<div class="content_wrapper">
			<div class="content_main">
<?php
	// session_start();
	
	$username=$_SESSION["username"];
	$fname=$_POST["fName"];
	$mname=$_POST["mName"];
	$lname=$_POST["lName"];
	$email=$tuple['doctor_email'];
				$specialization=$tuple['doctor_specialization'];
				$hospital=$tuple['doctor_hospital'];
				$rstatus=$tuple['doctor_rstatus'];
				$licenseno=$tuple['doctor_licenseno'];
				$sched_wkdy=$tuple['doctor_sched_wday'];
				$sched_sat=$tuple['doctor_sched_sat'];
				$sched_sun=$tuple['doctor_sched_sun'];
				$contactno=$tuple['contactno'];
			
	//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user'); 
	
	// $conn=mysql_connect("localhost","root","root")or die("can not connect");
	// mysql_select_db("healthcare",$conn) or die("can not select database");
	
	$query = "update doctor set doctor_lname='$lname', doctor_fname='$fname', doctor_mname='$mname', doctor_specialization='$specialization', doctor_hospital='$hospital',
	doctor_rstatus='$rstatus', doctor_licenseno='$licenseno', doctor_sched_wday='$sched_wkdy', doctor_sched_sat='$sched_sat', doctor_sched_sun='$sched_sun', contactno='$contactno' where doctor_username='$username'";
				
	$result = mysqli_query($conn,$query); 
	if (!$result) { 
		echo "Problem with query " . $query . "<br/>"; 
	//	echo pg_last_error(); 
		exit(); 
	} 
	else{
		echo "Your profile information was successfully edited.";
	}
	
	mysqli_close($conn);
?>
</div>
</div>
</div>

</body>
</html>