<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href=".././Styles/style.css" />
    <link rel="stylesheet" href=".././Styles/navstyle.css" />
    <link rel="stylesheet" href=".././Styles/body.css" />
    <link rel="stylesheet" href=".././Styles/clasament.css" />
    <link rel="stylesheet" href=".././Styles/question.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
    <title>Clasament</title>
    <link rel="alternate" type="application/rss+xml" title="RSS Feed Clasament" href="http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/rss-feed.php" />
  </head>
  <body>
    <script>
<?php
if (isset($_SESSION['user_id'])) {
    echo 'var uid = "' . $_SESSION['user_id'] . '";';
} else {
    echo 'var uid = "";';
}
?>
    </script>
    <script src="../Scripts/clasament.js"></script>
    <script src="../Scripts/sound-control.js"></script>
    <script src="../Scripts/responsive-navbar.js"></script>
    <script src="../Scripts/accesare-cont.js"></script>
    
    <audio controls autoplay loop id="audio">
        <source src=".././Assets/Sound/clasament.mp3" type="audio/mpeg">
    </audio>
    <div class="bg-image-container">
      <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
    </div>
    <div class="container">
       <?php include 'navbar.php'; ?>
      
      <div class="top-container">
        
        <p class="top-title">Clasament</p>
        <div class="no-overflow-top">
          <img src="../Assets/Images/trofeu.png" alt="trofeu" class="trophy" />
          <div class="top" id="top">
          
          <div class="column-names">
            <p class="place">Place</p>
            <p class="user">User</p>
            <p class="points">Points</p>
          </div>
         
        </div>
        </div>
         <a href="feed" class="rss-hyperlink">
          <div class="rss-button"><div class="left">Download as RSS Feed</div><div class="right"><img src=".././Assets/Images/download.png" alt="download button" width="50"/></div></div>
        </a>
        
      </div>
         <div id="sound">
          <img src="../Assets/Images/sound-on.png" alt="toggle-sound" width="100" id="sound-icon">
      </div>

    </div>
 
    <footer class="about-section">
      <div class="despre-noi">
        <div class="follow-us">Follow us:</div>
        <div class="social-media-icons">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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