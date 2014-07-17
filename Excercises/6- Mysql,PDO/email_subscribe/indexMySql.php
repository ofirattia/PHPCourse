<html>
	<head>
	
	
	</head>
<body>


    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

		<p><label for="email">Your E-Mail Address:</label><br/>
		<input type="email" id="email" name="email" size="40" maxlength="150" /></p>

		<fieldset>
			<legend>Action:</legend><br/>
			<input type="radio" id="action_sub" name="action" value="sub" checked />
			<label for="action_sub">subscribe</label><br/>
			<input type="radio" id="action_unsub" name="action" value="unsub" />
			<label for="action_unsub">unsubscribe</label>
		</fieldset>

		<button type="submit" name="submit" value="submit">Submit</button>
    </form>
	


</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include 'include/connect.php';
	$email = mysql_real_escape_string($_POST['email']);
	$action = $_POST['action'];

	$validate = (mysql_fetch_assoc(mysql_query("SELECT `id` FROM subscribers WHERE `email`='".$email."'")));
	if($validate!="" && $action=="sub")
			{
				echo "Already subscribed..";
				die();
			}

	if($action=="sub"){
		mysql_query("INSERT INTO subscribers SET `email`='$email'");
		echo "Subscribed!";
	}
	if($action=="unsub"){
		mysql_query("DELETE FROM subscribers WHERE `email`='$email'");
		echo "Un Subscribed!";

	}
}

?>