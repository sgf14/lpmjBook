<?php
//basic ifelse loop control, chap 3, pg 87; change $bankBalance to see diff scenarios. note no 'then' in php

$bankBalance = 260;
$savings = 500;
$money = 1000;

echo "before bnk: " . $bankBalance . "<br>before sav: " . $savings . "<br>before Money: " . $money . "<br><br>";

if ($bankBalance < 100)
{
    $bankBalance += $money;
}
elseif ($bankBalance > 200) 
{
    $savings += 100;
    $bankBalance -= 100;
}
else
{
    $savings += 50;
    $bankBalance -= 50;
}

echo "after bnk: " . $bankBalance . "<br>after sav: " . $savings . "<br>after money: " . $money
?>
