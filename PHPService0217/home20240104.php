<?php
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
$smarty->assign("ImportReport", "ReportImportData.php");
// JQGRID TABLE
$smarty->assign("Search", "SearchTable");
$smarty->assign("jqGrid", "jqGrid");
$smarty->assign("jqGridPager", "jqGridPager");
/**PAGES***/
$smarty->display('home.tpl');

?>