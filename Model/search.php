<?php
require_once "dataAccess.php";
<<<<<<< HEAD
require_once "cheese.php";
=======

class Cheese {
    public $id;
    public $name;
    public $type;
    public $country_of_origin;
    public $strength;
    public $price_per_gram;
}
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943

$sql = "SELECT * FROM cheeses WHERE 1=1";
$params = [];

<<<<<<< HEAD
if (!empty($_GET['name'])) {   // As long as the input field with the id called name, is not empty then the code inside will be executed, otherwise continue with the other if checks.
    $sql .= " AND name LIKE :name"; // The .= is the same as +=, except for strings, whereas the += is used for numbers IN PHP, not the same in other programming languages.
=======
if (!empty($_GET['name'])) {
    $sql .= " AND name LIKE :name";
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943
    $params[':name'] = "%" . $_GET['name'] . "%";
}
if (!empty($_GET['type'])) {
    $sql .= " AND type = :type";
    $params[':type'] = $_GET['type'];
}
if (!empty($_GET['country'])) {
    $sql .= " AND country_of_origin = :country";
    $params[':country'] = $_GET['country'];
}
if (!empty($_GET['strength'])) {
    $sql .= " AND strength = :strength";
<<<<<<< HEAD
    $params[':strength'] = (int)$_GET['strength']; // Ensuring that the strength is a number
}
if (!empty($_GET['price'])) {
    $sql .= " AND price_per_gram = :price";
    $params[':price'] = (float)$_GET['price']; // Prices are typically decimals, so will use a float for now.
}

$results = $pdo->prepare($sql);
$results->execute($params);

// After preparing and executing the statement
$cheeses = $results->fetchAll(PDO::FETCH_CLASS, 'Cheese');

echo json_encode($cheeses);

=======
    $params[':strength'] = (int)$_GET['strength']; // Ensure the strength is an integer
}
if (!empty($_GET['price'])) {
    $sql .= " AND price_per_gram = :price";
    $params[':price'] = (float)$_GET['price']; // Ensure the price is a float
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$cheeses = $stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($cheeses);
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943
?>
