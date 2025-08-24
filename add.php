<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel - Manage Entries</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/style.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
    }

    .btn-toggle-group {
      margin-top: 30px;
      margin-bottom: 40px;
    }

    .btn-toggle-group .btn {
      min-width: 160px;
      font-weight: 500;
    }

    .section-heading {
      font-size: 1.75rem;
      font-weight: 600;
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .form-section {
      display: none;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }

    .form-label {
      font-weight: 500;
    }

    .form-control, .form-select {
      border-radius: 0.5rem;
      padding: 0.6rem 0.75rem;
    }

    .btn-submit {
      padding: 0.75rem;
      font-weight: 600;
      font-size: 1rem;
    }
  </style>
</head>
<body>

<?php
include 'includes/db.php';

// Category Add Handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_name'])) {
    $category_name = trim($_POST['category_name']);
    $folder_name = strtolower(preg_replace('/[^a-zA-Z0-9_-]/', '_', $category_name));
    $folder_path = "assets/images/" . $folder_name;

    $stmt = $conn->prepare("SELECT * FROM categories WHERE LOWER(name) = LOWER(?)");
    $stmt->bind_param("s", $category_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Category already exists!'); window.location.href='add.php';</script>";
        exit;
    }

    $insert_stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
    $insert_stmt->bind_param("s", $category_name);
    if ($insert_stmt->execute()) {
        if (!file_exists($folder_path)) {
            mkdir($folder_path, 0777, true);
        }
        echo "<script>alert('Category added successfully!'); window.location.href='add.php';</script>";
    } else {
        echo "<script>alert('Error adding category!'); window.location.href='add.php';</script>";
    }
}
?>
<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $product_name = trim($_POST['product_name']);
    $price = $_POST['price'];
    $mrp = $_POST['mrp'];
    $weight = $_POST['weight'];
    $description = $_POST['description'];

    // Validate image size (max 5MB)
    if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
        echo "<script>alert('Image must be less than 5MB!'); window.location.href='add.php';</script>";
        exit;
    }

    // Validate image type
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!in_array($ext, $allowed_exts)) {
        echo "<script>alert('Invalid image format! Allowed: JPG, PNG, GIF, WEBP'); window.location.href='add.php';</script>";
        exit;
    }

    // Check for duplicate product name
    $check_stmt = $conn->prepare("SELECT * FROM products WHERE LOWER(name) = LOWER(?)");
    $check_stmt->bind_param("s", $product_name);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Product already exists!'); window.location.href='add.php';</script>";
        exit;
    }

    // Get category name
    $cat_stmt = $conn->prepare("SELECT name FROM categories WHERE id = ?");
    $cat_stmt->bind_param("i", $category_id);
    $cat_stmt->execute();
    $cat_result = $cat_stmt->get_result();

    if ($cat_result->num_rows === 0) {
        echo "<script>alert('Invalid category selected.'); window.location.href='add.php';</script>";
        exit;
    }

    $cat_row = $cat_result->fetch_assoc();
    $category_folder = $cat_row['name']; // Preserve original case and spaces
    $target_folder = "assets/images/" . $category_folder;

    // Create folder if it doesn't exist
    if (!file_exists($target_folder)) {
        mkdir($target_folder, 0777, true);
    }

    // Create unique image filename
    $new_image_name = uniqid('img_', true) . '.' . $ext;
    $upload_path = $target_folder . "/" . $new_image_name;

    // Move the uploaded file
    if (!move_uploaded_file($image_tmp, $upload_path)) {
        echo "<script>alert('Failed to upload image!'); window.location.href='add.php';</script>";
        exit;
    }

    // Insert product into DB (store only image name)
    $insert_stmt = $conn->prepare("INSERT INTO products (category_id, name, price, mrp, image, description, weight) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insert_stmt->bind_param("isddssd", $category_id, $product_name, $price, $mrp, $new_image_name, $description, $weight);

    if ($insert_stmt->execute()) {
        echo "<script>alert('Product added successfully!'); window.location.href='add.php';</script>";
    } else {
        echo "<script>alert('Failed to add product.'); window.location.href='add.php';</script>";
    }
}
?>


