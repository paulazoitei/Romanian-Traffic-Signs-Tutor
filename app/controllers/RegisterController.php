<?php

class RegisterController
{
    public function register()
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);

        if (empty($input["username"])) {
            echo json_encode(["error" => "Username is required!"]);
            http_response_code(400);
            exit();
        }
        if (!filter_var($input["email"], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(["error" => "Valid email is required"]);
            http_response_code(400);
            exit();
        }

        $isPasswordComplex = function ($password) {
            $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
            return preg_match($pattern, $password);
        };

        if (!$isPasswordComplex($input['password'])) {
            echo json_encode(["error" => "Your password is not complex enough"]);
            http_response_code(400);
            exit();
        }

        if ($input["password"] !== $input["password_confirmation"]) {
            echo json_encode(["error" => "Passwords must match"]);
            http_response_code(400);
            exit();
        }

        $password_hash = password_hash($input["password"], PASSWORD_DEFAULT);

        $isValidPhoneNumber = function ($phone) {
            $pattern = '/^\+?\d{10,15}$/';
            return preg_match($pattern, $phone);
        };

        if (!$isValidPhoneNumber($input['phone'])) {
            echo json_encode(["error" => "Invalid phone number"]);
            http_response_code(400);
            exit();
        }

        $mysqli = require __DIR__ . "/../database/database.php";

        $sql = "INSERT INTO users (username, email, password, phone) VALUES (?, ?, ?, ?)";

        $stmt = $mysqli->stmt_init();

        if (!$stmt->prepare($sql)) {
            echo json_encode(["error" => "SQL error: " . $mysqli->error]);
            http_response_code(500);
            exit();
        }

        $stmt->bind_param("ssss",
            $input["username"],
            $input["email"],
            $password_hash,
            $input["phone"]
        );

        try {
            if ($stmt->execute()) {
                echo json_encode(["success" => "User registered successfully", "user_id" => $stmt->insert_id]);
                http_response_code(201);
            } else {
                throw new Exception($stmt->error, $stmt->errno);
            }
        } catch (Exception $e) {
            if ($e->getCode() == 1062) {
                $errorMessage = $e->getMessage();
                if (strpos($errorMessage, 'email') !== false) {
                    echo json_encode(["error" => "Email already exists."]);
                } elseif (strpos($errorMessage, 'username') !== false) {
                    echo json_encode(["error" => "Username already exists."]);
                } else {
                    echo json_encode(["error" => "Duplicate entry"]);
                }
                http_response_code(409);
            } else {
                echo json_encode(["error" => "Error: " . $e->getMessage()]);
                http_response_code(500);
            }
        }
    }
}