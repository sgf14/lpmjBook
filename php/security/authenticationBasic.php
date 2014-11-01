<?php
    // pg 307- PHP_AUTH displays a basic login popup box.  this is just a basic form
    // see authenticate.php for a tie into a user database and hashing to protect the password
$username = 'admin';
$password = 'letmein';

if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
{
   if ($_SERVER['PHP_AUTH_USER'] == $username && $_SERVER['PHP_AUTH_PW'] == $password)
    echo "you are now logged in";
   else die("Invalid username/password combination");
}
else
{
    header('WWW-Authenticate: Basic Realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
}

?>


