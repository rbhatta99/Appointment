<?php

$conn=mysql_connect("localhost","root","root")or die("can not connect");
mysql_select_db("healthcare",$conn) or die("can not select database");
	
if(empty($_POST))
{
exit;
}	

$id=$_POST['userid'];
echo $id;


$pname=$_POST['pname'];
echo $pname;

$dname=$_POST['dname'];
echo $dname;

$sickness=$_POST['sickness'];
echo $sickness;

$bdate=$_POST['bdate'];	
echo $bdate;

$report=$_POST['report'];
echo $report;

	
?>	