<?php
/**
		Can you guess what will these output?
		true => 1 logic 
		false => 0 logic
		(int), (integer) - cast to integer
		(bool), (boolean) - cast to boolean
		(float), (double), (real) - cast to float
		(string) - cast to string
		(binary) - cast to binary string (PHP 6)
		(array) - cast to array
		(object) - cast to object
		(unset) - cast to NULL (PHP 5)
**/
define("BREAKLINE","<br>");

echo 5 * "2 rabbits".BREAKLINE; // print 10
echo "three" + 5 .BREAKLINE; //print 5
echo 6 - true .BREAKLINE;	// print 5 
echo 7 / false .BREAKLINE;	// ERROR

$foo = "0";  // $foo is string (ASCII 48)
$foo += 2;   // $foo is now an integer (2)
$foo = $foo + 1.3;  // $foo is now a float (3.3)
$foo = 5 + "10 Little Piggies"; // $foo is integer (15)
$foo = 5 + "10 Small Pigs";     // $foo is integer (15)

$foo = 10;   // $foo is an integer
$bar = (boolean) $foo;   // $bar is a boolean , value = 1

/*Instead of casting a variable to a string, it is also possible to enclose the variable in double quotes.*/
$foo = 10;            // $foo is an integer
$str = "$foo";        // $str is a string
$fst = (string) $foo; // $fst is also a string

// This prints out that "they are the same"
if ($fst === $str) {
    echo "they are the same";
}

