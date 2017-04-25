  <?php
	// require "dbconnect.php";
	include('notification.php');
	// session_start();
	if ($_SESSION['login']==0)
		header('Location: index.php');
	else if($_SESSION['login']==1)
		header('Location: dBoardPatient.php');
?>
<html>
<head>
	<title>My Profile</title>
	<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">
		
	
	
</head>

<script type="text/javascript">
function editProfileP(){
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("edit_boxP").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","edit_doctorProfile.php",true);
			xmlhttp.send();
			}
			function editUsernameP(){
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("edit_boxP").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","edit_doctor_uname.php",true);
			xmlhttp.send();
			}
			function editPasswordP(){
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("edit_boxP").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","edit_doctor_pword.php",true);
			xmlhttp.send();
			}
			
			

</script>

<body>
	<div id = "menu_container">
			<div id="menu_wrapper">
				<ul class = "main_menu_left">
					<li><a class="top_menu" href = "dboardPatient.php">Dashboard</a></li>
					<li><a class="top_menu" href = "patient_profile.php">Profile</a></li>
					<li><a class="top_menu" href = "appointments_patient.php">Appointment</a></li>
					<!--li><a class="top_menu" href = "#">Settings</a></li-->
				</ul>
				<ul class = "main_menu_right">
				
				<li> <a id="logout" class="top_menu_right" href = "logout.php"> Log Out </a> </li>
			</ul>
				</div>
	</div>
	
	<div class="content_wrapper">
		<div class="content_main">
		
<?php
		
		//connecting to database
		//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
		
		// $conn=mysqli_connect("localhost","root","root")or die("can not connect");
	 //    mysqli_select_db("healthcare",$conn) or die("can not select database");
		
		$username=$_SESSION["username"];
		$resultCheck = mysqli_query($conn,"select * from doctor where doctor_username = '".$username."';");

		$rows = mysqli_num_rows($resultCheck);
		
		for($j=0; $j<$rows; $j++){
			$tuple = mysqli_fetch_array($resultCheck);		 
			echo 'NAME: ', $tuple['doctor_lname'],', ', $tuple['doctor_fname'] ,' ', $tuple['doctor_mname'], '<br />';	
				
				
			echo 'SPECIALIZATIONATION: ', $tuple['doctor_specialization'], '<br />';	
			echo 'HOSPITAL: ', $tuple['doctor_hospital'], '<br />';	
			echo 'RSTATUS: ', $tuple['doctor_rstatus'], '<br />';	
			echo 'LICENSE NO: ', $tuple['doctor_licenseno'], '<br />';	
			echo 'SCHEDULE WEEKDAY ', $tuple['doctor_sched_wday'], '<br />';	
			echo 'SCHEDULE SATURDAY ', $tuple['doctor_sched_sat'], '<br />';
			echo 'SCHEDULE SUNDAY ', $tuple['doctor_sched_sun'], '<br />';
			echo 'EMAIL ADDRESS:', $tuple['doctor_email'], '<br />';	
			echo 'CONTACT NUMBER:', $tuple['contactno'], '<br />';	
		}
		?>
		<br/>
		
		<form>
				<input type = "button" onclick="editProfileP()" value = "Edit Profile"/>
					
				<input type = "button" onclick="editUsernameP()" value = "Edit Username"/>
					
				<input type = "button" onclick="editPasswordP()" value = "Edit Password"/>
		</form>
		
		</div>
		
		<br/>
			<div id = "edit_boxP">
			
			</div>
		<br/>
		
	</div>
	
<body/>

</html>
