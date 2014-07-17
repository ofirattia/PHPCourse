<?php

// Type Casting Examples
$number = 5.6;
$string = (string) $number;
var_dump($number, $string);

// Casting arrays to strings always returns "Array"
$array = array(1, 2, 3);
var_dump((string) $array);
echo '<br>';
// Casting strings to numbers works as long as it "looks like a number"
$string = "5 days and 4 nights";
var_dump((int) $string); // return int(5) take the first char and try to cast otherwise it will return int(0)
echo '<br>';
$string = "6.66";
var_dump((int) $string);
echo '<br>';
