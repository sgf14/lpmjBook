<?php
    //use: Create a table via PHP.  pg 256
    // 
require_once '../dbLogin.php';
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);
//can use SHOW stmt to display a variety of info including Databases, used if for Tables within the databases here
  $query = "SHOW TABLES";

  $result = $con->query($query);
    if (!result) die ("Database access failed: " . $con->error);

//the webpage display part
  $rows =  $result->num_rows;
echo "connected to DB '" . DB_NAME . "' w/ " . $rows . " tables<br>";
echo "<table><tr><th>Table Name</th></tr>";

  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j)
  {
      $result->data_seek($j);
      // note- in this method you need to use _NUM, not _ASSOC, since $k is column number based
      $row = $result->fetch_array(MYSQLI_NUM);
      echo "<tr>";
        for ($k = 0 ; $k < 1 ; ++$k) 
          echo "<td>$row[$k]</td>";
      echo "</tr>";
  }
  echo "</table>";

//close connection
 $result->close();
 $con->close();
?>


