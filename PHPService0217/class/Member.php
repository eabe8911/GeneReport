<?php

require_once __DIR__ . "/DBConnect.php";

class Member
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
            $sql = "SELECT * FROM Members WHERE Email=:Email AND Password=:Password";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':Email', $username);
            $stmt->bindParam(':Password', $password);
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
    public function ChangePassword($Account, $OldPassword, $NewPassword) {
        try{
            $sql = "UPDATE Members SET Password=:Password WHERE Email=:Email";
            $stmt =$this->_conn->prepare($sql);
            $stmt->bindParam(':Password', $NewPassword);
            $stmt->bindParam(':Email', $Account);

            $stmt->execute();
            $sql1 = "SELECT * FROM Members WHERE Email=:Email ";
            $stmt1 = $this->_conn->prepare($sql1);
            $stmt1->bindParam(':Email', $Account);
            $stmt1->execute();
            $response = $stmt1->fetch(PDO::FETCH_ASSOC);
            if ($response) {
               return true;
            } else {
                return false;
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }
}
?>