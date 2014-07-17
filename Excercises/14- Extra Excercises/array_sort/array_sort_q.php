<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<title>High Temperatures Array</title>
</head>
 
<body>
<h2>High Temperatures for Spring Month</h2>
 
<?php
//Create an array of 30 Fahrenheit high temperatures for a spring month.
$highTemps = array(
  68, 70, 72, 58, 60, 79, 82, 73, 75, 77, 73, 58, 63, 79, 78, 
  68, 72, 73, 80, 79, 68, 72, 75, 77, 73, 78, 82, 85, 89, 83
);
 
/*
	CALCULATE THE AVERAGE OF THE TEMPS
	Notes: Part of the code is written here.
*/
//Calculate average.
$avg = round($total / $count);
//Send data to the browser. &deg; is the ASCII code for the degree sign.
echo "<p>The average high temperature for the month was $avg &deg;F.</p>\n";
 

//produce descending sort.

/* 1 line code */

$topTemps = /* COMPLETE THE CODE HERE -> Pull out the top five temps. */
echo "<p>The warmest five high temperatures were: <br />\n";
foreach($topTemps as $t){
  echo "$t &deg;F <br/> \n";
}
echo "</p>";
   

$lowTemps = /* COMPLETE THE CODE HERE -> Pull out the bottom five temps. */
echo "<p>The coolest five high temperatures were: <br/>\n";
foreach($lowTemps as $l){
  echo "$l &deg;F <br/> \n";
}
echo "</p>";
 
?>
 
</body>
</html>