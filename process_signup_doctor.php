<?php 
require "dbconnect.php"
?>
<html>
<head>
	<title>Health Care System</title>
	
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">
	</head>
</head>
	<body>
		<div id = "menu_container">
		<div id="menu_wrapper">
			<!--<ul class = "main_menu_left">
					<li> <a class="top_menu" href = "dboardDoctor.php"> Dashboard </a> </li>
					<li> <a class="top_menu" href = "doctor_profile.php"> &nbsp;&nbsp;&nbsp;&nbsp;Profile&nbsp;&nbsp;&nbsp;&nbsp; </a> </li>
					<li> <a class="top_menu" href = "appointments_doctor.php"> Appointment </a> </li>
					<li> <a class="top_menu" href = "viewpatients.php"> &nbsp;&nbsp;Patients&nbsp;&nbsp;</a> </li>
					
			</ul>
			-->
			<ul class = "main_menu_right">
				<!--<li> 
					<form name='searchpatient' action='search_doctor.php' method='post'>
					
						Search by: 
						<select name="searchtype" id = "option">
							<option name="sickness">Sickness</option>
							<option name="name">Name</option>
							<option name="location">Location</option>
							<option name="age">Age</option>
						</select>
						<input type='text' name='searchinput' />
						</form>
					</li>-->
				
				<li> <a id="logout" class="top_menu_right" href = "logout.php"> Return to Home </a> </li>
			</ul>
		</div>
	</div>
	<div class="clearance"></div>
<div id = "main_wrapper">
		<div class="content_wrapper">
			<div class="content_main">
<?php

    // $characters='0123456789';
	// $string='';
	// for($i=0;$i<6;$i++)
	// {
	// $string .=$characters[rand(0,strlen($characters)-1)];
	// }
	// $patientid=$string;

	$doctor_username = $_POST['username'];
	$doctor_password = md5($_POST['password']);
	$doctor_email = $_POST['eadd'];
	$doctor_lname = $_POST['lName'];
	$doctor_fname = $_POST['fName'];
	$doctor_mname = $_POST['mName'];
	$doctor_special= $_POST['specialization'];
	$doctor_hospital=$_POST['hospital'];
	// $doctor_sickness = $_POST['sickness'];
	// $doctor_age = $_POST['age'];
	$doctor_contactnum = $_POST['contactNum'];
	$doctor_licenseno=$_POST['licenseno'];
	// $doctor_rstatus='approved';
	$a=0;
	$ctr=0;
	
		
	//$patient_username = str_ireplace(' ', '_', strtolower($patient_username));
	/*$patient_password = str_ireplace(' ', '_', strtolower($patient_password));
	$patient_eadd = str_ireplace(' ', '_', strtolower($patient_eadd));
	//$patient_lname =// str_ireplace(' ', '_', strtolower($patient_lname));
	//$patient_fname =// str_ireplace(' ', '_', strtolower($patient_fname));
	//$patient_mname =// str_ireplace(' ', '_', strtolower($patient_mname));
	$patient_sickness = str_ireplace(' ', '_', strtolower($patient_sickness));
	$patient_age = str_ireplace(' ', '_', strtolower($patient_age));
	$patient_bdate = str_ireplace(' ', '_', strtolower($patient_bdate));
	$patient_gender = str_ireplace(' ', '_', strtolower($patient_gender));
	$patient_height = str_ireplace(' ', '_', strtolower($patient_height));
	$patient_weight = str_ireplace(' ', '_', strtolower($patient_weight));
	$patient_status = str_ireplace(' ', '_', strtolower($patient_status));
	$patient_address = str_ireplace(' ', '_', strtolower($patient_address));
	$patient_contactnum = str_ireplace(' ', '_', strtolower($patient_contactnum));*/
	
	
	
	
	
	
	

	
	
	
	//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
	
	// $conn=mysqli_connect("localhost","root","root")or die("can not connect");
	// mysqli_select_db("healthcare",$conn) or die("can not select database");
	
		
	$queryCheck1 = "select patient_username from patient where patient_username='{$doctor_username}';";
	$resultCheck1 = mysqli_query($conn,$queryCheck1) or die("wrong query");
	
	$queryCheck2 = "select doctor_username from doctor where doctor_username='{$doctor_username}';";
	$resultCheck2 = mysqli_query($conn,$queryCheck2) or die("wrong query");
	
	while($myrow1 = mysqli_fetch_assoc($resultCheck1)) {
			$a=$a+1;
	}
	while($myrow2 = mysqli_fetch_assoc($resultCheck2)) {
			$a=$a+1;
	}
	// echo $a;

	// doctor_username
	// doctor_password 	
	// doctor_email  	
	// doctor_lname 	 	
	// doctor_fname 	 	
	// doctor_mname 	
	// doctor_specialization 	
	// doctor_hospitalIndex 	 	
	// contactno 	
	// doctor_licenseno
	if ($a==0){
		$docinsert = "insert into doctor  values
			('{$doctor_username}','{$doctor_password}','{$doctor_email}','{$doctor_lname}','{$doctor_fname}','{$doctor_mname}','{$doctor_special}','{$doctor_hospital}','{$doctor_contactnum}','n',{$doctor_licenseno});";		
		
				$result = mysqli_query($conn,$docinsert); 		
				if (!$result) { 
					echo "Problem with query " . $docinsert . "<br/>"; 
					echo mysqli_error($conn);
					//echo pg_last_error(); 
					exit(); 
				} 
				else{
					echo "Doctor successfully added. . Thank you. <br/>";
					}
			
	}
	else {

			echo "Username already exists!";
		
	}
	mysqli_close($conn);
	
?>
</div>
</div>
</div>
</body>
</html>