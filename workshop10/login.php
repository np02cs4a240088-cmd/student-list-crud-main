<?php

require 'session.php';
require 'db.php';

$error = '';

try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Input validation and sanitization
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = !empty($_POST['password']) ? $_POST['password'] : null;

        // Check if inputs are valid
        if (!$email || !$password) {
            $error = 'Invalid email or password';
        } else {
            // Use prepared statements to prevent SQL injection
            $sql = "SELECT id, password FROM users WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            // Use password_verify to check hashed password
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                session_regenerate_id(true);
                header('Location: dashboard.php');
                exit;
            } else {
                // Generic error message to prevent user enumeration
                $error = 'Invalid email or password';
            }
        }
    }

} catch (Exception $e) {
    $error = "Something went wrong.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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

<h2>Login</h2>

<?php if ($error): ?>
    <p class="error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
<?php endif; ?>

<form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br>

    <button type="submit">Login</button>
</form>
<br>
<a href="signup.php">Go to Signup</a>
</body>
</html>