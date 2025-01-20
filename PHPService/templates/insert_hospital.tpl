<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增送檢單位</title>


</head>

<body>
    <div>
        <h1>新增送檢單位</h1>
        <form action="insert_hospital.php" name="InsertHospital" method="POST">
            <!-- 送檢單位名稱 -->
            <label for="HospitalName">送檢單位名稱:</label>
            <input type="text" id="HospitalName" name="HospitalName" required>
            <br><br>

            <!-- 提交者 -->
            <label for="SubmittedBy">提交者:</label>
            <input type="text" id="SubmittedBy" name="SubmittedBy" value="{$SubmittedBy}" required>
            <br><br>

            <!-- 提交按鈕 -->
            <button type="submit">提交</button>
        </form>
    </div>
</body>

</html>