<?php
// Check Auth of session
session_start();
require __DIR__ . "/vendor/autoload.php";

if ($_SESSION["AUTH"] != TRUE) {
    header("Location: index.php");
    session_unset();
    die();
}
use PhpOffice\PhpSpreadsheet\IOFactory;

// require class
require_once __DIR__ . "/class/Report.php";
require_once __DIR__ . "/class/Log.php";
// init log
$log = new Log();
$report = new Report();
// get session
$Account = $_SESSION['Account'];
$DisplayName = $_SESSION['DisplayName'];
$Permission = $_SESSION['Permission'];
// 处理表单提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ReportIDs = filter_input(INPUT_POST, 'ReportIDs', FILTER_SANITIZE_STRING);
    $ReportStatus = 8; // 将状态设置为 8

    if ($ReportIDs) {
        $ReportIDArray = explode(',', $ReportIDs);
        try {
            $conn = new PDO("mysql:host=192.168.2.23;dbname=libodb_test", "root", "Libobio@16653688");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE Report SET ReportStatus = :ReportStatus WHERE ReportID = :ReportID AND ReportStatus = 2";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':ReportStatus', $ReportStatus, PDO::PARAM_INT);

            foreach ($ReportIDArray as $ReportID) {
                $stmt->bindParam(':ReportID', $ReportID, PDO::PARAM_STR);
                $stmt->execute();
            }

            $log->SaveLog("UpdateReportStatus", $Account, "UpdateReportStatus", date("Y-m-d H:i:s"), "Update Report Status, $ReportIDArray");

            echo "Report statuses updated successfully.";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid ReportIDs.";
    }
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Report Status</title>
    <style>
        .large-input {
            width: 1000px;
            height: 50px;
            font-size: 16px;
        }
        .styled-button {
            background-color:rgb(76, 135, 175); 
            border: none; 
            color: white; 
            padding: 9px 30px; 
            text-align: center; 
            text-decoration: none; 
            display: inline-block; 
            font-size: 16px; 
            margin: 4px 2px; 
            cursor: pointer; 
            border-radius: 12px; 
            font-weight: bold;
        }
        .styled-button:hover {
            background-color:rgb(69, 154, 160); 
        }
    </style>
</head>
<body>
    <h1>更新報告狀態</h1>
    
    <form method="post" action="update_report_status.php">
        <label for="ReportIDs">請輸入報告編號(多筆資料可以逗號分隔):</label>
        <br>
        <input type="text" id="ReportIDs" name="ReportIDs"  class="large-input" required>        <br>

        <button type="submit" class="styled-button" >更 新</button>
        <!-- 回 home.php -->
        <a href="home.php" class="styled-button">返回</a>
    </form>
</body>
</html>
