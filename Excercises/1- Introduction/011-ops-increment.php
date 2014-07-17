<?php
define ("BREAKLINE",'<br>');
// Increment / Decrement Operators

$a = 1;

// post-increment
$a++; // $a is now 2
$a--; // $a is now 1

// pre-increment
++$a; // $a is now 2
--$a; // $a is now 1
echo ($a++); // print 1 and increment -> 2
echo BREAKLINE;
echo ($a--); // print 2 and decrement -> 1 
echo BREAKLINE;
echo ($a++); // print 1 and increment -> 2
echo BREAKLINE;
// Can you guess?
$pi = 3.14;
var_dump($pi++);
echo BREAKLINE;
var_dump($pi++);
echo BREAKLINE;
var_dump($pi);
/******************************************
Arithmetic Operations on Character Variables
*******************************************/
echo '<br>';
echo '== Alphabets ==' . BREAKLINE;
$s = 'W';
for ($n=0; $n<7; $n++) {
    echo ++$s . BREAKLINE;
}
// Digit characters behave differently
echo '== Digits ==' . BREAKLINE;
$d = 'A8';
for ($n=0; $n<6; $n++) {
    echo ++$d . BREAKLINE;
}
$d = 'A08';
for ($n=0; $n<6; $n++) {
    echo ++$d . BREAKLINE;
}
/*
Notes: 
	++,-- : pre increment/decrement is faster then  post increment/decrement
*/