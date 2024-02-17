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
}
?>