<!DOCTYPE html>
<?php ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Cheeses</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Additional head elements -->
</head>
<body>
    <h2>Search for Cheeses</h2>
    <form id="searchForm">
        Name: <input type="text" id="name">
        Type: <select id="type">
            <option value="">Any</option>
            <option value="Hard">Hard</option>
            <option value="Soft">Soft</option>
        </select>
        Country of Origin: <input type="text" id="country">
        Strength: <input type="number" id="strength" min="1" max="5">
        Price per Gram: <input type="text" id="price">
        <button type="button" id="searchButton">Search</button>
    </form>
    <div id="results"></div>

    <script src="searchCheeses.js"></script>
</body>
</html>
