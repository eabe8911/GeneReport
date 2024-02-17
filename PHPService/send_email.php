<?php
use Beta\Microsoft\Graph\Model\Alert;
// Enable Xdebug
if (extension_loaded('xdebug')) {
    ini_set('xdebug.remote_enable', 1);
    ini_set('xdebug.remote_autostart', 1);
}

// Set a breakpoint
xdebug_break();
require_once __DIR__ . "/class/Email.php";
$email = new Email();
$report = new Report($_POST);

// Get the ReportID, CustomerEmail, ReportName,and CustomerName values from the form
$ReportID = $_POST['ReportID'];
$CustomerEmail = $_POST['CustomerEmail'];
$ccemail = $_POST['ccemail'];
$CustomerName = $_POST['CustomerName'];
$PDFFile = $_POST['PDFFile'];
$ReportName = $_POST['ReportName'];
$Username = $_SESSION['DisplayName'];

// Create a new instance of the Email class

// Send the email
if ($email->SendEmail($ReportID, $Username, $CustomerEmail, $ccemail, $CustomerName, $PDFFile, $ReportName)) {
    
    $report->UpdateReportStatus($ReportID, 8);

} else {
    echo 'Email sending failed.';
}
?>