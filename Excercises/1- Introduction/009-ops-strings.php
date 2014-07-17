<?php
define("BREAKLINE","<br>");
// The Concatenation Operator

$foo = "Hello";
$bar = "World";
echo $foo . ", " . $bar;
echo BREAKLINE;
// Other types are juggled to string
$count = 5;
var_dump("You are number " . $count);