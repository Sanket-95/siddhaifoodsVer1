<!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top custom-navbar" style="background-color: #515558;">
  <div class="container-fluid">

    <!-- 🔹 Logo -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="logo.png" alt="Logo" width="30" height="30" class="me-2">
    </a>

    <!-- 🔹 Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- 🔹 Main Navbar Content -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarContent">

      <!-- 🔹 Centered Search Bar -->
      <form class="d-flex mx-auto" role="search" method="GET" action="search.php" style="width: 50%;">
        <input class="form-control me-2 w-100" type="search" name="q" placeholder="Search..." aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>

      <!-- 🔹 Right-side Links -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addtocart.php">Add to cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Add</a>
          </li>
        </ul>
    </div>
  </div>
</nav>
