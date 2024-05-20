<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = $conn->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
    $sql->bind_param("ss", $username, $password_hash);
    if ($sql->execute()) {
        echo "Registration successful!";
    } else {
        echo "Registration failed: " . $sql->error;
    }
    $sql->close();
}
$conn->close();
?>

<form method="post" action="register.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>
