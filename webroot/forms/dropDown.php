<?php
    // chap 12; pg 289. drop down selection list
echo <<<_END
<html>
    <head>
        <title>Drop Down Select List</title>
    </head>
    <body>
        Vegetables
        <!-- default setup-->
        <select name="veg" size="1">
        <option value="Peas">Peas</option>
        <option value="Carrots">Carrots</option>
        <option value="Cabbage">Cabbage</option>
        <option value="Rutabegas">Rutabegas</option>
        </select>
        <br>
        <br>

        Fruits
        <!-- see pg 289, can select multiple selections if needed, but usually a set of checkboxes is 
        more intuitive to the user.  'multiple' being present is sufficient, if the word is not there its 
        single selection.  see W3C schools, html ref, select tags-->

        <select name="veg" size="4" multiple>
        <option value="Oranges">Oranges</option>

        <!-- can default select an item in the list as coded below the "selected" part isnt technically 
        required, but is advised so yo can reference it by name elsewhere in code -->

        <option selected="selected" value="Apples">Apples</option>
        <option value="Blueberries">Blueberries</option>
        <option value="Bananas">Bananas</option>
        </select>
    </body>
</html>
_END;
?>

