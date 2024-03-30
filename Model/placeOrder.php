<?php
// session_start(); Not needed as I am using it in checkout.php
require_once "../model/dataAccess.php";

if (isset($_GET['customer_name']) && isset($_GET['address'])) {
    $customerName = $_GET['customer_name'];
    $address = $_GET['address'];
    $basket = isset($_SESSION['basket']) ? $_SESSION['basket'] : [];

    // Implement the saving logic here. Below is a stubbed example.
    $orderId = saveOrder($customerName, $address, $basket, $pdo);

    // The unset function will clear the basket
    unset($_SESSION['basket']);

    $_SESSION['order_placed'] = "Your order has been received! Thank you.";
     // Redirect back to main page but, with confirmation when the order has been placed
    header("Location: ../view/cheeseSearchView.php");
    exit();
}

function saveOrder($customerName, $address, $basket, $pdo) {
    $orderId = rand(); // Randomizes an order ID. 
    foreach ($basket as $cheeseName => $quantity) {
        $query = "INSERT INTO orders (order_id, cheese_name, quantity, customer_name, address) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$orderId, $cheeseName, $quantity, $customerName, $address]);
    }
    return $orderId;
}
