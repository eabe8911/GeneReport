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
$result = $resultbydate = $StartDate = $EndDate = $result_DueDate = $DueDate = $HospitalList = $ReportTypeList = '';
$result1 = $result2 = $resultID = $resultIDString = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate'];
    $HospitalList = $_POST['HospitalList'];
    $ReportTypeList = $_POST['ReportTypeList'];

    if ($HospitalList == '') {
        $HospitalList = '';
    } else {
        $HospitalList = $_POST['HospitalList'];
    }

    if ($ReportTypeList == '') {
        $ReportTypeList = '';
    } else {
        $ReportTypeList = $_POST['ReportTypeList'];
    }

    $Statistics = $Searchinfo->SearchList($HospitalList);
    $TypeList = $Searchinfo->ReportTypeList($ReportTypeList);

    if ($StartDate != '' && $EndDate != '' && $ReportTypeList != '' && $HospitalList != '') {
        $SearchListbydate = $Searchinfo->AllListbydate($HospitalList, $ReportTypeList, $StartDate, $EndDate);
        $result = $SearchListbydate[0]['count(*)'];
        $SearchListbydate1 = $Searchinfo->SearchAllListDisplay($HospitalList, $ReportTypeList, $StartDate, $EndDate);
        foreach ($SearchListbydate1 as $key => $value) {
            $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
        }
        $smarty->assign('SearchListbydate', $SearchListbydate);
    } elseif ($StartDate != '' && $EndDate != '' && $ReportTypeList != '' && $HospitalList == '') {
        $SearchListbydate = $Searchinfo->ReportListbydate($ReportTypeList, $StartDate, $EndDate);
        $result = $SearchListbydate[0]['count(*)'];
        $SearchListbydate1 = $Searchinfo->SearchReportListDisplay($ReportTypeList, $StartDate, $EndDate);
        foreach ($SearchListbydate1 as $key => $value) {
            $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
        }
        $smarty->assign('SearchListbydate', $SearchListbydate);
    } elseif ($StartDate != '' && $EndDate != '' && $ReportTypeList == '' && $HospitalList != '') {
        $SearchListbydate = $Searchinfo->HospitalListbydate($HospitalList, $StartDate, $EndDate);
        $result = $SearchListbydate[0]['count(*)'];
        $SearchListbydate1 = $Searchinfo->SearchHospitalListDisplay($HospitalList, $StartDate, $EndDate);
        foreach ($SearchListbydate1 as $key => $value) {
            $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
        }
        $smarty->assign('SearchListbydate', $SearchListbydate);
    } elseif ($StartDate != '' && $EndDate != '' && $ReportTypeList == '' && $HospitalList == '') {
        $SearchListbydate = $Searchinfo->Listbydate($StartDate, $EndDate);
        $result = $SearchListbydate[0]['count(*)'];
        $SearchListbydate1 = $Searchinfo->ListDisplay($StartDate, $EndDate);
        foreach ($SearchListbydate1 as $key => $value) {
            $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
        }
        $smarty->assign('SearchListbydate', $SearchListbydate);
    }

    $smarty->assign('Statistics', $Statistics);
    $smarty->assign('TypeList', $TypeList);
}

$smarty->assign("HospitalList", $report->ReportInfo('HospitalList'), true);
$List = $report->getHospitalList();
$HospitalList = $report->ReportInfo('HospitalList');
$smarty->assign("ReportTypeList", $report->ReportInfo('ReportTypeList'), true);
$ReportList = $report->getReportTypeList();
$ReportTypeList = $report->ReportInfo('ReportTypeList');
$smarty->assign('result', $result);
$smarty->assign('result_DueDate', $result_DueDate);
$smarty->assign('result1', $result1);
$smarty->assign('result2', $result2);
$smarty->assign('resultID', $resultID);
$smarty->assign('HospitalListOptions', $List, true);
$smarty->assign('HospitalListSelect', $HospitalList, true);
$smarty->assign('ReportListOptions', $ReportList, true);
$smarty->assign('ReportListSelect', $ReportTypeList, true);
$smarty->assign('StartDate', $StartDate);
$smarty->assign('EndDate', $EndDate);
$smarty->assign("StatisticsPage", "search.tpl");
$smarty->display('ViewStatistics.tpl');
