<?php
require "dbconnect.php";
// session_start();
	if ($_SESSION['login']==0) header('Location: login_page.php');	
//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
				// $conn=mysqli_connect("localhost","root","root")or die("can not connect");
	            // mysqli_select_db("healthcare",$conn) or die("can not select database");
				
				/*Display doctor's name and specialization*/						
				$doctor_user = $_GET['doctor_user'];				
				//echo $doctor_user;				
				$doctor_query = mysqli_query($conn,"SELECT doctor_lname, doctor_fname, doctor_mname, doctor_specialization FROM doctor WHERE doctor_username='$doctor_user'");
				$doctor_result = mysqli_fetch_array($doctor_query);
			    //echo '<p>' . $doctor_result[0] . ', ' . $doctor_result[1] . ' ' . $doctor_result[2] .'<br/>(' . $doctor_result[3] . ')</p>';					
				/*Display selected date and its equivalent day of the week*/
				$app_date = $_GET['app_date'];		
								
				$app_dweek = date('l', strtotime($app_date));
		//		echo '<p>' . $app_date . ' (' . $app_dweek . ')</p>';					
				if($app_dweek == "Saturday") {
					$sched_query = mysqli_query($conn,"SELECT * FROM  availability_saturday WHERE doctor_username='$doctor_user'");
				}
				else if($app_dweek == "Sunday") {
					$sched_query = mysqli_query($conn,"SELECT *  FROM availability_sunday WHERE doctor_username='$doctor_user'");
				}
				else {
					$sched_query = mysqli_query($conn,"SELECT * FROM availability_weekday WHERE doctor_username='$doctor_user'");
				}
				//$sched_str = mysqli_result($sched_query, 0);
				$i=0;
				while($rws=mysqli_fetch_array($sched_query))
				{
				$sched_array[$i] =$rws['time'];
				$i++;
				}
				print_r($sched_array);
				/*---------------------------------------------------------------- */
				//Disply array
				/*for($i=0; $i<count($sched_array)-1; $i++) 
				{	echo $sched_array[$i]."\r\n";	
				}
				echo "---------";*/
				$a=array();				
				$i=0;
				/* Query to select Appointment Details */
				$app_query = mysqli_query($conn,"SELECT app_doctorusername,app_date,app_time FROM appointment WHERE app_doctorusername='$doctor_user' and app_date='$app_date' ");
				while($app_result = mysqli_fetch_array($app_query))
					{
                        //echo $app_result['app_time'];
						$a[$i]=$app_result['app_time'];
						//	echo $a[$i]."\r\n";
						$i++;
					} 	    
					for($i=0;$i<count($sched_array);$i++)
                    {
	                   for($j=0;$j<count($a);$j++)
		                  {					  
						  if($sched_array[$i]==$a[$j])
							       {
				                      //echo $b[$j];
					                  array_splice($sched_array,$i,1);
					                  //var_dump($b);
				                   }
		                  }
                    }		          				
		//		for($j=0;$j<count($sched_array);$j++)
        //      {echo $sched_array[$j]."\r\n";}		
