<?php
require_once "dataAccess.php";
require_once "cheese.php";

$sql = "SELECT * FROM cheeses WHERE 1=1";
$params = [];

if (!empty($_GET['name'])) {   // As long as the input field with the id called name, is not empty then the code inside will be executed, otherwise continue with the other if checks.
    $sql .= " AND name LIKE :name"; // The .= is the same as +=, except for strings, whereas the += is used for numbers IN PHP, not the same in other programming languages.
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
    $params[':strength'] = (int)$_GET['strength']; // Ensuring that the strength is a number
}
if (!empty($_GET['price'])) {
    $sql .= " AND price_per_gram = :price";
<<<<<<< HEAD
    $params[':price'] = (float)$_GET['price']; // Prices typically include decimal points, so will use a float for now.
=======
    $params[':price'] = (float)$_GET['price']; // Prices are typically decimals, so will use a float for now.
>>>>>>> dae10a34887edd11854bf7e4cc610b1aa6e65bbe
}

$results = $pdo->prepare($sql);
$results->execute($params);

// After preparing and executing the statement
$cheeses = $results->fetchAll(PDO::FETCH_CLASS, 'Cheese');

<<<<<<< HEAD
print json_encode($cheeses); // Prints results back to the screen
=======
echo json_encode($cheeses);
>>>>>>> dae10a34887edd11854bf7e4cc610b1aa6e65bbe

?>
