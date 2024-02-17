<?php
/* Smarty version 4.3.4, created on 2024-02-17 03:03:39
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d013fb3463c1_73470906',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98a4e0f469206c0dee70008ce1ab27bb5060025a' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\home.tpl',
      1 => 1706586830,
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
function content_65d013fb3463c1_73470906 (Smarty_Internal_Template $_smarty_tpl) {
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
        <!---- 預約日期 ---->
        <div class="col-md-5" style="padding:10px">
            <!-- <label for="query_appoint_date" style="text-align:right;font-size:20px;">日期：</label>
            <input type="text" id="query_appoint_date" style="font-weight:bold;font-size:20px;">
            <button id="BtnQuery" class="btn btn-custom btn-info btn-md" style="font-size:16px"><i
                    class="fa fa-search"></i> 查 詢 </button> -->
        </div>
        <!---- 查詢 ---->
        <!-- 如果permission = 4 不顯示search欄位 -->
        <?php if ($_smarty_tpl->tpl_vars['Permission']->value != 4 && $_smarty_tpl->tpl_vars['Permission']->value != 0 && $_smarty_tpl->tpl_vars['Permission']->value != 2 && $_smarty_tpl->tpl_vars['Permission']->value != 3) {?>
        <!-- <button id="BtnQuery" class="btn btn-custom btn-info btn-md" style="font-size:16px">
            <i class="fa fa-search"></i>
            <a href="log_table.php">查看紀錄</a></button> -->
            <br>

        <!-- <button class="btn btn-primary btn-md" onclick="location.href='log_table.php'" ><i class="fa fa-search"></i>&nbsp;&nbsp;查看紀錄</button> -->
        <?php }?>
        <div class="col-md-3" style="float:right;padding:10px">
            <input type="search" class="form-control input-md" id="SearchTable" name="SearchTable" placeholder="Search"
                style="font-weight:bold;font-size:20px;">
            <!-- <label for="reportType" class="form-control input-md">報告類型：</label> -->
            <select id="SearchStatus" class="form-control input-md">
                <option value="">請選擇</option>
                <option value="報告未上傳">報告未上傳</option>
                <option value="報告已上傳，未審核">報告已上傳，未審核</option>
                <option value="實驗室已審核">實驗室已審核</option>
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
                <table id="<?php echo $_smarty_tpl->tpl_vars['jqGrid']->value;?>
"></table>
                <div id="<?php echo $_smarty_tpl->tpl_vars['jqGridPager']->value;?>
"></div>
            </div>
        </div>
        <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>




</body>

</html>
<?php $_smarty_tpl->_subTemplateRender("file:js_home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
