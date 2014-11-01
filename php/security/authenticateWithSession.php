<?php
// use: Sessions allow the server to track a user after login
// Chap 13, pg 312- this is just the autheniticate.php with added session info; this file also requires
// continue.php file

//get login data
 require_once '..\fileFunctions.php';
 require_once $directory . '\dbLogin.php';

 //connect to db
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error)
    {
        die("Database selection failed: " . $con->connect_error);
    }
//basic login popup
if (isset($_SERVER['PHP_AUTH_USER']) &&  isset($_SERVER['PHP_AUTH_PW']))
{
//runs through filter to prevent sql injection- see called functions at bottom
    $un_temp = mysql_entities_fix_string($con, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysql_entities_fix_string($con, $_SERVER['PHP_AUTH_PW']);

//sets up query, there will only be one record because usernames are unique
    $query = "SELECT * FROM users WHERE username='$un_temp'";
    $result = $con->query($query);
    if (!$result) die($con->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

        $result->close();

//password security/hashing
        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");
//session info added, pg 313
        if ($token == $row[3]) 
        {
          session_start();
          $_SESSION['username'] = $un_temp;
          $_SESSION['password'] = $pw_temp;
          $_SESSION['forename'] = $row[0];
          $_SESSION['surname'] = $row[1];
          echo "$row[0] $row[1] : Hi $row[0], you are now logged in as '$row[2]'";
          die ("<p><a href=continue.php>Click here to continue</a></p>");
        }
        else die("Invalid username/password combination");
        
    }
    else die("Invalid username/password combination");
}
else
{
//populates header inf on login popup
    header('WWW-Authenticate: Basic Realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Please enter your username and password");
}

$con->close();

// preventing sql injections, this is the structure in the book, for DRY coding process would normally pull
// these out into a separate file and call it via require() from the file that needs it
function mysql_entities_fix_string($con, $string)
{
    return htmlentities(mysql_fix_string($con, $string));
}

function mysql_fix_string($con, $string)
{
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $con->real_escape_string($string);
}
?>

