<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href=".././Styles/style.css" />
    <link rel="stylesheet" href=".././Styles/navstyle.css" />
    <link rel="stylesheet" href=".././Styles/body.css" />
    <link rel="stylesheet" href=".././Styles/help.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <title>RoTST</title>
  </head>

  <body>
    <script src="../Scripts/responsive-navbar.js"></script>
    <script src="../Scripts/help-questions.js"></script>
    <script src="../Scripts/accesare-cont.js"></script>
    <script src="../Scripts/questions-creator.js"></script>
    <script src="../Scripts/default-questions.js"></script>
    <div class="bg-image-container">
      <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
    </div>
    <div class="container">
       <?php include 'navbar.php'; ?>
      <div class="help-title">Selecteaza una din intrebarile de mai jos</div>
      <div class="faq-container">
        <div class="faq-item" data-isactive="false">
          <p class="question">Pot avea punctaj negativ?</p>
          <p class="answer">
            Da, un utilizator poate avea punctaj negativ in cazul in care acesta
            a gresit indeajuns de mult.
          </p>
        </div>

        <div class="faq-item" data-isactive="false">
          <p class="question">
            Chestionarele de practica imi afecteaza punctajul?
          </p>
          <p class="answer">
            Nu, chestionarele de practica sunt prezente cu scopul de a invata
            regulile de circulatie, astfel acestea nu ofera nici recompense ,
            nici nu taxeaza raspunsuri gresite.
          </p>
        </div>

        <div class="faq-item" data-isactive="false">
          <p class="question">Unde imi pot vedea progresul?</p>
          <p class="answer">
            Progresul poate fi accesat din pagina de profil a utilizatorului.
          </p>
        </div>

        <div class="faq-item" data-isactive="false">
          <p class="question">
            Cum procedez daca am o intrebare care nu se afla in aceasta
            sectiune?
          </p>
          <p class="answer">
            In cazul in care nu iti regasesti problema in aceasta sectiune poti
            accesa pagina de contact din antetul paginilor.
          </p>
        </div>
        <div class="faq-item" data-isactive="false">
          <p class="question">
            Care ar fi o strategie buna pentru invatarea cat mai eficienta?
          </p>
          <p class="answer">
            O strategie buna ar fi : citeste mai intai legislatia,invata semnele
            rutiere, completeaza cat mai multe chestionare de practica si dupa
            aceea incearca chestionarele oficiale cu ajutorul carora iti poti
            aprofunda cunostintele.
          </p>
        </div>
        
        <div class="faq-item" data-isactive="false">
          <p class="question">
            Cat de important este sa citesc legislatia inainte de a incepe sa
            invat pentru examen?
          </p>
          <p class="answer">
            Citirea legislatiei este un pas foarte important in invatarea pentru
            examenul auto deoarece aceasta contine toate regulile de circulatie
            pe care trebuie sa le cunosti daca omiti acest pas s-ar putea sa ai
            niste lacune in cunostintele tale.
          </p>
        </div>
        
        <div class="faq-item" data-isactive="false">
          <p class="question">Pot folosi aplicatia daca nu am cont?</p>
          <p class="answer">
            Da,poti folosi aplicatia dar progressul tau nu va fi salvat.
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
