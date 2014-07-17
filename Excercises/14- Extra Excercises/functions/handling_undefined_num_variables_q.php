<?php
//Define checkbox function.
// COMPLETE HERE THE FUNCTION:
// Note:
// The function  handle undefined number of arguments.
function ckBox(){

  $args=//ONE LINE CODE
/*Now loop through the arguments, being sure to use the upper case 
 string function and to include line breaks for clean HTML source. */
  
	/* COMPLETE HERE */
	// Hint: 3 lines code.
}
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<title>Variable Number of Array Arguments</title>
</head>
 
<body>
<h2>How's your weather now?</h2>
 
<?php
//If form not submitted, display form.
if (!isset($_POST['submit'])){
?>
<form method="post" action="handling_undefined_variables_q.php">
<p>Please enter your information:</p>
City: <input type="text" name="city" />
Month: <input type="text" name="month" />
Year: <input type="text" name="year" />
<p>Please choose the kinds of weather you experienced from the list below.<br />
Choose all that apply. </p>
<!--Use your checkbox function here.-->
<?php
  ckBox('sunshine', 'clouds', 'rain', 'hail', 'sleet', 'snow', 'wind', 
  'cold', 'heat');
?>
<p />
<input type="submit" name="submit" value="Go" />
</form>
<?php
//If form submitted, process input.
}else{
//Retrieve the date and location information.
$inputLocal = array(
  $_POST['city'],
  $_POST['month'],
  $_POST['year']
);
echo "In $inputLocal[0] in the month of $inputLocal[1] $inputLocal[2], 
you observed the following weather:<br /> <ul>";
//Be sure you included the upper case string function for your list items.
$weather = $_POST['weather'];
foreach($weather as $w){
  echo "<li>" . ucwords($w) . "</li>\n";  
}
echo "</ul>";
}
?>
 
</body>
</html>