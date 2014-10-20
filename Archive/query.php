<?php  //query.php
  //OLD VERSION- dont use
  require_once 'dbLogin.php';
    
  $databaseConnection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($databaseConnection->connect_error)
    {
        die("Database selection failed: " . $databaseConnection->connect_error);
    }

echo 'connected';

  $query = "SELECT * FROM classics";
  $result = $databaseConnection->query($query);
  
  if (!result) die ($databaseConnection->error);

echo DB_NAME;

  $rows = $result->num_rows;
$singleRow = $result->data_seek(1);
$singleRowName = $result->fetch_assoc()['author'];
echo $singleRowName;
echo $rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
      //$result->data_seek($j);
      //echo 'Author: ' . $result->fetch_assoc()['author'] . '<br>';
      //$result->data_seek($j);
      //echo 'Title: ' . $result->fetch_assoc()['title']  . '<br>';
  }

  $result->close();
  $databaseConnection->close();

  ?>

