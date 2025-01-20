<?php
session_start();


if ($_SESSION["AUTH"] != true) {
    header("Location: index.php");
    session_unset();
    die();
}

// autoload
require __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/class/Report.php";
require_once __DIR__ . "/class/Log.php";

require_once __DIR__ . "/class/Log.php";
require_once __DIR__ . '/class/Character.php';
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$Logo = "<img src='./images/Libobio-Logo@2x.png' alt='LiboBio Logo' height='70'>";
$LogoName = "";
$log = new Log();
$ErrorMessage = '';
$UserMode = $AppointMode = '';
$HospitalName = $SubmittedBy = '';

$log = new Log();
$Account = $_SESSION['Account'];
$Permission = $_SESSION['Permission'];
$SubmittedBy = $_SESSION['DisplayName'];
$report = new Report($_POST);

$hospitalNames = $report->get_PendingHospitalList($HospitalName);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        // $report->get_PendingHospitalList($HospitalName);
    //收到回傳的hospitalNames
        // 將數據傳遞給模板引擎
        $smarty->assign('hospitalNames', $hospitalNames);
        $report->UpdateHospital($HospitalName);
        $log->SaveLog("UpdateHospital", $Account, "UpdateHospital", date("Y-m-d H:i:s"), "審核送檢單位");
        echo "<script>alert('送檢單位審核成功'); window.location.href='home.php';</script>";
    } catch (Exception $e) {
        $ErrorMessage = "審核醫院時出現錯誤: " . $e->getMessage();
        $log->SaveLog("ERROR", $Account, "UpdateHospital", date("Y-m-d H:i:s"), $ErrorMessage);
    }
}

$smarty = new Smarty;
$smarty->assign("Logo", $Logo);
$smarty->assign("LogoName", $LogoName);
$smarty->assign("FormAction", $_SERVER['PHP_SELF']);
$smarty->assign("HospitalName", $HospitalName);
$smarty->assign("SubmittedBy", $SubmittedBy);
// 將數據傳遞給模板引擎
$smarty->assign("ErrorMessage", $ErrorMessage);


$smarty->display('update_status.tpl');



?>