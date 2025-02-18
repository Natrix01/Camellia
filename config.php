<?php
$conn = new mysqli("localhost", "root", "", "cafe_camellia");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
