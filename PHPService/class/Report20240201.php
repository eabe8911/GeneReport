<?php
/**
 * Report class for Customer Report project
 * @author Max Cheng
 * @version 2023-04-10
 */
date_default_timezone_set("Asia/Taipei");

require_once __DIR__ . "/DBConnect.php";
require_once __DIR__ . "/ReportInterface.php";
require_once __DIR__ . "/ReportSignature.php";

/**
 * Summary of Report
 */
class Report implements ReportInterface
{
    // private $_ReportID;
    // private $_ReportName;
    private $_conn;
    private $_errorMessage;
    private $_Message;
    private $_ReportInfo = [];
    private $_ReportInfoList = [];
    private $_PDFFile;

    public function __construct($data = [])
    {
        try {
            $objDb = new DBConnect;
            $this->_conn = $objDb->connect();

            $this->_ReportInfo = [
                'ID' => $data['ID'] ?? '',
                'ReportID' => $data['ReportID'] ?? '',
                'ReportName' => $data['ReportName'] ?? '',
                'ReportType' => $data['ReportType'] ?? '',
                // 'HospitalList' => $data['HospitalList'] ?? '',
                'TemplateID' => $data['TemplateID'] ?? '',
                'FileName' => $data['FileName'] ?? '',
                'HospitalList' => $data['HospitalList'] ?? '',
                'ReportStatus' => $data['ReportStatus'] ?? '',
                'CreatedAt' => $data['CreatedAt'] ?? '',
                'UpdatedAt' => $data['UpdatedAt'] ?? '',
                'Approved1' => $data['Approved1'] ?? '',
                'Approved1At' => $data['Approved1At'] ?? '',
                'Approved2' => $data['Approved2'] ?? '',
                'Approved2At' => $data['Approved2At'] ?? '',
                'DueDate' => $data['DueDate'] ?? '',
                'CustomerName' => $data['CustomerName'] ?? '',
                'CustomerEmail' => $data['CustomerEmail'] ?? '',
                'CustomerPhone' => $data['CustomerPhone'] ?? '',
                'ReportSendStatus' => $data['ReportSendStatus'] ?? '',
                'Editable' => $data['Editable'] ?? '',
                'RejectReason' => $data['RejectReason'] ?? '',
            ];
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }
    /**
     * Summary of ReportInfo
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function ReportInfo(string $key, $value = null)
    {
        // get the value
        if ($value === null) {
            return $this->_ReportInfo[$key] ?? null;
        }
        $this->_ReportInfo[$key] = $value;
    }

    /**
     * Summary of getReport
     * @param mixed $ID
     * @throws Exception
     * @return bool
     */
    public function getReport($ID)
    {
        try {
            $sql = "SELECT * FROM Report WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ID', $ID);
            $stmt->execute();
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($response) {
                $this->FillReportData($response);
                if (!empty($response['FileName']) && file_exists($response['FileName'])) {
                    $this->_PDFFile = file_get_contents($response['FileName']);
                }
            } else {
                return false;
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    // Get Report Type List
    public function getReportTypeList()
    {
        try {
            $sql = "SELECT id, Name FROM ReportType";
            $stmt = $this->_conn->prepare($sql);
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
            if ($response) {
                return $response;
            } else {
                return false;
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }

    //Get Hospital List
    public function getHospitalList()
    {
        try {
            $sql = "SELECT id, Name FROM HospitalList";
            $stmt = $this->_conn->prepare($sql);
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
            if ($response) {
                return $response;
            } else {
                return false;
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }



    // Get Template List
    public function getTemplateList()
    {
        try {
            $sql = "SELECT id, Name FROM Template";
            $stmt = $this->_conn->prepare($sql);
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
            if ($response) {
                return $response;
            } else {
                return false;
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }

    // Get PDF file from server
    public function GetPDFFile($FileName)
    {
        try {
            //read file from FileName
            return file_get_contents($FileName);
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }

    /**
     * Summary of FillReportData
     * @param mixed $data
     * @return void
     */
    private function FillReportData($data)
    {
        foreach ($data as $key => $value) {
            $this->_ReportInfo[$key] = $data[$key];
        }
    }
    public function uploadFile($ID, $FileName, $PDFFile)
    {
        try {
            $sql = "UPDATE Report SET FileName=:FileName WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ID', $ID);
            $stmt->bindParam(':FileName', $FileName);
            $stmt->execute();
            // Save PDF file to server
            $this->_PDFFile = $PDFFile;
            file_put_contents($FileName, $PDFFile);
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    public function AddReport($ReportInfo)
    {
        try {
            // check if ID exists don't add
            if ($this->_CheckReport($ReportInfo['ReportID'])) {
                throw new Exception("此報告編號已存在", 1);
            }
            // check if file exists
            if (empty($ReportInfo['FileName'])) { // if no file uploaded
                $ReportStatus = '0';
            } else {
                $ReportStatus = '1';
            }
            $now = date("Y-m-d H:i:s");
            $sql = "INSERT INTO Report (
                ReportID, ReportName, FileName, ReportType, TemplateID, HospitalList, ReportStatus,
                CreatedAt, CustomerName, CustomerEmail, CustomerPhone, DueDate
                ) VALUES (
                :ReportID, :ReportName, :FileName, :ReportType, :TemplateID, :HospitalList, :ReportStatus,
                :CreatedAt, :CustomerName, :CustomerEmail, :CustomerPhone, :DueDate
                )";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ReportID', $ReportInfo['ReportID']);
            $stmt->bindParam(':ReportName', $ReportInfo['ReportName']);
            //如果沒有上傳檔案，就不要寫入檔案名稱
            if (empty($ReportInfo['FileName'])) {
                $stmt->bindValue(':FileName', '');
            } else {
                $stmt->bindValue(':FileName', $ReportInfo['ReportID'] . '.pdf');
            }
            // $stmt->bindValue(':FileName', $ReportInfo['ReportID'] . '.pdf');
            //ReportType 只取第一個數字
            $ReportInfo['ReportType'] = substr($ReportInfo['ReportType'], 0, 1);
            $stmt->bindParam(':ReportType', $ReportInfo['ReportType']);

            $stmt->bindParam(':TemplateID', $ReportInfo['TemplateID']);
            $stmt->bindParam(':HospitalList', $ReportInfo['HospitalList'], 0, 1);
            $stmt->bindParam(':ReportStatus', $ReportStatus);
            $stmt->bindParam(':CreatedAt', $now);
            $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
            $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
            $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
            $stmt->bindParam(':DueDate', $ReportInfo['DueDate']);
            $stmt->execute();
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    public function UpdateReportFileName($ID, $FileName)
    {
        try {
            $sql = "UPDATE Report SET FileName=:FileName, RejectReason='' WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ID', $ID);
            $stmt->bindParam(':FileName', $FileName);
            $stmt->execute();
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    public function UpdateReportStatus($ReportID, $ReportStatus)
    {
        try {
            $sql = "UPDATE Report SET ReportStatus=:ReportStatus WHERE ReportID=:ReportID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ReportID', $ReportID);
            $stmt->bindParam(':ReportStatus', $ReportStatus);
            $stmt->execute();
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    // Check if ReportID exists
    private function _CheckReport($ReportID)
    {
        try {
            $sql = "SELECT * FROM Report WHERE ReportID=:ReportID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ReportID', $ReportID);
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

    public function updateReport($ReportInfo)
    {
        try {
            if (empty($ReportInfo['FileName'])) {
                $ReportStatus = '0';
                $RejectReason = $ReportInfo['RejectReason'];
            } else {
                $ReportStatus = '1';
                $RejectReason = '';
            }
            if (!empty($_FILES['ReportUploadPDF']['name'])) { 
                $ReportStatus = '1';
            } 
            $now = date("Y-m-d H:i:s");
            $sql = "UPDATE Report SET
                ReportName=:ReportName, 
                FileName=:FileName, 
                ReportType=:ReportType,
                TemplateID=:TemplateID,
                HospitalList=:HospitalList, 
                ReportStatus=:ReportStatus, 
                UpdatedAt=:UpdatedAt,
                DueDate=:DueDate,
                CustomerName=:CustomerName,
                CustomerEmail=:CustomerEmail,
                CustomerPhone=:CustomerPhone,
                RejectReason=:RejectReason
                WHERE id=:id";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ReportName', $ReportInfo['ReportName']);
            $stmt->bindValue(':FileName', $ReportInfo['ReportID'] . '.pdf');
            $stmt->bindParam(':ReportType', $ReportInfo['ReportType']);
            $stmt->bindParam(':TemplateID', $ReportInfo['TemplateID']);
            $stmt->bindParam(':HospitalList', $ReportInfo['HospitalList']);
            $stmt->bindParam(':ReportStatus', $ReportStatus);
            $stmt->bindParam(':UpdatedAt', $now);
            $stmt->bindParam(':DueDate', $ReportInfo['DueDate']);
            $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
            $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
            $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
            $stmt->bindParam(':RejectReason', $RejectReason);
            $stmt->bindParam(':id', $ReportInfo['ID']);
            $stmt->execute();
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    public function deleteReport($ReportInfo)
    {
        try {
            $sql = "DELETE FROM Report WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ID', $ReportInfo['ID']);
            $stmt->execute();
            // if (!empty($ReportInfo['FileName'])) {
            //     if (file_exists("./uploads/" . $ReportInfo['FileName'])) {
            //         unlink("./uploads/" . $ReportInfo['FileName']);
            //     }
            // }
            if (!empty($ReportInfo['FileName'])) {
                if (file_exists("__DIR__ . '/../uploads/" . $ReportInfo['FileName'])) {
                    unlink("__DIR__ . '/../uploads/" . $ReportInfo['FileName']);
                    file_put_contents("__DIR__ . '/../tempFileName/" . $ReportInfo['FileName'], $ReportInfo['FileName']);
                }
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    public function getReportList($Contdition = null)
    {
        try {
            $sql = "SELECT * FROM Report";
            if ($Contdition) {
                $sql .= " WHERE " . $Contdition;
            }
            $stmt = $this->_conn->prepare($sql);
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($response) {
                $this->_ReportInfoList = $response;
            } else {
                return false;
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }

    public function Reject($ReportInfo, $UserInfo)
    {
        try {
            switch ($UserInfo['Permission']) {
                case '2':
                    $this->RejectBy1($ReportInfo, $UserInfo);
                    break;
                case '3':
                    $this->RejectBy2($ReportInfo, $UserInfo);
                    break;
                default:
                    throw new Exception("權限錯誤", 1);
            }
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }

    public function Approve($ReportInfo, $session)
    {
        // find the template for this report
        try {
            // get the user info
            $UserInfo = $this->getUserInfo($session['UserID']);
            // Get the file name without extension
            $tmpFileName = explode('.', $ReportInfo['FileName'])[0];
            switch ($UserInfo['permission']) {
                case '2': // 醫檢師
                    $FileName = $tmpFileName . '_1.pdf';
                    // Change $ReportInfo['FileName'] to the new file name
                    $this->PDFSignature($ReportInfo, $UserInfo, $FileName);
                    $ReportInfo['FileName'] = $FileName;
                    $this->ApproveBy1($ReportInfo['ID'], $UserInfo['username'], $FileName);
                    break;
                case '3': // 醫師
                    $FileName = $tmpFileName . '_2.pdf';
                    // Change $ReportInfo['FileName'] to the new file name
                    $this->PDFSignature($ReportInfo, $UserInfo, $FileName);
                    $ReportInfo['FileName'] = $FileName;
                    $this->ApproveBy2($ReportInfo['ID'], $UserInfo['username'], $FileName);
                    break;
                default:
                    throw new Exception("權限錯誤", 1);
            }
        } catch (Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }

    // Get User Info
    private function getUserInfo($ID)
    {
        try {
            $sql = "SELECT * FROM users WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ID', $ID);
            $stmt->execute();
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($response) {
                return $response;
            } else {
                throw new Exception("找不到此使用者", 1);
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }

    // Put the signature on the PDF
    private function PDFSignature($reportInfo, $UserInfo, $FileName)
    {
        // get the template
        $TemplateInfo = $this->getTemplateInfo($reportInfo['TemplateID']);
        // get the PDF
        $reportSignature = new ReportSignature();
        $reportSignature->AddSignature($reportInfo, $UserInfo, $FileName);
    }

    public function getTemplateInfo($TemplateID)
    {
        try {
            $sql = "SELECT * FROM Template WHERE id=:TemplateID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':TemplateID', $TemplateID);
            $stmt->execute();
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($response) {
                return $response;
            } else {
                throw new Exception("找不到此範本", 1);
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
    }


    private function ApproveBy1($ID, $ApprovedBy, $FileName)
    {
        try {
            $now = date("Y-m-d H:i:s");
            $sql = "UPDATE Report SET FileName=:FileName,
                ReportStatus='2',
                Approved1=:ApprovedBy, Approved1At=:ApprovedAt,
                Reject1='', Reject1At='',
                UpdatedAt=:UpdatedAt
                WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':FileName', $FileName);
            $stmt->bindParam(':ApprovedBy', $ApprovedBy);
            $stmt->bindParam(':ApprovedAt', $now);
            $stmt->bindParam(':UpdatedAt', $now);
            $stmt->bindParam(':ID', $ID);
            $stmt->execute();
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    // reject report by 1
    private function RejectBy1($ReportInfo, $UserInfo)
    {
        try {
            //Rename the PDF file 
            if (!empty($ReportInfo['FileName'])) {
                $FileName_Reject = "Reject_" . $ReportInfo["FileName"];
                $oldPath = __DIR__ . '/../uploads/' . $ReportInfo['ReportID'] . "/" . $ReportInfo['FileName'];
                $newPath = __DIR__ . '/../uploads/' . $ReportInfo['ReportID'] . "/" . $FileName_Reject;
                if (file_exists($oldPath)) {
                    copy($oldPath, $newPath);
                }
            }

            $Reject = $UserInfo['DisplayName'];
            $ID = $ReportInfo['ID'];
            $now = date("Y-m-d H:i:s");
            // $FileName_Reject = "Reject_" . $ReportInfo["FileName"];
            $sql = "UPDATE Report SET FileName= '' , ReportStatus='3',Approved1='',Approved1At=NULL,Reject1=:Reject,Reject1At=:RejectAt,RejectReason=:RejectReason,UpdatedAt=:UpdatedAt WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            // $stmt->bindParam(":FileName", $FileName_Reject);
            $stmt->bindParam(':Reject', $Reject);
            $stmt->bindParam(':RejectAt', $now);
            $stmt->bindParam(':RejectReason', $ReportInfo['RejectReason']);
            $stmt->bindParam(':UpdatedAt', $now);
            $stmt->bindParam(':ID', $ID);
            $stmt->execute();



            // Delete the PDF file from the server
            // if (!empty($ReportInfo['PDFFilename'])) {
            //     if (file_exists(__DIR__ . '/../uploads/' . $ReportInfo['PDFFilename'])) {
            //         unlink(__DIR__ . '/../uploads/' . $ReportInfo['PDFFilename']);
            //     }
            // }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }


    private function ApproveBy2($ID, $ApprovedBy, $FileName)
    {

        try {
            $now = date("Y-m-d H:i:s");
            $sql = "UPDATE Report SET FileName=:FileName,
                ReportStatus='4',
                Approved2=:ApprovedBy, Approved2At=:ApprovedAt,
                Reject2='', Reject2At='',
                UpdatedAt=:UpdatedAt
                WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':FileName', $FileName);
            $stmt->bindParam(':ApprovedBy', $ApprovedBy);
            $stmt->bindParam(':ApprovedAt', $now);
            $stmt->bindParam(':UpdatedAt', $now);
            $stmt->bindParam(':ID', $ID);
            $stmt->execute();
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    // reject report by 2
    private function RejectBy2($ReportInfo, $UserInfo)
    {
        try {
            if (!empty($ReportInfo['FileName'])) {
                $FileName_Reject = "Reject_" . $ReportInfo["FileName"];
                $oldPath = __DIR__ . '/../uploads/' . $ReportInfo['ReportID'] . "/" . $ReportInfo['FileName'];
                $newPath = __DIR__ . '/../uploads/' . $ReportInfo['ReportID'] . "/" . $FileName_Reject;
                if (file_exists($oldPath)) {
                    copy($oldPath, $newPath);
                }
            }
            $Reject = $UserInfo['DisplayName'];
            $ID = $ReportInfo['ID'];
            $now = date("Y-m-d H:i:s");
            $sql = "UPDATE Report SET FileName='',ReportStatus='5',Approved2='',Approved2At=NULL,Reject2=:Reject,Reject2At=:RejectAt,UpdatedAt=:UpdatedAt,RejectReason=:RejectReason WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':Reject', $Reject);
            $stmt->bindParam(':RejectAt', $now);
            $stmt->bindParam(':UpdatedAt', $now);
            $stmt->bindParam(':ID', $ID);
            $stmt->bindParam(':RejectReason', $ReportInfo['RejectReason']);
            $stmt->execute();
            // Delete the PDF file from the server

        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function get_ReportInfoList()
    {
        return $this->_ReportInfoList;
    }

    /**
     * @return mixed
     */
    public function get_PDFFile()
    {
        return $this->_PDFFile;
    }

    /**
     * @param mixed $_PDFFile 
     * @return self
     */
    public function set_PDFFile($_PDFFile): self
    {
        $this->_PDFFile = $_PDFFile;
        return $this;
    }

    /**
     * @return mixed
     */
    public function get_ReportInfo()
    {
        return $this->_ReportInfo;
    }

    public function RejectReason($rejectReason, $ReportID): bool
    {
        try {

            $rejectReason = $_POST['RejectReason'];
            $sql = "UPDATE Report SET RejectReason = :rejectReason WHERE ReportID = :ReportID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':rejectReason', $rejectReason);
            $stmt->bindParam(':ReportID', $ReportID);
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


}
?>