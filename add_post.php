<?php
include "config.php";
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get content and escape for security
    $content = $conn->real_escape_string($_POST["content"]);
    $user = $_SESSION["username"];

    // Get the user ID
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_id = $result->fetch_assoc()["id"];

    // Insert the post into the database
    $stmt = $conn->prepare("INSERT INTO posts (user_id, content) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $content);
    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error: Could not post content.";
    }
}
?>
