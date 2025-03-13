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
$report = new Report();
// get session
$Account = $_SESSION['Account'];
$DisplayName = $_SESSION['DisplayName'];
$Permission = $_SESSION['Permission'];
// get post
$FormName = filter_input(INPUT_POST, 'FormName');
// init variable
$ExcelFile = $ErrorMessage = $Message = '';
// check post
$Account = $_SESSION['Account'];
$DisplayName = $_SESSION['DisplayName'];
$Permission = $_SESSION['Permission'];
$Role = $_SESSION['Role'];
$FormName = filter_input(INPUT_POST, 'FormName');
$ReportMode = $ReportID = $PDFFile = $ApplyFile = $LogoFile = $ID = $ReportStatus = $ReportTemplate = $proband_name = "";
$Nanodrop_Conc = $Qubit_Conc = $Volumn = $Nanodrop_Yield = $Qubit_Yield = $OD280 = $OD230 = $Length = $Storage = $Extraction_date ="";
$F_Method = $F_Conc = $F_Length ="";
$Library_Conc = $Library_Volumn = $Library_Yield = $Library_Meansize = $BarcodeNo = $Library_date = $Platform = $ChipID = $On_date = "";
$ErrorMessage = '';
$LogoName = "";
$previousPage = $_SERVER['HTTP_REFERER'] ?? 'home.php';
$ReportID = "";
$sampleData = array();
$sample = new Report($_POST);
$smarty = new Smarty;
$Logo = "<img src='./images/Libobio-Logo@2x.png' alt='LiboBio Logo' height='70'>";


