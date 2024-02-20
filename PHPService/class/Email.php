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

    public function SendEmail($ReportID, $ReportName, $CustomerEmail, $ccemail, $CustomerName, $PDFFile, $ApplyFile, $Username): bool
    {
        $report = new Report($_POST);
        $ReportID = filter_input(INPUT_POST, 'ReportID');
        $ReportName = filter_input(INPUT_POST, 'ReportName');
        $CustomerEmail = filter_input(INPUT_POST, 'CustomerEmail');
        $ccemail = filter_input(INPUT_POST, 'ccemail');
        $CustomerName = filter_input(INPUT_POST, 'CustomerName');
        $PDFFile = filter_input(INPUT_POST, 'PDFFile');
        $ApplyFile = filter_input(INPUT_POST, 'ApplyFile');
        // $Role = $_SESSION['Role'];
        $ReportType = filter_input(INPUT_POST, 'ReportType');
        $Username = $_SESSION['DisplayName'];

        $_mail = new PHPMailer(true); // Passing `true` enables exceptions

        $log = new Log();
        try {
            $_mail->SMTPDebug = 0;

            // Init Office 365 email setting
            $_mail->isSMTP();
            $_mail->Host = 'smtp.office365.com';
            $_mail->Port = 587;
            $_mail->SMTPSecure = 'tls';
            $_mail->SMTPAuth = true;
            // sender email setting
            $_mail->Username = 'Report@libobio.com';
            $_mail->Password = '9853!Pm667b';
            if ($ReportType == 1) {
                $_mail->SetFrom('Report@libobio.com', 'JB_Lab_ISO');
            } elseif ($ReportType == 2) {
                $_mail->SetFrom('Report@libobio.com', 'JB_Lab_LDTS');
            } elseif ($ReportType == 3) {
                $_mail->SetFrom('Report@libobio.com', 'YL_Lab_LDTS');
            } else {
                $_mail->SetFrom('Report@libobio.com', 'FromEmail');
            }

            // Set sender alias based on user permission

            $_mail->addAddress($CustomerEmail, 'ToEmail');
            $_mail->addCC($ccemail);
            $_mail->addBCC('tina.xue@libobio.com');

            $_mail->isHTML(true); // Set email format to HTML
            $_mail->Subject = $CustomerName . '_麗寶生醫基因檢測報告' . $ReportID;

            $_mail->Body = $CustomerName . '您好:<br><br>
 
            附件為送檢的兩份基因檢測報告及服務申請單，煩請您查收，<br>
            檢測報告資訊如下所示 :<br>
            麗寶報告編號 : ' . $ReportID . '<br>
            檢測項目 : ' . $ReportName . '<br><br>
            
             
            如有需要提供紙本檔案，再麻煩通知，<br>
             
            如有任何問題，煩請不吝告知。<br>
             
            非常感謝您!!<br><br><br>
             
            麗寶生醫股份有限公司<br>
            分子檢測服務處 董昕恬<br>
            TEL:(02)2503-1392#360<br>';


            $_mail->CharSet = 'UTF-8';

            if (!empty($PDFFile) || !empty($ApplyFile)) {
                $_mail->addAttachment($PDFFile); // Add attachments
                $_mail->addAttachment($ApplyFile); // Add attachments
            } else {

            }

            $_mail->send();
            // $log->SaveLog("SendEmail", $Username, "Emailer", date("Y-m-d H:i:s"), $ReportID."報告已寄出");

            echo '<script>
                    alert("Message has been sent");
                    window.location.href = "home.php";
                </script>';


        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error";
            $log->SaveLog("SendEmail", $Username, "Emailer", date("Y-m-d H:i:s"), $ReportID . "報告寄送失敗");


            throw new Exception($e->getMessage(), $e->getCode());
        }
        return true;
    }
}
?>