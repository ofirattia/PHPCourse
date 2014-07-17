<?php
session_start(); //start session
 
//destroy session
session_destroy();
 
//unset cookies
setcookie("username", $username, time()-7600, "/", ".ofirattia.com");
 
header ("Location: ../index.php");
?>