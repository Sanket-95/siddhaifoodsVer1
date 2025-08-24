<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['product_id']);
    $action = $_POST['action'];

    // Initialize cart if not present
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Ensure product is tracked
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 0;
    }

    // Handle actions
    if ($action === 'increase') {
        $_SESSION['cart'][$product_id]++;
    } elseif ($action === 'decrease') {
        $_SESSION['cart'][$product_id]--;
        if ($_SESSION['cart'][$product_id] <= 0) {
            unset($_SESSION['cart'][$product_id]);
        }
    }

    $count = $_SESSION['cart'][$product_id] ?? 0;

    // ✅ Return full cart for debugging
    echo json_encode([
        'count' => $count,
        'cart' => $_SESSION['cart']
    ]);
    exit;
}
?>
