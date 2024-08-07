<?php
use Beta\Microsoft\Graph\Model\Alert;
// Enable Xdebug
if (extension_loaded('xdebug')) {
    ini_set('xdebug.remote_enable', 1);
    ini_set('xdebug.remote_autostart', 1);
}

// Set a breakpoint
xdebug_break();
require_once __DIR__ . "/class/Email.php";
$email = new Email();
$report = new Report($_POST);


$Username = $_SESSION['DisplayName'];


// Create a new instance of the Email class


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['BtnSendPDF'])) {
        $ReportID = $_POST['ReportID'];
        $ReportName = $_POST['ReportName'];
        $CustomerEmail = $_POST['CustomerEmail'];
        $ccemail = $_POST['ccemail'];
        $CustomerName = $_POST['CustomerName'];
        $PDFFile = $_POST['PDFFile'];
        $ApplyFile = $_POST['ApplyFile'];
        $LogoFile = $_POST['LogoFile'];
        $PatientID = $_POST['PatientID'];
        $scID = $_POST['scID'];
        $scdate = $_POST['scdate'];
        $rcdate = $_POST['rcdate'];
        $HospitalList = $_POST['HospitalList'];

        // Send the email
        if ($email->SendEmail($ReportID, $Username, $CustomerEmail, $ccemail, $CustomerName, $PDFFile, $ApplyFile, $ReportName, $PatientID, $scID, $scdate, $rcdate ,$HospitalList)) {
            
            $report->UpdateReportStatus($ReportID, 8);

        } else {
            echo 'Email sending failed.';
        }
    }
}

// function sendEmail($ReportID, $ReportName, $CustomerEmail, $ccemail, $CustomerName, $PDFFile, $ApplyFile, $LogoFile, $PatientID, $scID, $scdate, $rcdate, $HospitalList) {
//     // 发送电子邮件的逻辑
//     // 例如，使用 PHPMailer 或其他邮件库发送电子邮件
//     echo "Email sent for ReportID: " . $ReportID;
// }
?>