<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<title>User Input Added to Array</title>
</head>
 
<body>
<h2>How Are You Traveling?</h2>
 
<?php
//If form not submitted, display form.  
if (!isset($_POST['submit'])){
$travel=array(
  "Automobile",
  "Jet",
  "Ferry",
  "Subway"
);
 
?>
 
<p>Travel takes many forms, whether across town, across the country, or
 around the world. Here is a list of some common modes of transportation:</p>
<ul>
 
<?php
foreach ($travel as $t){
  echo "<li>$t</li>\n"; 
}
?>
 
</ul>
<form method="post" action="user_input_to_array_q.php">
<p>Please add your favorite, local, or even imaginary modes of travel 
to the list, separated by commas:</p>
<input type="text" name="added" size="80" />
<p />
 
<?php
//Send current travel array as hidden form data.
foreach ($travel as $t){
  echo "<input type=\"hidden\" name=\"travel[]\" value=\"$t\" />\n";
}
?>
 
<input type="submit" name="submit" value="Go" />
</form>
 
<?php
//If form submitted, process input.
}else{
/*
					COMPELETE THE CODE TO HANDLE USER INPUT
 Next, give the user a text box and ask the user to add other modes of 
 transportation to the list, separated by commas.
 When the user clicks 'Go', process the input with array 
 functions to send back the original list with the user's 
 additions. Include another text box with the text "Add more?" 
 and another submit button. When the user clicks this button,
 the page should reload with the new additions added to the previously 
 expanded list. Your code should allow the user to add items as many times
 as they like.
 
 SOME HELP:
 	Convert user input string into an array -> explode function ( READ PHP DOCS )

*/
 
?>
<p>Add more?</p>
<form method="post" action="user_input_to_array_a.php">
<input type="text" name="added" size="80" />
<p />
<?php
//Send current travel array as hidden form data.
foreach ($travel as $t){
  echo "<input type=\"hidden\" name=\"travel[]\" value=\"$t\" />\n";
}
?>
<input type="submit" name="submit" value="Go" />
</form>
<?php
}
?>
</body>
</html>
