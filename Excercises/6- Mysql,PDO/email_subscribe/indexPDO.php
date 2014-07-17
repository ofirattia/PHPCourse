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
			<label for="action_unsub">unsubscribe</label><br/>
		</fieldset>

		<button type="submit" name="submit" value="submit">Submit</button>
    </form>
	


</body>
</html>
<?php

function showRows(){
global $db;
$db->query("SELECT * FROM subscribers ORDER BY `id`");
		$rows = $db->resultset();
		//print_r($rows);
		echo '<table border="1" style="width:100%">';
		echo '<tr><th>ID</th><th>Email</th></tr>';
		foreach($rows as $value){
			echo '<tr><td>'.$value["id"] .'</td><td> ' .$value["email"].' </td></tr>';
		}
		echo '<tr><td>Rows:</td><td>'.$db->rowCount().'</td></tr>';
		echo '</table>';
		echo "Debuging..<Br>";
		echo $db->debugDumpParams().'<br>';
}
include 'include/db.php';
$db = new Database("db.config.php");
showRows();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	global $db;
	$email = mysql_real_escape_string($_POST['email']);
	if($email==""){
		echo "your email is empty...";
		return;
	}
	$action = $_POST['action'];
	$db->query("SELECT `id` FROM subscribers WHERE `email`=:email");
	$db->bind(':email',$email);
	$validate = $db->single();
	if($validate!="" && $action=="sub")
			{
				echo "Already subscribed..";
				die();
			}

	if($action=="sub"){
		$db->query("INSERT INTO subscribers (`email`) VALUES (:email)");
		$db->bind(':email',$email);
		$row = $db->execute();
		if($row!="")
			echo "Subscribed!";
		else
			echo "Error in subsribing..";
	}
	if($action=="unsub"){
		
		$db->query("DELETE FROM subscribers WHERE `email`=:email");
		$db->bind(':email',$email);
		$row = $db->execute();
		if($row!="")
			echo "Un Subscribed!";
		else
			echo "Error while unsbscribing..";
		
		
	}
	
}

?>