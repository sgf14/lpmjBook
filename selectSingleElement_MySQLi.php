<?php
    // use: select a single column of data from db

require_once 'dbLogin.php';
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);
  
  $query = "SELECT * FROM classics";
  $result = $con->query($query);
    if (!result) die ($con->error);

  $rows = $result->num_rows;
echo 'connected ' . DB_NAME . ' ' . $rows . '<br>';
  for ($j = 0 ; $j < $rows ; ++$j)
  {
      $result->data_seek($j);
      $row = $result->fetch_assoc();
      echo "Author: " . $row['author'] . "<br>";
  }

  $result->close();
  $con->close();
?>


