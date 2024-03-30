<?php
require_once "../model/dataAccess.php";
session_start();

if (isset($_GET['username'], $_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $adminUsername = "Admin01"; // The admin username I created

    try {
        $query = "SELECT username, password FROM WEBOEAccounts WHERE username = ?"; 
        $result = $pdo->prepare($query);
        $result->execute([$username]);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) { // Will check if the user entered a valid username and password that exists in the database
            $_SESSION['user'] = $user['username'];
            
            if ($username === $adminUsername) { // checks if the user entered Admin01 for their username
                // This means the user is the admin so we redirect them to the admin version of the page
                header('Location: ../view/adminCheeseSearchView.php');
                exit();
            } else {
                // This means the user is not an admin so we redirect them to the normal version of the page.
                header('Location: ../view/cheeseSearchView.php');
                exit();
            }
        } else {
            // Invalid username or password
            header('Location: ../view/loginView.php?error=' . urlencode("Invalid username or password."));
            exit();
        }
    } catch (Exception $e) {
        // Error handling
        header('Location: ../view/loginView.php?error=' . urlencode("An error occurred."));
        exit();
    }
} else {
    // In the case that not all fields are filled in
    header('Location: ../view/loginView.php?error=' . urlencode("Please fill in all fields."));
    exit();
}
?>
