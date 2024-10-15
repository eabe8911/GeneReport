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
    private $startReportId;

    private $endReportId;
    public function __construct($data = [])
    {
        try {
            $objDb = new DBConnect;
            $this->_conn = $objDb->connect();

            $this->_ReportInfo = [
                'ID' => $data['ID'] ?? '',
                'SampleID' => $data['SampleID'] ?? '', //檢體編號
                'PatientID' => $data['PatientID'] ?? '', //病歷號
                'SampleNo' => $data['SampleNo'] ?? '', //樣本編號
                'scID' => $data['scID'] ?? '', //採檢單號
                'HospitalList' => $data['HospitalList'] ?? '', //醫院名稱
                'HospitalList_Dr' => $data['HospitalList_Dr'] ?? '', //送檢醫師
                'ReportTemplate' => $data['ReportTemplate'] ?? '', //報告範本
                'ReportTemplateID' => $data['ReportTemplateID'] ?? '', //報告範本編號
                'ReportType' => $data['ReportType'] ?? '', //報告類型
                'scdate' => $data['scdate'] ?? '', //採集日期
                'Submitdate' => $data['Submitdate'] ?? '', //送檢日期
                'rcdate' => $data['rcdate'] ?? '', //收檢日期
                // 'ReceivingDate' => $data['ReceivingDate'] ?? '', //收檢日期
                'Receiving' => $data['Receiving'] ?? '', //收檢人員
                'Receiving2' => $data['Receiving2'] ?? '', //收檢人員2
                'TemplateID' => $data['TemplateID'] ?? '', //範本編號
                'ReportID' => $data['ReportID'] ?? '', //報告編號
                'ReportName' => $data['ReportName'] ?? '', //報告名稱
                'HospitalList_ERP' => $data['HospitalList_ERP'] ?? '', //院所代號(ERP)
                'CustomerName' => $data['CustomerName'] ?? '', //客戶名稱
                'CustomerPhone' => $data['CustomerPhone'] ?? '', //客戶電話
                'CustomerEmail' => $data['CustomerEmail'] ?? '', //客戶Email
                'DueDate' => $data['DueDate'] ?? '', //截止日期
                'FileName' => $data['FileName'] ?? '', //檔案名稱
                'apply_pdf' => $data['apply_pdf'] ?? '', //申請檔案
                'ReportStatus' => $data['ReportStatus'] ?? '', //報告狀態
                'CreatedAt' => $data['CreatedAt'] ?? '', //建立時間
                'UpdatedAt' => $data['UpdatedAt'] ?? '', //更新時間
                'Approved1' => $data['Approved1'] ?? '', //醫檢師簽核
                'Approved1At' => $data['Approved1At'] ?? '', //醫檢師簽核時間
                'Approved2' => $data['Approved2'] ?? '', //醫師簽核
                'Approved2At' => $data['Approved2At'] ?? '', //醫師簽核時間
                'ccemail' => $data['ccemail'] ?? '', //副本Email
                'ReportSendStatus' => $data['ReportSendStatus'] ?? '', //報告寄送狀態
                'Editable' => $data['Editable'] ?? '', //是否可編輯
                'RejectReason' => $data['RejectReason'] ?? '', //拒絕原因
                'SampleType_1' => $data['SampleType_1'] ?? '', //樣本類型1
                'SampleQuantity_1' => $data['SampleQuantity_1'] ?? '', //樣本數量1
                'SampleUnit_1' => $data['SampleUnit_1'] ?? '', //樣本單位1
                'SampleType_2' => $data['SampleType_2'] ?? '', //樣本類型2
                'SampleQuantity_2' => $data['SampleQuantity_2'] ?? '', //樣本數量2
                'SampleUnit_2' => $data['SampleUnit_2'] ?? '', //樣本單位2
                'SampleType_3' => $data['SampleType_3'] ?? '', //樣本類型3
                'SampleQuantity_3' => $data['SampleQuantity_3'] ?? '', //樣本數量3
                'SampleUnit_3' => $data['SampleUnit_3'] ?? '', //樣本單位3
                'SampleType_4' => $data['SampleType_4'] ?? '', //樣本類型4
                'SampleQuantity_4' => $data['SampleQuantity_4'] ?? '', //樣本數量4
                'SampleUnit_4' => $data['SampleUnit_4'] ?? '', //樣本單位4
                'SampleType_5' => $data['SampleType_5'] ?? '', //樣本類型5
                'SampleQuantity_5' => $data['SampleQuantity_5'] ?? '', //樣本數量5
                'SampleUnit_5' => $data['SampleUnit_5'] ?? '', //樣本單位5
                'proband_name' => $data['proband_name'] ?? '', //被檢者姓名
                'method' => $data['method'] ?? '', //檢測方法

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
    // find report by startReportId & endReportId to get report list




    public function setReportID($startReportId, $endReportId) {

        $this->startReportId = $startReportId;

        $this->endReportId = $endReportId;

    }


    public function getReportID() {

        $sql = "SELECT  ReportID, proband_name, SampleNo, PatientID, scID, sample_type_r1, sample_type_r2, sample_type_r3, sample_type_r4, sample_type_r5, method, scdate, rcdate, HospitalList_Dr, HospitalList, CustomerName, CustomerPhone, CustomerEmail  FROM ReportView WHERE ReportID BETWEEN :start_report_id AND :end_report_id";
        $stmt = $this->_conn->prepare($sql);
        $stmt->execute(['start_report_id' => $this->startReportId, 'end_report_id' => $this->endReportId]);
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($response) {
            return $response;
        } else {
            return false;
        }

        // return [

        //     'start_report_id' => $this->startReportId,

        //     'end_report_id' => $this->endReportId

        // ];

    }





    public function AddReport($ReportInfo)
    {
        try {
            $hospitalList = new Report();
            $hospitalList = $hospitalList->getHospitalList();
            //get hospitalList name
            $hospitalList = $hospitalList[$ReportInfo['HospitalList']];

            // 重複編號
            if ($this->_CheckReport($ReportInfo['ReportID'])) {
                throw new Exception("此報告編號已存在", 1);
            } else {
                // check if file exists
                $ReportInfo['TemplateID'] = substr($ReportInfo['TemplateID'], 0, 1);

                if ($ReportInfo['TemplateID'] == 3) { // if report doesn't need to upload file
                    $ReportStatus = '10';
                } elseif (empty($ReportInfo['FileName'])) { // if no file uploaded
                    $ReportStatus = '0';
                } else {
                    $ReportStatus = '1';
                }

                //switch case
                switch ($ReportInfo['SampleType_1']) {
                    case 'EDTA紫頭管-全血':
                        $ReportInfo['sample_type_r1'] = "血液檢體";
                        break;
                    case 'Streck cfDNA BCT(迷彩管)-全血':
                        $ReportInfo['sample_type_r1'] = "血液檢體";
                        break;
                    case 'Streck RNA Complete BCT(橘頭管)-全血':
                        $ReportInfo['sample_type_r1'] = "血液檢體";
                        break;
                    case '5 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r1'] = "FFPE";
                        break;
                    case '10 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r1'] = "FFPE";
                        break;
                    case '染色圈片':
                        $ReportInfo['sample_type_r1'] = "FFPE";
                        break;
                    case '粗針穿刺檢體':
                        $ReportInfo['sample_type_r1'] = "FFPE";
                        break;
                    case 'gDNA':
                        $ReportInfo['sample_type_r1'] = "gDNA";
                        break;
                    case '口腔拭子-口腔黏膜細胞':
                        $ReportInfo['sample_type_r1'] = "口腔黏膜";
                        break;
                    case '生資分析':
                        $ReportInfo['sample_type_r1'] = "生資分析";
                        break;
                    case '細胞懸浮液':
                        $ReportInfo['sample_type_r1'] = "細胞懸浮液";
                        break;
                default:
                    break;
            
                }
                
                switch ($ReportInfo['SampleType_2']) {
                    case 'EDTA紫頭管-全血':
                        $ReportInfo['sample_type_r2'] = "血液檢體";
                        break;
                    case 'Streck cfDNA BCT(迷彩管)-全血':
                        $ReportInfo['sample_type_r2'] = "血液檢體";
                        break;
                    case 'Streck RNA Complete BCT(橘頭管)-全血':
                        $ReportInfo['sample_type_r2'] = "血液檢體";
                        break;
                    case '5 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r2'] = "FFPE";
                        break;
                    case '10 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r2'] = "FFPE";
                        break;
                    case '染色圈片':
                        $ReportInfo['sample_type_r2'] = "FFPE";
                        break;
                    case '粗針穿刺檢體':
                        $ReportInfo['sample_type_r2'] = "FFPE";
                        break;
                    case 'gDNA':
                        $ReportInfo['sample_type_r2'] = "gDNA";
                        break;
                    case '口腔拭子-口腔黏膜細胞':
                        $ReportInfo['sample_type_r2'] = "口腔黏膜";
                        break;
                    case '生資分析':
                        $ReportInfo['sample_type_r2'] = "生資分析";
                        break;
                    case '細胞懸浮液':
                        $ReportInfo['sample_type_r2'] = "細胞懸浮液";
                        break;
                default:
                    break;
            
                }
                switch ($ReportInfo['SampleType_3']) {
                    case 'EDTA紫頭管-全血':
                        $ReportInfo['sample_type_r3'] = "血液檢體";
                        break;
                    case 'Streck cfDNA BCT(迷彩管)-全血':
                        $ReportInfo['sample_type_r3'] = "血液檢體";
                        break;
                    case 'Streck RNA Complete BCT(橘頭管)-全血':
                        $ReportInfo['sample_type_r3'] = "血液檢體";
                        break;
                    case '5 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r3'] = "FFPE";
                        break;
                    case '10 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r3'] = "FFPE";
                        break;
                    case '染色圈片':
                        $ReportInfo['sample_type_r3'] = "FFPE";
                        break;
                    case '粗針穿刺檢體':
                        $ReportInfo['sample_type_r3'] = "FFPE";
                        break;
                    case 'gDNA':
                        $ReportInfo['sample_type_r3'] = "gDNA";
                        break;
                    case '口腔拭子-口腔黏膜細胞':
                        $ReportInfo['sample_type_r3'] = "口腔黏膜";
                        break;
                    case '生資分析':
                        $ReportInfo['sample_type_r3'] = "生資分析";
                        break;
                    case '細胞懸浮液':
                        $ReportInfo['sample_type_r3'] = "細胞懸浮液";
                        break;
                default:
                    break;
            
                }
                switch ($ReportInfo['SampleType_4']) {
                    case 'EDTA紫頭管-全血':
                        $ReportInfo['sample_type_r4'] = "血液檢體";
                        break;
                    case 'Streck cfDNA BCT(迷彩管)-全血':
                        $ReportInfo['sample_type_r4'] = "血液檢體";
                        break;
                    case 'Streck RNA Complete BCT(橘頭管)-全血':
                        $ReportInfo['sample_type_r4'] = "血液檢體";
                        break;
                    case '5 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r4'] = "FFPE";
                        break;
                    case '10 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r4'] = "FFPE";
                        break;
                    case '染色圈片':
                        $ReportInfo['sample_type_r4'] = "FFPE";
                        break;
                    case '粗針穿刺檢體':
                        $ReportInfo['sample_type_r4'] = "FFPE";
                        break;
                    case 'gDNA':
                        $ReportInfo['sample_type_r4'] = "gDNA";
                        break;
                    case '口腔拭子-口腔黏膜細胞':
                        $ReportInfo['sample_type_r4'] = "口腔黏膜";
                        break;
                    case '生資分析':
                        $ReportInfo['sample_type_r4'] = "生資分析";
                        break;
                    case '細胞懸浮液':
                        $ReportInfo['sample_type_r4'] = "細胞懸浮液";
                        break;
                default:
                    break;
            
                }                
                switch ($ReportInfo['SampleType_5']) {
                    case 'EDTA紫頭管-全血':
                        $ReportInfo['sample_type_r5'] = "血液檢體";
                        break;
                    case 'Streck cfDNA BCT(迷彩管)-全血':
                        $ReportInfo['sample_type_r5'] = "血液檢體";
                        break;
                    case 'Streck RNA Complete BCT(橘頭管)-全血':
                        $ReportInfo['sample_type_r5'] = "血液檢體";
                        break;
                    case '5 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r5'] = "FFPE";
                        break;
                    case '10 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r5'] = "FFPE";
                        break;
                    case '染色圈片':
                        $ReportInfo['sample_type_r5'] = "FFPE";
                        break;
                    case '粗針穿刺檢體':
                        $ReportInfo['sample_type_r5'] = "FFPE";
                        break;
                    case 'gDNA':
                        $ReportInfo['sample_type_r5'] = "gDNA";
                        break;
                    case '口腔拭子-口腔黏膜細胞':
                        $ReportInfo['sample_type_r5'] = "口腔黏膜";
                        break;
                    case '生資分析':
                        $ReportInfo['sample_type_r5'] = "生資分析";
                        break;
                    case '細胞懸浮液':
                        $ReportInfo['sample_type_r5'] = "細胞懸浮液";
                        break;
                default:
                    break;
            
                }  

                $now = date("Y-m-d H:i:s");
                $sql = "INSERT INTO Report (
                ReportID, PatientID, SampleNo, scID, HospitalList, HospitalList_Dr, ReportTemplate, ReportTemplateID, method, ReportType, ReportName,
                TemplateID, scdate, rcdate, Submitdate, proband_name, SampleType_1, SampleQuantity_1, SampleUnit_1, SampleType_2, SampleQuantity_2, SampleUnit_2
                , SampleType_3, SampleQuantity_3, SampleUnit_3, SampleType_4, SampleQuantity_4, SampleUnit_4, SampleType_5, SampleQuantity_5, SampleUnit_5, Receiving, Receiving2, DueDate, CustomerName, CustomerEmail, CustomerPhone, ccemail,
                ReportStatus, FileName, apply_pdf, CreatedAt, sample_type_r1, sample_type_r2, sample_type_r3, sample_type_r4, sample_type_r5
                ) VALUES (
                :ReportID, :PatientID, :SampleNo, :scID, :HospitalList, :HospitalList_Dr, :ReportTemplate, :ReportTemplateID, :method, :ReportType, :ReportName,
                :TemplateID, :scdate, :rcdate, :Submitdate, :proband_name, :SampleType_1, :SampleQuantity_1, :SampleUnit_1, :SampleType_2, :SampleQuantity_2, :SampleUnit_2
                , :SampleType_3, :SampleQuantity_3, :SampleUnit_3, :SampleType_4, :SampleQuantity_4, :SampleUnit_4, :SampleType_5, :SampleQuantity_5, :SampleUnit_5, :Receiving, :Receiving2,  :DueDate,:CustomerName, :CustomerEmail, :CustomerPhone, :ccemail,
                :ReportStatus, :FileName, :apply_pdf, :CreatedAt, :sample_type_r1, :sample_type_r2, :sample_type_r3, :sample_type_r4, :sample_type_r5 
               )";
                $stmt = $this->_conn->prepare($sql);
                $stmt->bindParam(':ReportID', $ReportInfo['ReportID']);
                $stmt->bindParam(':PatientID', $ReportInfo['PatientID']);
                $stmt->bindParam(':SampleNo', $ReportInfo['SampleNo']);
                $stmt->bindParam(':scID', $ReportInfo['scID']);
                $ReportInfo['HospitalList'] = substr($ReportInfo['HospitalList'], 0, 1);
                $stmt->bindParam(':HospitalList', $ReportInfo['HospitalList']);
                $stmt->bindParam(':ReportTemplate', $ReportInfo['ReportTemplate']);
                $stmt->bindParam(':ReportTemplateID', $ReportInfo['ReportTemplateID']);
                $stmt->bindParam(':method', $ReportInfo['method']);
                $stmt->bindParam(':ReportName', $ReportInfo['ReportName']);
                $ReportInfo['TemplateID'] = substr($ReportInfo['TemplateID'], 0, 1);
                $stmt->bindParam(':TemplateID', $ReportInfo['TemplateID']);
                $stmt->bindParam(':proband_name', $ReportInfo['proband_name']);


                $ReportInfo['ReportType'] = substr($ReportInfo['ReportType'], 0, 1);
                $stmt->bindParam(':ReportType', $ReportInfo['ReportType']);

                if (empty($ReportInfo['DueDate']) || $ReportInfo['DueDate'] == '') {
                    $DueDate_date = null;
                    $scdate_date = null;
                    $rcdate_date = null;
                } else {
                    $DueDate =  $ReportInfo['DueDate'];
                    $scdate =  $ReportInfo['scdate'];
                    $rcdate = $ReportInfo['rcdate'];
                }
                $stmt->bindParam(':scdate', $scdate);
                $stmt->bindParam(':rcdate', $rcdate);
                $stmt->bindParam(':Receiving', $ReportInfo['Receiving']);
                $stmt->bindParam(':Receiving2', $ReportInfo['Receiving2']);
                $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
                $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
                $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
                $stmt->bindParam(':ccemail', $ReportInfo['ccemail']);
                $stmt->bindParam(':ReportStatus', $ReportStatus);

                //如果沒有上傳檔案，就不要寫入檔案名稱
                if (empty($ReportInfo['FileName'])) {
                    $stmt->bindValue(':FileName', '');
                } else {
                    // $stmt->bindValue(':FileName', $ReportInfo['ReportID'] . '.pdf');
                    $ReportInfo['ReportName'] = str_replace(' ', '_', $ReportInfo['ReportName']);
                    $stmt->bindValue(':FileName', '[檢測報告] '. $hospitalList . "_(" . $ReportInfo['ReportID'] . ")_".$ReportInfo['ReportName'].".pdf");
                }
                //如果沒有上傳檔案，就不要寫入apply_pdf檔案名稱
                if (empty($_FILES['ReportApply']['name'])) {
                    $stmt->bindValue(':apply_pdf', '');
                } else {
                    $ReportApplyName = '[服務申請單] '. $hospitalList . "_(" . $ReportInfo['ReportID'] . ").pdf";
                    $stmt->bindValue(':apply_pdf', $ReportApplyName);
                }
                $stmt->bindParam(':HospitalList_Dr', $ReportInfo['HospitalList_Dr']);
                $stmt->bindParam(':Submitdate', $ReportInfo['Submitdate']);
                $stmt->bindParam(':DueDate', $DueDate);
                $stmt->bindParam(':CreatedAt', $now);
                $stmt->bindParam(':SampleType_1', $ReportInfo['SampleType_1']);
                $stmt->bindParam(':SampleQuantity_1', $ReportInfo['SampleQuantity_1']);
                $stmt->bindParam(':SampleUnit_1', $ReportInfo['SampleUnit_1']);
                $stmt->bindParam(':SampleType_2', $ReportInfo['SampleType_2']);
                $stmt->bindParam(':SampleQuantity_2', $ReportInfo['SampleQuantity_2']);
                $stmt->bindParam(':SampleUnit_2', $ReportInfo['SampleUnit_2']);
                $stmt->bindParam(':SampleType_3', $ReportInfo['SampleType_3']);
                $stmt->bindParam(':SampleQuantity_3', $ReportInfo['SampleQuantity_3']);
                $stmt->bindParam(':SampleUnit_3', $ReportInfo['SampleUnit_3']);
                $stmt->bindParam(':SampleType_4', $ReportInfo['SampleType_4']);
                $stmt->bindParam(':SampleQuantity_4', $ReportInfo['SampleQuantity_4']);
                $stmt->bindParam(':SampleUnit_4', $ReportInfo['SampleUnit_4']);
                $stmt->bindParam(':SampleType_5', $ReportInfo['SampleType_5']);
                $stmt->bindParam(':SampleQuantity_5', $ReportInfo['SampleQuantity_5']);
                $stmt->bindParam(':SampleUnit_5', $ReportInfo['SampleUnit_5']);
                $stmt->bindParam(':sample_type_r1', $ReportInfo['sample_type_r1']);
                $stmt->bindParam(':sample_type_r2', $ReportInfo['sample_type_r2']);
                $stmt->bindParam(':sample_type_r3', $ReportInfo['sample_type_r3']);
                $stmt->bindParam(':sample_type_r4', $ReportInfo['sample_type_r4']);
                $stmt->bindParam(':sample_type_r5', $ReportInfo['sample_type_r5']);

                $stmt->execute();
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), (int)$th->getCode());
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
                // if (empty($ReportInfo['FileName'])) { // if no file uploaded
                //     $ReportStatus = '0';
                // } else {
                //     $ReportStatus = '1';
                // }

            // check if file exists
            $ReportInfo['TemplateID'] = substr($ReportInfo['TemplateID'], 0, 1);
            if ($ReportInfo['TemplateID'] == 3) { // if report doesn't need to upload file
                $ReportStatus = '10';
            } elseif (empty($ReportInfo['FileName'])) { // if no file uploaded
                $ReportStatus = '0';
            } else {
                $ReportStatus = '1';
            }

                $now = date("Y-m-d H:i:s");
                $sql = "INSERT INTO Report (
                SampleID, PatientID, SampleNo, scID, HospitalList, HospitalList_Dr, ReportTemplate, ReportTemplateID,
                ReportType, scdate, rcdate, Submitdate, Receiving, Receiving2, TemplateID, 
                ReportID, ReportName, CustomerName, CustomerEmail, CustomerPhone, ReportStatus, HospitalList_ERP,
                CreatedAt, DueDate, SampleType_1, SampleQuantity_1, SampleUnit_1, SampleType_2, SampleQuantity_2, SampleUnit_2
                , SampleType_3, SampleQuantity_3, SampleUnit_3, SampleType_4, SampleQuantity_4, SampleUnit_4, SampleType_5, SampleQuantity_5, SampleUnit_5, proband_name, method, sample_type_r1, sample_type_r2, sample_type_r3, sample_type_r4, sample_type_r5
                ) VALUES (
                :SampleID, :PatientID, :SampleNo, :scID, :HospitalList, :HospitalList_Dr, :ReportTemplate, :ReportTemplateID,
                :ReportType, :scdate, :rcdate, :Submitdate, :Receiving, :Receiving2, :TemplateID, 
                :ReportID, :ReportName, :CustomerName, :CustomerEmail, :CustomerPhone, :ReportStatus, :HospitalList_ERP,
                :CreatedAt, :DueDate, :SampleType_1, :SampleQuantity_1, :SampleUnit_1, :SampleType_2, :SampleQuantity_2, :SampleUnit_2
                , :SampleType_3, :SampleQuantity_3, :SampleUnit_3, :SampleType_4, :SampleQuantity_4, :SampleUnit_4, :SampleType_5, :SampleQuantity_5, :SampleUnit_5, :proband_name, :method, :sample_type_r1, :sample_type_r2, :sample_type_r3, :sample_type_r4, :sample_type_r5
                )";
                $stmt = $this->_conn->prepare($sql);

                // $ReportInfo['DueDate'] = DateTime::createFromFormat('Y-m-d', $ReportInfo['DueDate']);
                             
                try {
                    // 假设 $ReportInfo 是包含所有信息的数组
                    $ReportDate = [
                        'scdate' => $ReportInfo['scdate'],
                        'Submitdate' => $ReportInfo['Submitdate'],
                        'rcdate' => $ReportInfo['rcdate'],
                        // 'ReceivingDate' => $ReportInfo['ReceivingDate'],
                        'DueDate' => $ReportInfo['DueDate'],
                    ];
                
                    // 定义需要转换的日期时间字段
                    $dateTimeFields = ['scdate', 'rcdate', 'Submitdate'];
                    $dateFields = ['DueDate'];
                
                    // 遍历需要转换的字段
                    foreach ($dateTimeFields as $field) {
                        if (!empty($ReportDate[$field])) {
                            $dateTime = DateTime::createFromFormat('Y/n/j h:i A', $ReportDate[$field]);
                            if ($dateTime === false) {
                                throw new Exception("Invalid date format: " . $ReportDate[$field]);
                            }
                            $ReportDate[$field] = $dateTime->format('Y-m-d H:i:s');
                        }
                    }

                        // 遍历需要转换的日期字段
                    foreach ($dateFields as $field) {
                        if (!empty($ReportDate[$field])) {
                            $date = DateTime::createFromFormat('n/j/Y', $ReportDate[$field]);
                            if ($date === false) {
                                throw new Exception("Invalid date format: " . $ReportDate[$field]);
                            }
                            $ReportDate[$field] = $date->format('Y-m-d');
                        } else {
                            // 如果日期字段为空，设置为 NULL
                            $ReportDate[$field] = null;
                        }
                    }
    
                
                } catch (Exception $e) {
                    $ErrorMessage = $e->getMessage();
                    echo $ErrorMessage;
                    // $log->SaveLog("ERROR", $DisplayName, "ReportImportData", date("Y-m-d H:i:s"), $ErrorMessage);
                }

                // $hospitalList = substr($ReportInfo['HospitalList'], 0, 255);
                $ReportInfo['ReportType'] = substr($ReportInfo['ReportType'], 0, 1);
                $ReportInfo['TemplateID'] = substr($ReportInfo['TemplateID'], 0, 1);
                // $ReportInfo['HospitalList'] = substr($ReportInfo['HospitalList'], 0, 1);
                // 假设 $ReportInfo['HospitalList'] 是一个包含数字的字符串
                $hospitalList = $ReportInfo['HospitalList'];

                // 使用正则表达式计算字符串中的数字个数
                preg_match_all('/\d/', $hospitalList, $matches);
                $digitCount = count($matches[0]);

                // 使用数字个数作为 substr 的长度
                $ReportInfo['HospitalList'] = substr($hospitalList, -$digitCount);

                $stmt->bindParam(':SampleID', $ReportInfo['SampleID']);
                $stmt->bindParam(':PatientID', $ReportInfo['PatientID']);
                $stmt->bindParam(':SampleNo', $ReportInfo['SampleNo']);
                $stmt->bindParam(':scID', $ReportInfo['scID']);
                $stmt->bindParam(':HospitalList', $ReportInfo['HospitalList']);
                $stmt->bindParam(':HospitalList_Dr', $ReportInfo['HospitalList_Dr']);
                $stmt->bindParam(':ReportTemplate', $ReportInfo['ReportTemplate']);
                $stmt->bindParam(':ReportTemplateID', $ReportInfo['ReportTemplateID']);
                $stmt->bindParam(':ReportType', $ReportInfo['ReportType']);
                $stmt->bindParam(':scdate', $ReportDate['scdate']);
                $stmt->bindParam(':Submitdate', $ReportDate['Submitdate']);
                $stmt->bindParam(':rcdate', $ReportDate['rcdate']);
                // $stmt->bindParam(':ReceivingDate', $ReportDate['ReceivingDate']);
                $stmt->bindParam(':Receiving', $ReportInfo['Receiving']);
                $stmt->bindParam(':Receiving2', $ReportInfo['Receiving2']);
                $stmt->bindParam(':TemplateID', $ReportInfo['TemplateID']);
                $stmt->bindParam(':ReportID', $ReportInfo['ReportID']);
                $stmt->bindParam(':ReportName', $ReportInfo['ReportName']);
                $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
                $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
                $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
                $stmt->bindParam(':DueDate', $ReportDate['DueDate']);
                $stmt->bindParam(':ReportStatus', $ReportStatus);
                $stmt->bindParam(':HospitalList_ERP', $ReportInfo['HospitalList_ERP']);
                $stmt->bindParam(':CreatedAt', $now);
                $stmt->bindParam(':SampleType_1', $ReportInfo['SampleType_1']);
                $stmt->bindParam(':SampleQuantity_1', $ReportInfo['SampleQuantity_1']);
                $stmt->bindParam(':SampleUnit_1', $ReportInfo['SampleUnit_1']);
                $stmt->bindParam(':SampleType_2', $ReportInfo['SampleType_2']);
                $stmt->bindParam(':SampleQuantity_2', $ReportInfo['SampleQuantity_2']);
                $stmt->bindParam(':SampleUnit_2', $ReportInfo['SampleUnit_2']);
                $stmt->bindParam(':SampleType_3', $ReportInfo['SampleType_3']);
                $stmt->bindParam(':SampleQuantity_3', $ReportInfo['SampleQuantity_3']);
                $stmt->bindParam(':SampleUnit_3', $ReportInfo['SampleUnit_3']);
                $stmt->bindParam(':SampleType_4', $ReportInfo['SampleType_4']);
                $stmt->bindParam(':SampleQuantity_4', $ReportInfo['SampleQuantity_4']);
                $stmt->bindParam(':SampleUnit_4', $ReportInfo['SampleUnit_4']);
                $stmt->bindParam(':SampleType_5', $ReportInfo['SampleType_5']);
                $stmt->bindParam(':SampleQuantity_5', $ReportInfo['SampleQuantity_5']);
                $stmt->bindParam(':SampleUnit_5', $ReportInfo['SampleUnit_5']);
                $stmt->bindParam(':proband_name', $ReportInfo['proband_name']);
                $stmt->bindParam(':method', $ReportInfo['method']);
                $stmt->bindParam(':sample_type_r1', $ReportInfo['sample_type_r1']);
                $stmt->bindParam(':sample_type_r2', $ReportInfo['sample_type_r2']);
                $stmt->bindParam(':sample_type_r3', $ReportInfo['sample_type_r3']);
                $stmt->bindParam(':sample_type_r4', $ReportInfo['sample_type_r4']);
                $stmt->bindParam(':sample_type_r5', $ReportInfo['sample_type_r5']);


                $stmt->execute();
            }
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }
    public function UpdateReportFileName($ReportInfo)
    {
        try {
            $hospitalList = new Report();
            $hospitalList = $hospitalList->getHospitalList();
            //get hospitalList name
            $hospitalList = $hospitalList[$ReportInfo['HospitalList']];

            $sql = "UPDATE Report SET FileName=:FileName, RejectReason='', ReportStatus=:ReportDtatus  WHERE ReportID=:ReportID";
            $ReportInfo['ReportName'] = str_replace(' ', '_', $ReportInfo['ReportName']);

            $FileName = '[檢測報告]_'. $hospitalList . "_(" . $ReportInfo['ReportID'] . ")_".$ReportInfo['ReportName'].".pdf";
            $ReportStatus = '1';

            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ReportID', $ReportInfo['ReportID']);
            $stmt->bindParam(':FileName', $FileName);
            $stmt->bindParam(':ReportDtatus', $ReportStatus);
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

            $hospitalList = new Report();
            $hospitalList = $hospitalList->getHospitalList();
            //get hospitalList name
            $hospitalList = $hospitalList[$ReportInfo['HospitalList']];
            if ($ReportInfo['TemplateID'] == 3) {
                $ReportStatus = '10';
                $RejectReason = '';
                $FileName = '';
            } elseif (empty($ReportInfo['FileName'])) {
                $ReportStatus = '0';
                $RejectReason = $ReportInfo['RejectReason'];
                $FileName = '';
            } else {
                $ReportStatus = '1';
                $RejectReason = '';
                $ReportInfo['ReportName'] = str_replace(' ', '_', $ReportInfo['ReportName']);

                $FileName = '[檢測報告]_'. $hospitalList . "_(" . $ReportInfo['ReportID'] . ")_".$ReportInfo['ReportName'].".pdf";

            }

                //switch case
                switch ($ReportInfo['SampleType_1']) {
                    case 'EDTA紫頭管-全血':
                        $ReportInfo['sample_type_r1'] = "血液檢體";
                        break;
                    case 'Streck cfDNA BCT(迷彩管)-全血':
                        $ReportInfo['sample_type_r1'] = "血液檢體";
                        break;
                    case 'Streck RNA Complete BCT(橘頭管)-全血':
                        $ReportInfo['sample_type_r1'] = "血液檢體";
                        break;
                    case '5 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r1'] = "FFPE";
                        break;
                    case '10 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r1'] = "FFPE";
                        break;
                    case '染色圈片':
                        $ReportInfo['sample_type_r1'] = "FFPE";
                        break;
                    case '粗針穿刺檢體':
                        $ReportInfo['sample_type_r1'] = "FFPE";
                        break;
                    case 'gDNA':
                        $ReportInfo['sample_type_r1'] = "gDNA";
                        break;
                    case '口腔拭子-口腔黏膜細胞':
                        $ReportInfo['sample_type_r1'] = "口腔黏膜";
                        break;
                    case '生資分析':
                        $ReportInfo['sample_type_r1'] = "生資分析";
                        break;
                    case '細胞懸浮液':
                        $ReportInfo['sample_type_r1'] = "細胞懸浮液";
                        break;
                default:
                    break;
            
                }
                
                switch ($ReportInfo['SampleType_2']) {
                    case 'EDTA紫頭管-全血':
                        $ReportInfo['sample_type_r2'] = "血液檢體";
                        break;
                    case 'Streck cfDNA BCT(迷彩管)-全血':
                        $ReportInfo['sample_type_r2'] = "血液檢體";
                        break;
                    case 'Streck RNA Complete BCT(橘頭管)-全血':
                        $ReportInfo['sample_type_r2'] = "血液檢體";
                        break;
                    case '5 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r2'] = "FFPE";
                        break;
                    case '10 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r2'] = "FFPE";
                        break;
                    case '染色圈片':
                        $ReportInfo['sample_type_r2'] = "FFPE";
                        break;
                    case '粗針穿刺檢體':
                        $ReportInfo['sample_type_r2'] = "FFPE";
                        break;
                    case 'gDNA':
                        $ReportInfo['sample_type_r2'] = "gDNA";
                        break;
                    case '口腔拭子-口腔黏膜細胞':
                        $ReportInfo['sample_type_r2'] = "口腔黏膜";
                        break;
                    case '生資分析':
                        $ReportInfo['sample_type_r2'] = "生資分析";
                        break;
                    case '細胞懸浮液':
                        $ReportInfo['sample_type_r2'] = "細胞懸浮液";
                        break;
                default:
                    break;
            
                }
                switch ($ReportInfo['SampleType_3']) {
                    case 'EDTA紫頭管-全血':
                        $ReportInfo['sample_type_r3'] = "血液檢體";
                        break;
                    case 'Streck cfDNA BCT(迷彩管)-全血':
                        $ReportInfo['sample_type_r3'] = "血液檢體";
                        break;
                    case 'Streck RNA Complete BCT(橘頭管)-全血':
                        $ReportInfo['sample_type_r3'] = "血液檢體";
                        break;
                    case '5 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r3'] = "FFPE";
                        break;
                    case '10 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r3'] = "FFPE";
                        break;
                    case '染色圈片':
                        $ReportInfo['sample_type_r3'] = "FFPE";
                        break;
                    case '粗針穿刺檢體':
                        $ReportInfo['sample_type_r3'] = "FFPE";
                        break;
                    case 'gDNA':
                        $ReportInfo['sample_type_r3'] = "gDNA";
                        break;
                    case '口腔拭子-口腔黏膜細胞':
                        $ReportInfo['sample_type_r3'] = "口腔黏膜";
                        break;
                    case '生資分析':
                        $ReportInfo['sample_type_r3'] = "生資分析";
                        break;
                    case '細胞懸浮液':
                        $ReportInfo['sample_type_r3'] = "細胞懸浮液";
                        break;
                default:
                    break;
            
                }
                switch ($ReportInfo['SampleType_4']) {
                    case 'EDTA紫頭管-全血':
                        $ReportInfo['sample_type_r4'] = "血液檢體";
                        break;
                    case 'Streck cfDNA BCT(迷彩管)-全血':
                        $ReportInfo['sample_type_r4'] = "血液檢體";
                        break;
                    case 'Streck RNA Complete BCT(橘頭管)-全血':
                        $ReportInfo['sample_type_r4'] = "血液檢體";
                        break;
                    case '5 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r4'] = "FFPE";
                        break;
                    case '10 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r4'] = "FFPE";
                        break;
                    case '染色圈片':
                        $ReportInfo['sample_type_r4'] = "FFPE";
                        break;
                    case '粗針穿刺檢體':
                        $ReportInfo['sample_type_r4'] = "FFPE";
                        break;
                    case 'gDNA':
                        $ReportInfo['sample_type_r4'] = "gDNA";
                        break;
                    case '口腔拭子-口腔黏膜細胞':
                        $ReportInfo['sample_type_r4'] = "口腔黏膜";
                        break;
                    case '生資分析':
                        $ReportInfo['sample_type_r4'] = "生資分析";
                        break;
                    case '細胞懸浮液':
                        $ReportInfo['sample_type_r4'] = "細胞懸浮液";
                        break;
                default:
                    break;
            
                }                
                switch ($ReportInfo['SampleType_5']) {
                    case 'EDTA紫頭管-全血':
                        $ReportInfo['sample_type_r5'] = "血液檢體";
                        break;
                    case 'Streck cfDNA BCT(迷彩管)-全血':
                        $ReportInfo['sample_type_r5'] = "血液檢體";
                        break;
                    case 'Streck RNA Complete BCT(橘頭管)-全血':
                        $ReportInfo['sample_type_r5'] = "血液檢體";
                        break;
                    case '5 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r5'] = "FFPE";
                        break;
                    case '10 ㎛ FFPE玻片(不含圈片)':
                        $ReportInfo['sample_type_r5'] = "FFPE";
                        break;
                    case '染色圈片':
                        $ReportInfo['sample_type_r5'] = "FFPE";
                        break;
                    case '粗針穿刺檢體':
                        $ReportInfo['sample_type_r5'] = "FFPE";
                        break;
                    case 'gDNA':
                        $ReportInfo['sample_type_r5'] = "gDNA";
                        break;
                    case '口腔拭子-口腔黏膜細胞':
                        $ReportInfo['sample_type_r5'] = "口腔黏膜";
                        break;
                    case '生資分析':
                        $ReportInfo['sample_type_r5'] = "生資分析";
                        break;
                    case '細胞懸浮液':
                        $ReportInfo['sample_type_r5'] = "細胞懸浮液";
                        break;
                default:
                    break;
            
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
                HospitalList_Dr=:HospitalList_Dr,
                method=:method,
                Submitdate=:Submitdate,
                ReportStatus=:ReportStatus,
                UpdatedAt=:UpdatedAt,
                DueDate=:DueDate,
                CustomerName=:CustomerName,
                CustomerEmail=:CustomerEmail,
                CustomerPhone=:CustomerPhone,
                RejectReason=:RejectReason,
                SampleNo=:SampleNo,
                PatientID=:PatientID,
                scID=:scID,
                scdate=:scdate,
                rcdate=:rcdate, 
                ReportTemplate = :ReportTemplate,
                proband_name = :proband_name,
                SampleType_1 = :SampleType_1,
                SampleQuantity_1 = :SampleQuantity_1,
                SampleUnit_1 = :SampleUnit_1,
                SampleType_2 = :SampleType_2,
                SampleQuantity_2 = :SampleQuantity_2,
                SampleUnit_2 = :SampleUnit_2,
                SampleType_3 = :SampleType_3,
                SampleQuantity_3 = :SampleQuantity_3,
                SampleUnit_3 = :SampleUnit_3,
                SampleType_4 = :SampleType_4,
                SampleQuantity_4 = :SampleQuantity_4,
                SampleUnit_4 = :SampleUnit_4,
                SampleType_5 = :SampleType_5,
                SampleQuantity_5 = :SampleQuantity_5,
                SampleUnit_5 = :SampleUnit_5,
                Receiving = :Receiving,
                Receiving2 = :Receiving2,
                sample_type_r1 = :sample_type_r1,
                sample_type_r2 = :sample_type_r2,
                sample_type_r3 = :sample_type_r3,
                sample_type_r4 = :sample_type_r4,
                sample_type_r5 = :sample_type_r5
                WHERE ID=:ID";

                
            // 無上傳申請單SQL
            $sql1 = "UPDATE Report SET
                ReportName=:ReportName,
                FileName=:FileName,
                ReportType=:ReportType,
                TemplateID=:TemplateID,
                ccemail=:ccemail,
                HospitalList=:HospitalList,
                HospitalList_Dr=:HospitalList_Dr,
                method=:method,
                Submitdate=:Submitdate,
                ReportStatus=:ReportStatus,
                UpdatedAt=:UpdatedAt,
                DueDate=:DueDate,
                CustomerName=:CustomerName,
                CustomerEmail=:CustomerEmail,
                CustomerPhone=:CustomerPhone,
                RejectReason=:RejectReason,
                SampleNo=:SampleNo,
                PatientID=:PatientID,
                scID=:scID,
                scdate=:scdate,
                rcdate=:rcdate,
                ReportTemplate = :ReportTemplate,
                proband_name = :proband_name,
                SampleType_1 = :SampleType_1,
                SampleQuantity_1 = :SampleQuantity_1,
                SampleUnit_1 = :SampleUnit_1,
                SampleType_2 = :SampleType_2,
                SampleQuantity_2 = :SampleQuantity_2,
                SampleUnit_2 = :SampleUnit_2,
                SampleType_3 = :SampleType_3,
                SampleQuantity_3 = :SampleQuantity_3,
                SampleUnit_3 = :SampleUnit_3,
                SampleType_4 = :SampleType_4,
                SampleQuantity_4 = :SampleQuantity_4,
                SampleUnit_4 = :SampleUnit_4,
                SampleType_5 = :SampleType_5,
                SampleQuantity_5 = :SampleQuantity_5,
                SampleUnit_5 = :SampleUnit_5,
                Receiving = :Receiving,
                Receiving2 = :Receiving2,
                sample_type_r1 = :sample_type_r1,
                sample_type_r2 = :sample_type_r2,
                sample_type_r3 = :sample_type_r3,
                sample_type_r4 = :sample_type_r4,
                sample_type_r5 = :sample_type_r5
                WHERE ID=:ID";

            if (!empty($_FILES['ReportApply']['name']) ) {
                $stmt = $this->_conn->prepare($sql);
                $stmt->bindParam(':ReportName', $ReportInfo['ReportName']);    
                $stmt->bindValue(':FileName', $FileName);
                $ReportApplyName = '[服務申請單] '. $hospitalList . "_(" . $ReportInfo['ReportID'] . ").pdf";
                $stmt->bindValue(':apply_pdf', $ReportApplyName);
                $stmt->bindParam(':ReportType', $ReportInfo['ReportType']);
                $stmt->bindParam(':TemplateID', $ReportInfo['TemplateID']);
                $stmt->bindParam(':ccemail', $ReportInfo['ccemail']);
                $stmt->bindParam(':HospitalList', $ReportInfo['HospitalList']);
                $stmt->bindParam(':HospitalList_Dr', $ReportInfo['HospitalList_Dr']);
                $stmt->bindParam(':method', $ReportInfo['method']);
                $stmt->bindParam(':Submitdate', $ReportInfo['Submitdate']);
                $stmt->bindParam(':ReportStatus', $ReportStatus);
                $stmt->bindParam(':UpdatedAt', $now);
                $stmt->bindParam(':DueDate', $ReportInfo['DueDate']);
                $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
                $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
                $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
                $stmt->bindParam(':RejectReason', $RejectReason);
                $stmt->bindParam(':SampleNo', $ReportInfo['SampleNo']);
                $stmt->bindParam(':PatientID', $ReportInfo['PatientID']);
                $stmt->bindParam(':scID', $ReportInfo['scID']);
                $stmt->bindParam(':scdate', $ReportInfo['scdate']);
                $stmt->bindParam(':rcdate', $ReportInfo['rcdate']);
                $stmt->bindParam(':ReportTemplate', $ReportInfo['ReportTemplate']);
                $stmt->bindParam(':ID', $ReportInfo['ID']);
                $stmt->bindParam(':proband_name', $ReportInfo['proband_name']);
                $stmt->bindParam(':SampleType_1', $ReportInfo['SampleType_1']);
                $stmt->bindParam(':SampleQuantity_1', $ReportInfo['SampleQuantity_1']);
                $stmt->bindParam(':SampleUnit_1', $ReportInfo['SampleUnit_1']);
                $stmt->bindParam(':SampleType_2', $ReportInfo['SampleType_2']);
                $stmt->bindParam(':SampleQuantity_2', $ReportInfo['SampleQuantity_2']);
                $stmt->bindParam(':SampleUnit_2', $ReportInfo['SampleUnit_2']);
                $stmt->bindParam(':SampleType_3', $ReportInfo['SampleType_3']);
                $stmt->bindParam(':SampleQuantity_3', $ReportInfo['SampleQuantity_3']);
                $stmt->bindParam(':SampleUnit_3', $ReportInfo['SampleUnit_3']);
                $stmt->bindParam(':SampleType_4', $ReportInfo['SampleType_4']);
                $stmt->bindParam(':SampleQuantity_4', $ReportInfo['SampleQuantity_4']);
                $stmt->bindParam(':SampleUnit_4', $ReportInfo['SampleUnit_4']);
                $stmt->bindParam(':SampleType_5', $ReportInfo['SampleType_5']);
                $stmt->bindParam(':SampleQuantity_5', $ReportInfo['SampleQuantity_5']);
                $stmt->bindParam(':SampleUnit_5', $ReportInfo['SampleUnit_5']);
                $stmt->bindParam(':Receiving', $ReportInfo['Receiving']);
                $stmt->bindParam(':Receiving2', $ReportInfo['Receiving2']);
                $stmt->bindParam(':sample_type_r1', $ReportInfo['sample_type_r1']);
                $stmt->bindParam(':sample_type_r2', $ReportInfo['sample_type_r2']);
                $stmt->bindParam(':sample_type_r3', $ReportInfo['sample_type_r3']);
                $stmt->bindParam(':sample_type_r4', $ReportInfo['sample_type_r4']);
                $stmt->bindParam(':sample_type_r5', $ReportInfo['sample_type_r5']);


                // $stmt->execute();

            }else{
                $stmt = $this->_conn->prepare($sql1);
                $stmt->bindParam(':ReportName', $ReportInfo['ReportName']);    
                $stmt->bindValue(':FileName', $FileName);
                $stmt->bindParam(':ReportType', $ReportInfo['ReportType']);
                $stmt->bindParam(':TemplateID', $ReportInfo['TemplateID']);
                $stmt->bindParam(':ccemail', $ReportInfo['ccemail']);
                $stmt->bindParam(':HospitalList', $ReportInfo['HospitalList']);
                $stmt->bindParam(':HospitalList_Dr', $ReportInfo['HospitalList_Dr']);
                $stmt->bindParam(':method', $ReportInfo['method']);
                $stmt->bindParam(':Submitdate', $ReportInfo['Submitdate']);
                $stmt->bindParam(':ReportStatus', $ReportStatus);
                $stmt->bindParam(':UpdatedAt', $now);
                $stmt->bindParam(':DueDate', $ReportInfo['DueDate']);
                $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
                $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
                $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
                $stmt->bindParam(':RejectReason', $RejectReason);
                $stmt->bindParam(':SampleNo', $ReportInfo['SampleNo']);
                $stmt->bindParam(':PatientID', $ReportInfo['PatientID']);
                $stmt->bindParam(':scID', $ReportInfo['scID']);
                $stmt->bindParam(':scdate', $ReportInfo['scdate']);
                $stmt->bindParam(':rcdate', $ReportInfo['rcdate']);
                $stmt->bindParam(':ReportTemplate', $ReportInfo['ReportTemplate']);
                $stmt->bindParam(':ID', $ReportInfo['ID']);
                $stmt->bindParam(':proband_name', $ReportInfo['proband_name']);
                $stmt->bindParam(':SampleType_1', $ReportInfo['SampleType_1']);
                $stmt->bindParam(':SampleQuantity_1', $ReportInfo['SampleQuantity_1']);
                $stmt->bindParam(':SampleUnit_1', $ReportInfo['SampleUnit_1']);
                $stmt->bindParam(':SampleType_2', $ReportInfo['SampleType_2']);
                $stmt->bindParam(':SampleQuantity_2', $ReportInfo['SampleQuantity_2']);
                $stmt->bindParam(':SampleUnit_2', $ReportInfo['SampleUnit_2']);
                $stmt->bindParam(':SampleType_3', $ReportInfo['SampleType_3']);
                $stmt->bindParam(':SampleQuantity_3', $ReportInfo['SampleQuantity_3']);
                $stmt->bindParam(':SampleUnit_3', $ReportInfo['SampleUnit_3']);
                $stmt->bindParam(':SampleType_4', $ReportInfo['SampleType_4']);
                $stmt->bindParam(':SampleQuantity_4', $ReportInfo['SampleQuantity_4']);
                $stmt->bindParam(':SampleUnit_4', $ReportInfo['SampleUnit_4']);
                $stmt->bindParam(':SampleType_5', $ReportInfo['SampleType_5']);
                $stmt->bindParam(':SampleQuantity_5', $ReportInfo['SampleQuantity_5']);
                $stmt->bindParam(':SampleUnit_5', $ReportInfo['SampleUnit_5']);
                $stmt->bindParam(':Receiving', $ReportInfo['Receiving']);
                $stmt->bindParam(':Receiving2', $ReportInfo['Receiving2']);
                $stmt->bindParam(':sample_type_r1', $ReportInfo['sample_type_r1']);
                $stmt->bindParam(':sample_type_r2', $ReportInfo['sample_type_r2']);
                $stmt->bindParam(':sample_type_r3', $ReportInfo['sample_type_r3']);
                $stmt->bindParam(':sample_type_r4', $ReportInfo['sample_type_r4']);
                $stmt->bindParam(':sample_type_r5', $ReportInfo['sample_type_r5']);

            }

            // if(!empty($_FILES['ReportApply']['name'])){
            //     $ReportApplyName = $_FILES['ReportApply']['name'] ;
            //     $stmt->bindValue(':apply_pdf', $_FILES['ReportApply']['name']);

            // }else{
            //     $stmt = $this->_conn->prepare($sql1);
            //     $ReportApplyName = null;
            // }

                $stmt->execute();

        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage() . ' Error code: ' . $th->getCode());
        }
        return true;
    }

    public function UpdateReportCustomer($ReportInfo)
    {
        try {
            $sql = "UPDATE Report SET CustomerName=:CustomerName, CustomerEmail=:CustomerEmail, CustomerPhone=:CustomerPhone, ccemail=:ccemail, ReportStatus=:ReportStatus WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            // $FileName = '[重出]_'. $hospitalList . "_(" . $ReportInfo['ReportID'] . ")_".$ReportInfo['ReportName'].".pdf";

            $stmt->bindParam(':CustomerName', $ReportInfo['CustomerName']);
            $stmt->bindParam(':CustomerEmail', $ReportInfo['CustomerEmail']);
            $stmt->bindParam(':CustomerPhone', $ReportInfo['CustomerPhone']);
            $stmt->bindParam(':ccemail', $ReportInfo['ccemail']);
            $ReportStatus = '7';
            $stmt->bindParam(':ReportStatus', $ReportStatus);
            // $stmt->bindParam(':FileName', $FileName);
            $stmt->bindParam(':ID', $ReportInfo['ID']);
            $stmt->execute();
        } catch (PDOException | Exception $th) {
            throw new Exception($th->getMessage(), $th->getCode());
        }
        return true;
    }


    public function Updateccemail($ReportInfo)
    {
        try {
            $sql = "UPDATE Report SET ccemail=:ccemail WHERE id=:ID";
            $stmt = $this->_conn->prepare($sql);
            $stmt->bindParam(':ccemail', $_POST['ccemail']);
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
            if ($ApprovedBy == 'penhua.chang'){
                $ApprovedBy = '張本樺';
            } elseif ($ApprovedBy == 'ivan' ) {
                $ApprovedBy = '陳奕勳';            
            } elseif ($ApprovedBy == 'cindy.huang' ) {
                $ApprovedBy = '黃馨慧';            
            }    
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
            if ($Reject == 'penhua.chang'){
                $Reject = '張本樺';
            } elseif ($Reject == 'ivan' ) {
                $Reject = '陳奕勳';            
            } elseif ($Reject == 'cindy.huang' ) {
                $Reject = '黃馨慧';            
            }    
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