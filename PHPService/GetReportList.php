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
        }elseif ($Permission == 4) { //Permission =4 只能看到Reportstatus=4、8的資料
            $where = " WHERE  ReportStatus='2' or ReportStatus='8' or ReportStatus='7' ";
        }elseif ($Permission == 0) { //抓到Report裡面的CustomerName資料
            $where = " WHERE CustomerEmail='" . $Email . "' ";    
        } elseif ($Permission == 3) {
            
            $where = " WHERE HospitalList ='" . $Role . "'";
            switch ($Role) {
                case '1':
                    $where = " WHERE HospitalList = '輔大醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '2':
                    $where = " WHERE HospitalList = '新光醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '3':
                    $where = " WHERE HospitalList = '台北市立聯合醫院' and TemplateID = '2' and ReportStatus='2'  ";
                    break;
                case '4':
                    $where = " WHERE HospitalList = '台北慈濟醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '5':
                    $where = " WHERE HospitalList = '台北榮民總醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '6':
                    $where = " WHERE HospitalList = '恩主公醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '7':
                    $where = " WHERE HospitalList = '雙和醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '8':
                    $where = " WHERE HospitalList = '國泰醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '9':
                    $where = " WHERE HospitalList = '怡仁醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '10':
                    $where = " WHERE HospitalList = '淡水馬偕醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '11':
                    $where = " WHERE HospitalList = '三軍總醫院_台北內湖' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '12':
                    $where = " WHERE HospitalList = '中山醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '13':
                    $where = " WHERE HospitalList = '新家生醫_聯新醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '14':
                    $where = " WHERE HospitalList = '台北市立萬芳醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '15':
                    $where = " WHERE HospitalList = '臺北醫學大學附設醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '16':
                    $where = " WHERE HospitalList = '台中國軍總醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '17':
                    $where = " WHERE HospitalList = '統誠醫療' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '18':
                    $where = " WHERE HospitalList = '彰化秀傳醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '19':
                    $where = " WHERE HospitalList = '國立臺灣大學醫學院附設醫院雲林分院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '20':
                    $where = " WHERE HospitalList = '光田綜合醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '21':
                    $where = " WHERE HospitalList = '澄清綜合醫院中港分院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '22':
                    $where = " WHERE HospitalList = '竹山秀傳醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '23':
                    $where = " WHERE HospitalList = '烏日林新醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '24':
                    $where = " WHERE HospitalList = '彰濱秀傳醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '25':
                    $where = " WHERE HospitalList = '大千綜合醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '26':
                    $where = " WHERE HospitalList = '員榮醫療社團法人員榮醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '27':
                    $where = " WHERE HospitalList = '彰化基督教醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '28':
                    $where = " WHERE HospitalList = '台中榮民總醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '29':
                    $where = " WHERE HospitalList = '台南市立醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '30':
                    $where = " WHERE HospitalList = '麻豆新樓醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '31':
                    $where = " WHERE HospitalList = '台南新樓醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '32':
                    $where = " WHERE HospitalList = '屏東基督教醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '33':
                    $where = " WHERE HospitalList = '高雄長庚醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '34':
                    $where = " WHERE HospitalList = '高雄醫學大學附設醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '35':
                    $where = " WHERE HospitalList = '連江醫院' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                case '36':
                    $where = " WHERE HospitalList = '一般客戶or泓采代採' and TemplateID = '2' and ReportStatus='2' ";
                    break;
                    
                default:
                $where = " WHERE HospitalList = '' ";
                break;
            }
            $where1 = " WHERE Approve ='2'";
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
// if ($Permission == 3) {
//     switch ($Role) {
//         case '1':
//             $where = " WHERE HospitalList = '輔大醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '2':
//             $where = " WHERE HospitalList = '新光醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '3':
//             $where = " WHERE HospitalList = '台北市立聯合醫院' and TemplateID = '2' and ReportStatus='2'  ";
//             break;
//         case '4':
//             $where = " WHERE HospitalList = '台北慈濟醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '5':
//             $where = " WHERE HospitalList = '台北榮民總醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '6':
//             $where = " WHERE HospitalList = '恩主公醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '7':
//             $where = " WHERE HospitalList = '雙和醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '8':
//             $where = " WHERE HospitalList = '國泰醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '9':
//             $where = " WHERE HospitalList = '怡仁醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '10':
//             $where = " WHERE HospitalList = '淡水馬偕醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '11':
//             $where = " WHERE HospitalList = '三軍總醫院_台北內湖' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '12':
//             $where = " WHERE HospitalList = '中山醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '13':
//             $where = " WHERE HospitalList = '新家生醫_聯新醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '14':
//             $where = " WHERE HospitalList = '台北市立萬芳醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '15':
//             $where = " WHERE HospitalList = '臺北醫學大學附設醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '16':
//             $where = " WHERE HospitalList = '台中國軍總醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '17':
//             $where = " WHERE HospitalList = '統誠醫療' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '18':
//             $where = " WHERE HospitalList = '彰化秀傳醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '19':
//             $where = " WHERE HospitalList = '國立臺灣大學醫學院附設醫院雲林分院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '20':
//             $where = " WHERE HospitalList = '光田綜合醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '21':
//             $where = " WHERE HospitalList = '澄清綜合醫院中港分院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '22':
//             $where = " WHERE HospitalList = '竹山秀傳醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '23':
//             $where = " WHERE HospitalList = '烏日林新醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '24':
//             $where = " WHERE HospitalList = '彰濱秀傳醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '25':
//             $where = " WHERE HospitalList = '大千綜合醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '26':
//             $where = " WHERE HospitalList = '員榮醫療社團法人員榮醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '27':
//             $where = " WHERE HospitalList = '彰化基督教醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '28':
//             $where = " WHERE HospitalList = '台中榮民總醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '29':
//             $where = " WHERE HospitalList = '台南市立醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '30':
//             $where = " WHERE HospitalList = '麻豆新樓醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '31':
//             $where = " WHERE HospitalList = '台南新樓醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '32':
//             $where = " WHERE HospitalList = '屏東基督教醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '33':
//             $where = " WHERE HospitalList = '高雄長庚醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '34':
//             $where = " WHERE HospitalList = '高雄醫學大學附設醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '35':
//             $where = " WHERE HospitalList = '連江醫院' and TemplateID = '2' and ReportStatus='2' ";
//             break;
//         case '36':
//             $where = " WHERE HospitalList = '一般客戶or泓采代採' and TemplateID = '2' and ReportStatus='2' ";
//             break;
            
//         default:
//         $where = " WHERE HospitalList = '' ";
//         break;
//     }
// }


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