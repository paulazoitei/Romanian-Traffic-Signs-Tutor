<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class LoginController
{
    private $key;

    public function __construct()
    {
        $this->key = file_get_contents(__DIR__ . '/../config/secret_key.txt');

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login()
    {
        header('Content-Type: application/json');


        $input = json_decode(file_get_contents('php://input'), true);


        if (empty($input["username"]) || empty($input["password"])) {
            echo json_encode(["error" => "Username and password are required"]);
            http_response_code(400);
            exit();
        }


        $mysqli = require __DIR__ . "/../database/database.php";


        $sql = sprintf(
            "SELECT * FROM users WHERE username='%s'",
            $mysqli->real_escape_string($input["username"])
        );


        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();


        if ($user && password_verify($input["password"], $user["password"])) {

            $payload = [
                'iss' => 'http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/login',
                'iat' => time(),
                'exp' => time() + (60 * 60),
                'sub' => $user['id'],
                'username' => $user['username']
            ];


            $jwt = JWT::encode($payload, $this->key, 'HS256');


            $_SESSION['auth_token'] = $jwt;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];


            echo json_encode(['token' => $jwt]);
            http_response_code(200);
        } else {

            echo json_encode(["error" => "Invalid credentials"]);
            http_response_code(401);
        }
    }
}
