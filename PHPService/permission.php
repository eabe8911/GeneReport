<?php
/**
 * 功能名稱 : 帳號權限新增
 * 建立日期 : 2024/05/24 
 * 建立人員 : Tina Xue
 * 修改日期 :
 */
session_start();
// autoload
require __DIR__ . "/vendor/autoload.php";

require_once __DIR__ . "/class/Log.php";
require_once __DIR__ . '/class/Character.php';
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$Logo = "<img src='./images/Libobio-Logo@2x.png' alt='LiboBio Logo' height='70'>";
$LogoName = "";
$log = new Log();
$ErrorMessage = '';
$Account = $Password = '';
$OldPassword = $NewPassword = '';
$UserMode = $AppointMode = '';
// try {
//     //檢查是否第二次進入
//     if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["FormName"] == "ChangePassword") {
//         $Account = filter_input(INPUT_POST, "Account");
//         $OldPassword = filter_input(INPUT_POST, "OldPassword");
//         $NewPassword = filter_input(INPUT_POST, "NewPassword");
//         // 先檢查 member 再檢查 user
//         $character = new Character();
//         // if ($character->Login($Account, $OldPassword)) {
//         // Old password is correct, change to new password
//         if ($character->ChangePassword($Account, $OldPassword, $NewPassword)) {
//             $ErrorMessage = "";
//             $log->SaveLog("changepw", $Account, "ChangePassword", date("Y-m-d H:i:s"),  "已變更密碼");

//             header("Location: home.php");
//         } else {
//             $ErrorMessage = "密碼更改失敗!";
//             $log->SaveLog("ERROR", $Account, "ChangePassword", date("Y-m-d H:i:s"), $ErrorMessage);
//         }
//         // } else {
//         //     $ErrorMessage = "舊密碼錯誤!";
//         //     $log->SaveLog("ERROR", $Account, "ChangePassword", date("Y-m-d H:i:s"), $ErrorMessage);
//         // }
//     } else {
//         // Unset all of the session variables
//         $_SESSION = array();
//     }
// } catch (Exception $e) {
//     // Handle exception
//     $ErrorMessage = "更改密碼時出現錯誤: " . $e->getMessage();
//     $log->SaveLog("ERROR", $Account, "ChangePassword", date("Y-m-d H:i:s"), $ErrorMessage);
// }

$smarty = new Smarty;

/**ChangePassword**/
$smarty->assign("Logo", $Logo);
$smarty->assign("LogoName", $LogoName);
$smarty->assign("FormAction", $_SERVER['PHP_SELF']);
$smarty->assign("Hiddenfield", "<input type='hidden' id='FormName' name='FormName' value='ChangePassword'>");
// set form fields value
$smarty->assign("Account", $Account);
$smarty->assign("OldPassword", $OldPassword);
$smarty->assign("NewPassword", $NewPassword);
// Error Message
$smarty->assign("ErrorMessage", $ErrorMessage);
if ($ErrorMessage == '') {
    $smarty->assign("ShowErrorMessage", 'hidden');
} else {
    $smarty->assign("ShowErrorMessage", '');
}

$smarty->display('permission.tpl');