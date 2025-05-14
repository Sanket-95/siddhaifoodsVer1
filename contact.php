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
  <div class="px-3 px-sm-4 px-md-5 contact-section">

    <!-- Factory Address and Send Message Section -->
    <div class="row">
      <!-- Factory Address Section -->
      

      <!-- Send Us a Message Section -->
      <div class="col-md-12 contact-form">
         <h2 class="mb-4 fw-semibold text-dark border-bottom pb-2">Send Us a Message</h2>
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
    <div class="row mt-5">
    <div class="col-md-6 contact-info d-flex justify-content-center">
    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d11605.887696136335!2d73.29423542426589!3d16.99252885520863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sSiddhai%20Foods%20Ratnagiri!5e1!3m2!1sen!2sin!4v1745492010605!5m2!1sen!2sin" width="500" height="400" style="border:1;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="col-md-6 contact-info">
        <h2 class="mb-4 fw-semibold text-dark border-bottom pb-2">Office</h2>
        <p>Near J K File, MIDC Mirjole Ratnagiri-415639</p>
        <p>Contact No - 9423094242, 9420594242, 9422003128</p>
        <p>Time - 10 am To 6 pm (refer QR Code)</p>
        <br><br>
        <h2 class="mb-4 fw-semibold text-dark border-bottom pb-2">Factory Address</h2>
        <p>At Pochari near Someshwar Temple Tal. Sangmeshwar Dist. Ratnagiri Pin -415621</p>
        <p>Time - 9 am To 5.30pm</p>
    </div>
    
    </div>
    
    
    <!-- Retail Address Section -->
    <!-- <div class="contact-address">
      <h3>Retail Address</h3>
      <p>5678 Retail Road, Shopping Mall, City, Country</p>
      <p>Phone: +1 (987) 654-3210</p>
      <p>Email: retail@company.com</p>
    </div> -->

  </div>
  <div class="px-3 px-sm-4 px-md-5 mb-3">
      <h5>Why Customer Choose us</h5>
      <hr class="mt-1 mb-4" style="height: 3px; background-color: rgb(81 85 88); opacity: 1;">
      <p>Implementing food safety and quality assurance controls throughout all stages including the supply chain. 
Maintaining very strict hygiene requirements to ensure that all products prepared for human consumption are wholesome.
      </p>
      <p>Requiring employees at all times to comply with all hygiene specific training, instructions, and directions. Maintaining very strict quality assurance standards that are essential to customer requirements.</p>
    </div>

    <div class="px-3 px-sm-4 px-md-5 mt-3">
      <h5>Vision & Mission </h5>
      <hr class="mt-1 mb-4" style="height: 3px; background-color: rgb(81 85 88); opacity: 1;">
      <p><b>Vision : </b>
	To create such an identity as an exporter of highest quality, nutritious healthy Konkani products. While providing rightful employment to one thousand rural women and youth as well as empowering self- help groups. 
      </p>
      <p><b>Mission :</b> Our Mission is to bring more flavours to your healthy life with taste Quality and nutritious value in just affordable price.
Siddhai Foods means golden Confluence of quality taste health and fair price.
</p>
    </div>

  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>

  <!-- Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
