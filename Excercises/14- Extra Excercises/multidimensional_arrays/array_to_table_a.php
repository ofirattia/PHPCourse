<?php
//Two dimensional associative array.
$multiCity=array(
    array('City'=>'Tokyo', 
          'Country'=>'Japan', 
          'Continent'=>'Asia'),
    array('City'=>'Mexico City',
          'Country'=>'Mexico', 
          'Continent'=>'North America'),
    array('City'=>'New York City', 
          'Country'=>'USA', 
          'Continent'=>'North America'),
    array('City'=>'Mumbai', 
          'Country'=>'India', 
          'Continent'=>'Asia'),
    array('City'=>'Seoul', 
          'Country'=>'Korea', 
          'Continent'=>'Asia'),
    array('City'=>'Shanghai', 
          'Country'=>'China', 
          'Continent'=>'Asia'),
    array('City'=>'Lagos', 
          'Country'=>'Nigeria', 
          'Continent'=>'Africa'),
    array('City'=>'Buenos Aires', 
          'Country'=>'Argentina', 
          'Continent'=>'South America'),
    array('City'=>'Cairo', 
          'Country'=>'Egypt', 
          'Continent'=>'Africa'),
    array('City'=>'London', 
          'Country'=>'UK',
          'Continent'=>'Europe')
);
?>
 
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<title>Multi-dimensional Array</title>
<style type="text/css">
td, th {width: 8em; border: 1px solid black; padding-left: 4px;}
th {text-align:center;}
table {border-collapse: collapse; border: 1px solid black;}
</style>
</head>
<body>
<h2>City Table<br /></h2>
 
<table>
<thead>
<tr>
 
<?php
//This time, use foreach to iterate over the keys.
foreach ($multiCity[0] as $key=>$value){
  echo "<th>$key</th>\n";
}
?>
 
</tr>
</thead>
 
<?php
//Get the number of rows.
$num = count($multiCity); 
//Now the counter must start at "0". That's the only change this loop needs 
//to accommodate the changed array.
for ($row=0; $row<$num; $row++){
  echo "<tr>\n";
  foreach ($multiCity[$row] as $value){
    echo "<td>$value</td>\n";
    }
   echo "</tr>\n";  
}
?>
 
</table>
 
</body>
</html>