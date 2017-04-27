<?php 
require "dbconnect.php";
?>
<html>
	<head>
		<title>HCS >> Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="css/dboardCSS.css">
	</head>
	<body>

		<div id = "menu_container">
		<div id="menu_wrapper">
			<ul class = "main_menu_left">
					<li><a class="top_menu" href = "manage_regrequest.php">Doctors</a></li>
					<li><a class="top_menu" href = "Adminpatient.php">Patients</a></li>
				
					<!--li><a class="top_menu" href = "#">Settings</a></li-->
				</ul>
			
			<ul class = "main_menu_right">
				
				<!--li> <a id="notification" class="top_menu_right" href = "notifications.php"> Notifications </a> </li-->
				<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li>
			</ul>
		</div>
	
	</div>
		
		<div class="banner-container">
			<div class="headbanner"></div>
		</div>
			
		
		<div id = "main_wrapper">
		
		<div class="content_wrapper">
			<div class="content_main">
				<div class="clearance"></div>	
			<?php
				$i=0;
				$j=0;
				$action;
				
				

				
				$query2 = "select patient_username, patient_eadd, patient_lname, patient_fname, patient_mname from patient where patient_deleted='n' ;"; 
				$result2 = mysqli_query($conn,$query2);

				$query3="select patient_username, patient_eadd, patient_lname, patient_fname, patient_mname from patient where patient_deleted='y'";
				$result3 = mysqli_query($conn,$query3);

				
				
				if ( !$result2 || !$result3 ) { 
						echo mysqli_error($conn); 
						exit(); 
				}
				
				echo"<form action='process_regrequest.php' method='post'>";
				//echo "<center>";
				echo "<h1>LIST OF Patients</h1>";
				echo "<table class='table_doctors' >";
				echo "<tr><td><b>Username</b></td><td><b>Email Add</b></td><td><b>Lastname</b></td><td><b>First Name</b></td><td><b>Middle Name</b></td><td span='2'><b>Action</b></td></tr>";
				while($myrow1 = mysqli_fetch_array($result2)){
					echo "<tr class='table_doctors_row'>";
					echo "<td>".htmlspecialchars($myrow1['patient_username'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['patient_eadd'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['patient_lname'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['patient_fname'])."</td>";
					echo "<td>".htmlspecialchars($myrow1['patient_mname'])."</td>";
					// echo "<td>".htmlspecialchars($myrow1['doctor_licenseno'])."</td>";
					// echo "<td><a href='process_regrequest.php?id={$myrow1['doctor_username']}&action=accept'><img src='check.jpg' alt='accept'></a>";
					echo "<td><a href='process_regrequest.php?id2={$myrow1['patient_username']}&action2=delete'>&nbsp;&nbsp;&nbsp;<img src='cross.jpg' alt='delete'></a></td>";
				}
				echo"</table>";
				if(mysqli_num_rows($result3)>0){
				echo "<h1>LIST OF DELETED PATIENTS</h1>";
				echo "<table class='table_patients'>";
				echo "<tr class='table_patients_row'><td><b>Username</b></td><td><b>Email Add</b></td><td><b>Lastname</b></td><td><b>First Name</b></td><td><b>Middle Name</b></td><td span='2'><b>Action</b></td></tr>";
				while($myrow2 = mysqli_fetch_array($result3)){
					echo "<tr>";
					echo "<td>".htmlspecialchars($myrow2['patient_username'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['patient_eadd'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['patient_lname'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['patient_fname'])."</td>";
					echo "<td>".htmlspecialchars($myrow2['patient_mname'])."</td>";
					// echo "<td><a href='process_regrequest.php?id2={$myrow2['patient_username']}&action2=accept'><img src='check.jpg' alt='accept'></a>";
					echo "<td><a href='process_regrequest.php?id2={$myrow2['patient_username']}&action2=undelete'>&nbsp;&nbsp;&nbsp;<img src='accept.jpg' alt='undelete'></a></td>";
				}
				echo "</table>";
			}





				//echo"</center>";
				echo"</form>";
				
				// if()

				mysqli_close($conn);
			?>
				</div>
			</div>
		</body>
</html>