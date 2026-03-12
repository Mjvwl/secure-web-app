<?php

/* DATABASE CONNECTION */

$host = "localhost";
$user = "root";
$password = "root123";
$database = "secure-web-app";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed");
}

/* CREATE POST */

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $content = $_POST['content'];

    /* INSERT POST */

    $stmt = $conn->prepare("INSERT INTO posts (username, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $content);
    $stmt->execute();
}

/* FETCH POSTS */

$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");

?>

<!DOCTYPE html>
<html>

<head>
<title>Posts</title>
</head>

<body>

<h2>Create Post</h2>

<form method="POST">

<input type="text" name="username" placeholder="Enter username" required>
<br><br>

<textarea name="content" placeholder="Write your post..." required></textarea>
<br><br>

<button type="submit" name="submit">Post</button>

</form>

<hr>

<h2>All Posts</h2>

<?php

while($row = $result->fetch_assoc()){

/* VULNERABLE: NO OUTPUT SANITIZATION */

echo "<p><b>" . $row['username'] . "</b>: " . $row['content'] . "</p>";

}

?>

</body>
</html>
