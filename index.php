<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pink Bakery</title>
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #ffffff;
      color: #333;
    }
    .navbar {
      background-color: #b37841;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.2rem 2rem;
      flex-wrap: wrap;
    }
    .navbar h1 {
      color: white;
      font-size: 1.8rem;
    }
    .navbar ul {
      list-style: none;
      display: flex;
      gap: 1rem;
    }
    .navbar ul li a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }
    .navbar ul li a:hover {
      color: #ffd;
    }
    .hero-image img {
      width: 100%;
      height: 450px;
      object-fit: cover;
    }
    h2 {
      text-align: center;
      margin: 2rem 0 1rem;
      color: #b37841;
    }
    .promo-grid, .menu-grid, .feedback-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 1.5rem;
      padding: 2rem;
    }
    .promo-card, .menu-item, .feedback-card {
      background: #b37841;
      border-radius: 12px;
      padding: 1rem;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      color: white;
    }
    .promo-card img, .menu-item img {
      width: 100%;
      height: 180px;
      object-fit: contain;
      border-radius: 10px;
      margin: 1rem 0;
    }
    .promo-card button, .menu-item button {
      background: #d56700;
      border: none;
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      cursor: pointer;
    }
    .promo-card button:hover, .menu-item button:hover {
      background: #b37841;
    }
    .btn-login-warning {
      display: inline-block;
      background: #d56700;
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      text-decoration: none;
      font-weight: bold;
    }
    .btn-login-warning:hover {
      background: #b37841;
    }
    .menu-item p {
      margin-bottom: 1rem;
    }
    .feedback-card {
      padding: 1rem 1.5rem;
    }
    .feedback-card p {
      font-style: italic;
    }
    .feedback-card h4 {
      color: #fff;
      margin-top: 0.5rem;
    }
    .feedback-form {
      text-align: center;
      padding: 2rem;
    }
    .feedback-form form {
      max-width: 500px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    .feedback-form input, .feedback-form textarea {
      padding: 0.7rem;
      border: 1px solid #ccc;
      border-radius: 10px;
      width: 100%;
    }
    .site-footer {
      background-color: #f4e7d4ff;
      color: #3c2a1e;
      padding: 3rem 2rem;
      font-size: 0.95rem;
    }
    .footer-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }
    .footer-column {
      flex: 1 1 220px;
    }
    .footer-column h4 {
      font-size: 1.1rem;
      margin-bottom: 0.8rem;
      color: #C08552;
    }
    .footer-column ul {
      list-style: none;
      padding: 0;
    }
    .footer-column ul li {
      margin-bottom: 0.5rem;
    }
    .footer-column ul li a {
      text-decoration: none;
      color: #3c2a1e;
      transition: color 0.3s;
    }
    .footer-column ul li a:hover {
      color: #b37841;
    }
    .brand-circle {
      background-color: #b37841;
      color: white;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      font-weight: bold;
      font-size: 1.2rem;
      margin-bottom: 0.5rem;
    }
    .brand p {
      margin-top: 0.5rem;
    }
    .social-icons a {
      color: #b37841;
      margin-right: 0.7rem;
      text-decoration: none;
      font-size: 1.2rem;
    }
    .social-icons a:hover {
      color: #a06738;
    }
    .footer-bottom {
      border-top: 1px solid #b37841;
      margin-top: 2rem;
      padding-top: 1rem;
      text-align: center;
      font-size: 0.85rem;
      color: #6e4e3f;
    }
    .policy-links {
      margin-top: 0.5rem;
    }
    .policy-links a {
      margin: 0 0.7rem;
      text-decoration: none;
      color: #6e4e3f;
    }
    .policy-links a:hover {
      color: #b37841; 
    }
  </style>
</head>
<body>

