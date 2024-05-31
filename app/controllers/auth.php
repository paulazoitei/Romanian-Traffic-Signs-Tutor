<?php
require_once __DIR__ . '/../core/Controller.php';

class Auth extends Controller

{
   public function index()
{
    // Verificare dacă utilizatorul este deja autentificat
    if (isset($_SESSION['user_id']) && isset($_SESSION['auth_token']) && isset($_SESSION['username'])) {
        // Utilizatorul este deja autentificat, deci îl redirecționăm către pagina de profil
        header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/profil");
        exit();
    }

    // Dacă utilizatorul nu este autentificat, afișăm pagina de autentificare
    $this->view('auth');
}

    public function register()
    {
        if(empty($_POST["username"]))
        {
            $_SESSION['register_error'] = "Username is required!";
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }
        if( ! filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
        {
            $_SESSION['register_error'] = "Valid email is required";
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }

        $isPasswordComplex = function($password) {
            $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
            return preg_match($pattern, $password);
        };

        if (!$isPasswordComplex($_POST['password'])) {
            $_SESSION['register_error'] = "Your password is not complex enough, it must contain at least 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character.";
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }

        if($_POST["password"] !== $_POST["password_confirmation"])
        {
            $_SESSION['register_error'] = "Passwords must match";
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }

        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $isValidPhoneNumber = function($phone) {
            $pattern = '/^\+?\d{10,15}$/';
            return preg_match($pattern, $phone);
        };

        if (!$isValidPhoneNumber($_POST['phone']))
        {
            $_SESSION['register_error'] = "Invalid phone number";
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }

        $mysqli = require __DIR__ . "/../database/database.php";

        $sql = "INSERT INTO users (username, email, password, phone) VALUES (?, ?, ?, ?)";

        $stmt = $mysqli->stmt_init();

        if(! $stmt->prepare($sql))
        {
            $_SESSION['register_error'] = "SQL error: " . $mysqli->error;
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }

        $stmt->bind_param("ssss",
            $_POST["username"],
            $_POST["email"],
            $password_hash,
            $_POST["phone"]
        );

        try {
            if ($stmt->execute()) {
                $_SESSION['user_id'] = $stmt->insert_id;
                $_SESSION['username'] = $_POST["username"];
                header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/profil");
                exit();
            } else {
                throw new Exception($stmt->error, $stmt->errno);
            }
        } catch (Exception $e) {
            if ($e->getCode() == 1062) {
                $_SESSION['register_error'] = "Email already exists.";
            } else {
                $_SESSION['register_error'] = "Error: " . $e->getMessage();
            }
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }
    }


   public function login()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (empty($_POST["username"])) {
            $_SESSION['login_error'] = "Username is required!";
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }

        if (empty($_POST["password"])) {
            $_SESSION['login_error'] = "Password is required!";
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }

        $mysqli = require __DIR__ . "/../database/database.php";

        $sql = sprintf("SELECT * FROM users WHERE username='%s'",
            $mysqli->real_escape_string($_POST["username"]));
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

        if ($user) {
            if (password_verify($_POST["password"], $user["password"])) {
                // Generare token unic
                $token = bin2hex(random_bytes(16)); // Generează un string hex de 32 de caractere

                // Salvare token în sesiune
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['auth_token'] = $token;

                // Redirecționare către pagina profilului sau altă pagină protejată
                header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/profil");
                exit();
            } else {
                $_SESSION['login_error'] = "Incorrect password.";
                header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
                exit();
            }
        } else {
            $_SESSION['login_error'] = "Username does not exist.";
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }
    }
}

    public function logout()
    {

        session_start();

        session_destroy();

        header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
        exit();
    }

}