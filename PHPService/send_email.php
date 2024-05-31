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

// Get the ReportID, CustomerEmail, ReportName,and CustomerName values from the form
$ReportID = $_POST['ReportID'];
$CustomerEmail = $_POST['CustomerEmail'];
$ccemail = $_POST['ccemail'];
$CustomerName = $_POST['CustomerName'];
$PDFFile = $_POST['PDFFile'];
$ApplyFile = $_POST['ApplyFile'];
$ReportName = $_POST['ReportName'];
$Username = $_SESSION['DisplayName'];
$PatientID = filter_input(INPUT_POST, 'PatientID');

$HospitalList1 = $_POST['HospitalList'];

switch ($HospitalList1) {
    case '1':
        $HospitalList = '台大雲林分院';
        break;
    case '2':
        $HospitalList = '台北市立聯合醫院';
        break;
    case '3':
        $HospitalList = '台南市立醫院';
        break;
    case '4':
        $HospitalList = '台南新樓醫院';
        break;
    case '5':
        $HospitalList = '竹山秀傳';
        break;
    case '6':
        $HospitalList = '屏基醫院';
        break;
    case '7':
        $HospitalList = '恩主公醫院';
        break;
    case '8':
        $HospitalList = '國軍803';
        break;
    case '9':
        $HospitalList = '國泰醫院';
        break;
    case '10':
        $HospitalList = '統誠醫療';
        break;
    case '11':
        $HospitalList = '麻豆新樓醫院';
        break;
    case '12':
        $HospitalList = '彰化秀傳';
        break;
    case '13':
        $HospitalList = '彰濱秀傳';
        break;
    case '14':
        $HospitalList = '輔大醫院';
        break;
    case '15':
        $HospitalList = '泓采診所';
        break;
    case '16':
        $HospitalList = '麗寶生醫(自來客)';
        break;
    case '17':
        $HospitalList = '其他';
        break;
    default:
        $HospitalList = '';
        break;
}



$scID = $_POST['scID'];
$scdate = $_POST['scdate'];
$rcdate = $_POST['rcdate'];

// $scID = $_POST['scID'];
// $scdate = $_POST['scdate'];

// Create a new instance of the Email class

// Send the email
if ($email->SendEmail($ReportID, $Username, $CustomerEmail, $ccemail, $CustomerName, $PDFFile, $ApplyFile, $ReportName, $PatientID, $scID, $scdate, $rcdate ,$HospitalList)) {
    
    $report->UpdateReportStatus($ReportID, 8);

} else {
    echo 'Email sending failed.';
}
?>