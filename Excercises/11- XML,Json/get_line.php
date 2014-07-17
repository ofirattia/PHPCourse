<?php
define("BREAKLINE","<br>");
include 'xml_example.php';

$movies = new SimpleXMLElement($xmlstr);

echo $movies->movie[1]->plot .BREAKLINE;


echo $movies->movie->{'great-lines'}->line .BREAKLINE;
?>