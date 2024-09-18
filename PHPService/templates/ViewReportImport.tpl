<!DOCTYPE html>
<title>麗寶基因報告系統</title>
<html>

<head>
    <!-- THIS IS THE CSS OF HOME.PHP-->
    {include file="homecss.tpl"}
    {include file="js_ReportImportData.tpl"}


</head>



<body>

    <!--header.tpl THIS PAGE IS FOR HEADER OF HOME.PHP (LOGO AND AGENT NAME)--->
    {include file="header.tpl"}
    <div class="container" style="width:100%;">
        <form action={$FormAction} method="post" enctype="multipart/form-data">
            {$Hiddenfield1}{$Hiddenfield2}{$Hiddenfield3}
            <div>
                <!-- <a href="template.xlsx" download>
                    <h3>下載Excel範本檔</h3>
                </a> -->
                <a href="新報告傳輸系統_Template.xlsm" download>
                    <h3>下載Excel範本檔</h3>

                </a>
                <h4 style="color: red;"><b><輸入完資料請按DONE另存新檔></b></h4>
            </div>
            <center>
                <p>
                    <!-- <label type="button" class="btn btn-custom btn-info btn-md"
                        style="font-weight:bold;font-size:30px;margin:30px;">
                        <input id="ExcelFile" name="ExcelFile" style="display:none;" type="file" accept=".xls, .xlsx">
                        <i class="fa fa-file-excel"></i>請選擇要上傳的Excel檔案
                    </label> -->
                    <input type="file" id="ExcelFile" name="ExcelFile" />

                </p>
                <!-- <p id="FileName">未上傳檔案</p> -->
                <!-- <p>Uploaded file: <?php echo htmlspecialchars($Hiddenfield2, ENT_QUOTES, 'UTF-8'); ?></p>               -->
                <p id="Message">
                <div class="alert alert-danger alert-container" id="alert" {$ShowErrorMessage}>
                    <strong>
                        <center>
                            <h1>{$ErrorMessage}</h1>
                        </center>
                    </strong>
                </div>
                </p>
                <p id="AppointConfirmButton" name="AppointConfirmButton">
                    <button type="button" class="btn btn-custom btn-danger btn-md" id="BtnImportCancel"
                        style="font-weight:bold;font-size:20px;margin:30px;">
                        <i class="fa fa-window-close"></i> 離 開</button>
                    <button type="submit" class="btn btn-custom btn-success btn-md" id="BtnImportSubmit"
                        style="font-weight:bold;font-size:20px;margin:30px;">
                        <i class="fa fa-paper-plane"></i> 提 交</button>
                </p>
            </center>
        </form>
    </div>

</body>

</html>