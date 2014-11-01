<?php
    //Chap 10, pg 274,  this extends the select while file, allowing addition and deletion of records
    //note that with the display sections (END) the alignment is done in the code

 // old version- if dblogin was one folder up
// require_once '../dbLogin.php';

//get login data
 require_once '..\fileFunctions.php';
 require_once $directory . '\dbLogin.php';

 // connect to db
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);

// form actions.  Note POST is used instead of GET- see pg 253
if (isset($_POST['delete']) && isset($_POST['isbn']))
{
    $isbn = get_post($con, 'isbn');
    $query = "DELETE FROM classics WHERE isbn ='$isbn'";
    $result = $con->query($query);

    if (!$result) echo "DELETE failed: $query<br>" . $con->error . "<br><br>";
}

if (isset($_POST['author']) &&
    isset($_POST['title']) &&
    isset($_POST['category']) &&
    isset($_POST['year']) &&
    isset($_POST['isbn'])
    )

{
    $author = get_post($con, 'author');
    $title = get_post($con, 'title');
    $category = get_post($con, 'category');
    $year = get_post($con, 'year');
    $isbn = get_post($con, 'isbn');
    $query = "INSERT INTO classics VALUES" . "('$author','$title','$category','$year','$isbn')";
    $result = $con->query($query);

    if (!$result) echo "INSERT failed: $query<br>" . $con->error . "<br><br>";
}

//display and user interaction
echo <<<_END
    <form action = "SQL_Insert_DeleteRecord.php" method="post"><pre>
      Author <input type="text" name="author">
       Title <input type="text" name="title">
    Category <input type="text" name="category">
        Year <input type="text" name="year">
        ISBN <input type="text" name="isbn">
        <input type="submit" value="Add Record">
    </pre></form>
_END;

  $query = "SELECT * FROM classics";
  $result = $con->query($query);
    if (!result) die ("Database access failed: " . $con->error);

  $rows = $result->num_rows;
// echo 'connected ' . DB_NAME . ' ' . $rows . '<br>';
  for ($j = 0 ; $j < $rows ; ++$j)
  {
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_NUM);

// adds the delete button below each record
echo <<<_END
<pre>
      Author: $row[0]
       Title: $row[1]
    Category: $row[2]
        Year: $row[3]
        ISBN: $row[4]
</pre>
<form action = "SQL_Insert_DeleteRecord.php" method="post">
<input type="hidden" name="delete" value="yes">
<input type="hidden" name="isbn" value="$row[4]">
<input type="submit" value="Delete Record"></form>
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


