<?php
/* Smarty version 4.3.1, created on 2023-05-26 17:36:31
  from '/var/www/html/templates/ReportDetailApprove.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64707d9fa4ac91_42240081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4134b77d4b17980e3c59be5ba1e6731648a0a1e7' => 
    array (
      0 => '/var/www/html/templates/ReportDetailApprove.tpl',
      1 => 1685093594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64707d9fa4ac91_42240081 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/vendor/smarty/smarty/libs/plugins/function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<!--POP UP MODAL TO VIEW MEMBER DETAILS AND RESULTS FOR Member Information-->
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['FormAction']->value;?>
" name="FormApproveDetail" id="FormApproveDetail">
    <?php echo $_smarty_tpl->tpl_vars['Hiddenfield1']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield2']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield3']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield4']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield5']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield6']->value;?>

    <div class="container-fluid" style="width:100%;">
        <div class="row"><br>
            <!---- Member Details ---->
            <input type="hidden" id="uuid">
            <div class="col-sm-12">
                <div class="card-box" style="height:100%;">
                    <div class="row">
                        <div class="form-horizontal" role="form">
                            <!---- 第一排 ---->
                            <div class="col-md-4">
                                <!---- 報告編號 ---->
                                <div class="form-group">
                                    <!--HEALTHCARD STATUS FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="ReportID" class="col-md-3 control-label">報告編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportID" name=ReportID class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['ReportID']->value;?>
">
                                    </div>
                                </div>
                                <!---- 報告名稱 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="ReportName" class="col-md-3 control-label">報告名稱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportName" name=ReportName class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['ReportName']->value;?>
">
                                    </div>
                                </div>
                                <!---- 報告簡述 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="ReportDescription" class="col-md-3 control-label">報告簡述:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportDescription" name=ReportDescription
                                            class="form-control" readonly value="<?php echo $_smarty_tpl->tpl_vars['ReportDescription']->value;?>
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

                                
                            </div>
                            <!---- 第二排 ---->
                            <div class="col-md-4">
                                <!---- TAT最終日 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="DueDate" class="col-md-3 control-label">TAT最終日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="DueDate" name=DueDate class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['DueDate']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶名稱 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="CustomerName" class="col-md-3 control-label">客戶名稱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerName" name=CustomerName class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['CustomerName']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶郵件 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="CustomerEmail" class="col-md-3 control-label">客戶郵件:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerEmail" name=CustomerEmail class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['CustomerEmail']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶電話 ---->
                                <div class="form-group">
                                    <label for="CustomerPhone" class="col-md-3 control-label">客戶電話:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerPhone" name="CustomerPhone" class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['CustomerPhone']->value;?>
">
                                    </div>
                                </div>

                            </div>
                            <!---- 第三排 ---->
                            <div class="col-md-4">
                                <!---- 實驗室核准 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Approved1" class="col-md-3 control-label">實驗室核准:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved1" name=Approved1 class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['Approved1']->value;?>
">
                                    </div>
                                </div>
                                <!---- 核准日期 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Approved1At" class="col-md-3 control-label">核准日期:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved1At" name=Approved1At class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['Approved1At']->value;?>
">
                                    </div>
                                </div>
                                <!---- 醫師核准 ---->
                                <div class="form-group">
                                    <label for="Approved2" class="col-md-3 control-label">醫師核准:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved2" name=Approved2 class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['Approved2']->value;?>
">
                                    </div>
                                </div>
                                <!---- 核准日期 ---->
                                <div class="form-group">
                                    <label for="Approved2At" class="col-md-3 control-label">核准日期:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved2At" name=Approved2At class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['Approved2At']->value;?>
">
                                    </div>
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
                            <p id="ReportApproveButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnApproveExit"
                                    name="BtnApproveExit" style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-home"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnApproveReject"
                                    name="BtnApproveReject" style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 退 回</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnApprovePass"
                                    name="BtnApprovePass" style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-thumbs-up"></i> 核 准</button>
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
