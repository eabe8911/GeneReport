<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require __DIR__ . '/PHPMailer/src/Exception.php';
/* The main PHPMailer class. */
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
/* SMTP class, needed if you want to use SMTP. */
require __DIR__ . '/PHPMailer/src/SMTP.php';
class Emailer
{
    private $_mail;

    function SendEmail(array $data = []): bool
    {
        $this->_mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            //$this->_mail->setLanguage('fr', '/optional/path/to/language/directory/');
            $this->_mail->SMTPDebug = 0; // Enable verbose debug output

            // Init Office 365 email setting
            $this->_mail->isSMTP();
            $this->_mail->Host = 'smtp.office365.com';
            $this->_mail->Port = 587;
            $this->_mail->SMTPSecure = 'tls';
            $this->_mail->SMTPAuth = true;
            $this->_mail->Username = 'Report@libobio.com';
            $this->_mail->Password = 'Report0607';
            $this->_mail->setFrom('Report@libobio.com', '麗寶生醫');
            $this->_mail->CharSet = 'UTF-8';  

            //Recipients
            $this->_mail->setFrom('mailer@maxcheng.tw', 'SJEN App System');
            $this->_mail->addAddress($data['Email'], $data['Name']); // Add a recipient
            //$this->_mail->addAddress('ellen@example.com');               // Name is optional
            //$this->_mail->addReplyTo('info@example.com', 'Information');
            //$this->_mail->addCC('cc@example.com');
            $this->_mail->addBCC('mailer@maxcheng.tw');
            //Attachments
            //$this->_mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$this->_mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            //Content
            $this->_mail->isHTML(true); // Set email format to HTML
            $this->_mail->Subject = $data['Subject'];
            $message = $data['Message'];
            $this->_mail->Body = $message;
            // $this->_mail->AltBody = "您的臨時密碼為$tmpPassword, 請在手機輸入臨時密碼後，修改成您的密碼。";
            $this->_mail->send();
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
        return true;
    }
}
?>