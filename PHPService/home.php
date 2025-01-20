<?php
// Enable Xdebug
if (extension_loaded('xdebug')) {
    ini_set('xdebug.remote_enable', 1);
    ini_set('xdebug.remote_autostart', 1);
}

// Set a breakpoint
xdebug_break();
session_start();
require __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/class/Report.php";
require_once __DIR__ . "/class/Log.php";
if (empty($_SESSION["AUTH"]) || $_SESSION["AUTH"] != TRUE) {
    session_unset();
    header("Location: index.php");
    die();
}
$ErrorMessage = '';
$ShowErrorMessage = 'hidden';

$smarty = new Smarty;
$Logo = "<img src='./images/Libobio-Logo@2x.png' alt='LiboBio Logo' height='70'>";
$LogoName = "";
$smarty->assign("Logo", $Logo);
$smarty->assign("LogoName", $LogoName);
$smarty->assign("Menu", "Menu");
$smarty->assign("Title", "麗寶生醫");
$smarty->assign("DisplayName", $_SESSION['DisplayName']);
$smarty->assign("UserID", $_SESSION['UserID']);
$smarty->assign("Permission", $_SESSION['Permission']);
$smarty->assign("Role", $_SESSION['Role']);
$smarty->assign("Character", $_SESSION['Character']);
$smarty->assign("AgentPhoto", "assets/images/users/avatar-1.jpg");
// TODO: Assign Get link in home header
$smarty->assign("addReport", "ReportDetailMaintain.php?ReportMode=ADD");
$smarty->assign("RejectReport", "ReportDetailApprove.php?ApproveMode=REJECT");
$smarty->assign("ApproveReport", "ReportDetailApprove.php?ApproveMode=PASS");
$smarty->assign("ImportReport", "ReportImportData.php");
$smarty->assign("update_report_status", "update_report_status.php");
$smarty->assign("log_table", "log_table.php");
// $smarty->assign("addTemplate", "ReportDetailMaintain.php?ReportMode=ADDT");

// JQGRID TABLE
$smarty->assign("Search", "SearchTable", true);
$smarty->assign("SearchStatus", "SearchStatus", true);
$smarty->assign("jqGrid", "jqGrid", true);
$smarty->assign("jqGridPager", "jqGridPager", true);
$smarty->assign("jqGrid_Log", "jqGrid_Log", true);
$smarty->assign("jqGridPager_Log", "jqGridPager_Log", true);



// 处理 AJAX 请求
if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    header('Content-Type: application/json');
    $Username = $_SESSION['DisplayName'];
    $ReportMode = "JSON";
    try {
        
        $log = new Log();
        // 获取原始 POST 数据
        $data = file_get_contents('php://input');

        // 将 JSON 数据转换为 PHP 数组
        $data = json_decode($data, true);

        // 验证数据
        if (!isset($data['start_report_id']) || !isset($data['end_report_id'])) {
            throw new Exception('Missing report ID range');
        }

        $startReportId = $data['start_report_id'];
        $endReportId = $data['end_report_id'];

        // 查詢資料庫
        if ($startReportId > $endReportId) {
            throw new Exception('Start report ID must be less than or equal to end report ID');
            $log->SaveLog("ERROR", $DisplayName, "JSON", date("Y-m-d H:i:s"), "Start report ID must be less than or equal to end report ID");
        }

        $Report = new Report();
        $Report->setReportID($startReportId, $endReportId);
        //get setReportID response
        $response = $Report->getReportID();
        // 返回 JSON 数据
        //if response is empty  return error
        if (empty($response)) {
            throw new Exception('No report found');
        }


        $log->SaveLog("下載JSON", $Username, $ReportMode, date("Y-m-d H:i:s"), $startReportId.'-'.$endReportId. "下載成功");

        echo json_encode($response);



    } catch (Exception $e) {
        // 返回错误信息
        http_response_code(400);
        $errorResponse = array('error' => $e->getMessage());
        echo json_encode($errorResponse);
    }
    exit;

}


/**PAGES***/
$smarty->display('home.tpl');




?>