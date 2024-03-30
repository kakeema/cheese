<?php
require_once "../model/dataAccess.php";

if (isset($_GET['firstName'], $_GET['surname'], $_GET['email'], $_GET['username'], $_GET['password'])) {
    $firstName = $_GET['firstName'];
    $surname = $_GET['surname'];
    $email = $_GET['email'];
    $username = $_GET['username'];
    $password = $_GET['password'];



    // Hash the password, for security reasons
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // This inserts the new user into the database
    try {
        $query = "INSERT INTO WEBOEAccounts (username, surname, firstName, email, password) VALUES (?, ?, ?, ?, ?)";
        $results = $pdo->prepare($query);
        $results->execute([$username, $surname, $firstName, $email, $hashedPassword]);

        header('Location: ../view/loginView.php?success=1');
    } 
    catch(Exception $e) {
        header('Location: ../view/registerView.php?error=' . urlencode($e->getMessage()));   
    }
    exit();

}
?>

