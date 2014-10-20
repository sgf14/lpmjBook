<?php
   $author = "Scott Adams";
//   echo $author;
//  $y = 1
// if ($y-- == 0) echo $y;
 
 // $count = $count + 1;
  $author2 = "Bill Gates";

  echo <<<_end
  Measuring programming progress by lines of code is like
  Measuring aircraft building progress by weight.
  </br></br>
  - $author2. </br></br>

_end;

function longdate($timestamp) {
    $temp = date("l F jS Y", $timestamp);
    return "The date is $temp";
}

echo longdate(time());  
?> 