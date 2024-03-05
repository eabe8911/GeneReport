<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統計管理查詢</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #result {
            padding: 20px;
            background-color: #ddd;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <form action="Statistics.php" id="search" name="search" method="post">
        <!-- 送檢單位 -->
        <div class="form-group">
            <label for="HospitalList" class="col-md-3 control-label">送檢單位:</label>
            <div class="col-md-3">
                {html_options name=HospitalList id=HospitalList options=['' => '請選擇...'] + $HospitalListOptions selected=$HospitalListSelect class="form-control" required="required"}
            </div>
        </div>
        <br>
        <input type="submit" value="查詢">
    </form>
    <br>
    <!-- 如果有回傳值接收php回傳 -->
    <div id="result">總收檢數量：{$result}</div>
    <br>
    <!--
    <script>
        document.getElementById('search').addEventListener('submit', function (e) {
            var start = document.getElementById('start').value;
        })
        // 省略其他代碼
    </script>
    -->
</body>

</html>