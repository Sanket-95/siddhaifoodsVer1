<?php
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    echo "Selected Product ID: " . $product_id;
} else {
    echo "No Product ID provided.";
}
?>
