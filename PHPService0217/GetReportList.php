<?php
// Enable Xdebug
if (extension_loaded('xdebug')) {
    ini_set('xdebug.remote_enable', 1);
    ini_set('xdebug.remote_autostart', 1);
}

// Set a breakpoint
xdebug_break();
session_start();
// 產生呼叫範例
// http://localhost:8080/PHPService/GetReportList.php?userid=000000&permission=1&role=1&character=User&page=1&limit=10&sidx=1&sord=asc
date_default_timezone_set("Asia/Taipei");
require_once __DIR__ . "/class/DBConnect.php";
require_once __DIR__ . "/class/User.php";
require_once __DIR__ . "/class/Member.php";
$objDb = new DBConnect;
$conn = $objDb->connect();
// 讀取傳入的參數
$UserID = filter_input(INPUT_GET, "userid");
// $CustomerName = filter_input(INPUT_GET, "CustomerName"); // Add this line
// $CustomerName = $_SESSION['DisplayName']; // Add this line
$Email =  $_SESSION['Account']; // Add this line
$Permission = filter_input(INPUT_GET, "permission");
$Role = filter_input(INPUT_GET, "role");
$Character = filter_input(INPUT_GET, "character");
$page = filter_input(INPUT_GET, "page");
$limit = filter_input(INPUT_GET, "limit");
$sidx = filter_input(INPUT_GET, "sidx");
$sord = filter_input(INPUT_GET, "sord");

$where = "";
// 依照角色設定SQL Where字串
switch ($Character) {
    case "User": // User只能看到 Organiztion 的資料
        // 如果 Permission 是 9, 代表是最大管理者, 可以看到所有資料，不用設定 Where
        if ($Permission == 9) {
            $where = "";
        }elseif ($Permission == 4) { //Permission =4 只能看到Reportstatus=4的資料
            $where = " WHERE ReportStatus='2' or ReportStatus='4'  or ReportStatus='8'  ";
        }elseif ($Permission == 0) { //抓到Report裡面的CustomerName資料
            $where = " WHERE CustomerEmail='" . $Email . "' ";    
        } 
        
        else { // 如果 Permission 是 1->管理者、2->醫檢師 或 3->醫師 4->護理師, 只能看到自己的資料
            // $where = " WHERE ReportType='" . $Role . "' ";
            $where = "";

        }
        break;
    case "Member": // Member只能看到UserID的資料
        $where = " WHERE CustomerEmail='" . $Email . "' ";
        break;
    default:
        break;
}
if (!$sidx) {
    $sidx = 1;
}

$totalrows = isset($_REQUEST['totalrows']) ? $_REQUEST['totalrows'] : false;
if ($totalrows) {
    $limit = $totalrows;
}

try {
    $sql = "SELECT COUNT(*) AS count FROM Report $where";
    // echo $sql;
    // die();
    $sth = $conn->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $Count = count($result);
    if ($limit < 1) {
        $limit = 30;
    }

    if ($Count > 0) {
        $total_pages = ceil($Count / $limit);
    } else {
        $total_pages = 0;
    }
    if ($page > $total_pages) {
        $page = $total_pages;
    }
    if ($page < 1) {
        $page = 1;
    }

    if ($limit < 0) {
        $limit = 0;
    }
    // do not put $limit*($page - 1)
    $start = $limit * $page - $limit;
    if ($start < 0) {
        $start = 0;
    }
    $sql = "SELECT * FROM ReportView " . $where . " ORDER BY $sidx $sord LIMIT $start , $limit";
    $sth = $conn->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $Count = count($result);

    if ($Count > 0) {
        $responce = new stdClass();
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $Count;
        $i = 0;

        foreach ($result as $row) {
            $ReportStatus = getReportStatus($row['ReportStatus']);
            $responce->rows[$i]['id'] = $row['id'];
            $responce->rows[$i]['cell'] = array(
                $row['id'],
                $row['ReportID'],
                $row['CustomerName'],
                $row['ReportName'],
                $row['FileName'],
                $row['Approved1'],
                $row['Approved1At'],
                $row['Approved2'],
                $row['Approved2At'],
                $row['ReportTypeName'],
                // $row['OrgName'],
                $row['DueDate'],
                $row['HospitalList'],
                // $row['ReportDescription'],
                $ReportStatus,
                $row['CreatedAt'],
                $row['UpdatedAt'],

            );
            $i++;
        }
        echo json_encode($responce);
    }
} catch (PDOException $e) {
    //reports a DB connection failure
    header("HTTP/1.0 400 Bad Request");
    echo ($e->getMessage());
}
//closes the DB
$conn = null;

function getReportStatus($type)
{
    switch ($type) {
        case '0':
            $status = "報告未上傳";
            break;
        case '1':
            $status = "報告已上傳，未審核";
            break;
        case '2':
            $status = "實驗室已審核";
            break;
        case '3':
            $status = "實驗室退回<br />請重新上傳報告";
            break;
        case '4':
            $status = "醫師已審核";
            break;
        case '5':
            $status = "醫師已退回<br />請重新上傳報告";
            break;
        case '6':
            $status = "可寄送報告";
            break;
        case '7':
            $status = "重出";
            break;
        case '8':
            $status = "已寄送報告";
            break;
        default:
            $status = "";
            break;
    }
    return $status;
}