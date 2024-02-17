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
require_once __DIR__ . "/Report.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $_mail;

    public function __construct()
    {
        $this->_mail = new PHPMailer(true); // Passing `true` enables exceptions
    }

    public function SendEmail($ReportID, $ReportName, $CustomerEmail, $CustomerName, $PDFFile, $Username): bool
    {
        $report = new Report($_POST);
        $ReportID = filter_input(INPUT_POST, 'ReportID');
        $ReportName = filter_input(INPUT_POST, 'ReportName');
        $CustomerEmail = filter_input(INPUT_POST, 'CustomerEmail');
        $CustomerName = filter_input(INPUT_POST, 'CustomerName');
        $PDFFile = filter_input(INPUT_POST, 'PDFFile');
        $Role = $_SESSION['Role'];
        $Username = $_SESSION['DisplayName'];

        $_mail = new PHPMailer(true); // Passing `true` enables exceptions

        $log = new Log();
        try {
            $_mail->SMTPDebug = 0;

            // Init Office 365 email setting
            $_mail->isSMTP();
            //  $_mail->Host = '40.99.36.242';
            $_mail->Host = 'smtp.office365.com';
            $_mail->SMTPAuth = true;
            $_mail->Username = 'Report@libobio.com';
            $_mail->Password = '9853!Pm667b';
            $_mail->SMTPSecure = 'tls';
            $_mail->Port = 587;
            // $_mail->setFrom('Report@libobio.com', '建北ISO');
            // Set sender alias based on user permission
            if ($Role == '1') {
                $_mail->setFrom('Report@libobio.com', '建北所 ISO <JB_Lab_ISO>');
            } elseif ($Role == '2') {
                $_mail->setFrom('Report@libobio.com', '建北所 LDTS <JB_Lab_LDTS>');
            } elseif ($Role == '3') {
                $_mail->setFrom('Report@libobio.com', '怡仁所 LDTS <YL_Lab_LDTS>');

            }

            // $_mail->addAddress($CustomerEmail, $CustomerName);
            $_mail->addAddress($CustomerEmail, 'ToEmail');
            $_mail->addCC('tina.xue@libobio.com');
            // $_mail->addBCC('olive.chou@libobio.com');

            $_mail->isHTML(true); // Set email format to HTML
            $_mail->Subject = $CustomerName . '_麗寶生醫基因檢測報告' . $ReportID;
            // TODO:信件內容待修改
            $_mail->Body = $CustomerName . ' 先生/小姐，您好，<br><br>
            附檔為您的基因檢測報告，包含「' . $ReportName . '」請您查收。
            <br>' . '若您看完報告，對報告內容有任何疑問或想更了解報告內容，您可以至<strong>泓采診所</strong>預約回診，進行報告解說與醫療諮詢。
            <br>報告講解與醫療諮詢，約需要30分鐘，相關的諮詢掛號費用如下，
            <br>提供您參考：掛號費新台幣1,000元，諮詢費新台幣650元，總計新台幣1,650元整。<br><br>
            
            <small><strong>泓采診所 AWESOME CLINIC </strong><br><br>
            預約窗口：XXX 專員<br><br>
            連絡電話：02-25031392#325<br><br>
            電子信箱：XXX@libobio.com<br><br>
            診所地址：台北市中山區建國北路二段137號1樓<br><br>
            診所網站：<a href="https://www.awesome-clinic.com/">泓采診所 AWESOME CLINIC</a><br><br>
            再次感謝您的蒞臨，祝您健康 順心。<br><br></small>';

            $_mail->CharSet = 'UTF-8';

            if (!empty($PDFFile)) {
                $_mail->addAttachment($PDFFile); // Add attachments
            } else {
            }

            $_mail->send();
            $log->SaveLog("SendEmail", $Username, "Emailer", date("Y-m-d H:i:s"), $ReportID."報告已寄出");

            echo '<script>
                    alert("Message has been sent");
                    window.location.href = "../PHPService/home.php";
                </script>';


        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error";
            $log->SaveLog("SendEmail", "Emailer", date("Y-m-d H:i:s"), "報告寄送失敗");

            throw new Exception($e->getMessage(), $e->getCode());
        }
        return true;
    }
}
?>