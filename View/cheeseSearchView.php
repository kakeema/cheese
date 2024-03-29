<!DOCTYPE html>
<<<<<<< HEAD
<?php require_once "../controller/cheeseController.php"; ?>
<?php require_once "../controller/addToBasket.php"; ?>

=======
<<<<<<< HEAD
<?php require_once "../controller/cheeseController.php"; ?>
>>>>>>> 35a57f9e3bc58f7115bf534ffd7e21c6f446bd69
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cheeses</title>
<<<<<<< HEAD
</head>
<body>
    <h2>Search for Cheeses</h2>
    <form id="searchForm" method="GET" action="../controller/cheeseController.php">
        Name: <input type="text" id="name" name="name">
        Type: <select id="type" name="type">
=======
=======
<?php ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Cheeses</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Additional head elements -->
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943
</head>
<body>
    <h2>Search for Cheeses</h2>
    <form id="searchForm">
        Name: <input type="text" id="name">
        Type: <select id="type">
<<<<<<< HEAD
>>>>>>> 35a57f9e3bc58f7115bf534ffd7e21c6f446bd69
                <option value="">Any</option>
                <option value="Hard">Hard</option>
                <option value="Soft">Soft</option>
            </select>
<<<<<<< HEAD
        Country of Origin: <input type="text" id="country" name="country">
        Strength: <input type="number" id="strength" min="1" max="5" name="strength">
        Price per Gram: <input type="text" id="price" name="price">
        <button type="submit" id="searchButton">Search</button>
    </form>
=======
=======
            <option value="">Any</option>
            <option value="Hard">Hard</option>
            <option value="Soft">Soft</option>
        </select>
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943
        Country of Origin: <input type="text" id="country">
        Strength: <input type="number" id="strength" min="1" max="5">
        Price per Gram: <input type="text" id="price">
        <button type="button" id="searchButton">Search</button>
    </form>
<<<<<<< HEAD
>>>>>>> 35a57f9e3bc58f7115bf534ffd7e21c6f446bd69
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
<<<<<<< HEAD
                            <td>
                                <form method="POST" action="../controller/addToBasket.php">
                                    <input type="hidden" name="cheese_name" value="<?= htmlspecialchars($cheese->getName()) ?>">
                                    <input type="submit" name="add_to_basket" value="Add to Basket">
                                </form>
                            </td>
=======
>>>>>>> 35a57f9e3bc58f7115bf534ffd7e21c6f446bd69
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                
            </tbody>
        </table>
    </div>
<<<<<<< HEAD

    <h2>Your Basket</h2>
    
    <div id="basket">
        <?php if (isset($_SESSION['basket']) && count($_SESSION['basket']) > 0): ?>
            <table>
                <!-- ... thead section ... -->
                <tbody>
                    <?php foreach ($_SESSION['basket'] as $cheeseName => $quantity): ?>
                        <tr>
                            <td><?= htmlspecialchars($cheeseName) ?></td>
                            <td><?= htmlspecialchars($quantity) ?></td>
                            <td>
                                <!-- Add form or link to update quantity/remove from basket -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Your basket is empty.</p>
        <?php endif; ?>
    </div>
    
=======
=======
    <div id="results"></div>
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943
>>>>>>> 35a57f9e3bc58f7115bf534ffd7e21c6f446bd69

    <script src="searchCheeses.js"></script>
</body>
</html>
