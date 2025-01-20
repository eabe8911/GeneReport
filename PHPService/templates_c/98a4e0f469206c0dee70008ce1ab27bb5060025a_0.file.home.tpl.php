<?php
/* Smarty version 4.3.4, created on 2024-12-26 16:02:33
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_676d0d9987a294_63354007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98a4e0f469206c0dee70008ce1ab27bb5060025a' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\home.tpl',
      1 => 1735200151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:homecss.tpl' => 1,
    'file:js_home.tpl' => 2,
    'file:header_home.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_676d0d9987a294_63354007 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<title>麗寶基因報告系統</title>

<head>
    <!-- THIS IS THE CSS OF HOME.PHP-->
    <?php $_smarty_tpl->_subTemplateRender("file:homecss.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!--homejs.tpl IS JAVASCRIPT PAGE FOR HOME-->
    <?php $_smarty_tpl->_subTemplateRender("file:js_home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>

<body>

    <!---- hidden fields ---->
    <input type="hidden" id="UserID" name="UserID" value="<?php echo $_smarty_tpl->tpl_vars['UserID']->value;?>
">
    <input type="hidden" id="Permission" name="Permission" value=<?php echo $_smarty_tpl->tpl_vars['Permission']->value;?>
>
    <input type="hidden" id="Role" name="Role" value=<?php echo $_smarty_tpl->tpl_vars['Role']->value;?>
>
    <input type="hidden" id="Character" name="Character" value=<?php echo $_smarty_tpl->tpl_vars['Character']->value;?>
>
    <!-- <input type="hidden" id="CustomerName" name="CustomerName" value="<?php echo $_smarty_tpl->tpl_vars['CustomerName']->value;?>
"> -->
    <!--header.tpl THIS PAGE IS FOR HEADER OF HOME.PHP (LOGO AND AGENT NAME)--->
    <?php $_smarty_tpl->_subTemplateRender("file:header_home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="row" style="margin-left: 10px;margin-right: 10px;">

        <!-- <?php if ($_smarty_tpl->tpl_vars['Permission']->value != 4 && $_smarty_tpl->tpl_vars['Permission']->value != 0 && $_smarty_tpl->tpl_vars['Permission']->value != 2 && $_smarty_tpl->tpl_vars['Permission']->value != 3) {?> -->
        <div class="col-md-5" style="padding:10px">
            <form id="reportForm" action="../PHPService/home.php" method="POST">
            <!-- 正式環境要改路徑 -->
            <!-- <form id="reportForm" action="../home.php" method="POST"> --> 
                <label for="start_report_id" style="text-align:right;font-size:14px;">請輸入報告編號區間：</label>
                <input type="text" id="start_report_id" name="start_report_id" style="font-weight:bold;font-size:14px;">

                <label for="end_report_id" style="text-align:right;font-size:14px;">-</label>
                <input type="text" id="end_report_id" name="end_report_id" style="font-weight:bold;font-size:14px;">

                <button type="submit" class="btn btn-custom btn-info btn-md" style="font-size:14px">
                    <i class="fa fa-download"></i> JSON
                </button>
            </form>
            <!-- show reportForm response -->
            <div id="response">輸出的報告ID</div>

        </div>
        <!-- <?php }?> -->
        <div class="col-md-3" style="float:right;padding:10px">
            <input type="search" class="form-control input-md" id="SearchTable" name="SearchTable" placeholder="Search"
                style="font-weight:bold;font-size:20px;">
            <!-- <label for="reportType" class="form-control input-md">報告類型：</label> -->
            <!-- permission !=4 -->
             <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 4) {?>
            <select id="SearchStatus" class="form-control input-md">
                <option value="">請選擇</option>
                <option value="實驗室已審核">實驗室已審核</option>
                <option value="實驗室退回">醫檢師退回</option>
                <option value="醫師已審核">醫師已審核</option>
                <option value="醫師已退回">醫師退回</option>
                <option value="重出">重出</option>
                <option value="已寄送報告">已寄送</option>
            </select>
            <?php } else { ?>
            <select id="SearchStatus" class="form-control input-md">
                <option value="">請選擇</option>
                <option value="報告未上傳">報告未上傳</option>
                <option value="報告已上傳，未審核">報告已上傳，未審核</option>
                <option value="實驗室已審核">實驗室已審核</option>
                <option value="實驗室退回">醫檢師退回</option>
                <option value="醫師已審核">醫師已審核</option>
                <option value="醫師已退回">醫師退回</option>
                <option value="可寄送報告">待寄送</option>
                <option value="重出">重出</option>
                <option value="已寄送報告">已寄送</option>
                <option value="不需發報告">不需發報告</option>
            </select>
            <?php }?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!--THIS IS THE JQGRID TABLE ,AND THIS FIELD IS CONNECTED TO HOME.PHP-->
                <table id="<?php echo $_smarty_tpl->tpl_vars['jqGrid']->value;?>
"></table>
                <div id="<?php echo $_smarty_tpl->tpl_vars['jqGridPager']->value;?>
"></div>
            </div>
        </div>
        <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>



    <?php echo '<script'; ?>
>
        document.getElementById('reportForm').addEventListener('submit', function (event) {
            event.preventDefault(); // 阻止表單默認提交

            // get the value of the input fields
            var startReportId = document.getElementById('start_report_id').value;
            var endReportId = document.getElementById('end_report_id').value;

            // create a JSON object
            var data = {
                start_report_id: startReportId,
                end_report_id: endReportId
            };

            // AJAX request to the server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', this.action, true); // 表單action屬性的值
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) { // 请求完成
                    if (xhr.status === 200) { // 请求成功
                        // 处理后端返回的数据
                        var response = JSON.parse(xhr.responseText);
                        console.log(response); // 打印整个响应对象以检查其结构

                        // 确保响应是一个数组并且不为空
                        if (Array.isArray(response) && response.length > 0) {
                            // 转换字段名称
                            var transformedResponse = response.map(function(item) {
                                return {
                                    report_number: item.ReportID,
                                    proband_name: item.proband_name,
                                    sample_number: item.SampleNo,
                                    medical_record_number: item.PatientID,
                                    sampling_number: item.scID,
                                    sample_type_r1: item.sample_type_r1,
                                    sample_type_r2: item.sample_type_r2,
                                    sample_type_r3: item.sample_type_r3,
                                    sample_type_r4: item.sample_type_r4,
                                    sample_type_r5: item.sample_type_r5,
                                    method: item.method,
                                    sampling_date: item.scdate,
                                    collection_date: item.rcdate,
                                    referral_physician: item.HospitalList_Dr,
                                    referral_agency: item.HospitalList,
                                    contact_name: item.CustomerName,
                                    contact_phone_number: item.CustomerPhone,
                                    contact_mail: item.CustomerEmail
                                };
                            });

                            // 抓取所有的 report_number
                            var reportNumbers = transformedResponse.map(function(item) {
                                return item.report_number;
                            });

                            // 在页面上显示所有的 report_number
                            var responseDiv = document.getElementById('response');
                            responseDiv.innerHTML = 'Total Report Numbers: ' + reportNumbers.length + '<br>' +
                                                    'Report Numbers: ' + reportNumbers.join(', ') + '<br>';

                            // 创建 JSON 文件并下载
                            var blob = new Blob([JSON.stringify(transformedResponse, null, 2)], { type: 'application/json' });
                            var url = URL.createObjectURL(blob);
                            var a = document.createElement('a');
                            a.href = url;
                            a.download = startReportId + '-' + endReportId + '.json';
                            document.body.appendChild(a);
                            a.click();
                            document.body.removeChild(a);
                            URL.revokeObjectURL(url);
                        } else {
                            console.error('Unexpected response format or empty response');
                        }
                    } else {
                        // 处理错误
                        console.error('Error: ' + xhr.status + ' - ' + xhr.statusText);
                        var errorResponse = JSON.parse(xhr.responseText);
                        alert('Error: ' + errorResponse.error);
                    }
                }
            };
            xhr.send(JSON.stringify(data));
        });
    <?php echo '</script'; ?>
>
</body>

</html>
<?php $_smarty_tpl->_subTemplateRender("file:js_home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
