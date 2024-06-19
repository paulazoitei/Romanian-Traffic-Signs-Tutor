<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href=".././Styles/style.css" />
  <link rel="stylesheet" href=".././Styles/navstyle.css" />
  <link rel="stylesheet" href=".././Styles/body.css" />
  <link rel="stylesheet" href=".././Styles/learn.css" />

  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
  <title>RoTST</title>
</head>

<body>
  <script src="../Scripts/responsive-navbar.js"></script>
  <script src="../Scripts/accesare-cont.js"></script>
  <div class="bg-image-container">
    <img class="bg-image" src=".././Assets/Images/bodybg.jpg" alt="background">
  </div>

  <div class="container">
    <?php include 'navbar.php'; ?>
    <div class="mediu-container">
      <p class="info-title">
        Aceasta pagina este dedicata mediului de invatare a semnelor de
        circulatie si a legislatiei rutiere.
      </p>
      <br />
      <p class="info-description">
        Pentru inceput, selecteaza una din categoriile de mai jos pentru a
        incepe procesul de invatare:
      </p>
    </div>

    <div class="options">
      <a href="chestionar_practica">
        <div class="option">
          <p class="option-title">Chestionare de practica</p>
          <svg width="200" height="200" viewBox="0 0 200 200">
            <image href="../Assets/Icons/quiz.svg" width="200" height="200" />
          </svg>
        </div>
      </a>

      <a href="legislatie">
        <div class="option">
          <p class="option-title">Legislatie</p>
          <svg width="200" height="200" viewBox="0 0 200 200">
            <image href="../Assets/Icons/document.svg" width="200" height="200" />
          </svg>
        </div>
      </a>
      <a href="semne_rutiere">
        <div class="option">
          <p class="option-title">Semne rutiere</p>
          <svg width="200" height="200" viewBox="0 0 200 200">
            <image href="../Assets/Icons/stop.svg" width="200" height="200" />
          </svg>
        </div>
      </a>
    </div>

  </div>

 
  <footer class="about-section">
    <div class="despre-noi">
      <div class="follow-us">Follow us:</div>
      <div class="social-media-icons">
        <link
          rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
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