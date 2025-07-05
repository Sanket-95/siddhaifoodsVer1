<?php include('includes/db.php'); ?>
<?php
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $category_id = isset($_GET['catid']) ? intval($_GET['catid']) : null;
}
?>

<!-- Whats app chat -->
<?php
// Define phone number (with country code, no + or spaces)
$phone = "917888187782"; 

// Define the message you want to prefill in WhatsApp
$message = urlencode("Hello, I want to chat with you!");

// Generate the WhatsApp URL
$wa_url = "https://wa.me/$phone?text=$message";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Siddhai Foods</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
    }

    .navbar {
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .nav-tabs .nav-link {
      color: #555;
      border: none;
      border-radius: 20px;
      margin-right: 8px;
      transition: 0.3s;
    }

    .nav-tabs .nav-link.active {
      background-color: #ff6b6b;
      color: #fff;
    }

    .nav-tabs .nav-link:hover {
      background-color: #f8d7da;
      color: #000;
    }

    .carousel-inner img {
      border-radius: 12px;
    }

    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      height: 300px;
      object-fit: contain;
    }

    .card-title {
      font-weight: bold;
      font-size: 18px;
    }

    .card-text {
      font-size: 14px;
      border-bottom:1px solid #F1EFEC;
    }

    .pagination .page-link {
      border-radius: 30px;
      margin: 0 5px;
      transition: 0.3s;
    }

    .pagination .page-link:hover {
      background-color: #ff6b6b;
      color: white;
    }

    .pagination .active .page-link {
      background-color: #ff6b6b;
      border-color: #ff6b6b;
    }
    #mainProductImage {
    transition: transform 0.3s ease; /* Smooth transition */
    cursor: zoom-in; /* Optional: changes cursor on hover */
    }

  #mainProductImage:hover {
    transform: scale(1.20); /* Zoom in */
  }
    .catalog-thumb:hover {
      border: 2px solid #ff6b6b;
    }
  </style>
  <link href="assets/style.css" rel="stylesheet">
</head>
<body>
  <?php include 'includes/navbar.php'; ?>

  <?php
    $product_query = $conn->query("SELECT * FROM products WHERE id = $product_id");
    $product = $product_query->fetch_assoc();
  ?>

  <div class="px-3 px-sm-4 px-md-5 my-5">
    <div class="row shadow rounded overflow-hidden p-4 align-items-center" style="background-color: #fff;">

      <!-- Image Column -->
      <div class="col-md-6 d-flex flex-column align-items-center" style="min-height: 300px;">
        <!-- <img id="mainProductImage" src="assets/images/ php echo $product['image']; ?>" class="img-fluid rounded" alt="php echo $product['name']; ?>" style="max-height: 300px;"> -->
        <img id="mainProductImage" src="assets/images/<?php echo $product['image']; ?>" 
          class="img-fluid rounded" 
          alt="<?php echo $product['name']; ?>" 
          style="max-height: 300px;">
        <!-- 🔄 Catalog Image Section -->
        <?php
        // Fetch up to 5 other images from same category if available
        $related_query = $conn->query("SELECT image FROM products WHERE id = $product_id 
                                      UNION 
                                      SELECT img_url AS image FROM product_catalog WHERE product_id = $product_id");
        ?>
        <div class="mt-4 overflow-auto d-flex flex-nowrap w-100 justify-content-center" style="gap: 10px;">
          <?php while ($catalog = $related_query->fetch_assoc()): ?>
            <img src="assets/images/<?php echo $catalog['image']; ?>" 
                 class="img-thumbnail catalog-thumb"
                 style="height: 70px; width: 70px; object-fit: cover; cursor: pointer;"
                 onclick="document.getElementById('mainProductImage').src = this.src;">
          <?php endwhile; ?>
        </div>
      </div>

      <!-- Product Info Column -->
      <div class="col-md-6">
        <h2 class="mb-3"><?php echo $product['name']; ?></h2>
        <h4 class="text-success">₹<?php echo $product['price']; ?></h4>
        <?php if ($product['mrp'] && $product['mrp'] > 0): ?>
          <p class="text-muted">
            <small>MRP: <del>₹<?php echo $product['mrp']; ?></del></small>
          </p>
        <?php endif; ?>
        <p class="text-muted small mb-3"><?php echo $product['description']; ?></p>

        <div class="mt-4 d-flex flex-wrap align-items-center gap-3">
          <button class="btn btn-danger btn-lg">
            <i class="bi bi-cart me-2"></i> Add to Cart
          </button>
          <div class="px-2 py-1 bg-primary text-white d-inline-block rounded text-center">
            <i class="bi bi-facebook fs-4"></i>
          </div>
          <a href="<?php echo $wa_url; ?>" target="_blank" class="text-decoration-none">
          <div class="px-2 py-1 bg-success text-white d-inline-block rounded text-center ms-2">
            <i class="bi bi-whatsapp fs-4"></i>
          </div>
          <div class="px-2 py-1 bg-danger text-white d-inline-block rounded text-center ms-2">
            <i class="bi bi-youtube fs-4"></i>
          </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="px-3 px-sm-4 px-md-5">
    
    <h5>Related Products</h5>
    <script>
      // alert("Selected ID: <?php echo $category_id; ?>");
    </script>
    <hr class="mt-1 mb-4" style="height: 3px; background-color: #000; opacity: 1;">
    <div class="row">
      <?php
        $limit = 12;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $category_filter = '';
        if ($category_id) {
            $category_filter = "WHERE category_id = $category_id";
        }
        $count_res = $conn->query("SELECT COUNT(*) AS total FROM products $category_filter");
        $total = $count_res->fetch_assoc()['total'];
        $pages = ceil($total / $limit);

        

        $product_res = $conn->query("SELECT * FROM products $category_filter LIMIT $start, $limit");
        if (!$product_res) echo "Error: " . $conn->error;

        while ($row = $product_res->fetch_assoc()) {
      ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100" style="cursor:pointer;" onclick="window.location.href='productinfo.php?id=<?php echo $row['id']; ?>&catid=<?php echo $row['category_id']; ?>'">

          <img src="assets/images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['name']; ?></h5>
            <p class="card-text pb-3">
              ₹<?php echo $row['price']; ?>
              <?php if ($row['mrp'] && $row['mrp'] > 0): ?>
                &nbsp; <small class="text-muted">MRP: <del>₹<?php echo $row['mrp']; ?></del></small>
              <?php endif; ?>
            </p>
            <p class="card-text text-muted small pb-3"><?php echo $row['description']; ?></p>
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

  <?php include 'includes/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
