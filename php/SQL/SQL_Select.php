<?php
    //use: basic select via PHP.  Chap 10, pg 258
    // 
// old version- if dblogin was one folder up
// require_once '../dbLogin.php';

//get login data
 require_once '..\fileFunctions.php';
 require_once $directory . '\dbLogin.php';

 // connect to db
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);

  $tableName = 'cats';

  $query = "SELECT * FROM " . $tableName;
  $result = $con->query($query);
    if (!result) die ("Database access failed: " . $con->error);

  $rows = $result->num_rows;
  $columns = mysqli_num_fields($result);

  //browser display section
  echo "connected to DB: " . DB_NAME . ", Table " . $tableName . " w/ " . $rows . " records.<br>";
  //echo $columns . "<br>";
  echo "<table><tr><th>ID</th><th>Family</th><th>Name</th><th>Age</th></tr>";
   for ($j = 0 ; $j < $rows ; ++$j)
  {
      $result->data_seek($j);
      // note- in this method you need to use _NUM, not _ASSOC, since $k is column number based
      $row = $result->fetch_array(MYSQLI_NUM);
      echo "<tr>";
//note this was manually fixed at 4 columns in book, refactored w/ help of W3C schools website- PHP/mySQLi section
        for ($k = 0 ; $k < $columns ; ++$k) 
          echo "<td>$row[$k]</td>";
      echo "</tr>";
  }
  echo "</table>";

//close connection
 $result->close();
 $con->close();
?>


