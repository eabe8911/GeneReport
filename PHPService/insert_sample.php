<?php
ob_start();
if (extension_loaded('xdebug')) {
    ini_set('xdebug.remote_enable', 1);
    ini_set('xdebug.remote_autostart', 1);
}
xdebug_break();

sessiom_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require __DIR__ . "/vendor/autoload.php";

if (empty($_SESSION["AUTH"]) || $_SESSION["AUTH"] != true) {
    header("Location: index.php");
    session_unset();
    die();
}

require_once __DIR__ . "/class/Report.php";
require_once __DIR__ . "/class/Log.php";
require_once __DIR__ . "/SendNotificationToTeams.php";

$smarty = new Smarty();
$report = new Report();
$log = new Log();

$Account = $_SESSION["Account"];
$DisplayName = $_SESSION["DisplayName"];
$Permission = $_SESSION["Permission"];
$FormName = filter_input(INPUT_POST, 'FormName');








// display
$smarty->display("Addsample.tpl");


?>