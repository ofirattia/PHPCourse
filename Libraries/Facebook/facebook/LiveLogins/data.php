<?php
	include '../config.php';
	$connecDB = mysql_connect($hostname, $db_username, $db_password)or die("Unable to connect to MySQL");	
	mysql_select_db($db_name,$connecDB);
	$string="";
	$data = mysql_query("SELECT * FROM usertable");
	while($row = mysql_fetch_assoc($data)){
		$string+=$row['fbid'].",";
	}
	echo $string;


?>