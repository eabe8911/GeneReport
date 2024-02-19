<?php
// Enable Xdebug
if (extension_loaded('xdebug')) {
    ini_set('xdebug.remote_enable', 1);
    ini_set('xdebug.remote_autostart', 1);
}

// Set a breakpoint
xdebug_break();

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
require_once __DIR__ . "/UploadPDF.php";
require_once __DIR__ . "/class/Email.php";


$log = new Log();
$Account = $_SESSION['Account'];
$DisplayName = $_SESSION['DisplayName'];
$Permission = $_SESSION['Permission'];
$Role = $_SESSION['Role'];
$FormName = filter_input(INPUT_POST, 'FormName');
$ReportMode = $ReportID = $PDFFile = $ApplyFile = $ID = $ReportStatus = "";
$ErrorMessage = '';

//檢查是否第二次進入
if ($_SERVER["REQUEST_METHOD"] == "POST" && $FormName == "ViewReportDetail") {
    try {
        $report = new Report($_POST);
        $ReportMode = filter_input(INPUT_POST, 'ReportMode');
        $ReportID = filter_input(INPUT_POST, 'ReportID');
        $Username = $_SESSION['DisplayName'];

        switch ($ReportMode) {
            case 'ADD':
                $report->AddReport($_POST);
                $ReportMode = $_POST['ReportMode'];
                $ReportStatus = $_POST['ReportStatus'];
                $ReportType = $_POST['ReportType'];

                //if ReportMode = ADD, 將"新增"帶到ReportMode
                if ($ReportMode == 'ADD') {
                    $ReportMode = "新增";
                }
                $ReportID = $_POST['ReportID'];
                $ReportName = $_POST['ReportName'];
                $HospitalList = $_POST['HospitalList'];
                $TemplateID = $_POST['TemplateID'];
                if ($ReportType == '1') {
                    $ReportType = "JB_Lab_ISO";
                } elseif ($ReportType == '2') {
                    $ReportType = "JB_Lab_LDTS";
                } elseif ($ReportType == '3') {
                    $ReportType = "YL_Lab_ISO";
                }
                $DueDate = $_POST['DueDate'];
                $CustomerName = $_POST['CustomerName'];
                $CustomerEmail = $_POST['CustomerEmail'];
                $ccemail = $_POST['ccemail'];
                $CustomerPhone = $_POST['CustomerPhone'];
                if ($ReportStatus == '0' || $ReportStatus == '') {
                    $ReportStatus = '報告未上傳';
                } elseif ($ReportStatus == '1') {
                    $ReportStatus = '報告已上傳，未審核';
                }

                $addlog = "報告編號：" . $ReportID . "已新增" . "\n" . "報告名稱：" . $ReportName . "\n" . "報告描述：" . $HospitalList . "\n" . 
                "送檢單位：" . $ReportType . "\n" . "報告模板：" . $TemplateID . "\n" . "TAT最終日：" . $DueDate . "\n" . "客戶姓名：" . $CustomerName . 
                "\n" . "客戶信箱：" . $CustomerEmail . "\n" . "聯絡人信箱：" . $ccemail . "\n" ."客戶連絡電話：" . $CustomerPhone;

                CheckPDF($_FILES);
                $_SESSION['ReportID'] = $_POST['ReportID'];
                $log->SaveLog("ADD", $Username, "UpdateReportInfo", date("Y-m-d H:i:s"), $addlog);
                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'new'
                ];
                sendNotificationToTeams("ADD", "新增一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
                break;
            case 'EDIT':
                if ($report->UpdateReport($_POST)) {
                    $ReportMode = $_POST['ReportMode'];
                    //if ReportMode = ADD, 將"新增"帶到ReportMode
                    if ($ReportMode == 'EDIT') {
                        $ReportMode = "修改報告";
                    }
                    $ReportID = $_POST['ReportID'];
                    $ReportName = $_POST['ReportName'];
                    $HospitalList = $_POST['HospitalList'];
                    $ReportType = $_POST['ReportType'];
                    $TemplateID = $_POST['TemplateID'];
                    $DueDate = $_POST['DueDate'];
                    $CustomerName = $_POST['CustomerName'];
                    $CustomerEmail = $_POST['CustomerEmail'];
                    $ccemail = $_POST['ccemail'];
                    $CustomerPhone = $_POST['CustomerPhone'];
                    
                    //if ReportUploadPDF click ReportStaus = 1
                    if (!empty($_FILES['ReportUploadPDF']['name'])) {
                        $ReportStatus = '報告已上傳，未審核';
                    } else {
                        $ReportStatus = $_POST['ReportStatus'];
                    }                   // $ReportStatus = $_POST['ReportStatus'];

                    if ($Role == '1') {
                        $Role = "JB_Lab_ISO";
                    } elseif ($Role == '2') {
                        $Role = "JB_Lab_LDTS";
                    } elseif ($Role == '3') {
                        $Role = "YL_Lab_ISO";
                    }



                    $updatelog = "報告編號：" . $ReportID . "\n" . "報告名稱：" . $ReportName . "\n" . "報告描述：" . $HospitalList . "\n" . 
                    "送檢單位：" . $ReportType . "\n" . "報告模板：" . $TemplateID . "\n" . "TAT最終日：" . $DueDate . "\n" . 
                    "客戶姓名：" . $CustomerName . "\n" . "客戶信箱：" . $CustomerEmail . "\n" . "聯絡人信箱：" . $ccemail . "\n" . "客戶連絡電話：" . $CustomerPhone . "\n" . "報告狀態：" . $ReportStatus;


                    CheckPDF($_FILES);
                    $log->SaveLog("UPDATE", $Username, "UpdateReportInfo", date("Y-m-d H:i:s"), $updatelog);
                }
                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'update'
                ];
                sendNotificationToTeams("EDIT", "修改一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
                break;
            case 'DELETE':
                if ($report->DeleteReport($_POST)) {

                    $ReportMode = $_POST['ReportMode'];
                    //if ReportMode = ADD, 將"新增"帶到ReportMode
                    if ($ReportMode == 'DELETE') {
                        $ReportMode = "刪除報告";
                    }
                    $ReportID = $_POST['ReportID'];
                    $ReportName = $_POST['ReportName'];

                    $DueDate = $_POST['DueDate'];
                    $CustomerName = $_POST['CustomerName'];
                    $CustomerEmail = $_POST['CustomerEmail'];
                    $ccemail = $_POST['ccemail'];
                    $CustomerPhone = $_POST['CustomerPhone'];
                    $ReportStatus = $_POST['ReportStatus'];


                    $deletelog = "報告編號" . $ReportID . "已刪除";


                    $log->SaveLog("DELETE", $Username, "UpdateReportInfo", date("Y-m-d H:i:s"), $deletelog);

                }
                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'delete'
                ];
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
        $log->SaveLog("ERROR", $Username, $ReportMode, date("Y-m-d H:i:s"), $ReportID . $ErrorMessage);
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
            $ReportID = $reportInfo['ReportID'];
            if (!empty($reportInfo['FileName'])) {
                $PDFFile = "./uploads/" . $ReportID . "/" . $reportInfo['FileName'];
                $ApplyFile = "./uploads/" . $ReportID . "/" . $reportInfo['apply_pdf'];
            }
            // set maintain button area to Maintain mode
            $ReportMode = "VIEW";
            break;
        default:
            $ID = filter_input(INPUT_GET, 'id');
            $report = new Report($_FILES);
            $report->GetReport($ID);
            $reportInfo = $report->get_ReportInfo();
            $ReportID = $reportInfo['ReportID'];
            if (!empty($reportInfo['FileName'])) {
                $PDFFile = "./uploads/" . $ReportID . "/" . $reportInfo['FileName'];
                $ApplyFile = "./uploads/" . $ReportID . "/" . $reportInfo['apply_pdf'];
            }
            // set maintain button area to Maintain mode
            $ReportMode = "QUERY";
            break;
    }
}

