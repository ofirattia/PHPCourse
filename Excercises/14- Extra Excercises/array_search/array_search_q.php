<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<title>Associative Array - Cities</title>
</head>
 
<body>
<h2>Large Cities Again<br /></h2>
 
<?php
  //Create associative array with countries as keys, cities as values.
  $cities=array(
    "Japan" => "Tokyo",
    "Mexico" => "Mexico City",
    "USA" => "New York City",
    "India" => "Mumbai",
    "Korea" => "Seoul",
    "China" => "Shanghai",
    "Nigeria" => "Lagos",
    "Argentina" => "Buenos Aires",
    "Egypt" => "Cairo",
    "UK" => "London"
  );
  //If form not submitted, display form.
  if(!isset($_POST['submit'])){
?>
   
<form method="post" action="array_search_a.php">
<p>Please choose a city:</p>
<select name="city">
 
<?php
  //Use array to create options for select field.
  //Be sure to escape the quotes and include a line feed. 
  foreach($cities as $c){
    echo "<option value=\"$c\">$c</option>\n";
  }
?>
 
</select> <p />
<input type="submit" name="submit" value="Go">
</form>
 
<?php
  //If form submitted, process input.
  }else{
     
	 // COMPLETE YOUR CODE HERE
   
  }
?>
 
</body>
</html>