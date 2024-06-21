<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href=".././Styles/style.css" />
    <link rel="stylesheet" href=".././Styles/navstyle.css" />
    <link rel="stylesheet" href=".././Styles/body.css" />
    <link rel="stylesheet" href=".././Styles/question.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <title>Chestionar</title>
  </head>
  <body>
     <script><?php

    if (isset($_SESSION['user_id'])) {
         echo 'var uid = "' . $_SESSION['user_id'] . '";';
    }
    else {
      echo 'var uid = "";';
    }

        ?></script>
     <script src="../Scripts/quiz.js"></script>
    <script src="../Scripts/sound-control.js"></script>
    <script src="../Scripts/responsive-navbar.js"></script>
    <script src="../Scripts/background-options.js"></script>
    <script src="../Scripts/accesare-cont.js"></script>
    <div class="bg-image-container">
      <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
    </div>
    <div class="container">
       <?php include 'navbar.php'; ?>

      <div class="question-container">
        <div class="header">
           <audio controls autoplay loop id="audio">
  
            <source src=".././Assets/Sound/song.mp3" type="audio/mpeg">
            
          </audio>
          <span class="information">Intrebari corecte: 0</span>
          <span class="information">Intrebari gresite: 0</span>
          <span class="information">Intrebari ramase: 0</span>
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
                  <p class="variant">Varianta 1</p>
                </label>
                <label for="variant2" class="variant-container" id="v2cont">
                  <input type="checkbox" id="variant2" />
                  <p class="variant">Varianta 2</p>
                </label>
                <label for="variant3" class="variant-container" id="v3cont">
                  <input type="checkbox" id="variant3" />
                  <p class="variant">Varianta 3</p>
                </label>
                <input type="button" class="send" value="Trimitere Raspuns" />
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="sound">
          <img src="../Assets/Images/sound-on.png" alt="toggle-sound" width="100" id="sound-icon">
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
