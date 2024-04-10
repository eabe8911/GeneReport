<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/class/DBConnect.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet as PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new PhpSpreadsheet();

try {

    // Connect to database
    $db = new DBConnect;


    $conn = $db->connect();
    $sql = "SELECT * FROM customer_satisfaction";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Create new PHPExcel object
    $objPHPExcel = new PhpSpreadsheet();

    // Set document properties
    $objPHPExcel->getProperties()->setCreator("You")
                                 ->setLastModifiedBy("You")
                                 ->setTitle("Customer Satisfaction Report")
                                 ->setSubject("Customer Satisfaction Report")
                                 ->setDescription("Report of customer satisfaction.");
    $objPHPExcel->getActiveSheet()->getStyle('A:L')
    ->getAlignment()
    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    // Add some data
    $rowNumber = 1;
    $headings = array("編號", "報告編號", "Email", "送檢單位", "原樣本代號", "檢測項目名稱", "報告內容滿意度", "檢測分析處理速度", "服務態度" ,"解決問題的能力及效率", "整體服務滿意度", "其他意見"); // Replace with your columns
    $objPHPExcel->getActiveSheet()->fromArray(array($headings),NULL,'A'.$rowNumber);

    $objPHPExcel->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(4.5);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(13);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(11);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(28);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

    $rowNumber++;
    foreach ($response as $data) {
        $objPHPExcel->getActiveSheet()->fromArray(array_values($data), NULL, 'A' . $rowNumber);
        $rowNumber++;
    }


    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('滿意度調查報告');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Excel2007)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="customer_satisfaction.xlsx"');
    header('Cache-Control: max-age=0');

    $objWriter = IOFactory::createWriter($objPHPExcel, 'Xlsx');
    $objWriter->save('php://output');
    exit;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


$smarty->assign("IncludePage2", "download.tpl");
$smarty->display('View_download.tpl');
?>