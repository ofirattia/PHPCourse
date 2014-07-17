<?php 
session_start(); 

/*
check our post variable from index.php, just to insure user isn't accessing this page directly.
You can replace this with strong function, something like HTTP_REFERER
*/
if(isset($_POST["connect"]) && $_POST["connect"]==1)
{ 		
	include_once("config.php"); //Include configuration file.
	
	//Call Facebook API
	if (!class_exists('FacebookApiException')) {
	require_once('inc/facebook.php' );
	}
		$facebook = new Facebook(array(
		'appId' => $appId,
		'secret' => $appSecret,
	));
	
	$fbuser = $facebook->getUser();
	if ($fbuser) {
		try {
			// Proceed knowing you have a logged in user who's authenticated.
			$me = $facebook->api('/me'); //user
			$uid = $facebook->getUser();
		}
		catch (FacebookApiException $e) 
		{
			//echo error_log($e);
			$fbuser = null;
		}
	}
	
	// redirect user to facebook login page if empty data or fresh login requires
	if (!$fbuser){
		$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$return_url, false));
		header('Location: '.$loginUrl);
	}
	
	//user details
	$fullname = $me['first_name'].' '.$me['last_name'];
	$email = $me['email'];

	/* connect to mysql */
	$connecDB = mysql_connect($hostname, $db_username, $db_password)or die("Unable to connect to MySQL");	
	mysql_select_db($db_name,$connecDB);
	
	//Check user id in our database
	$result = mysql_query("SELECT COUNT(id) FROM usertable WHERE fbid=$uid");	
	$UserCount = mysql_fetch_array($result); 
	
	if($UserCount[0])
	{	
		//User exist, Show welcome back message
		echo 'Ajax Response :<br /><strong>Welcome back '. $me['first_name'] . ' '. $me['last_name'].'!</strong> ( Facebook ID : '.$uid.') [<a href="'.$return_url.'?logout=1">Log Out</a>]';
		
		//print user facebook data
		echo '<pre>';
		print_r($me);
		echo '</pre>';

		//User is now connected, log him in
		login_user(true,$me['first_name'].' '.$me['last_name'],$uid);
	}
	else
	{
		//User is new, Show connected message and store info in our Database
		echo 'Ajax Response :<br />Hi '. $me['first_name'] . ' '. $me['last_name'].' ('.$uid.')! <br /> Now that you are logged in to Facebook using jQuery Ajax [<a href="'.$return_url.'?logout=1">Log Out</a>].
		<br />the information can be stored in database <br />';
		//print user facebook data
		echo '<pre>';
		print_r($me);
		echo '</pre>';
		// Insert user into Database.
		@mysql_query("INSERT INTO usertable (fbid, fullname, email) VALUES ($uid, '$fullname','$email')");
		
		//User is now connected, log him in
		login_user(true,$me['first_name'].' '.$me['last_name'],$uid);
	}
	
	mysql_close($connecDB);
}

function login_user($loggedin,$user_name,$uid)
{
	/*
	function stores some session variables to imitate user login. 
	We will use these session variables to keep user logged in, until s/he clicks log-out link.
	If you are using some authentication library, login user with it instead.
	*/
	$_SESSION['logged_in']=$loggedin;
	$_SESSION['user_name']=$user_name;
	$_SESSION['uid']=$uid;
}
?>