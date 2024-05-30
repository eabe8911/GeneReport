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
$ErrorMessage  = $SuccessMessage = $Message = '';
$Account = $Password = $Permission = '';
$UserMode = $AppointMode = '';
try{
    //檢查是否第二次進入
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["FormName"] == "Permission") {
        $Account = filter_input(INPUT_POST, "Account");
        $Permission = filter_input(INPUT_POST, "Permission");
        $character = new Character();
        if ($character->Permission($Account, $Permission)) {
            $Message = "權限更改成功，請使用者重新登入！";
            $ErrorMessage = "";
            $log->SaveLog("Permission", $Account, "Permission", date("Y-m-d H:i:s"),  "已變更權限, 權限為: $Permission");
            // header("Location: home.php");
            //顯示 $Message 訊息



        } else {
            $ErrorMessage = "權限更改失敗!";
            $log->SaveLog("ERROR", $Account, "Permission", date("Y-m-d H:i:s"), $ErrorMessage);
        }
    } else {
        // Unset all of the session variables
        $_SESSION = array();
    }
} catch (Exception $e) {
    // Handle exception
    $ErrorMessage = "更改權限時出現錯誤: " . $e->getMessage();
    $log->SaveLog("ERROR", $Account, "Permission", date("Y-m-d H:i:s"), $ErrorMessage);

}


$smarty = new Smarty;

/**ChangePassword**/
$smarty->assign("Logo", $Logo);
$smarty->assign("LogoName", $LogoName);
$smarty->assign("FormAction", $_SERVER['PHP_SELF']);
$smarty->assign("Hiddenfield", "<input type='hidden' id='FormName' name='FormName' value='Permission'>");
// set form fields value
$smarty->assign("Account", $Account);
$smarty->assign("Permission", $Permission);
 //顯示 $Message 訊息
$smarty->assign("Message", $Message);
// Error Message
$smarty->assign("ErrorMessage", $ErrorMessage);

if ($ErrorMessage == '') {
    $smarty->assign("ShowErrorMessage", 'hidden');
} else {
    $smarty->assign("ShowErrorMessage", '');
}

if ($SuccessMessage == '') {
    $smarty->assign("ShowSuccessMessage", 'hidden');
} else {
    $smarty->assign("ShowSuccessMessage", '');
}

$smarty->display('permission.tpl');