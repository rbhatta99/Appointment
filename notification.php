<?php
	// require "dbconnect.php";
	function send_notification($user,$receiver,$notif_type)
	{		
		//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
		// $conn=mysqli_connect("localhost","root","root")or die("can not connect");
	    // mysqli_select_db("healthcare",$conn) or die("can not select database");
		
		$result1 = mysqli_query($conn, "SELECT MAX(notif_no) FROM notification_system");
		$notif_no = mysqli_fetch_array($result1);
		$notif_no[0] = $notif_no[0] + 1;
		$query = "INSERT INTO notification_system (notif_no, sender, receiver, notif_type)
				VALUES ('{$notif_no[0]}', '{$user}', '{$receiver}', '{$notif_type}')";
		$result = mysqli_query($conn,$query);
		mysqli_close($conn);
	}

	function display_notification($user){
		
		//$conn = pg_connect('host=localhost dbname=healthcare user=postgres password=user');
		
		// $conn=mysqli_connect("localhost","root","root")or die("can not connect");
	    // mysqli_select_db("healthcare",$conn) or die("can not select database");

		echo "<div class = 'notification'>";
		echo "<table class = 'notif_table'>";
		
		$result1 = mysqli_query($conn,"SELECT count(notif_no) FROM notification_system");
		$counter = mysqli_fetch_array($result1);
		
		$result1 = mysqli_query($conn,"SELECT sender FROM notification_system");
		$result2 = mysqli_query($conn,"SELECT notif_type FROM notification_system");
		$result3 = mysqli_query($conn,"SELECT receiver FROM notification_system");
			
		//$sender = mysqli_fetch_array($result1);
		//$type = mysqli_fetch_array($result2);
		//$receiver = mysqli_fetch_array($result3);
		
		echo $counter[0]."--";
		echo $user;
		
		//---------------------------Reciever fetch------
		$receiver=array();
        $j=0;
		while( $row= mysqli_fetch_array($result3)) 
		{
		echo $row['receiver']."--";
		$receiver[$j]=$row['receiver'];
		$j++;
	    }	
		echo "reciever count:".count($receiver);
		
	   //---------------------------Type fetch------
	    $type=array();
        $j=0;
		while( $row= mysqli_fetch_array($result2)) 
		{
		echo $row['notif_type']."--";
		$type[$j]=$row['notif_type'];
		$j++;
	    }	
		echo "Type count:".count($type);
		
		//---------------------------Sender fetch------
	    $sender=array();
        $j=0;
		while( $row= mysqli_fetch_array($result1)) 
		{
		echo $row['sender']."--";
		$sender[$j]=$row['sender'];
		$j++;
	    }	
		echo "Send count:".count($sender);
		
		//echo $user;
		//echo $receiver[1];
		//echo $type[1];
		
		
		
		
		//------------------------------------------------
		for($i=0; $i<$counter[0]; $i++){			
			if($receiver[$i] == $user){
						
			if($type[$i] == 1){
					echo "<tr><td>";
					echo $sender[$i]. " has requested an appointment with you.";
					echo "</td></tr>";
				}
				else if($type[$i] == 2){
					echo "<tr><td>";
					echo $sender[$i]. " has canceled your approved appointment.";
					echo "</td></tr>";
				}
				else if ($type[$i] == 3){
					echo "<tr><td>";
					echo $sender[$i]. " has accepted your appointment request.";
					echo "</td></tr>";
				}
				else if ($type[$i] == 4){
					echo "<tr><td>";
					echo $sender[$i]. " has canceled a pending appointment request.";
					echo "</td></tr>";
				}
			}
		}
		
		echo "</table>";
		echo "</div>";

		mysqli_close($conn);
	}
?>