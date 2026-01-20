<?php

require 'session.php';
require 'db.php';

$user_email = '';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Use prepared statements to prevent SQL injection
$sql = "SELECT email FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if ($user) {
    $user_email = htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8');
} else {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        button { padding: 10px 20px; cursor: pointer; }
        a { text-decoration: none; }
    </style>
</head>
<body>

<h1>Welcome to my site</h1>
<?php if ($user_email): ?>
    <p>Logged In User: <?php echo $user_email; ?></p>
    <a href="logout.php"><button>Logout</button></a>
<?php endif; ?>

</body>
</html>