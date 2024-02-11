<?php
// Assume user input (e.g., from a form)
$username = $_POST['username'];

// Connect to the database (replace with your actual database credentials)
$host = 'localhost';
$dbname = 'mydb';
$user = 'root';
$password = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Use a prepared statement
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Display user data (for demonstration purposes)
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "User ID: {$row['id']} | Username: {$row['username']}<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
