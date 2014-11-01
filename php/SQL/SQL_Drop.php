<?php
// BE CAREFUL WITH THIS- while possible- like any other SQL stmt via PHP usually this is NOT something
// you almost never want to do in webpages, its only here to demonstrate the feature is possible.
//  use DROP stmt to remove Databases and Tables, use TRUNCATE to remove all data from a table
// can create disposable tables to test via SQL_CreateTable.php       

// old version- if dblogin was one folder up
// require_once '../dbLogin.php';

//get login data
 require_once '..\fileFunctions.php';
 require_once $directory . '\dbLogin.php';

 // connect to db
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);

   
  $tableName = "cats1";
  $query = "DROP TABLE " . $tableName;

  $result = $con->query($query);
    if (!result) die ("Database access failed: " . $con->error);

echo "Dropped table " . $tableName . " from DB '" . DB_NAME . "'";
//Run SQL_Show Tables to see reults

 $result->close();
 $con->close();
?>

