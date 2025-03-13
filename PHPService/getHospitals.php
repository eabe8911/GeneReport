<?php
// 設定回應的 Content-Type 為 JSON
header('Content-Type: application/json');

// 資料庫連線
$host = '192.168.2.23'; // 資料庫主機
$dbname = 'libodb'; // 資料庫名稱
$username = 'root'; // 使用者名稱
$password = 'Libobio@16653688'; // 密碼


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 查詢醫院資料
    $stmt = $pdo->prepare('SELECT id, Name FROM HospitalList'); // 假設資料表名稱是 hospitals
    $stmt->execute();

    // 取得所有資料並以 JSON 格式輸出
    $hospitals = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($hospitals);
} catch (PDOException $e) {
    // 返回錯誤訊息
    echo json_encode(['error' => $e->getMessage()]);
}
?>