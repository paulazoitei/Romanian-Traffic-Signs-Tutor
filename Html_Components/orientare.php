<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href=".././Styles/style.css" />
    <link rel="stylesheet" href=".././Styles/navstyle.css" />
    <link rel="stylesheet" href=".././Styles/body.css" />
    <link rel="stylesheet" href=".././Styles/semne-fetch.css" />
    <title>semne</title>
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
              <a href="mediu_invatare">Mediu Invatare</a>
              <div class="dropdown-container">
                <ul class="dropdown-list">
                  <li class="dropdown-item">
                    <a href="chestionar_practica">Chestionare de practica</a>
                  </li>

                  <li class="dropdown-item">
                    <a href="legislatie">Legislatie</a>
                  </li>

                  <li class="dropdown-item">
                    <a href="semne_rutiere">Semne rutiere</a>
                  </li>
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
      <h1>Indicatoare de orientare</h1>
      <div class="sign-test" id="sign-container"></div>
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
