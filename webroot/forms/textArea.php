<?php
    // chap 12; pg 285. use textarea for larger text area than input box, see basicForm.php
    // note closing tag, which is not part of <input> tag
echo <<<_END
<html>
    <head>
        <title>Text Area</title>
    </head>
    <body>
    <!-- cols= width in charater spacing, rows height.  wrap seetings= off,soft,hard -->
        Enter Text:<textarea name="textArea" cols="30" rows="13" wrap="soft">
        </textarea>
    </body>
</html>
_END;
?>
