<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
}

$theme = $_COOKIE['theme'] ?? "light";
?>

<style>
body {
    background-color: <?php echo ($theme == "dark") ? "black" : "white"; ?>;
    color: <?php echo ($theme == "dark") ? "white" : "black"; ?>;
}
</style>

<h2>Welcome to Student Dashboard</h2>

<a href="preference.php">Change Theme</a><br>
<a href="logout.php">Logout</a>
