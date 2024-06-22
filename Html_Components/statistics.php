<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href=".././Styles/style.css" />
    <link rel="stylesheet" href=".././Styles/navstyle.css" />
    <link rel="stylesheet" href=".././Styles/body.css" />
    <link rel="stylesheet" href=".././Styles/statistics.css"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
    <title>RoTST</title>
</head>
<body>
<script src="../Scripts/responsive-navbar.js"></script>
<script src="../Scripts/accesare-cont.js"></script>
<script src="../Scripts/statistics.js"></script> <!-- Adaugă acest script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="bg-image-container">
    <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
</div>
<div class="container">
    <?php include 'navbar.php'; ?>

    <div class="statistics-container">
        <h1>Statistici</h1>
        <div class="statistics">
            <div class="stat-item">
                <h2>Utilizatori care au cont in aplicatie</h2>
                <p id="total-users">0</p>
            </div>
            <div class="stat-item">
                <h2>Numarul de admini din aplicatie</h2>
                <p id="total-admins">0</p>
            </div>
            <div class="stat-item">
                <h2>Punctajul mediu al utilizatorilor</h2>
                <p id="total-points">0</p>
            </div>
            <div class="stat-item">
                <h2>Procentajul chestionarelor reușite</h2>
                <p id="quiz-success-rate">0%</p>
            </div>
            <div class="stat-item">
                <h2>Numarul de intrebari de pe site</h2>
                <p id="number-of-questions">0</p>
            </div>
            <div class="stat-item">
                <h2>Numarul utilizatorilor care au  rank-ul maxim</h2>
                <p id="number-of-max-rank">0</p>
            </div>
            <div class="stat-item">
    <h2>Distribuția rankurilor utilizatorilor</h2>
    <canvas id="rankChart"></canvas>
    <button id="downloadChart">Download Chart
        <img src=".././Assets/Images/download_black.png" width="20px">
    </button>
</div>
        </div>
    </div>
</div>

<footer class="about-section">
    <div class="despre-noi">
        <div class="follow-us">Follow us:</div>
        <div class="social-media-icons">
            <link rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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