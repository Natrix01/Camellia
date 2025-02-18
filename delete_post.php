<?php
include "config.php";
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET["id"])) {
    // Sanitize the id parameter to ensure it's an integer
    $id = (int) $_GET["id"];
    
    // Delete the post from the database
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: dashboard.php");
?>
