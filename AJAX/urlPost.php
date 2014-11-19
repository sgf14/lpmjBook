<?php
   // chap 18, pg 412
   // called from urlPost.html file
if (isset($_POST['url'])) {
    echo file_get_contents('http://' . sanitizeString($_POST['url']));
}

// always need to sanitize strig to prevent sql or html injections to server
function sanitizeString($var) {
    $var = strip_tags($var);
    $var = htmlentities($var);
    return stripslashes($var);
}
?>
