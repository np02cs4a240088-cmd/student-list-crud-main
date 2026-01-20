<?php
// logout.php - Securely destroy the session

require 'session.php';

// Destroy session to log out the user
session_destroy();

// Redirect to login page
header('Location: login.php');
exit;
?>
