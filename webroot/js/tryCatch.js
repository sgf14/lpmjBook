// pg 352, chap 15
//this javaScript try-catch is an alternative to onerror method.
//benefit is more flexibility and more widely used.  allows you to trap errors in a section of code
// this specific example just gives the structure, its not functional or called from index.html

try {
    request = new XMLHttpRequest();

}
catch (err) { //err is a user created method
    //use a different method to create an XML HTTP Request object
}
finally {  //the finally keyword is optional
    alert("The try clause was encountered");
}

/*- example from W3C schools
try {
    Block of code to try
}
catch(err) {
    Block of code to handle errors
}
finally {
    Block of code to be executed regardless of the try / catch result
} 
*/