<!DOCTYPE html>
<<<<<<< HEAD
<?php require_once "../controller/cheeseController.php";
require_once "../controller/addToBasket.php";
// session_start();
?>
=======
<?php require_once "../controller/cheeseController.php"; ?>
<?php require_once "../controller/addToBasket.php"; ?>
>>>>>>> dae10a34887edd11854bf7e4cc610b1aa6e65bbe

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cheeses</title>
</head>
<body>
<<<<<<< HEAD

     <!-- This will display the message when an order has been placed -->
     <?php if (isset($_SESSION['order_placed'])): ?>
        <p style="color:green;"><?= htmlspecialchars($_SESSION['order_placed']); ?></p>
        <?php unset($_SESSION['order_placed']); ?>
    <?php endif; ?>

    <!-- Search for cheese inputs -->
=======
>>>>>>> dae10a34887edd11854bf7e4cc610b1aa6e65bbe
    <h2>Search for Cheeses</h2>
    <form id="searchForm" method="GET" action="../controller/cheeseController.php">
        Name: <input type="text" id="name" name="name">
        Type: <select id="type" name="type">
                <option value="">Any</option>
                <option value="Hard">Hard</option>
                <option value="Soft">Soft</option>
            </select>
        Country of Origin: <input type="text" id="country" name="country">
        Strength: <input type="number" id="strength" min="1" max="5" name="strength">
        Price per Gram: <input type="text" id="price" name="price">
        <button type="submit" id="searchButton">Search</button>
    </form>
    <div id="results">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Country of Origin</th>
                    <th>Strength</th>
                    <th>Price Per Gram</th>
                </tr>
            </thead>
            <tbody>
                <!-- Check if cheeses variable is set -->
                <!-- The isset() function is used to check if a variable has been set and is not NULL. Returns either true or false -->
                <?php if (isset($controller->cheeses)): ?> <!-- this function will check if the property cheeses was successfully set with data, this will always be true unless there is no data in my database, 
                    which is done because of the function fetchInitialCheeses() when we instaniate the class-->
                    <?php foreach($controller->cheeses as $cheese): ?> 
                        <tr>
                            <!-- htmlspecialchars() turns characters (from the return of the php function), that are considered special in HTML, into string instead-->
                            <td><?= htmlspecialchars($cheese->getName()) ?></td>  <!-- Self explanatory-->
                            <td><?= htmlspecialchars($cheese->getType()) ?></td>
                            <td><?= htmlspecialchars($cheese->getCountryOfOrigin()) ?></td>
                            <td><?= htmlspecialchars($cheese->getStrength()) ?></td>
                            <td><?= htmlspecialchars($cheese->getPricePerGram()) ?></td>
                            <td>
                                <form method="GET" action="../controller/addToBasket.php">
                                    <input type="hidden" name="cheese_name" value="<?= htmlspecialchars($cheese->getName()) ?>">
                                    <input type="submit" name="add_to_basket" value="Add to Basket">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                
            </tbody>
        </table>
    </div>

    <h2>Your Basket</h2>
    
    <div id="basket">
        <?php if (isset($_SESSION['basket']) && count($_SESSION['basket']) > 0): ?>
            <table>
<<<<<<< HEAD
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
                <tbody>
                    <?php foreach ($_SESSION['basket'] as $cheeseName => $details): ?>
                        <tr>
                            <td><?= htmlspecialchars($cheeseName) ?></td>
                            <td><?= htmlspecialchars($details['quantity']) ?></td> <!-- With this we are now able to access the quantity from the details array -->
                            <td>
                                <!-- Here I will update quantity/remove from basket, may not do this in the same file but, create a replicate of this file but with the ability to add and remove cheeses for an admin user -->
=======
                <!-- ... thead section ... -->
                <tbody>
                    <?php foreach ($_SESSION['basket'] as $cheeseName => $quantity): ?>
                        <tr>
                            <td><?= htmlspecialchars($cheeseName) ?></td>
                            <td><?= htmlspecialchars($quantity) ?></td>
                            <td>
                                <!-- Add form or link to update quantity/remove from basket -->
>>>>>>> dae10a34887edd11854bf7e4cc610b1aa6e65bbe
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Your basket is empty.</p>
        <?php endif; ?>
    </div>
<<<<<<< HEAD
    <form action="checkout.php" method="GET">
        <button type="submit" id="buyButton">Buy</button>
    </form>
=======
    
>>>>>>> dae10a34887edd11854bf7e4cc610b1aa6e65bbe

    <script src="searchCheeses.js"></script>
</body>
</html>
