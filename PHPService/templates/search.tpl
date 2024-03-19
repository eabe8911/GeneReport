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
    </style>
</head>

<body>
    <h2><b>麗寶基因報告-統計查詢</b></h2>
    <!-- <button class="btn btn-danger btn-md"> <a href="home.php">回首頁</a></button> -->
    <button class="btn btn-primary btn-md" onclick="location.href='home.php'">回首頁</button>

    <form action="Statistics.php" id="search" name="search" method="post">
        <!-- 送檢單位 -->

        <div class="form-group col-md-3">

            <br>
            <label for="StartDate">起始日期:</label>
            <input type="date" id="StartDate" name="StartDate" class="form-control" >
            <label for="EndDate">結束日期:</label>
            <input type="date" id="EndDate" name="EndDate" class="form-control" >
            <!-- </div>
        <div class="form-group col-md-2"> -->
            <br>
            <!-- <label for="HospitalList" >&nbsp;&nbsp;&nbsp;&nbsp;送檢單位:</label> -->
            {html_options name=HospitalList id=HospitalList options=['' => '請選擇送檢單位'] + $HospitalListOptions
            selected=$HospitalListSelect class="form-control" required="required"}

            <!-- <input type="submit" value="查詢"> -->
            <br>
            <label for="DueDate">Due Date:</label>
            <input type="date" id="DueDate" name="DueDate" class="form-control" >

            <div style="text-align: right;">
                <input type="submit" name="Search" class="btn btn-primary" value="Search" tabindex=2>
            </div>
            <br>
            <!-- <label>&nbsp;&nbsp;&nbsp;&nbsp;總收檢數量：{$result}</label> -->
            <label>&nbsp;&nbsp;&nbsp;&nbsp;總收檢數量：{$result} <br> &nbsp;&nbsp;&nbsp;&nbsp;(日期範圍：{$StartDate} - {$EndDate})
                ({$HospitalList})</label>
            <br>
            <label>&nbsp;&nbsp;&nbsp;&nbsp;DueDate：{$result_DueDate}</label>
            <!-- <label>&nbsp;&nbsp;&nbsp;&nbsp;報告編號：
                {foreach from=$result1 item=reportId name=reportId}

                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {$reportId@iteration}.
                <a href="ReportDetailMaintain.php?id={$id}" target="_blank">{$reportId}</a><br>
                {/foreach} <br>
            </label> -->
            <label>&nbsp;&nbsp;&nbsp;&nbsp;報告編號：
                {foreach from=$result1 item=item}
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {$item@iteration}. <a href="ReportDetailMaintain.php?id={$item.id}" target="_blank">{$item.ReportID}</a>
                {/foreach} <br>
            </label>
        </div>
    </form>


</body>

</html>