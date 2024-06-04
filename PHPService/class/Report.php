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
                'ReportID' => $data['ReportID'] ?? '', //報告編號
                'ReportName' => $data['ReportName'] ?? '', //報告名稱
                'ReportType' => $data['ReportType'] ?? '', //報告類型
                'TemplateID' => $data['TemplateID'] ?? '', //範本編號
                'FileName' => $data['FileName'] ?? '', //檔案名稱
                'apply_pdf' => $data['apply_pdf'] ?? '', //申請檔案
                'HospitalList' => $data['HospitalList'] ?? '', //醫院名稱
                'ReportStatus' => $data['ReportStatus'] ?? '', //報告狀態
                'CreatedAt' => $data['CreatedAt'] ?? '', //建立時間
                'UpdatedAt' => $data['UpdatedAt'] ?? '', //更新時間
                'Approved1' => $data['Approved1'] ?? '', //醫檢師簽核
                'Approved1At' => $data['Approved1At'] ?? '', //醫檢師簽核時間
                'Approved2' => $data['Approved2'] ?? '', //醫師簽核
                'Approved2At' => $data['Approved2At'] ?? '', //醫師簽核時間
                'DueDate' => $data['DueDate'] ?? '', //截止日期
                'CustomerName' => $data['CustomerName'] ?? '', //客戶名稱
                'CustomerEmail' => $data['CustomerEmail'] ?? '', //客戶Email
                'ccemail' => $data['ccemail'] ?? '', //副本Email
                'CustomerPhone' => $data['CustomerPhone'] ?? '', //客戶電話
                'ReportSendStatus' => $data['ReportSendStatus'] ?? '', //報告寄送狀態
                'Editable' => $data['Editable'] ?? '', //是否可編輯
                'RejectReason' => $data['RejectReason'] ?? '', //拒絕原因
                'SampleID' => $data['SampleID'] ?? '', //檢體編號
                'PatientID' => $data['PatientID'] ?? '', //病歷號
                'scID' => $data['scID'] ?? '', //採檢單號
                'scdate' => $data['scdate'] ?? '', //採集日期
                'rcdate' => $data['rcdate'] ?? '', //收檢日期
                'Submitdate' => $data['Submitdate'] ?? '', //送檢日期
                'SampleNo' => $data['SampleNo'] ?? '', //樣本編號
                'SampleType' => $data['SampleType'] ?? '', //樣本類型
                'ReceivingDate' => $data['ReceivingDate'] ?? '', //收檢日期
                'Receiving' => $data['Receiving'] ?? '', //收檢人員
                'Sampleglass' => $data['Sampleglass'] ?? '', //樣本容器
                'quantity' => $data['quantity'] ?? '', //樣本數量
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
                if (!empty($response['apply_pdf']) && file_exists($response['apply_pdf'])) {
                    $this->_PDFFile = file_get_contents($response['apply_pdf']);
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

    // Get libodb.user Permission=2 List
    public function getUserList()
    {
        try {
            $sql = "SELECT id, username FROM users WHERE permission = 2";
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
            // 重複編號
            if ($this->_CheckReport($ReportInfo['ReportID'])) {
                throw new Exception("此報告編號已存在", 1);
            } else {
                // check if file exists
                if (empty($ReportInfo['FileName'])) { // if no file uploaded
                    $ReportStatus = '0';
                } else {
                    $ReportStatus = '1';
                }
                $now = date("Y-m-d H:i:s");
                $sql = "INSERT INTO Report (
                ReportID, ReportName, FileName, ReportType, TemplateID, ccemail, HospitalList, ReportStatus,
                CreatedAt, CustomerName, CustomerEmail, CustomerPhone, DueDate, SampleID, PatientID, scID, scdate, rcdate, apply_pdf, Submitdate ,SampleNo, SampleType,ReceivingDate,  Receiving,Sampleglass, quantity
                ) VALUES (
                :ReportID, :ReportName, :FileName, :ReportType, :TemplateID, :ccemail, :HospitalList, :ReportStatus,
                :CreatedAt, :CustomerName, :CustomerEmail, :CustomerPhone, :DueDate, :SampleID, :PatientID, :scID, :scdate, :rcdate, :apply_pdf, :Submitdate, :SampleNo, :SampleType, :ReceivingDate, :Receiving, :Sampleglass, :quantity
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
                //如果沒有上傳檔案，就不要寫入apply_pdf檔案名稱
                if (empty($ReportInfo['apply_pdf'])) {
                    $stmt->bindValue(':apply_pdf', '');
                } else {
                    $stmt->bindValue(':apply_pdf', $_FILES['ReportApply']['name']);
                }
                if (empty($ReportInfo['DueDate']) || $ReportInfo['DueDate'] == '') {
                    $DueDate_date = null;
                    $scdate_date = null;
                    $rcdate_date = null;
                    $Submit_date = null;
                    $ReceivingDate_date = null;

                } else {
                    // $ReportInfo['DueDate'] = $date->format('Y-m-d');
                    $DueDate =  $ReportInfo['DueDate'];
                    // $DueDate_date = $DueDate->format('Y-m-d');
                    // if ($DueDate === false) {
                    //     $DueDate_date = null;
                    // } else {
                    //     $DueDate_date = $DueDate->format('Y-m-d');
                    // }
                    $scdate =  $ReportInfo['scdate'];
                    // $scdate_date = $scdate->format('Y-m-d');
                    $rcdate = $ReportInfo['rcdate'];
                    // $rcdate_date = $rcdate->format('Y-m-d');
                    $Submitdate =  $ReportInfo['Submitdate'];
                    // $Submit_date = $Submitdate->format('Y-m-d');
                    $ReceivingDate =  $ReportInfo['ReceivingDate'];
                    // $ReceivingDate_date = $ReceivingDate->format('Y-m-d');
                }

                // $stmt->bindValue(':FileName', $ReportInfo['ReportID'] . '.pdf');
                //ReportType 只取第一個數字
                $ReportInfo['ReportType'] = substr($ReportInfo['ReportType'], 0, 1);
                $ReportInfo['TemplateID'] = substr($ReportInfo['TemplateID'], 0, 1);
                $ReportInfo['HospitalList'] = substr($ReportInfo['HospitalList'], 0, 1);

                $stmt->bindParam(':ReportType', $ReportInfo['ReportType']);
                $stmt->bindParam(':TemplateID', $ReportInfo['TemplateID']);
                $stmt->bindParam(':ccemail', $ReportInfo['ccemail']);
                $stmt->bindParam(':HospitalList', $ReportInfo['HospitalList']);
                $stmt->bindParam(':ReportStatus', $ReportStatus);
                $stmt->bindParam(':CreatedAt', $now);
                $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
                $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
                $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
                $stmt->bindParam(':DueDate', $DueDate);
                $stmt->bindParam(':SampleID', $ReportInfo['SampleID']);
                $stmt->bindParam(':PatientID', $ReportInfo['PatientID']);
                $stmt->bindParam(':scID', $ReportInfo['scID']);
                $stmt->bindParam(':scdate', $scdate);
                $stmt->bindParam(':rcdate', $rcdate);
                $stmt->bindParam(':Submitdate', $Submitdate);
                $stmt->bindParam(':SampleNo', $ReportInfo['SampleNo']);
                $stmt->bindParam(':SampleType', $ReportInfo['SampleType']);
                $stmt->bindParam(':ReceivingDate', $ReceivingDate);
                $stmt->bindParam(':Receiving', $ReportInfo['Receiving']);
                $stmt->bindParam(':Sampleglass', $ReportInfo['Sampleglass']);
                $stmt->bindParam(':quantity', $ReportInfo['quantity']);
                $stmt->execute();
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }

    public function AddReport1($ReportInfo)
    {
        try {
            // 重複編號
            if ($this->_CheckReport($ReportInfo['ReportID'])) {
                throw new Exception("此報告編號已存在", 1);
            } else {
                // check if file exists
                if (empty($ReportInfo['FileName'])) { // if no file uploaded
                    $ReportStatus = '0';
                } else {
                    $ReportStatus = '1';
                }
                $now = date("Y-m-d H:i:s");
                $sql = "INSERT INTO Report (
                ReportID, ReportName, FileName, ReportType, TemplateID, ccemail, HospitalList, ReportStatus,
                CreatedAt, CustomerName, CustomerEmail, CustomerPhone, DueDate, SampleID, PatientID, scID, scdate, rcdate, apply_pdf, Submitdate ,SampleNo, SampleType,ReceivingDate,  Receiving,Sampleglass, quantity
                ) VALUES (
                :ReportID, :ReportName, :FileName, :ReportType, :TemplateID, :ccemail, :HospitalList, :ReportStatus,
                :CreatedAt, :CustomerName, :CustomerEmail, :CustomerPhone, :DueDate, :SampleID, :PatientID, :scID, :scdate, :rcdate, :apply_pdf, :Submitdate, :SampleNo, :SampleType, :ReceivingDate, :Receiving, :Sampleglass, :quantity
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
                //如果沒有上傳檔案，就不要寫入apply_pdf檔案名稱
                if (empty($ReportInfo['apply_pdf'])) {
                    $stmt->bindValue(':apply_pdf', '');
                } else {
                    $stmt->bindValue(':apply_pdf', $_FILES['ReportApply']['name']);
                }
                if (empty($ReportInfo['DueDate']) || $ReportInfo['DueDate'] == '') {
                    $DueDate_date = null;
                    $scdate_date = null;
                    $rcdate_date = null;
                    $Submit_date = null;
                    $ReceivingDate_date = null;

                } else {
                    // $ReportInfo['DueDate'] = $date->format('Y-m-d');
                    $DueDate = DateTime::createFromFormat('n/j/Y', $ReportInfo['DueDate']);
                    // $DueDate_date = $DueDate->format('Y-m-d');
                    if ($DueDate === false) {
                        $DueDate_date = null;
                    } else {
                        $DueDate_date = $DueDate->format('Y-m-d');
                    }
                    $scdate = DateTime::createFromFormat('n/j/Y', $ReportInfo['scdate']);
                    $scdate_date = $scdate->format('Y-m-d');
                    $rcdate = DateTime::createFromFormat('n/j/Y', $ReportInfo['rcdate']);
                    $rcdate_date = $rcdate->format('Y-m-d');
                    $Submitdate = DateTime::createFromFormat('n/j/Y', $ReportInfo['Submitdate']);
                    $Submit_date = $Submitdate->format('Y-m-d');
                    $ReceivingDate = DateTime::createFromFormat('n/j/Y', $ReportInfo['ReceivingDate']);
                    $ReceivingDate_date = $ReceivingDate->format('Y-m-d');
                }


                // $stmt->bindValue(':FileName', $ReportInfo['ReportID'] . '.pdf');
                //ReportType 只取第一個數字
                $ReportInfo['ReportType'] = substr($ReportInfo['ReportType'], 0, 1);
                $ReportInfo['TemplateID'] = substr($ReportInfo['TemplateID'], 0, 1);
                $ReportInfo['HospitalList'] = substr($ReportInfo['HospitalList'], 0, 1);

                $stmt->bindParam(':ReportType', $ReportInfo['ReportType']);
                $stmt->bindParam(':TemplateID', $ReportInfo['TemplateID']);
                $stmt->bindParam(':ccemail', $ReportInfo['ccemail']);
                $stmt->bindParam(':HospitalList', $ReportInfo['HospitalList']);
                $stmt->bindParam(':ReportStatus', $ReportStatus);
                $stmt->bindParam(':CreatedAt', $now);
                $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
                $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
                $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
                $stmt->bindParam(':DueDate', $DueDate_date);
                $stmt->bindParam(':SampleID', $ReportInfo['SampleID']);
                $stmt->bindParam(':PatientID', $ReportInfo['PatientID']);
                $stmt->bindParam(':scID', $ReportInfo['scID']);
                $stmt->bindParam(':scdate', $scdate_date);
                $stmt->bindParam(':rcdate', $rcdate_date);
                $stmt->bindParam(':Submitdate', $Submit_date);
                $stmt->bindParam(':SampleNo', $ReportInfo['SampleNo']);
                $stmt->bindParam(':SampleType', $ReportInfo['SampleType']);
                $stmt->bindParam(':ReceivingDate', $ReceivingDate_date);
                $stmt->bindParam(':Receiving', $ReportInfo['Receiving']);
                $stmt->bindParam(':Sampleglass', $ReportInfo['Sampleglass']);
                $stmt->bindParam(':quantity', $ReportInfo['quantity']);
                $stmt->execute();
            }
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

    public function UpdateReport($ReportInfo)
    {
        try {
            if (empty($ReportInfo['FileName'])) {
                $ReportStatus = '0';
                $RejectReason = $ReportInfo['RejectReason'];
            } else {
                $ReportStatus = '1';
                $RejectReason = '';
            }

            $now = date("Y-m-d H:i:s");
            $sql = "UPDATE Report SET
                ReportName=:ReportName,
                FileName=:FileName,
                apply_pdf=:apply_pdf,
                ReportType=:ReportType,
                TemplateID=:TemplateID,
                ccemail=:ccemail,
                HospitalList=:HospitalList,
                ReportStatus=:ReportStatus,
                UpdatedAt=:UpdatedAt,
                DueDate=:DueDate,
                CustomerName=:CustomerName,
                CustomerEmail=:CustomerEmail,
                CustomerPhone=:CustomerPhone,
                RejectReason=:RejectReason,
                SampleID=:SampleID,
                PatientID=:PatientID,
                scID=:scID,
                scdate=:scdate,
                rcdate=:rcdate
                WHERE ID=:ID";

                
            // 無上傳申請單SQL
            $sql1 = "UPDATE Report SET
                ReportName=:ReportName,
                FileName=:FileName,
                ReportType=:ReportType,
                TemplateID=:TemplateID,
                ccemail=:ccemail,
                HospitalList=:HospitalList,
                ReportStatus=:ReportStatus,
                UpdatedAt=:UpdatedAt,
                DueDate=:DueDate,
                CustomerName=:CustomerName,
                CustomerEmail=:CustomerEmail,
                CustomerPhone=:CustomerPhone,
                RejectReason=:RejectReason,
                SampleID=:SampleID,
                PatientID=:PatientID,
                scID=:scID,
                scdate=:scdate,
                rcdate=:rcdate
                WHERE ID=:ID";




                $FileName = $ReportInfo['ReportID'] . '.pdf';

            if (!empty($_FILES['ReportApply']['name']) ) {
                $stmt = $this->_conn->prepare($sql);
                $stmt->bindParam(':ReportName', $ReportInfo['ReportName']);    
                $ReportStatus = '1';
                $stmt->bindValue(':FileName', $FileName);
                $ReportApplyName = $_FILES['ReportApply']['name'] ;
                $stmt->bindValue(':apply_pdf', $_FILES['ReportApply']['name']);
                $stmt->bindParam(':ReportType', $ReportInfo['ReportType']);
                $stmt->bindParam(':TemplateID', $ReportInfo['TemplateID']);
                $stmt->bindParam(':ccemail', $ReportInfo['ccemail']);
                $stmt->bindParam(':HospitalList', $ReportInfo['HospitalList']);
                $stmt->bindParam(':ReportStatus', $ReportStatus);
                $stmt->bindParam(':UpdatedAt', $now);
                $stmt->bindParam(':DueDate', $ReportInfo['DueDate']);
                $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
                $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
                $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
                $stmt->bindParam(':RejectReason', $RejectReason);
                $stmt->bindParam(':SampleID', $ReportInfo['SampleID']);
                $stmt->bindParam(':PatientID', $ReportInfo['PatientID']);
                $stmt->bindParam(':scID', $ReportInfo['scID']);
                $stmt->bindParam(':scdate', $ReportInfo['scdate']);
                $stmt->bindParam(':rcdate', $ReportInfo['rcdate']);
                $stmt->bindParam(':ID', $ReportInfo['ID']);
                $stmt->execute();

            }else{
                $stmt = $this->_conn->prepare($sql1);
                $stmt->bindParam(':ReportName', $ReportInfo['ReportName']);    
                $stmt->bindValue(':FileName', $FileName);
                $stmt->bindParam(':ReportType', $ReportInfo['ReportType']);
                $stmt->bindParam(':TemplateID', $ReportInfo['TemplateID']);
                $stmt->bindParam(':ccemail', $ReportInfo['ccemail']);
                $stmt->bindParam(':HospitalList', $ReportInfo['HospitalList']);
                $stmt->bindParam(':ReportStatus', $ReportStatus);
                $stmt->bindParam(':UpdatedAt', $now);
                $stmt->bindParam(':DueDate', $ReportInfo['DueDate']);
                $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
                $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
                $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
                $stmt->bindParam(':RejectReason', $RejectReason);
                $stmt->bindParam(':SampleID', $ReportInfo['SampleID']);
                $stmt->bindParam(':PatientID', $ReportInfo['PatientID']);
                $stmt->bindParam(':scID', $ReportInfo['scID']);
                $stmt->bindParam(':scdate', $ReportInfo['scdate']);
                $stmt->bindParam(':rcdate', $ReportInfo['rcdate']);
                $stmt->bindParam(':ID', $ReportInfo['ID']);
                $stmt->execute();
            }

            // if(!empty($_FILES['ReportApply']['name'])){
            //     $ReportApplyName = $_FILES['ReportApply']['name'] ;
            //     $stmt->bindValue(':apply_pdf', $_FILES['ReportApply']['name']);

            // }else{
            //     $stmt = $this->_conn->prepare($sql1);
            //     $ReportApplyName = null;
            // }


        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage() . ' Error code: ' . $th->getCode());
        }
        return true;
    }


    public function Updateccemail($ReportInfo)
    {
        try {
            $sql = "UPDATE Report SET ccemail=:ccemail WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ccemail', $ReportInfo['ccemail']);
            $stmt->bindParam(':ID', $ReportInfo['ID']);
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

    public function get_ApplyFile()
    {
        return $this->_ApplyFile;
    }

    public function set_ApplyFile($_ApplyFile): self
    {
        $this->_ApplyFile = $_ApplyFile;
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