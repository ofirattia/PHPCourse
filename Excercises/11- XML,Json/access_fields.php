<?php
$xml=simplexml_load_file("file.xml");
foreach($xml as $note=>$contents){
	echo "***********************".$note."***********************<br>";
	echo $contents->to . "<br>";
	echo $contents->from . "<br>";
	echo $contents->heading . "<br>";
	echo $contents->body."<br>";
}
?>