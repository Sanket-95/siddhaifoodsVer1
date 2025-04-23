<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shopping Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
  
  <style>
    .cart-item {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    .cart-item img {
      width: 100px;
      height: 100px;
      object-fit: cover;
    }

    .cart-item .details {
      padding-left: 15px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .cart-item .details h5 {
      margin: 0;
      font-size: 1.1rem;
    }

    .cart-item .details p {
      font-size: 1rem;
      color: #888;
    }

    .cart-item .quantity {
      display: flex;
      align-items: center;
    }

    .cart-item .quantity input {
      width: 60px;
      margin-right: 10px;
    }

    .cart-item .delete-btn {
      color: #ff3333;
      cursor: pointer;
    }

    .checkout-btn {
      width: 100%;
      padding: 15px;
      font-size: 1.2rem;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 8px;
      margin-top: 20px;
    }

    .checkout-btn:hover {
      background-color: #218838;
    }

    .cart-total {
      font-size: 1.25rem;
      margin-top: 20px;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- Navigation bar -->
  <?php include 'includes/navbar.php'; ?>

  <!-- Shopping Cart Container -->
  <div class="container my-5">
    <h2 class="text-center mb-4">Shopping Cart</h2>

    <!-- Cart Items -->
    <div class="row">
      <div class="col-12">
        <!-- Item 1 -->
        <div class="cart-item row align-items-center">
          <div class="col-md-2">
            <img src="assets/images/product1.jpg" alt="Product 1">
          </div>
          <div class="col-md-6 details">
            <h5>Product 1 Title</h5>
            <p>Price: $20.00</p>
          </div>
          <div class="col-md-2 quantity">
            <input type="number" value="1" min="1" max="10" class="form-control">
          </div>
          <div class="col-md-2">
            <span class="delete-btn">Delete</span>
          </div>
        </div>

        <!-- Item 2 -->
        <div class="cart-item row align-items-center">
          <div class="col-md-2">
            <img src="assets/images/product2.jpg" alt="Product 2">
          </div>
          <div class="col-md-6 details">
            <h5>Product 2 Title</h5>
            <p>Price: $15.00</p>
          </div>
          <div class="col-md-2 quantity">
            <input type="number" value="1" min="1" max="10" class="form-control">
          </div>
          <div class="col-md-2">
            <span class="delete-btn">Delete</span>
          </div>
        </div>

        <!-- Item 3 -->
        <div class="cart-item row align-items-center">
          <div class="col-md-2">
            <img src="assets/images/product3.jpg" alt="Product 3">
          </div>
          <div class="col-md-6 details">
            <h5>Product 3 Title</h5>
            <p>Price: $30.00</p>
          </div>
          <div class="col-md-2 quantity">
            <input type="number" value="1" min="1" max="10" class="form-control">
          </div>
          <div class="col-md-2">
            <span class="delete-btn">Delete</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Price Section -->
    <div class="row">
      <div class="col-12">
        <div class="cart-total">
          <p>Total Price: $65.00</p>
        </div>
        <button class="checkout-btn">Proceed to Checkout</button>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
