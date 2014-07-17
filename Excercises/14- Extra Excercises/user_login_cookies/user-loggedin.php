<?php
include 'scripts/functions.php'; //include function.php - very important
 
if (!loggedin()) // check if the user is logged in, but if it isn't, it will redirect to the Login Form page. Noticed the difference?
{
header ("Location: ". __DIR__ ."index.php");
exit();
}
?>
<!-- END NEW CODE -->
 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Logged In</title>
</head>
<body>
<!-- NEW CODE -->
<div>Welcome - <?php if (isset($_SESSION['username'])){ echo $_SESSION['username'];}else if (isset($_COOKIE['username'])){ echo $_COOKIE['username'];}?></div> //here we added a little code that will show the Username on the screen.
<div><a href="scripts/logout.php">LOG OUT</a></div> //this is the Logout Button.
<!-- END NEW CODE -->
</body>
</html>