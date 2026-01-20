<?php

require 'db.php';

$message = '';
$error = '';

try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Input validation and sanitization
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = !empty($_POST['password']) ? $_POST['password'] : null;

        // Validate inputs
        if (!$email) {
            $error = 'Invalid email address';
        } elseif (!$password || strlen($password) < 6) {
            $error = 'Password must be at least 6 characters';
        } else {
            // Hash password using password_hash
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Use prepared statements to prevent SQL injection
            $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email, $password_hash]);

            $message = "User signed up successfully. Redirecting to login...";
            header('refresh: 2; url=login.php');
        }
    }

} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        $error = 'Email already exists';
    } else {
        $error = 'Something went wrong.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        form { max-width: 400px; }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        button { padding: 10px 20px; cursor: pointer; }
        .error { color: red; margin: 10px 0; }
        .success { color: green; margin: 10px 0; }
        a { margin-top: 20px; display: inline-block; }
    </style>
</head>
<body>

<h2>Signup</h2>

<?php if ($message): ?>
    <p class="success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>

<?php if ($error): ?>
    <p class="error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>

<form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br>

    <button type="submit">Signup</button>
</form>

<br>
<a href="login.php">Go to Login</a>

</body>
</html>