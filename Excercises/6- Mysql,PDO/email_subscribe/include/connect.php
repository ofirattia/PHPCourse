<?php
	 $server= 'localhost';
	 $user  = 'root';
	 $pass  = '';
	 $db    = 'simplecms'; 

		// creating connection 
		$con = mysql_connect($server, $user, $pass) or die ("Could not connect to server ... \n" . mysql_error ());
		mysql_select_db($db)  or die ("Could not connect to database ... \n" . mysql_error ());
		mysql_query("SET NAMES  utf8;");
		date_default_timezone_set("Asia/Tel_Aviv");
 
 
 
 
?>
