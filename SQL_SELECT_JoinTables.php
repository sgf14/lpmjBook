<?php
    //use: Join table records via PHP.  pg 263
    // note the use of sub queries to join two tables, not b]via sql but by two separate queries
    //in php code.  see natural join file as an alternative
require_once 'dbLogin.php';
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);

  $query = "SELECT * FROM customers";
  $result = $con->query($query);
    if (!$result) die ("Database access failed: " . $con->error);

$rows = $result->num_rows;

for ($j = 0 ; $j < $rows ; ++$j)
  {
      $row = mysqli_fetch_row($result);
      echo "$row[1] purchased ISBN $row[0]:<br>";

      $subquery = "SELECT * FROM classics WHERE isbn='$row[0]'";
      $subresult = $con->query($subquery);
        if (!$subresult) die ("Database access failed: " . $con->error);

        $subrow = mysqli_fetch_row($subresult);
        echo "  '$subrow[1]' by $subrow[0]<br>";

  }

//close connection
 $result->close();
 $con->close();
?>


