<?php
/* Smarty version 4.3.1, created on 2023-05-26 17:34:06
  from '/var/www/html/templates/ReportDetailMaintain.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64707d0ec31cf1_24181932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d0e58f8b9a0cee56b1e80acafb8772ae3b348b8' => 
    array (
      0 => '/var/www/html/templates/ReportDetailMaintain.tpl',
      1 => 1685093594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64707d0ec31cf1_24181932 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<!--POP UP MODAL TO VIEW MEMBER DETAILS AND RESULTS FOR Member Information-->
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['FormAction']->value;?>
" name="FormReportDetail" id="FormReportDetail" enctype="multipart/form-data">
    <?php echo $_smarty_tpl->tpl_vars['Hiddenfield1']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield2']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield3']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield4']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield5']->value;?>

    <div class="container-fluid" style="width:100%;">
        <div class="row"><br>
            <!---- Member Details ---->
            <div class="col-sm-12">
                <div class="card-box" style="height:100%;">
                    <div class="row">
                        <div class="form-horizontal" role="form">
                            <!---- 第一排 ---->
                            <div class="col-md-6">
                                <!---- 報告編號 ---->
                                <div class="form-group">
                                    <label for="ReportID" class="col-md-3 control-label">報告編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportID" name="ReportID" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['ReportID']->value;?>
">
                                    </div>
                                </div>
                                <!---- 報告名稱 ---->
                                <div class="form-group">
                                    <label for="ReportName" class="col-md-3 control-label">報告名稱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportName" name="ReportName" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['ReportName']->value;?>
">
                                    </div>
                                </div>
                                <!---- 報告簡述 ---->
                                <div class="form-group">
                                    <label for="ReportDescription" class="col-md-3 control-label">報告簡述:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportDescription" name="ReportDescription"
                                            class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['ReportDescription']->value;?>
">
                                    </div>
                                </div>

                                <!---- 報告類別 ---->
                                <div class="form-group">
                                    <label for="ReportType" class="col-md-3 control-label">報告類別:</label>
                                    <div class="col-md-8">
                                        <?php echo smarty_function_html_options(array('name'=>'ReportType','id'=>'ReportType','options'=>$_smarty_tpl->tpl_vars['ReportTypeOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['ReportTypeSelect']->value,'class'=>"form-control"),$_smarty_tpl);?>

                                    </div>
                                </div>

                                <!---- 報告樣板 ---->
                                <div class="form-group">
                                    <label for="TemplateID" class="col-md-3 control-label">報告樣板:</label>
                                    <div class="col-md-8">
                                        <?php echo smarty_function_html_options(array('name'=>'TemplateID','id'=>'TemplateID','options'=>$_smarty_tpl->tpl_vars['TemplateOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['TemplateSelect']->value,'class'=>"form-control"),$_smarty_tpl);?>

                                    </div>
                                </div>
                            </div>
                            <!---- 第二排 ---->
                            <div class="col-md-6">
                                <!---- TAT最終日 ---->
                                <div class="form-group">
                                    <label for="DueDate" class="col-md-3 control-label">TAT最終日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="DueDate" name="DueDate" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['DueDate']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶名稱 ---->
                                <div class="form-group">
                                    <label for="CustomerName" class="col-md-3 control-label">客戶名稱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerName" name="CustomerName" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['CustomerName']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶郵件 ---->
                                <div class="form-group">
                                    <label for="CustomerEmail" class="col-md-3 control-label">客戶郵件:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerEmail" name="CustomerEmail" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['CustomerEmail']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶電話 ---->
                                <div class="form-group">
                                    <label for="CustomerPhone" class="col-md-3 control-label">客戶電話:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerPhone" name="CustomerPhone" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['CustomerPhone']->value;?>
">
                                    </div>
                                </div>

                                <!---- 上傳報告 ---->
                                <div class="form-group" id="DisplayUploadButton">
                                    <center>
                                        <label type="button" class="btn btn-primary btn-block"
                                            style="font-weight:bold;font-size:20px;width:40%;;margin:30px;">
                                            <input id="ReportUploadPDF" name="ReportUploadPDF" style="display:none;"
                                                type="file" accept="application/pdf" />
                                            <i class="fa fa-file-pdf"></i> 上 傳 報 告
                                        </label>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---- button area ---->
                    <div>
                        <div id="ds1" align="center">
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
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEdit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修 改</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportDelete"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-trash"></i> 刪 除</button>
                            </p>
                            <!--SUBMIT BUTTON IS CONNECTED TO HOME.PHP-->
                            <p id="ReportConfirmButton">
                                <button type="button" class="btn btn-custom btn-danger btn-md" id=BtnReportCancel
                                    name=BtnReportCancel style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-window-close"></i> 取 消</button>
                                <button type="submit" class="btn btn-custom btn-success btn-md" id=BtnReportSubmit
                                    name=BtnReportSubmit style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-paper-plane"></i> 確 認</button>
                            </p>
                        </div>
                    </div>
                    <!---- PDF Preview ---->
                    <div class="row" id="PDFArea">
                        <div class="form-horizontal" role="form">
                            <div class="col-md-12">
                                <embed id='PDFPreview' name='PDFPreview' src='<?php echo $_smarty_tpl->tpl_vars['PDFPreview']->value;?>
' type='application/pdf'
                                    width='100%' height='1000px' />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!---------------------------End-----------------------------><?php }
}
