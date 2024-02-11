<?php
// Vulnerable PHP code with SQL injection

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

    // Vulnerable query (no input validation or prepared statements)
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $pdo->query($sql);

    // Display user data (for demonstration purposes)
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "User ID: {$row['id']} | Username: {$row['username']}<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
