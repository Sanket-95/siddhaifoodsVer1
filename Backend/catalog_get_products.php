<?php
include '../includes/db.php';
$category_id = intval($_GET['category_id']);
$result = $conn->query("SELECT DISTINCT id, name FROM products WHERE category_id = $category_id");
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
header('Content-Type: application/json');
echo json_encode($products);
?>