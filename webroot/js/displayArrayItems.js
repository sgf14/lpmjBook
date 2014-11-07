//pg 365, Chap 16; iterate through an array

// note: this is not a local variable- used in function- so you cant use 'var' in front
displayItems ("Dog","Cat","Pony","Hamster","Tortoise");

function displayItems() {
    for (k = 0; k < displayItems.arguments.length; ++k)
        //note: since there is only one stmt JS doesnt require {} in the 'for' stmt (& you cant add a ; at end
        // either) .You cant have more than one stmt, or else {} are required
        document.write(displayItems.arguments[k] + "<br>");
}