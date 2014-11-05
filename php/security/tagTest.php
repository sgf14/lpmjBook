<?php
//test different string methods to prevent html and sql injection by hackers
$test = '<b>string</b>';

$san = sanitizeString($test);
echo "orig: " . $test . " sanitized: " .$san;

function sanitizeString($var)
{
    //$var = stripslashes($var);
    //$var = strip_tags($var);
    //Need to have entities at the end or strip tags doesnt work- need to research more
    $var = htmlentities($var);
    return $var;
}
?>

