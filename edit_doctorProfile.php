<?php 
require "dbconnect.php";
?>
<html>
	<head>
		<title>Edit Doctor's Profile</title>
	</head>
	<body>
		<?php
			
			
			$username=$_SESSION["username"];
			
			//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user'); 
			
			// $conn=mysqli_connect("localhost","root","root")or die("can not connect");
	  //       mysqli_select_db("healthcare",$conn) or die("can not select database");
			
			$query="SELECT `doctor_username`, `doctor_password`, `doctor_email`, `doctor_lname`, `doctor_fname`, `doctor_mname`, `doctor_specialization`, `doctor_hospital`, `contactno`, `doctor_rstatus`, `doctor_licenseno`, `doctor_sched_wday`, `doctor_sched_sat`, `doctor_sched_sun` FROM `doctor` WHERE doctor_username='{$username}';";
			$result = mysqli_query($conn,$query); 
			
			$rows = mysqli_num_rows($result);
			
			for ($i=0; $i<$rows; $i++){
				$tuple = mysqli_fetch_array($result);
				$fname=$tuple['doctor_fname'];
				$mname=$tuple['doctor_mname'];
				$lname=$tuple['doctor_lname'];
				$email=$tuple['doctor_email'];
				$specialization=$tuple['doctor_specialization'];
				$hospital=$tuple['doctor_hospital'];
				$rstatus=$tuple['doctor_rstatus'];
				$licenseno=$tuple['doctor_licenseno'];
				$sched_wkdy=$tuple['doctor_sched_wday'];
				$sched_sat=$tuple['doctor_sched_sat'];
				$sched_sun=$tuple['doctor_sched_sun'];
				$contactno=$tuple['contactno'];
			}
			echo
			"<form action='process_editDoctorProfile.php' method='post'>
				<table>
				<tr>
					<td> Name: </td>
					<td> <input type='text' name='fName' value='$fname' required='required'> </td>
					<td> <input type='text' name='mName' value='$mname' required='required'> </td>
					<td> <input type='text' name='lName' value='$lname' required='required'> </td>
				</tr>
				<tr>
					<td> Email: </td>
					<td> <input type='text' name='email' value='$email'> </td>
				</tr>
				<tr>
					<td> Specialization: </td>
					<td> <input type='text' name='specialization' value='$specialization'> </td>
				</tr>
				<tr>
					<td> Hospital: </td>
					<td><input type='text' name='hospital' value='$hospital' required='required' /></td>
				</tr>
				<tr>
					<td> RStatus: </td>
                    <td><input type='tet' name='rstatus' value='$rstatus' required='required' /></td>
								
				</tr>
				<tr>
					<td> LicenseNo: </td>
					<td> <input type='text' name='licenseno' value='$licenseno' required='required'> </td>
				</tr>
				<tr>
					<td> Weekday Schedule: </td>
					<td> <input type='text' name='sched_wkdy' value='$sched_wkdy' required='required'> </td>
				</tr>
				<tr>
					<td> Saturday schedule: </td>
					<td> <input type='text' name='sched_sat' value='$sched_sat' required='required'> </td>
				</tr>
				<tr>
					<td> Sunday schedule: </td>
					<td> <input type='text' name='sched_sun' value='$sched_sun' required='required'> </td>
				</tr>
				
				<tr>
				
				<tr>
					<td> Contact Information: </td>
					<td> <input type='text' name='contactNum' value='$contactno' required='required'> </td>
				</tr>
				</table>
				<input type='submit' name='submit'/>
				</form>";
			mysqli_close($conn);
		?>
	</body>
</html>