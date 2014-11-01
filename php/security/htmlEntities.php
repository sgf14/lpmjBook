<?php// test file HTML entities method cleans user enntry to prevent tag insertion by hackers
// see Chap 12, pg 293
$t = '';
$out = '';

if (isset($_POST['t'])) $t = sanitizeHTML($_POST['t']);

$out = "Var: $t and unformatted entry: "; 

echo <<<_END
<html>
    <head>
        <title>HTML entities</title>
    </head>
    <body>
        Enter text<br><br>
         <b>$out</b>

         <form method="post" action="htmlEntities.php">
            <input type="text" name="t">
            <input type="submit" value="Remove tags">
         </form>
     </body>
</html>
_END;

function sanitizeHTML($var)
{
    $var = htmlentities($var);
    echo $var;
    return $var;
}
?>

