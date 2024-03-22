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
$result = $resultbydate = $StartDate = $EndDate = $DueDate = $HospitalList = $ReportTypeList = $HospitalListName = $ReportTypeName = $Approved1Name ='';
$result1 = $resultID = $resultIDString = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate'];
    $HospitalList = $_POST['HospitalList'];
    $ReportTypeList = $_POST['ReportTypeList'];
    $Approved1 = $_POST['Approved1'];
    $conn = $conn->connect();
    if ($HospitalList == '') {
        $HospitalList = '';
        $HospitalListName = '';
    } else {
        $HospitalList = $_POST['HospitalList'];
        $stmt = $conn->prepare("SELECT Name FROM HospitalList WHERE id = :id");
        $stmt->bindValue(":id", $HospitalList);
        $stmt->execute();
        $HospitalListName = $stmt->fetchColumn();
    }

    if ($ReportTypeList == '') {
        $ReportTypeList = '';
        $ReportTypeName = '';
    } else {
        $ReportTypeList = $_POST['ReportTypeList'];
        $stmt = $conn->prepare("SELECT Name FROM ReportType WHERE id = :id");
        $stmt->bindValue(":id", $ReportTypeList);
        $stmt->execute();
        $ReportTypeName = $stmt->fetchColumn();
    }

    //簽核醫檢師
    if ($Approved1 == '') {
        $Approved1 = '';
        $Approved1Name = '';
    } else {
        $Approved1 = $_POST['Approved1'];
        $stmt = $conn->prepare("SELECT username FROM users WHERE id = :id");
        $stmt->bindValue(":id", $Approved1);
        $stmt->execute();
        $Approved1Name = $stmt->fetchColumn();
    }







    if ($StartDate != '' && $EndDate != '') {
        if ($ReportTypeList != '' && $HospitalList != '' && $Approved1 != '') {
            $SearchListbydate = $Searchinfo->AllListbydate($HospitalList, $ReportTypeList, $StartDate, $EndDate, $Approved1);
            $result = $SearchListbydate[0]['count(*)'];
            $SearchListbydate1 = $Searchinfo->SearchAllListDisplay($HospitalList, $ReportTypeList, $StartDate, $EndDate, $Approved1);
            foreach ($SearchListbydate1 as $key => $value) {
                $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
            }
            $smarty->assign('SearchListbydate', $SearchListbydate);
        } elseif ($ReportTypeList != '' && $HospitalList == '' && $Approved1 != '') {
            $SearchListbydate = $Searchinfo->ReportListbydate($ReportTypeList, $StartDate, $EndDate, $Approved1);
            $result = $SearchListbydate[0]['count(*)'];
            $SearchListbydate1 = $Searchinfo->SearchReportListDisplay($ReportTypeList, $StartDate, $EndDate, $Approved1);
            foreach ($SearchListbydate1 as $key => $value) {
                $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
            }
            $smarty->assign('SearchListbydate', $SearchListbydate);
        } elseif ($ReportTypeList == '' && $HospitalList != '' && $Approved1 != '') {
            $SearchListbydate = $Searchinfo->HospitalListbydate($HospitalList, $StartDate, $EndDate, $Approved1);
            $result = $SearchListbydate[0]['count(*)'];
            $SearchListbydate1 = $Searchinfo->SearchHospitalListDisplay($HospitalList, $StartDate, $EndDate, $Approved1);
            foreach ($SearchListbydate1 as $key => $value) {
                $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
            }
            $smarty->assign('SearchListbydate', $SearchListbydate);
        } elseif ($ReportTypeList == '' && $HospitalList == '' && $Approved1 != '') {
            $SearchListbydate = $Searchinfo->Listbydate($StartDate, $EndDate, $Approved1);
            $result = $SearchListbydate[0]['count(*)'];
            $SearchListbydate1 = $Searchinfo->ListDisplay($StartDate, $EndDate, $Approved1);
            foreach ($SearchListbydate1 as $key => $value) {
                $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
            }
            $smarty->assign('SearchListbydate', $SearchListbydate);
        } elseif ($ReportTypeList != '' && $HospitalList != '' && $Approved1 == '') {
            $SearchListbydate = $Searchinfo->AllListbydate1($HospitalList, $ReportTypeList, $StartDate, $EndDate);
            $result = $SearchListbydate[0]['count(*)'];
            $SearchListbydate1 = $Searchinfo->SearchAllListDisplay1($HospitalList, $ReportTypeList, $StartDate, $EndDate);
            foreach ($SearchListbydate1 as $key => $value) {
                $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
            }
            $smarty->assign('SearchListbydate', $SearchListbydate);
        } elseif ($ReportTypeList != '' && $HospitalList == '' && $Approved1 == '') {
            $SearchListbydate = $Searchinfo->Listbydate1($StartDate, $EndDate , $ReportTypeList);
            $result = $SearchListbydate[0]['count(*)'];
            $SearchListbydate1 = $Searchinfo->ListDisplay1($StartDate, $EndDate, $ReportTypeList);
            foreach ($SearchListbydate1 as $key => $value) {
                $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
            }
            $smarty->assign('SearchListbydate', $SearchListbydate);
        } elseif ($ReportTypeList == '' && $HospitalList != '' && $Approved1 == '') {
            $SearchListbydate = $Searchinfo->Listbydate2($StartDate, $EndDate , $HospitalList);
            $result = $SearchListbydate[0]['count(*)'];
            $SearchListbydate1 = $Searchinfo->ListDisplay2($StartDate, $EndDate, $HospitalList);
            foreach ($SearchListbydate1 as $key => $value) {
                $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
            }
            $smarty->assign('SearchListbydate', $SearchListbydate);
        } elseif ($ReportTypeList == '' && $HospitalList == '' && $Approved1 == '') {
            $SearchListbydate = $Searchinfo->Listbydatenone($StartDate, $EndDate);
            // $result = $SearchListbydate[0]['count(*)'];
            $result = isset($SearchListbydate[0]['count(*)']) ? $SearchListbydate[0]['count(*)'] : 0;
            $SearchListbydate1 = $Searchinfo->ListDisplaynone($StartDate, $EndDate);
            foreach ($SearchListbydate1 as $key => $value) {
                $result1[] = array('id' => $value['id'], 'ReportID' => $value['ReportID']);
            }
            $smarty->assign('SearchListbydate', $SearchListbydate);
        }
    }


    
}

