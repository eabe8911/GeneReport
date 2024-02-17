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

// JQGRID TABLE
$smarty->assign("Search", "SearchTable", true);
$smarty->assign("SearchStatus", "SearchStatus", true);
$smarty->assign("jqGrid", "jqGrid", true);
$smarty->assign("jqGridPager", "jqGridPager", true);
$smarty->assign("jqGrid_Log", "jqGrid_Log", true);
$smarty->assign("jqGridPager_Log", "jqGridPager_Log", true);

/**PAGES***/
$smarty->display('home.tpl');

?>