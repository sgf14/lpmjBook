<?php
// test file HTML entities method cleans user enntry to prevent tag insertion by hackers
// see Chap 12, pg 293; adapted from convert.php
$t = '';
$tInit = '';

if (isset($_POST['t'])) $t = sanitizeHTML($_POST['t']);

$tInit = ($_POST['t']);

$out = "Var: $t and unformatted entry: $tInit"; 

echo <<<_END
<html>
    <head>
        <title>HTML entities</title>
    </head>
    <body>
        Enter text<br><br>
         
         <form method="post" action="htmlEntities.php">
            <input type="text" name="t">
            <input type="submit" value="Remove tags">
         </form>

         <b>$out</b>
     </body>
</html>
_END;

function sanitizeHTML($var)
{
    $var = htmlentities($var);
    return $var;
}

?>

