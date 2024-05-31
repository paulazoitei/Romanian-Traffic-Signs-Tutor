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
    <script src="../Scripts/responsive-navbar.js"></script>
    <script src="../Scripts/traffic-signs-parse.js"></script>
    <script src="../Scripts/accesare-cont.js"></script>
    <div class="bg-image-container">
      <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
    </div>
    <div class="container">
      <div class="nav">
        <div class="logo">
          <a href="home">
            <svg width="100" height="100" viewBox="0 0 100 100">
              <image
                href=".././Assets/Icons/logo-rot.svg"
                width="100"
                height="100"
              />
            </svg>
          </a>
        </div>
        <div class="nav-content">
          <ul class="nav-list">
            <li class="item toDisplay">
              <a href="chestionar">Chestionare</a>
            </li>
            <li class="item toDisplay">
              <a href="clasament">Clasament</a>
            </li>
            <li class="dropdown toDisplay">
              <a href="mediu_invatare"
                >Mediu Invatare</a
              >
              <div class="dropdown-container">
                <ul class="dropdown-list">
                  <li class="dropdown-item">
                    <a href="chestionar_practica">Chestionare de practica</a>
                  </li>

                  <li class="dropdown-item"><a href="legislatie">Legislatie</a></li>

                  <li class="dropdown-item"><a href="semne_rutiere">Semne rutiere</a></li>
                </ul>
              </div>
            </li>
            <li class="item toDisplay">
              <a href="auth" id="profile-switcher">Accesare Cont</a>
            </li>
            <li class="menu">
              <a href="" id="menu-button">
                <svg width="50" height="50" viewBox="0 0 50 50">
                  <image
                    href=".././Assets/Icons/menu.svg"
                    width="50"
                    height="50"
                  />
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
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
