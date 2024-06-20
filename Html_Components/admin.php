<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href=".././Styles/navstyle.css" rel="stylesheet" />
    <link href=".././Styles/body.css" rel="stylesheet" />
    <link rel="stylesheet" href=".././Styles/admin.css" />
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

    <div class="full-container">
        <h1 class="title">
            Welcome <?php echo $_SESSION["username"]; ?>!
        </h1>
        <div class="actions-container">
            <div class="action">
                <p class="action-title">Adauga o noua intrebare</p>
                <div class="separator"></div>
                <div class="question-form">
                    <form>
                        <div class="input-block">
                        <label for="question-text">
                            Enuntul intrebarii:
                        </label>
                        <textarea  id="question-text" placeholder="What do you want to ask...">

                        </textarea>
                        </div>


                        <div class="input-block">
                        <label for="img-url">
                            Image URL:
                        </label>
                        <input type="text" id="img-url" placeholder="eg: https://imagesonline.com/img.png"/>
                        </div>


                         <div class="input-block">
                        <label for="variant1">
                            Varianta 1:
                        </label>
                        <textarea id="variant1" placeholder="First variant"></textarea>
                        </div>

                        <div class="input-block">
                        <label for="variant2">
                            Varianta 2:
                        </label>
                         <textarea id="variant2" placeholder="Second variant"></textarea>
                        </div>

                        <div class="input-block">
                        <label for="variant1">
                            Varianta 3:
                        </label>
                         <textarea  id="variant3" placeholder="Third variant"></textarea>
                        </div>
                        <div class="note-container">
                        <p class="note">Seteaza variantele corecte:</p>
                        </div>
                        <div class="row-input">
                        <label for="variant1-check">
                            Varianta 1:
                        </label>
                        <input type="checkbox" id="variant1-check"/>
                        </div>

                        <div class="row-input">
                        <label for="variant2-check">
                            Varianta 2:
                        </label>
                        <input type="checkbox" id="variant2-check"/>
                        </div>

                        <div class="row-input">
                        <label for="variant3-check">
                            Varianta 3:
                        </label>
                        <input type="checkbox" id="variant3-check"/>
                        </div>
                        <div class="submit-container">
                        <input type="submit" id="submit-question" value="Incarca">
                        </div>
                    </form>
                </div>
                
            </div>

           

            <div class="action">
                <p class="action-title">Sterge un anumit utilizator</p>
                <div class="separator"></div>
                <form>
                     <div class="input-block">
                        <label for="user-delete">
                           Username-ul utilizatorului:
                        </label>
                        <input type="text" id="user-delete" placeholder="eg: IonSmecheru"/>
                        </div>
                         <input type="submit" id="submit-delete-user" value="Sterge">
                </form>
            </div>

            
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
