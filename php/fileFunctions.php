<?php
//Chap 3; pg 63 Constants and using functions to reference required files in other directories 
//right now only using this for Root directory
//for use with require and require_once when files not within 1 directory upstream

//displays include path 
// echo ini_get('include_path');

// some of the Constants- see pg 64 for more inclusive list
//echo "The directory is " . __DIR__ . "<br>";
//echo "The file is " . __FILE__ . "<br>";

//  note- this cannot include final separator 'Empty Site2\' at the end- or this all falls apart
// when you move this to the server you only have to change this line to maintain call relationships
// this is only one way, there is a bunch of this stuff on this subject, see PHP.net, dirname commands 
define('ROOT','C:\Users\Scott\Documents\My Web Sites\Empty Site2');
 $directory = ROOT;

//echo $directory;

// some other examples
 //file reference-same directory
 //require_once 'dbLogin.php';

 //one folder upstream
 //require_once '..\dbLogin.php';

 //one folder downstream
 //require_once '\SQL\dbLogin.php';

?>

