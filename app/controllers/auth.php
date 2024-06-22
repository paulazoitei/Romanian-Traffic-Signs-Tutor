<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once __DIR__ . '/../core/Controller.php';

class Auth extends Controller

{
   public function index()
{

    if (isset($_SESSION['user_id']) && isset($_SESSION['auth_token']) && isset($_SESSION['username'])) {

        header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/profil");
       exit();
    }


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

        $url = 'http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/register';

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

    private $key;

    public function __construct() {
        $this->key = file_get_contents(__DIR__ . '/../config/secret_key.txt');
    }


    public function login() {
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

            $data = [
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ];

            $url = 'http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/login';

            $options = [
                'http' => [
                    'header'  => "Content-Type: application/json\r\n",
                    'method'  => 'POST',
                    'content' => json_encode($data),
                ],
            ];

            $context  = stream_context_create($options);
            $result = @file_get_contents($url, false, $context);

            if ($result === FALSE) {
                $http_response_header = isset($http_response_header) ? $http_response_header : [];
                $http_code = $this->get_http_response_code($http_response_header);

                if ($http_code === 401) {
                    echo json_encode(['error' => 'Username or password are incorrect!']);
                    http_response_code(401);
                } else {
                    echo json_encode(['error' => 'Request failed']);
                    http_response_code(500);
                }
                exit();
            }

            $response = json_decode($result, true);

            if (isset($response['error'])) {
                echo json_encode(['error' => $response['error']]);
                http_response_code(401);
                exit();
            }

            $_SESSION['auth_token'] = $response['token'];

            $decoded = JWT::decode($response['token'], new Key($this->key, 'HS256'));
            $_SESSION['user_id'] = $decoded->sub;
            $_SESSION['username'] = $decoded->username;

            echo json_encode(['token' => $response['token']]);
            http_response_code(200);
        }
    }

    private function get_http_response_code($http_response_header) {
        if (!empty($http_response_header) && is_array($http_response_header)) {
            $parts = explode(' ', $http_response_header[0]);
            if (count($parts) > 1) {
                return intval($parts[1]);
            }
        }
        return 0;
    }



    public function logout()
    {
    session_start();


    $_SESSION = [];


    session_destroy();


    header("Location: /php/Romanian-Traffic-Signs-Tutor/Public/auth");
    exit();
    }

}