<?php

/**
 * Using the error silencing operator
 error handler can (and should) call error_reporting() which will 
 return 0 when the call that triggered 
 the error was preceded by an @.
 */

$filename = "non-existing-file.txt";

if (! ($data = @file_get_contents($filename))) {
    echo "Error reading data from file: $filename\n";
    exit(1);

} else {
    echo $data;
}