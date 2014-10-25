<?php
    // chap 12; pg 287. use checkboxes for multiple selections; use radio buttons for exclusive selections
echo <<<_END
<html>
    <head>
        <title>Basic Radio Buttons</title>
    </head>
    <body>
        <form method="post" action="radioButton.php">
        <!-- the "checked" below sets a default selection, so that something is picked by default 
        this can be helpful on the db end- see pg 287 /-->
        Vanilla <input type="radio" name="ice" value="Vanilla">
        Chocolate <input type="radio" name="ice" value="Chocolate" checked="checked">
        Strawberry <input type="radio" name="ice" value="Strawberry">
        </form>
    </body>
</html>
_END;
?>


