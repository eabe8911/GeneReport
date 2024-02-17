<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require __DIR__ . "/vendor/autoload.php";

if (empty($_SESSION["AUTH"]) || $_SESSION["AUTH"] != TRUE) {
    header("Location: index.php");
    session_unset();
    die();
}

require_once __DIR__ . "/class/Report.php";
require_once __DIR__ . "/class/Log.php";
require_once __DIR__ . "/SendNotificationToTeams.php";
require_once __DIR__ . "/Publisher.php";
require_once __DIR__ . "/UploadPDF.php";

$log = new Log();
$Account = $_SESSION['Account'];
$DisplayName = $_SESSION['DisplayName'];
$Permission = $_SESSION['Permission'];
$Role = $_SESSION['Role'];
$FormName = filter_input(INPUT_POST, 'FormName');
$ReportMode = $ReportID = $PDFFile = $ID = "";
$ErrorMessage = '';

//檢查是否第二次進入
if ($_SERVER["REQUEST_METHOD"] == "POST" && $FormName == "ViewReportDetail") {
    try {
        $report = new Report($_POST);
        $ReportMode = filter_input(INPUT_POST, 'ReportMode');
        $ReportID = filter_input(INPUT_POST, 'ReportID');
        switch ($ReportMode) {
            case 'ADD':
                $report->AddReport($_POST);
                CheckPDF($_FILES);
                $_SESSION['ReportID'] = $_POST['ReportID'];
                $log->SaveLog("ADD", "UpdateReportInfo", date("Y-m-d H:i:s"), json_encode($_POST));
                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'new'
                ];
                // publishMessage('report_add', $messageData);
                sendNotificationToTeams("ADD", "新增一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
                break;
            case 'EDIT':
                if ($report->UpdateReport($_POST)) {
                    CheckPDF($_FILES);
                    $log->SaveLog("UPDATE", "UpdateReportInfo", date("Y-m-d H:i:s"), json_encode($_POST));
                }
                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'update'
                ];
                // publishMessage('report_update', $messageData);
                sendNotificationToTeams("EDIT", "修改一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
                break;
            case 'DELETE':
                if ($report->DeleteReport($_POST)) {
                    $log->SaveLog("DELETE", "UpdateReportInfo", date("Y-m-d H:i:s"), json_encode($_POST));
                }
                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'delete'
                ];
                // publishMessage('report_delete', $messageData);
                sendNotificationToTeams("DELETE", "刪除一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
                break;
            default:
                // back to home page
                header("Location: home.php");
                break;
        }
        header("Location: home.php");
    } catch (Exception $e) {
        $ErrorMessage = $e->getMessage();
        $log->SaveLog("ERROR", $ReportMode, date("Y-m-d H:i:s"), json_encode($_POST));
    }
} else {
    //第一次進入
    $ReportMode = filter_input(INPUT_GET, 'ReportMode');
    switch ($ReportMode) {
        case 'ADD':
            $report = new Report($_FILES);
            break;
        case 'VIEW':
            $ID = filter_input(INPUT_GET, 'id');
            $report = new Report($_FILES);
            $report->GetReport($ID);
            $reportInfo = $report->get_ReportInfo();
            if (!empty($reportInfo['FileName'])) {
                $PDFFile = "./uploads/" . $reportInfo['FileName'];
            }
            // set maintain button area to Maintain mode
            $ReportMode = "VIEW";
            break;
        default:
            $ID = filter_input(INPUT_GET, 'id');
            $report = new Report($_FILES);
            $report->GetReport($ID);
            $reportInfo = $report->get_ReportInfo();
            if (!empty($reportInfo['FileName'])) {
                $PDFFile = "./uploads/" . $reportInfo['FileName'];
            }
            // set maintain button area to Maintain mode
            $ReportMode = "QUERY";
            break;
    }
}

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
$smarty->assign("Hiddenfield1", "<input type='hidden' id='FormName' name='FormName' value='ViewReportDetail'>");
$smarty->assign("Hiddenfield2", "<input type='hidden' id='ReportMode' name='ReportMode' value=$ReportMode>");
$smarty->assign("Hiddenfield3", "<input type='hidden' id='FileName' name='FileName' value=" . $report->ReportInfo('FileName') . ">");
$smarty->assign("Hiddenfield4", "<input type='hidden' id='Permission' name='Permission' value=" . $Permission . ">");
$smarty->assign("Hiddenfield5", "<input type='hidden' id='ID' name='ID' value=" . $ID . ">");
$smarty->assign("Hiddenfield6", "<input type='hidden' id='Account' name='Account' value=" . $Account . ">");
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
$TemplateID = $report->ReportInfo('TemplateID');
$TemplateList = $report->getTemplateList();
$smarty->assign('TemplateOptions', $TemplateList, true);
$smarty->assign('TemplateSelect', $TemplateID, true);
$smarty->assign("DueDate", $report->ReportInfo('DueDate'), true);
$smarty->assign("CustomerName", $report->ReportInfo('CustomerName'), true);
$smarty->assign("CustomerEmail", $report->ReportInfo('CustomerEmail'), true);
$smarty->assign("CustomerPhone", $report->ReportInfo('CustomerPhone'), true);
// Display PDF File
if ($PDFFile == '') {
    $smarty->assign("PDFPreview", "");
    // $smarty->assign("ShowPDFArea", 'hidden');

} else {
    $smarty->assign("PDFPreview", $PDFFile);
    // $smarty->assign("ShowPDFArea", '');
}
// Display Smarty Template
$smarty->assign("IncludePage", "ReportDetailMaintain.tpl");
$smarty->display("ViewReportDetail.tpl");
//------------------------- END -------------------------