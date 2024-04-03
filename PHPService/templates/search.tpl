<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統計管理查詢</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10;
            padding: 10;
            background-color: #f0f0f0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4c74af;
            color: white;
            padding: 7px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #a0aec4;
        }

        #result {
            padding: 20px;
            background-color: #ddd;
            margin-bottom: 15px;
        }

        .form-hint {
            color: rgb(255, 0, 0);
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        .report-link {
            margin-bottom: -15px;  /* 调整行间距 */
            margin-right: -15px;  /* 调整列间距 */
        }

    </style>
</head>

<body>
    <h2><b>麗寶基因報告-統計查詢</b></h2>
    <!-- <button class="btn btn-danger btn-md"> <a href="home.php">回首頁</a></button> -->
    <button class="btn btn-primary btn-md" onclick="location.href='home.php'">回首頁</button>

    <form action="Statistics.php" id="search" name="search" method="post">
        <!-- 送檢單位 -->

        <div class="form-group col-md-4">
            <br>
            <!-- 提醒日期為必填欄位 -->
            <span class="form-hint">*日期區間為必填欄位</span>
            <label for="StartDate"><span style="color: red;">*</span>起始日期:</label>
            <input type="date" id="StartDate" name="StartDate" class="form-control" required="required">
            <label for="EndDate"><span style="color: red;">*</span>結束日期:</label>
            <input type="date" id="EndDate" name="EndDate" class="form-control" required="required">

            <br>
            {html_options name=ReportTypeList id=ReportTypeList options=['' => '請選擇檢測單位'] + $ReportListOptions
             class="form-control" }
            <br>
            {html_options name=HospitalList id=HospitalList options=['' => '請選擇送檢單位'] + $HospitalListOptions
             class="form-control" }
            <br>
            {html_options name=Approved1 id=Approved1 options=['' => '請選擇簽核醫檢師'] + $ApprovedOptions
             class="form-control" }

            <br>
            <div style="text-align: right;">
                <input type="submit" name="Search" class="btn btn-primary" value="Search" tabindex=2>
            </div>
            <br>
        </div>
        <div class="form-group col-md-4">
            <label>
                <br> 
                <h3>統計結果數量：{$result}</h3> 
                <ul>
                    <li>日期範圍：{$StartDate} - {$EndDate}</li>
                    <li>檢測單位：{$ReportTypeName}</li>
                    <li>送檢單位：{$HospitalListName}</li>
                    <li>簽核醫檢師：{$Approved1Name}</li>
                </ul>
            <label>&nbsp;&nbsp;&nbsp;&nbsp;報告編號：
                {foreach from=$result1 item=item}
                <div class="report-link">
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {$item@iteration}. <a href="ReportDetailMaintain.php?id={$item.id}"
                    target="_blank">{$item.ReportID}</a><br>
                </div>
                {/foreach} <br>
            </label>
        </div>
    </form>

    <!-- 如果有回傳值接收php回傳 -->

</body>

</html>