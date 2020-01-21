<? php

use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;


use Bookstore\Domain\Customer\Basic;

// autoloader fucntion to load classes
function autoloader($classname){
  $lastSlash = strpos($classname, '\\') + 1;
  $classname = substr($classname, $lastSlash);
  $directory = str_replace('\\', '/', $classname);
  $filename = __DIR__ . '/' . $directory . '.php';
  require_once $filename;
}

spl_autoload_register('autoloader');

// instantiating(using) class
$harry_potter = new Book(6576586, "Harry Potter and the Magicians", "John Doe", 10);
// removed the direct instantiation since we are now using our magic method

$first_customer = new Basic(1, "John", "Doe", "johndoe@gmail.com");

var_dump($harry_potter);
var_dump($first_customer);

// trying to access firstname of the customer will throw an uncaught error 
// since it is private 
var_dump($first_customer->firstname);

/**
 * encapsulation - accessors - mutators
 */

 /**
  * private visibility is great to maintain internal structure of your classes 
  * as a developer, you can change the internal structure without 
  * affecting the external code (for example other classes that extends it - coming later)
  * that uses it
  * so how do we read or change these private properties or methods from outside
  * or other classes?
  * we can do so using getters and setters
  * these methods are also known as accessors
  */

var_dump($first_customer->getFirstName());
var_dump($first_customer->getSurname());
var_dump($first_customer->getFullName());

var_dump($first_customer->setEmail('me@gmail.com'));

/**
 * static properties and methods
 */

 /**
  * php allows us to have multiple properties and methods linked to
  * the class itself rather than to the object
  */

// referencing using existing instance
var_dump($first_customer::getLastId());

// referencing using class name itself
Customer::getLastId();

/**
 * namespaces 
 */

/**
 * if you have two classes with the same name, php would not know which one is being
 * refered to
 * to solve this isssue, php allows us to use the namespace 'keyword'
 * namespace acts as paths in a filesystem
 * each section of the namespace is separated by \
 */


/**
 * Autoloading
 */

/**
 * Autoloading is a PHP feature that allows your program to search and load files 
 * automatically given some set of predefined rules.
 */

/**
* autoloader is a php function that gets a class name as a parameter and
* is is expected to load a file
*/

/**
 * Inheritance
 */

/**
 * when a class extends from another class, it gets all the properties and methods
 * that are not defined as private
 * this is called 'Inheritance'
 */

/**
 * Overriding methods
 */
/**
 * when we have similar methods in both parent and children and call the 
 * method, the one defining the children will take precedence
 */
var_dump($first_customer->sayHi());

/**
 * abstract classes
 */

// check if if valid
function checkIfValid(Customer, $customer, $books){
  return $customer->getAmountToBorrow() >= count($books);
}

var_dump(checkIfValid($first_customer, $harry_potter));