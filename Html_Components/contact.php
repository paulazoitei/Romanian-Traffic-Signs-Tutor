<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href=".././Styles/style.css" />
  <link rel="stylesheet" href=".././Styles/navstyle.css" />
  <link rel="stylesheet" href=".././Styles/body.css" />
  <link rel="stylesheet" href=".././Styles/contact.css" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
  <title>RoTST</title>
</head>

<body>
  <script src="../Scripts/responsive-navbar.js"></script>
  <script src="../Scripts/accesare-cont.js"></script>
  <div class="bg-image-container">
    <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
  </div>
  <div class="container">
     <?php include 'navbar.php'; ?>

    

    <div class="contact-form-block">
      <form class="contact-form">
        <h2 class="contact-text">Contact</h2>
        <div class="input_field">
          <label for="subject">Subiect:</label><br />
          <input type="text" id="subject" /> <br /><br />
        </div>
        <div class="input_field">
          <label for="message">Mesaj:</label><br />
          <textarea id="message" rows="7"></textarea>
        </div>
        <div class="submit_container">
          <input type="submit" class="submit_button" />
        </div>
      </form>
    </div>
    
    

  </div>

  <footer class="about-section">
    <div class="despre-noi">
      <div class="follow-us">Follow us:</div>
      <div class="social-media-icons">
        <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <a href="https://facebook.com" class="fa fa-facebook"></a>
        <a href="https://twitter.com" class="fa fa-twitter"></a>
        <a href="https://linkedin.com" class="fa fa-linkedin"></a>
        <a href="https://instagram.com" class="fa fa-instagram"></a>
      </div>
    </div>

    <div class="about-buttons">
      <a href="about">
        <div class="button-footer">About</div>
      </a>
      <a href="help">
        <div class="button-footer">Help</div>
      </a>
      <a href="contact">
        <div class="button-footer">Contact</div>
      </a>
    </div>
  </footer>

</body>

</html>

