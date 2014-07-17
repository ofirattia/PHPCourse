<?php

// Break example
$values = array('a', 'b', 'c', 'f', 'g', 'h', 'k', 'd');
$search = 'g';

$match = null;
foreach($values as $index => $value) {
    if ($value == $search) {
        $match = $index;
        break;
    }
}

if ($match) {
    echo "The value was matched at index $match";
}

// Continue example
// Assume is_prime_number() exists...
for ($i = 1; $i < 1000; $i++) {
    if ($i%2==0) continue;
    echo "Found odd number: $i<br>";
}