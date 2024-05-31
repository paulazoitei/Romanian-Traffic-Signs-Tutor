<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href=".././Styles/style.css" />
    <link rel="stylesheet" href=".././Styles/navstyle.css" />
    <link rel="stylesheet" href=".././Styles/body.css" />
    <link rel="stylesheet" href=".././Styles/question.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <title>Chestionar</title>
  </head>
  <body>
    <script src="../Scripts/responsive-navbar.js"></script>
    <script src="../Scripts/background-options.js"></script>
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
                    <a href="chestionar_practica"
                      >Chestionare de practica</a
                    >
                  </li>

                  <li class="dropdown-item">
                    <a href="legislatie">Legislatie</a>
                  </li>

                  <li class="dropdown-item">
                    <a href="semne_rutiere"
                      >Semne rutiere</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li class="item toDisplay">
              <a href="auth" id="profile-switcher"
                >Accesare Cont</a
              >
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

      <div class="question-container">
        <div class="header">
          <span class="information">Intrebari corecte:</span>
          <span class="information">Intrebari gresite:</span>
        </div>
        <div class="question-and-image">
          <div class="q-image-container">
            <img
              class="q-image"
              src="../Assets/Images/question-image.jpg"
              alt="question image"
            />
          </div>
          <div class="question">
            <div class="question-text">
              <p>Intrebare demo</p>
            </div>
            <div class="question-form">
              <form>
                <label for="variant1" class="variant-container" id="v1cont">
                  <input type="checkbox" id="variant1" />
                  Varianta 1
                </label>
                <label for="variant2" class="variant-container" id="v2cont">
                  <input type="checkbox" id="variant2" />
                  Varianta 2
                </label>
                <label for="variant3" class="variant-container" id="v3cont">
                  <input type="checkbox" id="variant3" />
                  Varianta 3
                </label>
                <input type="button" class="send" value="Trimitere Raspuns" />
              </form>
            </div>
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
