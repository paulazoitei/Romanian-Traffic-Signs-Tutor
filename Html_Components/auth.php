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
<script src="../Scripts/responsive-navbar.js"></script>
<script src="../Scripts/accesare-cont.js"></script>
<script src="../Scripts/register-validation.js" defer></script>
<script src="../Scripts/login-validation.js" defer></script>
<div class="bg-image-container">
    <img src=".././Assets/Images/bodybg.jpg" class="bg-image" alt="bg-img" />
</div>
<div class="container">
     <?php include 'navbar.php'; ?>

    <div class="login-or-register">
        <div class="login form-block">
            <p class="login-text">Login</p>

            <form class="login-form" action="/php/Romanian-Traffic-Signs-Tutor/Public/auth/login" method="post">
                <div class="input-field">
                    <label for="username">Username:</label><br />
                    <input type="text" id="username" name="username" placeholder="Introdu username-ul tau..." />
                    <br /><br />
                </div>
                <div class="input-field">
                    <label for="password">Password:</label><br />
                    <input type="password" id="password" name="password" placeholder="Introdu parola ta..." />
                </div>
                <div class="forgot-password">
                    <a href="/php/Romanian-Traffic-Signs-Tutor/Public/forgot_password" id="forgot-password-link">Forgot Password?</a>
                </div>
                <div id="login-error-container" class="error-message"></div>
                <?php if (isset($_SESSION['login_error'])): ?>
                    <div class="error-message">
                        <?php
                        echo $_SESSION['login_error'];
                        unset($_SESSION['login_error']);
                        ?>
                    </div>
                <?php endif; ?>
                <div class="submit-container">
                    <input type="submit" class="submit-button" id="submit-login" value="Connect" />
                </div>

            </form>

        </div>
        <div class="separator"></div>

        <div class="register form-block">
            <p class="login-text">Register</p>
            <form class="login-form" id="register-form" method="post">
                <div class="input-field">
                    <label for="register-username">Username:</label><br>
                    <input type="text" id="register-username" name="username" placeholder="ex: AlexDriver"><br>
                    <div id="username-error" class="error-message"></div>
                    <br>
                </div>
                <div id="username-error-container" class="error-message"></div> <!-- Added container -->

                <div class="input-field">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" placeholder="Introdu un email valid..."><br>
                    <div id="email-error" class="error-message"></div>
                    <br>
                </div>
                <div id="email-error-container" class="error-message"></div> <!-- Added container -->

                <div class="input-field">
                    <label for="register-password">Password:</label><br>
                    <input type="password" id="register-password" name="password" placeholder="Introdu o parola puternica..."><br>
                    <div id="password-error" class="error-message"></div>
                    <br>
                </div>
                <div class="input-field">
                    <label for="confirm-password">Confirm Password:</label><br>
                    <input type="password" id="confirm-password" name="password_confirmation" placeholder="Introdu din nou parola ta"><br>
                    <div id="confirm-password-error" class="error-message"></div>
                    <br>
                </div>
                <div class="input-field">
                    <label for="phone">Phone number:</label><br>
                    <input type="text" id="phone" name="phone" placeholder="Introdu un numar de telefon..."><br>
                    <div id="phone-error" class="error-message"></div>
                    <br>
                </div>
                <div class="submit-container">
                    <input type="submit" class="submit-button" id="submit-register" value="Register in">
                </div>
            </form>
        </div>


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
