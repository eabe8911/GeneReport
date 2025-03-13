<?php
// 檢查想要登入的人是Member還是User
require_once __DIR__ . "/Member.php";
require_once __DIR__ . "/User.php";

class Character
{
    public function Login($Account, $Password)
    {
        try {
            $user = new User();
            $member = new Member();
            if ($user->Login($Account, $Password)) {
                $UserData = $user->getUserInfo();
                $_SESSION['UserID'] = $UserData['id'];
                $_SESSION['DisplayName'] = $UserData['cname'];
                $_SESSION['Account'] = $UserData['username'];
                ;
                $_SESSION['AUTH'] = true;
                $_SESSION['Permission'] = $UserData['permission'];
                $_SESSION['tech'] = $UserData['tech_permission'];
                $_SESSION['Role'] = $UserData['role'];
                $_SESSION['Character'] = "User";
            } else if ($member->Login($Account, $Password)) {
                $UserData = $member->getUserInfo();
                //登入成功，先記錄登入資料
                // $this->log->SaveLogin($Account);
                $_SESSION['UserID'] = $UserData['UUID'];
                // $_SESSION['CustomerName'] = $UserData['CustomerName'];
                $_SESSION['Account'] = $UserData['Email'];
                $_SESSION['DisplayName'] = $UserData['CustomerName'];
                $_SESSION['AUTH'] = true;
                $_SESSION['Permission'] = '0';
                $_SESSION['Role'] = '0';
                $_SESSION['Character'] = "Member";
            } else {
                $ErrorMessage = "帳號或是密碼錯誤!";
                throw new Exception($ErrorMessage, 1);
            }
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode(), $th);
        }
        return true;
    }
    //ChangePassword
    public function ChangePassword($Account, $OldPassword, $NewPassword)
    {
        $user = new User();
        $member = new Member();
        if ($user->ChangePassword($Account, $OldPassword, $NewPassword)) {
            return true;
        } else if ($member->ChangePassword($Account, $OldPassword, $NewPassword)) {
            return true;
        } else {
            $ErrorMessage = "舊密碼錯誤!";
            throw new Exception($ErrorMessage, 1);
        }

    }
    //Permission
    public function Permission($Account, $Permission)
    {
        $user = new User();
        $member = new Member();
        //如果$Account不存在，新增一個帳號
        if (!$user->CheckUser($Account)) {
            $user->AddUser($Account, $Permission);
            $ErrorMessage = "新增成功，請重新登入！";
        }


        if ($user->Permission($Account, $Permission)) {
            //display success message
            $Message = "新增、修改權限成功，請使用者重新登入！";
            return $Message;
        } else if ($member->Permission($Account, $Permission)) {
            return true;
        } else {
            $ErrorMessage = "權限更改失敗!";
            throw new Exception($ErrorMessage, 1);
        }
    }
}