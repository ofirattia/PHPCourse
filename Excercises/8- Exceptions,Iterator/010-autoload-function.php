<?php

/**
 * This is a global autoloader function
 *
 * @param string $class
 */
function __autoload($class)
{
    $filename = strtolower($class) . ".php";
    if (file_exists($filename)) {
        require_once $filename;
    } else {
        return false;
    }
}




$ob = new myClass();

?>
