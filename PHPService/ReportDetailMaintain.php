<?php

ob_start();
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

if (empty($_SESSION["AUTH"]) || $_SESSION["AUTH"] != true) {
    header("Location: index.php");
    session_unset();
    die();
}

require_once __DIR__ . "/class/Report.php";
require_once __DIR__ . "/class/Log.php";
require_once __DIR__ . "/SendNotificationToTeams.php";
require_once __DIR__ . "/UploadPDF.php";
require_once __DIR__ . "/class/Email.php";
require_once __DIR__ . "/class/Searchinfo.php";

$log = new Log();
$Account = $_SESSION['Account'];
$DisplayName = $_SESSION['DisplayName'];
$Permission = $_SESSION['Permission'];
$Role = $_SESSION['Role'];
$FormName = filter_input(INPUT_POST, 'FormName');
$ReportMode = $ReportID = $PDFFile = $ApplyFile = $LogoFile = $ID = $ReportStatus = $ReportTemplate = $proband_name = "";
$Receiving = $Receiving2 = $Submitdate = $SampleType_1 = $SampleQuantity_1 = $SampleUnit_1 = $TemplateID = $method = $Diseases = $Tumor_percentage = $Department="";
$ErrorMessage = '';
$result1 = $resultID = array();
//檢查是否第二次進入
if ($_SERVER["REQUEST_METHOD"] == "POST" && $FormName == "ViewReportDetail") {
    try {
        $report = new Report($_POST);
        $report->checkAndSendNotifications();
        $ccemail = filter_input(INPUT_POST, 'ccemail');
        $ReportMode = filter_input(INPUT_POST, 'ReportMode');
        $ReportID = filter_input(INPUT_POST, 'ReportID');

        $Username = $_SESSION['DisplayName'];
        $reportInfo = $report->get_ReportInfo();
        $hospitalList = new Report();
        $hospitalList = $hospitalList->getHospitalList();
        //get hospitalList name
        $hospitalList = $hospitalList[$reportInfo['HospitalList']];
        $ReportType = new Report();
        $ReportType = $ReportType->getReportTypeList();
        $ReportType = $ReportType[$reportInfo['ReportType']];

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
                $ReportTemplate = $_POST['ReportTemplate'];
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
                $SampleID = $_POST['SampleID'];
                $SampleNo = $_POST['SampleNo'];
                $PatientID = $_POST['PatientID'];
                $scID = $_POST['scID'];
                $scdate = $_POST['scdate'];
                $rcdate = $_POST['rcdate'];
                $proband_name = $_POST['proband_name'];
                $Receiving = $_POST['Receiving'];
                $Receiving2 = $_POST['Receiving2'];


                if ($ReportStatus == '0' || $ReportStatus == '') {
                    $ReportStatus = '報告未上傳';
                } elseif ($ReportStatus == '1') {
                    $ReportStatus = '報告已上傳，未審核';
                } elseif ($ReportStatus == '10') {
                    $ReportStatus = '不需發報告';
                }


                $addlog = "報告編號：" . $ReportID . "已新增" . "\n"
                        . "報告名稱：" . $ReportName . "\n" 
                        . "送檢單位：" . $hospitalList . "\n" 
                        . "檢測實驗室：" . $ReportType . "\n" 
                        . "TAT最終日：" . $DueDate . "\n" 
                        . "聯絡人名稱：" . $CustomerName ."\n" 
                        . "聯絡人信箱：" . $CustomerEmail . "\n" 
                        . "信箱(副本)：" . $ccemail . "\n" 
                        . "聯絡電話：" . $CustomerPhone. "\n"
                        . "檢體編號：" . $SampleNo . "\n"
                        . "病歷號碼：" . $PatientID . "\n"
                        . "採檢單號：" . $scID . "\n"
                        . "採檢日期：" . $scdate . "\n"
                        . "收檢日期：" . $rcdate  . "\n"
                        . "簽收人：" . $Receiving . "\n"
                        . "覆核人員：" . $Receiving2 . "\n";

                // CheckPDF($_FILES);
                CheckPDF($_FILES, $HospitalList, $ReportInfo,$ReportName);

                $_SESSION['ReportID'] = $_POST['ReportID'];
                $log->SaveLog("新增檢體資料", $Username, "UpdateReportInfo", date("Y-m-d H:i:s"), $addlog);
                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'new',
                ];
                sendNotificationToTeams("ADD", "新增一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
                break;
            case 'EDIT':
                if ($Permission == 1 ) {
                    $report->UpdateReportFileName($_POST);
                    $ReportName = $_POST['ReportName'];
                    $HospitalList = $_POST['HospitalList'];

                    $ReportID = $_POST['ReportID'];
                    $ReportStatus = $_POST['ReportStatus'];
                    if (!empty($_FILES['ReportUploadPDF']['name'])) {
                        $ReportStatus = '報告已上傳，未審核';
                    } else {
                        $ReportStatus = $_POST['ReportStatus'];
                    } // $ReportStatus = $_POST['ReportStatus'];

                    // CheckPDF($_FILES);
                CheckPDF($_FILES, $HospitalList, $ReportInfo,$ReportName);

                    $updatelog = "報告編號：" . $ReportID .  "報告狀態：" . $ReportStatus;
                    $log->SaveLog("上傳報告", $Username, "UpdateReportInfo", date("Y-m-d H:i:s"), $updatelog);


                } elseif ($Permission == 4) {
                    $report->UpdateReportCustomer($_POST);
                    $ReportID = $_POST['ReportID'];
                    $CustomerName = $_POST['CustomerName'];
                    $CustomerEmail = $_POST['CustomerEmail'];
                    $ccemail = $_POST['ccemail'];
                    $CustomerPhone = $_POST['CustomerPhone'];
                    $ReportStatus = $_POST['ReportStatus'];

                    $updatelog = "報告編號：" . $ReportID . "\n" 
                                . "聯絡人名稱：" . $CustomerName . "\n" 
                                . "聯絡人信箱：" . $CustomerEmail . "\n" 
                                . "信箱(副本)：" . $ccemail . "\n" 
                                . "聯絡電話：" . $CustomerPhone . "\n" 
                                . "報告狀態：" . $ReportStatus;
                    $log->SaveLog("修改聯絡人資訊", $Username, "UpdateReportInfo", date("Y-m-d H:i:s"), $updatelog);


                } elseif ($report->UpdateReport($_POST)) {
                    $ReportMode = $_POST['ReportMode'];

                    if ($ReportMode == 'EDIT') {
                        $ReportMode = "修改報告";
                    }
                    $ReportID = $_POST['ReportID'];
                    $ReportName = $_POST['ReportName'];
                    $HospitalList = $_POST['HospitalList'];
                    // $ReportType = $_POST['ReportType'];
                    $TemplateID = $_POST['TemplateID'];
                    $ReportTemplate = $_POST['ReportTemplate'];
                    $DueDate = $_POST['DueDate'];
                    $CustomerName = $_POST['CustomerName'];
                    $CustomerEmail = $_POST['CustomerEmail'];
                    $ccemail = $_POST['ccemail'];
                    $CustomerPhone = $_POST['CustomerPhone'];
                    $SampleNo = $_POST['SampleNo'];
                    $PatientID = $_POST['PatientID'];
                    $scID = $_POST['scID'];
                    $scdate = $_POST['scdate'];
                    $rcdate = $_POST['rcdate'];
                    $proband_name = $_POST['proband_name'];
                    $Receiving = $_POST['Receiving'];
                    $Receiving2 = $_POST['Receiving2'];
                    $Submitdate = $_POST['Submitdate'];
                    $SampleType_1 = $_POST['SampleType_1'];
                    $SampleQuantity_1 = $_POST['SampleQuantity_1'];
                    $SampleUnit_1 = $_POST['SampleUnit_1'];
                    $method = $_POST['method'];
                    $Diseases = $_POST['Diseases'];
                    $Tumor_percentage = $_POST['Tumor_percentage'];
                    $Department = $_POST['Department'];
                    // echo $ReportTemplate;die();

                    //if ReportUploadPDF click ReportStaus = 1
                    if (!empty($_FILES['ReportUploadPDF']['name'])) {
                        $ReportStatus = '報告已上傳，未審核';
                    } else {
                        $ReportStatus = $_POST['ReportStatus'];
                    } 

                    $updatelog = "報告編號：" . $ReportID . "\n" 
                    . "專案項目：" . $ReportName . "\n" 
                    . "送檢單位：" . $hospitalList . "\n" 
                    . "科別：" . $Department . "\n" 
                    . "姓名：" . $proband_name . "\n" 
                    . "檢測實驗室：" . $ReportType . "\n" 
                    . "TAT最終日：" . $DueDate . "\n" 
                    . "聯絡人名稱：" . $CustomerName . "\n" 
                    . "聯絡人信箱：" . $CustomerEmail . "\n" 
                    . "信箱(副本)：" . $ccemail . "\n" 
                    . "聯絡電話：" . $CustomerPhone . "\n" 
                    . "檢體編號：" . $SampleNo . "\n"
                    . "病歷號碼：" . $PatientID . "\n"
                    . "採檢單號：" . $scID . "\n"
                    . "採檢日期：" . $scdate . "\n"
                    . "收檢日期：" . $rcdate . "\n"
                    . "送檢日期：" . $Submitdate . "\n"
                    . "簽收人：" . $Receiving . "\n"
                    . "覆核人員：" . $Receiving2 . "\n"
                    . "報告模板：" . $TemplateID . "\n"
                    . "樣品種類(一)：" . $SampleType_1 . "\n"
                    . "檢體數量(一)：" . $SampleQuantity_1 . "\n"
                    . "檢體單位(一)：" . $SampleUnit_1 . "\n"
                    . "檢測方法：" . $method . "\n"
                    . "疾病及症狀：" . $Diseases . "\n"
                    . "腫瘤百分比：" . $Tumor_percentage . "\n"
                    . "報告狀態：" . $ReportStatus;

                    if (!empty($_FILES['ReportApply']['name'])) {
                        $log->SaveLog("修改檢體資料&上傳申請單", $Username, "UpdateReportInfo", date("Y-m-d H:i:s"), $updatelog);

                    } else{

                    $log->SaveLog("修改檢體資料", $Username, "UpdateReportInfo", date("Y-m-d H:i:s"), $updatelog);

                    }
                }
                CheckPDF($_FILES, $HospitalList, $ReportInfo,$ReportName);


                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'update',
                ];
                sendNotificationToTeams("EDIT", "修改一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
                break;
            case 'EDITCC':
                $report->Updateccemail($reportInfo, $_POST);

                $ReportID = $_POST['ReportID'];
                $CustomerName = $_POST['CustomerName'];
                $CustomerEmail = $_POST['CustomerEmail'];
                $ccemail = $_POST['ccemail'];
                $CustomerPhone = $_POST['CustomerPhone'];
                $ReportStatus = $_POST['ReportStatus'];

                $updatelog = "報告編號：" . $ReportID . "\n" 
                            . "聯絡人名稱：" . $CustomerName . "\n" 
                            . "聯絡人信箱：" . $CustomerEmail . "\n" 
                            . "信箱(副本)：" . $ccemail . "\n" 
                            . "聯絡電話：" . $CustomerPhone . "\n" 
                            . "報告狀態：" . $ReportStatus;
                $log->SaveLog("修改信箱", $Username, "UpdateReportInfo", date("Y-m-d H:i:s"), $updatelog);

                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'update',
                ];
                sendNotificationToTeams("EDITCC", "修改一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
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

                    $log->SaveLog("刪除報告", $Username, "UpdateReportInfo", date("Y-m-d H:i:s"), $deletelog);

                }
                $messageData = [
                    'report_id' => $_POST['ReportID'],
                    'status' => 'delete',
                ];
                sendNotificationToTeams("DELETE", "刪除一筆報告: " . $_POST['ReportID'] . ' ' . $_POST['ReportName'] . " by " . $DisplayName);
                break;
            default:
                // back to home page
                header("Location: home.php");
                break;
        }
        header("Location: home.php");
        ob_end_flush();

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
            }
            if (!empty($reportInfo['apply_pdf'])) {
                $ApplyFile = "./uploads/" . $ReportID . "/" . $reportInfo['apply_pdf'];
            }
            if (!empty($reportInfo['LogoFile'])) {
                $LogoFile = "./uploads/" . $ReportID . "/" . $reportInfo['LogoFile'];
            }
            // set maintain button area to Maintain mode
            $ReportMode = "VIEW";
            break;
        case 'CHECK':
            $Searchinfo = new Searchinfo();
            $SearchListbydate1 = $Searchinfo->SearchListDisplay($HospitalList, $StartDate, $EndDate);
            // 取$SearchListbydate1 所有reportID
            foreach ($SearchListbydate1 as $key => $value) {
                $resultID[] = $value['id'];
                $ID = $result1[] = $value['ReportID'];

                $report = new Report($_FILES);
                $report->GetReport($ID);
                $reportInfo = $report->get_ReportInfo();
                $ReportID = $reportInfo['ReportID'];
                if (!empty($reportInfo['FileName'])) {
                    $PDFFile = "./uploads/" . $ReportID . "/" . $reportInfo['FileName'];
                }
                if (!empty($reportInfo['apply_pdf'])) {
                    $ApplyFile = "./uploads/" . $ReportID . "/" . $reportInfo['apply_pdf'];
                }
                if (!empty($reportInfo['LogoFile'])) {
                    $LogoFile = "./uploads/" . $ReportID . "/" . $reportInfo['LogoFile'];
                }
                // set maintain button area to Maintain mode
                $ReportMode = "CHECK";
            }
            break;
        default:
            $ID = filter_input(INPUT_GET, 'id');
            $report = new Report($_FILES);
            $report->GetReport($ID);
            $reportInfo = $report->get_ReportInfo();
            $ReportID = $reportInfo['ReportID'];
            if (!empty($reportInfo['FileName'])) {
                $PDFFile = "./uploads/" . $ReportID . "/" . $reportInfo['FileName'];
            }
            if (!empty($reportInfo['apply_pdf'])) {
                $ApplyFile = "./uploads/" . $ReportID . "/" . $reportInfo['apply_pdf'];
            }
            if (!empty($reportInfo['LogoFile'])) {
                $LogoFile = "./uploads/" . $ReportID . "/" . $reportInfo['LogoFile'];
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
$smarty->assign("Hiddenfield7", "<input type='hidden' id='ApplyFile' name='ApplyFile' value=" . $ApplyFile . ">");
$smarty->assign("Hiddenfield8", "<input type='hidden' id='LogoFile' name='LogoFile' value=" . $LogoFile . ">");
// Error Message
$smarty->assign("ErrorMessage", $ErrorMessage);
if ($ErrorMessage == '') {
    $smarty->assign("ShowErrorMessage", 'hidden');
} else {
    $smarty->assign("ShowErrorMessage", '');
}

//form to send email
$smarty->assign("FormEmail", "<form id='email_report' method='post' action='send_email.php'>");



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
        $ReportStatus = "修改聯絡人資料，請重出報告";
        break;
    case '8':
        $ReportStatus = "已寄送報告";
        break;
    case '10':
        $ReportStatus = "不需發報告";
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

if (empty($ReportType)) {
    $ReportType = '0';
}

$smarty->assign('HospitalListOptions', $List, true);
$smarty->assign('HospitalListSelect', $HospitalList, true);
$smarty->assign('ReportTypeOptions', $Type, true);
$smarty->assign('ReportTypeSelect', $ReportType, true);
$smarty->assign("ReportTemplate", $ReportTemplate, true);
$TemplateID = $report->ReportInfo('TemplateID');
$TemplateList = $report->getTemplateList(); //取得樣板清單
$smarty->assign('TemplateOptions', $TemplateList, true); //將樣板清單送至樣板檔
$smarty->assign('TemplateSelect', $TemplateID, true);
$smarty->assign("HospitalList_Dr", $report->ReportInfo('HospitalList_Dr'), true);
$smarty->assign("method", $report->ReportInfo('method'), true);
$smarty->assign("Submitdate", $report->ReportInfo('Submitdate'), true);
$smarty->assign("DueDate", $report->ReportInfo('DueDate'), true);
$smarty->assign("CustomerName", $report->ReportInfo('CustomerName'), true);
$smarty->assign("CustomerEmail", $report->ReportInfo('CustomerEmail'), true);
$smarty->assign("ccemail", $report->ReportInfo('ccemail'), true);
$smarty->assign("CustomerPhone", $report->ReportInfo('CustomerPhone'), true);
$smarty->assign("ReportStatus", $ReportStatus, true);
$smarty->assign("Permission", $Permission, true);
$smarty->assign("RejectReason", $report->ReportInfo('RejectReason'), true);
$smarty->assign("SampleNo", $report->ReportInfo('SampleNo'), true);
$smarty->assign("PatientID", $report->ReportInfo('PatientID'), true);
$smarty->assign("scID", $report->ReportInfo('scID'), true);
$smarty->assign("scdate", $report->ReportInfo('scdate'), true);
$smarty->assign("rcdate", $report->ReportInfo('rcdate'), true);
$smarty->assign("SampleType_1", $report->ReportInfo('SampleType_1'), true);
$smarty->assign("SampleType_2", $report->ReportInfo('SampleType_2'), true);
$smarty->assign("SampleType_3", $report->ReportInfo('SampleType_3'), true);
$smarty->assign("SampleType_4", $report->ReportInfo('SampleType_4'), true);
$smarty->assign("SampleType_5", $report->ReportInfo('SampleType_5'), true);
$smarty->assign("SampleQuantity_1", $report->ReportInfo('SampleQuantity_1'), true);
$smarty->assign("SampleQuantity_2", $report->ReportInfo('SampleQuantity_2'), true);
$smarty->assign("SampleQuantity_3", $report->ReportInfo('SampleQuantity_3'), true);
$smarty->assign("SampleQuantity_4", $report->ReportInfo('SampleQuantity_4'), true);
$smarty->assign("SampleQuantity_5", $report->ReportInfo('SampleQuantity_5'), true);
$smarty->assign("SampleUnit_1", $report->ReportInfo('SampleUnit_1'), true);
$smarty->assign("SampleUnit_2", $report->ReportInfo('SampleUnit_2'), true);
$smarty->assign("SampleUnit_3", $report->ReportInfo('SampleUnit_3'), true);
$smarty->assign("SampleUnit_4", $report->ReportInfo('SampleUnit_4'), true);
$smarty->assign("SampleUnit_5", $report->ReportInfo('SampleUnit_5'), true);
$smarty->assign("Receiving", $report->ReportInfo('Receiving'), true);
$smarty->assign("Receiving2", $report->ReportInfo('Receiving2'), true);
$smarty->assign("proband_name", $report->ReportInfo('proband_name'), true);
$smarty->assign("Diseases", $report->ReportInfo('Diseases'), true);
$smarty->assign("Tumor_percentage", $report->ReportInfo('Tumor_percentage'), true);
$smarty->assign("Department", $report->ReportInfo('Department'), true);

if ($ApplyFile == '') {
    $smarty->assign("ApplyFile", "", true);
    if($Permission == 2 or $Permission == 21 or $Permission == 22 or  $Permission == 4 or $Permission == 5 )
    {
        $output_apply = '<br><h4 style="justify-content: center; display: flex;color:#FF0000">請上傳申請單</h4>';
    }else{
        $output_apply = '';
    }

    echo '<div id="pdf-output">' . $output_apply . '</div>';

} else {
    $smarty->assign("ApplyFile", $ApplyFile, true);
}

if ($LogoFile == '') {
    $smarty->assign("LogoFile", "", true);
    // $output_apply = '<br><h4 style="justify-content: center; display: flex;color:#FF0000">請上傳申請單</h4>';
    // echo '<div id="pdf-output">' . $output_apply . '</div>';

} else {
    $smarty->assign("LogoFile", $LogoFile, true);
}

$ReportName = $report->ReportInfo('ReportName');
$CustomerEmail = $report->ReportInfo('CustomerEmail');
$ccemail = $report->ReportInfo('ccemail');
$CustomerName = $report->ReportInfo('CustomerName');
$PatientID = $report->ReportInfo('PatientID');
$scID = $report->ReportInfo('scID');
$scdate = $report->ReportInfo('scdate');
$rcdate = $report->ReportInfo('rcdate');
$ReportTemplate = $report->ReportInfo('ReportTemplate');
$HospitalList = $report->ReportInfo('HospitalList');
$proband_name = $report->ReportInfo('proband_name');
$SampleNo = $report->ReportInfo('SampleNo');


// Display PDF File if empty show error message

if ($ReportStatus == "不需發報告") {
    $smarty->assign("PDFPreview", "");
    $output = '<br><h4 style="justify-content: center; display: flex;color:#FF0000"></h4>';
} elseif ($PDFFile == '') {
    $smarty->assign("PDFPreview", "");
    $output = '<br><h4 style="justify-content: center; display: flex;color:#FF0000">請上傳PDF報告</h4>';
    // echo '<div id="pdf-output">' . $output . '</div>';

} elseif ($ReportStatus == "報告已上傳，未審核") {
    $smarty->assign("PDFPreview", $PDFFile);
    $output = '<br><h4 style="justify-content: center; display: flex;color:#FF0000">待醫檢師簽核</h4>';
    // echo '<div id="pdf-output">' . $output . '</div>';

} elseif ($ReportStatus == '修改聯絡人資料，請重出報告'){
    $smarty->assign("PDFPreview", "");
    $output = '<br><h4 style="justify-content: center; display: flex;color:#FF0000">請重新上傳PDF報告</h4>';

}
else {
    $smarty->assign("PDFPreview", $PDFFile);
    $smarty->assign("ApplyFile", $ApplyFile, true);

    $output =
        '<div style="justify-content: center; display: flex; ">
            <form id="email_report" method="post" action="send_email.php">
                <input type="hidden" name="ReportID" value="' . $ReportID . '">
                <input type="hidden" name="ReportName" value="' . $ReportName . '">
                <input type="hidden" name="CustomerEmail" value="' . $CustomerEmail . '">
                <input type="hidden" name="ccemail" value="' . $ccemail . '">
                <input type="hidden" name="CustomerName" value="' . $CustomerName . '">
                <input type="hidden" name="PDFFile" value="' . $PDFFile . '">
                <input type="hidden" name="ApplyFile" value="' . $ApplyFile . '">
                <input type="hidden" name="LogoFile" value="' . $LogoFile . '">
                <input type="hidden" name="PatientID" value="' . $PatientID . '">
                <input type="hidden" name="scID" value="' . $scID . '">
                <input type="hidden" name="scdate" value="' . $scdate . '">
                <input type="hidden" name="rcdate" value="' . $rcdate . '">
                <input type="hidden" name="HospitalList" value="' . $HospitalList . '">
                                <input type="hidden" name="proband_name" value="' . $proband_name . '">
                <input type="hidden" name="SampleNo" value="' . $SampleNo . '">
                <input type="hidden" style="margin-left: 10px;height: 40px;" name="BtnSendPDF" id="BtnSendPDF" class="btn btn-primary" value="Send E-mail">
            </form>
            <!-- test form -->
            <form id="test" method="post" action="send_email.php">
                <input type="hidden" name="ReportID" value="' . $ReportID . '">
                <input type="hidden" name="ReportName" value="' . $ReportName . '">
                <input type="hidden" name="CustomerEmail" value="' . $CustomerEmail . '">
                <input type="hidden" name="ccemail" value="' . $ccemail . '">
                <input type="hidden" name="CustomerName" value="' . $CustomerName . '">
                <input type="hidden" name="PDFFile" value="' . $PDFFile . '">
                <input type="hidden" name="ApplyFile" value="' . $ApplyFile . '">
                <input type="hidden" name="LogoFile" value="' . $LogoFile . '">
                <input type="hidden" name="PatientID" value="' . $PatientID . '">
                <input type="hidden" name="scID" value="' . $scID . '">
                <input type="hidden" name="scdate" value="' . $scdate . '">
                <input type="hidden" name="rcdate" value="' . $rcdate . '">
                <input type="hidden" name="HospitalList" value="' . $HospitalList . '">
                <input type="hidden" name="proband_name" value="' . $proband_name . '">
                <input type="hidden" name="SampleNo" value="' . $SampleNo . '">
                
                <input type="submit" style="margin-left: 10px;height: 40px;" name="BtnSendPDF" id="BtnSendPDF" class="btn btn-primary" value="Send E-mail">
                <button id="downloadButton" style="margin-left: 10px;height: 40px;" class="btn btn-primary" type="button">One Click Download</button>
                    <a id="downloadPDF" style="display:none;" href="' . $PDFFile . '" download></a>
                    <a id="downloadApply" style="display:none;" href="' . $ApplyFile . '" download></a>
            </form>



            
            
          </div>';




    //if permission = 6 don't show email button
    // if ($Permission != 4) {
    //     $output = '<br><h4 style="justify-content: center; display: flex;color:#FF0000">請再次確認檢測報告資訊</h4>' .
    //         '<div style="justify-content: center; display: flex; ">
    //         <button style="margin-left: 10px;height: 40px;" class="btn btn-primary" type="button">
    //             <a style="color:white;" href="' . $PDFFile . '" download>Download </a>
    //         </button>
    //       </div>';
    // } elseif ($Permission == 5) {
    //     $output = '';
    // } 

    // echo '<div id="pdf-output">' . $output . '</div>';
    }
    $smarty->assign("output", "<input type='hidden' id='output' name='output' value=" . $output . "");


// Display Smarty Template
$smarty->assign("IncludePage", "ReportDetailMaintain.tpl");
$smarty->display("ViewReportDetail.tpl");


echo '<script>
document.getElementById("downloadButton").addEventListener("click", function() {
    // 自動觸發下載
    document.getElementById("downloadPDF").click();
    document.getElementById("downloadApply").click();
});
</script>';

// JavaScript code
echo '<script>
    const pdfOutput = document.getElementById("pdf-output");
    document.body.appendChild(pdfOutput);
    document.getElementById("email_report").addEventListener("submit", function(event){
        const confirmMessage =
            confirm(`確定要寄出報告嗎?\n請再確認資訊是否正確：\n報告編號：' . $ReportID . '\n客戶姓名：' . $CustomerName . '\n客戶信箱：' . $CustomerEmail . '\n聯絡人信箱：' . $ccemail . '`);
        if(!confirmMessage){
            event.preventDefault();
        }
    });
</script>';
?>

<!-- <script>
const pdfOutput = document.getElementById('pdf-output');
document.body.appendChild(pdfOutput);
</script> -->