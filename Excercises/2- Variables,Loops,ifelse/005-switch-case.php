<?php

/**
 * Switch-case example
 */

$unit = 'ft';
$cmValue = 54;
echo "Unit: ".$unit.'<br>';
echo "cmValue: ".$cmValue.'<br>';
echo "Calculating....<br>";
switch($unit) {
    case 'in':
        $value = $cmValue / 2.54;
        break;

    case 'ft':
        $value = $cmValue / 30.48;
        break;

    case 'm':
        $value = $cmValue / 100;
        break;

    default:
        $value = null;
        echo "Unknown length unit: $unit";
}
echo $value.$unit;
// This is equivalent of:

if ($unit == 'in') {
    $value = $cmValue / 2.54;
} elseif ($unit == 'ft') {
    $value = $cmValue / 30.48;
} elseif ($unit == 'm') {
    $value = $cmValue / 100;
} else {
    $value = null;
    echo "Unknown length unit: $unit";
}
