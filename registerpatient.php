<?php 
require "dbconnect.php";

$sql="select * from insuranceproviders";

$result=mysqli_query($con,$sql);


	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="../css/register_page.css">
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/validatepatient.js"></script> 
	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	 <script src="../js/jquery.sumoselect.min.js"></script>
<link href="../css/sumoselect.css" rel="stylesheet" />

</head>

<body>


<div class="front-signup" >
<form id="patientregister" onsubmit="return formcheck()" action="registeraction.php?type=p" method="POST">

<div class="placeholding-input">
<input type="text" id="email" name="email" placeholder="Email">
<div class="text-error" id="emailerror"></div>

</div>

<div class="placeholding-input">
<input type="password" id="password" name="password" placeholder="Password">
<div class="text-error" id="passerror"></div>

</div>	

<div class="placeholding-input">
<input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
<div class="text-error" id="cpasserror"></div>

</div>	

<div class="placeholding-input">
<input type="text" id="fname" placeholder="First Name" name="fname">
<div class="text-error" id="fnameerror"></div>

</div>

<div class="placeholding-input">
<input type="text" id="lname" placeholder="Last Name" name="lname">
<div class="text-error" id="lnameerror"></div>

</div>

<div class="placeholding-input">
<input type="text" id="phone" placeholder="Phone Number" name="phone">
<div class="text-error" id="phoneerror"></div>

</div>

<div class="placeholding-input">
<!-- <input type="text" id="gender" name="insuranceid" placeholder="Insurance ID" > -->
<select id="gender" name="gender">
	<option selected="selected" disabled>Gender</option>	
	<option value="M">Male</option>
	<option value="F">Female</option>
	<option value="U">Rather not say</option>
</select>

<div class="text-error" id="gendererror"></div>
</div>


<div class="placeholding-input">
<input type="text" id="StreetAdd" placeholder="Street Address"  name="streetadd">
<div class="text-error" id="adderror"></div>

</div>





<div  id="locationdiv" class="placeholding-input">

<input type="text" id="zip" name="zipcode" maxlength="6" size="7" placeholder="Zipcode"  >
<input type="text" id="city"  name="city" placeholder="City" size="26"  readonly="readonly">
<input type="text" id="state" name="state" placeholder="State" size="3" maxlength="2"  readonly="readonly" >

<div class="text-error" id="ziperror"></div>
</div>

<div class="placeholding-input">
<select id="bloodgrp" name="bloodgrp" >
<option selected="selected" disabled>Bloodgroup</option>
	<option value="A+">A+</option>
	<option value="O+">O+</option>
	<option value="B+">B+</option>
	<option value="AB+">AB+</option>
	<option value="A-">A-</option>
	<option value="O-">O-</option>
	<option value="B-">B-</option>
	<option value="AB-">AB-</option>


</select>
<!-- <input type="text" id="bloodgrp" placeholder="Blood Group" > -->
<div class="text-error" id="blderror"></div>

</div>

<div class="placeholding-input">
<select id="provider" name="provider">
<option selected="selected" disabled>Choose Insurance Provider</option>
<?php
while($rws=mysqli_fetch_array($result)){

	echo '<option value="'.$rws["ProviderID"].'" > '.$rws["Name"].'</option>';
}
?>
</select>
<!-- <input type="text" id="provider" name="provider" placeholder="Insurance Provider Name" > -->
<div class="text-error" id="providererror"></div>

</div>

<div class="placeholding-input">
<input type="text" id="insuranceid" name="insuranceid" placeholder="Insurance ID" >
<div class="text-error" id="insiderror"></div>

</div>


<div class="placeholding-input">


<input type="text" id="DOB" class="datepicker" name="DOB" placeholder="Date Of Birth" >

<script>
$( function() {
	$(".datepicker").datepicker({
		// showOn: "both",
		yearRange:'1920:2005',
		 changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy",
      defaultDate: "01-01-1920",
      onSelect:function(){
      	dobcheck=true;
      	$(this).removeClass("error");
				$(this).addClass("success");
				$("#doberror").text("");
      }
	});

});
</script>

<div class="text-error" id="doberror"></div>


</div>

<input type="submit" id="submitbtn" value="register"  class="btn signup-btn">

</form>
</div>

	

<script type="text/javascript">//<![CDATA[
	$(function() {
		// IMPORTANT: Fill in your client key
		// var clientKey = "js-9qZHzu2Flc59Eq5rx10JdKERovBlJp3TQ3ApyC4TOa3tA8U7aVRnFwf41RpLgtE7";
		var clientKey= "js-unyYx611ZenHvAkX82IPFyrh2GJfH1Sbpr9WxaYwpleUWzS4BBUgalyc1hrIjkUJ";
		
		var cache = {};
		var container = $("#locationdiv");
		var errorDiv = container.find("div#ziperror");
		
		/** Handle successful response */
		function handleResp(data)
		{
			// Check for error
			if (data.error_msg){
				$("#zip").removeClass("success");
				$("#zip").addClass("error")	;
				$("#zip").off('blur');
				errorDiv.text(data.error_msg);
				
			}
			else if ("city" in data)
			{
				// Set city and state
				container.find("input[name='city']").val(data.city);
				container.find("input[name='state']").val(data.state);
				zipcodecheck=true;
				$("#zip").removeClass("error");
				$("#zip").addClass("success");

			}
		}
		
		// Set up event handlers
		container.find("input[name='zipcode']").on("keyup change", function() {
			// Get zip code
			var zipcode = $(this).val().substring(0, 5);
			//console.log("zipcode"+zipcode);
			if (zipcode.length == 5 && /^[0-9]+$/.test(zipcode))
			{
				// Clear error
				errorDiv.empty();
				
				// Check cache
				if (zipcode in cache)
				{
					handleResp(cache[zipcode]);
				}
				else
				{
					// Build url
					var url = "https://www.zipcodeapi.com/rest/"+clientKey+"/info.json/" + zipcode + "/radians";
					
					// Make AJAX request
					$.ajax({
						"url": url,
						"dataType": "json"
					}).done(function(data) {
						handleResp(data);
						
						// Store in cache
						cache[zipcode] = data;
					}).fail(function(data) {
						if (data.responseText && (json = $.parseJSON(data.responseText)))
						{
							// Store in cache
							cache[zipcode] = json;
							
							// Check for error
							if (json.error_msg)
								errorDiv.text(json.error_msg);
						}
						else
							errorDiv.text('Request failed.');
					});
				}
			}
		}).trigger("change");
	});
//]]></script>
</body>
</html>