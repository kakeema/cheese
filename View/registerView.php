<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Cheese Shop</title>
</head>
<body>
    <h1>Register for an Account</h1>

    <form action="../controller/registerController.php" method="get">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Create Account</button>
    </form>

    <p>Already have an account? <a href="loginView.php">Login here</a></p>
</body>
</html>


