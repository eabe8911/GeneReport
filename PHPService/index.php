<?php
/**
 * 功能名稱 : 帳號密碼驗證
 * 建立日期 : 2020/05/13 15:44:48
 * 建立人員 : Max Cheng
 * 修改日期 :
 * 修改人員 : Tina Xue
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
$UserMode = $AppointMode = '';
try {
    //檢查是否第二次進入
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["FormName"] == "Login") {
        $Account = filter_input(INPUT_POST, "Account");
        $Password = filter_input(INPUT_POST, "Password");
        // 先檢查 member 再檢查 user
        $character = new Character();
        if ($character->Login($Account, $Password)) {
            //登入成功，先記錄登入資料
            $log->SaveLogin($_SESSION['DisplayName']);
            $ErrorMessage = "";
            header("Location: home.php");
        } else {
            //沒有登入成功
            // Unset all of the session variables
            $_SESSION = array();
            $ErrorMessage = "帳號或是密碼錯誤!";
            $log->SaveLog("ERROR", $Username, "Login", date("Y-m-d H:i:s"), $ErrorMessage);
        }
    } else {
            // Unset all of the session variables
            $_SESSION = array();
    }
} catch (PDOException | Exception $e) {
    $ErrorMessage = "帳號或是密碼錯誤！請重新輸入";
    // echo ($ErrorMessage . $e->getMessage());
    // $log->SaveLog("ERROR",$Username, "Login", date("Y-m-d H:i:s"), $ErrorMessage);
}

$smarty = new Smarty;

/**LOGIN**/
$smarty->assign("Logo", $Logo);
$smarty->assign("LogoName", $LogoName);
$smarty->assign("FormAction", $_SERVER['PHP_SELF']);
$smarty->assign("Hiddenfield", "<input type='hidden' id='FormName' name='FormName' value='Login'>");
// set form fields value
$smarty->assign("Account", "");
$smarty->assign("Password", "");
// Error Message
$smarty->assign("ErrorMessage", $ErrorMessage);
if ($ErrorMessage == '') {
    $smarty->assign("ShowErrorMessage", 'hidden');
} else {
    $smarty->assign("ShowErrorMessage", '');
}

$smarty->display('index.tpl');