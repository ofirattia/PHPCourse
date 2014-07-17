<?php


$server= '10.0.0.1';
$user  = 'root';
$pass  = '';
$db    = 'autocomplete'; 


// creating connection 
$con = mysql_connect($server, $user, $pass) or die ("Could not connect to server ... \n" . mysql_error ());

// select the database
mysql_select_db($db)  or die ("Could not connect to database ... \n" . mysql_error ());

// encode the characters
mysql_query("SET NAMES  utf8;");
 
 
 
 
?>