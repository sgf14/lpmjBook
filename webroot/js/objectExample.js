/*  pg 368,  chap 16
variable = contains one value
object = contains multiple values and function(s).  An array contains multiple values, but not functions.
class = a script containing a composite of data and code created in order to use that class as an object 
later on.  Each new object based on this class is an instance of the class. A class instantiates an object.
properties = data associated with an object
methods = functions associated with an object
constructor = the function(s) within the class
*/

//Declaring/instantiating 'User' as a class with its method.  method could be created outside the class, but 
// that is not the preffered methodology.  See pg 369
function User(forename, username, password) {
    // 'this' method refers to the instance being created
    this.forename = forename;
    this.username = username;
    this.password = password;

//showUser is a method of the User class
    this.showUser = function () {
        document.write("Forename: " + this.forename + "<br>");
        document.write("Username: " + this.username + "<br>");
        document.write("Password: " + this.password + "<br>");
    }
}

//create an instance of the class 'User'
details = new User("Wolfgang", "w.a.mozart", "composer");

// or as empty object then populated
details2 = new User();
details2.forename = "Johann";
details2.username = "j.s.bach";
details2.password = "baroque";

//you can also add properties like
details.greeting = "Hello";

//accessing the object- this is the part that actually get output to the browser
details.showUser();
details2.showUser(); 