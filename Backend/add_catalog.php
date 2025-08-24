<?php
include '../includes/db.php';

// Get selected category ID and product ID
$category_id = intval($_POST['catalog_category_id']);
$product_id = intval($_POST['catalog_id']);

// Get category name
$cat_result = $conn->query("SELECT name FROM categories WHERE id = $category_id");
$cat_row = $cat_result->fetch_assoc();
$category_name = preg_replace('/[^A-Za-z0-9_\-]/', '_', $cat_row['name']); // sanitize folder name

$target_dir = "../assets/images/$category_name"; // Use relative path for upload
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

foreach ($_FILES['catalog_images']['tmp_name'] as $key => $tmp_name) {
    if ($_FILES['catalog_images']['error'][$key] === UPLOAD_ERR_OK) {
        $original_name = basename($_FILES['catalog_images']['name'][$key]);
        $ext = pathinfo($original_name, PATHINFO_EXTENSION);
        $random_name = uniqid() . '_' . time() . '.' . $ext;
        $target_file = "$target_dir/$random_name";

        if (move_uploaded_file($tmp_name, $target_file)) {
            // Save only image name to DB
            $img_url = $conn->real_escape_string($random_name);
            $conn->query("INSERT INTO product_catalog (product_id, img_url) VALUES ($product_id, '$img_url')");
        }
    }
}

// Redirect or show success message
header("Location: ../add.php?success=1");
exit;
?>