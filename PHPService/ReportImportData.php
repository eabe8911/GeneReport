<?php
// Check Auth of session
session_start();
require __DIR__ . "/vendor/autoload.php";

if ($_SESSION["AUTH"] != TRUE) {
    header("Location: index.php");
    session_unset();
    die();
}
use PhpOffice\PhpSpreadsheet\IOFactory;

// require class
require_once __DIR__ . "/class/Report.php";
require_once __DIR__ . "/class/Log.php";
// init log
$log = new Log();
// get session
$Account = $_SESSION['Account'];
$DisplayName = $_SESSION['DisplayName'];
$Permission = $_SESSION['Permission'];
// get post
$FormName = filter_input(INPUT_POST, 'FormName');
// init variable
$ExcelFile = $ErrorMessage = $Message = '';
// check post
if ($_SERVER["REQUEST_METHOD"] == "POST" && $FormName == "ReportImportData") {
    try {
        if (isset($_FILES['ExcelFile']) && $_FILES['ExcelFile']['error'] == 0) {
            $ExcelFile = $_FILES['ExcelFile']['name'];
            $tmpName = $_FILES['ExcelFile']['tmp_name'];
            $fileSize = $_FILES['ExcelFile']['size'];
            $fileType = $_FILES['ExcelFile']['type'];
            // Validate file type
            if ($fileType != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                $ErrorMessage = "上傳檔案格式錯誤!";
                $log->SaveLog("上傳檔案格式錯誤", "ReportImportData", date("Y-m-d H:i:s"), json_encode($_POST));
                throw new Exception($ErrorMessage, 1);
            }
            // Process the Excel file
            $spreadsheet = IOFactory::load($tmpName);
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();
            $header = array_shift($rows);
            $datas = [];
            $count = 0;
            foreach ($rows as $row) {
                $count++;
                if ($count < 1) {
                    continue;
                }
                $datas[] = array_combine($header, $row);
            }
            $report = new Report();
            $iterationCount = count($datas);
            //get all datas ReportID
            $ReportID[] = array_column($datas, 'ReportID');
            //show all datas ReportID
            print_r($ReportID);
            // print_r($ReportID)寫入Log
            // $log->SaveLog("ReportID", "ReportImportData", date("Y-m-d H:i:s"), json_encode($ReportID));

            //if no data in excel
            if ($iterationCount == 0) {
                $ErrorMessage = "上傳檔案無資料!";
                $log->SaveLog("ERROR", "ReportImportData", date("Y-m-d H:i:s"), json_encode($_POST));
                throw new Exception($ErrorMessage, 1);
            } else {
                //add data
                    // 從$datas[3]開始執行foreach
                    // foreach (array_slice($datas, 1) as $data) {
                        
                    //     $report->AddReport1($data);
                    // }
                        foreach ($datas as $data) {
                        $report->AddReport1($data);
                    }


            }
            $Message = "資料匯入成功!";
            echo "<script>alert('資料匯入成功'); window.location.href = 'home.php';</script>";

            $log->SaveLog("批次上傳資料", $DisplayName, "ReportImportData", date("Y-m-d H:i:s"), "批次匯入資料共 " . $iterationCount . " 筆" . "\n" . json_encode($ReportID));
        } else {
            $ErrorMessage = "上傳檔案失敗!";
            $log->SaveLog("上傳檔案失敗", $DisplayName, "ReportImportData", date("Y-m-d H:i:s"), $ErrorMessage);
        }
        // $importlog = "報告編號：" . $ReportID . "已新增". "\n"  . "報告名稱：" . $ReportName . "\n" . "送檢單位：" . $HospitalList . "\n" . "送檢單位：" . $ReportType . "\n" . "報告模板：" . $TemplateID . "\n" . "TAT最終日：" . $DueDate . "\n" . "客戶姓名：" . $CustomerName . "\n" . "客戶信箱：" . $CustomerEmail . "\n" . "客戶連絡電話：" . $CustomerPhone ;

        // $log->SaveLog("ADD", $DisplayName, "ReportImportData", date("Y-m-d H:i:s"), $importlog);
    } catch (Exception $e) {
        $ErrorMessage = $e->getMessage();
        $log->SaveLog("ERROR", $DisplayName, "ReportImportData", date("Y-m-d H:i:s"), $ErrorMessage);
    }
    // header("Location: home.php");

    // die();
}

$smarty = new Smarty;
// assign variable
$Logo = "<img src='./images/Libobio-Logo@2x.png' alt='LiboBio Logo' height='70'>";
$LogoName = "";
$smarty->assign("Logo", $Logo);
$smarty->assign("LogoName", $LogoName);
$smarty->assign("Menu", "Menu");
$smarty->assign("Title", "麗寶生醫");
$smarty->assign("DisplayName", $DisplayName);
$smarty->assign("AgentPhoto", "assets/images/users/avatar-1.jpg");
$smarty->assign("FormAction", $_SERVER['PHP_SELF']);
//Form Hidden Fields
$smarty->assign("Hiddenfield1", "<input type='hidden' id='FormName' name='FormName' value='ReportImportData'>");
$smarty->assign("Hiddenfield2", "<input type='hidden' id='ExcelFile' name='ExcelFile' value=" . $ExcelFile . ">");
$smarty->assign("ExcelFile", "<input type='hidden' id='ExcelFile' name='ExcelFile' value=" . $ExcelFile . ">");
$smarty->assign("Hiddenfield3", "<input type='hidden' id='Permission' name='Permission' value=" . $_SESSION['Permission'] . ">");
// Message
$smarty->assign("Message", $Message);
if ($Message == '') {
    $smarty->assign("ShowMessage", 'hidden');
} else {
    $smarty->assign("ShowMessage", '');
}
// Error Message
$smarty->assign("ErrorMessage", $ErrorMessage);
if ($ErrorMessage == '') {
    $smarty->assign("ShowErrorMessage", 'hidden');
} else {
    $smarty->assign("ShowErrorMessage", '');
}
// display
$smarty->display("ViewReportImport.tpl");
//----------------------end of ReportImportData.php----------------------//