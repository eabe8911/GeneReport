<?php
/* Smarty version 4.3.4, created on 2025-03-07 17:13:55
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\ReportDetailMaintain.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67cab8d3586376_67860137',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '451136e515d260dcfeb69b381fca1166c93b1f0d' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\ReportDetailMaintain.tpl',
      1 => 1741336864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67cab8d3586376_67860137 (Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="card-box" style="height: 150%;">
                    <div class="row">
                        <div class="form-horizontal" role="form">
                            <!---- 第一排 ---->
                            <div class="col-md-4">

                                <!---- 檢測單位 ---->
                                <div class="form-group">
                                    <label for="ReportType" class="col-md-3 control-label">檢測單位:</label>
                                    <div class="col-md-8">

                                        <?php echo smarty_function_html_options(array('name'=>'ReportType','id'=>'ReportType','options'=>array(''=>'請選擇...')+$_smarty_tpl->tpl_vars['ReportTypeOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['ReportTypeSelect']->value,'class'=>"form-control",'onchange'=>"checkTestUnit()",'required'=>"required"),$_smarty_tpl);?>


                                    </div>
                                </div>
                                <!---- 姓   名 ---->
                                <div class="form-group" id="proband_name_group">
                                    <label for="proband_name" class="col-md-3 control-label">姓 名:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="proband_name" name="proband_name" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['proband_name']->value;?>
">
                                        <!-- <p id="proband_name_warning" style="color: red; display: none;">所選檢測單位不需填寫姓名</p> -->
                                    </div>
                                </div>

                                <!---- 報告編號 ---->
                                <div class="form-group">
                                    <label for="ReportID" class="col-md-3 control-label">報告編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportID" name="ReportID" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['ReportID']->value;?>
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
                                <!---- 檢體編號 ---->
                                <div class="form-group">
                                    <label for="SampleNo" class="col-md-3 control-label">檢體編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleNo" name="SampleNo" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['SampleNo']->value;?>
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
                                            <option value="36" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 36) {?>selected<?php }?>>一般客戶</option>
                                            <option value="37" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 37) {?>selected<?php }?>>上明眼科</option>
                                            <option value="38" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 38) {?>selected<?php }?>>泓采診所</option>
                                            <option value="39" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 39) {?>selected<?php }?>>衛福部桃園醫院
                                            </option>
                                            <option value="40" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 40) {?>selected<?php }?>>台灣病理學會_PT
                                            </option>
                                            <option value="41" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 41) {?>selected<?php }?>>台灣醫事檢驗學會-PT
                                            </option>
                                            <option value="42" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 42) {?>selected<?php }?>>GenQA-PT
                                            </option>
                                            <option value="43" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 43) {?>selected<?php }?>>API_PT</option>
                                            <option value="44" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 44) {?>selected<?php }?>>EMQN_PT
                                            </option>
                                            <option value="45" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 45) {?>selected<?php }?>>台美_PT</option>
                                            <option value="46" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 46) {?>selected<?php }?>>RD_評鑑實作
                                            </option>
                                            <option value="47" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 47) {?>selected<?php }?>>室間比對</option>
                                            <option value="48" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 48) {?>selected<?php }?>>嘉義基督教醫院</option>
                                            <option value="49" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 49) {?>selected<?php }?>>衛生福利部嘉義醫院</option>
                                            <option value="50" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 50) {?>selected<?php }?>>彰化基督教醫院</option>
                                            <option value="51" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 51) {?>selected<?php }?>>北秀健康管理診所</option>
                                            <option value="52" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 52) {?>selected<?php }?>>台中榮總嘉義分院</option>
                                            <option value="53" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 53) {?>selected<?php }?>>花蓮慈濟醫院</option>
                                            <option value="54" <?php if ($_smarty_tpl->tpl_vars['HospitalListSelect']->value == 54) {?>selected<?php }?>>台北馬偕紀念醫院</option>
                                                </select>  


                                    </div>

                                </div>
                                <!---- 科別 ---->
                                <div class="form-group">
                                    <label for="Department" class="col-md-3 control-label">科別:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Department" name="Department" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['Department']->value;?>
">
                                    </div>
                                </div>

                                <!---- 送件人 ---->
                                <div class="form-group ">
                                    <label for="HospitalList_Dr" class="col-md-3 control-label">送件人:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="HospitalList_Dr" name="HospitalList_Dr"
                                            class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['HospitalList_Dr']->value;?>
">
                                    </div>
                                </div>

                                <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 2 || $_smarty_tpl->tpl_vars['Permission']->value == 5 || $_smarty_tpl->tpl_vars['Permission']->value == 9) {?>
                                <div class="form-group">
                                    <label for="main-menu" class="col-md-3 control-label">檢測項目系列:</label>
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
                                            <option value="P9">P9 系列</option>
                                            <option value="S1">S1 系列</option>
                                            <option value="S2">S2 系列</option>
                                            <option value="S3">S3 系列</option>
                                            <option value="S9">S9 系列</option>
                                            <option value="W1">W1 系列</option>
                                            <option value="W2">W2 系列</option>
                                            <option value="W3">W3 系列</option>
                                            <option value="W4">W4 系列</option>
                                            <option value="W5">W5 系列</option>
                                            <option value="W6">W6 系列</option>
                                            <option value="W9">W9 系列</option>



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
                                <!---- 檢測方法 ---->
                                <div class="form-group">
                                    <label for="method" class="col-md-3 control-label">檢測方法:</label>
                                    <div class="col-md-8">
                                        <select id="method" name="method" class="form-control" required>
                                            <option value="">請選擇檢測方法</option>
                                            <option value="CTC" <?php if ($_smarty_tpl->tpl_vars['method']->value == "CTC") {?>selected<?php }?>>CTC</option>
                                            <option value="NGS" <?php if ($_smarty_tpl->tpl_vars['method']->value == "NGS") {?>selected<?php }?>>NGS</option>
                                            <option value="qPCR" <?php if ($_smarty_tpl->tpl_vars['method']->value == "qPCR") {?>selected<?php }?>>qPCR</option>
                                            <option value="Sanger" <?php if ($_smarty_tpl->tpl_vars['method']->value == "Sanger") {?>selected<?php }?>>Sanger定序
                                            </option>

                                        </select>
                                    </div>
                                </div>

                                <!---- 報告樣板 ---->
                                <div class="form-group">
                                    <label for="TemplateID" class="col-md-3 control-label">報告樣板:</label>
                                    <div class="col-md-8">

                                        <?php echo smarty_function_html_options(array('name'=>'TemplateID','id'=>'TemplateID','options'=>array(''=>'請選擇...')+$_smarty_tpl->tpl_vars['TemplateOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['TemplateSelect']->value,'class'=>"form-control",'required'=>"required"),$_smarty_tpl);?>

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
                                <!---- 送檢日期 ---->
                                <div class="form-group">
                                    <label for="Submitdate" class="col-md-3 control-label">送檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="Submitdate" name="Submitdate"
                                            class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['Submitdate']->value;?>
">
                                    </div>
                                </div>
                                <!---- 疾病及症狀 ---->
                                <div class="form-group">
                                    <label for="Diseases" class="col-md-3 control-label">疾病及症狀:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Diseases" name="Diseases" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['Diseases']->value;?>
">
                                    </div>
                                </div>
                                <!---- 腫瘤百分比 ---->
                                <div class="form-group">
                                    <label for="Tumor_percentage" class="col-md-3 control-label">腫瘤百分比:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Tumor_percentage" name="Tumor_percentage"
                                            class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['Tumor_percentage']->value;?>
">
                                    </div>
                                </div>

                            </div>
                            <!---- 第二排 ---->
                            <div class="col-md-4">

                                <!---- 樣品種類一 ---->
                                <fieldset>
                                    <legend>
                                        <a data-toggle="collapse" href="#sample1" aria-expanded="true"
                                            aria-controls="sample1">
                                            樣品一
                                        </a>
                                    </legend>
                                    <div id="sample1" class="collapse in">
                                        <div class="form-group">
                                            <label for="SampleType_1" class="col-md-3 control-label">樣品種類一:</label>
                                            <div class="col-md-8">
                                                <select id="SampleType_1" name="SampleType_1" class="form-control"
                                                    required onchange="updateUnit_1()">
                                                    <option value="">請選擇樣品種類</option>
                                                    <option value="EDTA紫頭管-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "EDTA紫頭管-全血") {?>selected<?php }?>>
                                                        EDTA紫頭管-全血</option>
                                                    <option value="Streck cfDNA BCT(迷彩管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "Streck cfDNA BCT(迷彩管)-全血") {?>selected<?php }?>>Streck
                                                        cfDNA
                                                        BCT(迷彩管)-全血</option>
                                                    <option value="Streck RNA Complete BCT(橘頭管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "Streck RNA Complete BCT(橘頭管)-全血") {?>selected<?php }?>>
                                                        Streck
                                                        RNA Complete BCT(橘頭管)-全血</option>
                                                    <option value="5 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "5 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>5 ㎛
                                                        FFPE玻片(不含圈片)</option>
                                                    <option value="10 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "10 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>10 ㎛
                                                        FFPE玻片(不含圈片)</option>
                                                    <option value="染色圈片" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "染色圈片") {?>selected<?php }?>>染色圈片
                                                    </option>
                                                    <option value="粗針穿刺檢體" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "粗針穿刺檢體") {?>selected<?php }?>>
                                                        粗針穿刺檢體
                                                    </option>
                                                    <option value="gDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "gDNA") {?>selected<?php }?>>gDNA
                                                    </option>
                                                    <option value="口腔拭子-口腔黏膜細胞" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "口腔拭子-口腔黏膜細胞") {?>selected<?php }?>>
                                                        口腔拭子-口腔黏膜細胞</option>
                                                    <option value="生資分析" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "生資分析") {?>selected<?php }?>>生資分析
                                                    </option>
                                                    <option value="細胞懸浮液" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "細胞懸浮液") {?>selected<?php }?>>
                                                        細胞懸浮液
                                                    </option>
                                                    <option value="cDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "cDNA") {?>selected<?php }?>>
                                                        cDNA
                                                    </option>
                                                    <option value="蠟捲" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "蠟捲") {?>selected<?php }?>>
                                                        蠟捲
                                                    </option>

                                                    <option value="其他(請手動輸入樣品種類)" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "其他(請手動輸入樣品種類)") {?>selected<?php }?>>其他(請手動輸入樣品種類)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- 樣品數量一 (with unit next to the input) -->
                                        <div class="form-group row">
                                            <label for="SampleQuantity_1" class="col-md-3 control-label">樣品數量一:</label>
                                            <div class="col-md-8 input-group">
                                                <input type="number" id="SampleQuantity_1" name="SampleQuantity_1"
                                                    class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['SampleQuantity_1']->value;?>
">
                                                <span id="SampleUnit_1" class="input-group-addon"
                                                    id="SampleUnit_1"><?php echo $_smarty_tpl->tpl_vars['SampleUnit_1']->value;?>
</span>
                                            </div>
                                        </div>


                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>
                                        <a data-toggle="collapse" href="#sample2" aria-expanded="true"
                                            aria-controls="sample2">
                                            樣品二
                                        </a>
                                    </legend>

                                    <div id="sample2" class="collapse in">
                                        <!---- 樣品種類二 ---->
                                        <div class="form-group">
                                            <label for="SampleType_2" class="col-md-3 control-label">樣品種類二:</label>
                                            <div class="col-md-8">
                                                <select id="SampleType_2" name="SampleType_2" class="form-control"
                                                    onchange="updateUnit_2()">
                                                    <option value="">請選擇樣品種類</option>
                                                    <option value="EDTA紫頭管-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "EDTA紫頭管-全血") {?>selected<?php }?>>EDTA紫頭管-全血</option>
                                                    <option value="Streck cfDNA BCT(迷彩管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "Streck cfDNA BCT(迷彩管)-全血") {?>selected<?php }?>>Streck
                                                        cfDNA BCT(迷彩管)-全血</option>
                                                    <option value="Streck RNA Complete BCT(橘頭管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "Streck RNA Complete BCT(橘頭管)-全血") {?>selected<?php }?>>
                                                        Streck RNA Complete BCT(橘頭管)-全血</option>
                                                    <option value="5 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "5 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>5 ㎛
                                                        FFPE玻片(不含圈片)</option>
                                                    <option value="10 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "10 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>10 ㎛
                                                        FFPE玻片(不含圈片)</option>
                                                    <option value="染色圈片" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "染色圈片") {?>selected<?php }?>>染色圈片
                                                    </option>
                                                    <option value="粗針穿刺檢體" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "粗針穿刺檢體") {?>selected<?php }?>>
                                                        粗針穿刺檢體</option>
                                                    <option value="gDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "gDNA") {?>selected<?php }?>>gDNA
                                                    </option>
                                                    <option value="口腔拭子-口腔黏膜細胞" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "口腔拭子-口腔黏膜細胞") {?>selected<?php }?>>口腔拭子-口腔黏膜細胞</option>
                                                    <option value="生資分析" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "生資分析") {?>selected<?php }?>>生資分析
                                                    </option>
                                                    <option value="細胞懸浮液" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "細胞懸浮液") {?>selected<?php }?>>
                                                        細胞懸浮液</option>
                                                    <option value="其他(請手動輸入樣品種類)" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "其他(請手動輸入樣品種類)") {?>selected<?php }?>>其他(請手動輸入樣品種類)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- 樣品數量二 (with unit next to the input) -->
                                        <div class="form-group row">
                                            <label for="SampleQuantity_2" class="col-md-3 control-label">樣品數量二:</label>
                                            <div class="col-md-8 input-group">
                                                <input type="number" id="SampleQuantity_2" name="SampleQuantity_2"
                                                    class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['SampleQuantity_2']->value;?>
">
                                                <span class="input-group-addon" id="SampleUnit_2"><?php echo $_smarty_tpl->tpl_vars['SampleUnit_2']->value;?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>
                                        <a data-toggle="collapse" href="#sample3" aria-expanded="true"
                                            aria-controls="sample3">
                                            樣品三
                                        </a>
                                    </legend>

                                    <!---- 樣品種類三 ---->
                                    <div id="sample3" class="collapse">
                                        <div class="form-group ">
                                            <label for="SampleType_3" class="col-md-3 control-label">樣品種類三:</label>
                                            <div class="col-md-8">
                                                <select id="SampleType_3" name="SampleType_3" class="form-control"
                                                    onchange="updateUnit_3()">
                                                    <option value="">請選擇樣品種類</option>
                                                    <option value="EDTA紫頭管-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "EDTA紫頭管-全血") {?>selected<?php }?>>
                                                        EDTA紫頭管-全血</option>
                                                    <option value="Streck cfDNA BCT(迷彩管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "Streck cfDNA BCT(迷彩管)-全血") {?>selected<?php }?>>Streck
                                                        cfDNA
                                                        BCT(迷彩管)-全血</option>
                                                    <option value="Streck RNA Complete BCT(橘頭管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "Streck RNA Complete BCT(橘頭管)-全血") {?>selected<?php }?>>
                                                        Streck
                                                        RNA Complete BCT(橘頭管)-全血</option>
                                                    <option value="5 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "5 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>5 ㎛
                                                        FFPE玻片(不含圈片)</option>
                                                    <option value="10 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "10 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>10 ㎛
                                                        FFPE玻片(不含圈片)</option>
                                                    <option value="染色圈片" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "染色圈片") {?>selected<?php }?>>染色圈片
                                                    </option>
                                                    <option value="粗針穿刺檢體" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "粗針穿刺檢體") {?>selected<?php }?>>
                                                        粗針穿刺檢體
                                                    </option>
                                                    <option value="gDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "gDNA") {?>selected<?php }?>>gDNA
                                                    </option>
                                                    <option value="口腔拭子-口腔黏膜細胞" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "口腔拭子-口腔黏膜細胞") {?>selected<?php }?>>
                                                        口腔拭子-口腔黏膜細胞</option>
                                                    <option value="生資分析" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "生資分析") {?>selected<?php }?>>生資分析
                                                    </option>
                                                    <option value="細胞懸浮液" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "細胞懸浮液") {?>selected<?php }?>>
                                                        細胞懸浮液
                                                    </option>
                                                    <option value="其他(請手動輸入樣品種類)" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "其他(請手動輸入樣品種類)") {?>selected<?php }?>>其他(請手動輸入樣品種類)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="SampleQuantity_3" class="col-md-3 control-label">樣品數量三:</label>
                                            <div class="col-md-8 input-group">
                                                <input type="number" id="SampleQuantity_3" name="SampleQuantity_3"
                                                    class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['SampleQuantity_3']->value;?>
">
                                                <span class="input-group-addon" id="SampleUnit_3"><?php echo $_smarty_tpl->tpl_vars['SampleUnit_3']->value;?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>
                                        <a data-toggle="collapse" href="#sample4" aria-expanded="true"
                                            aria-controls="sample4">
                                            樣品四
                                        </a>
                                    </legend>

                                    <!---- 樣品種類四 ---->
                                    <div id="sample4" class="collapse">
                                        <div class="form-group ">
                                            <label for="SampleType_4" class="col-md-3 control-label">樣品種類四:</label>
                                            <div class="col-md-8">
                                                <select id="SampleType_4" name="SampleType_4" class="form-control"
                                                    onchange="updateUnit_4()">
                                                    <option value="">請選擇樣品種類</option>
                                                    <option value="EDTA紫頭管-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "EDTA紫頭管-全血") {?>selected<?php }?>>
                                                        EDTA紫頭管-全血</option>
                                                    <option value="Streck cfDNA BCT(迷彩管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "Streck cfDNA BCT(迷彩管)-全血") {?>selected<?php }?>>Streck
                                                        cfDNA
                                                        BCT(迷彩管)-全血</option>
                                                    <option value="Streck RNA Complete BCT(橘頭管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "Streck RNA Complete BCT(橘頭管)-全血") {?>selected<?php }?>>
                                                        Streck
                                                        RNA Complete BCT(橘頭管)-全血</option>
                                                    <option value="5 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "5 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>5 ㎛
                                                        FFPE玻片(不含圈片)</option>
                                                    <option value="10 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "10 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>10 ㎛
                                                        FFPE玻片(不含圈片)</option>
                                                    <option value="染色圈片" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "染色圈片") {?>selected<?php }?>>染色圈片
                                                    </option>
                                                    <option value="粗針穿刺檢體" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "粗針穿刺檢體") {?>selected<?php }?>>
                                                        粗針穿刺檢體
                                                    </option>
                                                    <option value="gDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "gDNA") {?>selected<?php }?>>gDNA
                                                    </option>
                                                    <option value="口腔拭子-口腔黏膜細胞" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "口腔拭子-口腔黏膜細胞") {?>selected<?php }?>>
                                                        口腔拭子-口腔黏膜細胞</option>
                                                    <option value="生資分析" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "生資分析") {?>selected<?php }?>>生資分析
                                                    </option>
                                                    <option value="細胞懸浮液" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "細胞懸浮液") {?>selected<?php }?>>
                                                        細胞懸浮液
                                                    </option>
                                                    <option value="其他(請手動輸入樣品種類)" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "其他(請手動輸入樣品種類)") {?>selected<?php }?>>其他(請手動輸入樣品種類)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="SampleQuantity_4" class="col-md-3 control-label">樣品數量四:</label>
                                            <div class="col-md-8 input-group">
                                                <input type="number" id="SampleQuantity_4" name="SampleQuantity_4"
                                                    class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['SampleQuantity_4']->value;?>
">
                                                <span class="input-group-addon" id="SampleUnit_4"><?php echo $_smarty_tpl->tpl_vars['SampleUnit_4']->value;?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend> <a data-toggle="collapse" href="#sample5" aria-expanded="true"
                                            aria-controls="sample5">
                                            樣品五
                                        </a></legend>

                                    <!---- 樣品種類五 ---->
                                    <div id="sample5" class="collapse">
                                        <div class="form-group ">
                                            <label for="SampleType_5" class="col-md-3 control-label">樣品種類五:</label>
                                            <div class="col-md-8">
                                                <select id="SampleType_5" name="SampleType_5" class="form-control"
                                                    onchange="updateUnit_5()">
                                                    <option value="">請選擇樣品種類</option>
                                                    <option value="EDTA紫頭管-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "EDTA紫頭管-全血") {?>selected<?php }?>>
                                                        EDTA紫頭管-全血</option>
                                                    <option value="Streck cfDNA BCT(迷彩管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "Streck cfDNA BCT(迷彩管)-全血") {?>selected<?php }?>>Streck
                                                        cfDNA
                                                        BCT(迷彩管)-全血</option>
                                                    <option value="Streck RNA Complete BCT(橘頭管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "Streck RNA Complete BCT(橘頭管)-全血") {?>selected<?php }?>>
                                                        Streck
                                                        RNA Complete BCT(橘頭管)-全血</option>
                                                    <option value="5 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "5 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>5 ㎛
                                                        FFPE玻片(不含圈片)</option>
                                                    <option value="10 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "10 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>10 ㎛
                                                        FFPE玻片(不含圈片)</option>
                                                    <option value="染色圈片" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "染色圈片") {?>selected<?php }?>>染色圈片
                                                    </option>
                                                    <option value="粗針穿刺檢體" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "粗針穿刺檢體") {?>selected<?php }?>>
                                                        粗針穿刺檢體
                                                    </option>
                                                    <option value="gDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "gDNA") {?>selected<?php }?>>gDNA
                                                    </option>
                                                    <option value="口腔拭子-口腔黏膜細胞" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "口腔拭子-口腔黏膜細胞") {?>selected<?php }?>>
                                                        口腔拭子-口腔黏膜細胞</option>
                                                    <option value="生資分析" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "生資分析") {?>selected<?php }?>>生資分析
                                                    </option>
                                                    <option value="細胞懸浮液" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "細胞懸浮液") {?>selected<?php }?>>
                                                        細胞懸浮液
                                                    </option>
                                                    <option value="其他(請手動輸入樣品種類)" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "其他(請手動輸入樣品種類)") {?>selected<?php }?>>其他(請手動輸入樣品種類)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="SampleQuantity_5" class="col-md-3 control-label">樣品數量五:</label>
                                            <div class="col-md-8 input-group">
                                                <input type="number" id="SampleQuantity_5" name="SampleQuantity_5"
                                                    class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['SampleQuantity_5']->value;?>
">
                                                <span class="input-group-addon" id="SampleUnit_5"><?php echo $_smarty_tpl->tpl_vars['SampleUnit_5']->value;?>
</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>



                            </div>

                            <!---- 第三排 ---->
                            <div class="col-md-4">
                                <!---- 簽收人 ---->
                                <div class="form-group">
                                    <label for="Receiving" class="col-md-3 control-label">簽收人:</label>
                                    <div class="col-md-8">
                                        <select id="Receiving" name="Receiving" class="form-control" required>
                                            <option value="">請選擇簽收人</option>
                                            <option value="王許安" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "王許安") {?>selected<?php }?>>王許安</option>
                                            <option value="林庭萱" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "林庭萱") {?>selected<?php }?>>林庭萱</option>
                                            <option value="黃志凱" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "黃志凱") {?>selected<?php }?>>黃志凱</option>
                                            <option value="陳奕勳" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "陳奕勳") {?>selected<?php }?>>陳奕勳</option>
                                            <option value="張本樺" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "張本樺") {?>selected<?php }?>>張本樺</option>
                                            <option value="沈英涵" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "沈英涵") {?>selected<?php }?>>沈英涵</option>
                                            <option value="黃馨慧" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "黃馨慧") {?>selected<?php }?>>黃馨慧</option>
                                            <option value="雷善婷" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "雷善婷") {?>selected<?php }?>>雷善婷</option>
                                        </select>
                                    </div>
                                </div>

                                <!---- 覆核人員 ---->
                                <div class="form-group">
                                    <label for="Receiving2" class="col-md-3 control-label">覆核人員:</label>
                                    <div class="col-md-8">
                                        <select id="Receiving2" name="Receiving2" class="form-control" required>
                                            <option value="">請選擇覆核人員</option>
                                            <option value="王許安" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "王許安") {?>selected<?php }?>>王許安</option>
                                            <option value="林庭萱" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "林庭萱") {?>selected<?php }?>>林庭萱</option>
                                            <option value="黃志凱" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "黃志凱") {?>selected<?php }?>>黃志凱</option>
                                            <option value="陳奕勳" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "陳奕勳") {?>selected<?php }?>>陳奕勳</option>
                                            <option value="張本樺" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "張本樺") {?>selected<?php }?>>張本樺</option>
                                            <option value="沈英涵" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "沈英涵") {?>selected<?php }?>>沈英涵</option>
                                            <option value="黃馨慧" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "黃馨慧") {?>selected<?php }?>>黃馨慧</option>
                                            <option value="雷善婷" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "雷善婷") {?>selected<?php }?>>雷善婷</option>
                                        </select>
                                    </div>
                                </div>

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
                                        <input type="email" id="CustomerEmail" name="CustomerEmail" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['CustomerEmail']->value;?>
" placeholder="請輸入正確E-mail格式">
                                    </div>
                                </div>
                                <!---- 客戶郵件2 -->
                                <div class="form-group">
                                    <label for="ccemail" class="col-md-3 control-label">信箱(CC副本):</label>
                                    <div class="col-md-8">
                                        <input type="email" id="ccemail" name="ccemail" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['ccemail']->value;?>
" placeholder="請輸入正確E-mail格式">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8 text-right">
                                        <button type="button" class="btn btn-danger btn-md " id="BtnReportEditccemail"
                                            style="font-weight:bold;font-size:13px;margin:23px;">
                                            <i class="fa fa-edit"></i>修改副本對象
                                        </button>
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

                                <!---- 報告狀態 ---->
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
                                </div>

                                <!-- button 前往填寫實驗數據Addsample.php -->
                                <?php if ($_smarty_tpl->tpl_vars['tech']->value == 50) {?>
                                <div class="form-group text-center">
                                    <a href="Addsample.php?ReportID=<?php echo $_smarty_tpl->tpl_vars['ReportID']->value;?>
" class="btn btn-primary btn-md"
                                        id="BtnAddSample1" style="font-weight:bold;font-size:20px;margin: 0.5em;">
                                        <i class="fa fa-plus"></i> 實驗數據一
                                    </a>
                                </div>
                                <!-- <div class="form-group text-center">
                                    <a href="Addsample2.php?ReportID=<?php echo $_smarty_tpl->tpl_vars['ReportID']->value;?>
" class="btn btn-primary btn-md"
                                        id="BtnAddSample2" style="font-weight:bold;font-size:20px;margin: 0.5em;">
                                        <i class="fa fa-plus"></i> 實驗數據二
                                    </a>
                                </div>
                                <div class="form-group text-center">
                                    <a href="Addsample3.php?ReportID=<?php echo $_smarty_tpl->tpl_vars['ReportID']->value;?>
" class="btn btn-primary btn-md"
                                        id="BtnAddSample3" style="font-weight:bold;font-size:20px;margin: 0.5em;">
                                        <i class="fa fa-plus"></i> 實驗數據三
                                    </a>
                                </div> -->
                                <?php }?>


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
                                <-- 上傳報告 -->
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
                            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 2 || $_smarty_tpl->tpl_vars['Permission']->value == 21 || $_smarty_tpl->tpl_vars['Permission']->value == 22) {?>
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEdit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修 改</button>

                            </p>
                            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 4 || $_smarty_tpl->tpl_vars['Permission']->value == 50) {?>
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEditCustomer"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修 改</button>
                            </p>
                            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 5 || $_smarty_tpl->tpl_vars['Permission']->value == 9) {?>
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
                "M101 Pathogen Fast Identification (DNA)",
                "M102 Pathogen Fast Identification (RNA)",
                "M103 Pathogen Fast Identification"
            ],
            "M2": [
                "M201 Mycoplasma (General)",
                "M201 Mycoplasma",
                "M202 Mycoplasma (Express)",
                "M202 Mycoplasma (Express)"
            ],
            "O1": [
                "O101 Circulating Tumor Cell (CTC) Assay Report"
            ],
            "P1": [
                "P101 Lihpao Multi-cancer Target Drug Panel",
                "P101 Lihpao Comprehensive CDx-30 Genes (FFPE)",
                "P101 Lihpao Multi-cancer Target Drug Genetic Testing",
                "P102 Lihpao CRC Target Drug Panel",
                "P102 Lihpao CRC Target Drug Genetic Testing",
                "P103 Lihpao NSCLC Target Drug Panel",
                "P103 Lihpao NSCLC Target Drug Genetic Testing",
                "P104 Lihpao BRCA1/2 Germline Panel",
                "P104 Lihpao Germline BRCA1/2 Genetic Testing",
                "P105 Lihpao Multi-cancer Target Drug RNA Panel",
                "P105 Lihpao Multi-Cacner Target Drug RNA Genetic Testing",
                "P106 Lihpao Lung Fusion Target Drug Panel",
                "P107 Lihpao Lung Cancer Comprehensive Target Drug Panel",
                "P108 Next-generation sequencing for Breast cancer",
                "P109 Next-generation sequencing for Colon cancer",
                "P110 CDx DNA Genetic Testing_HS",
                "P111 CDx DNA Genetic Testing_S5",
                "P111 Tumor DNA Genetic Testing",
                "P112 CDx RNA Genetic Testing_HS",
                "P113 CDx RNA Genetic Testing_S5",
                "P113 Tumor RNA Genetic Testing",
                "P115 Lihpao Multi-cancer Target Drug Panel_HS",
                "P116 Lihpao CRC Target Drug Panel_HS",
                "P117 Lihpao NSCLC Target Drug Panel_HS",
                "P118 Lihpao Multi-cancer Target Drug Panel (Comprehensive Version)",
                "P120 Next-generation Sequencing for Colon Cancer",
            ],
            "P2": [
                "P201 BRCA1/2 of Somatic Genetic Testing",
                "P202 ARVC Panel",
                "P203 HCM Panel",
                "P204 NOTCH3 EGFr Domain, Exon 2-24"
            ],
            "P3": [
                "P301 BRCA1/2 of Somatic and Germline Genetic Testing"
            ],
            "P9": [
                "P999 Customed Amplicon Service"
            ],
            "S1": [
                "S101 EGFR 29 Mutations Detection",
                "S101 EGFR 29 Mutations Detection",
                "S102 KRAS Mutation Detection",
                "S103 BRAF V600 Mutations Detection"
            ],
            "S2": [
                "S201 APOE Genotyping",
                "S202 Metabolism Trio Genetic Testing",
                "S203 CYP1A2 Genotyping",
                "S204 ADH1B Genotyping",
                "S205 ALDH2 Genotyping",
                "S206 NOTCH3 R544C Genotyping",
                "S208 CYP2C19 *2/*3 Genotyping",
                "S209 TGFBI (Hotspots) Genetic Testing",
                "S210 Obesity and Metabolism Genetic Testing",
                "S211 BDNF rs6265 Genotyping",
                "S212 Alcohol Metabolism Genotyping",
                "S213 APOE, NOTCH3 R544C, CYP2C19*2/*3, and BDNF Genotyping",
            ],
            "S3": [
                "S301 Sanger Sequencing",
                "S302 NOTCH3 R544C Genotyping",
                "S303 CYP2C19 *2/*3 Genotyping",
                "S304 DPD Deficiency Genetic Testing",
                "S305 BDNF rs6265 Genotyping",
                "S306 PKD genetic testing genetic testing (Hotspot)",
                "S307 TGFBI (Hotspots) Genetic Testing"
            ],
            "S9": [
                "S998 Customed qPCR Service",
                "S999 Customed Sanger Service"
            ],
            "W1": [
                "W100 Hereditary Cancer Genetic Testing",
                "W101 Prostate Cancer Germline Genetic Testing",
                "W102 Hereditary Cancer Genetic Testing"
            ],
            "W2": [
                "W200 Cardiovascular Disease Genetic Testing",
                "W201 ARVC Genetic Testing",
                "W202 HCM Genetic Testing",
                "W203 DCM Genetic Testing",
                "W204 TAAD Genetic Testing",
                "W205 ATS Genetic Testing",
                "W206 DMVD Genetic Testing",
                "W207 Familial Hypercholesterolemia Genetic Testing",
                "W208 Marfan Syndrome Genetic Testing",
                "W209 Arrhythmia Genetic Testing",
                "W210 Brugada Syndrome Genetic Testing",
                "W211 Catecholaminergic Polymorphic Ventricular Tachycardia Genetic Testing",
                "W212 Long QT Syndrome Genetic Testing",
                "W213 Short QT Syndrome Genetic Testing",
                "W214 ARVC Genetic Testing",
                "W215 HCM Genetic Testing",
                "W216 Familial hypercholesterolemia genetic testing",
                "W217 Aortopathy genetic testing",
                "W218 SADS genetic testing",
                "W219 Cardiovascular disease genetic testing"
            ],
            "W3": [
                "W300 Neurological Disease Genetic Testing",
                "W300 Neurological Disease Genetic Testing",
                "W301 Cerebral Small Vessel Disease Genetic Testing",
                "W302 Parkinsonism Genetic Testing",
                "W303 Hereditary Spastic Paraplegia Genetic Testing",
                "W304 Dystonia Genetic Testing",
                "W305 Cognitive Disorder Genetic Testing",
                "W305 Cognitive Disorder Genetic Testing",
                "W306 Wilson's disease Genetic Testing",
                "W307 Neurofibromatosis Genetic Testing",
                "W308 Ataxia Genetic Testing",
                "W309 Tuberous Sclerosis Genetic Testing",
                "W310 Amyotrophic Lateral Sclerosis Genetic Testing",
                "W311 Leukodystrophy Genetic Testing",
                "W312 Von-Hippel-Lindau Disease Genetic Testing",
                "W313 Charcot-Marie-Tooth Disease Genetic Testing",
                "W314 Cerebral Autosomal Dominant Arteriopathy with Subcortical Infarcts and Leukoencephalopathy Genetic Testing",
                "W314 CADASIL Genetic Testing",
                "W315 Lysosomal Storage Disease Genetic Testing",
                "W316 Tourette's Syndrome Genetic Testing",
                "W317 MELAS Syndrome Genetic Testing",
                "W318 Multiple System Atrophy Genetic Testing",
                "W319 Primary Lateral Sclerosis Genetic Testing",
                "W320 Familial Amyloid Polyneuropathy Genetic Testing",
                "W321 Epilepsy Genetic Testing",
                "W322 Common Neurological Disease Genetic Testing",
                "W323 Inherited Stroke Genetic Testing",
                "W324 Cerebral Small Vessel Disease Genetic Testing",
                "W325 Inherited Stroke Genetic Testing",
                "W326 Common Neurological Disease Genetic Testing",
                "W327 Neurological Disease Genetic Testing",
                "W327 Neurological Disease Genetic Testing",
                "W328 Parkinson Disease Genetic Testing",
                "W329 Cerebral Small Vessel Disease Genetic Testing",
                "W330 Cognitive Disorder Genetic Testing",
                "W331 Epilepsy Genetic Testing",
                "W332 Common Neurological Disease Genetic Testing",
                "W333 Neurological Disease Genetic Testing"
            ],
            "W4": [
                "W401 Genetic Carrier Screening v1.0",
                "W402 Genetic Carrier Screening v2.0",
                "W403 Genetic Carrier Screening v3.0"
            ],
            "W5": [
                "W501 Healthy Weight Genetic Testing",
                "W502 Healthy Weight Genetic Testing for Monogenic Disorders",
                "W503 Skin Care Genetic Testing",
                "W504 Skin Immunity Genetic Testing",
                "W505 Bone Health Genetic Testing (Female)",
                "W506 Bone Health Genetic Testing (Male)",
                "W507 Alcohol Metabolism Genetic Testing",
                "W508 Height Potential Genetic Testing",
                "W509 Personality Genetic Testing",
                "W510 Athletic Performance Genetic Testing",
                "W511 Uterine Care Genetic Testing",
                "W512 Genetic Predisposition Testing for Type 2 Diabetes",
                "W513 Eye Health Genetic Testing",
                "W514 Eye Health Genetic Testing for Monogenic Disorders",
                "W515 Hair Care Genetic Testing (Female)",
                "W516 Hair Care Genetic Testing (Male)",
                "W517 Sleep Care Genetic Testing (Female)",
                "W518 Sleep Care Genetic Testing (Male)",
                "W519 Genetic Predisposition Testing for Precocious Puberty (Female)",
                "W520 Genetic Predisposition Testing for Precocious Puberty (Male)",
                "W521 Cerebrovascular Health Genetic Testing (Female)",
                "W522 Cerebrovascular Health Genetic Testing (Male)",
                "W523 Cerebrovascular Health Genetic Testing for Monogenic Disorders",
                "W524 Genetic Predisposition Testing for Chronic Kidney Disease",
                "W525 Genetic Predisposition Testing for Urolithiasis and Nephrolithiasis",
                "W526 Genetic Predisposition Testing for Gastroesophageal Reflux Disease",
                "W527 Genetic Predisposition Testing for Longevity (Female)",
                "W527 Longevity Genetic Testing (Female)",
                "W528 Genetic Predisposition Testing for Longevity (Male)",
                "W528 Longevity Genetic Testing (Male)",
                "W529 Chest Care Genetic Testing",
                "W530 Caffeine Metabolism Genetic Testing",
                "W531 Cholesterol Metabolism Genetic Testing",
                "W532 Liver Health Genetic Testing"
            ],
            "W6": [
                "W601 Glaucoma Genetic Testing",
                "W602 Macular Degeneration Genetic Testing"
            ],
            "W9": [
                "W999 Customed WES Service"
            ],

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
<!-- <?php echo '<script'; ?>
>
    document.getElementById('ReportType').addEventListener('change', function () {
        var probandNameGroup = document.getElementById('proband_name');
        var probandNameWarning = document.getElementById('proband_name_warning');
        if (this.value === '1') {
            probandNameGroup.style.display = 'block';
            probandNameWarning.style.display = 'none';
        } else {
            probandNameGroup.style.display = 'none';
            probandNameWarning.style.display = 'block';

        }
    });

    // 初始化時檢查選擇的值
    document.addEventListener('DOMContentLoaded', function () {
        var testUnit = document.getElementById('ReportType').value;
        var probandNameGroup = document.getElementById('proband_name');
        var probandNameWarning = document.getElementById('proband_name_warning');
        if (testUnit === '1') {
            probandNameGroup.style.display = 'block';
            probandNameWarning.style.display = 'none';
        } else {
            probandNameGroup.style.display = 'none';
            probandNameWarning.style.display = 'block';
        }

    });
<?php echo '</script'; ?>
> -->
<?php echo '<script'; ?>
>
    function checkTestUnit() {
        var ReportType = document.getElementById('ReportType').value;
        var probandNameGroup = document.getElementById('proband_name_group');

        if (ReportType === '1') {
            probandNameGroup.style.display = 'flex';
        } else {
            probandNameGroup.style.display = 'none';
        }
    }

    // 初始化时检查一次
    checkTestUnit();
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    document.getElementById('FormReportDetail').addEventListener('submit', function () {
        document.querySelector('#ReportName').disabled = false;
        document.querySelector('#HospitalList').disabled = false;
    });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    document.addEventListener('DOMContentLoaded', function () {
        var permission = document.getElementById('Permission').value;
        var ApplyFile = document.getElementById('ApplyFile');
        var applyFileSrc = ApplyFile.getAttribute('src');

        if (!applyFileSrc) {
            // console.log("apply_pdf is empty");
            if (permission === '2') {
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
            }
        } else {
            // console.log("apply_pdf value:", applyFileSrc);
        }
    });
<?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
    function updateUnit(sampleTypeId, sampleUnitId) {
        var sampleType = document.getElementById(sampleTypeId).value;
        var sampleUnit = document.getElementById(sampleUnitId);

        // Example logic for setting unit based on sample type
        if (sampleType.includes('FFPE')) {
            sampleUnit.innerText = '片';
        } else if (sampleType.includes('全血')) {
            sampleUnit.innerText = '毫升';
        } else if (sampleType.includes('染色圈片')) {
            sampleUnit.innerText = '片';
        } else if (sampleType.includes('粗針穿刺檢體')) {
            sampleUnit.innerText = '片';
        } else if (sampleType.includes('gDNA')) {
            sampleUnit.innerText = '管';
        } else if (sampleType.includes('口腔拭子')) {
            sampleUnit.innerText = '管';
        } else if (sampleType.includes('生資分析')) {
            sampleUnit.innerText = '';
        } else if (sampleType.includes('細胞懸浮液')) {
            sampleUnit.innerText = '管';
        } else {
            sampleUnit.innerText = '';
        }
    }

    function updateUnit_1() {
        updateUnit('SampleType_1', 'SampleUnit_1');
    }

    function updateUnit_2() {
        updateUnit('SampleType_2', 'SampleUnit_2');
    }

    function updateUnit_3() {
        updateUnit('SampleType_3', 'SampleUnit_3');
    }

    function updateUnit_4() {
        updateUnit('SampleType_4', 'SampleUnit_4');
    }

    function updateUnit_5() {
        updateUnit('SampleType_5', 'SampleUnit_5');
    }
<?php echo '</script'; ?>
>


<!-- Include Bootstrap JS -->
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<!---------------------------End-----------------------------><?php }
}
