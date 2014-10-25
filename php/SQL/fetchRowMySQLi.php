<?php
    // select statement using for loop see pg 272 of book.  see W3C wesite- PHP/mySQLi section for
    //other methods, or while file to left

//on the require once the ..\ portion goes up one folder level; \[folderName]\file.php goes down a folder 
//level.  for files referenced in other locations see fileFunctions.php
//for Windows \ or / can be used; in Unix/Linux must use \

 //file reference-same directory
 //require_once 'dbLogin.php';

 //one folder upstream
 //require_once '..\dbLogin.php';

 //one folder downstream
 //require_once '\SQL\dbLogin.php';

  //two or more folders upstream; note the limitation of this method is that the file funct being called cant be more than 1 directory up
 require_once '..\fileFunctions.php';

 //$directory = ROOT_LOCATION;
 //echo $directory;
 require_once $directory . '\dbLogin.php';

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


