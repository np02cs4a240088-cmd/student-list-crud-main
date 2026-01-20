<?php
// session.php - Secure session configuration

// Configure session cookie parameters before starting the session
session_set_cookie_params([
    'lifetime' => 0,        // Session ends when browser closes
    'path' => '/',
    'domain' => null,
    'secure' => true,       // HTTPS only
    'httponly' => true,     // Not accessible via JavaScript
    'samesite' => 'Lax'     // CSRF protection
]);

// Start the session
session_start();

// Regenerate session ID periodically to prevent session fixation
if (!isset($_SESSION['last_regeneration'])) {
    $_SESSION['last_regeneration'] = time();
} elseif (time() - $_SESSION['last_regeneration'] > 300) { // Regenerate every 5 minutes
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}
?>
