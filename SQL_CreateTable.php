<?php
    //use: Create a table via PHP.  pg 256
    // 
require_once 'dbLogin.php';
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);
  
  $tableName = "customers";

  $query = "CREATE TABLE " . $tableName . " (
    isbn INT(11) NOT NULL,
    name VARCHAR(128) NOT NULL,
    PRIMARY KEY (isbn)
  )ENGINE MyISAM";

  $result = $con->query($query);
    if (!result) die ("Database access failed: " . $con->error);

// screen report since in this file nothing happens in the browser otherwise
echo "table " .  $tableName . " created in " . DB_NAME;


 $result->close();
 $con->close();
?>


