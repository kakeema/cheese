<?php

<<<<<<< HEAD
require_once "dataAccess.php"; // Must be at the top so that the class CheeseModel can access the pdo in this file
// The above line ensure that the PDO instance $pdo is created and available to be passed into the CheeseModel constructor. This allows for greater flexibility if I ever want switch out the database connection.
require_once "cheese.php"; // Used for the return statement, so that I can get the class Cheese.
class CheeseModel {
    private $pdo; // from the dataAccess.php
=======
require_once "dataAccess.php"; 
// The above line ensure that the PDO instance $pdo is created and available to be passed into the CheeseModel constructor. This allows for greater flexibility if I ever want switch out the database connection.
class CheeseModel {
    private $pdo;
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    //  Will just stick to the above function instead of the below function for now.

    // public function __construct() {
    //     $this->pdo = (new Database())->connect();
    // }
    
<<<<<<< HEAD
    public function searchCheese($name = null, $type = null, $country = null, $strength = null, $price = null)  // Checks first if all the fields are nulll to display all the cheeses at the start before the form has been used.
    {   
=======
    public function searchCheese($name, $type, $country, $strength, $price) {
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943
        $sqlStatement = "SELECT * FROM cheeses WHERE 1=1"; // The 1=1 is basically a placeholder for later when we run through the if conditions, we replace the 1=1 with the sql statement inside of the condition.
        // In the case where no if coniditons occur, then the 1=1 will have no impact on the sql query it will return all records from the table because 1=1 is always true.
        
        $params = [];

        if ($name) {
            $sqlStatement .= " AND name LIKE :name"; // :name is also a placeholder but will not always be true like 1=1
            $params[':name'] = "%$name%"; // This stores the user inputted data.
        }
        if ($type) {
            $sqlStatement .= " AND type = :type";
            $params[':type'] = $type;
        }
        if ($country) {
            $sqlStatement .= " AND country_of_origin = :country";
            $params[':country'] = $country;
        }
        if ($strength) {
            $sqlStatement .= " AND strength = :strength";
            $params[':strength'] = $strength;
        }
        if ($price) {
            $sqlStatement .= " AND price_per_gram = :price";
            $params[':price'] = $price;
        }

<<<<<<< HEAD
        $results = $this->pdo->prepare($sqlStatement); // This only prepares but, not execute the sql command on the database. The execution happens on the next line.
        $results->execute($params); // This is where both the sql statement and the user inputted data join up, where the  :name (and similar ones) get replaced by the user inputted data.
        return $results->fetchAll(PDO::FETCH_CLASS, 'Cheese'); // THIS WILL RETURN THE CHEESE OBJECT FROM THE DATABASE NOT THE CLASS CHEESE !!!!!!!!!!!!!!!!!!!!!!
    //  So if I enter in only a name of a cheese, this function will return the cheese corresponding to my name, along with every other column that this specific cheese has with or without data in it.
    //  It is essentially equivelent to me doing in SQL SELECT * FROM cheeses WHERE name LIKE "%cheddar%"; If cheddar was the cheese name that I entered in.

=======
        $results = $this->pdo->prepare($sqlStatement);
        $results->execute($params); // This is where both the sql statement and the user inputted data join up, where the  :name (and similar ones) get replaced by the user inputted data.
        return $results->fetchAll(PDO::FETCH_OBJ); // THIS WILL RETURN THE CHEESE OBJECT FROM THE DATABASE NOT THE CLASS CHEESE !!!!!!!!!!!!!!!!!!!!!!
    //  So if I enter in only a name of a cheese, this function will return the cheese corresponding to my name, along with every other column that this specific cheese has with or without data inside of it.
    //  It is essentially equivelent to me doing in SQL SELECT * FROM cheeses WHERE name LIKE "%cheddar%"; If cheddar was the cheese name that I entered in.
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943
}
}
?>