$smarty->assign("HospitalList", $report->ReportInfo('HospitalList'), true);
$smarty->assign("ReportTypeList", $ReportTypeList, true);
$smarty->assign("Approved1", $report->ReportInfo('Approved1'), true);

$List = $report->getHospitalList();
$ReportList = $report->getReportTypeList();
$Approved1 = $report->getUserList();

$HospitalList = $report->ReportInfo('HospitalList');
$Approved_User = $report->ReportInfo('Approved1');

$smarty->assign('result', $result);
$smarty->assign('result1', $result1);
$smarty->assign('resultID', $resultID);

$smarty->assign('HospitalListOptions', $List, true);
$smarty->assign('HospitalListSelect', $HospitalList, true);
$smarty->assign('HospitalListName', $HospitalListName, true);


$smarty->assign('ReportListOptions', $ReportList, true);
$smarty->assign('ReportListSelect', $ReportTypeList, true);
$smarty->assign('ReportTypeName', $ReportTypeName, true);

$smarty->assign('ApprovedOptions', $Approved1, true);
$smarty->assign('ApprovedSelect', $Approved_User, true);
$smarty->assign('Approved1Name', $Approved1Name, true);

$smarty->assign('StartDate', $StartDate);
$smarty->assign('EndDate', $EndDate);

$smarty->assign("StatisticsPage", "search.tpl");
$smarty->display('ViewStatistics.tpl');
