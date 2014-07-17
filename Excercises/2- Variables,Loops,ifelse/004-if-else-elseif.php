<?php
define("BREAKLINE",'<br>');
/**
 * Example of using if-else-elseif
 */

$a = "This is a string";
$b = 0;

// If / else blocks
if ($a || $b) {
    echo "This part runs".BREAKLINE;
} else {
    echo "This part does not run".BREAKLINE;
}

// Using elseif
if ($a) {
    echo '$a is true, $b may be true or false'.BREAKLINE;
} elseif ($b) {
    echo '$b is true but $a is false'.BREAKLINE;
} else {
    echo 'neither $a nor $b are true'.BREAKLINE;
}

$condition = false;

// One liners (use with care!)
if ($condition)
    echo "This part runs sometimes".BREAKLINE;
    echo "This part runs always".BREAKLINE;
