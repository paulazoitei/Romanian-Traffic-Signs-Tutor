
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
    <div class="nav">
        <div class="logo">
            <a href="home">
                <svg width="100" height="100" viewBox="0 0 100 100">
                    <image href=".././Assets/Icons/logo-rot.svg" width="100" height="100" />
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
                            <image href=".././Assets/Icons/menu.svg" width="50" height="50" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="login-or-register">
        <div class="login form-block">
            <p class="login-text">Login</p>
            <form class="login-form" action="/php/Romanian-Traffic-Signs-Tutor/Public/auth/login" method="post">
                <div class="input-field">
                    <label for="username">Username:</label><br />
                    <div id="login-username-error" class="error-message"></div>
                    <input type="text" id="username" name="username" placeholder="Introdu username-ul tau..." />
                    <br /><br />
                </div>
                <div class="input-field">
                    <label for="password">Password:</label><br />
                    <div id="login-password-error" class="error-message"></div>
                    <input type="password" id="password" name="password" placeholder="Introdu parola ta..." />
                </div>
                <?php if (isset($_SESSION['login_error'])): ?>
                    <div class="error-message">
                        <?php
                        echo $_SESSION['login_error'];
                        unset($_SESSION['login_error']);
                        ?>
                    </div>
                <?php endif; ?>
                <div class="submit-container">
                    <input type="submit" class="submit-button" id="submit-login" />
                </div>
            </form>
        </div>
        <div class="separator"></div>
        <div class="register form-block">
            <p class="login-text">Register</p>
            <form class="login-form" id="register-form" action="/php/Romanian-Traffic-Signs-Tutor/Public/auth/register" method="post">
                <div class="input-field">
                    <label for="register-username">Username:</label><br>
                    <input type="text" id="register-username" name="username" placeholder="ex: AlexDriver"><br>

                    <br>
                </div>
                <div class="error-message" id="username-error"></div>
                <div class="input-field">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" placeholder="Introdu un email valid..."><br>

                    <br>
                </div>
                <div class="error-message" id="email-error"></div>
                <div class="input-field">
                    <label for="register-password">Password:</label><br>
                    <input type="password" id="register-password" name="password" placeholder="Introdu o parola puternica..."><br>
                    <div class="error-message" id="password-error"></div>
                    <br>
                </div>
                <div class="input-field">
                    <label for="confirm-password">Confirm Password:</label><br>
                    <input type="password" id="confirm-password" name="password_confirmation" placeholder="Introdu din nou parola ta"><br>

                    <br>
                </div>
                <div class="error-message" id="confirm-password-error"></div>
                <div class="input-field">
                    <label for="phone">Phone number:</label><br>
                    <input type="text" id="phone" name="phone" placeholder="Introdu un numar de telefon..."><br>

                </div>
                <div class="error-message" id="phone-error"></div>
                <?php if (isset($_SESSION['register_error'])): ?>
                    <div class="error-message">
                        <?php
                        echo $_SESSION['register_error'];
                        unset($_SESSION['register_error']); // Clear error after displaying
                        ?>
                    </div>
                <?php endif; ?>
                <div class="submit-container">
                    <input type="submit" class="submit-button" id="submit-register" value="Trimite">
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
