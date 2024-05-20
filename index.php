<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pizza Delivery Service</title>
</head>
<body>
    <h1>Pizza Delivery Service</h1>
    <p>Welcome to our Pizza Delivery Service. Please select an option below:</p>
    <ul>
        <?php if (isset($_SESSION['username'])): ?>
            <li><a href="order.php">Order Pizza</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="recover.php">Recover Password</a></li>
        <?php endif; ?>
    </ul>
</body>
</html>
