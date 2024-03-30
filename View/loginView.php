<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Cheese Shop</title>
</head>
<body>
    <h1>Login to Your Account</h1>
    <!-- In case of error -->
    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;"><?= htmlspecialchars($_GET['error']) ?></p>
    <?php endif; ?>
    <!-- if user successfuly created an account it will be displayed in the login view page page-->
    <?php if (isset($_GET['success'])): ?>
        <p style="color: green;">Account successfully created. Please login.</p>
    <?php endif; ?>

    <form action="../controller/loginController.php" method="get">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="registerView.php">Register here</a></p>
</body>
</html>
