<?php
    //add records to existing table.  Adapted INSERT statements into form; chap 10, pg 258

 // old version- if dblogin was one folder up
// require_once '../dbLogin.php';

//get login data
 require_once '..\fileFunctions.php';
 require_once $directory . '\dbLogin.php';

 // connect to db
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);

$tableName = 'cats';

// form actions.  for 'cats' table only, or change column headers, note it does note include PK; id column- see below
if (isset($_POST['family']) &&
    isset($_POST['name']) &&
    isset($_POST['age'])
    )

{
    $family = get_post($con, 'family');
    $name = get_post($con, 'name');
    $age = get_post($con, 'age');
//Note with PK being AUTO_INCREMENT you have to send NULL w/o quotes into the SQL stmt, so # is assigned right
// it will trigger the insert failed message otherwise
    $query = "INSERT INTO " . $tableName . " VALUES" . "(NULL,'$family','$name','$age')";
    $result = $con->query($query);

    if (!$result) echo "INSERT failed: $query<br>" . $con->error . "<br><br>";
}

//display and user interaction
// mysqli_insert_id  is an important function, particularly when linking tables- see pg 261
//book reccomends locking tables- see chap 9, pg 235, and transactions (COMMIT/ROLLBACK) on pg 230
echo "The insert ID is: " . mysqli_insert_id($con);
echo <<<_END
    <form action = "SQL_Insert.php" method="post"><pre>
     Family <input type="text" name="family">
       Name <input type="text" name="name">
        Age <input type="text" name="age">
        <input type="submit" value="Add Record to Table">
    </pre></form>
_END;

  $query = "SELECT * FROM " . $tableName . "";
  $result = $con->query($query);
    if (!$result) die ("Database access failed: " . $con->error);

  $rows = $result->num_rows;
// echo 'connected ' . DB_NAME . ' ' . $rows . '<br>';
  for ($j = 0 ; $j < $rows ; ++$j)
  {
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_NUM);

// adds the delete button below each record
echo <<<_END
<pre>
      ID: $row[0]
  Family: $row[1]
    Name: $row[2]
     Age: $row[3]
</pre>
_END;

  }

  $result->close();
  $con->close();

//custom built function for get_post variable above, see pg 254
// this prevents SQL insertion attacks, see pg 252 and 263, runs each item through this filtering type mechanism
function get_post($con, $var)
{
    return $con->real_escape_string($_POST[$var]);
}
?>


