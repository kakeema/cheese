<!DOCTYPE html>
<?php
// For simplicity and less files to go through. I have put the PHP for searching cheeses here
require_once "../model/dataAccess.php";
require_once "../controller/addCheese.php";

try {
    $query = "SELECT * FROM cheeses";
    $results = $pdo->query($query);
    $cheeses = $results->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    // in case of error we handle the error
    die("Error retrieving cheeses: " . $e->getMessage());
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Cheese Management</title>
</head>
<body>
    <h1>Cheese Management</h1>

    <!-- Add Cheese Form -->
    <h2>Add New Cheese</h2>
    <form action="addCheese.php" method="get">
        <input type="text" name="name" placeholder="Cheese Name" required>
        <input type="text" name="type" placeholder="Type" required>
        <input type="text" name="country_of_origin" placeholder="Country of Origin" required>
        <input type="number" name="strength" placeholder="Strength (1-5)" min="1" max="5" required>
        <input type="text" name="price_per_gram" placeholder="Price per Gram" required>
        <button type="submit">Add Cheese</button>
        
    </form>

    <!-- Cheeses List -->
    <h2>Cheeses List</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Country of Origin</th>
                <th>Strength</th>
                <th>Price Per Gram</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- loops through cheeses and display them with edit and delete links next to it underneath the actions columns -->
            <?php if (isset($cheeses) && is_array($cheeses)): ?>
                <?php foreach ($cheeses as $cheese): ?>
                    <tr>
                        <td><?= htmlspecialchars($cheese['name']) ?></td>
                        <td><?= htmlspecialchars($cheese['type']) ?></td>
                        <td><?= htmlspecialchars($cheese['country_of_origin']) ?></td>
                        <td><?= htmlspecialchars($cheese['strength']) ?></td>
                        <td><?= htmlspecialchars($cheese['price_per_gram']) ?></td>
                        <td>
                            <a href="editCheese.php?id=<?= $cheese['id'] ?>">Edit</a>
                            <a href="deleteCheese.php?id=<?= $cheese['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No cheeses found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
