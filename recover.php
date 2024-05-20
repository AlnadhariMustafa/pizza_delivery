<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $new_password = $conn->real_escape_string($_POST['new_password']);
    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = $conn->prepare("UPDATE users SET password_hash = ? WHERE username = ?");
    $sql->bind_param("ss", $password_hash, $username);
    if ($sql->execute()) {
        echo "Password reset successful!";
    } else {
        echo "Password reset failed: " . $sql->error;
    }
    $sql->close();
}
$conn->close();
?>

<form method="post" action="recover.php">
    Username: <input type="text" name="username" required><br>
    New Password: <input type="password" name="new_password" required><br>
    <input type="submit" value="Reset Password">
</form>
