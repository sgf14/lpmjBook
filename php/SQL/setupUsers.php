<?php
 // pg 309- only run this once; it creates a table; as of 10/29/14 its created, then use authenticate.php file
//get login data
 require_once '..\fileFunctions.php';
 require_once $directory . '\dbLogin.php';

 //connect to db
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error)
    {
        die("Database selection failed: " . $con->connect_error);
    }

//setup query- create table
  $query = "CREATE TABLE users (
    forename VARCHAR(32) NOT NULL,
    surname VARCHAR(32) NOT NULL,
    username VARCHAR(32) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL
  )";
  $result = $con->query($query);
    if (!result) die ($con->error);

$salt1 = "qm&h*";
$salt2 = "pg!@";

//echo "connected to DB: " . DB_NAME;

//add users to table
$forename = 'Bill';
$surname = 'Smith';
$username = 'bsmith';
$password = 'mysecret';
$token = hash('ripemd128' , "$salt1$password$salt2");

add_user($con, $forename, $surname, $username, $token);

$forename = 'Pauline';
$surname = 'Jones';
$username = 'pjones';
$password = 'acrobat';
$token = hash('ripemd128' , "$salt1$password$salt2");

add_user($con, $forename, $surname, $username, $token);

//add users via INSERT
function add_user($con, $fn, $sn, $un, $pw)
{
    $query = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";

    $result = $con->query($query);
        if (!$result) die($con->error);
}
//screen confirmation
echo "table add in " . DB_NAME . " complete.";

$result->close();
$con->close();
  
?>
