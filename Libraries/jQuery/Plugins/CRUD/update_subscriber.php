<?php

$id = intval($_REQUEST['id']);

$email = $_REQUEST['email'];

include 'conn.php';

$sql = "update subscribers set email='$email' where id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>