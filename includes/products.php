<?php include 'includes/db.php'; include 'includes/header.php';

// Fetch categories ....
$cat_sql = "SELECT * FROM categories";
$cat_result = $conn->query($cat_sql);

// Get selected category
$selected_cat = isset($_GET['cat']) ? (int)$_GET['cat'] : 0;
$limit = 40;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Products query
$product_sql = "SELECT * FROM products";
if ($selected_cat > 0) $product_sql .= " WHERE category_id = $selected_cat";
$product_sql .= " LIMIT $offset, $limit";
$product_result = $conn->query($product_sql);

// Count total
$count_sql = "SELECT COUNT(*) AS total FROM products" . ($selected_cat ? " WHERE category_id = $selected_cat" : "");
$count_result = $conn->query($count_sql);
$total_rows = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $limit);
?>

<!-- Tabs -->
<ul class="nav nav-tabs mb-4">
  <li class="nav-item"><a class="nav-link <?= $selected_cat == 0 ? 'active' : '' ?>" href="?">All</a></li>
  <?php while($row = $cat_result->fetch_assoc()): ?>
    <li class="nav-item">
      <a class="nav-link <?= $selected_cat == $row['id'] ? 'active' : '' ?>" href="?cat=<?= $row['id'] ?>"><?= $row['name'] ?></a>
    </li>
  <?php endwhile; ?>
</ul>

<!-- Product Grid -->
<div class="row g-4">
  <?php while($prod = $product_result->fetch_assoc()): ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="card h-100">
        <img src="assets/images/<?= $prod['image'] ?>" class="card-img-top" alt="<?= $prod['name'] ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $prod['name'] ?></h5>
          <p class="card-text">₹<?= number_format($prod['price'], 2) ?></p>
          <a href="product_detail.php?id=<?= $prod['id'] ?>" class="btn btn-primary w-100">View</a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<!-- Pagination -->
<nav class="mt-4">
  <ul class="pagination justify-content-center">
    <?php for($i = 1; $i <= $total_pages; $i++): ?>
      <li class="page-item <?= $page == $i ? 'active' : '' ?>">
        <a class="page-link" href="?cat=<?= $selected_cat ?>&page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>

<?php include 'includes/footer.php'; ?>
