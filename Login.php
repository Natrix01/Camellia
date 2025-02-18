<?php
include "config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Debugging output: Check the submitted values
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Password: " . htmlspecialchars($password) . "<br>";

    // Check if user exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Successful login
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>
