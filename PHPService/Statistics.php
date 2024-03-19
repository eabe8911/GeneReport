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
$result = $resultbydate = $StartDate = $EndDate = $result_DueDate = $HospitalList = $DueDate = '';
$result1 = $result2 = $resultID = $resultIDString = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $selectedHospital = $_POST['List'];
    $HospitalList = $_POST['HospitalList'];
    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate'];
    $DueDate = $_POST['DueDate'];
    $Statistics = $Searchinfo->SearchList($HospitalList);
    $result = $Statistics[0]['count(*)'];
    if ($StartDate != '' && $EndDate != '') {
        $SearchListbydate = $Searchinfo->SearchListbydate($HospitalList, $StartDate, $EndDate);
        $result = $SearchListbydate[0]['count(*)'];
        $SearchListbydate1 = $Searchinfo->SearchListDisplay($HospitalList, $StartDate, $EndDate);
        // 取$SearchListbydate1 所有reportID
        foreach ($SearchListbydate1 as $key => $value) {
            // $resultID[] = $value['id'];
            // $result1[] = $value['ReportID'];
            $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
        }
        // echo "<pre>";
        // print_r($result1);
        // echo "</pre>";  
        $smarty->assign('SearchListbydate', $SearchListbydate);


    }
    if ($DueDate != '') {
        $SearchListbyDueDate = $Searchinfo->SearchListbyDueDate($HospitalList, $DueDate);
        $result_DueDate = $SearchListbyDueDate[0]['count(*)'];
        $SearchListbyDueDate1 = $Searchinfo->SearchListDisplaybyDueDate($HospitalList, $DueDate);
        // 取$SearchListbyDueDate 所有reportID
        foreach ($SearchListbyDueDate1 as $key => $value) {
            $result2[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
        }
        $smarty->assign('SearchListbyDueDate', $SearchListbyDueDate);

    }
    $smarty->assign('Statistics', $Statistics);
}

$smarty->assign("HospitalList", $report->ReportInfo('HospitalList'), true);
$List = $report->getHospitalList();
$HospitalList = $report->ReportInfo('HospitalList');

$smarty->assign('result', $result);
$smarty->assign('result_DueDate', $result_DueDate);
$smarty->assign('result1', $result1);
$smarty->assign('result2', $result2);

$smarty->assign('resultID', $resultID);

$smarty->assign('HospitalListOptions', $List, true);
$smarty->assign('HospitalListSelect', $HospitalList, true);


$smarty->assign('StartDate', $StartDate);
$smarty->assign('EndDate', $EndDate);
$smarty->assign('DueDate', $DueDate);

$smarty->assign("StatisticsPage", "search.tpl");
$smarty->display('ViewStatistics.tpl');
