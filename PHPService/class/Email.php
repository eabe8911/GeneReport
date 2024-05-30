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

    public function SendEmail($ReportID, $ReportName, $CustomerEmail, $ccemail, $CustomerName, $PDFFile, $ApplyFile, $Username, $PatientID, $scID, $scdate, $rcdate): bool
    {
        $report = new Report($_POST);
        $ReportID = filter_input(INPUT_POST, 'ReportID');
        $ReportName = filter_input(INPUT_POST, 'ReportName');
        $CustomerEmail = filter_input(INPUT_POST, 'CustomerEmail');
        $ccemail = filter_input(INPUT_POST, 'ccemail');
        $CustomerName = filter_input(INPUT_POST, 'CustomerName');
        $PDFFile = filter_input(INPUT_POST, 'PDFFile');
        $ApplyFile = filter_input(INPUT_POST, 'ApplyFile');
        $scID = filter_input(INPUT_POST, 'scID');
        $scdate = filter_input(INPUT_POST, 'scdate');
        // $Role = $_SESSION['Role'];
        $ReportType = filter_input(INPUT_POST, 'ReportType');
        $Username = $_SESSION['DisplayName'];
        $PatientID = filter_input(INPUT_POST, 'PatientID');
        $rcdate = filter_input(INPUT_POST, 'rcdate');
        


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
            $_mail->Password = '5836@dhnbg';
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

            $_mail->Body = $CustomerName . '先生/女士 您好：<br><br>
 
            非常感謝貴院委檢本司施作基因檢測服務，<br>
            附件檔案為送檢的基因檢測報告及服務申請單，煩請您查收，<br>

            此次的檢測報告資訊如下所示：<br>
            麗寶報告編號 : ' . $ReportID . '<br>
            病歷編號 : ' . $PatientID . '<br>
            採檢單號 : ' . $scID . '<br>
            檢測項目 : ' . $ReportName . '<br>
            採集日期 : ' . $scdate . '<br>
            收檢日期 : ' . $rcdate . '<br><br>
            
            為了使我們能持續提供良好的服務品質給貴院，懇請「送檢醫師/送檢單位」幫忙填寫以下連結之表單(表示黃底處)內容，<br>
            煩請提供我們寶貴的反饋與評量，讓我們能改善及提供更完善的服務給貴院。<br>

            表單連結請點選 :<a href="http://app.libobio.com/submit_survey.php">
                            <span style="font-size: 33px; background-color: rgba(255, 252, 47, 0.815);">
                            <strong>【醫療院所滿意度調查表】</strong>
                            </span>
                            </a>
                            <br><br>

             
            如有任何問題，煩請不吝告知。<br>
            再次感謝您!!<br><br><br>
             
            麗寶生醫股份有限公司<br>
            分子檢測服務處 董昕恬<br>
            TEL:(02)2503-1392#360<br>';


            $_mail->CharSet = 'UTF-8';

            // if (!empty($PDFFile) || !empty($ApplyFile)) {
            //     $_mail->addAttachment($PDFFile); // Add attachments
            //     $_mail->addAttachment($ApplyFile); // Add attachments
            // } else {

            // }

            if (!empty($PDFFile)) {
                $_mail->addAttachment($PDFFile); // Add PDF attachment
            }
            
            if (!empty($ApplyFile)) {
                $_mail->addAttachment($ApplyFile); // Add ApplyFile attachment
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