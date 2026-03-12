
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

$keyword = "";

if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
}

$sql = "SELECT * FROM posts WHERE content LIKE '%$keyword%'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Search Posts</title>
</head>

<body>

<h2>Search Posts</h2>

<form method="GET">

<input type="text" name="keyword" placeholder="Search posts">
<button type="submit">Search</button>

</form>

<hr>

<?php

while($row = $result->fetch_assoc()){

    $safeUser = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');
    $safeContent = htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8');

    echo "<p><b>$safeUser</b>: $safeContent</p>";

    echo "<a href='view.php?id=".$row['id']."'>View Post</a>";

    echo "<hr>";
}

?>

</body>
</html>