if($_SERVER["REQUEST_METHOD"] == "POST" && $FormName == "ViewReportDetail") {
    try {
        $Username = $_SESSION['DisplayName'];
        $ReportMode = filter_input(INPUT_POST, 'ReportMode');

        switch ($ReportMode) {
            case 'ADDsample':
                $sample->AddSample3($_POST);
                // $ReportMode = "UpdateSample";

                //get ReportID
                $ReportID = $sample->ReportInfo('ReportID');
                $proband_name = filter_input(INPUT_POST, 'proband_name');
                $Nanodrop_Conc = filter_input(INPUT_POST, 'Nanodrop_Conc');
                $Qubit_Conc = filter_input(INPUT_POST, 'Qubit_Conc');
                $Volumn = filter_input(INPUT_POST, 'Volumn');
                $Nanodrop_Yield = filter_input(INPUT_POST, 'Nanodrop_Yield');
                $Qubit_Yield = filter_input(INPUT_POST, 'Qubit_Yield');
                $OD280 = filter_input(INPUT_POST, 'OD280');
                $OD230 = filter_input(INPUT_POST, 'OD230');
                $Length = filter_input(INPUT_POST, 'Length');
                $Storage = filter_input(INPUT_POST, 'Storage');
                $Extraction_date = filter_input(INPUT_POST, 'Extraction_date');
                $F_Method = filter_input(INPUT_POST, 'F_Method');
                $F_Conc = filter_input(INPUT_POST, 'F_Conc');
                $F_Length = filter_input(INPUT_POST, 'F_Length');
                $Library_Conc = filter_input(INPUT_POST, 'Library_Conc');
                $Library_Volumn = filter_input(INPUT_POST, 'Library_Volumn');
                $Library_Yield = filter_input(INPUT_POST, 'Library_Yield');
                $Library_Meansize = filter_input(INPUT_POST, 'Library_Meansize');
                $BarcodeNo = filter_input(INPUT_POST, 'BarcodeNo');
                $Library_date = filter_input(INPUT_POST, 'Library_date');
                $Platform = filter_input(INPUT_POST, 'Platform');
                $ChipID = filter_input(INPUT_POST, 'ChipID');
                $On_date = filter_input(INPUT_POST, 'On_date');
                $ReportStatus = '1';
                $ReportTemplate = '1';
                $Message = "新增成功";
                $log->SaveLog("新增實驗數據", $Username, $ReportMode, date("Y-m-d H:i:s"), $ReportID . "新增成功");    


                break;
            
            case 'UpdateSample':
                $sample->UpdateSample($_POST);
                $ReportMode = "UpdateSample";
                $ReportID = filter_input(INPUT_POST, 'ReportID');
                $proband_name = filter_input(INPUT_POST, 'proband_name');
                $Nanodrop_Conc = filter_input(INPUT_POST, 'Nanodrop_Conc');
                $Qubit_Conc = filter_input(INPUT_POST, 'Qubit_Conc');
                $Volumn = filter_input(INPUT_POST, 'Volumn');
                $Nanodrop_Yield = filter_input(INPUT_POST, 'Nanodrop_Yield');
                $Qubit_Yield = filter_input(INPUT_POST, 'Qubit_Yield');
                $OD280 = filter_input(INPUT_POST, 'OD280');
                $OD230 = filter_input(INPUT_POST, 'OD230');
                $Length = filter_input(INPUT_POST, 'Length');
                $Storage = filter_input(INPUT_POST, 'Storage');
                $Extraction_date = filter_input(INPUT_POST, 'Extraction_date');
                $F_Method = filter_input(INPUT_POST, 'F_Method');
                $F_Conc = filter_input(INPUT_POST, 'F_Conc');
                $F_Length = filter_input(INPUT_POST, 'F_Length');
                $Library_Conc = filter_input(INPUT_POST, 'Library_Conc');
                $Library_Volumn = filter_input(INPUT_POST, 'Library_Volumn');
                $Library_Yield = filter_input(INPUT_POST, 'Library_Yield');
                $Library_Meansize = filter_input(INPUT_POST, 'Library_Meansize');
                $BarcodeNo = filter_input(INPUT_POST, 'BarcodeNo');
                $Library_date = filter_input(INPUT_POST, 'Library_date');
                $Platform = filter_input(INPUT_POST, 'Platform');
                $ChipID = filter_input(INPUT_POST, 'ChipID');
                $On_date = filter_input(INPUT_POST, 'On_date');
                $Remark = filter_input(INPUT_POST, 'Remark');
                $ReportStatus = '1';
                $ReportTemplate = '1';
                $Message = "修改成功";
                $log->SaveLog("修改實驗數據", $Username, $ReportMode, date("Y-m-d H:i:s"), $ReportID . "修改成功");



                break;
        default:
            header("Location: home.php");
            break;
        }
        header("Location: $previousPage");
        ob_end_flush();

    } catch (Exception $e) {
        $ErrorMessage = $e->getMessage();
        $log->SaveLog("ERROR", $Username, $ReportMode, date("Y-m-d H:i:s"), $ReportID . $ErrorMessage);
    } 
} else {
        //第一次進入
        $ReportMode = "ADDsample";

        $ReportID = filter_input(INPUT_GET, 'ReportID');
        $sample = new Report();
        $sampleData = $sample->getSampleData($ReportID);
        if ($sampleData === false) {
            $sampleData = [];
        }
        $smarty = new Smarty;
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

        // Form Fields
        $smarty->assign("ReportID", $ReportID);
        $smarty->assign("Nanodrop_Conc", $sampleData['Nanodrop_Conc'] ?? '');
        $smarty->assign("Qubit_Conc", $sampleData['Qubit_Conc'] ?? '');
        $smarty->assign("Volumn", $sampleData['Volumn'] ?? '');
        $smarty->assign("Nanodrop_Yield", $sampleData['Nanodrop_Yield'] ?? '');
        $smarty->assign("Qubit_Yield", $sampleData['Qubit_Yield'] ?? '');
        $smarty->assign("OD280", $sampleData['OD280'] ?? '');
        $smarty->assign("OD230", $sampleData['OD230'] ?? '');
        $smarty->assign("Length", $sampleData['Length'] ?? '');
        $smarty->assign("Storage", $sampleData['Storage'] ?? '');
        $smarty->assign("Extraction_date", $sampleData['Extraction_date'] ?? '');
        $smarty->assign("F_Method", $sampleData['F_Method'] ?? '');
        $smarty->assign("F_Conc", $sampleData['F_Conc'] ?? '');
        $smarty->assign("F_Length", $sampleData['F_Length'] ?? '');
        $smarty->assign("Library_Conc", $sampleData['Library_Conc'] ?? '');
        $smarty->assign("Library_Volumn", $sampleData['Library_Volumn'] ?? '');
        $smarty->assign("Library_Yield", $sampleData['Library_Yield'] ?? '');
        $smarty->assign("Library_Meansize", $sampleData['Library_Meansize'] ?? '');
        $smarty->assign("BarcodeNo", $sampleData['BarcodeNo'] ?? '');
        $smarty->assign("Library_date", $sampleData['Library_date'] ?? '');
        $smarty->assign("Platform", $sampleData['Platform'] ?? '');
        $smarty->assign("ChipID", $sampleData['ChipID'] ?? '');
        $smarty->assign("On_date", $sampleData['On_date'] ?? '');
        $smarty->assign("Remark", $sampleData['Remark'] ?? '');


}
    
