<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href=".././Styles/style.css" />
    <link rel="stylesheet" href=".././Styles/navstyle.css" />
    <link rel="stylesheet" href=".././Styles/body.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../Styles/about.css" />
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

      <div class="about-us-container">
        <div class="about-us">
          <p class="about-us-title">Despre acest site</p>
          <hr />
          <br /><br />
          <p class="about-us-text">
            RoTST (Romanian Traffic Signs Tutor) este o aplicatie web conceputa
            cu scopul de a asista la educatia soferilor din Romania cu privire
            la legislatia rutiera, semne rutiere intr-un mod distractiv si
            competitiv. <br /><br />
            Prin intermediul chestionarelor oficiale utilizatorii vor putea sa
            isi demonstreze cunostintele prin acumularea (sau pierderea!) de
            puncte.<br /><br />
            Pe sectiunea "Clasament" vor fi afisati in ordinea descrescatoare a
            punctajelor top-ul celor mai descurcareti utilizatori, deci
            antreneaza-te folosind chestionarele de practica, legislatia si
            semnele rutiere dispuse la noi pe site (in sectiunea Mediu de
            invatare) pentru a-ti vedea numele in acest top! <br /><br />Pentru
            mai multe detalii acceseaza sectiunea de
            <a href="help">Help</a>.<br /><br />
          </p>
        </div>
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
