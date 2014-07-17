<?php
include('../include/connect.php');
if($_POST)
{
	$q=mysql_real_escape_string($_POST['s']);
	
	$result=mysql_query("SELECT name,family FROM customers WHERE name like '%$q%' or family like '%$q%' Order By id LIMIT 8");
		while($row=mysql_fetch_array($result))
		{
			echo '<div id="row">'.$row['name'].' '.$row['family'].'</div>';
		}
}
?>