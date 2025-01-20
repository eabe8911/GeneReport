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


//無重複的醫院名稱

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['HospitalName']) && !empty($_POST['HospitalName'])) {
        $HospitalName = $_POST['HospitalName'];
    } else {
        $ErrorMessage = "醫院名稱不可為空";
    }

    try {
        $report->InsertHospital($HospitalName, $SubmittedBy);
        $log->SaveLog("InsertHospital", $Account, "InsertHospital", date("Y-m-d H:i:s"), "新增醫院");
        echo "<script>alert('送檢單位提交成功，待實驗室主管審核'); window.location.href='home.php';</script>";
    } catch (Exception $e) {
        $ErrorMessage = "新增醫院時出現錯誤: " . $e->getMessage();
        $log->SaveLog("ERROR", $Account, "InsertHospital", date("Y-m-d H:i:s"), $ErrorMessage);
    }
}

$smarty = new Smarty;
$smarty->assign("Logo", $Logo);
$smarty->assign("LogoName", $LogoName);
$smarty->assign("FormAction", $_SERVER['PHP_SELF']);
$smarty->assign("HospitalName", $HospitalName);
$smarty->assign("SubmittedBy", $SubmittedBy);

$smarty->display('insert_hospital.tpl');



?>
