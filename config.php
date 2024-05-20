<?php
// Set secure session cookie parameters before starting the session
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Ensure to use HTTPS
ini_set('session.use_strict_mode', 1);

// Start the session
session_start();

// Regenerate session ID to prevent session fixation
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = ''; // empty if no password is set
$dbName = 'pizza_delivery';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
