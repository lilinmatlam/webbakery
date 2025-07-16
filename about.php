<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>About Us - PINK Bakery</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #fff;
      color: #222;
      font-size: 18px;
    }

    .navbar {
      background-color: #b37841;
      padding: 15px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar h1 {
      margin: 0;
      font-size: 26px;
      color: #fff;
    }

    .navbar nav a {
      margin-left: 20px;
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      font-size: 16px;
    }

    .navbar nav a:hover {
      color: #ffd;
    }

    .container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .section-flex {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 40px;
      margin-bottom: 80px;
    }

    .section-flex .text {
      flex: 1;
      min-width: 300px;
      font-size: 18px;
      line-height: 1.8;
    }

    .section-flex .text h2 {
      font-size: 28px;
      margin-bottom: 10px;
    }

    .section-flex .text h3 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .section-flex .image {
      flex: 1;
      min-width: 300px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .section-flex .image img {
      max-width: 100%;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .values-section {
      background: #f7f5f3;
      padding: 60px 20px;
      text-align: center;
    }

    .section-title {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #111;
    }

    .section-subtitle {
      font-size: 18px;
      color: #555;
      max-width: 700px;
      margin: 0 auto 40px;
    }

    .values-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .value-card {
      background: white;
      border-radius: 15px;
      padding: 25px;
      width: 250px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .value-card .icon {
      font-size: 32px;
      color: #e91e63;
      margin-bottom: 15px;
    }

    .value-card h4 {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .value-card p {
      font-size: 15px;
      color: #555;
      line-height: 1.5;
    }

    .site-footer {
      background: #f8f8f8;
      padding: 50px 30px 20px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
    }

    .footer-container {
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      justify-content: space-between;
      max-width: 1200px;
      margin: auto;
    }

    .footer-column {
      flex: 1 1 200px;
      min-width: 200px;
    }

    .footer-column h4 {
      font-weight: bold;
      margin-bottom: 15px;
      color: #111;
    }

    .footer-column ul {
      list-style: none;
      padding: 0;
    }

    .footer-column ul li {
      margin-bottom: 10px;
    }

    .footer-column ul li a {
      color: #444;
      text-decoration: none;
    }

    .footer-column ul li a:hover {
      color: #e91e63;
    }

    .contact-info i {
      margin-right: 8px;
      color: #e91e63;
      width: 20px;
      text-align: center;
    }

    .brand-circle {
      width: 40px;
      height: 40px;
      background: #e91e63;
      color: #fff;
      font-weight: bold;
      border-radius: 50%;
      text-align: center;
      line-height: 40px;
      display: inline-block;
      margin-bottom: 10px;
    }

    .brand p {
      margin: 10px 0 20px;
      max-width: 250px;
    }

    .social-icons a {
      margin-right: 10px;
      font-size: 18px;
      color: #555;
    }

    .social-icons a:hover {
      color: #e91e63;
    }

    .footer-bottom {
      border-top: 1px solid #ddd;
      margin-top: 30px;
      padding-top: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      font-size: 14px;
    }

    .policy-links a {
      margin-left: 15px;
      color: #444;
      text-decoration: none;
    }

    .policy-links a:hover {
      color: #e91e63;
    }

    ul {
      padding-left: 20px;
      font-size: 17px;
    }

    @media (max-width: 768px) {
      .section-flex {
        flex-direction: column;
        align-items: center;
      }

      .section-flex .text, .section-flex .image {
        width: 100%;
      }

      .footer-bottom {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header class="navbar">
    <h1>PINK <span>Bakery</span></h1>
    <nav>
      <a href="index.php">HOME</a>
      <a href="bakery.php">MENU</a>
      <a href="about.php">ABOUT</a>
      <a href="kontak.php">CONTACT</a>
      <?php if (isset($_SESSION["id_user"])): ?>
        <a href="logout.php">LOGOUT</a>
      <?php else: ?>
        <a href="register.php">REGISTRASI</a>
        <a href="login.php">LOGIN</a>
      <?php endif; ?>
    </nav>
  </header>

  <main class="container">
    <!-- Tentang Kami -->
    <section class="section-flex">
      <div class="text">
        <h2>About Us</h2>
        <h3>Pink Bakery Store</h3>
        <p>PINK Bakery adalah toko kue artisanal yang mengkhususkan diri dalam pembuatan kue-kue premium dengan sentuhan warna cerah, rasa tak terlupakan...</p>
        <p>Setiap produk kami dibuat secara handmade memperhatikan detail, rasa, presentasi...</p>
        <p>Kami juga menerima pesanan khusus untuk ulang tahun, pernikahan, perayaan lainnya...</p>
        <p>Di PINK Bakery, kami percaya setiap gigitan harus menjadi pengalaman istimewa...</p>
      </div>
      <div class="image">
        <img src="image/CAKE4.jpg" alt="Tart Buah Premium">
      </div>
    </section>

    <!-- Visi Misi -->
    <section class="section-flex">
      <div class="image">
        <img src="image/CAKE3.jpg" alt="Pastry Cokelat">
      </div>
      <div class="text">
        <h3>Our Vision and Mission</h3>
        <p><strong>Visi:</strong><br>Menjadi toko kue artisanal paling dicintai...</p>
        <p><strong>Misi:</strong></p>
        <ul>
          <li>Membuat kue secara handmade dengan cinta</li>
          <li>Menggunakan bahan-bahan terbaik</li>
          <li>Membawa kebahagiaan lewat kue personal</li>
          <li>Berinovasi tanpa meninggalkan tradisi</li>
        </ul>
      </div>
    </section>

    <!-- Values -->
    <section class="values-section">
      <h2 class="section-title">Our Values</h2>
      <p class="section-subtitle">These core values guide everything we do and help us deliver the best experience to our customers.</p>
      <div class="values-grid">
        <div class="value-card"><div class="icon">💗</div><h4>Made with Love</h4><p>Every product is crafted with passion and attention to detail</p></div>
        <div class="value-card"><div class="icon">🎖️</div><h4>Premium Quality</h4><p>We use only the finest ingredients sourced from trusted suppliers</p></div>
        <div class="value-card"><div class="icon">👥</div><h4>Community Focused</h4><p>Serving our local community with dedication and care</p></div>
        <div class="value-card"><div class="icon">⏰</div><h4>Fresh Daily</h4><p>All our products are baked fresh every single day</p></div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="footer-container">
      <div class="footer-column brand">
        <div class="brand-circle">P</div>
        <h3>Pink Bakery</h3>
        <p>Bringing you the finest baked goods with love and passion...</p>
        <div class="social-icons">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
        </div>
      </div>

      <div class="footer-column">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Our Products</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Categories</h4>
        <ul>
          <li><a href="#">Bread & Croissants</a></li>
          <li><a href="#">Cakes & Desserts</a></li>
          <li><a href="#">Pastries</a></li>
          <li><a href="#">Beverages</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Contact Info</h4>
        <ul class="contact-info">
          <li><i class="fa fa-map-marker"></i> Jl. Kebon Sirih No. 123<br>Jakarta Pusat, 10340</li>
          <li><i class="fa fa-phone"></i> +62 21 1234 5678</li>
          <li><i class="fa fa-envelope"></i> hello@pinkbakery.com</li>
          <li><i class="fa fa-clock-o"></i> Mon-Fri: 7:00 - 21:00<br>Sat-Sun: 8:00 - 22:00</li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© 2024 Pink Bakery. All rights reserved.</p>
      <div class="policy-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
      </div>
    </div>
  </footer>

</body>
</html>
