<?php
    //use: Join table records via PHP.  pg 263
    // this natural join is another version of Join tables  file, it just doesnt have subquery
    // the results array[column number] is used to drive the display, the natual join ensures the join is 
    //based on the isbn column, becuase that is the common column name between the tables
    // oyu can test this by chaning the [] values to see how the display changes
require_once '..\dbLogin.php';
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);

  $query = "SELECT name,isbn,title,author FROM customers NATURAL JOIN classics";
  //$query = "SELECT * FROM customers";
  $result = $con->query($query);
    if (!$result) die ("Database access failed: " . $con->error);

$rows = $result->num_rows;

for ($j = 0 ; $j < $rows ; ++$j)
  {
      $row = mysqli_fetch_row($result);
      echo "$row[0] purchased ISBN $row[1]:<br>";
     echo "  $row[2] by $row[3]<br>";
  }

//close connection
 $result->close();
 $con->close();
?>


