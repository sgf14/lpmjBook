<?php
    // use: select multiple columns from db
//DB SELECT stmt from W3C schools- PHP Select example.  results are similar to 'fetchRowMySQLi.php' file
// uses while stmt instead of for loop

// get login data
require_once '..\fileFunctions.php';
require_once $directory . '\dbLogin.php';

//connect to DB
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error)
    {
        die("Database selection failed: " . $con->connect_error);
    }

// kept this part from W3C website - diff error checking than lpmj book; see website PHP/MySQLi for def of methods
//$con=mysqli_connect("example.com","peter","abc123","my_db");
// Check connection
//if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}

$result = mysqli_query($con,"SELECT * FROM classics");

while($row = mysqli_fetch_array($result)) {
  echo "Author: " . $row['author'] . "; Title: " . $row['title'];
  echo "<br>";
}
// closes the query after your done,  good idea to close immediately after you are done, esp as db grows 
//larger or more actively used, see pg 273
$result->close();
//closes the db connection when your done
$con->close();
//this is an equivalent db close stmt, from WC3 website
//mysqli_close($con);
?>


