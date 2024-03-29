<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// This ensures that the session is started and the basket can be stored in the session. But, this should already be started because of the cheeseController.php running first in the cheeseSearchView.php file.
// In the case it isn't for some reason running first, I added this if check to check this, and create a new session to be ran.
// 

require_once "../model/cheeseModel.php";
require_once "../model/dataAccess.php";

// Check if the Add to Basket button was clicked and the cheese ID is set
        if (isset($_GET['add_to_basket']) && isset($_GET['cheese_name'])) 
        {
            $cheeseName = $_GET['cheese_name']; // Grabs the name of the cheese that will be added

            // Initialize the basket if it doesn't exist
            if (!isset($_SESSION['basket'])) {
                $_SESSION['basket'] = [];
            }

            // Add the cheese to the basket or update the quantity
            if (!isset($_SESSION['basket'][$cheeseName])) {
                $_SESSION['basket'][$cheeseName] = 1; // Adds the new item, displaying name, and a quantity which will start with 1.
            } else {
                $_SESSION['basket'][$cheeseName] += 1; // Increments the quantity by 1, each time the same item gets added to the basket.
            }

            // Redirect back to the cheese search view
            header('Location: ../view/cheeseSearchView.php');
            exit();
        }

?>