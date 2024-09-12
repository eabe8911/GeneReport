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
        $proband_name = $_POST['proband_name'];
        $SampleNo = $_POST['SampleNo'];
        switch ($_POST['HospitalList']) {
            case '1':
                $HospitalList = '輔大醫院';
                break;
            case '2':
                $HospitalList = '新光醫院';
                break;
            case '3':
                $HospitalList = '台北市立聯合醫院';
                break;
            case '4':
                $HospitalList = '台北慈濟醫院';
                break;
            case '5':
                $HospitalList = '台北榮民總醫院';
                break;
            case '6':
                $HospitalList = '恩主公醫院';
                break;
            case '7':
                $HospitalList = '雙和醫院';
                break;
            case '8':
                $HospitalList = '國泰醫院';
                break;
            case '9':
                $HospitalList = '怡仁醫院';
                break;
            case '10':
                $HospitalList = '淡水馬偕醫院';
                break;
            case '11':
                $HospitalList = '三軍總醫院_台北內湖';
                break;
            case '12':
                $HospitalList = '中山醫院';
                break;
            case '13':
                $HospitalList = '新家生醫_聯新醫院';
                break;
            case '14':
                $HospitalList = '台北市立萬芳醫院';
                break;
            case '15':
                $HospitalList = '臺北醫學大學附設醫院';
                break;
            case '16':
                $HospitalList = '台中國軍總醫院';
                break;
            case '17':
                $HospitalList = '統誠醫療';
                break;
            case '18':
                $HospitalList = '彰化秀傳醫院';
                break;
            case '19':
                $HospitalList = '國立臺灣大學醫學院附設醫院雲林分院';
                break;
            case '20':
                $HospitalList = '光田綜合醫院';
                break;
            case '21':
                $HospitalList = '澄清綜合醫院中港分院';
                break;
            case '22':
                $HospitalList = '竹山秀傳醫院';
                break;
            case '23':
                $HospitalList = '烏日林新醫院';
                break;
            case '24':
                $HospitalList = '彰濱秀傳醫院';
                break;
            case '25':
                $HospitalList = '大千綜合醫院';
                break;
            case '26':
                $HospitalList = '員榮醫療社團法人員榮醫院';
                break;
            case '27':
                $HospitalList = '彰化基督教醫院';
                break;
            case '28':
                $HospitalList = '台中榮民總醫院';
                break;
            case '29':
                $HospitalList = '台南市立醫院';
                break;
            case '30':
                $HospitalList = '麻豆新樓醫院';
                break;
            case '31':
                $HospitalList = '台南新樓醫院';
                break;
            case '32':
                $HospitalList = '屏東基督教醫院';
                break;
            case '33':
                $HospitalList = '高雄長庚醫院';
                break;
            case '34':
                $HospitalList = '高雄醫學大學附設醫院';
                break;
            case '35':
                $HospitalList = '連江醫院';
                break;
            case '36':
                $HospitalList = '一般客戶or泓采代採';
                break;
            default:
                $HospitalList = 'Unknown Hospital';
                break;
        }
   
        // Send the email
        if ($email->SendEmail($ReportID, $Username, $CustomerEmail, $ccemail, $CustomerName, $PDFFile, $ApplyFile, $ReportName, $PatientID, $scID, $scdate, $rcdate ,$HospitalList, $proband_name, $SampleNo)) {
            
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