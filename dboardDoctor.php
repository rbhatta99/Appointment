<?php
require "dbconnect.php";
if ($_SESSION['login']==0)
		header('Location: index.php');
	else if($_SESSION['login']==1)
		header('Location: dBoardPatient.php'); 

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
					<li><a class="top_menu" href = "dboardDoctor.php">Dashboard</a></li>
					<li><a class="top_menu" href = "doctor_profile.php">Profile</a></li>
					<li><a class="top_menu" href = "appointments_doctor.php">Appointment</a></li>
					<!--li><a class="top_menu" href = "#">Settings</a></li-->
				</ul>
				<ul class = "main_menu_right">
					
						
					
					<!--li> <a id="notification" class="top_menu_right" href = "dboardPatient.php"> Notifications </a> </li-->
					<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li>
				</ul>
			</div>
	</div>
				
	<div class="banner-container">
			<div class="headbanner"></div>
	</div>
		
		<div class="content_wrapper">
			<div class="content_main">
				<div class="welcome_header">
					<?php
						echo "Welcome " .$_SESSION["name"] ;
					?>
					
					</div>
					<div class="clearance"></div>
			<!--		<div class="notifications">
				<!--		<?php
							display_notification($_SESSION["username"]);
						?>
				-->		
				</div>
				
			</div>
		</div>
	</body>
</html>
