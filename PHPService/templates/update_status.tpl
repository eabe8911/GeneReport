<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>審核送檢單位</title>
    <script>
        function updateHospitalName() {
            var select = document.getElementById("hospitalSelect");
            var input = document.getElementById("HospitalName");
            input.value = select.options[select.selectedIndex].value;
        }
    </script>
</head>

<body>
    <div>
        <h1>審核送檢單位</h1>
        <form action="update_status.php" method="POST">
            <!-- 送檢單位 -->
            <label for="hospitalSelect">選擇送檢單位:</label>
            <select id="hospitalSelect" name="hospitalSelect" onchange="updateHospitalName()">
                {foreach from=$hospitalNames item=hospitalName}
                    <option value="{$hospitalName|escape}">{$hospitalName|escape}</option>
                {/foreach}
            </select>
            <br><br>
            <label for="HospitalName">送檢單位名稱:</label>
            <input type="text" id="HospitalName" name="HospitalName" value="" readonly>
            <!-- 狀態 -->
            <label for="status">狀態:</label>
            <select id="status" name="Status" required>
                <option value="approved">批准</option>
                <option value="pending">待審核</option>
                <option value="rejected">拒絕</option>
            </select>
            <br><br>
        
            <!-- 提交按鈕 -->
            <button type="submit">更新狀態</button>
        </form>
    </div>
</body>

</html>