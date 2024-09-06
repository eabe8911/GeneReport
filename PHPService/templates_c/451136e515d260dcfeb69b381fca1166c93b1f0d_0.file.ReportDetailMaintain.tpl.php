<?php
/* Smarty version 4.3.4, created on 2024-09-05 16:36:40
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\ReportDetailMaintain.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66d96d988b3390_13408747',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '451136e515d260dcfeb69b381fca1166c93b1f0d' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\ReportDetailMaintain.tpl',
      1 => 1725525397,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d96d988b3390_13408747 (Smarty_Internal_Template $_smarty_tpl) {
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
                                <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 1 || $_smarty_tpl->tpl_vars['Permission']->value == 2 || $_smarty_tpl->tpl_vars['Permission']->value == 4 || $_smarty_tpl->tpl_vars['Permission']->value == 5 || $_smarty_tpl->tpl_vars['Permission']->value == 9) {?>
                                <div class="form-group">
                                    <label for="main-menu" class="col-md-3 control-label">報告類型:</label>
                                    <div class="col-md-8">


                                        <select id="ReportTemplate" name="ReportTemplate" class="form-control"
                                            onchange="populateSubmenu(this, document.getElementById('ReportName'))">
                                            <option value="">Select a category</option>
                                            <option value="M1">M1 系列</option>
                                            <option value="M2">M2 系列</option>
                                            <option value="O1">O1 系列</option>
                                            <option value="P1">P1 系列</option>
                                            <option value="P2">P2 系列</option>
                                            <option value="P3">P3 系列</option>
                                            <option value="S1">S1 系列</option>
                                            <option value="S2">S2 系列</option>
                                            <option value="S3">S3 系列</option>
                                            <option value="W1">W1 系列</option>
                                            <option value="W2">W2 系列</option>
                                            <option value="W3">W3 系列</option>
                                            <option value="W4">W4 系列</option>
                                            <option value="W5">W5 系列</option>
                                            <option value="W6">W6 系列</option>
                                            <option value="R9">R9 系列</option>



                                        </select>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="form-group">

                                    <label for="ReportName" class="col-md-3 control-label">報告名稱:</label>
                                    <div class="col-md-8">

                                        <select id="ReportName" name="ReportName" class="form-control" required>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['ReportName']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['ReportName']->value;?>
</option>
                                        </select>
                                    </div>
                                </div>

                                <!---- 送檢單位 ---->
                                <div class="form-group">
                                    <label for="HospitalList" class="col-md-3 control-label">送檢單位:</label>
                                    <div class="col-md-8">

                                        <!-- <?php echo smarty_function_html_options(array('name'=>'HospitalList','id'=>'HospitalList','options'=>array(''=>'請選擇...')+$_smarty_tpl->tpl_vars['HospitalListOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['HospitalListSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>
 -->
                                        <select id="HospitalList" name="HospitalList" class="form-control"
                                            onchange="hospitalSubmenu(this, document.getElementById('CustomerName'))">
                                            <option value="">Select a category</option>
                                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 1) {?>selected<?php }?>>輔大醫院</option>
                                            <option value="2" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 2) {?>selected<?php }?>>新光醫院</option>
                                            <option value="3" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 3) {?>selected<?php }?>>台北市立聯合醫院</option>
                                            <option value="4" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 4) {?>selected<?php }?>>台北慈濟醫院</option>
                                            <option value="5" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 5) {?>selected<?php }?>>台北榮民總醫院</option>
                                            <option value="6" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 6) {?>selected<?php }?>>恩主公醫院</option>
                                            <option value="7" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 7) {?>selected<?php }?>>雙和醫院</option>
                                            <option value="8" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 8) {?>selected<?php }?>>國泰醫院</option>
                                            <option value="9" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 9) {?>selected<?php }?>>怡仁醫院</option>
                                            <option value="10" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 10) {?>selected<?php }?>>淡水馬偕醫院</option>
                                            <option value="11" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 11) {?>selected<?php }?>>三軍總醫院_台北內湖
                                            </option>
                                            <option value="12" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 12) {?>selected<?php }?>>中山醫院</option>
                                            <option value="13" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 13) {?>selected<?php }?>>新家生醫_聯新醫院
                                            </option>
                                            <option value="14" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 14) {?>selected<?php }?>>台北市立萬芳醫院
                                            </option>
                                            <option value="15" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 15) {?>selected<?php }?>>臺北醫學大學附設醫院
                                            </option>
                                            <option value="16" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 16) {?>selected<?php }?>>台中國軍總醫院
                                            </option>
                                            <option value="17" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 17) {?>selected<?php }?>>統誠醫療</option>
                                            <option value="18" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 18) {?>selected<?php }?>>彰化秀傳醫院</option>
                                            <option value="19" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 19) {?>selected<?php }?>>
                                                國立臺灣大學醫學院附設醫院雲林分院</option>
                                            <option value="20" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 20) {?>selected<?php }?>>光田綜合醫院</option>
                                            <option value="21" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 21) {?>selected<?php }?>>澄清綜合醫院中港分院
                                            </option>
                                            <option value="22" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 22) {?>selected<?php }?>>竹山秀傳醫院</option>
                                            <option value="23" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 23) {?>selected<?php }?>>烏日林新醫院</option>
                                            <option value="24" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 24) {?>selected<?php }?>>彰濱秀傳醫院</option>
                                            <option value="25" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 25) {?>selected<?php }?>>大千綜合醫院</option>
                                            <option value="26" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 26) {?>selected<?php }?>>員榮醫療社團法人員榮醫院
                                            </option>
                                            <option value="27" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 27) {?>selected<?php }?>>彰化基督教醫院
                                            </option>
                                            <option value="28" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 28) {?>selected<?php }?>>台中榮民總醫院
                                            </option>
                                            <option value="29" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 29) {?>selected<?php }?>>台南市立醫院</option>
                                            <option value="30" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 30) {?>selected<?php }?>>麻豆新樓醫院</option>
                                            <option value="31" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 31) {?>selected<?php }?>>台南新樓醫院</option>
                                            <option value="32" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 32) {?>selected<?php }?>>屏東基督教醫院
                                            </option>
                                            <option value="33" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 33) {?>selected<?php }?>>高雄長庚醫院</option>
                                            <option value="34" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 34) {?>selected<?php }?>>高雄醫學大學附設醫院
                                            </option>
                                            <option value="35" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 35) {?>selected<?php }?>>連江醫院</option>
                                            <option value="36" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 36) {?>selected<?php }?>>一般客戶or泓采代採
                                            </option>
                                        </select>


                                    </div>

                                </div>

                                <!---- 檢測單位 ---->
                                <div class="form-group">
                                    <label for="ReportType" class="col-md-3 control-label">檢測單位:</label>
                                    <div class="col-md-8">

                                        <?php echo smarty_function_html_options(array('name'=>'ReportType','id'=>'ReportType','options'=>array(''=>'請選擇...')+$_smarty_tpl->tpl_vars['ReportTypeOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['ReportTypeSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>


                                    </div>
                                </div>

                                <!---- 報告樣板 ---->
                                <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 1 || $_smarty_tpl->tpl_vars['Permission']->value == 2 || $_smarty_tpl->tpl_vars['Permission']->value == 4 || $_smarty_tpl->tpl_vars['Permission']->value == 5 || $_smarty_tpl->tpl_vars['Permission']->value == 9) {?>
                                <div class="form-group">
                                    <label for="TemplateID" class="col-md-3 control-label">報告樣板:</label>
                                    <div class="col-md-8">

                                        <?php echo smarty_function_html_options(array('name'=>'TemplateID','id'=>'TemplateID','options'=>array(''=>'請選擇...')+$_smarty_tpl->tpl_vars['TemplateOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['TemplateSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>

                                    </div>
                                </div>
                                <?php }?>
                            </div>
                            <!---- 第二排 ---->
                            <div class="col-md-4">
                                <!---- 檢體編號 ---->
                                <div class="form-group">
                                    <label for="SampleNo" class="col-md-3 control-label">檢體編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleNo" name="SampleNo" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['SampleNo']->value;?>
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
                                    <label for="scID" class="col-md-3 control-label">採檢單號:</label>
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
                                        <input type="datetime-local" id="scdate" name="scdate" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['scdate']->value;?>
">
                                    </div>
                                </div>
                                <!---- 收檢日期 ---->
                                <div class="form-group">
                                    <label for="rcdate" class="col-md-3 control-label">收檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="rcdate" name="rcdate" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['rcdate']->value;?>
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
                                    <label for="CustomerName" class="col-md-3 control-label">聯絡人名稱:</label>
                                    <div class="col-md-8">
                                        <!-- <select id="CustomerName" name="CustomerName" class="form-control" required>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['CustomerName']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['CustomerName']->value;?>
</option>
                                        </select> -->
                                        <input type="text" id="CustomerName" name="CustomerName" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['CustomerName']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶郵件 ---->
                                <div class="form-group">
                                    <label for="CustomerEmail" class="col-md-3 control-label">聯絡人信箱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerEmail" name="CustomerEmail" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['CustomerEmail']->value;?>
">
                                    </div>
                                </div>
                                <!---- 客戶郵件2 -->
                                <div class="form-group">
                                    <label for="ccemail" class="col-md-3 control-label">信箱(CC副本):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ccemail" name="ccemail" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['ccemail']->value;?>
">
                                    </div>
                                </div>

                                <!---- 客戶電話 ---->
                                <div class="form-group">
                                    <label for="CustomerPhone" class="col-md-3 control-label">聯絡電話:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerPhone" name="CustomerPhone" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['CustomerPhone']->value;?>
">
                                    </div>
                                </div>
                                <!---- 報告發送狀態 ---->

                                <div class="form-group">
                                    <label for="ReportStatus" class="col-md-3 control-label">報告進度:</label>
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
                                 <div class="form-group">
                                    <label for="downloadJsonBtn" class="col-md-3 control-label"></label>

                                    <div class="col-md-8">
                                        <button id="downloadJsonBtn" class="btn btn-primary" onclick="downloadJson()">下載
                                            JSON 文件</button>

                                    </div>

                                </div> 



                                <!-- 發信通知按紐，permission == 2 才顯示按紐 -->
                                <!-- <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 2) {?>
                                <div class="form-group text-center">
                                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['FormEmail']->value;?>
" name="FormSendEmail" id="FormSendEmail">
                                        <input type="hidden" id="ReportID" name="ReportID" value="<?php echo $_smarty_tpl->tpl_vars['ReportID']->value;?>
">
                                        <input type="hidden" id="CustomerEmail" name="CustomerEmail"
                                            value="<?php echo $_smarty_tpl->tpl_vars['CustomerEmail']->value;?>
">   
                                        <input type="hidden" id="ccemail" name="ccemail" value="<?php echo $_smarty_tpl->tpl_vars['ccemail']->value;?>
">
                                        <button type="submit" class="btn btn-primary btn-md" id="BtnSendEmail"
                                            style="font-weight:bold;font-size:20px;margin:30px;">
                                            <i class="fa fa-envelope"></i> 發送通知</button>
        
                                <?php }?>
                                -- 上傳報告 -- -->
                                <div class="form-group" id="DisplayUploadButton">
                                    <center>
                                        <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 1 || $_smarty_tpl->tpl_vars['Permission']->value == 9) {?>

                                        <label type="button" class="btn btn-primary btn-block"
                                            style="font-weight:bold;font-size:20px;width:40%;;margin:30px;">
                                            <input id="ReportUploadPDF" name="ReportUploadPDF" style="display:none;"
                                                type="file" accept="application/pdf" />
                                            <i class="fa fa-file-pdf"></i> 上傳報告結果
                                        </label>

                                        <?php } else { ?>

                                        <label type="button" class="btn btn-primary btn-block"
                                            style="font-weight:bold;font-size:20px;width:40%;;margin:30px;">
                                            <input id="ReportApply" name="ReportApply" style="display:none;" type="file"
                                                accept="application/pdf" />
                                            <i class="fa fa-file-pdf"></i> 上傳申請單
                                        </label>
                                        <?php }?>
                                        <!-- <label type="button" class="btn btn-primary btn-block"
                                            style="font-weight:bold;font-size:20px;width:40%;;margin:30px;">
                                            <input id="ReportUploadLogoPDF" name="ReportUploadLogoPDF"
                                                style="display:none;" type="file" accept="application/pdf" />
                                            <i class="fa fa-file-pdf"></i> 上傳院所版本
                                        </label> -->


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
                            <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 1) {?>
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEditPDF"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修 改</button>

                            </p>
                            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 2) {?>
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEdit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修 改</button>

                            </p>
                            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 4 || $_smarty_tpl->tpl_vars['Permission']->value == 5 || $_smarty_tpl->tpl_vars['Permission']->value == 9) {?>
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEdit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修 改</button>
                            </p>
                            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 6) {?>
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportDelete"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-trash"></i> 刪 除</button>
                            </p>
                            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 3) {?>
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                            </p>


                            <!-- <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 4) {?>
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEditccemail"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修改郵件</button> -->

                            <?php }?>
                            <!--SUBMIT BUTTON IS CONNECTED TO HOME.PHP-->
                            <p id="ReportConfirmButton">
                                <button type="button" class="btn btn-custom btn-danger btn-md" id=BtnReportCancel
                                    name=BtnReportCancel style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-window-close"></i> 取 消</button>
                                <button type="submit" class="btn btn-custom btn-success btn-md" id=BtnReportSubmit
                                    name=BtnReportSubmit style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-paper-plane"></i> 確 認</button>
                            <p id="uploadWarning" style="color: red; display: none;">請上傳申請單</p>
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
                    <!-- pdf-output -->
                    <div class="row" id="pdf-output">
                        <div class="form-horizontal" role="form">
                            <div class="col-md-12" style="text-align: center;">
                                <?php echo $_smarty_tpl->tpl_vars['output']->value;?>

                            </div>
                        </div>

                        <br>
                        <br>
                        <!---- LooPDF Preview -->
                        <!-- <div class="row" id="LogoPDFArea">
                        <div class="form-horizontal" role="form">
                            <div class="col-md-12">
                                <embed id='LogoFile' name='LogoFile' src='<?php echo $_smarty_tpl->tpl_vars['LogoFile']->value;?>
' type='application/pdf'
                                    width='100%' height='1000px' />
                            </div>
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
</form>
<?php echo '<script'; ?>
>
    function populateSubmenu(mainMenu, subMenu) {
        var subMenuData = {
            "M1": [
                "M101-01 Pathogen Fast Identification (DNA)",
                "M102-01 Pathogen Fast Identification (RNA)",
                "M103-01 Pathogen Fast Identification"
            ],
            "M2": [
                "M201-01 Mycoplasma (General)",
                "M201-02 Mycoplasma",
                "M202-01 Mycoplasma (Express)",
                "M202-02 Mycoplasma (Express)"
            ],
            "O1": [
                "O101-01 Circulating Tumor Cell (CTC) Assay Report"
            ],
            "P1": [
                "P101-01 Lihpao Multi-cancer Target Drug Panel",
                "P101-02 Lihpao Comprehensive CDx-30 Genes (FFPE)",
                "P101-03 Lihpao Multi-cancer Target Drug Genetic Testing",
                "P102-01 Lihpao CRC Target Drug Panel",
                "P102-02 Lihpao CRC Target Drug Genetic Testing",
                "P103-01 Lihpao NSCLC Target Drug Panel",
                "P103-02 Lihpao NSCLC Target Drug Genetic Testing",
                "P104-01 Lihpao BRCA1/2 Germline Panel",
                "P104-02 Lihpao Germline BRCA1/2 Genetic Testing",
                "P105-01 Lihpao Multi-cancer Target Drug RNA Panel",
                "P105-02 Lihpao Multi-Cacner Target Drug RNA Genetic Testing",
                "P106-01 Lihpao Lung Fusion Target Drug Panel",
                "P107-01 Lihpao Lung Cancer Comprehensive Target Drug Panel",
                "P108-01 Next-generation sequencing for Breast cancer",
                "P109-01 Next-generation sequencing for Colon cancer",
                "P110-01 CDx DNA Genetic Testing_HS",
                "P111-01 CDx DNA Genetic Testing_S5",
                "P111-02 Tumor DNA Genetic Testing",
                "P112-01 CDx RNA Genetic Testing_HS",
                "P113-01 CDx RNA Genetic Testing_S5",
                "P113-02 Tumor RNA Genetic Testing",
                "P115-01 Lihpao Multi-cancer Target Drug Panel_HS",
                "P116-01 Lihpao CRC Target Drug Panel_HS",
                "P117-01 Lihpao NSCLC Target Drug Panel_HS",
                "P118-01 Lihpao Multi-cancer Target Drug Panel (Comprehensive Version)"
            ],
            "P2": [
                "P201-01 BRCA1/2 of Somatic Genetic Testing",
                "P202-01 ARVC Panel",
                "P203-01 HCM Panel",
                "P204-01 NOTCH3 EGFr Domain, Exon 2-24"
            ],
            "P3": [
                "P301-01 BRCA1/2 of Somatic and Germline Genetic Testing"
            ],
            "S1": [
                "S101-01 EGFR 29 Mutations Detection",
                "S101-02 EGFR 29 Mutations Detection",
                "S102-01 KRAS Mutation Detection",
                "S103-01 BRAF V600 Mutations Detection"
            ],
            "S2": [
                "S201-01 APOE Genotyping",
                "S202-01 Metabolism Trio Genetic Testing",
                "S203-01 CYP1A2 Genotyping",
                "S204-01 ADH1B Genotyping",
                "S205-01 ALDH2 Genotyping",
                "S206-01 NOTCH3 R544C Genotyping",
                "S208-01 CYP2C19 *2/*3 Genotyping"
            ],
            "S3": [
                "S301-01 Sanger Sequencing",
                "S302-01 NOTCH3 R544C Genotyping",
                "S303-01 CYP2C19 *2/*3 Genotyping",
                "S304-01 DPD Deficiency Genetic Testing",
                "S305-01 BDNF rs6265 Genotyping",
                "S306-01 PKD genetic testing genetic testing (Hotspot)",
                "S307-01 TGFBI (Hotspots) Genetic Testing"
            ],
            "W1": [
                "W100-01 Hereditary Cancer Genetic Testing",
                "W101-01 Prostate Cancer Germline Genetic Testing",
                "W102-01 Hereditary Cancer Genetic Testing"
            ],
            "W2": [
                "W200-01 Cardiovascular Disease Genetic Testing",
                "W201-01 ARVC Genetic Testing",
                "W202-01 HCM Genetic Testing",
                "W203-01 DCM Genetic Testing",
                "W204-01 TAAD Genetic Testing",
                "W205-01 ATS Genetic Testing",
                "W206-01 DMVD Genetic Testing",
                "W207-01 Familial Hypercholesterolemia Genetic Testing",
                "W208-01 Marfan Syndrome Genetic Testing",
                "W209-01 Arrhythmia Genetic Testing",
                "W210-01 Brugada Syndrome Genetic Testing",
                "W211-01 Catecholaminergic Polymorphic Ventricular Tachycardia Genetic Testing",
                "W212-01 Long QT Syndrome Genetic Testing",
                "W213-01 Short QT Syndrome Genetic Testing",
                "W214-01 ARVC Genetic Testing",
                "W215-01 HCM Genetic Testing",
                "W216-01 Familial hypercholesterolemia genetic testing",
                "W217-01 Aortopathy genetic testing",
                "W218-01 SADS genetic testing",
                "W219-01 Cardiovascular disease genetic testing"
            ],
            "W3": [
                "W300-01 Neurological Disease Genetic Testing",
                "W300-02 Neurological Disease Genetic Testing",
                "W301-01 Cerebral Small Vessel Disease Genetic Testing",
                "W302-01 Parkinsonism Genetic Testing",
                "W303-01 Hereditary Spastic Paraplegia Genetic Testing",
                "W304-01 Dystonia Genetic Testing",
                "W305-01 Cognitive Disorder Genetic Testing",
                "W305-02 Cognitive Disorder Genetic Testing",
                "W306-01 Wilson's disease Genetic Testing",
                "W307-01 Neurofibromatosis Genetic Testing",
                "W308-01 Ataxia Genetic Testing",
                "W309-01 Tuberous Sclerosis Genetic Testing",
                "W310-01 Amyotrophic Lateral Sclerosis Genetic Testing",
                "W311-01 Leukodystrophy Genetic Testing",
                "W312-01 Von-Hippel-Lindau Disease Genetic Testing",
                "W313-01 Charcot-Marie-Tooth Disease Genetic Testing",
                "W314-01 Cerebral Autosomal Dominant Arteriopathy with Subcortical Infarcts and Leukoencephalopathy Genetic Testing",
                "W314-02 CADASIL Genetic Testing",
                "W315-01 Lysosomal Storage Disease Genetic Testing",
                "W316-01 Tourette's Syndrome Genetic Testing",
                "W317-01 MELAS Syndrome Genetic Testing",
                "W318-01 Multiple System Atrophy Genetic Testing",
                "W319-01 Primary Lateral Sclerosis Genetic Testing",
                "W320-01 Familial Amyloid Polyneuropathy Genetic Testing",
                "W321-01 Epilepsy Genetic Testing",
                "W322-01 Common Neurological Disease Genetic Testing",
                "W323-01 Inherited Stroke Genetic Testing",
                "W324-01 Cerebral Small Vessel Disease Genetic Testing",
                "W325-01 Inherited Stroke Genetic Testing",
                "W326-01 Common Neurological Disease Genetic Testing",
                "W327-01 Neurological Disease Genetic Testing",
                "W327-02 Neurological Disease Genetic Testing",
                "W328-01 Parkinson Disease Genetic Testing",
                "W329-01 Cerebral Small Vessel Disease Genetic Testing",
                "W330-01 Cognitive Disorder Genetic Testing",
                "W331-01 Epilepsy Genetic Testing",
                "W332-01 Common Neurological Disease Genetic Testing",
                "W333-01 Neurological Disease Genetic Testing"
            ],
            "W4": [
                "W401-01 Genetic Carrier Screening v1.0",
                "W402-01 Genetic Carrier Screening v2.0",
                "W403-01 Genetic Carrier Screening v3.0"
            ],
            "W5": [
                "W501-01 Healthy Weight Genetic Testing",
                "W502-01 Healthy Weight Genetic Testing for Monogenic Disorders",
                "W503-01 Skin Care Genetic Testing",
                "W504-01 Skin Immunity Genetic Testing",
                "W505-01 Bone Health Genetic Testing (Female)",
                "W506-01 Bone Health Genetic Testing (Male)",
                "W507-01 Alcohol Metabolism Genetic Testing",
                "W508-01 Height Potential Genetic Testing",
                "W509-01 Personality Genetic Testing",
                "W510-01 Athletic Performance Genetic Testing",
                "W511-01 Uterine Care Genetic Testing",
                "W512-01 Genetic Predisposition Testing for Type 2 Diabetes",
                "W513-01 Eye Health Genetic Testing",
                "W514-01 Eye Health Genetic Testing for Monogenic Disorders",
                "W515-01 Hair Care Genetic Testing (Female)",
                "W516-01 Hair Care Genetic Testing (Male)",
                "W517-01 Sleep Care Genetic Testing (Female)",
                "W518-01 Sleep Care Genetic Testing (Male)",
                "W519-01 Genetic Predisposition Testing for Precocious Puberty (Female)",
                "W520-01 Genetic Predisposition Testing for Precocious Puberty (Male)",
                "W521-01 Cerebrovascular Health Genetic Testing (Female)",
                "W522-01 Cerebrovascular Health Genetic Testing (Male)",
                "W523-01 Cerebrovascular Health Genetic Testing for Monogenic Disorders",
                "W524-01 Genetic Predisposition Testing for Chronic Kidney Disease",
                "W525-01 Genetic Predisposition Testing for Urolithiasis and Nephrolithiasis",
                "W526-01 Genetic Predisposition Testing for Gastroesophageal Reflux Disease",
                "W527-01 Genetic Predisposition Testing for Longevity (Female)",
                "W527-02 Longevity Genetic Testing (Female)",
                "W528-01 Genetic Predisposition Testing for Longevity (Male)",
                "W528-02 Longevity Genetic Testing (Male)",
                "W529-01 Chest Care Genetic Testing",
                "W530-01 Caffeine Metabolism Genetic Testing",
                "W531-01 Cholesterol Metabolism Genetic Testing",
                "W532-01 Liver Health Genetic Testing"
            ],
            "W6": [
                "W601-01 Glaucoma Genetic Testing",
                "W602-01 Macular Degeneration Genetic Testing"
            ],
            "R9": [
                "R9 客製化報告"
            ]
        };

        var selectedCategory = mainMenu.value;
        var options = subMenuData[selectedCategory] || [];

        subMenu.innerHTML = '';

        options.forEach(function (option) {
            var opt = document.createElement('option');
            opt.value = option;
            opt.innerHTML = option;
            subMenu.appendChild(opt);
        });
    }

    // function hospitalSubmenu(hospitalMenu, subhospitalMenu) {
    //     var hospitalData = {
    //         "1": ["王智鴻"],
    //         "2": ["連立明", "林冠佑", "蔣介雅", "張名鑫", "許維志", "張安娜", "陳威宏"],
    //         "3": ["朱素娟"],
    //         "4": ["劉修勳", "許博荏"],
    //         "5": ["莊茜"],
    //         "6": ["孫瑜", "劉長袖", "鍾季廷", "呂建榮"],
    //         "7": ["王韻筑", "黃立楷", "黃媚莉", "陳嘉泓", "鄭芸詠"],
    //         "8": ["洪琨景"],
    //         "9": [""],
    //         "10": ["傅維仁", "黃勇評"],
    //         "11": ["宋岳峰", "周中興", "劉懿", "葉大全", "徐昌鴻"],
    //         "12": ["呂彥瑢"],
    //         "13": ["葉怡君"],
    //         "14": ["陳鴻儒", "宋家瑩"],
    //         "15": ["胡昭榮"],
    //         "16": ["馬松蔚", "王雪君"],
    //         "17": [""],
    //         "18": ["美玲"],
    //         "19": [""],
    //         "20": ["趙育萱"],
    //         "21": ["孫敏珠"],
    //         "22": ["黃忠諺"],
    //         "23": [""],
    //         "24": ["魏誠佑"],
    //         "25": [""],
    //         "26": ["涂川洲"],
    //         "27": ["陳彥中", "巫錫霖"],
    //         "28": ["傅雲慶"],
    //         "29": ["王淑貞"],
    //         "30": ["林士君"],
    //         "31": ["蔡耀隆"],
    //         "32": ["陳詩怡"],
    //         "33": ["蔡孟翰"],
    //         "34": ["劉怡慶", "徐仲豪"],
    //         "35": ["陳鴻斌"],
    //         "36": ["泓采診所"]


    //     };
    //     var selectedCategory = hospitalMenu.value;
    //     var options = hospitalData[selectedCategory] || [];

    //     subhospitalMenu.innerHTML = '';

    //     options.forEach(function (option) {
    //         var opt = document.createElement('option');
    //         opt.value = option;
    //         opt.innerHTML = option;
    //         subhospitalMenu.appendChild(opt);
    //     });

    // }


<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    // Define the contacts for each hospital
    const hospitalContacts = {
        "1": ["王智鴻"],
        "2": ["連立明", "林冠佑", "蔣介雅", "張名鑫", "許維志", "張安娜", "陳威宏"],
        "3": ["朱素娟"],
        "4": ["劉修勳", "許博荏"],
        "5": ["莊茜"],
        "6": ["孫瑜", "劉長袖", "鍾季廷", "呂建榮"],
        "7": ["王韻筑", "黃立楷", "黃媚莉", "陳嘉泓", "鄭芸詠"],
        "8": ["洪琨景"],
        "9": [""],
        "10": ["傅維仁", "黃勇評"],
        "11": ["宋岳峰", "周中興", "劉懿", "葉大全", "徐昌鴻"],
        "12": ["呂彥瑢"],
        "13": ["葉怡君"],
        "14": ["陳鴻儒", "宋家瑩"],
        "15": ["胡昭榮"],
        "16": ["馬松蔚", "王雪君"],
        "17": [""],
        "18": ["美玲"],
        "19": [""],
        "20": ["趙育萱"],
        "21": ["孫敏珠"],
        "22": ["黃忠諺"],
        "23": [""],
        "24": ["魏誠佑"],
        "25": [""],
        "26": ["涂川洲"],
        "27": ["陳彥中", "巫錫霖"],
        "28": ["傅雲慶"],
        "29": ["王淑貞"],
        "30": ["林士君"],
        "31": ["蔡耀隆"],
        "32": ["陳詩怡"],
        "33": ["蔡孟翰"],
        "34": ["劉怡慶", "徐仲豪"],
        "35": ["陳鴻斌"],
        "36": ["泓采診所"]
    };

    // Get references to the select elements
    const hospitalSelect = document.getElementById('HospitalList');
    const contactSelect = document.getElementById('CustomerName');

    // Add an event listener to the hospital select element
    hospitalSelect.addEventListener('change', function () {
        // Get the selected hospital
        const selectedHospital = this.value;

        // Clear the current options in the contact select element
        contactSelect.innerHTML = '';

        // Populate the contact select element with the new options
        if (hospitalContacts[selectedHospital]) {
            hospitalContacts[selectedHospital].forEach(function (contact) {
                const option = document.createElement('option');
                option.value = contact;
                option.text = contact;
                contactSelect.appendChild(option);
            });
        }
    });

    // Optionally, trigger the change event to populate the contacts on page load
    hospitalSelect.dispatchEvent(new Event('change'));
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    function downloadJson() {
        // 設置 JSON 文件的 URL
        var fileUrl = "./uploads/".$ReportID;

        // 創建一個隱藏的 <a> 元素
        var a = document.createElement('a');
        a.href = fileUrl;
        a.download = 'file.json'; // 設置下載的文件名

        // 將 <a> 元素添加到 DOM 並觸發點擊事件
        document.body.appendChild(a);
        a.click();

        // 移除 <a> 元素
        document.body.removeChild(a);
    }
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    document.getElementById('BtnReportSubmit').addEventListener('click', function (event) {
        var fileInput = document.getElementById('ReportApply');
        var uploadWarning = document.getElementById('uploadWarning');

        if (fileInput.files.length === 0) {
            event.preventDefault(); // 阻止表單提交
            uploadWarning.style.display = 'block'; // 顯示提示文字
        } else {
            uploadWarning.style.display = 'none'; // 隱藏提示文字
        }
    });
<?php echo '</script'; ?>
>
<!---------------------------End-----------------------------><?php }
}
