<?php
/* Smarty version 4.3.1, created on 2023-05-19 14:48:57
  from '/var/www/html/templates/ViewReportImport.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64671bd99169f4_22893214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '608290604b77ef5ad5807f113be6875c4e25f69e' => 
    array (
      0 => '/var/www/html/templates/ViewReportImport.tpl',
      1 => 1684478266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:homecss.tpl' => 1,
    'file:js_ReportImportData.tpl' => 1,
    'file:header.tpl' => 1,
  ),
),false)) {
function content_64671bd99169f4_22893214 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<title>麗寶基因報告系統</title>
<html>

<head>
    <!-- THIS IS THE CSS OF HOME.PHP-->
    <?php $_smarty_tpl->_subTemplateRender("file:homecss.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php $_smarty_tpl->_subTemplateRender("file:js_ReportImportData.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>

<body>
    <!--header.tpl THIS PAGE IS FOR HEADER OF HOME.PHP (LOGO AND AGENT NAME)--->
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container" style="width:100%;">
        <form action=<?php echo $_smarty_tpl->tpl_vars['FormAction']->value;?>
 method="post" enctype="multipart/form-data">
            <?php echo $_smarty_tpl->tpl_vars['Hiddenfield1']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield2']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield3']->value;?>

            <div>
                <a href="template.xlsx" download>
                    <h3>下載Excel範本檔</h3>
                </a>
            </div>
            <center>
                <p>
                    <label type="button" class="btn btn-custom btn-info btn-md"
                        style="font-weight:bold;font-size:30px;margin:30px;">
                        <input id="ExcelFile" name="ExcelFile" style="display:none;" type="file" accept=".xls, .xlsx">
                        <i class="fa fa-file-excel"></i>請選擇要上傳的Excel檔案
                    </label>
                </p>
                <p id="Message">
                <div class="alert alert-danger alert-container" id="alert" <?php echo $_smarty_tpl->tpl_vars['ShowErrorMessage']->value;?>
>
                    <strong>
                        <center>
                            <h1><?php echo $_smarty_tpl->tpl_vars['ErrorMessage']->value;?>
</h1>
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
                        <i class="fa fa-paper-plane"></i> 確 認</button>
                </p>
            </center>
        </form>
    </div>
</body>

</html><?php }
}
