<?php 
require "dbconnect.php";
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">
		<script language = "javascript">
		
			function clicked(){
				var search = document.getElementById("searchinput");
				var opt = document.getElementById("option");

				if(!search.value){
					alert('You have not entered any text in the search box, please enter again');
					search.focus(); //RESEEEEEEEEARCH
				}else{
					form.submit();
				}
			}
		</script>
		<title> DOCTOR's DIRECTORY </title>
	</head>
	<body>
	<div id = "menu_container">
		<div id="menu_wrapper">
			<ul class = "main_menu_left">
					<li><a class="top_menu" href = "dboardPatient.php">Dashboard</a></li>
					<li><a class="top_menu" href = "patient_profile.php">Profile</a></li>
					<li><a class="top_menu" href = "appointments_patient.php">Appointment</a></li>
					
			</ul>
			
			<ul class = "main_menu_right">
				<li> 
							<form name='searchdoctor' action='search_patient.php' method='post'>
							Search by: 
							<select name="searchtype" id = "option">
								<option name="specialty">Specialty</option>
								<option name="name">Name</option>
								<option name="hospital">Hospital</option>
							</select>
							<input class='search_bar' type='text' name='searchinput'> </a>
							</form>
						</li>
				
				<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li>
			</ul>
		</div>
	</div>
	<div class="clearance"></div>
	<div id = "main_wrapper">
		<div class="content_wrapper">
			<div class="content_main">
		<?php
			//inputs from the user
			$sInput = $_POST['searchinput'];
			$sType = $_POST['searchtype'];
			echo $sType;
			$field;
			$resultCheck;
			//connecting to database
			// $conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
			
			//type names on the databse is all on lower case so we need to set all the inputs to lower case.
			// $sInput = str_ireplace(' ', '_', strtolower($input));
			// $sType = str_ireplace(' ', '_', strtolower($type));
			
			if($sType == 'Specialty'){
				$field = 's.Name';
			}else if($sType == 'Hospital'){
				$field = 'h.Name';
			}else if($sType == 'Name'){
				$field = 'name';
			}		
			
			//for($i=0; $i<10; $i++){
				//searching for column name
				if($sType == 'Specialty'){
				$resultCheck = mysqli_query($conn, "select doctor_username,doctor_fname,doctor_lname,doctor_mname,s.Name as sname,h.Name as hname from doctor d,specializationinfo s,hospitalinfo h where d.doctor_specialization=SpecializationID and h.HospitalID=doctor_hospital and  ".$field." like '%".$sInput."%' and doctor_deleted='n' ") or die(mysqli_error($conn));
				// echo $resultCheck;
					// break;
				}else if($sType == 'Name'){
					$resultCheck = mysqli_query($conn, "select doctor_username,doctor_fname,doctor_lname,doctor_mname,s.name as sname,h.name as hname from doctor d,specializationinfo s,hospitalinfo h where d.doctor_specialization=SpecializationID and h.HospitalID=doctor_hospital and (doctor_lname like '%".$sInput."%' or doctor_fname like '%".$sInput."%' or doctor_mname like '%".$sInput."%') and doctor_deleted='n'");
					// break;
				}else if($sType == 'Hospital'){
					$resultCheck = mysqli_query($conn, "select doctor_username,doctor_fname,doctor_lname,doctor_mname,s.Name as sname,h.Name as hname from doctor d,specializationinfo s,hospitalinfo h where d.doctor_specialization=SpecializationID and h.HospitalID=doctor_hospital and ".$field." like '%".$sInput."%' and doctor_deleted='n'") or die(mysqli_error($conn));
					// break;
				}
			
			
			$rows = mysqli_num_rows($resultCheck);
			
			if($rows==0){
				echo "No ".$sInput." existing on ".$sType." list.";
				//echo $field;
			}else if($rows!=0){
				echo 'Found! <br />';
				echo '<form action="request_page_date.php" method="POST">';
				echo "<table border=0><tr><th>Name</th><th>Specialization</th><th>Hospital</th></tr>";
				for($j=0; $j<$rows; $j++){
					$tuple=mysqli_fetch_array($resultCheck);
					echo '<input type="hidden" name="doctor_user" value="'.$tuple['doctor_username'].'">';
					echo '<tr><td>', $tuple['doctor_fname'],' ', $tuple['doctor_mname'] ,' ', $tuple['doctor_lname'], '</td>';
					echo '<td>', $tuple['sname'], '</td>';
					echo '<td>', $tuple['hname'], '</td>';
					echo '<td><input type="submit" value="Request Appointment"></td>';
					echo '</tr>';
					

				}
				echo "</table>";
			}
					
			mysqli_close($conn);
		?>
		</div>
		</div>
		</div>
	</body>
</html>