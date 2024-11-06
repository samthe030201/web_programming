<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.html");
  exit();
}
$username = $_SESSION['username'];
$visit_count = isset($_COOKIE['visit_count']) ? $_COOKIE['visit_count'] : 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>This is your profile page.</p>
    <p>You have visited this page <strong><?php echo $visit_count; ?></strong> times.</p>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
