 <?php 
require "dbconnect.php";
?>
<html>
	<head>
		<title>Edit Doctor's Username</title>
	</head>
	<body>
		<?php
			// session_start();
			
			$username=$_SESSION["username"];
			
			echo"
				<form action='process_editDoctor_uname.php' method='post'>
				<table>
				<tr>
					<td> Current Username: </td>
					<td> <input type='text' name='oldusername' value='$username' required='required'> </td>
				</tr>
				<tr>
					<td> New Username: </td>
					<td> <input type='text' name='newusername' value='' required='required'> </td>
				</tr>
				</table>
				<input type='submit' name='submit'/>
				</form>
			";
		?>
	</body>
</html>