<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // check if the user exists
  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $sql);

  if ($row = mysqli_fetch_assoc($result)) {
    // verify the password
    if ($password == $row['password']) {
      $_SESSION['username'] = $username;

      // check if visit count cookie exists, then increment it, otherwise set it to 1
      if (isset($_COOKIE['visit_count'])) {
        $visit_count = $_COOKIE['visit_count'] + 1;
      } else {
        $visit_count = 1;
      }

      // setting visit count cookie to expire in 30 days
      setcookie('visit_count', $visit_count, time() + (86400 * 30), "/");

      // cookie for Remember Me
      if (isset($_POST['rememberMe'])) {
        setcookie("username", $username, time() + (86400 * 30), "/");
      }

      header("Location: profile.php");
    } else {
      echo "Invalid credentials.\n";
      echo ($password."SQL PASSWORD: ".$row['password']);
    }
  } else {
    echo "User not found.";
  }
}
?>
