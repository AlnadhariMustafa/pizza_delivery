<?php
function generateToken() {
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['token'];
}

function verifyToken($token) {
    return hash_equals($_SESSION['token'], $token);
}
?>
