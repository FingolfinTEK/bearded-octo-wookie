<?php
/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 14.2.15.
 * Time: 00.46
 */
require __DIR__ . "/../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php";

class Mailer
{


    function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . "/../../config/mail.ini");
    }

    public function sendMail()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($data) {
            $firstname = $data["firstname"];
            $lastname = $data["lastname"];
            $email = $data["email"];
            $message = $data["message"];
            $name = $firstname . " " . $lastname;

            $mail = new PHPMailer();
            $mail->setFrom($email, $name);
            $mail->addReplyTo($email, $name);
            $mail->addAddress($this->config["username"]);
            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->Host = $this->config["smtp.host"];
            $mail->SMTPAuth = true;
            $mail->Username = $this->config["username"];
            $mail->Password = $this->config["password"];
            $mail->SMTPSecure = $this->config["smtp.security"];
            $mail->Port = $this->config["smtp.port"];

            $mail->isHTML(true);
            $mail->Subject =  $name . " <" . $email . "> sent you an email";

            $mail->Body = $message . "<br><br>" . $name . "<br>" . $email . "<br>";

            if ($mail->send()) {
                return "Message has been sent";
            } else {
                return "Message could not be sent." . " Mailer Error: " . $mail->ErrorInfo;
            }
        }
    }
}
