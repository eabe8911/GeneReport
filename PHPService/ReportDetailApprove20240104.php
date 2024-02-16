<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require __DIR__ . "/vendor/autoload.php";

if ($_SESSION["AUTH"] != TRUE) {
    header("Location: index.php");
    session_unset();
    die();
}

require_once __DIR__ . "/class/Report.php";
require_once __DIR__ . "/class/Log.php";
require_once __DIR__ . "/class/ReportSignature.php";
require_once __DIR__ . "/SendNotificationToTeams.php";
require_once __DIR__ . "/Publisher.php";
require_once __DIR__ . "/UploadPDF.php";

$log = new Log();
$Account = $_SESSION['Account'];
$DisplayName = $_SESSION['DisplayName'];
$Permission = $_SESSION['Permission'];
$FormName = filter_input(INPUT_POST, 'FormName');
$ApproveMode = $ReportID = $PDFFile = $ID = "";
$ErrorMessage = '';

//檢查是否第二次進入
if ($_SERVER["REQUEST_METHOD"] == "POST" && $FormName == "ViewApproveDetail") {
    try {
        $report = new Report($_POST);
        $ApproveMode = filter_input(INPUT_POST, 'ApproveMode');
        $ReportID = filter_input(INPUT_POST, 'ReportID');
        switch ($ApproveMode) {
            case 'REJECT':
                $report->Reject($_POST, $_SESSION);
                $_SESSION['ReportID'] = $_POST['ReportID'];
                $log->SaveLog("REJECT", "ReportDetailApprove", date("Y-m-d H:i:s"), json_encode($_POST));
                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'reject'
                ];
                // publishMessage('report_reject', $messageData);
                sendNotificationToTeams("REJECT", "退回一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
                break;
            case 'PASS':
                // save signature data into database and put signature image into PDF file
                if ($report->Approve($_POST, $_SESSION)) {
                    $ReportInfo = $report->get_ReportInfo();
                    $log->SaveLog("PASS", "ReportDetailApprove", date("Y-m-d H:i:s"), json_encode($_POST));
                    $messageData = [
                        'report_id' => $_POST['ReportID'],
                        'status' => 'pass'
                    ];
                    // publishMessage('report_pass', $messageData);
                    sendNotificationToTeams("APPROVED", "核准一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
                    // email notification to customer
                    // $report->SendEmail($ReportInfo, $Account, $Permission);
                }
                break;
            default:
                // back to home page
                header("Location: home.php");
                break;
        }
        header("Location: home.php");

    } catch (Exception $e) {
        $ErrorMessage = $e->getMessage();
        $log->SaveLog("ERROR", $ApproveMode, date("Y-m-d H:i:s"), json_encode($_POST));
    }
} else {
    //第一次進入
    $ApproveMode = filter_input(INPUT_GET, 'ApproveMode');
    $ID = filter_input(INPUT_GET, 'id');
    $report = new Report($_FILES);
    $report->GetReport($ID);
    $reportInfo = $report->get_ReportInfo();
    if (!empty($reportInfo['FileName'])) {
        $PDFFile = "./uploads/" . $reportInfo['FileName'];
    }else{
        $ErrorMessage = "基因報告尚未上傳";
    }
}


//smarty
$smarty = new Smarty;
$Logo = "<img src='./images/Libobio-Logo@2x.png' alt='LiboBio Logo' height='70'>";
$LogoName = "";
/**OTHERS**/
$smarty->assign("Logo", $Logo);
$smarty->assign("LogoName", $LogoName);
$smarty->assign("Menu", "Menu");
$smarty->assign("Title", "麗寶生醫");
$smarty->assign("DisplayName", $DisplayName);
$smarty->assign("AgentPhoto", "assets/images/users/avatar-1.jpg");
$smarty->assign("FormAction", $_SERVER['PHP_SELF']);
//Form Hidden Fields
$smarty->assign("Hiddenfield1", "<input type='hidden' id='FormName' name='FormName' value='ViewApproveDetail'>");
$smarty->assign("Hiddenfield2", "<input type='hidden' id='ApproveMode' name='ApproveMode' value=$ApproveMode>");
$smarty->assign("Hiddenfield3", "<input type='hidden' id='FileName' name='FileName' value=" . $report->ReportInfo('FileName') . ">");
$smarty->assign("Hiddenfield4", "<input type='hidden' id='Permission' name='Permission' value=" . $_SESSION['Permission'] . ">");
$smarty->assign("Hiddenfield5", "<input type='hidden' id='ID' name='ID' value=" . $ID . ">");
$smarty->assign("Hiddenfield6", "<input type='hidden' id='TemplateID' name='TemplateID' value=" . $report->ReportInfo('TemplateID') . ">");
$smarty->assign("Hiddenfield7", "<input type='hidden' id='Account' name='Account' value=" . $Account . ">");
// Error Message
$smarty->assign("ErrorMessage", $ErrorMessage);
if ($ErrorMessage == '') {
    $smarty->assign("ShowErrorMessage", 'hidden');
} else {
    $smarty->assign("ShowErrorMessage", '');
} 

//Fill Data to Fields
$smarty->assign("ReportID", $report->ReportInfo('ReportID'), true);
$smarty->assign("ReportName", $report->ReportInfo('ReportName'), true);
$smarty->assign("ReportDescription", $report->ReportInfo('ReportDescription'), true);
$ReportType = $report->ReportInfo('ReportType');
$Type = $report->getReportTypeList();
if(empty($ReportType)) $ReportType = '0';
$smarty->assign('ReportTypeOptions', $Type, true);
$smarty->assign('ReportTypeSelect', $ReportType, true);
$smarty->assign("FileName", $report->ReportInfo('FileName'), true);
$smarty->assign("Approved1", $report->ReportInfo('Approved1'), true);
$smarty->assign("Approved1At", $report->ReportInfo('Approved1At'), true);
$smarty->assign("Approved2", $report->ReportInfo('Approved2'), true);
$smarty->assign("Approved2At", $report->ReportInfo('Approved2At'), true);
$smarty->assign("DueDate", $report->ReportInfo('DueDate'), true);
$smarty->assign("CustomerName", $report->ReportInfo('CustomerName'), true);
$smarty->assign("CustomerEmail", $report->ReportInfo('CustomerEmail'), true);
$smarty->assign("CustomerPhone", $report->ReportInfo('CustomerPhone'), true);
// Display PDF File
if ($PDFFile == '') {
    $smarty->assign("PDFPreview", "");
} else {
    $smarty->assign("PDFPreview", $PDFFile);
}
// Display Smarty Template
$smarty->assign("IncludePage", "ReportDetailApprove.tpl");
$smarty->display("ViewApproveDetail.tpl");
//------------------------- END -------------------------