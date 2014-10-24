<?php
    //use: describing a table via SQL, note html tags for display.  pg 256
    // 
require_once '../dbLogin.php';
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);

  $query = "DESCRIBE cats";
  //These are all equivalent SQL statements
  //$query = "DESC cats";
  //$query = "EXPLAIN cats";
  //$query = "SHOW COLUMNS FROM cats";
  //$query = "SHOW FIELDS FROM cats";
  

  $result = $con->query($query);
    if (!result) die ("Database access failed: " . $con->error);

  $rows =  $result->num_rows;
echo "connected " . DB_NAME . " " . $rows . "<br>";
echo "<table><tr><th>Column</th><th>Type</th><th>Null</th><th>Key</th></tr>";

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j)
  {
      $result->data_seek($j);
      // note- in this method you need to use _NUM, not _ASSOC, since $k is column number based
      $row = $result->fetch_array(MYSQLI_NUM);
      echo "<tr>";
        for ($k = 0 ; $k < 4 ; ++$k) 
          echo "<td>$row[$k]</td>";
      echo "</tr>";
  }
  echo "</table>";

  $result->close();
  $con->close();
?>