/*-------------------------------------------------------------------*/  
                $doctor_query = mysqli_query($conn,"SELECT doctor_lname, doctor_fname, doctor_specialization,doctor_hospital
				FROM doctor WHERE doctor_username='$doctor_user'");
				$doctor_result = mysqli_fetch_array($doctor_query);
				echo "<br/><br/><br/>";				
				echo "Doctor Details";				
				echo '<p>' .'Name:'. $doctor_result[1] . ' ' . $doctor_result[0] . ' <br/>' ;				
                echo 'Specialisation:'. $doctor_result[2] . ' <br/>' ;
                echo 'Hospital:'. $doctor_result[3] . ' <br/>' ;				
/*----------------------------------------------------------------------*/			
				/*If the doctor doesn't have a work schedule for the specified date, disable appointment scheduling*/
				if(count($sched_array) == 1) {
					echo '<p>Scheduling an appointment for this day is currently unavailable. Please pick another date.</p>';
				}
				/*Else, display time picker*/
				
				mysqli_close($conn);	
	
?>

<html>
<head>
		<title>Healthcare System</title>
		<link rel="stylesheet" type="text/css" href="CSS/dboardCSS.css">
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




<form action="send_apprequest.php" method="post">


<table width="100%" cellpadding="5" cellspacing="0" color="#ccc" style="font-family:Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:14px;" border="1">
       <tr>
         <td style="text-align:center; width=25% bgcolor=#F7F7F7" >Morning</td>
         <td style="text-align:center; width=25% bgcolor=#F7F7F7"><p>Afternoon</p></td>
         <td style="text-align:center; width=25% bgcolor=#F7F7F7"><p>Evening</p></td>
         <td style="text-align:center; width=25% bgcolor=#F7F7F7" ><p>Night</p></td>
       </tr>
	   
<tr>
<!----------------------------------------------->
<td>	   
<table width="100%" cellpadding="5" cellspacing="0" style="font-family:Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:14px;" >	   
  <tr> 
	<tr>

<?php
$set=0;	
$time1="8am";
for($i=0;$i<count($sched_array);$i++)
{    if($time1 == $sched_array[$i])
	 {echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="8:am"  > 8.00am </td>';
	 $set=$set+1;}
}
if($set==0)
{echo'<td style="color:red; text-align:left;width=50% "> <input type="radio" name="app_time" id="app_time"  disabled ><strike> 8.00am </td>';}
?>

<?php
$set=0;	
$time1="8:30am";
for($i=0;$i<count($sched_array);$i++)
{    if($time1 == $sched_array[$i])
	 {echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time"  value="8:30am"> 8.30am </td>';
	 $set=$set+1;}
}
if($set==0)
{echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 8.30am </td>';}
?>	  
  </tr>
<tr> 
<?php
$set=0;	
$time1="9am";
for($i=0;$i<count($sched_array);$i++)
{    if($time1 == $sched_array[$i])
	 {echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="9am"> 9.00am </td>';
	 $set=$set+1;}
}
if($set==0)
{echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 9.00am </td>';}
?>  
<?php
$set=0;	
$time1="9:30am";
for($i=0;$i<count($sched_array);$i++)
{    if($time1 == $sched_array[$i])
	 {echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="9:30am"> 9.30am </td>';
	 $set=$set+1;}
}
if($set==0)
{echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 9.30am </td>';}
?>	 
</tr>
<tr> 
<?php
$set=0;	
$time1="10am";
for($i=0;$i<count($sched_array);$i++)
{    if($time1 == $sched_array[$i])
	 {echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="10am"> 10.00am </td>';
	 $set=$set+1;}
}
if($set==0)
{echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 10.00am </td>';}
?>		  
<?php
$set=0;	
$time1="10:30am";
for($i=0;$i<count($sched_array);$i++)
{    if($time1 == $sched_array[$i])
	 {echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="10:30am"> 10.30am </td>';
	 $set=$set+1;}
}
if($set==0)
{echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 10.30am </td>';}
?>		  
	  
</tr>

<tr> 
	  
<?php
$set=0;	
$time1="11am";
for($i=0;$i<count($sched_array);$i++)
{    if($time1 == $sched_array[$i])
	 {echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="11am"> 11.00am </td>';
	 $set=$set+1;}
}
if($set==0)
{echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 11.00am </td>';}
?>		  
	  
<?php
$set=0;	
$time1="11:30am";
for($i=0;$i<count($sched_array);$i++)
{    if($time1 == $sched_array[$i])
	 {echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="11:30am"> 11.30am </td>';
	 $set=$set+1;}
}
if($set==0)
{echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 11.30am </td>';}
?>	
	  
</tr>
  
</tr>
  
</table>
</td>
<!----------------------------------------------->
<td>	   
<table width="100%" cellpadding="5" cellspacing="0" style="font-family:Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:14px;">	   
  <tr> 
	<tr>
	   
	   <?php
         $set=0;	
         $time1="12pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="12pm"> 12.00pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 12.00pm </td>';}
       ?>	
	   
	  
	   <?php
         $set=0;	
         $time1="12:30pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="12:30pm"> 12.30pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 12.30pm </td>';}
       ?>	
	  
	</tr>
	
	<tr> 
	   
	   <?php
         $set=0;	
         $time1="1pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="1pm"> 1.00pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 1.00pm </td>';}
       ?>	
	   
	   <?php
         $set=0;	
         $time1="1:30pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="1:30pm"> 1.30pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 1.30pm </td>';}
       ?>	
	   
	</tr>
	
	<tr> 
	   
	   <?php
         $set=0;	
         $time1="2pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="2pm"> 2.00pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 2.00pm </td>';}
       ?>	
	   
	   <?php
         $set=0;	
         $time1="2:30pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="2:30pm"> 2.30pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 2.30pm </td>';}
       ?>	
	   
	</tr>
	
	<tr> 
	   
	   <?php
         $set=0;	
         $time1="3pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="3pm"> 3.00pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 3.00pm </td>';}
       ?>	
	   
	   <?php
         $set=0;	
         $time1="3:30pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="3:30pm"> 3.30pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 3.30pm </td>';}
       ?>	
	   
	</tr>
  </tr>
</table>
</td>

<!----------------------------------------------->

<td>	   
<table width="100%" cellpadding="5" cellspacing="0" style="font-family:Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:14px;">	   
  
  <tr> 
	
	<tr>
	  
	  <?php
         $set=0;	
         $time1="4pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="4pm"> 4.00pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 4.00pm </td>';}
       ?>	
	  
	   <?php
         $set=0;	
         $time1="4:30pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="4:30pm"> 4.30pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 4.30pm </td>';}
       ?>	
	  
	</tr>
	
	<tr> 
	  
	  <?php
         $set=0;	
         $time1="5pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="5pm"> 5.00pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 5.00pm </td>';}
       ?>	
	  
	  <?php
         $set=0;	
         $time1="5:30pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="5:30pm"> 5.30pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 5.30pm </td>';}
       ?>	
	
	</tr>
	
	<tr> 
	  
	  <?php
         $set=0;	
         $time1="6pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="6pm"> 6.00pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 6.00pm </td>';}
       ?>	
	  
	   <?php
         $set=0;	
         $time1="6:30pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="6:30pm"> 6.30pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 6.30pm </td>';}
       ?>	
	
	</tr>
	
	<tr>
      
	  <?php
         $set=0;	
         $time1="7pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="7pm"> 7.00pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 7.00pm </td>';}
       ?>	
	  
	  <?php
         $set=0;	
         $time1="7:30pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="7:30pm"> 7.30pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 7.30pm </td>';}
       ?>	
	
	</tr>
  </tr>
</table>
</td>

<!----------------------------------------------->

<td>	   
<table width="100%" cellpadding="5" cellspacing="0" style="font-family:Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:14px;">	   
  
  <tr> 
	<tr>
	   
	   <?php
         $set=0;	
         $time1="8pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="8pm"> 8.00pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 8.00pm </td>';}
       ?>	
	   
	   <?php
         $set=0;	
         $time1="8:30pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="8:30pm"> 8.30pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 8.30pm </td>';}
       ?>	
	
	</tr>
	<tr> 
	   
	   <?php
         $set=0;	
         $time1="9pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="9pm"> 9.00pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike> 9.00pm </td>';}
       ?>	
	   
	   <?php
         $set=0;	
         $time1="9:30pm";
         for($i=0;$i<count($sched_array);$i++)
           {    if($time1 == $sched_array[$i])
	        {    echo'  <td style="color:green; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" value="9:30pm"> 9.30pm </td>';
	            $set=$set+1;}
            }
         if($set==0)
         {echo'<td style="color:red; text-align:left;width=50%"> <input type="radio" name="app_time" id="app_time" disabled ><strike><strike> 9.30pm </td>';}
       ?>	  
	  			
	
	</tr>
  </tr>
</table>
</td>
<!----------------------------------------------->
</tr>  
</table>
<?php

echo '
<input type="hidden" name="app_date" value="' . $app_date . '"/>
<input type="hidden" name="doctor_user" value="' . $doctor_user . '"/>
<input type="submit" value="Request" onclick="return confirm(\'Send appointment to doctor?\');"/>
</form>
';       
?>

<form action="request_patient.php" method="post">
<input type="submit" value="Cancel"/>
</form>
</body>
</html>