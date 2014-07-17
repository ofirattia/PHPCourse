<?php

// Creating an indexed array
$colors = array('red', 'blue', 'green', 'purple');

// Accessing an item in an array
echo $colors[1]; // What will this print?

// Setting a value of an array item
$colors[4] = 'white';

// Appending an item to an array
$colors[] = 'magenta';

// Creating an associative array
$countryCodes = array('iq' => 'Iraq',
                      'ir' => 'Iran',
                      'il' => 'Israel');

echo $countryCodes['il'];

// Multi-dimensional arrays
$board = array(
    array('X', ' ', 'O'),
    array('O', 'X', ' '),
    array('O', ' ', 'X')
);

// Accessing a multi-dimensional array item
var_dump($board[1]); // an array of 3 items
var_dump($board[1][0]); // the string 'O'


/** Difference between var_dump and print_r
The var_dump function displays structured information about variables/expressions including its type and value. Arrays are explored recursively with values indented to show structure. It also shows which array values and object properties are references.

The print_r() displays information about a variable in a way that's readable by humans. array values will be presented in a format that shows keys and elements. Similar notation is used for objects.
**/
