<!DOCTYPE html>
<html>
<title>麗寶基因報告系統</title>

<head>
    <!-- THIS IS THE CSS OF HOME.PHP-->
    {include file="homecss.tpl"}
    <!--homejs.tpl IS JAVASCRIPT PAGE FOR HOME-->
    {include file="js_home.tpl"}
</head>

<body>

    <!---- hidden fields ---->
    <input type="hidden" id="UserID" name="UserID" value="{$UserID}">
    <input type="hidden" id="Permission" name="Permission" value={$Permission}>
    <input type="hidden" id="Role" name="Role" value={$Role}>
    <input type="hidden" id="Character" name="Character" value={$Character}>
    <!-- <input type="hidden" id="CustomerName" name="CustomerName" value="{$CustomerName}"> -->

    <!--header.tpl THIS PAGE IS FOR HEADER OF HOME.PHP (LOGO AND AGENT NAME)--->
    {include file="header_home.tpl"}
    <div class="row" style="margin-left: 10px;margin-right: 10px;">
        <!---- 預約日期 ---->
        <div class="col-md-5" style="padding:10px">
            <!-- <label for="query_appoint_date" style="text-align:right;font-size:20px;">日期：</label>
            <input type="text" id="query_appoint_date" style="font-weight:bold;font-size:20px;">
            <button id="BtnQuery" class="btn btn-custom btn-info btn-md" style="font-size:16px"><i
                    class="fa fa-search"></i> 查 詢 </button> -->
        </div>
        <!---- 查詢 ---->
        <!-- 如果permission = 4 不顯示search欄位 -->
        {if $Permission != 4 && $Permission != 0 && $Permission != 2 && $Permission != 3}
        <!-- <button id="BtnQuery" class="btn btn-custom btn-info btn-md" style="font-size:16px">
            <i class="fa fa-search"></i>
            <a href="log_table.php">查看紀錄</a></button> -->
            <br>

        <button class="btn btn-primary btn-md" onclick="location.href='log_table.php'" ><i class="fa fa-search"></i>&nbsp;&nbsp;查詢紀錄</button>
  {/if}
        <div class="col-md-3" style="float:right;padding:10px">
            <input type="search" class="form-control input-md" id="SearchTable" name="SearchTable" placeholder="Search"
                style="font-weight:bold;font-size:20px;">
            <!-- <label for="reportType" class="form-control input-md">報告類型：</label> -->
            <select id="SearchStatus" class="form-control input-md">
                <option value="">請選擇</option>
                <option value="報告未上傳">報告未上傳</option>
                <option value="報告已上傳，未審核">報告已上傳，未審核</option>
                <option value="報告已上傳，實驗室已審核">醫檢師已簽核，待醫師審核</option>
                <option value="實驗室退回">醫檢師退回</option>
                <option value="醫師已審核">醫師已審核</option>
                <option value="醫師已退回">醫師退回</option>
                <option value="可寄送報告">待寄送</option>
                <option value="無報告">重出</option>
                <option value="已寄送報告">已寄送</option>
            </select>
        </div>
      
        <div class="row">
            <div class="col-md-12">
                <!--THIS IS THE JQGRID TABLE ,AND THIS FIELD IS CONNECTED TO HOME.PHP-->
                <table id="{$jqGrid}"></table>
                <div id="{$jqGridPager}"></div>
            </div>
        </div>
        {include file="footer.tpl"}
    </div>




</body>

</html>
{include file="js_home.tpl"}