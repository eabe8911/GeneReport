<?php


require_once __DIR__ . "../class/DBConnect.php";
// Check connection


// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$ReportID = $_POST['ReportID'];
$CustomerEmail = $_POST['CustomerEmail'];
$HospitalList = $_POST['HospitalList'];
$SampleNo = $_POST['SampleNo'];
$ReportName = $_POST['ReportName'];
$other_comments = $_POST['other_comments'];
$report_content_satisfaction1 = $_POST['report_content_satisfaction1'];
$report_content_satisfaction2 = $_POST['report_content_satisfaction2'];
$report_content_satisfaction3 = $_POST['report_content_satisfaction3'];
$report_content_satisfaction4 = $_POST['report_content_satisfaction4'];
$report_content_satisfaction5 = $_POST['report_content_satisfaction5'];

}
// Add more fields as needed

// Prepare and bind
$DBConnect = new DBConnect();
$conn = $DBConnect->connect();
$sql = "INSERT INTO customer_satisfaction(
    ReportID,CustomerEmail,HospitalList,SampleNo,ReportName,other_comments,report_content_satisfaction1,report_content_satisfaction2,report_content_satisfaction3,report_content_satisfaction4,report_content_satisfaction5) 
    VALUES (:ReportID, :CustomerEmail, :HospitalList, :SampleNo, :ReportName, :other_comments, :report_content_satisfaction1, :report_content_satisfaction2, :report_content_satisfaction3, :report_content_satisfaction4, :report_content_satisfaction5)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ReportID', $ReportID);
$stmt->bindParam(':CustomerEmail', $CustomerEmail);
$stmt->bindParam(':HospitalList', $HospitalList);
$stmt->bindParam(':SampleNo', $SampleNo);
$stmt->bindParam(':ReportName', $ReportName);
$stmt->bindParam(':other_comments', $other_comments);
$stmt->bindParam(':report_content_satisfaction1', $report_content_satisfaction1);
$stmt->bindParam(':report_content_satisfaction2', $report_content_satisfaction2);
$stmt->bindParam(':report_content_satisfaction3', $report_content_satisfaction3);
$stmt->bindParam(':report_content_satisfaction4', $report_content_satisfaction4);
$stmt->bindParam(':report_content_satisfaction5', $report_content_satisfaction5);

// Execute the statement
$stmt->execute();



echo "謝謝您的填寫！";

// Close the connection
$conn = null;