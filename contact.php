<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">

  <style>
    .contact-section {
      padding: 50px 0;
    }

    .contact-info, .contact-form {
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .contact-info h3 {
      font-size: 1.7rem;
      font-weight: bold;
      color: #333;
    }

    .contact-info p {
      font-size: 1.1rem;
      color: #555;
    }

    .form-container {
      margin-top: 30px;
    }

    .form-container h2 {
      font-size: 2rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 0.5rem;
    }

    .btn-send {
      background-color: #28a745;
      color: white;
      width: 100%;
      padding: 12px;
      border-radius: 0.5rem;
      font-size: 1.1rem;
    }

    .btn-send:hover {
      background-color: #218838;
    }

    .contact-address {
      margin-top: 50px;
      text-align: center;
      font-size: 1.2rem;
      color: #555;
      padding: 30px;
      background-color: #f9f9f9;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
      .contact-info, .contact-form {
        margin-bottom: 30px;
      }

      .contact-address {
        margin-top: 20px;
      }

      .form-group input,
      .form-group textarea {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <!-- Navigation bar -->
  <?php include 'includes/navbar.php'; ?>

  <!-- Contact Us Section -->
  <div class="container contact-section">

    <!-- Factory Address and Send Message Section -->
    <div class="row">
      <!-- Factory Address Section -->
      <div class="col-md-6 contact-info">
        <h3>Factory Address</h3>
        <p>1234 Factory Street, Industrial Zone, City, Country</p>
        <p>Phone: +1 (123) 456-7890</p>
        <p>Email: contact@factory.com</p>
      </div>

      <!-- Send Us a Message Section -->
      <div class="col-md-6 contact-form">
        <h2>Send Us a Message</h2>
        <form action="send_message.php" method="POST">
          <div class="row">
            <!-- Name -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
            </div>

            <!-- Email -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
          </div>

          <div class="row">
            <!-- Mobile No -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="mobile">Mobile No</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" required>
              </div>
            </div>

            <!-- Contact -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
              </div>
            </div>
          </div>

          <div class="row">
            <!-- Message -->
            <div class="col-md-12">
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
              </div>
            </div>
          </div>

          <!-- Send Button -->
          <button type="submit" class="btn-send">Send</button>
        </form>
      </div>
    </div>

    <!-- Retail Address Section -->
    <div class="contact-address">
      <h3>Retail Address</h3>
      <p>5678 Retail Road, Shopping Mall, City, Country</p>
      <p>Phone: +1 (987) 654-3210</p>
      <p>Email: retail@company.com</p>
    </div>

  </div>

  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
