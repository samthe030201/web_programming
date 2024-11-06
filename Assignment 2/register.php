<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
)";
mysqli_query($conn, $sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['newUsername'];
  $password = $_POST['newPassword'];
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  if (mysqli_query($conn, $sql)) {
    echo "Registration successful. <a href='index.html'>Login here</a>.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>
