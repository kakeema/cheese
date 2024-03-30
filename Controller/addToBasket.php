<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// This ensures that the session is started and the basket can be stored in the session. But, this should already be started because of the cheeseController.php running first in the cheeseSearchView.php file.
// In the case it isn't for some reason running first, I added this if check to check this, and create a new session to be ran.
// 
require_once "../model/cheeseModel.php";
require_once "../model/dataAccess.php";

// Check if the Add to Basket button was clicked and the cheese name is set
if (isset($_GET['add_to_basket']) && isset($_GET['cheese_name'])) {
    $cheeseName = $_GET['cheese_name'];

    // Fetch the unit price for the cheese from the database
    $priceQuery = "SELECT price_per_gram FROM cheeses WHERE name = ?";
    $sql = $pdo->prepare($priceQuery);
    $sql->execute([$cheeseName]);
    $result = $sql->fetch(PDO::FETCH_ASSOC); // fetch the result as an  associative array, where the columns are thought as keys, and the rows values are associated with these keys.
    $pricePerGram = $result['price_per_gram'] ?? 0;

    // Initialize the basket if it doesn't exist
    if (!isset($_SESSION['basket'])) {
        $_SESSION['basket'] = [];
    }

    // We check if the cheese is already in the basket
    if (isset($_SESSION['basket'][$cheeseName])) {
        // Increment the quantity for the existing item
        $_SESSION['basket'][$cheeseName]['quantity'] += 1;
    } else {
        // Add the new cheese with a quantity of 1 and the fetched unit price correlated to the cheese
        $_SESSION['basket'][$cheeseName] = [
            'quantity' => 1,
            'unit_price' => $pricePerGram,
            'name' => $cheeseName
        ];
    }

    // Redirect back to the cheese search view
    header('Location: ../view/cheeseSearchView.php');
    exit();
}


?>