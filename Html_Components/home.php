

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
    <title>RoTST</title>
  </head>
  <body>
    <?php
      $isAuthenticated = isset($_SESSION['user_id']) && isset($_SESSION['auth_token']) && isset($_SESSION['username']);

     
        echo "<script>";
        echo "console.log('Utilizatorul este " . ($isAuthenticated ? "autentificat" : "neautentificat") . "');";
        echo "</script>";
        ?>
    <script src="../Scripts/responsive-navbar.js"></script>

    <script src="../Scripts/accesare-cont.js"></script>
    <div class="bg-image-container">
      <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
    </div>
    <div class="container">
       <?php include 'navbar.php'; ?>
      <div class="background-home-page">
        <p class="title">Bun venit pe Romanian Traffic Signs Tutor!</p>
      </div>
      <div class="home-page-content">
        <div class="content-container">
          <ul class="content-list">
            <li class="content">
              🚗 Aici este locul unde vei învăța semnele rutiere, legislația în
              vigoare din România și vei putea să îți testezi cunoștințele
              făcând chestionare de antrenament sau chestionare cu care poți
              concura cu ceilalți utilizatori ai aplicației.
            </li>
            <li class="content">
              🚗 Progresul tău va fi salvat și vei putea să îți monitorizezi
              evoluția în timp.
            </li>
            <li class="content">
              🚗 În cazul în care ai neclarități cu privire la folosirea
              aplicației poți accesa secțiunea help pe care o găsești în partea
              de jos a site-ului.
            </li>
            <li class="content">
              🚗Dacă ai probleme cu aplicația sau dorești să ne transmiti
              reclamații, poți să ne contactezi folosind formularul de contact
              pe care îl găsești în secțiunea about, care se află de asemenea în
              partea de jos a site-ului.
            </li>
          </ul>
          <div class="home-page-image"> 
            <img
              src=".././Assets/Images/poza_home.webp"
              alt="Descriere imagine"
            />
          </div>
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