$ReportID = filter_input(INPUT_GET, 'ReportID');
$sample = new Report();
$sampleData = $sample->getSampleData($ReportID);
if ($sampleData === false) {
    $sampleData = [];
}
$smarty = new Smarty;
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

// Form Fields
$smarty->assign("ReportID", $ReportID);
$smarty->assign("Nanodrop_Conc", $sampleData['Nanodrop_Conc'] ?? '');
$smarty->assign("Qubit_Conc", $sampleData['Qubit_Conc'] ?? '');
$smarty->assign("Volumn", $sampleData['Volumn'] ?? '');
$smarty->assign("Nanodrop_Yield", $sampleData['Nanodrop_Yield'] ?? '');
$smarty->assign("Qubit_Yield", $sampleData['Qubit_Yield'] ?? '');
$smarty->assign("OD280", $sampleData['OD280'] ?? '');
$smarty->assign("OD230", $sampleData['OD230'] ?? '');
$smarty->assign("Length", $sampleData['Length'] ?? '');
$smarty->assign("Storage", $sampleData['Storage'] ?? '');
$smarty->assign("Extraction_date", $sampleData['Extraction_date'] ?? '');
$smarty->assign("F_Method", $sampleData['F_Method'] ?? '');
$smarty->assign("F_Conc", $sampleData['F_Conc'] ?? '');
$smarty->assign("F_Length", $sampleData['F_Length'] ?? '');
$smarty->assign("Library_Conc", $sampleData['Library_Conc'] ?? '');
$smarty->assign("Library_Volumn", $sampleData['Library_Volumn'] ?? '');
$smarty->assign("Library_Yield", $sampleData['Library_Yield'] ?? '');
$smarty->assign("Library_Meansize", $sampleData['Library_Meansize'] ?? '');
$smarty->assign("BarcodeNo", $sampleData['BarcodeNo'] ?? '');
$smarty->assign("Library_date", $sampleData['Library_date'] ?? '');
$smarty->assign("Platform", $sampleData['Platform'] ?? '');
$smarty->assign("ChipID", $sampleData['ChipID'] ?? '');
$smarty->assign("On_date", $sampleData['On_date'] ?? '');
$smarty->assign("Remark", $sampleData['Remark'] ?? '');

// Error Message
$smarty->assign("ErrorMessage", $ErrorMessage);
if ($ErrorMessage == '') {
    $smarty->assign("ShowErrorMessage", 'hidden');
} else {
    $smarty->assign("ShowErrorMessage", '');
}

$smarty->assign("IncludePage", "Addsample3.tpl");
$smarty->display("ViewSample.tpl");



?>