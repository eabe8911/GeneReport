<?php

header("Content-Type:text/html; charset=utf-8");

if (!isset($_SESSION)) {
    session_start();
}


/* Exception class. */
require __DIR__ . '/PHPMailer/src/Exception.php';
/* The main PHPMailer class. */
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
/* SMTP class, needed if you want to use SMTP. */
require __DIR__ . '/PHPMailer/src/SMTP.php';
require_once __DIR__ . "/Log.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Emailer
{
    private $_mail;

    function SendEmail($CustomerEmail, $PDFFile, $CustomerName): bool
    {
        $this->_mail = new PHPMailer(true); // Passing `true` enables exceptions
        $log = new Log();
        try {
            //Server settings
            //$this->_mail->setLanguage('fr', '/optional/path/to/language/directory/');
            $this->_mail->SMTPDebug = 0; // Enable verbose debug output

            // Init Office 365 email setting
            $this->_mail->isSMTP();
            $this->_mail->Host = $_ENV['SMTP_HOST'];
            $this->_mail->SMTPAuth = true;
            $this->_mail->Username = $_ENV['SMTP_USERNAME'];
            $this->_mail->Password = $_ENV['SMTP_PASSWORD'];
            $this->_mail->SMTPSecure = 'tls';
            $this->_mail->Port = 587;

            // 發件人和收件人設定
            $this->_mail->setFrom('liboreport@libobio.com', 'Libobio');
            $this->_mail->addAddress($CustomerEmail,$CustomerName); 

            // 添加 BCC 和 CC
            // $this->_mail->addBCC('olive.chou@libobio.com');
            $this->_mail->addCC('tina.xue@libobio.com');

            // 郵件內容 
            $this->_mail->isHTML(true); // Set email format to HTML
            $this->_mail->Subject = '基因檢測報告' . $CustomerEmail;
            $this->_mail->Body = '您好，附檔為您的基因檢測報告，請查收。';

            // 添加附件
            if (!empty($PDFFile)) {
                $this->_mail->addAttachment($PDFFile); // Add attachments
                $log->SaveLog("SendEmail", "Emailer", date("Y-m-d H:i:s"), "Already Send PDF file");
            } else {
                $log->SaveLog("SendEmail", "Emailer", date("Y-m-d H:i:s"), "No PDF file");
            }

            $this->_mail->send();
            echo 'Message has been sent';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error";
            throw new Exception($e->getMessage(), $e->getCode());
        }
        return true;
    }
}
?>