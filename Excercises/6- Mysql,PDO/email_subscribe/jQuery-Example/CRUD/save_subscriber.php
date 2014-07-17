<?php


$email = $_REQUEST['email'];

include 'conn.php';

$sql = "insert into subscribers(email) values('$email')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>