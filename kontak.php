<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact - PINK Bakery</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #b37841;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header div {
      font-weight: bold;
      font-size: 20px;
    }
    nav a {
      color: white;
      text-decoration: none;
      margin: 0 10px;
      font-weight: bold;
    }
    .container {
      padding: 40px 20px;
      max-width: 1100px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    .contact-info, .contact-form {
      flex: 1 1 45%;
      margin-bottom: 30px;
    }
    .contact-info img {
      width: 150px;
    }
    .contact-info p {
      margin: 10px 0;
    }
    .btn {
      background-color: #b37841;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
      margin-top: 10px;
    }
    .contact-form input,
    .contact-form textarea {
      width: 100%;
      margin: 10px 0;
      padding: 10px;
      font-size: 16px;
    }
    iframe {
      width: 100%;
      height: 300px;
      border: none;
      margin-top: 20px;
    }
    .cabang-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      background-color: #fff;
      padding: 40px 20px;
      margin-top: 30px;
    }
    .cabang-box {
      flex: 1 1 30%;
      border: 1px solid #ddd;
      padding: 20px;
      margin: 10px;
      border-radius: 10px;
      background-color: #fafafa;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .cabang-box h3 {
      margin-top: 0;
      color: #b37841;
    }
    .cabang-box p {
      margin: 10px 0;
    }
  </style>
</head>
<body>

  <header>
    <div>PINK <span style="font-weight: normal">Bakery</span></div>
    <nav>
      <a href="index.php">HOME</a>
      <a href="bakery.php">MENU</a>
      <a href="about.php">ABOUT</a>
      <a href="kontak.php">CONTACT</a>
      <a href="login.php">LOGIN</a>
      <a href="registrasi.php">REGISTRASI</a>
    </nav>
  </header>

  <div class="container">
    <div class="contact-info">
      <img src="image/CAKE5.jpg" alt="pink bakery Logo">
      <p><strong>Pink Bakery</strong></p>
      <p>📍 l. Kebon Sirih No. 123 Jakarta Pusat, 10340</p>
      <p>📞 (0274) 4435707</p>
      <p>📱 0882 9310 9029</p>
      <a href="https://wa.me/628112952910" class="btn">KONTAK PEROTLET</a>
    </div>

    <div class="contact-form">
      <h3>Contact <em>US</em></h3>
      <input type="text" placeholder="NAME" required />
      <input type="email" placeholder="EMAIL" required />
      <input type="text" placeholder="WHATSAPP" />
      <textarea rows="4" placeholder="MESSAGE"></textarea>
      <button class="btn">SEND</button>
    </div>
  </div>

  <div class="container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63355.35508901943!2d110.32186116825937!3d-7.848688416724621!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a579f0325d14f%3A0x988fd5e69dcae42d!2sPapa%20Cookies%20Bakery%20Pusat%20Jogja!5e0!3m2!1sid!2sid!4v1720510000000" allowfullscreen></iframe>
  </div>

  
</body>
</html>
