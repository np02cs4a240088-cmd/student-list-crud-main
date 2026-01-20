<?php
// index.php - Entry point for the secure login system

require 'session.php';

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Secure Login System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 100px auto;
            text-align: center;
            max-width: 600px;
        }
        .container {
            background: #f5f5f5;
            padding: 40px;
            border-radius: 8px;
        }
        a {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome to the Secure Login System</h1>
    <p>A workshop project demonstrating PHP security best practices.</p>
    
    <a href="signup.php">Sign Up</a>
    <a href="login.php">Login</a>
</div>
</body>
</html>
