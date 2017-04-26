<?php
require "dbconnect.php";
// session_start();
if ($_SESSION['login']==0) header('Location: login_page.php');
include('calender_function.php');
$month=date("n");
$year=date("Y");		
?>

<html>
	<head>
		<title>Healthcare System</title>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">
	    <link rel="stylesheet" type="text/css" href="CSS/calender_css.css">
	</head>
	<body>
		<!--div id = "profilePic">
			<img src = "sample.png" height = "200" width = "200"/>
		</div-->
		
		
		
		<div id = "menu_container">
			<div id="menu_wrapper">
				<ul class = "main_menu_left">
					<li><a class="top_menu" href = "dboardPatient.php">Dashboard</a></li>
					<li><a class="top_menu" href = "patient_profile.php">Profile</a></li>
					<li><a class="top_menu" href = "appointments_patient.php">Appointment</a></li>
					<!--li><a class="top_menu" href = "#">Settings</a></li-->
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
					
					<!--li> <a id="notification" class="top_menu_right" href = "dboardPatient.php"> Notifications </a> </li-->
					<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li>
				</ul>
			</div>
		</div>
		
		
		<div class="content_wrapper">
			<div class="content_main">
			<?php
			
			   //	$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
			    // $conn=mysqli_connect("localhost","root","root")or die("can not connect");
	            // mysqli_select_db("healthcare",$conn) or die("can not select database");
				
				/*Display doctor's name and specialization*/
				$doctor_user = $_POST['doctor_user'];
				$_SESSION['docuser']=$doctor_user;


				
				$doctor_query = mysqli_query($conn,"SELECT doctor_lname, doctor_fname, s.Name as sname,h.name as hname
				                                 FROM doctor d,specializationinfo s, hospitalinfo h WHERE s.SpecializationID=doctor_specialization and doctor_hospital=h.HospitalID and doctor_username='$doctor_user'") ;
				$doctor_result = mysqli_fetch_array($doctor_query);
				echo "<br/><br/><br/>";				
				echo "Doctor Details";
				echo '<p>' .'Name:'. $doctor_result['doctor_fname'] . ' ' . $doctor_result['doctor_lname'] . ' <br/>' ;				
                echo 'Specialisation:'. $doctor_result['sname'] . ' <br/>' ;
                echo 'Hospital:'. $doctor_result['hname'] . ' <br/>' ;	
				echo "Please select date for Appointment";	
				mysqli_error($conn);
   				/*Display date picker and 'Add Time' button*/
	//			echo '<form action="request_page_time.php" method="post">
	//					<input type="date" name="app_date" value="' . date('Y-m-d') . '" min="' . date('Y-m-d') . '"/>
	//					<input type="hidden" name="doctor_user" value="' . $doctor_user . '"/>
	//					
	//					<input type="submit" value="Next"/>
	//				</form>';
	
	
	          /*Next Month button*/
			  echo '<form action="request_page_date2.php" method="post">						
					<input type="submit" value="Next Month--->"/>
					</form>';	
									
				echo draw_calendar($month,$year);	
				
				echo'
				*Red indicated days are not possible</br>
				*Green indicated days are possible
				
				';
				
				mysqli_close($conn);
			?>
			
			
			<form action="request_patient.php" method="post">
			<input type="submit" value="Back"/>
			</form>
			
		<!--	<a href="request_patient.php">Cancel</a> -->
			
			
			</div>
		</div>
	</body>
</html>