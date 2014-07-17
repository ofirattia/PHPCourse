<?php
/*
define('MY_CONST','blah') - correct
define(MY_CONST,'blah') - incorrect
*/

// Defining a constant
define("AUTHOR_EMAIL", 'ofir@php.com');
define("ALMOST_PI", 3.14159265);

// Using a constant
$radius = 5;
echo "Circumference: ";
echo $radius * 2 * ALMOST_PI;

// Checking if a constant is defined
if (!defined('APPLICATION_DIR'))
    echo "Error: application root dir not set!";
	
echo '<br>';	
/* Note: Constants can be used for default arguments */
define('CONSTANT','Works!'); 
function test($var=CONSTANT) { 
      echo "Passing constants as default values $var"; 
} 
test("5"); // Passing constants as default values 5
test(); 	//Passing constants as default values Works!
