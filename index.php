<?php include('includes/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Siddhai Foods</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Banner sliding effect responsive  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" defer></script>

  <!-- Your initialization script -->
  <script defer>
    document.addEventListener('DOMContentLoaded', function () {
      var myCarousel = new bootstrap.Carousel(document.getElementById('advertisementCarousel'), {
        interval: 7000, // Auto-slide interval
        wrap: true, // Carousel will cycle endlessly
        ride: 'carousel' // Start sliding as soon as the page loads
      });
    });
  </script>
  <!-- Banner sliding effect responsive End  -->
  <style>
  body {
    font-family: 'Roboto', sans-serif;
    background-color: #f8f9fa;
  }

  /* Navbar */
  .navbar {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }

  /* Category Tabs */
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

  /* Carousel */
  .carousel-inner img {
    border-radius: 12px;
  }

  /* Product Cards */
  .card {
    border: none;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    transition: transform 0.3s, box-shadow 0.3s;
  }
  .card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* Increased shadow for more emphasis */
} 
  .card-img-top {
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    height: 200px;
    object-fit: cover;
  }
  .card-title {
    font-weight: bold;
    font-size: 18px;
  }
  .card-text {
    font-size: 14px;
  }

  /* Pagination */
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
</style>
</head>
<body>
<div  style="background-color:rgb(246, 246, 246);" > 

<!-- ===========Top Products listing  start here ====================== -->
 <!-- code 001 -->
 <?php include 'includes/navbar.php'; ?>
<!-- Featured Products Section -->
 <!-- ===================== Category Tabs ==============================-->
 <div class="w-100 mb-3" style="overflow-x: auto;">
  <ul class="nav nav-tabs d-flex flex-nowrap w-100 px-3 justify-content-center" id="categoryTabs">
    <li class="nav-item">
      <a class="nav-link <?= (!isset($_GET['category']) || $_GET['category'] === 'all') ? 'active' : '' ?>" href="?category=all">All</a>
    </li>
    <?php
      $cat_query = $conn->query("SELECT * FROM categories");
      while ($cat = $cat_query->fetch_assoc()) {
          $active = (isset($_GET['category']) && $_GET['category'] == $cat['id']) ? 'active' : '';
          echo '<li class="nav-item">
                  <a class="nav-link '.$active.'" href="?category=' . $cat['id'] . '">' . $cat['name'] . '</a>
                </li>';
      }
    ?>
  </ul>
</div>
<!-- ========================= Category Tabs Endd ==============================-->
<!-- ==============   Advertisement Section - True Full Width, No Spacing ======-->
<div class="w-100 m-0 p-0">
  <style>
    /* Default: Mobile view */
    .carousel-item {
      aspect-ratio: 16 / 6;
    }
    .carousel-item img {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }

    /* Desktop override */
    @media (min-width: 768px) {
      .carousel-item {
        aspect-ratio: auto;
      }
      .carousel-item img {
        height: 500px; /* Increased height for desktop view */
      }
    }
  </style>

  <?php
    $ad_sql = "SELECT 
                fp.id, 
                fp.category_id, 
                fp.product_name, 
                p.image 
              FROM 
                featured_products fp
              JOIN 
                products p 
              ON 
                fp.category_id = p.category_id 
                AND fp.product_name = p.name
              WHERE 
                fp.status = 2";
    $ad_result = $conn->query($ad_sql);

    if ($ad_result->num_rows > 0) {
        echo '<div id="advertisementCarousel" class="carousel slide px-3 px-sm-4 px-md-5 mb-3" data-bs-ride="carousel" data-bs-interval="7000" data-bs-wrap="true">';
        echo '<div class="carousel-inner">';

        $ad_index = 0;
        while ($ad = $ad_result->fetch_assoc()) {
            echo '<div class="carousel-item '.($ad_index === 0 ? 'active' : '').'">';
            echo '<img src="assets/images/'.$ad['image'].'" class="d-block w-100" alt="'.$ad['product_name'].'">';
            echo '</div>';
            $ad_index++;
        }

        echo '</div>'; // .carousel-inner
        echo '</div>'; // #advertisementCarousel
    }
  ?>
</div>
<!-- ==============   Advertisement Section - True Full Width, No Spacing End  ======-->

<div class="px-3 px-sm-4 px-md-5">
  <!-- Top products add  -->
  <!-- <h3 class="text-center mb-4">Featured Products</h3> -->
  <!-- <div id="featuredCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000"> -->
  <!-- <div class="carousel-inner"> -->
      <?php
        $featured_sql = "SELECT 
                          fp.id, 
                          fp.category_id, 
                          fp.product_name, 
                          p.image
                        FROM 
                          featured_products fp
                        JOIN 
                          products p 
                        ON 
                          fp.category_id = p.category_id 
                          AND fp.product_name = p.name
                        WHERE 
                          fp.status = 1
                        LIMIT 9
                          ";
        $featured_result = $conn->query($featured_sql);
        if ($featured_result->num_rows > 0) {
      ?> 

      <h3 class="text-center mb-4 fw-semibold text-dark border-bottom pb-2">Featured Products</h3>
      <div id="featuredCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">

        <?php
          
          $items = [];

          // Fetch all data into an array
          while ($row = $featured_result->fetch_assoc()) {
              $items[] = $row;
          }

          $total = count($items);
          for ($i = 0; $i < $total; $i += 3) {
              echo '<div class="carousel-item '.($i == 0 ? 'active' : '').'">';
              echo '<div class="row justify-content-center">';

              // Desktop view: 3 cards in one slide
              for ($j = 0; $j < 3; $j++) {
                  $index = $i + $j;
                  if ($index < $total) {
                      $row = $items[$index];
                      echo '<div class="col-md-4 d-none d-md-block">'; // show only on md and above
                      echo '<div class="card mb-3 fadeIn">';
                      echo '<img src="assets/images/'.$row['image'].'" class="card-img-top fixed-img" alt="'.$row['product_name'].'">';
                      echo '<div class="card-body text-center"><h5 class="card-title">'.$row['product_name'].'</h5></div>';
                      echo '</div></div>';
                  }
              }

              echo '</div>';

              // Mobile view: 1 card only per slide
              if ($i < $total) {
                  $row = $items[$i];
                  echo '<div class="d-block d-md-none px-3">'; // show only on small screens
                  echo '<div class="card mb-3 fadeIn">';
                  echo '<img src="assets/images/'.$row['image'].'" class="card-img-top object-fit-cover w-100" style="height: 200px;" alt="'.$row['product_name'].'">';
                  echo '<div class="card-body text-center"><h5 class="card-title">'.$row['product_name'].'</h5></div>';
                  echo '</div></div>';
              }

              echo '</div>'; // .carousel-item
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
    <?php
      }
    ?>
  </div>



  <!-- ===========Top Products listing End here ====================== -->

    <!-- <h2 class="text-center mb-4">Our Products</h2> -->
    <!-- Product Grid -->
    <div class="row">
      <?php
        // Pagination setup
        $limit = 40;
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
   <div class="card h-100" style="cursor:pointer;" onclick="window.location.href='productinfo.php?id=<?php echo $row['id']; ?>&catid=<?php echo $row['category_id']; ?>'">
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
        <span onclick="window.location.href='productinfo.php?id=<?php echo $row['id']; ?>&catid=<?php echo $row['category_id']; ?>'">View Product</span>
      </div>
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
