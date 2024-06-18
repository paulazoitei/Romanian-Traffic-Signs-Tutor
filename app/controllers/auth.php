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
        $data = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'password_confirmation' => $_POST['password_confirmation'],
            'phone' => $_POST['phone'],
        ];

        $url = 'http://yourdomain.com/api/register'; // Adaptează URL-ul către endpoint-ul tău REST API

        $options = [
            'http' => [
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $response = json_decode($result, true);

        if (isset($response['error'])) {
            $_SESSION['register_error'] = $response['error'];
            header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
            exit();
        }

        $_SESSION['user_id'] = $response['user_id'];
        $_SESSION['username'] = $_POST["username"];
        header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/profil");
        exit();
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