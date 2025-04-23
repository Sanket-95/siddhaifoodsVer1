<?php include('includes/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Siddhai Foods</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
<div>

<!-- ===========Top Products listing  start here ====================== -->
 <!-- code 001 -->
 <?php include 'includes/navbar.php'; ?>
<!-- Featured Products Section -->
<div class="container">
<h3 class="text-center mb-4">Featured Products</h3>
<div id="featuredCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-inner">
    <?php
      $featured_sql = "SELECT * FROM featured_products LIMIT 9";
      $featured_result = $conn->query($featured_sql);
      $count = 0;
      while ($row = $featured_result->fetch_assoc()) {
          if ($count % 3 == 0) {
              echo '<div class="carousel-item '.($count == 0 ? 'active' : '').'"><div class="row">';
          }
    ?>
          <div class="col-md-4">
            <div class="card mb-3 fadeIn">
            <img src="assets/images/<?php echo $row['img_path']; ?>" class="card-img-top fixed-img" alt="<?php echo $row['product_name']; ?>">
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
              </div>
            </div>
          </div>
    <?php
          if ($count % 3 == 2) {
              echo '</div></div>';
          }
          $count++;
      }
      if ($count % 3 != 0) {
          echo '</div></div>';
      }
    ?>
  </div>

  <!-- Manual Arrow Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#featuredCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" style="background-color: red;"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#featuredCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" style="background-color: red;"></span>
  </button>
</div>



<!-- ===========Top Products listing End here ====================== -->

  <h2 class="text-center mb-4">Our Products</h2>

  <!-- Category Tabs -->
  <ul class="nav nav-tabs mb-4" id="categoryTabs">
    <li class="nav-item">
      <a class="nav-link active" href="?category=all">All</a>
    </li>
    <?php
      $cat_query = $conn->query("SELECT * FROM categories");
      while ($cat = $cat_query->fetch_assoc()) {
          echo '<li class="nav-item">
                  <a class="nav-link" href="?category=' . $cat['id'] . '">' . $cat['name'] . '</a>
                </li>';
      }
    ?>
  </ul>

  <!-- Product Grid -->
  <div class="row">
    <?php
      // Pagination setup
      $limit = 20;
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $start = ($page - 1) * $limit;

      // Category filter
      $category_filter = '';
      if (isset($_GET['category']) && $_GET['category'] !== 'all') {
          $category_id = intval($_GET['category']);
          $category_filter = "WHERE category_id = $category_id";
      }

      // Get total products for pagination
      $count_res = $conn->query("SELECT COUNT(*) AS total FROM products $category_filter");
      $total = $count_res->fetch_assoc()['total'];
      $pages = ceil($total / $limit);

      // Fetch products
      $product_res = $conn->query("SELECT * FROM products $category_filter LIMIT $start, $limit");

      while ($row = $product_res->fetch_assoc()) {
    ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100">
        <img src="assets/images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['name']; ?></h5>
          <p class="card-text">₹<?php echo $row['price']; ?></p>
          <p class="card-text text-muted small"><?php echo $row['description']; ?></p>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>

  <!-- Pagination -->
  <nav>
    <ul class="pagination justify-content-center">
      <?php for ($i = 1; $i <= $pages; $i++): ?>
        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
          <a class="page-link" href="?page=<?= $i ?><?= isset($_GET['category']) ? '&category=' . $_GET['category'] : '' ?>">
            <?= $i ?>
          </a>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>

</div>
<?php include 'includes/footer.php'; ?>
      </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
