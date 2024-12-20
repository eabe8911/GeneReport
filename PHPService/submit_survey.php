<?php

require_once __DIR__ . "/class/DBConnect.php";
require_once __DIR__ . "/class/Log.php";
require_once __DIR__ . "/class/Report.php";
require_once __DIR__ . "/class/Email.php";
// $ReportID = $_GET['ReportID'];
$db = new DBConnect();
$log = new Log();
$Email = new Email();
$report = new Report($_POST);
// $path = $_SERVER['PATH_INFO'];
// $segments = explode('/', $path);
// $ReportID = end($segments);
$email = $HospitalList = $HospitalList1 = $ReportID = $CustomerEmail = $SampleNo = $ReportName = $other_comments = $error = $SampleID = $PatientID = $scID = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ReportID = $_POST['ReportID'];
    $stmt = $db->connect()->prepare("SELECT * FROM Report WHERE ReportID = :ReportID");
    $stmt->bindParam(':ReportID', $ReportID);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // 數據庫中存在此報告 ID
    } else {
        // 數據庫中不存在此報告 ID
        $error = '此報告編號不存在，請重新輸入。';
    }
} else {
    $error = '';
}
$conn = $db->connect();
$sql = "SELECT * FROM Report WHERE ReportID = :ReportID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ReportID', $ReportID);
$stmt->execute();
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach ($reports as $report) {
    $ReportID = $report['ReportID'];
    $CustomerEmail = $report['CustomerEmail'];
    $HospitalList = $report['HospitalList'];
    $SampleNo = $report['SampleNo'];
    $ReportName = $report['ReportName'];
    $SampleID = $report['SampleID'];
    $PatientID = $report['PatientID'];
    $scID = $report['scID'];
    $SampleID = $report['SampleID'];
    
}

if (!empty($HospitalList)) {
    $hospitalList = new Report();
    $hospitalList = $hospitalList->getHospitalList();
    //get hospitalList name
    $hospitalList = $hospitalList[$HospitalList];
    } else {
    $hospitalList = '';
    }
    // switch ($HospitalList1) {
    //     case '1':
    //         $HospitalList = '台大雲林分院';
    //         break;
    //     case '2':
    //         $HospitalList = '台北市立聯合醫院';
    //         break;
    //     case '3':
    //         $HospitalList = '台南市立醫院';
    //         break;
    //     case '4':
    //         $HospitalList = '台南新樓醫院';
    //         break;
    //     case '5':
    //         $HospitalList = '竹山秀傳';
    //         break;
    //     case '6':
    //         $HospitalList = '屏基醫院';
    //         break;
    //     case '7':
    //         $HospitalList = '恩主公醫院';
    //         break;
    //     case '8':
    //         $HospitalList = '國軍803';
    //         break;
    //     case '9':
    //         $HospitalList = '國泰醫院';
    //         break;
    //     case '10':
    //         $HospitalList = '統誠醫療';
    //         break;
    //     case '11':
    //         $HospitalList = '麻豆新樓醫院';
    //         break;
    //     case '12':
    //         $HospitalList = '彰化秀傳';
    //         break;
    //     case '13':
    //         $HospitalList = '彰濱秀傳';
    //         break;
    //     case '14':
    //         $HospitalList = '輔大醫院';
    //         break;
    //     case '15':
    //         $HospitalList = '泓采診所';
    //         break;
    //     case '16':
    //         $HospitalList = '麗寶生醫(自來客)';
    //         break;
    //     case '17':
    //         $HospitalList = '其他';
    //         break;
    //     default:
    //         $HospitalList = '';
    //         break;
    // }



?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<h1><b>麗寶醫事檢驗所-顧客滿意度調查表</b></h1>
<p>SJ4-QC-019（試行版 2024.03.08）
    承蒙您的支持，讓我們有機會為您提供服務。請就本次敝實驗室所
    提供的服務，懇請賜予指導，</p>
<p>您的寶貴意見將成為我們改善服務品質的指標，感謝您熱情的參與！</p>
<table>
    <form action="submit_survey.php" method="post">
        <tr>
            <th><span style="color:red;">*</span>請先輸入您的報告編號：</th>
            <td><input type="text" name="ReportID" value="<?php echo $ReportID ;?>" required autofocus></td>
            <td><input type="submit" value="Submit"></td>
            <!-- 顯示$error -->
            <td><span style="color:red;"><?php echo $error; ?></span></td>
        </tr>
    </form>
