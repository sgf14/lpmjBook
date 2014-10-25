<?php
    // chap 12; pg 286. use checkboxes for multiple selections; use radio buttons for exclusive selections
echo <<<_END
<html>
    <head>
        <title>Basic checkboxes</title>
    </head>
    <body>
        <form method="post" action="checkbox.php">
        Vanilla <input type="checkbox" name="ice" value="Vanilla">
        Chocolate <input type="checkbox" name="ice" value="Chocolate">
        Strawberry <input type="checkbox" name="ice" value="Strawberry">
        </form>
    </body>
</html>
_END;
?>

