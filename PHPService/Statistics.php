<?php

session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if ($_SESSION["AUTH"] != true) {
    header("Location: index.php");
    session_unset();
    die();
}

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/class/DBConnect.php";
require __DIR__ . "/class/Log.php";
require __DIR__ . "/class/Report.php";
require __DIR__ . "/class/Searchinfo.php";

$log = new Log();
$report = new Report($_POST);
$conn = new DBConnect();
$smarty = new Smarty();
$Searchinfo = new Searchinfo();
//get search.tpl data
$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $selectedHospital = $_POST['List'];
    $HospitalList = $_POST['HospitalList'];

    $Statistics = $Searchinfo->SearchList($HospitalList);
    $result = $Statistics[0]['count(*)'];
    $smarty->assign('Statistics', $Statistics);
}

$smarty->assign("HospitalList", $report->ReportInfo('HospitalList'), true);
$List = $report->getHospitalList();
$HospitalList = $report->ReportInfo('HospitalList');
$smarty->assign('result', $result);
$smarty->assign('HospitalListOptions', $List, true);
$smarty->assign('HospitalListSelect', $HospitalList, true);

$smarty->assign('HospitalListSelect', $HospitalList, true);


$smarty->assign("StatisticsPage", "search.tpl");
$smarty->display('ViewStatistics.tpl');
