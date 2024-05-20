<?php
include 'config.php';
include 'csrf_token.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (verifyToken($_POST['csrf_token'])) {
        $pizza_type = $conn->real_escape_string($_POST['pizza_type']);
        $quantity = $conn->real_escape_string($_POST['quantity']);
        $username = $_SESSION['username'];

        $sql = $conn->prepare("INSERT INTO orders (username, pizza_type, quantity) VALUES (?, ?, ?)");
        $sql->bind_param("ssi", $username, $pizza_type, $quantity);
        if ($sql->execute()) {
            echo "Order placed successfully!";
        } else {
            echo "Order failed: " . $sql->error;
        }
        $sql->close();
    } else {
        echo "Invalid CSRF token.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Pizza</title>
</head>
<body>
    <h1>Order Pizza</h1>
    <form method="post" action="order.php">
        <input type="hidden" name="csrf_token" value="<?php echo generateToken(); ?>">
        Pizza Type: 
        <select name="pizza_type" required>
            <option value="Margherita">Margherita</option>
            <option value="Pepperoni">Pepperoni</option>
            <option value="Veggie">Veggie</option>
        </select><br>
        Quantity: <input type="number" name="quantity" required><br>
        <input type="submit" value="Place Order">
    </form>
</body>
</html>
