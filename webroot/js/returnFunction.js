// pg 365, chap 16, using function return

document.write(fixNames("the", "DENVER", "BroNcos"));

function fixNames() {
    var s = "";

    for (j = 0; j < fixNames.arguments.length; ++j) {
        s += fixNames.arguments[j].charAt(0).toUpperCase() +
             fixNames.arguments[j].substr(1).toLowerCase() + " ";
             //note that substg only requires 2nd pos (1); there is a more explicit form  but JS assumes 
             //you want the rule to apply to the rest of the stg if you omit the 2nd argument- see pg 366
             //explicit = substr(1, (arguments[j].length - 1).[method]) 
    }
    return s.substr(0, s.length - 1);
}