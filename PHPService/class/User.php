<?php
/**
 * User class for PromoMailer project
 * @author Max Cheng
 * @version 2023-04-10
 */
require_once __DIR__ . "/DBConnect.php";

class User
{
    private $_conn;
    private $_errorMessage;
    private $_Message;
    private $_UserInfo;

    public function __construct()
    {
        try {
            $objDb = new DBConnect;
            $this->_conn = $objDb->connect();
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }

    /**
     * Login
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function Login($username, $password): bool
    {
        try {
            $sql = "SELECT * FROM users WHERE username=:username AND password=:password";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($response) {
                $this->_UserInfo = $response;
            } else {
                return false;
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    public function getUserInfo()
    {
        return $this->_UserInfo;
    }
    public function getErrorMessage()
    {
        return $this->getErrorMessage();
    }

    //change password
    public function ChangePassword($username, $OldPassword, $NewPassword) {
        try {
            $sql = "UPDATE users SET password=:password WHERE username=:username";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':password', $NewPassword);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $sql1 = "SELECT * FROM users WHERE username=:username ";
            $stmt1 = $this->_conn->prepare($sql1);
            $stmt1->bindParam(':username', $username);
            $stmt1->execute();
            $response = $stmt1->fetch(PDO::FETCH_ASSOC);
            if ($response) {
                $this->_UserInfo = $response;
            } else {
                return false;
            }

        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }

    //change Permission
    public function Permission($Account, $Permission)
    {
        try {
            $sql = "UPDATE users SET permission=:permission WHERE username=:username";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':permission', $Permission);
            $stmt->bindParam(':username', $Account);
            $stmt->execute();
            

        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        
            }
        return true;
    }

    //CheckUser
    public function CheckUser($Account)
    {
        try {
            $sql = "SELECT * FROM users WHERE username=:username";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':username', $Account);
            $stmt->execute();
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($response) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }


    //AddUser
    public function AddUser($Account, $Permission)
    {
        try {
            $password = "1234";

            switch ($Permission) {
                case '1':
                    $cname = "生資人員";
                    break;
                case '21':
                    $cname = "ISO簽核醫檢師";
                    break;
                case '22':  
                    $cname = "LDTS簽核醫師";
                    break;
                case '3':
                    $cname = "醫師";
                    break;
                case '4':
                    $cname = "實驗室專人";
                    break;
                case '5':
                    $cname = "收檢人員";
                    break;
                case '6':
                    $cname = "監控查核";
                    break;
                
                default:
                    $cname = "";
                    break;
            }


            $sql = "INSERT INTO users (username, password, permission, cname) VALUES (:username, :password, :permission, :cname)";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':username', $Account);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':permission', $Permission);
            $stmt->bindParam(':cname', $cname);
            $stmt->execute();
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), (int)$th->getCode());
                }
        return true;
    }
}
?>