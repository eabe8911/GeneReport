
<?php
// Enable Xdebug
if (extension_loaded('xdebug')) {
    ini_set('xdebug.remote_enable', 1);
    ini_set('xdebug.remote_autostart', 1);
}

require_once __DIR__ . "/DBConnect.php";
$result = '';
class Searchinfo
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

    public function SearchList($HospitalList)
    {

        $sql = "SELECT count(*) FROM Report WHERE HospitalList = :HospitalList;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":HospitalList", $HospitalList);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function ReportTypeList($ReportTypeList)
    {
        $sql = "SELECT count(*) FROM Report WHERE ReportType = :ReportType;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ReportType", $ReportTypeList);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function SearchAllListDisplay($HospitalList, $ReportType, $StartDate, $EndDate, $Approved1)
    {
        $sql = "SELECT * FROM Report WHERE HospitalList = :HospitalList  AND ReportType = :ReportType AND Approved1 = :Approved1 AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":HospitalList", $HospitalList);
        $stmt->bindValue(":ReportType", $ReportType);
        $stmt->bindValue(":Approved1", $Approved1);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
    }

    public function SearchAllListDisplay1($HospitalList, $ReportType, $StartDate, $EndDate)
    {
        $sql = "SELECT * FROM Report WHERE HospitalList = :HospitalList  AND ReportType = :ReportType AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":HospitalList", $HospitalList);
        $stmt->bindValue(":ReportType", $ReportType);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
    }

    public function SearchReportListDisplay($ReportType, $StartDate, $EndDate, $Approved1)
    {
        $sql = "SELECT * FROM Report WHERE  ReportType = :ReportType AND Approved1 = :Approved1 AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ReportType", $ReportType);
        $stmt->bindValue(":Approved1", $Approved1);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
    }

    public function SearchHospitalListDisplay($HospitalList, $StartDate, $EndDate, $Approved1)
    {
        $sql = "SELECT * FROM Report WHERE  HospitalList = :HospitalList AND Approved1 = :Approved1 AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":HospitalList", $HospitalList);
        $stmt->bindValue(":Approved1", $Approved1);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
    }
    public function ListDisplay($StartDate, $EndDate, $Approved1)
    {
        $sql = "SELECT * FROM Report WHERE Approved1 = :Approved1 AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":Approved1", $Approved1);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
    }

    public function ListDisplay1($StartDate, $EndDate, $ReportTypeList)
    {
        $sql = "SELECT * FROM Report WHERE ReportTypeList = :ReportTypeList AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ReportTypeList", $ReportTypeList);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
    }

    public function ListDisplay2($StartDate, $EndDate, $HospitalList)
    {
        $sql = "SELECT * FROM Report WHERE HospitalList = :HospitalList AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":HospitalList", $HospitalList);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
    }

    public function ListDisplaynone($StartDate, $EndDate)
    {
        $sql = "SELECT * FROM Report WHERE rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
    }
    

    public function ReportTypeListDisplay($ReportTypeList, $StartDate, $EndDate)
    {
        $sql = "SELECT * FROM Report WHERE ReportType = :ReportType AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ReportType", $ReportTypeList);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result1;
    }

    public function SearchListbydate($HospitalList, $StartDate, $EndDate)
    {
        $sql = "SELECT count(*) FROM Report WHERE HospitalList = :HospitalList AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":HospitalList", $HospitalList);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function AllListbydate($HospitalList, $ReportType, $StartDate, $EndDate, $Approved1) 
    {
        $sql = "SELECT count(*) FROM Report WHERE HospitalList=:HospitalList AND ReportType = :ReportType AND Approved1 = :Approved1 AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":HospitalList", $HospitalList);
        $stmt->bindValue(":ReportType", $ReportType);
        $stmt->bindValue(":Approved1", $Approved1);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function AllListbydate1($HospitalList, $ReportType, $StartDate, $EndDate) 
    {
        $sql = "SELECT count(*) FROM Report WHERE HospitalList=:HospitalList AND ReportType = :ReportType AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":HospitalList", $HospitalList);
        $stmt->bindValue(":ReportType", $ReportType);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function ReportListbydate($ReportType, $StartDate, $EndDate, $Approved1)
    {
        $sql = "SELECT count(*) FROM Report WHERE ReportType = :ReportType AND Approved1 = :Approved1 AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ReportType", $ReportType);
        $stmt->bindValue(":Approved1", $Approved1);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function HospitalListbydate($HospitalList, $StartDate, $EndDate, $Approved1)
    {
        $sql = "SELECT count(*) FROM Report WHERE HospitalList = :HospitalList AND Approved1 = :Approved1 AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":HospitalList", $HospitalList);
        $stmt->bindValue(":Approved1", $Approved1);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function Listbydate($StartDate, $EndDate, $Approved1)
    {
        $sql = "SELECT count(*) FROM Report WHERE Approved1 = :Approved1 AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":Approved1", $Approved1);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function Listbydate1($StartDate, $EndDate, $ReportTypeList)
    {
        $sql = "SELECT count(*) FROM Report WHERE ReportTypeList = :ReportTypeList AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":ReportTypeList", $ReportTypeList);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function Listbydate2($StartDate, $EndDate, $HospitalList)
    {
        $sql = "SELECT count(*) FROM Report WHERE HospitalList = :HospitalList AND rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":HospitalList", $HospitalList);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    public function Listbydatenone($StartDate, $EndDate)
    {
        $sql = "SELECT * FROM Report WHERE rcdate >= :StartDate AND rcdate <= :EndDate;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":StartDate", $StartDate);
        $stmt->bindValue(":EndDate", $EndDate);
        $stmt->execute();
        $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result2;
    }



    public function __destruct()
    {

    }
}
?>