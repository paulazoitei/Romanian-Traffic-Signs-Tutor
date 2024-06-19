<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class LoginController
{
    private $key;

    public function __construct()
    {
        $this->key = file_get_contents(__DIR__ . '/../config/secret_key.txt');
        // Ensure session is started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login()
    {
        header('Content-Type: application/json');

        // Read the input
        $input = json_decode(file_get_contents('php://input'), true);

        // Validate input
        if (empty($input["username"]) || empty($input["password"])) {
            echo json_encode(["error" => "Username and password are required"]);
            http_response_code(400);
            exit();
        }

        // Connect to the database
        $mysqli = require __DIR__ . "/../database/database.php";

        // Prepare the SQL statement
        $sql = sprintf(
            "SELECT * FROM users WHERE username='%s'",
            $mysqli->real_escape_string($input["username"])
        );

        // Execute the query
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

        // Verify the user exists and the password is correct
        if ($user && password_verify($input["password"], $user["password"])) {
            // Create the JWT payload
            $payload = [
                'iss' => 'http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/login', // Issuer
                'iat' => time(), // Issued at
                'exp' => time() + (60 * 60), // Expiration time (1 hour)
                'sub' => $user['id'], // Subject (user ID)
                'username' => $user['username']
            ];

            // Encode the JWT
            $jwt = JWT::encode($payload, $this->key, 'HS256');

            // Store the JWT in the session
            $_SESSION['auth_token'] = $jwt;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Return the token as a JSON response
            echo json_encode(['token' => $jwt]);
            http_response_code(200);
        } else {
            // Invalid credentials
            echo json_encode(["error" => "Invalid credentials"]);
            http_response_code(401);
        }
    }
}
