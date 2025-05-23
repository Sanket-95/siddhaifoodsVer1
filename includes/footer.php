<!-- footer.php -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<footer class="bg-secondary text-white pt-4 pb-2 mt-5">
  <div class="px-3 px-sm-4 px-md-5 text-center text-md-start">
    <div class="row">

      <!-- Column 1: About -->
      <div class="col-md-6 mb-3">
      <h5>About Us</h5>
      <p class="small" style="line-height: 1.6;">
    Siddhai Foods is a leading manufacturing company of Konkan food products like juices, syrups, and pickles of mango, kokum, amla, and jamun etc. in the Konkan region of Maharashtra.
    The company has introduced numerous innovative instant products of Ragi (Nachani) in Indian and overseas markets. We focus on unique and high-value food with premium quality and healthy measures. Our factory outlet offers a variety of very tasty and delicious namkeen products.
      </p>
     <p class="small" style="line-height: 1.6;">
    Siddhai Foods supports positive economic, social, and environmental links between urban, peri-urban, and rural areas by empowering rural farmers, women, and youth.
    </p>
</div>

      <!-- Column 2: Links -->
      <div class="col-md-2 mb-3">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="index.php" class="text-white text-decoration-none">Home</a></li>
          <li><a href="contact.php" class="text-white text-decoration-none">Contact Us</a></li>
          <li><a href="addtocart.php" class="text-white text-decoration-none">Add to cart</a></li>
          <li><a href="privacypolicy.php" class="text-white text-decoration-none">Privacy Policy</a></li>
        </ul>
      </div>

      <!-- Column 3: Contact -->
      <div class="col-md-4 mb-3">
        <h5>Contact Us</h5>
        <p>Phone: 9423094242, 9420594242, 9422003128</p>
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
      </div>

    </div>
    <hr class="bg-light text-white">
    <div class="text-center">
      <p class="mb-0 text-white">&copy; <?php echo date("Y"); ?> Siddhai Foods. All rights reserved.</p>
    </div>
  </div>
</footer>
