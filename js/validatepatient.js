$(document).ready(function(){

	$("#patientregister")[0].reset();


// $("#patientregister").change()
	emailcheck=false;
	passcheck=false;
	cpasscheck=false;
	fnamecheck=false;
	lnamecheck=false;
	gendercheck=false;
	phonecheck=false;
	streetaddcheck=false;
	zipcodecheck=false;
	// citycheck=false;
	// statecheck=false;
	bloodgrpcheck=false;
	insuranceidcheck=false;
	providercheck=false;
	dobcheck=false;


	
	$("#email").blur(function(){
		
		if($(this).val()===""){
		emailcheck=false;
			$(this).removeClass("success");
			$(this).addClass("error");
			$("#emailerror").text("Email cannot be empty");

		}
		else if(!isValidEmailAddress($(this).val()	)){
				console.log("inside else if");
				emailcheck=false;
				$(this).removeClass("success");
				$(this).addClass("error");			
				$("#emailerror").text("Please enter a valid email address");
		}

		else{



		$.ajax({
			url:"../pages/checkemail.php?email="+$(this).val(),
			success:function(result){
				//console.log("result="+result)
				if(result==="true")
				{
					$("#email").removeClass("success");
					$("#email").addClass("error");
					emailcheck=false;
					$("#emailerror").html("Email Address already exists. Please <a href='../index.php'>Log in</a>");
					// return;
				}

				else{
					// console.log($(this));
					$("#email").removeClass("error");
					$("#email").addClass("success");
					emailcheck=true;
					$("#emailerror").text("");
					// return;
				}

			},

			error:function(error){
				console.log(error);
			}
		});

	}



	});
		//}

		$("#password").blur(function(){
			if($(this).val()=="")
			{	
				passcheck=false;
				$(this).removeClass("success");
				$(this).addClass("error")	;
				$("#passerror").text("Password cannot be empty");
			}
			
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				passcheck=true;
				$("#passerror").text("");
			}
		});

		$("#cpassword").blur(function(){
			if($(this).val()=="")
			{	
				$(this).removeClass("success");
				$(this).addClass("error")	;
				cpasscheck=false;
				$("#cpasserror").text("Please confirm your password");
			}
			else if($(this).val()!=$("#password").val())
			{
				$(this).removeClass("success");
				$(this).addClass("error")	;
				cpasscheck=false;
				$("#cpasserror").text("Password fields dont match.");	
			}
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				cpasscheck=true;
				$("#cpasserror").text("");
			}
		});

		$("#fname").blur(function(){
			if($(this).val()=="")
			{	
				fnamecheck=false;
				$(this).removeClass("success");
				$(this).addClass("error");
				$("#fnameerror").text("First name cannot be empty");
			}
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				fnamecheck=true;
				$("#fnameerror").text("");
			}
		});
		$("#lname").blur(function(){
			if($(this).val()=="")
			{	
				lnamecheck=false;
				$(this).removeClass("success");
				$(this).addClass("error")	;
				$("#lnameerror").text("Last name cannot be empty");
			}
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				lnamecheck=true;
				$("#lnameerror").text("");
			}
		});
		$("#StreetAdd").blur(function(){
			if($(this).val()=="")
			{	
				streetaddcheck=false;
				$(this).removeClass("success");
				$(this).addClass("error")	;
				$("#adderror").text("Street address cannot be empty");
			}
			else
			{

					$(this).removeClass("error");
				$(this).addClass("success");
				streetaddcheck=true;
				$("#adderror").text("");
			}
		});
		// $("#city").blur(function(){
		// 	if($(this).val()=="")
		// 	{	
		// 		$(this).removeClass("success");
		// 		$(this).addClass("error");

		// 	}
		// 	else
		// 	{
		// 			$(this).removeClass("error");
		// 		$(this).addClass("success");
		// 	}
		// });
		// $("#state").blur(function(){
		// 	if($(this).val()=="")
		// 	{	
		// 		$(this).removeClass("success");
		// 		$(this).addClass("error")	;
		// 	}
		// 	else
		// 	{
		// 			$(this).removeClass("error");
		// 		$(this).addClass("success");
		// 	}
		// });
		$("#zip").blur(function(){
			if($(this).val()=="")
			{	
				zipcodecheck=false;
				$(this).removeClass("success");
				$(this).addClass("error")	;
				$("#ziperror").text("Zipcaode cannot be empty");
			}
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				$("#ziperror").text("");
			}
		});
		$("#bloodgrp").blur(function(){
			//console.log("bloodgrp="+$(this).val());
			if($(this).val()===null)
			{	
				bloodgrpcheck=false;
				$(this).removeClass("success");
				$(this).addClass("error")	;
				$("#blderror").text("Please Choose a blood group");
			}
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				$("#blderror").text("");
				bloodgrpcheck=true;
			}
		});
		$("#insuranceid").blur(function(){
			if($(this).val()=="")
			{	
				insuranceidcheck=false;
				$(this).removeClass("success");
				$(this).addClass("error")	;
				$("#insiderror").text("Insurance ID cannot be empty");	
			}
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				$("#insiderror").text("");
					insuranceidcheck=true;

			}
		});
		$("#provider").blur(function(){
			console.log($(this).val());
			if($(this).val()==null)
			{	
				providercheck=false;
				$(this).removeClass("success");
				$(this).addClass("error")	;
				$("#providererror").text("Please enter an insurance provider");	

			}
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				$("#providererror").text("");
				providercheck=true;	


			}
		});

			/*TODO:if time permits add this*/
		 // $('#insuranceid').on('keypress', function(key) {
   //          if(key.charCode < 48 || key.charCode > 57 || key.charCode==40 || key.charCode==41 ) return false;
   //      });


		$("#gender").blur(function(){
			console.log($(this).val());
			if($(this).val()==null)
			{	
				gendercheck=false;
				$(this).removeClass("success");
				$(this).addClass("error")	;
				$("#gendererror").text("Please select gender");	

			}
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				$("#gendererror").text("");
				gendercheck=true;	


			}
		});

		$("#DOB").blur(function(){
			if($(this).val()=="")
			{	
				dobcheck=false;
				$(this).removeClass("success");
				$(this).addClass("error")	;
				$("#doberror").text("Please Enter Date of Birth");	

			}
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				$("#doberror").text("");
				dobcheck=true;	

			}
		});

		

		$("#phone").blur(function(){
			if($(this).val()=="")
			{	
				phonecheck=false;
				$(this).removeClass("success");
				$(this).addClass("error");	
				$("#phoneerror").text("Please enter a phone number");	

			}
			else if(!isValidPhone($(this).val())){
				phonecheck=false;
				$(this).removeClass("success");
				$(this).addClass("error");
				$("#phoneerror").text("The phone number format is not valid. Pleas check the number of digits, and only use (,) or -");	

			}
			else
			{
					$(this).removeClass("error");
				$(this).addClass("success");
				$("#phoneerror").text("");
				phonecheck=true;	

			}
		});

		




   

});




function formcheck()
{
//console.log("inside check ");
	if (!emailcheck ||	!passcheck ||	!cpasscheck ||	!fnamecheck ||	!lnamecheck ||	!phonecheck ||	!streetaddcheck ||	!zipcodecheck ||	
            		!bloodgrpcheck ||	!insuranceidcheck ||	!providercheck ||	!dobcheck) 
		{
			//console.log("inside check true");
			$("#patientregister *").trigger("blur");
			// $("#email").trigger("blur");
			return false;}
	else
	{
		//console.log("inside check false");
		return true;
	}

            
}

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
   	
    return pattern.test(emailAddress);
};

function isValidPhone(phone) {
    var pattern = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
    return pattern.test(phone);
};