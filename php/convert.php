<?php
//pg 292 initializes vars to null
$f = $c = '';

//if populated, fetches the values in either field f or c then as a security measure passes them through 
//function so hackers cant insert html or SQL 
if(isset($_POST['f'])) $f = sanitizeString($_POST['f']);
if(isset($_POST['c'])) $c = sanitizeString($_POST['c']);

//calc loop, notice intval method to make the result an integer.
// workng on how to check if entry is an integer,  is_int wasnt working
if ($f !='')
{    
    $c = intval((5/9) * ($f - 32));
    $out = "$f deg F equals $c deg C";
} 
elseif ($c != '')
{
    $f = intval(((9/5) * $c) + 32);
    $out = "$c deg C equals $f deg F";
}
else $out = "";

//display
echo <<<_END
<html>
    <head>
        <title>Temperature Converter</title>
    </head>
    <body>
        <pre>
            Enter either Fahrenheit or Celcius and click on Convert

            <b>$out</b>

            <form method="post" action="convert.php">
            Fahrenheit <input type="text" name="f" size="7">
               Celcius <input type="text" name="c" size="7">
                       <input type="submit" value="Convert">
            </form>
        </pre>
    </body>
</html>
_END;

function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
?>


