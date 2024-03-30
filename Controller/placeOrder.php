<?php
session_start(); 
require_once "../model/dataAccess.php";

if (isset($_GET['customer_name'], $_GET['address'], $_GET['total_price'], $_GET['credit_card'])) {
    $customerName = $_GET['customer_name'];
    $address = $_GET['address'];
    $totalPrice = $_GET['total_price']; // Not secured to ensure this is a float type of data.
    $creditCard = $_GET['credit_card']; // Not secured since another 'developer' will supposedly do this.

    // Saving the order
    $orderId = saveOrder($customerName, $address, $_SESSION['basket'], $pdo, $totalPrice);
    
    $basket = isset($_SESSION['basket']) ? $_SESSION['basket'] : []; // Basically an if else statmenet if I forget
    //isset($_SESSION['basket']) checks if the $_SESSION['basket'] variable is set and not null.
    //If $_SESSION['basket'] is set and not null, then $basket will be assigned the value of $_SESSION['basket'].
    // If $_SESSION['basket'] is not set or null, then $basket will be assigned an empty array.
    
    
    // The unset function will clear the basket
    unset($_SESSION['basket']);

    $_SESSION['order_placed'] = "Your order has been received! Thank you."; // Appears in the cheeseSearchView.php file when the order is successful.
     // Redirect back to main page but, with confirmation when the order has been placed
    header("Location: ../view/cheeseSearchView.php");
    exit();
}
function saveOrder($customerName, $address, $basket, $pdo, $totalPrice) {
    // $cheeseNames = []; Not sure if will use this for now.
    $totalQuantity = array_sum(array_column($basket, 'quantity'));

    //  Since I dont need to find the names of each cheese I might not need this anymore to get the totalQuantity
   // foreach ($basket as $details) {
    //    $totalQuantity += $details['quantity']; // Adding all cheeses quantity together.
        // $cheeseNames[] = $details['name']; // Stores the name of the current cheese into the array
    //}

    // I have for now removed the cheese_name column from the database so I don't know if I will use this again
   // $cheeseNamesStr = implode(", ", $cheeseNames); // The implode function will add all the cheeses together.
    //$cheeseNamesStr = substr($cheeseNamesStr, 0, 255); // This ensures that does not go above 255, as this is the maximum of the database size for the cheese_name column.

    $query = "INSERT INTO orders (quantity, total_price, customer_name, address, credit_card) 
              VALUES (?, ?, ?, ?, ?)";
    
    $result = $pdo->prepare($query);

    $result->execute([
        // $cheeseNamesStr,  Removed for now since I removed cheese_name column from the order table in the database.
        $totalQuantity, 
        $totalPrice, 
        $customerName, 
        $address, 
        $_GET['credit_card'] // tasked to not care too much about this as another 'Developer' will do this.
    ]);

    return $pdo->lastInsertId(); // This allows me to retrieve the last added ID in the order table.
    // This is because I am using a random number generation for the id in my database.
}


//  Don't think I will approach it like this anymore to get the total price per cheese.
// function getPricePerUnit() 
// {
//     return 1; // Left like this for now modify later if needed
// }

