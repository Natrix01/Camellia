<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

include "config.php"; 
$user = $_SESSION["username"];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT posts.id, posts.content FROM posts JOIN users ON posts.user_id = users.id WHERE users.username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

?>

<h2>Welcome to Cafe Camellia, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
<a href="logout.php">Logout</a>

<h3>Add a New Post</h3>
<form action="add_post.php" method="post">
    <textarea name="content" placeholder="Write something..."></textarea><br>
    <button type="submit">Post</button>
</form>

<h3>Your Posts</h3>
<?php
// Display each post with a delete option
while ($row = $result->fetch_assoc()) {
    echo "<p>" . htmlspecialchars($row['content']) . " <a href='delete_post.php?id=" . $row['id'] . "'>Delete</a></p>";
}
?>
