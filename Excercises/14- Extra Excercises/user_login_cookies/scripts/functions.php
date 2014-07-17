<?php
session_start(); //start session
 
include __DIR__ . '/config.php'; //include the config.php file
 
// connect to data base
$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if(!$link) {
die('Failed to connect to the Server: ' . mysql_error());
}
 
//Select database
$db = mysql_select_db(DB_DATABASE);
if(!$db) {
die("Unable to choose the Database");
}
 
//login chech function
function loggedin()
{
	if (isset($_SESSION['username']) || isset($_COOKIE['username']))
	{
		$loggedin = TRUE;
		return $loggedin;
	}
}
?>