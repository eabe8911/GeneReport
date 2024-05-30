<?php
/* Smarty version 4.3.4, created on 2024-05-30 10:03:33
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\ReportDetailApprove.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6657de75812905_92860651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '308a736576e5fbbd9eeff582d35b7714e5522ed8' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\ReportDetailApprove.tpl',
      1 => 1716875834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6657de75812905_92860651 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<!--POP UP MODAL TO VIEW MEMBER DETAILS AND RESULTS FOR Member Information-->
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['FormAction']->value;?>
" name="FormApproveDetail" id="FormApproveDetail">
    <?php echo $_smarty_tpl->tpl_vars['Hiddenfield1']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield2']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield3']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield4']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield5']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield6']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield7']->value;?>

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
                                <!---- 送檢單位 ---->
                                <div class="form-group">
                                    <label for="HospitalList" class="col-md-3 control-label">送檢單位:</label>
                                    <div class="col-md-8">
                                        <!-- <?php echo smarty_function_html_options(array(),$_smarty_tpl);?>
 生成HTML 下拉式選單 -->
                                        <?php echo smarty_function_html_options(array('name'=>'HospitalList','id'=>'HospitalList','options'=>$_smarty_tpl->tpl_vars['HospitalListOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['HospitalListSelect']->value,'class'=>"form-control"),$_smarty_tpl);?>

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
                                        <?php echo smarty_function_html_options(array('name'=>'ReportType','id'=>'ReportType','options'=>$_smarty_tpl->tpl_vars['ReportTypeOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['ReportTypeSelect']->value,'class'=>"form-control"),$_smarty_tpl);?>

                                    </div>
                                </div>
                                <!---- 實驗室核准 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Approved1" class="col-md-3 control-label">核准醫檢師:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved1" name=Approved1 class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['Approved1']->value;?>
">
                                    </div>
                                </div>
                                <!---- 醫師核准 ---->
                                <div class="form-group">
                                    <label for="Approved2" class="col-md-3 control-label">核准醫師:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved2" name=Approved2 class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['Approved2']->value;?>
">
                                    </div>
                                </div>
                                <!---- 實驗室核准 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Reject1" class="col-md-3 control-label">退回醫檢師:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Reject1" name=Reject1 class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['Reject1']->value;?>
">
                                    </div>
                                </div>
                                <!---- 醫師核准 ---->
                                <div class="form-group">
                                    <label for="Reject2" class="col-md-3 control-label">退回醫師:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Reject2" name=Reject2 class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['Reject2']->value;?>
">
                                    </div>
                                </div>



                            </div>
                            <!---- 第二排 ---->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="SampleID" class="col-md-3 control-label">檢體編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleID" name="SampleID" class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['SampleID']->value;?>
">
                                    </div>
                                </div>
                                <!---- 病歷編號 ---->
                                <div class="form-group">
                                    <label for="PatientID" class="col-md-3 control-label">病歷編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="PatientID" name="PatientID" class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['PatientID']->value;?>
">
                                    </div>
                                </div>
                                <!---- 採檢單號 ---->
                                <div class="form-group">
                                    <label for="scID" class="col-md-3 control-label">採檢單號</label>
                                    <div class="col-md-8">
                                        <input type="text" id="scID" name="scID" class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['scID']->value;?>
">
                                    </div>
                                </div>
                                <!---- 採集日期 ---->
                                <div class="form-group">
                                    <label for="scdate" class="col-md-3 control-label">採集日期:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="scdate" name="scdate" class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['scdate']->value;?>
">
                                    </div>
                                </div>
                                <!---- 收檢日期 ---->
                                <div class="form-group">
                                    <label for="rcdate" class="col-md-3 control-label">收檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="rcdate" name="rcdate" class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['rcdate']->value;?>
">
                                    </div>
                                </div>

                            </div>
                            <!---- 第三排 ---->
                            <div class="col-md-4">
                                <!---- TAT最終日 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="DueDate" class="col-md-3 control-label">TAT最終日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="DueDate" name=DueDate class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['DueDate']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶名稱 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="CustomerName" class="col-md-3 control-label">聯絡人名稱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerName" name=CustomerName class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['CustomerName']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶郵件 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="CustomerEmail" class="col-md-3 control-label">聯絡人郵件:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerEmail" name=CustomerEmail class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['CustomerEmail']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶電話 ---->
                                <div class="form-group">
                                    <label for="CustomerPhone" class="col-md-3 control-label">聯絡電話:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerPhone" name="CustomerPhone" class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['CustomerPhone']->value;?>
">
                                    </div>
                                </div>

                                <!---- 實驗室核准日期 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Approved1At" class="col-md-3 control-label">實驗室核准日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved1At" name=Approved1At class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['Approved1At']->value;?>
">
                                    </div>
                                </div>
                                <!---- 醫師核准日期 ---->
                                <div class="form-group">
                                    <label for="Approved2At" class="col-md-3 control-label">醫師核准日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved2At" name=Approved2At class="form-control"
                                            readonly value="<?php echo $_smarty_tpl->tpl_vars['Approved2At']->value;?>
">
                                    </div>
                                </div>


                                <!---- 實驗室核准日期 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Reject1At" class="col-md-3 control-label">實驗室退回日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Reject1At" name=Reject1At class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['Reject1At']->value;?>
">
                                    </div>
                                </div>

                                <!---- 醫師核准日期 ---->
                                <div class="form-group">
                                    <label for="Reject2At" class="col-md-3 control-label">醫師退回日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Reject2At" name=Reject2At class="form-control" readonly
                                            value="<?php echo $_smarty_tpl->tpl_vars['Reject2At']->value;?>
">
                                    </div>
                                </div>

                                <!---- 報告建議/退回原因 ---->
                                <div class="form-group">
                                    <label for="RejectReason" class="col-md-3 control-label">退回原因:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="RejectReason" name=RejectReason class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['RejectReason']->value;?>
" readonly>

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
                            <?php if ($_smarty_tpl->tpl_vars['ReportStatus']->value == '8' || $_smarty_tpl->tpl_vars['ReportStatus']->value == '0' || $_smarty_tpl->tpl_vars['ReportStatus']->value == '3' || $_smarty_tpl->tpl_vars['ReportStatus']->value == '5') {?>
                            <p id="ReportApproveButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnApproveExit"
                                    name="BtnApproveExit" style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-home"></i> 離 開</button>
                            </p>

                            <?php } else { ?>
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
                            <?php }?>
                        </div>
                    </div>
                    <!---- PDF Preview ---->
                    <div class="row" id="PDFArea">
                        <!-- <div class="form-horizontal" role="form">
                            <div class="col-md-12">
                                <embed id='PDFPreview' name='PDFPreview' src='<?php echo $_smarty_tpl->tpl_vars['PDFPreview']->value;?>
' type='application/pdf'
                                    width='100%' height='1000px' /> -->
                        <!-- <button type="button" class="btn btn-primary" id="BtnSendEmail">Send Email</button> -->

                        <!-- </div> -->
                        <div class="col-md-12">
                            <?php if ($_smarty_tpl->tpl_vars['PDFPreview']->value != '請再上傳一次報告') {?>
                            <embed id='PDFPreview' name='PDFPreview' src='<?php echo $_smarty_tpl->tpl_vars['PDFPreview']->value;?>
' type='application/pdf'
                                width='100%' height='1000px' />
                            <?php } else { ?>
                            <div class="alert alert-danger alert-container" id="alert" <?php echo $_smarty_tpl->tpl_vars['PDFPreview']->value;?>
>
                                <strong>
                                    <center>
                                        <h1><?php echo $_smarty_tpl->tpl_vars['PDFPreview']->value;?>
</h1>
                                    </center>
                                </strong>
                            </div>
                            <?php }?>
                            <!-- <button type="button" class="btn btn-primary" id="BtnSendEmail">Send Email</button> -->
                        </div>
                    </div>
                    <br>
                    <br>
                    <!---- Apply Preview -->
                    <div class="row" id="ApplyArea">
                        <div class="form-horizontal" role="form">
                            <div class="col-md-12">
                                <embed id='ApplyFile' name='ApplyFile' src='<?php echo $_smarty_tpl->tpl_vars['ApplyFile']->value;?>
' type='application/pdf'
                                    width='100%' height='1000px' />
                            </div>
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
