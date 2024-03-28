<?php
require_once "dataAccess.php";

class Cheese {
    public $id;
    public $name;
    public $type;
    public $country_of_origin;
    public $strength;
    public $price_per_gram;
}

$sql = "SELECT * FROM cheeses WHERE 1=1";
$params = [];

if (!empty($_GET['name'])) {
    $sql .= " AND name LIKE :name";
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
?>
