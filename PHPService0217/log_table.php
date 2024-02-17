<?php

session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if ($_SESSION["AUTH"] != TRUE) {
    header("Location: index.php");
    session_unset();
    die();
}

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/class/Log.php";
require __DIR__ . "/class/Report.php";



$log = new Log();
$report = new Report($_POST);
$smarty = new Smarty();


$logdata = $log->getLogData();
$smarty->assign('logdata', $logdata);

foreach ($logdata as &$row) {
    $row['json'] = json_encode(json_decode($row['json']), JSON_PRETTY_PRINT);
}


$smarty->assign("IncludePage1", "log_table.tpl");
$smarty->display('ViewLog.tpl');


?>