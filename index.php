<?php 
require "dbconnect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/login_page.css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
	function validateForm(){
		var x=document.forms["myForm"]["eadd"].value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if ( atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
		  alert("Not a valid e-mail address.");
		  return false;
		}
	}		
</script>
<title>Appointment System</title>
</head>

<body>
	<div class="topbar">
    	<div class="global-nav">
        	<div>
				<ul class="nav">
				<li style="font-family:arial;color:White;font-size:20px;">Online Appointment Booking System</li>
                  <li class="home" data-global-action="t1home">
                      <a class="nav-logo-link" href="/" data-nav="front">
					  
                        <i class="bird-topbar-blue"></i>
						
                      </a>
                  </li>
                </ul>
				
			</div>
        </div>
    </div>
    <div id="page-outer">
    	<div id="page-container" style="border: 1px">
			<div class="front-container" id="front-container">
				<div class="front-bg">
					<img class="front-image" src="img/background.jpg" />
				</div>
				
				<div class="front-card">
					
				
					<div class="front-signin">
                    	
						<form action="login.php" class="signin" method="post" >
							<div class="username">
								<input type="text" id="signin-username" class="text-input" name="input_uname" title="Username or email" placeholder="Username"/>
								<!--label for="signin-username" class="placeholder">Username</label-->
							</div>
							
							<table class="password-signin">
                            	
								<tbody>
									<tr>
										<td class="primary">
											<div class="password">
												<input type="password" id="signin-password" class="table-input" name="input_pword" title="Password" placeholder="password">
												<!--label for="signin-password" class="placeholder">Password</label-->									
											</div>
										</td>
										
										
										<td class="secondary">
											<button type="submit" class="signin-btn-primary">Sign in</button>
										</td>
									</tr>
								</tbody>
							</table>
							
						</form>
					</div>
					 <div class="front-signup">
						<h2>
							<strong>No account yet?</strong>Sign Up Please							
						<!-- <form action="signup2.php" class="signup" method="post" name="myForm" onsubmit="return validateForm()"> -->
						<!--
						<select name="signup_option">
								<option value="doctor">Doctor</option>
								<option value="patient">Patient</option>
							</select> -->
						</h2>
						
						
							<a href="signup2.php?type=doc"><button  class="btn signup-btn">Sign up as doctor </button></a>							
							<a href="signup2.php?type=pat"><button  class="btn signup-btn">Sign up patient</button></a>
							<!-- <input type="submit" name="signup_option" class="btn signup-btn" value="patient"> 
							<input type="submit" name="signup_option" class="btn signup-btn" value="doctor"> 
							 --><!--<button type="submit"  class="btn signup-btn" >Sign up for HCS</button>-->
							
	
						<!-- </form> -->
						
					 </div>
						
					</div>
					<div class="footer">
						<ul>
							<li style="font-family:arial;color:white;font-size:12px;">Created by: Rohit, Sanjana, Farheen</li>
						</ul>
					</div>
					
					
					
				</div>
			</div>	
        </div>
    </div>

</body>

	



</html>

