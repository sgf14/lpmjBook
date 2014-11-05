// pg 351, chap 15, calling from index.html
//this javaScript error handler is useful to pinpoint coding errors
//'onerror' is a defined javascript method- see W3C schools, the handler is a method defined by the programmer

var onerror = errorHandler;
document.writ("Welcome"); //deliberate error

function errorHandler(message, url, line) {
    out = "Sorry, error encountered. \n\n";
    out += "Error: " + message + "\n";
    out += "URL: " + url + "\n";
    out += "Line: " + line + "\n\n";
    out += "Click OK to continue. \n\n";
    alert(out);
    return true;
}