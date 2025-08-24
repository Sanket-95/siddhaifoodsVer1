<?php
session_start();

echo "<h3>🛒 Your Cart:</h3>";
if (!empty($_SESSION['cart'])) {
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";
} else {
    echo "Cart is empty.";
}
?>
