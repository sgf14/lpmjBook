// pg 379, chap 16.  have lots of JS array stuff in Eclipse
// but here are some useful sort functions

//alphabetic sort
sports = ["Football", "Tennis", "Baseball", "Hockey"];
sports.sort();
document.write(sports + "<br>")

// reverse alphabetic via method chaining
sports.sort().reverse();
document.write(sports + "<br>")

// ascending numeric
numbers = [7, 23, 6, 74, 1, 451];
//see pg 380 for how this anonymous function works to sort
numbers.sort(function (a, b) { return a - b });
document.write(numbers + "<br>");

// descending numeric
numbers.sort(function (a, b) { return b - a });
document.write(numbers + "<br>")
