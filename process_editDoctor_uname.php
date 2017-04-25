 <?php require "dbconnect.php";?>
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
	
	//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user'); 
	
	// $conn=mysqli_connect("localhost","root","root")or die("can not connect");
	// mysqli_select_db("healthcare",$conn) or die("can not select database");
	
	
	$username=$_SESSION["username"];
	$newuname=$_POST["newusername"];
	$olduname=$_POST["oldusername"];
	$i=0;
	
	$checkUname = "select doctor_username from doctor where doctor_username='$newuname'";
		$resultCheck = mysqli_query($checkUname,$conn);
		
	while($myrow = mysqli_fetch_assoc($resultCheck)) {
			$i=$i+1;
	}
	
	if($newuname==$olduname) $i=0;
	
	if ($i>0){
		print '<script type="text/javascript">';
				echo "Username already exists!";
	}
	else{
		$query = "update doctor set doctor_username='$newuname' where doctor_username='$olduname'"; 
		$result = mysqli_query($query,$conn); 
				if (!$result) { 
					echo "Problem with query " . $query . "<br/>"; 
				//	echo pg_last_error(); 
					exit(); 
				} 
				else{
					$_SESSION["username"]=$newuname;
					echo "Username successfully edited." ;
				}
	}
	mysqli_close($conn);
?>
</div>
</div>
</div>
</body>
</html>