<?php
// contact.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>


  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff5f8;
    }

    h1.r {
      text-align: center;
      font-size: 40px;
      color: #b30059;
      margin: 40px 0 20px 0;
    }

    .contact-section {
      padding: 20px 50px;
    }

    .contact-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: space-around;
      margin-bottom: 40px;
    }

    .card {
      background-color: #fdf0f5;
      padding: 20px;
      border-radius: 10px;
      width: 300px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }

    .icon {
      font-size: 30px;
      color: #d6006e;
      margin-bottom: 10px;
    }

    .card h4 {
      margin-bottom: 10px;
      color: #b30059;
    }

    .card p {
      color: #333;
      font-size: 15px;
    }

    .contact-info {
      text-align: center;
      padding: 20px 40px;
    }

    .contact-info h3 {
      color: #b30059;
      font-size: 24px;
      margin-bottom: 10px;
    }

    .contact-info p {
      color: #444;
      font-size: 16px;
      line-height: 1.6;
      max-width: 700px;
      margin: 10px auto;
    }

    .social-icons {
      margin-top: 20px;
    }

    .social-icons i {
      font-size: 22px;
      margin: 0 10px;
      color: #d6006e;
      cursor: pointer;
    }

    .social-icons i:hover {
      color: #800040;
    }
  </style>
</head>
<body>
  <h1 class="r">Contact us</h1>

  <div class="contact-section">
    <div class="contact-cards">
      <div class="card">
        <i class="fas fa-map-marker-alt icon"></i>
        <h4>Our Main Office</h4>
        <p>Department of Women and Child Development,<br> Government of Karnataka,<br> Vikas Soudha, Dr. Ambedkar Veedhi,<br> Bengaluru - 560001</p>
      </div>
      <div class="card">
        <i class="fas fa-phone icon"></i>
        <h4>Phone Number</h4>
        <p>+91-80-2225 1111 (Toll Free)</p>
      </div>
      <div class="card">
        <i class="fas fa-envelope icon"></i>
        <h4>Email</h4>
        <p>wcd-kar@nic.in</p>
      </div>
    </div>

    <div class="contact-info">
      <h3>Get in touch</h3>
      <p><strong>We ensure reliability, low cost fares and most importantly, safety and comfort in mind.</strong></p>
      <p>Maecenas gravida lacus. Etiam sit amet convallis erat - class aptent taciti sociosqu ad litora torquent per conubia! Lorem etiam sit amet convallis erat.</p>
      <div class="social-icons">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-linkedin-in"></i>
      </div>
    </div>
  </div>
</body>
</html>