<?php
session_start(); // Added to the top, so it can either start or resume a session.
require_once "../model/placeOrder.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    
    <!-- This displays Basket Contents -->
    <h2>Your Basket</h2>
    <?php if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])): ?>
        <ul>
            <?php foreach ($_SESSION['basket'] as $cheeseName => $details): ?>
                <li>
                    <?= htmlspecialchars($cheeseName) ?> 
                    - Quantity: 
                    <?= htmlspecialchars($details['quantity']) ?>
                    - Unit Price:
                    <?= htmlspecialchars($details['unit_price']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Your basket is empty.</p>
    <?php endif; ?>

    <!-- Total price of all cheeses including the amount of quantities -->
    <?php $totalPrice = 0.00;

        // If the basket is set, loop through it to calculate the total price
        if (isset($_SESSION['basket']) && !empty($_SESSION['basket'])) {
            foreach ($_SESSION['basket'] as $details) {
                $totalPrice += $details['unit_price'] * $details['quantity'];
            }
        }
    ?>
    <h2>Total Price: <?= number_format($totalPrice, 2) ?></h2> <!-- Formatted to 2 decimal places as prices are like this -->

    <!-- Customer Information -->
    <h2>Enter Your Details</h2>
    <form action="../controller/placeOrder.php" method="GET">
        Name: <input type="text" name="customer_name" required><br>
        Address: <textarea name="address" required></textarea><br>
        Credit Card: <input type="number" name="credit_card" required><br>
        
        <!-- Place Order button, this will redirect to placeOrder.php file when clicked-->
        <button type="submit">Place Order</button>

        <!-- This is so that the total price can be inserted into the database when using the saveOrder() function in placeOrder.php -->
        <input type="hidden" name="total_price" value="<?= htmlspecialchars(number_format($totalPrice, 2)) ?>">

    </form>
</body>
</html>