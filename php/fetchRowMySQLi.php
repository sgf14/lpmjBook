<?php
    // select statment using for loop see pg 272 of book.  see W3C wesite- PHP/mySQLi section for
    //other methods, or while file to left
    //on the require once the ..\ portion goes up one folder level \[folderName]\file.php goes down a folder level 
 require_once '..\dbLogin.php';
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error)
    {
        die("Database selection failed: " . $con->connect_error);
    }

  $query = "SELECT * FROM classics";
  $result = $con->query($query);
    if (!result) die ($con->error);

  $rows = $result->num_rows;
echo 'connected ' . DB_NAME . ' ' . $rows . '<br>';
  for ($j = 0 ; $j < $rows ; ++$j)
  {
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo 'Title: ' . $row['title'] . '<br>';
      echo 'Author: ' . $row['author'] . '<br>';
      echo 'Category: ' . $row['category'] . '<br>';
      echo 'Year: ' . $row['year'] . '<br><br>';
  }

  $result->close();
  $con->close();
?>


