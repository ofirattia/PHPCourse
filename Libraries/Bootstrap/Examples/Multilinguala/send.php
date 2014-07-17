<?php
session_start();
include('local/'.$_SESSION['lng'] . '.php'); // include lang file

// require name

		$name = trim($_POST['contactName']);
	
	
// check if mail is valid

		$email = trim($_POST['email']);

		
// message required

		$comments = trim($_POST['comments']);

		
//send the mail if there is no errors
		
		$emailTo = 'YOUR MAIL';
		$subject = $messageFrom.' - '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: ' .' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		if(mail($emailTo, $subject, $body, $headers))
				echo '1';
		else
				echo '0';
?>