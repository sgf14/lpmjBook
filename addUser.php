<?php
// pg 397, chap 17 php verification, extension of validate.html

$forename = $surname = $username = $password = $age = $email = "";

if (isset($_POST['forename'])) $forename = fix_string($_POST['forename']);
if (isset($_POST['surname'])) $surname = fix_string($_POST['surname']);
if (isset($_POST['username'])) $username = fix_string($_POST['username']);
if (isset($_POST['password'])) $password = fix_string($_POST['password']);
if (isset($_POST['age'])) $age = fix_string($_POST['age']);
if (isset($_POST['email'])) $email = fix_string($_POST['email']);

$fail = validate_forename($forename);
$fail .= validate_surname($surname);
$fail .= validate_username($username);
$fail .= validate_password($password);
$fail .= validate_age($age);
$fail .= validate_email($email);

echo "<!DOCTYPE html>\n<html><head><title>An Example Form</title>";

if ($fail == "") {
    echo "</head><body>Form data successfully validated:
        $forename, $surname, $username, $password, $age, $email.</body></html>";

        //add posted fields to db, usign hash encyrption for the password

    exit;
}
 echo <<<_END

<!-- html/js section -->
        <style>
            .signup {
                border: 1px solid #999999;
                font:  normal 14px helvetica;
                color: #444444;
            }
        </style>
        <script>
            function validate(form) {
                fail = validateForename(form.forename.value)
                fail += validateSurname(form.surname.value)
                fail += validateUsername(form.username.value)
                fail += validatePassword(form.password.value)
                fail += validateAge(form.age.value)
                fail += validateEmail(form.email.value)

                if (fail == "") return true
                else { alert(fail); return false }
            }

            function validateForename(field) {
                return (field == "") ? "No first name entered.\n" : ""
            }

            function validateSurname(field) {
                return (field == "") ? "No last name entered.\n" : ""
            }

            function validateUsername(field) {
                if (field == "") return "No username entered.\n"
                else if (field.length < 5)
                    return "Username must be at least 5 characters.\n"
                // regular expression- see pg 387
                else if (/[^a-zA-Z0-9_-]/.test(field))
                    return "Only a-z, A-Z, 0-9, - and _ are allowed in Username field.\n"
                return ""
            }

            function validatePassword(field) {
                if (field == "") return "No password entered.\n"
                else if (field.length < 6)
                    return "Password must be at least 6 characters.\n"
                else if (!/[a-z]/.test(field) || !/[A-Z]/.test(field) || !/[0-9]/.test(field))
                    return "Passwords require one each a-z, A-Z & 0-9.\n"
                return "" 
            }

            function validateAge(field) {
                if (isNaN(field)) return "No age was entered.\n"
                else if (field < 18 || field > 110)
                    return "Age must be between 18 and 110.\n"
                return ""
            }

            function validateEmail(field) {
                if (field == "") return "No email was entered.\n"
                else if (!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field))
                    return "invalid email address.\n"
                return ""
            }
        </script>
    </head>
    <body>
        <table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
        <th colspan="2" align="center">Signup Form</th>

        <!-- this section not in validate.html -->
        <tr><td colspan="2">Sorry, the following errors were found<br>
            in your form: <p><font color=red size=1><i>$fail</i></font></p>
        </td></tr>
        <!-- end of added section; note additin of Value= below keeps entries in place if errors, pg 402 -->

            <form method="post" action="addUser.php" onsubmit="return validate(this)">
            <tr><td>First Name</td>
                <td><input type="text" maxlength="32" name="forename" value="$forename"></td></tr>
            <tr><td>Last Name</td>
                <td><input type="text" maxlength="32" name="surname" value="$surname"></td></tr>
            <tr><td>User Name</td>
                <td><input type="text" maxlength="16" name="username" value="$username"></td></tr>
            <tr><td>Password</td>
                <td><input type="text" maxlength="12" name="password" value="$password"></td></tr>
            <tr><td>Age</td>
                <td><input type="text" maxlength="3" name="age" value="$age"></td></tr>
            <tr><td>Email</td>
                <td><input type="text" maxlength="64" name="email" value="$email"></td></tr>
            <tr><td colspan="2" align="center"><input type="submit" value="Signup"</td></tr>
            </form>
        </table>
    </body>
</html>

_END;

// php functions
function validate_forename($field) {
    return ($field == "") ? "No first name entered.<br>" : "";
}

function validate_surname($field) {
    return ($field == "") ? "No last name entered.<br>" : "";
}

function validate_username($field) {
    if ($field == "") return "No username entered.<br>";
    elseif (strlen($field) < 5)
        return "Username must be at least 5 characters.<br>";
        // regular expression- see pg 387
    elseif (preg_match("/[^a-zA-Z0-9_-]/", $field))
        return "Only a-z, A-Z, 0-9, - and _ are allowed in Username field<br>";
    return "";
}

function validate_password($field) {
    if ($field == "") return "No password entered<br>";
    elseif (strlen($field) < 6)
        return "Passwords must be 6 characters<br>";
    elseif (!preg_match("/[a-z]/", $field) ||
            !preg_match("/[A-Z]/", $field) ||
            !preg_match("/[0-9]/", $field))
        return "Passwords require 1 each: lowercase letter, uppercase letter and number<br>";
    return "";
}

function validate_age($field) {
    if ($field =="") return "No age entered<br>";
    elseif ($field <18 || $field > 110)
        return "Age must be between 18 and 110<br>";
    return "";
}

function validate_email($field) {
    if ($field == "") return "No email was entered<br>";
    elseif (!((strpos($field, ".") > 0) &&
              (strpos($field, "@") > 0)) ||
               preg_match("/[^a-zA-Z0-9.@_-]/", $field))
        return "The email address is invalid<br>";
    return "";
}

function fix_string($string) {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
}

?>
