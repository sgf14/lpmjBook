<?php
    //use: Delete a record from a table via PHP, opposite of Insert.  Chap 10, pg 256
    // see SQL_Insert_DeleteRecord.php also

// old version- if dblogin was one folder up
// require_once '../dbLogin.php';

//get login data
 require_once '..\fileFunctions.php';
 require_once $directory . '\dbLogin.php';

 // connect to db
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);

  $query = "DELETE FROM cats WHERE name = 'Test'";

  $result = $con->query($query);
    if (!result) die ("Database access failed: " . $con->error);

//Use SQL_Select.php to see before/after and SQL_Insert.php to add test records

//close connection
 $result->close();
 $con->close();
?>

