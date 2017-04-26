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
	$doctor_weekd_start=$_POST['sched_weekdstart'];
	$doctor_weekd_end=$_POST['sched_weekdend'];
	$doctor_sat_start=$_POST['sched_satstart'];
	$doctor_sat_end=$_POST['sched_satend'];
	$doctor_sun_start=$_POST['sched_sunstart'];
	$doctor_sun_end=$_POST['sched_sunend'];

	$weekdaylist=halfHourTimes($doctor_weekd_start,$doctor_weekd_end);

	$satdaylist=halfHourTimes($doctor_sat_start,$doctor_sat_end);
	
	$sundaylist=halfHourTimes($doctor_sun_start,$doctor_sun_end);

	$a=0;
	$ctr=0;
	// echo "Weekday:<br/>";
	// print_r($weekdaylist);
	// echo "<br>";

	// echo "Saturday:<br/>";
	// print_r($satdaylist);
// echo "<br>";
	// echo "sunday:<br/>";
	// print_r($sundaylist);
	// echo "<br>";
		
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

		$docinsertweekday="insert into availability_weekday values ";
			foreach($weekdaylist as $list1){

		$docinsertweekday.="('".$doctor_username."','".$list1."')";
		if(next($weekdaylist)==true) $docinsertweekday.=",";
		}

		// $docinsertsaturday
		$docinsertsaturday="insert into availability_saturday values ";
			foreach($satdaylist as $list2){

		$docinsertsaturday.="('".$doctor_username."','".$list2."')";
		if(next($satdaylist)==true) $docinsertsaturday.=",";
		}
		// $docinsertsunday
		$docinsertsunday="insert into availability_sunday values ";
			foreach($sundaylist as $list3){

		$docinsertsunday.="('".$doctor_username."','".$list3."')";
		if(next($sundaylist)==true) $docinsertsunday.=",";
		}


		
				$result = mysqli_query($conn,$docinsert); 		
				if (!$result) { 
					echo "Problem with query " . $docinsert . "<br/>"; 
					echo mysqli_error($conn);
					//echo pg_last_error(); 
					exit(); 
				} 
				else{
					mysqli_query($conn,$docinsertweekday) or trigger_error(mysqli_error($conn));
					mysqli_query($conn,$docinsertsaturday) or trigger_error(mysqli_error($conn));
					mysqli_query($conn,$docinsertsunday) or trigger_error(mysqli_error($conn));

					echo "Doctor successfully added. . Thank you. <br/>";
					}
			
	}
	else {

			echo "Username already exists!";
		
	}
	mysqli_close($conn);


		function halfHourTimes($start,$end) {
			// echo "Start:".$start."<br>End:".$end."<br>";
  			if(strpos($start,"am")!=false){
  				// echo "Inside start if"."<br>";
  				$starttime=substr($start, 0,strpos($start,"am"));
  				// echo $starttime."<br>";
  				if(strpos($start,":")!=false){
  					// echo "inside explode";
  				$starttimetot=explode(":",$starttime);
  				$starttimsec=(int)($starttimetot[0])*3600 + (int)($starttimetot[1])*60;
  				}
  				else
  				$starttimsec=(int)($starttime)*3600;	
  				//$starttime=date_parse($starttime);
  				//print_r($starttime);
  				
  				// echo $starttimsec."<br>";

  			}
  			else 
  			{
  				// echo "Inside start else"."<br>";
  				$starttime=substr($start, 0,strpos($start,"pm"));
  				// echo "Rohit TEst:".$starttime."<br>";
  				if(strpos($start,":")!=false){
  					// echo "inside explode";
  				$starttimetot=explode(":",$starttime);
  				$starttimsec=(int)($starttimetot[0])*3600+ 11*3600+ (int)($starttimetot[1])*60;
  				}
  				else
  				$starttimsec=(int)($starttime)*3600+(11*3600);

  				// echo $starttimsec."<br/>";
  			}	


  			if(strpos($end,"am")!=false){
  				// echo "Inside end if"."<br>";
  				$endtime=substr($end, 0,strpos($end,"am"));
  				if(strpos($end,":")!=false){
  				$endtimetot=explode(":",$endtime);
  				$endtimsec=(int)($endtimetot[0])*3600+ (int)($endtimetot[1])*60;
  				}
  				else
  				$endtimsec=(int)($endtime)*3600;

  				// echo $endtimsec."<br/>";
  			}
  			else 
  			{
  				// echo "Inside end else"."<br>";
  				$endtime=substr($end, 0,strpos($end,"pm"));
  				// echo "Rohit Bhattacharjee".$endtime."<br>";
  				if(strpos($start,":")!=false){
  				$endtimetot=explode(":",$endtime);
  				$endtimsec=(int)($endtimetot[0])*3600+ 11*3600 + (int)($endtimetot[1])*60;
  				}
  				else
  				$endtimsec=(int)($endtime)*3600 + 11*3600;

  				// echo $endtimsec."<br/>";
  			}	
  			$formatter = function ($time) {
    		if ($time % 3600 == 0) {
      		return date('ga', $time);
    		} else {
      		return date('g:ia', $time);
   			 }
  			};

  			if($starttimsec/3600>=23 && $starttimsec/3600<=24 )
  				$starttimsec=$starttimsec-12*3600;
  			if($endtimsec/3600>=23 && $endtimsec/3600<=24 )
  				$endtimsec=$endtimsec-12*3600;

  			$halfHourSteps = range($starttimsec, $endtimsec, 1800);
  			return array_map($formatter, $halfHourSteps);
}

	
?>
</div>
</div>
</div>
</body>
</html>