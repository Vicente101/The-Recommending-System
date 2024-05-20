<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="contacts.css">
</head>
<body>
    <!--Nav bar-->
    <nav class="navbar">
        <div class="nav-logo">
            <a href="index.php"><img src="images/company_logo.png" alt="Company Logo"></a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="location.php">Weather</a></li>
            <li><a href="crops.php">Crops</a></li>
            <li><a href="#resources">Resources</a></li>
            <li><a href="contacts.php">Contact</a></li>
        </ul>
    </nav>
  <section class="contact" id="contact">
    <div class="container">
      <h2>CONTACT US</h2>
      <p>We'd love to hear from you! Feel free to reach out with any questions or feedback you may have.</p>

      <div class="contact-info">
        <div>
          <i class="fas fa-envelope"></i>
          <p>Email: croprecommendation@gmail.com</p>
        </div>
        <div>
          <i class="fas fa-phone"></i>
          <p>Phone: 0768891429 & 097369222</p>
        </div>
        <div>
          <i class="fas fa-map-marker-alt"></i>
          <p>Address: Northrise, along kalewa rd, Ndola, Zambia.</p>
        </div>
      </div>

      <form action="contacts.php" method="post">
        <div class="form-group">
          <label for="name">Enter your name</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Enter your Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="message">Enter your message</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn">Send Message</button>
      </form>

    </div>
  </section>
<!--  Footer Section -->
        <footer class="footer">
            <div>
                <div class="footer-content">
                    <div class="logo">
                        <img src="images/company_logo.png" alt="Company Logo" />
                    </div>
                    <div class="contact-info">
                        <p>Email: croprecommendation@gmail.com</p>
                    </div>
                    <div class="contact-button">
                        <a href="contacts.php" class="btn">Contact Us</a>
                    </div>
                </div>
            </div>
        </footer>


  <script src="https://kit.fontawesome.com/your-fontawesome-kit-code.js" crossorigin="anonymous"></script>
</body>
</html>
