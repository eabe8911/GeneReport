<?php
/* Smarty version 4.3.4, created on 2024-06-05 14:16:02
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\ReportDetailMaintain.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_666002a234e002_72224786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '451136e515d260dcfeb69b381fca1166c93b1f0d' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\ReportDetailMaintain.tpl',
      1 => 1717568160,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_666002a234e002_72224786 (Smarty_Internal_Template $_smarty_tpl) {
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

                                        <select id="main-menu" name="main-menu" class="form-control"
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
                                <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 1 || $_smarty_tpl->tpl_vars['Permission']->value == 2 || $_smarty_tpl->tpl_vars['Permission']->value == 4 || $_smarty_tpl->tpl_vars['Permission']->value == 5 || $_smarty_tpl->tpl_vars['Permission']->value == 9) {?>
                                <div class="form-group">
                                    <label for="TemplateID" class="col-md-3 control-label">報告樣板:</label>
                                    <div class="col-md-8">
                                        <!-- <?php echo smarty_function_html_options(array('name'=>'TemplateID','id'=>'TemplateID','options'=>$_smarty_tpl->tpl_vars['TemplateOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['TemplateSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>
 -->
                                        <?php echo smarty_function_html_options(array('name'=>'TemplateID','id'=>'TemplateID','options'=>array(''=>'請選擇...')+$_smarty_tpl->tpl_vars['TemplateOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['TemplateSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>

                                    </div>
                                </div>
                                <?php }?>
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
                                        <input type="datetime-local" id="scdate" name="scdate" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['scdate']->value;?>
">
                                    </div>
                                </div>
                                <!---- 收檢日期 ---->
                                <div class="form-group">
                                    <label for="rcdate" class="col-md-3 control-label">收檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="rcdate" name="rcdate" class="form-control" required
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
                                    <label for="CustomerName" class="col-md-3 control-label">聯絡人名稱:</label>
                                    <div class="col-md-8">
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
                                    <label for="ccemail" class="col-md-3 control-label">信箱(副本):</label>
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

                                <!---- 上傳報告 ---->
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
            "M1": ["次世代病原微生物檢測[DNA病原]", "次世代病原微生物檢測[RNA病毒]", "次世代病原微生物檢測套組"],
            "M2": ["黴漿菌檢測(一般件)", "黴漿菌檢測(急件)"],
            "O1": ["循環腫瘤細胞篩查檢測"],
            "P1": ["麗寶克癌標靶藥物基因檢測", "麗寶大腸直腸癌標靶藥物基因檢測", "麗寶非小細胞肺癌標靶藥物基因檢測", "麗寶BRCA1/2遺傳性基因檢測", "麗寶克癌標靶藥物RNA基因檢測", "肺癌融合基因伴隨式診斷", "肺癌混合式標靶藥物基因檢測", "次世代定序乳癌基因檢測(麗寶克癌標靶藥物基因檢測)", "次世代定序腸癌基因檢測(麗寶大腸直腸癌標靶藥物基因檢測)"],
            "P2": ["體細胞BRCA1與BRCA2基因檢測", "致心律失常性右心室心肌病變基因檢測", "肥厚型心肌病變基因檢測", "NOTCH3 基因檢測"],
            "P3": ["體細胞及生殖細胞之BRCA1與BRCA2基因檢測"],
            "S1": ["EGFR 29突變檢測", "KRAS突變檢測", "BRAF V600突變檢測"],
            "S2": ["APOE基因分型", "代謝三重奏", "CYP1A2 基因分型", "ADH1B 基因分型", "ALDH2 基因分型"],
            "S3": ["單一核苷酸多型性(單一基因)檢測", "NOTCH3 R544C基因分型", "CYP2C19 *2/*3基因分型", "二氫嘧啶去氫酶缺乏症檢測", "BDNF rs6265基因分型"],
            "W1": ["遺傳性癌症基因檢測", "前列腺癌基因檢測服務"],
            "W2": ["心血管疾病基因檢測", "擴張性心肌病變基因檢測", "胸主動脈瘤剝離症候群基因檢測", "動脈粥狀硬化基因檢測", "退化性二尖瓣疾病基因檢測", "家族性高膽固醇血症基因檢測", "馬凡氏症候群基因檢測", "心律不整基因檢測", "布魯格達氏症候群基因檢測", "兒茶酚胺多型性心室頻脈基因檢測", "長QT症候群基因檢測", "短QT症候群基因檢測"],
            "W3": ["神經系統疾病基因檢測", "腦小血管疾病基因檢測套組", "帕金森氏症基因檢測", "遺傳性痙攣性下身麻痺基因檢測", "肌張力不全症基因檢測", "認知障礙基因檢測套組", "威爾森氏症基因檢測", "多發性神經纖維瘤基因檢測", "共濟失調基因檢測", "結節性硬化症基因檢測", "脊髓側索硬化基因檢測", "腦白質失養症基因檢測", "希佩爾-林道症候群基因檢測", "夏柯-馬利-杜斯氏病基因檢測", "體顯性腦動脈血管病變合併皮質下腦梗塞及腦白質病變基因檢測", "溶小體儲積症基因檢測", "妥瑞症候群基因檢測", "MELAS症候群基因檢測", "多發性系統退化症基因檢測", "原發性側索硬化基因檢測", "家族性澱粉樣多發性神經病變基因檢測", "癲癇基因檢測套組", "常見神經疾病基因檢測套組", "遺傳性腦中風基因檢測套組"],
            "W4": ["帶因篩檢 v1.0", "帶因篩檢 v2.0", "帶因篩檢 v3.0"],
            "W5": ["體重健康管理基因檢測", "單基因體重健康管理基因檢測", "美肌體質評估基因檢測", "肌膚免疫健康管理基因檢測", "骨質健康管理基因檢測(女)", "骨質健康管理基因檢測(男)", "酒精代謝體質評估基因檢測", "身高潛力基因檢測", "性格特質基因檢測", "運動性向基因檢測", "子宮健康管理基因檢測", "第二型糖尿病健康管理基因檢測", "眼睛健康管理基因檢測", "單基因眼睛健康管理基因檢測", "髮質健康管理基因檢測(女)", "髮質健康管理基因檢測(男)", "睡眠健康管理基因檢測(女)", "睡眠健康管理基因檢測(男)", "性早熟風險管理基因檢測(女)", "性早熟風險管理基因檢測(男)", "腦血管健康管理基因檢測(女)", "腦血管健康管理基因檢測(男)", "單基因腦血管健康管理基因檢測", "慢性腎臟病風險管理基因檢測", "尿路與腎結石風險管理基因檢測", "胃食道逆流風險管理基因檢測", "長壽體質基因檢測(女)", "長壽體質基因檢測(男)", "胸腔健康基因檢測", "咖啡因代謝基因檢測", "膽固醇代謝基因檢測", "肝臟健康基因檢測"],
            "R9": ["R9 客製化報告"]
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
<?php echo '</script'; ?>
>

<!---------------------------End-----------------------------><?php }
}
