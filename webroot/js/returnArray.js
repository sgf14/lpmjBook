// pg 367, chap 16,  similar to returnFunction.js, but this allows individual parameters to be returned
// an may allow for more flexibility depending on what you want to do.


//define an array instead of just a list of parameters, as in returnFunction.js
words = fixNames("the", "DENVER", "BroNcos");

// 1) same output as returnFunction.js
for (j = 0; j < words.length; ++j) {
    document.write(words[j] + " ");
}

// 2) or an alternate output
document.write("<br><br>" + words[0] + words[2] + "<br>");
    

function fixNames() {
    var s = new Array();

    for (j = 0; j < fixNames.arguments.length; ++j) {
        s[j] = fixNames.arguments[j].charAt(0).toUpperCase() +
               fixNames.arguments[j].substr(1).toLowerCase() + " ";
        }
    return s;
}