</table>
<div id="survey_form">
    <table>
        <form action="submit_survey1.php" method="post">
            <tr>
                <th hidden>報告編號</th>
                <td><input type="text" name="ReportID" value="<?php echo $ReportID; ?>" hidden></td>
            </tr>
            <tr>
                <th>Email：</th>
                <td><input type="email" name="CustomerEmail" value="<?php echo $CustomerEmail; ?>" required></td>
            </tr>
            <tr>
                <th>送檢單位：</th>
                <td><input type="text" name="HospitalList" value="<?php echo $hospitalList; ?>" required></td>
            </tr>

            <tr>
                <th>檢體編號：</th>
                <td><input type="text" name="SampleNo" value="<?php echo $SampleNo; ?>" required></td>
            </tr>
            <tr>
                <th>病歷編號：</th>
                <td><input type="text" name="PatientID" value="<?php echo $PatientID; ?>" required></td>
            </tr>
            <tr>
                <th>採檢單號：</th>
                <td><input type="text" name="scID" value="<?php echo $scID; ?>" required></td>
            </tr>
            <tr>
                <th>檢測項目名稱：</th>
                <td><input type="text" name="ReportName" value="<?php echo $ReportName; ?>" required></td>
            </tr>
            <tr>
                <th>報告內容滿意度：</th>
                <td>
                    <input type="radio" name="report_content_satisfaction1" value="5" required> 非常滿意 (5 分)
                    <input type="radio" name="report_content_satisfaction1" value="4"> 滿意 (4 分)
                    <input type="radio" name="report_content_satisfaction1" value="3"> 無意見 (3 分)
                    <input type="radio" name="report_content_satisfaction1" value="2"> 不滿意 (2 分)
                    <input type="radio" name="report_content_satisfaction1" value="1"> 非常不滿意 (1 分)
                </td>
            </tr>
            <tr>
                <th>檢測分析處理速度：</th>
                <td>
                    <input type="radio" name="report_content_satisfaction2" value="5" required> 非常滿意 (5 分)
                    <input type="radio" name="report_content_satisfaction2" value="4"> 滿意 (4 分)
                    <input type="radio" name="report_content_satisfaction2" value="3"> 無意見 (3 分)
                    <input type="radio" name="report_content_satisfaction2" value="2"> 不滿意 (2 分)
                    <input type="radio" name="report_content_satisfaction2" value="1"> 非常不滿意 (1 分)
                </td>
            </tr>
            <tr>
                <th>服務態度：</th>
                <td>
                    <input type="radio" name="report_content_satisfaction3" value="5" required> 非常滿意 (5 分)
                    <input type="radio" name="report_content_satisfaction3" value="4"> 滿意 (4 分)
                    <input type="radio" name="report_content_satisfaction3" value="3"> 無意見 (3 分)
                    <input type="radio" name="report_content_satisfaction3" value="2"> 不滿意 (2 分)
                    <input type="radio" name="report_content_satisfaction3" value="1"> 非常不滿意 (1 分)
                </td>
            </tr>
            <tr>
                <th>解決問題的能力及效率：</th>
                <td>
                    <input type="radio" name="report_content_satisfaction4" value="5" required> 非常滿意 (5 分)
                    <input type="radio" name="report_content_satisfaction4" value="4"> 滿意 (4 分)
                    <input type="radio" name="report_content_satisfaction4" value="3"> 無意見 (3 分)
                    <input type="radio" name="report_content_satisfaction4" value="2"> 不滿意 (2 分)
                    <input type="radio" name="report_content_satisfaction4" value="1"> 非常不滿意 (1 分)
                </td>
            </tr>
            <tr>
                <th>整體服務滿意度：</th>
                <td>
                    <input type="radio" name="report_content_satisfaction5" value="5" required> 非常滿意 (5 分)
                    <input type="radio" name="report_content_satisfaction5" value="4"> 滿意 (4 分)
                    <input type="radio" name="report_content_satisfaction5" value="3"> 無意見 (3 分)
                    <input type="radio" name="report_content_satisfaction5" value="2"> 不滿意 (2 分)
                    <input type="radio" name="report_content_satisfaction5" value="1"> 非常不滿意 (1 分)
                </td>
            </tr>
            <tr>
                <th>其他意見：</th>
                <td><textarea name="other_comments" style="width: 500px; height: 60px;"></textarea></td>
            </tr>
    </table>
    <br>

    <input type="submit" class="btn btn-primary" style="margin-left: 640px;" value="提　交">
    </form>
</div>
<style>
input[type="radio"] {
    transform: scale(1.2);
}

th {
    text-align: left;
    padding: 8px;
    font-size: 18px;

}

body {
    margin: 15;
    padding: 15;
}
</style>