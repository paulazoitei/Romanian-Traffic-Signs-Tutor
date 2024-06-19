<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../core/Controller.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Profil extends Controller
{
    private $key;

    public function __construct()
    {
        $this->key = file_get_contents(__DIR__ . '/../config/secret_key.txt');
    }

    public function index()
    {
       

        // Ensure session is started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION["auth_token"])) {
          

            $jwt = $_SESSION["auth_token"];

            try {
                // Print the JWT for debugging
               // echo "JWT: " . $jwt . "<br>";

                $decoded = JWT::decode($jwt, new Key($this->key, 'HS256'));

                // Print the decoded JWT for debugging
               // echo "Decoded JWT: ";
              //  print_r($decoded);
              //  echo "<br>";

                if ($decoded && isset($decoded->sub)) {
                    $userId = $decoded->sub;
                    $username = $decoded->username;

                    // Print user details for debugging
                   // echo "User ID: " . $userId . "<br>";
                   // echo "Username: " . $username . "<br>";

                    if ($userId == $_SESSION['user_id'] && $username == $_SESSION['username']) {
                        $this->view('profil');
                        return;
                    }
                }
            } catch (Exception $e) {
                // Print the exception message for debugging
               // echo "Exception: " . $e->getMessage() . "<br>";

                unset($_SESSION['auth_token']);
                unset($_SESSION['user_id']);
                unset($_SESSION['username']);
            }
        } else {
          //  echo "No auth token found.<br>";
        }

        $this->view('auth');
    }
}
