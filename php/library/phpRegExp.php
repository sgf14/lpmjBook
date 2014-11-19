<?php
// same reg ex from regularExpression.html, but in php

//match function 1) reg exp 2) stmt evaluated 3) text that was matched
$expr = "Cats are crazy.  I like cats.";
$n = preg_match("/cats/i", $expr , $match);
echo "Original: $expr <br>";
echo "Match version: $n Matches: $match[0] <br><br>";

$n1 = preg_match_all("/cats/i", $expr, $match);
echo "Match All version: $n1 Matches: ";
for ($j=0 ; $j < $n1 ; ++$j) echo $match[0][$j]." ";
echo "<br><br>";

$n2 = preg_replace("/cats/i", "dogs", $expr);
echo "Replace version: $n2";

?>


