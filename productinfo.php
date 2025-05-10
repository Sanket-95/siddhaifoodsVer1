<?php include('includes/db.php'); ?>
<?php
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $category_id = isset($_GET['catid']) ? intval($_GET['catid']) : null;
} else {
    // echo "No Product ID provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Siddhai Foods</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>
<?php
// Get product details from DB
$product_query = $conn->query("SELECT * FROM products WHERE id = $product_id");
$product = $product_query->fetch_assoc();
?>

<div class="container my-5">
  <div class="row shadow rounded overflow-hidden p-4 align-items-center" style="background-color: #fff;">
    
    <!-- Image Column (50%) -->
    <div class="col-md-6 d-flex justify-content-center align-items-center" style="min-height: 300px;">
      <img src="assets/images/<?php echo $product['image']; ?>" class="img-fluid rounded" alt="<?php echo $product['name']; ?>" style="max-height: 300px;">
    </div>

    <!-- Product Info Column (50%) -->
    <div class="col-md-6">
      <h2 class="mb-3"><?php echo $product['name']; ?></h2>
      <h4 class="text-success">₹<?php echo $product['price']; ?></h4>
      <?php if ($product['mrp'] && $product['mrp'] > 0): ?>
        <p class="text-muted">
          <small>MRP: <del>₹<?php echo $product['mrp']; ?></del></small>
        </p>
     <p class="text-muted small mb-3"><?php echo $product['description']; ?></p>
      <?php endif; ?>

     <!-- Buttons Row -->
<div class="mt-4 d-flex flex-wrap align-items-center gap-3">

  <!-- Add to Cart Button -->
 <button class="btn btn-danger btn-lg">
  <i class="bi bi-cart me-2"></i> Add to Cart
</button>
    <!-- Facebook Icon Box -->
<div class="p-2 bg-primary text-white d-inline-block rounded text-center">
  <i class="bi bi-facebook fs-4"></i>
</div>

<!-- WhatsApp Icon Box -->
<div class="p-2 bg-success text-white d-inline-block rounded text-center ms-2">
  <i class="bi bi-whatsapp fs-4"></i>
</div>
    </div>
    </div>
  </div>
</div>

  <div class="container">
    <h5>Related Products</h5>
    <hr class="mt-1 mb-4" style="height: 3px; background-color: #000; opacity: 1;">

     <div class="row">
      <?php
        // Pagination setup
        $limit = 8;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        // Category filter
        $category_filter = '';
        $category_id = isset($_GET['catid']) ? intval($_GET['catid']) : null;
        if ($category_id) {
            $category_filter = "WHERE category_id = $category_id";
        }

        // Get total products for pagination
        $count_res = $conn->query("SELECT COUNT(*) AS total FROM products $category_filter");
        $total = $count_res->fetch_assoc()['total'];
        $pages = ceil($total / $limit);

        // Fetch products
        $product_res = $conn->query("SELECT * FROM products $category_filter LIMIT $start, $limit");
       if (!$product_res) {
            echo "Error: " . $conn->error;
        }
        while ($row = $product_res->fetch_assoc()) {
      ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="cursor:pointer;" onclick="window.location.href='productinfo.php?id=<?php echo $row['id']; ?>'">
        <img src="assets/images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['name']; ?></h5>
          <p class="card-text">
            ₹<?php echo $row['price']; ?> 
            <?php if ($row['mrp'] && $row['mrp'] > 0): ?>
              &nbsp; <small class="text-muted">MRP: <del>₹<?php echo $row['mrp']; ?></del></small>
            <?php endif; ?>
          </p>
          <p class="card-text text-muted small"><?php echo $row['description']; ?></p>
          <div class="mt-3 text-primary d-flex align-items-center gap-2">
          <i class="bi bi-eye-fill"></i>
        <span>View Product</span>
      </div>
        </div>
      </div>
    </div>
      <?php } ?>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>