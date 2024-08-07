<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href=".././Styles/style.css" />
    <link rel="stylesheet" href=".././Styles/navstyle.css" />
    <link rel="stylesheet" href=".././Styles/body.css" />
    <link rel="stylesheet" href=".././Styles/chestionar.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <title>Chestionare</title>
  </head>
  <body>
    <script src="../Scripts/responsive-navbar.js"></script>
    <script src="../Scripts/accesare-cont.js"></script>
    <div class="bg-image-container">
      <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
    </div>
    <div class="container">
       <?php include 'navbar.php'; ?>
      <div class="info-container">
        <div class="title-container">
          <p class="title-quiz">Chestionare</p>
        </div>
        <div class="text-container">
          <p class="text-quiz">
            <strong class="text-quiz-title"
              >Bine te-am gasit pe sectiunea chestionarelor oficiale!</strong
            ><br /><br />
            Aceste chestionare vor fi metoda principala pentru a-ti testa
            capacitatile in urma invatarii temeinice a teoriei. Fiecare
            chestionar va fi compus din 26 de intrebari, din care minimul pentru
            a fi admis este de 22 raspunsuri corecte.
            <br />
            Pentru a-ti monitoriza progresul si pentru a-ti demonstra
            capacitatea, aceste chestionare vor fi punctate pozitiv sau negativ,
            in functie de corectitudinea raspunsurilor tale.
            <br /><br />
            Punctajele vor fi acordate in felul urmator:
            <br />
          </p>
          <br />
          <ul class="point-list">
            <li>Chestionar admis 26/26 : +20 puncte</li>
            <li>Chestionar admis : +10 puncte</li>
            <li>Chestionar picat : -5 puncte</li>
            <li>Intrebare corecta : +0.5 puncte</li>
            <li>Intrebare gresita : -0.5 puncte</li>
          </ul>
          <br />
          <p class="text-quiz">
            Cand te simti pregatit, apasa pe start pentru a porni chestionarul.
          </p>
        </div>
      </div>
      <div class="wrapper">
        <a class="start-button-clickable" href="chestionar_started">
          <div class="start-button">
            <p>START</p>
            <svg
              class="icon-circle"
              width="100"
              height="100"
              viewBox="0 0 100 100"
            >
              <image
                href="../Assets/Icons/right-arrow.svg"
                width="100"
                height="100"
              />
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