<?php include 'includes/navbar.php'; ?>

<div class="container my-5">
  <div class="text-center btn-toggle-group">
    <button class="btn btn-outline-primary mx-2" onclick="showForm('categoryForm')">Add Category</button>
    <button class="btn btn-outline-success mx-2" onclick="showForm('productForm')">Add Product</button>
    <button class="btn btn-outline-secondary mx-2" onclick="showForm('catalogForm')">Add Catalog</button>
  </div>

  <!-- Category Form -->
  <div id="categoryForm" class="form-section">
    <h2 class="section-heading">Add Category</h2>
    <form action="add.php" method="POST">
      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="categoryName" class="form-label">Category Name</label>
          <input type="text" class="form-control" id="categoryName" name="category_name" required>
        </div>
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary btn-submit mt-3">Add Category</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Product Form -->
  <div id="productForm" class="form-section">
    <h2 class="section-heading">Add Product</h2>
    <form action="add.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="categorySelect" class="form-label">Select Category</label>
          <select class="form-select" id="categorySelect" name="category_id" required>
            <?php
              $cat_sql = "SELECT * FROM categories ORDER BY name ASC";
              $cat_result = $conn->query($cat_sql);
              $first = true;
              while ($row = $cat_result->fetch_assoc()) {
                  $selected = $first ? "selected" : "";
                  echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
                  $first = false;
              }
            ?>
          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label for="productName" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="productName" name="product_name" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="mrp" class="form-label">MRP</label>
          <input type="number" class="form-control" id="mrp" name="mrp" step="0.01" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="weight" class="form-label">Weight (kg)</label>
          <input type="number" class="form-control" id="weight" name="weight" step="0.01" required>
        </div>

        <div class="col-md-4 mb-3">
          <label for="productImage" class="form-label">Image</label>
          <input type="file" class="form-control" id="productImage" name="image" accept="image/*" required>
        </div>

        <div class="col-md-12 mb-3">
          <label for="productDescription" class="form-label">Description</label>
          <textarea class="form-control" id="productDescription" name="description" rows="3" required></textarea>
        </div>

        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-success btn-submit mt-3">Add Product</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Catalog Form -->
  <div id="catalogForm" class="form-section">
    <h2 class="section-heading">Add Catalog</h2>
    <form action="Backend/add_catalog.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="catalogCategory" class="form-label">Category</label>
          <select class="form-select" id="catalogCategory" name="catalog_category_id" required>
            <option value="">Select Category</option>
            <?php
              $cat_sql = "SELECT DISTINCT id, name FROM categories";
              $cat_result = $conn->query($cat_sql);
              while ($row = $cat_result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
              }
            ?>
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label for="catalogName" class="form-label">Catalog Name</label>
          <select class="form-select" id="catalogName" name="catalog_id" required>
            <option value="">Select Product</option>
            <!-- Options will be loaded by JS -->
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label for="catalogImages" class="form-label">Upload Images</label>
          <input type="file" class="form-control" id="catalogImages" name="catalog_images[]" accept="image/*" multiple required>
        </div>

        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-secondary btn-submit mt-3">Add Catalog</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>

<script>
  function showForm(formId) {
    document.querySelectorAll('.form-section').forEach(f => f.style.display = 'none');
    document.getElementById(formId).style.display = 'block';
  }

  window.onload = function () {
    showForm('categoryForm');
  };

  document.getElementById('catalogCategory').addEventListener('change', function() {
  var categoryId = this.value;
  var catalogName = document.getElementById('catalogName');
  catalogName.innerHTML = '<option value="">Loading...</option>';
  if (categoryId) {
    fetch('Backend/catalog_get_products.php?category_id=' + categoryId)
      .then(response => response.json())
      .then(data => {
        let options = '<option value="">Select Product</option>';
        data.forEach(function(product) {
          options += `<option value="${product.id}">${product.name}</option>`;
        });
        catalogName.innerHTML = options;
      });
  } else {
    catalogName.innerHTML = '<option value="">Select Product</option>';
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
