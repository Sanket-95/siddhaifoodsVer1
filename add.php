<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel - Add Category & Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
  
  <style>
    /* Custom Styles for Form Elements */
    .form-control, .form-select, .btn {
      border-radius: 0.5rem;
    }

    .navbar {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .container {
      max-width: 1200px;
    }

    /* Spacing for mobile */
    .form-label {
      font-weight: 500;
    }

    .card {
      border: none;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section-heading {
      margin-bottom: 20px;
      font-size: 1.5rem;
    }

    /* Form alignment for mobile */
    @media (max-width: 768px) {
      .col-md-4 {
        margin-bottom: 1.5rem;
      }
    }
  </style>
</head>
<body>

  <?php include 'includes/navbar.php'; ?>

  <!-- Container for Admin Form -->
  <div class="container my-5">

    <!-- Add Category Form Section -->
    <div class="row">
      <div class="col-12 mb-4">
        <h2 class="section-heading text-center">Add Category</h2>
        <form action="add_category.php" method="POST">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="categoryName" class="form-label">Category Name</label>
              <input type="text" class="form-control" id="categoryName" name="category_name" required>
            </div>
            <div class="col-md-6 mb-3">
              <button type="submit" class="btn btn-primary w-100">Add Category</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <hr class="my-5">

    <!-- Add Product Form Section -->
    <div class="row">
      <div class="col-12 mb-4">
        <h2 class="section-heading text-center">Add Product</h2>
        <form action="add_product.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <!-- Select Category -->
            <div class="col-md-4 mb-3">
              <label for="categorySelect" class="form-label">Select Category</label>
              <select class="form-select" id="categorySelect" name="category_id" required>
                <option value="" disabled selected>Select a category</option>
                <!-- Example categories, replace with dynamic PHP code to fetch from DB -->
                <?php
                $categories = ["Electronics", "Clothing", "Furniture"]; // Replace with actual query results
                foreach ($categories as $category) {
                  echo "<option value='$category'>$category</option>";
                }
                ?>
              </select>
            </div>

            <!-- Product Name, Price, and Discounted Price (3 Columns) -->
            <div class="col-md-4 mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="productName" name="product_name" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="discountPrice" class="form-label">Discounted Price</label>
              <input type="number" class="form-control" id="discountPrice" name="discount_price">
            </div>

            <!-- Product Description and Image (2 Columns) -->
            <div class="col-md-6 mb-3">
              <label for="productDescription" class="form-label">Description</label>
              <textarea class="form-control" id="productDescription" name="description" rows="4" required></textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label for="productImage" class="form-label">Image</label>
              <input type="file" class="form-control" id="productImage" name="image" accept="image/*" required>
            </div>

            <!-- Product Title, Weight, and B2B Price (3 Columns) -->
            <div class="col-md-4 mb-3">
              <label for="productTitle" class="form-label">Product Title</label>
              <input type="text" class="form-control" id="productTitle" name="product_title" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="weight" class="form-label">Weight (kg)</label>
              <input type="number" class="form-control" id="weight" name="weight" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="b2bPrice" class="form-label">B2B Price</label>
              <input type="number" class="form-control" id="b2bPrice" name="b2b_price" required>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 mb-3">
              <button type="submit" class="btn btn-success w-100">Add Product</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
