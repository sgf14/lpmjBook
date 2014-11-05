<?php
//a form to add Test users via webpage form.  chap 13, pg 309
// an added adapted from SQL_insert.php and setupUsers.php; used with Authenicate

 // old version- if dblogin was one folder up
// require_once '../dbLogin.php';

//get login data
 require_once '..\fileFunctions.php';
 require_once $directory . '\dbLogin.php';

 // connect to db
 $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($con->connect_error) die("Database selection failed: " . $con->connect_error);

$tableName = 'users';

// form actions.  validate info has been entered
if (isset($_POST['forename']) &&
    isset($_POST['surname']) &&
    isset($_POST['username']) &&
    isset($_POST['password'])
    )

{
    //setup insert data based on form, pass through sanitize function
    $forename = get_post($con, 'forename');
    $surname = get_post($con, 'surname');
    $username = get_post($con, 'username');
    $password = get_post($con, 'password');
    //secure password
    $salt1 = "qm&h*";
    $salt2 = "pg!@";
    $token = hash('ripemd128' , "$salt1$password$salt2");

//execute insert
    $query = "INSERT INTO " . $tableName . " VALUES" . "('$forename','$surname','$username','$token')";
    $result = $con->query($query);

    if (!$result) echo "INSERT failed: $query<br>" . $con->error . "<br><br>";
}

//display and user interaction
echo <<<_END
    <form action = "SQL_InsertForUsersTable.php" method="post"><pre>
     First Name <input type="text" name="forename">
      Last Name <input type="text" name="surname">
        User ID <input type="text" name="username">
       Password <input type="text" name="password">
        <input type="submit" value="Add Record to Table">
    </pre></form>
_END;


echo "Table $tableName updated";
//custom built function for get_post variable above, see pg 254
// this prevents SQL insertion attacks, see pg 252 and 263, runs each item through this filtering type mechanism
function get_post($con, $var)
{
    return $con->real_escape_string($_POST[$var]);
}
?>

