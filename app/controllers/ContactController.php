<?php

require_once __DIR__ . '/../../vendor/autoload.php';

class ContactController
{
    public function contact()
    {

        $data = json_decode(file_get_contents("php://input"));

        $subject = $data->subject;
        $email = $data->email;
        $message = $data->message;


        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'azoiteipaul2003@gmail.com';
        $mail->Password = 'qdsm sccj qvfq jajj';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, 'Utilizator Contact Form');
        $mail->addReplyTo($email, 'Utilizator Contact Form');
        $mail->addAddress('azoiteipaul2003@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = nl2br($message);

        if(!$mail->send()) {
            $response = ["status" => "error", "message" => $mail->ErrorInfo];
        } else {
            $response = ["status" => "success", "message" => "Message has been sent"];
        }

        echo json_encode($response);
    }
}