$smarty = new Smarty;
$Email = new Email();

$Logo = "<img src='./images/Libobio-Logo@2x.png' alt='LiboBio Logo' height='70'>";
$LogoName = "";
/**OTHERS**/
// $smarty->assign('樣板標籤名稱', $變數值);   將變數送至樣板檔
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

// Report Status
$ReportStatus = $report->ReportInfo('ReportStatus');
switch ($ReportStatus) {
    case '0':
        $ReportStatus = "報告未上傳";
        break;
    case '1':
        $ReportStatus = "報告已上傳，未審核";
        break;
    case '2':
        $ReportStatus = "報告已上傳，實驗室已審核";
        break;
    case '3':
        $ReportStatus = "報告已上傳，實驗室已退回，請重新上傳報告";
        break;
    case '4':
        $ReportStatus = "報告已上傳，醫師已審核";
        break;
    case '5':
        $ReportStatus = "報告已上傳，醫師已退回，請重新上傳報告";
        break;
    case '6':
        $ReportStatus = "已簽核完成，可寄送報告";
        break;
    case '7':
        $ReportStatus = "";
        break;
    case '8':
        $ReportStatus = "已寄送報告";
        break;
    default:
        $ReportStatus = "";
        break;
}


//Fill Data to Fields
$smarty->assign("ReportID", $report->ReportInfo('ReportID'), true);
$ReportID = $report->ReportInfo('ReportID');
$smarty->assign("ReportName", $report->ReportInfo('ReportName'), true);
$smarty->assign("HospitalList", $report->ReportInfo('HospitalList'), true);
$ReportType = $report->ReportInfo('ReportType');
$Type = $report->getReportTypeList();
$List = $report->getHospitalList();
$HospitalList = $report->ReportInfo('HospitalList');

if (empty($ReportType))
    $ReportType = '0';
