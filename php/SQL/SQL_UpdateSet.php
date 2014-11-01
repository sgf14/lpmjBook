<?php
    //use: UPDATE existing record within a table via PHP.  Chap 10, pg 259
    // 

// old version- if dblogin was one folder up
// require_once '../dbLogin.php';

//get login data
 require_once '..\fileFunctions.php';
 require_once $directory . '\dbLogin.php';

 // connect to db
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);

$tableName = "cats";
  $query = "UPDATE " . $tableName . " SET name = 'Charlie' WHERE name = 'Charly'";

  $result = $con->query($query);
    if (!result) die ("Database access failed: " . $con->error);

//run SQL_Select.php to see results via browser, or just DB/refresh below
//use SQL_Insert.php to add test records

//close connection
 $result->close();
 $con->close();
?>

