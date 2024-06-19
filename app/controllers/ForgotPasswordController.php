<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ForgotPasswordController
{
    private $key;

    public function __construct()
    {
        $this->key = file_get_contents(__DIR__ . '/../config/secret_key.txt');
    }

    public function reset()
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);

        if (empty($input["email"])) {
            echo json_encode(["error" => "Email is required"]);
            http_response_code(400);
            exit();
        }

        $email = $input["email"];


        $mysqli = require __DIR__ . "/../database/database.php";
        $sql = sprintf("SELECT * FROM users WHERE email='%s'", $mysqli->real_escape_string($email));
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

        if ($user) {

            $newPassword = $this->generateComplexPassword();
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET password=? WHERE email=?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("ss", $hashedPassword, $email);
            if ($stmt->execute()) {

                if ($this->sendEmail($email, $newPassword)) {
                    echo json_encode(["success" => "A new password has been sent to your email"]);
                    http_response_code(200);
                } else {
                    echo json_encode(["error" => "Failed to send email"]);
                    http_response_code(500);
                }
            } else {
                echo json_encode(["error" => "Failed to update password"]);
                http_response_code(500);
            }
        } else {
            echo json_encode(["error" => "Email does not exist"]);
            http_response_code(404);
        }
    }
    private function generateComplexPassword($length = 8) {
        $upperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowerCase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $specialChars = '@$!%*?&';

        $allChars = $upperCase . $lowerCase . $numbers . $specialChars;

        $password = '';
        $password .= $upperCase[random_int(0, strlen($upperCase) - 1)];
        $password .= $lowerCase[random_int(0, strlen($lowerCase) - 1)];
        $password .= $numbers[random_int(0, strlen($numbers) - 1)];
        $password .= $specialChars[random_int(0, strlen($specialChars) - 1)];

        for ($i = 4; $i < $length; $i++) {
            $password .= $allChars[random_int(0, strlen($allChars) - 1)];
        }

        return str_shuffle($password);
    }

    private function sendEmail($email, $newPassword)
    {
        $mail = new PHPMailer(true);
        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'azoiteipaul2003@gmail.com';
            $mail->Password = 'qdsm sccj qvfq jajj';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('no-reply@example.com', 'RoTST');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body = "Your new password is: <strong>$newPassword</strong>";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
