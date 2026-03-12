<?php

$host = "localhost";
$user = "root";
$password = "root123";
$database = "secure-web-app";

$conn = new mysqli($host,$user,$password,$database);

if($conn->connect_error){
    die("Database connection failed");
}

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

/* VULNERABLE QUERY */

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$result = $conn->query($query);

if($result->num_rows > 0){
    echo "Login successful";
}else{
    echo "Invalid credentials";
}

}

?>

<form method="POST">

<input type="text" name="username" placeholder="username">

<input type="password" name="password" placeholder="password">

<button type="submit" name="login">Login</button>

</form>
