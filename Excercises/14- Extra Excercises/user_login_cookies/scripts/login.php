<?php
include 'functions.php';  //include the functions.php - very important
 
if ($_POST['login']) //check if the submit button is pressed
{
	//get data
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(isset($_POST['remmber'])){
		$remember = $_POST['remember'];
	}else{
		$remmber="";
	}
 
if ($username && $password) //check if the field username and password have values
{
$login = mysql_query("SELECT * FROM users WHERE username='$username'"); //select from the table users on the database, where the username is equal to the username on the table users.
 
if (mysql_num_rows($login)) 
    {
while ($row = mysql_fetch_assoc($login)) // this method will prevent SQL Injections. This will gather the password on the same row as the username.
	    { 
			$db_password = $row['password']; //this will store that password on a variable
			if ($password==$db_password) {   //this will check if the password inputted by the user is the same as the one stored on the database.
				$loginok = TRUE;
			} else {
				header("Location: ../index.php?failed=1");
				exit();
			}
			 
			if ($loginok==TRUE) //if it is the same password, script will continue.
				{
					if ($remember == "yes") //if the Remember me is checked, it will create a cookie.
						{
							setcookie("username", $username, time()+7600, "/", ".ofirattia.com"); //here we are setting a cookie named username, with the Username on the database that will last 48 hours .
							 
							header("Location: ../user-loggedin.php");
							exit();
						}
					else if ($remember=="") //if the Remember me isn't checked, it will create a session.
						{
							$_SESSION['username']=$username;
							 
							header("Location: ../user-loggedin.php");
							exit();
						}
				}
	    }
	} else {
			header("Location: ../index.php?failed=1");
	}
}
else
	die("Please enter a username and password");
}
 
?>