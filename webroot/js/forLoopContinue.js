// see pg 359, chap 15.  Called from index.html
//flow control/ for loop one using break and one with continue

haystack = new Array();
haystack[7] = "Needle";
haystack[13] = "Needle";

//break method; can comment out one or the other or leave both active
document.write("break method<br>");
for (j = 0; j < 20; ++j) {
    if (haystack[j] == "Needle") {
        document.write("<br>- found needle at location " + j + "<br><br>");
        break;
    }
    else document.write(j + ","); 
}

//continue method
document.write("continue method<br>");
for (j = 0; j < 20; ++j) {
    if (haystack[j] == "Needle") {
        document.write("<br>- found needle at location " + j + "<br>");
        continue;
    }
    document.write(j + ","); 
}
console.log("done");