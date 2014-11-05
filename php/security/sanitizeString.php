<?php
$orig = "\\<form>hi</form>";
$san = sanitizeString($orig);
echo "orig: " . $orig . " sanitized: " .$san;

function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = strip_tags($var);
    //Need to have entities at the end or strip tags doesnt work- need to research more
    $var = htmlspecialchars($var);
    return $var;
}

//this wont work w/o carrying in the db connection
function sanitizeMySQL($con, $var)
{
    // uses MySQLi extension, $con is the database connection from the host file
    $var = $con->real_escape_string($var);
    $var = sanitizeString($var);
    return $var;
}
?>


