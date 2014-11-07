// see pg 360, chap 15.  Called from index.html
//JS is loosely typed language, if the variable needs to be a specific type then use explicit casting

var n = 3.1415927;
var ni = parseInt(n);
var nf = parseFloat(n);
var se = String(n);

var a = 1;
var ae = Boolean(8 == 2);

var s = 'this is a test string';
var splitToArray = s.split(" ");

document.write("orig: " + n + ", " + a + ", "+ s  + "<br>");
document.write("parsed: " + ni + ", " + nf + ", "+ se + ", " + ae + ", " + splitToArray);