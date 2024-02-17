<?php
// Enable Xdebug
if (extension_loaded('xdebug')) {
    ini_set('xdebug.remote_enable', 1);
    ini_set('xdebug.remote_autostart', 1);
}

// Set a breakpoint
xdebug_break();
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


       $_mail = new PHPMailer(true); // Passing `true` enables exceptions
       
        $log = new Log();
        try {
            //Server settings
            //$this->_mail->setLanguage('fr', '/optional/path/to/language/directory/');
           $_mail->SMTPDebug = 0; // Enable verbose debug output

            // Init Office 365 email setting
           $_mail->isSMTP();
           $_mail->Host = 'smtp.office365.com';
           $_mail->SMTPAuth = true;
           $_mail->Username = 'Report@libobio.com';
           $_mail->Password = 'PL9852853@olmnb!!';
           $_mail->SMTPSecure = 'tls';
           $_mail->Port = 587;

            // 發件人和收件人設定
           $_mail->setFrom('Report@libobio.com', 'Libobio');
           $_mail->addAddress('tina.xue@libobio.com','Tina'); 

            // 添加 BCC 和 CC
           $_mail->addBCC('olive.chou@libobio.com');
           $_mail->addCC('tina.xue@libobio.com');

            // 郵件內容 
           $_mail->isHTML(true); // Set email format to HTML
           $_mail->Subject = '基因檢測報告' . 'tina.xue@libobio.com';
           $_mail->Body = '您好，附檔為您的基因檢測報告，請查收。';

            // 添加附件
            if (!empty($PDFFile)) {
               $_mail->addAttachment($PDFFile); // Add attachments
                $log->SaveLog("SendEmail", "Emailer", date("Y-m-d H:i:s"), "Already Send PDF file");
            } else {
                $log->SaveLog("SendEmail", "Emailer", date("Y-m-d H:i:s"), "No PDF file");
            }

           $_mail->send();
            echo 'Message has been sent';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error";
            throw new Exception($e->getMessage(), $e->getCode());
        }
        return true;

?>