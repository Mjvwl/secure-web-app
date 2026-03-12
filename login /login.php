
<?php
echo "Login feature page";
?>


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

/* SQL Injection FIXED version */

$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bind_param("ss",$username,$password);
$stmt->execute();

$result = $stmt->get_result();

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