<header>
  <div class="navbar">
    <h1 class="logo">PINK Bakery</h1>
    <nav>
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="bakery.php">MENU</a></li>
        <li><a href="about.php">ABOUT</a></li>
        <li><a href="kontak.php">CONTACT</a></li>
        <?php if (isset($_SESSION["id_user"])): ?>
          <li><a href="logout.php">LOGOUT</a></li>
        <?php else: ?>
          <li><a href="login.php">LOGIN</a></li>
          <li><a href="register.php">REGISTRASI</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
  <div class="hero-image">
    <img src="image/img1.jpg" alt="Bakery Display">
  </div>
</header>

<section class="promotions">
  <h2>Promo Spesial</h2>
  <div class="promo-grid">
    <?php
      $conn = new mysqli("localhost", "root", "", "bakery");
      $promo = $conn->query("SELECT p.id_produk, pr.judul, pr.deskripsi, pr.gambar 
                              FROM tb_promo pr
                              JOIN tb_produk p ON pr.id_produk = p.id_produk");
      while ($row = $promo->fetch_assoc()) {
        echo '<div class="promo-card">';
        echo '<p><strong>' . $row['judul'] . '</strong><br>' . $row['deskripsi'] . '</p>';
        echo '<img src="image/' . $row['gambar'] . '" alt="Promo">';
        if (isset($_SESSION["id_user"])) {
          echo '<form method="POST" action="cart.php">';
          echo '<input type="hidden" name="id_produk" value="' . $row['id_produk'] . '">';
          echo '<input type="hidden" name="jumlah" value="1">';
          echo '</form>';
        } 
        echo '</div>';
      }
    ?>
  </div>
</section>

<section class="featured-menu">
  <h2>Produk Bestseller</h2>
  <p style="text-align: center;">The best from our kitchen</p>
  <div class="menu-grid">
    <?php
      $bestseller = $conn->query("SELECT p.id_produk, p.nama_produk, p.harga, p.gambar 
                                  FROM tb_bestseller b 
                                  JOIN tb_produk p ON b.id_produk = p.id_produk");
      while ($row = $bestseller->fetch_assoc()) {
        echo '<div class="menu-item">';
        echo '<img src="image/' . $row['gambar'] . '" alt="' . $row['nama_produk'] . '">';
        echo '<p><strong>' . $row['nama_produk'] . '</strong><br>Rp. ' . number_format($row['harga'] *1000, 0, '.') . '</p>';
        if (isset($_SESSION["id_user"])) {
          echo '<form method="POST" action="cart.php">';
          echo '<input type="hidden" name="id_produk" value="' . $row['id_produk'] . '">';
          echo '<input type="hidden" name="jumlah" value="1">';
          echo '</form>';
        }
        echo '</div>';
      }
    ?>
  </div>
</section>

<section class="customer-feedback">
  <h2>Feedback Customer</h2>
  <div class="feedback-grid">
    <?php
      $feedback = $conn->query("SELECT email, review FROM tb_feedback ORDER BY id_feedback DESC LIMIT 6");
      while ($row = $feedback->fetch_assoc()) {
        echo '<div class="feedback-card">';
        echo '<p>"' . htmlspecialchars($row["review"]) . '"</p>';
        echo '<h4>- ' . htmlspecialchars($row["email"]) . '</h4>';
        echo '</div>';
      }
    ?>
  </div>

  <?php if (isset($_SESSION["id_user"])): ?>
  <div class="feedback-form">
    <h3>Kirim Feedback Anda</h3>
    <form action="feedback.php" method="POST">
      <input type="email" name="email" placeholder="Email" required />
      <textarea name="komentar" placeholder="Tulis komentar Anda..." required></textarea>
      <button type="submit">Kirim</button>
    </form>
  </div>
  <?php else: ?>
    <p style="text-align:center;">Silakan <a href="login.php">login</a> terlebih dahulu untuk memberikan feedback.</p>
  <?php endif; ?>
</section>

<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-column brand">
      <div class="brand-circle">P</div>
      <h3>Pink Bakery</h3>
      <p>Bringing you the finest baked goods with love and passion. Every bite tells a story of quality and care.</p>
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

<?php $conn->close(); ?>
</body>
</html>
