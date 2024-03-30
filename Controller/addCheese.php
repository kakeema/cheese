<?php
require_once "../model/dataAccess.php";

if (isset($_GET['name'], $_GET['type'], $_GET['country_of_origin'], $_GET['strength'], $_GET['price_per_gram'])) {
    $name = $_GET['name'];
    $type = $_GET['type'];
    $countryOfOrigin = $_GET['country_of_origin'];
    $strength = $_GET['strength'];
    $pricePerGram = $_GET['price_per_gram'];

    try {
        // query to insert the new cheese into the database
        $query = "INSERT INTO cheeses (name, type, country_of_origin, strength, price_per_gram) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $type, $countryOfOrigin, $strength, $pricePerGram]);
        
        // Redirect back to admin cheese search view with a success message
        header('Location: ../view/adminCheeseSearchView.php?message=Cheese+added+successfully');
        exit();
    } catch (Exception $e) {
        // Redirect back with an error message
        header('Location: ../view/adminCheeseSearchView.php?error=' . urlencode($e->getMessage()));
        exit();
    }
} else {
    // Redirect back with an error message if all fields are NOT! set
    header('Location: ../view/adminCheeseSearchView.php?error=' . urlencode('Please fill in all fields.'));
    exit();
}
?>
