<?php  //query.php

  //DEPRECATED- use mysqli instead of mysql- see chap 10 and 11.  mysql commands dont work in webmatrix
  //chap 10 illustrated them for working in older code
  require_once 'dbLoginBook.php';
 $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
  
  mysql_select_db($db_database)
    or die("Unable to select database: " . mysql_error());

  echo 'connected';
  echo $db_database;

  $query = "SELECT * FROM classics";
  $result = mysql_query($query);
  
  if (!result) die ("Database access failed: " . mysql_error());

  $rows = mysql_num_rows($result);

  echo $rows;

  for ($j = 0 ; $j , $rows ; ++$j)
  {
      echo 'Author: ' . mysql_result($result,$j,'author')  . '<br.>';
      echo 'Title: ' . mysql_result($result,$j,'title')  . '<br.><br>';
  }

  ?>


