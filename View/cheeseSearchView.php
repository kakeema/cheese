<!DOCTYPE html>
<<<<<<< HEAD
<?php require_once "../controller/cheeseController.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cheeses</title>
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
                <option value="">Any</option>
                <option value="Hard">Hard</option>
                <option value="Soft">Soft</option>
            </select>
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
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                
            </tbody>
        </table>
    </div>
=======
    <div id="results"></div>
>>>>>>> 15af2941cb2a922f9a5b85efd9e76772d9b73943

    <script src="searchCheeses.js"></script>
</body>
</html>
