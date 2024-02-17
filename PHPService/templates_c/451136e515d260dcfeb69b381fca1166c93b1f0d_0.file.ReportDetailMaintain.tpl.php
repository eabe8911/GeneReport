<?php
/* Smarty version 4.3.4, created on 2024-02-17 17:01:29
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\ReportDetailMaintain.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d075e9abeb01_44441870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '451136e515d260dcfeb69b381fca1166c93b1f0d' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\ReportDetailMaintain.tpl',
      1 => 1708160488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d075e9abeb01_44441870 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<!--POP UP MODAL TO VIEW MEMBER DETAILS AND RESULTS FOR Member Information-->
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['FormAction']->value;?>
" name="FormReportDetail" id="FormReportDetail" enctype="multipart/form-data">
    <?php echo $_smarty_tpl->tpl_vars['Hiddenfield1']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield2']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield3']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield4']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield5']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield6']->value;?>

    <div class="container-fluid" style="width:100%;">
        <div class="row"><br>
            <!---- Member Details ---->
            <div class="col-sm-12">
                <div class="card-box" style="height:100%;">
                    <div class="row">
                        <div class="form-horizontal" role="form">
                            <!---- 第一排 ---->
                            <div class="col-md-4">
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
                                            required value="<?php echo $_smarty_tpl->tpl_vars['ReportName']->value;?>
">
                                    </div>
                                </div>
                                <!---- 送檢單位 ---->
                                <div class="form-group">
                                    <label for="HospitalList" class="col-md-3 control-label">送檢單位:</label>
                                    <div class="col-md-8">
                                        <!-- <?php echo smarty_function_html_options(array(),$_smarty_tpl);?>
 生成HTML 下拉式選單 -->
                                        <!-- <?php echo smarty_function_html_options(array('name'=>'HospitalList','id'=>'HospitalList','options'=>$_smarty_tpl->tpl_vars['HospitalListOptions']->value,'selected'=>'na','class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>
 -->
                                        <?php echo smarty_function_html_options(array('name'=>'HospitalList','id'=>'HospitalList','options'=>array(''=>'請選擇...')+$_smarty_tpl->tpl_vars['HospitalListOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['HospitalListSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>

                                    </div>
                                    <!-- <div class="col-md-8">
                                        <input type="text" id="HospitalList" name="HospitalList"
                                            class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['HospitalList']->value;?>
">
                                    </div> -->
                                </div>

                                <!---- 檢測單位 ---->
                                <div class="form-group">
                                    <label for="ReportType" class="col-md-3 control-label">檢測單位:</label>
                                    <div class="col-md-8">
                                        <!-- <?php echo smarty_function_html_options(array(),$_smarty_tpl);?>
 生成HTML 下拉式選單 -->
                                        <!-- <?php echo smarty_function_html_options(array('name'=>'ReportType','id'=>'ReportType','options'=>array(''=>'請選擇...')+$_smarty_tpl->tpl_vars['ReportTypeOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['ReportTypeSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>
 -->
                                        <?php echo smarty_function_html_options(array('name'=>'ReportType','id'=>'ReportType','options'=>array(''=>'請選擇...')+$_smarty_tpl->tpl_vars['ReportTypeOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['ReportTypeSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>


                                    </div>
                                </div>

                                <!---- 報告樣板 ---->
                                <div class="form-group">
                                    <label for="TemplateID" class="col-md-3 control-label">報告樣板:</label>
                                    <div class="col-md-8">
                                        <!-- <?php echo smarty_function_html_options(array('name'=>'TemplateID','id'=>'TemplateID','options'=>$_smarty_tpl->tpl_vars['TemplateOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['TemplateSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>
 -->
                                        <?php echo smarty_function_html_options(array('name'=>'TemplateID','id'=>'TemplateID','options'=>array(''=>'請選擇...')+$_smarty_tpl->tpl_vars['TemplateOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['TemplateSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>

                                    </div>
                                </div>
                            </div>
                            <!---- 第二排 ---->
                            <div class="col-md-4">
                                <!---- 檢體編號 ---->
                                <div class="form-group">
                                    <label for="SampleID" class="col-md-3 control-label">檢體編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleID" name="SampleID" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['SampleID']->value;?>
">
                                    </div>
                                </div>
                                <!---- 病歷編號 ---->
                                <div class="form-group">
                                    <label for="PatientID" class="col-md-3 control-label">病歷編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="PatientID" name="PatientID" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['PatientID']->value;?>
">
                                    </div>
                                </div>
                                <!---- 採檢單號 ---->
                                <div class="form-group">
                                    <label for="scID" class="col-md-3 control-label">採檢單號</label>
                                    <div class="col-md-8">
                                        <input type="text" id="scID" name="scID" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['scID']->value;?>
">
                                    </div>
                                </div>
                                <!---- 採集日期 ---->
                                <div class="form-group">
                                    <label for="scdate" class="col-md-3 control-label">採集日期:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="scdate" name="scdate" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['scdate']->value;?>
">
                                    </div>
                                </div>
                                <!---- 收檢日期 ---->
                                <div class="form-group">
                                    <label for="rcdate" class="col-md-3 control-label">收檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="rcdate" name="rcdate" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['rcdate']->value;?>
">
                                    </div>
                                </div>
                            </div>

                            <!---- 第三排 ---->
                            <div class="col-md-4">
                                <!---- TAT最終日 ---->
                                <div class="form-group">
                                    <label for="DueDate" class="col-md-3 control-label">TAT最終日:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="DueDate" name="DueDate" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['DueDate']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶名稱 ---->
                                <div class="form-group">
                                    <label for="CustomerName" class="col-md-3 control-label">客戶名稱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerName" name="CustomerName" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['CustomerName']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶郵件 ---->
                                <div class="form-group">
                                    <label for="CustomerEmail" class="col-md-3 control-label">客戶郵件:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerEmail" name="CustomerEmail" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['CustomerEmail']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶郵件2 -->
                                <div class="form-group">
                                    <label for="ccemail" class="col-md-3 control-label">聯絡人郵件:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ccemail" name="ccemail" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['ccemail']->value;?>
">
                                    </div>
                                </div>

                                <!---- 客戶電話 ---->
                                <div class="form-group">
                                    <label for="CustomerPhone" class="col-md-3 control-label">客戶電話:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerPhone" name="CustomerPhone" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['CustomerPhone']->value;?>
">
                                    </div>
                                </div>
                                <!---- 報告發送狀態 ---->

                                <div class="form-group">
                                    <label for="ReportStatus" class="col-md-3 control-label">報告進度</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportStatus" name="ReportStatus" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['ReportStatus']->value;?>
">
                                    </div>
                                </div>

                                <!---- 報告退回原因，有值才顯示欄位 ---->
                                <?php if ($_smarty_tpl->tpl_vars['RejectReason']->value) {?>
                                <div class="form-group">
                                    <label for="RejectReason" class="col-md-3 control-label">報告退回原因:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="RejectReason" name="RejectReason" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['RejectReason']->value;?>
">
                                    </div>
                                </div>
                                <?php }?>

                                <!---- 上傳報告 ---->
                                <div class="form-group" id="DisplayUploadButton">
                                    <center>
                                        <label type="button" class="btn btn-primary btn-block"
                                            style="font-weight:bold;font-size:20px;width:40%;;margin:30px;">
                                            <input id="ReportUploadPDF" name="ReportUploadPDF" style="display:none;"
                                                type="file" accept="application/pdf" />
                                            <i class="fa fa-file-pdf"></i> 上傳報告結果
                                        </label>
                                        <label type="button" class="btn btn-primary btn-block"
                                            style="font-weight:bold;font-size:20px;width:40%;;margin:30px;">
                                            <input id="ReportApply" name="ReportApply" style="display:none;" type="file"
                                                accept="application/pdf" />
                                            <i class="fa fa-file-pdf"></i> 上傳申請單
                                        </label>
                                        
                                        <!-- <input type="file" id="Apply" name="Apply" /> -->

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
                            <p id="ReportViewButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportViewExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                            </p>
                            <?php if ($_smarty_tpl->tpl_vars['Permission']->value != 4) {?>
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
                            <?php } else { ?>

                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                            </p>
                            <?php }?>
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
</form>

<!---------------------------End-----------------------------><?php }
}
