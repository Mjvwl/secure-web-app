
?php

/* DATABASE CONNECTION */

$host = "localhost";
$user = "root";
$password = "root123";
$database = "secure-web-app";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed");
}

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id=$id";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
<title>View Post</title>
</head>

<body>

<h2>Post Details</h2>

<?php

$safeUser = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');
$safeContent = htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8');

echo "<p><b>$safeUser</b>: $safeContent</p>";

?>

</body>
</html>

