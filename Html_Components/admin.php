<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href=".././Styles/navstyle.css" rel="stylesheet" />
    <link href=".././Styles/body.css" rel="stylesheet" />
    <link rel="stylesheet" href=".././Styles/login.css" />
    <link rel="stylesheet" href=".././Styles/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
    <title>RoTST</title>
</head>

<body>
    <script src="../Scripts/admin.js"></script>
<script src="../Scripts/responsive-navbar.js"></script>
<script src="../Scripts/accesare-cont.js"></script>
<script><?php

if (isset($_SESSION['user_id'])) {
    echo 'var uid = "' . $_SESSION['user_id'] . '";';
}
    else {
      echo 'var uid = "";';
    }

?></script>
<div class="bg-image-container">
    <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
</div>
<div class="container">
     <?php include 'navbar.php'; ?>



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
