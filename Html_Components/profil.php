<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href=".././Styles/style.css" />
    <link rel="stylesheet" href=".././Styles/navstyle.css" />
    <link rel="stylesheet" href=".././Styles/body.css" />
    <link rel="stylesheet" href="../Styles/profile.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway"
      rel="stylesheet"
    />
    <title>RoTST</title>
  </head>
  <body>
    <script src="../Scripts/accesare-cont.js"></script>
    <script src="../Scripts/responsive-navbar.js"></script>
  <script src="../Scripts/profile.js"></script>
    <div class="bg-image-container">
      <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
    </div>
    <div class="container">
       <?php include 'navbar.php'; ?>
         <script><?php

    if (isset($_SESSION['user_id'])) {
         echo 'var uid = "' . $_SESSION['user_id'] . '";';
    }
    else {
      echo 'var uid = "";';
    }

        ?></script>
      <div class="profile-container">
        <div class="profile">
          <img id="avatar" class="avatar" src="../Assets/Images/avatar.webp" alt="avatar" />
          <p id="username" class="username"><?php echo $_SESSION['username']; ?></p>
          <p id="rank" class="rank">Incepator</p>
          <p id="points" class="points">Puncte: 0</p>
          <p id="points-until-next-rank" class="remaining">Puncte ramase pana la urmatorul rank: 50</p>
          <p id="successes" class="admise">Total chestionare admise: 0</p>
          <p id="fails" class="picate">Total chestionare picate: 0</p>
          <p id="place" class="points">Loc in clasament: </p>
            <form action="/php/Romanian-Traffic-Signs-Tutor/Public/auth/logout" method="post" id="logout">
                <button type="submit">Sign Out</button>
            </form>

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