$smarty->assign('HospitalListOptions', $List, true);
$smarty->assign('HospitalListSelect', $HospitalList, true);
$smarty->assign('ReportTypeOptions', $Type, true);
$smarty->assign('ReportTypeSelect', $ReportType, true);
$TemplateID = $report->ReportInfo('TemplateID');
$TemplateList = $report->getTemplateList(); //取得樣板清單
$smarty->assign('TemplateOptions', $TemplateList, true); //將樣板清單送至樣板檔
$smarty->assign('TemplateSelect', $TemplateID, true);
$smarty->assign("DueDate", $report->ReportInfo('DueDate'), true);
$smarty->assign("CustomerName", $report->ReportInfo('CustomerName'), true);
$smarty->assign("CustomerEmail", $report->ReportInfo('CustomerEmail'), true);
$smarty->assign("ccemail", $report->ReportInfo('ccemail'), true);
$smarty->assign("CustomerPhone", $report->ReportInfo('CustomerPhone'), true);
$smarty->assign("ReportStatus", $ReportStatus, true);
$smarty->assign("Permission", $Permission, true);
$smarty->assign("RejectReason", $report->ReportInfo('RejectReason'), true);
$smarty->assign("SampleID", $report->ReportInfo('SampleID'), true);
$smarty->assign("PatientID", $report->ReportInfo('PatientID'), true);
$smarty->assign("scID", $report->ReportInfo('scID'), true);
$smarty->assign("scdate", $report->ReportInfo('scdate'), true);
$smarty->assign("rcdate", $report->ReportInfo('rcdate'), true);

$ReportName = $report->ReportInfo('ReportName');
$CustomerEmail = $report->ReportInfo('CustomerEmail');
$ccemail = $report->ReportInfo('ccemail');
$CustomerName = $report->ReportInfo('CustomerName');
// echo $ReportStatus;
// Display PDF File if empty show error message

if ($PDFFile == '') {
    $smarty->assign("PDFPreview", "");
    $output = '<br><h4 style="justify-content: center; display: flex;color:#FF0000">請上傳PDF報告</h4>';
    echo '<div id="pdf-output">' . $output . '</div>';

} elseif ($ReportStatus == "報告已上傳，未審核") {
    $smarty->assign("PDFPreview", $PDFFile);
    $output = '<br><h4 style="justify-content: center; display: flex;color:#FF0000">待醫檢師簽核</h4>';
    echo '<div id="pdf-output">' . $output . '</div>';

} else {
    $smarty->assign("PDFPreview", $PDFFile);
    $output =
        '<br><h4 style="justify-content: center; display: flex;color:#FF0000">請再次確認檢測報告資訊</h4>' .

        '<div style="justify-content: center; display: flex; ">
            <form id="email_report" method="post" action="send_email.php">
                <input type="hidden" name="ReportID" value="' . $ReportID . '">
                <input type="hidden" name="ReportName" value="' . $ReportName . '">
                <input type="hidden" name="CustomerEmail" value="' . $CustomerEmail . '">
                <input type="hidden" name="ccemail" value="' . $ccemail . '">
                <input type="hidden" name="CustomerName" value="' . $CustomerName . '">
                <input type="hidden" name="PDFFile" value="' . $PDFFile . '">
                <input type="submit" style="margin-left: 10px;height: 40px;" name="BtnSendPDF" id="BtnSendPDF" class="btn btn-primary" value="' . $ReportID . ', Send E-mail">
            </form>
            <button style="margin-left: 10px;height: 40px;" class="btn btn-primary" type="button">
                <a style="color:white;" href="' . $PDFFile . '" download>Download </a>
            </button>
          </div>';

    //if permission = 6 don't show email button
    if ($Permission == 6) {
        $output = '<br><h4 style="justify-content: center; display: flex;color:#FF0000">請再次確認檢測報告資訊</h4>' .
            '<div style="justify-content: center; display: flex; ">
            <button style="margin-left: 10px;height: 40px;" class="btn btn-primary" type="button">
                <a style="color:white;" href="' . $PDFFile . '" download>Download </a>
            </button>
          </div>';
    }

    echo '<div id="pdf-output">' . $output . '</div>';

}
// Display Smarty Template
$smarty->assign("IncludePage", "ReportDetailMaintain.tpl");
$smarty->display("ViewReportDetail.tpl");
// JavaScript code
echo '<script>
    const pdfOutput = document.getElementById("pdf-output");
    document.body.appendChild(pdfOutput);
    document.getElementById("email_report").addEventListener("submit", function(event){
        const confirmMessage = 
            confirm(`確定要寄出報告嗎?\n請再確認資訊是否正確：\n報告編號：' . $ReportID . '\n客戶姓名：' . $CustomerName . '\n客戶信箱：' . $CustomerEmail . '\n聯絡人信箱：' . $ccemail .'`);
        if(!confirmMessage){
            event.preventDefault();
        }
    });
</script>';
?>

<script>
    const pdfOutput = document.getElementById('pdf-output');
    document.body.appendChild(pdfOutput);

</script>