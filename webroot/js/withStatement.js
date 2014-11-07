// with stmt is exclusive to  JS, equiv stmt is not in PHP
// can reduce may references to an object/var with just one
//pg 350, chap 15

stg = "The quick brown fox jumps over the lazy dog";

with (stg) {
    document.write("Original sentence: " + toString() + "<br>");
    document.write("The string is " + length + " characters long. <br>");
    document.write("In uppercase its: " + toUpperCase());
}

// note inside the with stmt, 'stg' is never referenced directly, but attributes are applied to it