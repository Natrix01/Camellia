<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password are set in the POST data
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful! <a href='login.php'>Login here</a>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Please fill in both the username and password.";
    }
}
?>
