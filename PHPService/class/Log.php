<?php
// Enable Xdebug
if (extension_loaded('xdebug')) {
    ini_set('xdebug.remote_enable', 1);
    ini_set('xdebug.remote_autostart', 1);
}

// Set a breakpoint
xdebug_break();
date_default_timezone_set("Asia/Taipei");

require_once __DIR__ . "/DBConnect.php";

class Log
{
    private $conn;
    private $_errorMessage;

    public function __construct()
    {
        try {
            $objDb = new DBConnect;
            $this->conn = $objDb->connect();
        } catch (PDOException $e) {
            $this->_errorMessage = $e->getMessage();
            $this->__destruct();
        }
    }

    function __destruct()
    {
        // TODO: nothing to do.
    }
    /**
     * Summary of SaveLogin
     * @param mixed $Username
     * @return bool
     */
    public function SaveLogin($Username = ''): bool
    {
        try {
            $sql = "INSERT INTO TerminalLogin
                (UserName,Trans_DT)
                VALUES 
                (:UserName, :Trans_DT)";
            $sth = $this->conn->prepare($sql);
            $sth->bindValue(":UserName", $Username);
            $sth->bindValue(":Trans_DT", date('Y-m-d H:i:s'));
            $sth->execute();
        } catch (PDOException $e) {
            $this->SaveLog("Error", "Save Login", $Username);
        }
        return true;
    }

    public function SaveLog($status = 'no status', $Username='' , $method = 'no method', $where = 'unknow func', $data = 'no data'): bool
    {
        try {
            // $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //prepare sql and bind parameters
            $sql = "INSERT INTO Log
                (status, user, command, organization, transaction, json)
                VALUES 
                (:status, :user, :command, :organization, :transaction, :json) ";
            $sth = $this->conn->prepare($sql);
            $sth->bindValue(":status", $status);
            $sth->bindValue(":user", $Username);
            $sth->bindValue(":command", $method);
            $sth->bindValue(":organization", $where);
            $sth->bindValue(":transaction", date('Y-m-d H:i:s'));
            $sth->bindValue(":json", $data);
            !$sth->execute();
        } catch (PDOException $e) {
            echo ($e);
            // TODO: need add save log to file
        }
        return true;
    }

    //get log data
    public function getLogData()
    {
        try {
            $sql = "SELECT * FROM Log ORDER BY ID DESC;";
            $sth = $this->conn->prepare($sql);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            $this->SaveLog("Error", "getLogData", $e->getMessage());
        }
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->_errorMessage;
    }

}