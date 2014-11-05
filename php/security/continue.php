<?php
// file connected to authenticateWithSession.php
// shows how session method/data carries across server files
// you would not normally display the users data due to security anti hacker prevention;
// its only shown here to show how session carries it from one file to the other on the server

session_start();

if (isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $forename = $_SESSION['forename'];
    $surname = $_SESSION['surname'];

    // if user were to click on the reload page session has been destroyed ad user prompted to reutn to login pg 
    destroy_session_and_data();

    echo "Welcome back $forename, <br>
            Your fullname is $forename $surname. <br>
            your username is '$username' 
            and your password is '$password'.";
}
// if session wasnt established, it will have you send you to login pg
else echo "Please <a href='authenticateWithSession.php'>click here</a> to log in.";

function destroy_session_and_data()
{
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
}
?>


