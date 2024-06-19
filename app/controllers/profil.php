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


        if (isset($_SESSION['auth_token'])) {
            $jwt = $_SESSION['auth_token'];

            try {
                $decoded = JWT::decode($jwt, new Key($this->key, 'HS256'));

                if ($decoded && isset($decoded->sub)) {
                    $userId = $decoded->sub;
                    $username = $decoded->username;

                    if ($userId == $_SESSION['user_id'] && $username == $_SESSION['username']) {
                        $this->view('profil');
                        return;
                    }
                }
            } catch (Exception $e) {
                unset($_SESSION['auth_token']);
                unset($_SESSION['user_id']);
                unset($_SESSION['username']);
            }
        }

        $this->view('auth');
    }
}