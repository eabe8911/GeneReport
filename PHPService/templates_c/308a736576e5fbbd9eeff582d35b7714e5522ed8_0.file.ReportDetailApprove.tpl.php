<?php
/* Smarty version 4.3.4, created on 2024-10-28 17:01:21
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\ReportDetailApprove.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_671f52e1c8db50_56722351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '308a736576e5fbbd9eeff582d35b7714e5522ed8' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\ReportDetailApprove.tpl',
      1 => 1728983125,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_671f52e1c8db50_56722351 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<!--POP UP MODAL TO VIEW MEMBER DETAILS AND RESULTS FOR Member Information-->
<style>
    .page {
        display: none;
    }

    .page.active {
        display: block;
    }
</style>
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
            <!-- Navigation Button -->
            <button id="navButton" class="btn btn-primary" onclick="navigatePage(event)">查看簽核狀態</button>

            <div class="col-sm-12">
                <!-- Page 1 -->
                <div class="card-box" style="height: 820px;">
                    <div id="page1" class="page active" class="row">
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
" readonly>
                                        <!-- <p id="proband_name_warning" style="color: red; display: none;">所選檢測單位不需填寫姓名</p> -->
                                    </div>
                                </div>

                                <!---- 報告編號 ---->
                                <div class="form-group">
                                    <label for="ReportID" class="col-md-3 control-label">報告編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportID" name="ReportID" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['ReportID']->value;?>
" readonly>
                                    </div>
                                </div>
                                <!---- 病歷編號 ---->
                                <div class="form-group">
                                    <label for="PatientID" class="col-md-3 control-label">病歷編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="PatientID" name="PatientID" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['PatientID']->value;?>
" readonly>
                                    </div>
                                </div>
                                <!---- 檢體編號 ---->
                                <div class="form-group">
                                    <label for="SampleNo" class="col-md-3 control-label">檢體編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleNo" name="SampleNo" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['SampleNo']->value;?>
" readonly>
                                    </div>
                                </div>
                                <!---- 採檢單號 ---->
                                <div class="form-group">
                                    <label for="scID" class="col-md-3 control-label">採檢單號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="scID" name="scID" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['scID']->value;?>
" readonly>
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
                                        </select>


                                    </div>

                                </div>
                                <!---- 送件人 ---->
                                <div class="form-group ">
                                    <label for="HospitalList_Dr" class="col-md-3 control-label">送件人:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="HospitalList_Dr" name="HospitalList_Dr"
                                            class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['HospitalList_Dr']->value;?>
" readonly>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label for="ReportName" class="col-md-3 control-label">報告名稱:</label>
                                    <div class="col-md-8">

                                        <select id="ReportName" name="ReportName" class="form-control" required
                                            readonly>
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
                                        <input type="text" id="method" name="method" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['method']->value;?>
" readonly>
                                    </div>
                                </div>


                                <!---- 採集日期 ---->
                                <div class="form-group">
                                    <label for="scdate" class="col-md-3 control-label">採集日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="scdate" name="scdate" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['scdate']->value;?>
" readonly>
                                    </div>
                                </div>
                                <!---- 收檢日期 ---->
                                <div class="form-group">
                                    <label for="rcdate" class="col-md-3 control-label">收檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="rcdate" name="rcdate" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['rcdate']->value;?>
" readonly>
                                    </div>
                                </div>
                                <!---- 送檢日期 ---->
                                <div class="form-group">
                                    <label for="Submitdate" class="col-md-3 control-label">送檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="Submitdate" name="Submitdate"
                                            class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['Submitdate']->value;?>
" readonly>
                                    </div>
                                </div>

                            </div>
                            <!---- 第二排 ---->
                            <div class="col-md-4">

                                <!---- 樣品種類一 ---->
                                <fieldset>
                                    <legend>樣品一</legend>
                                    <div class="form-group">
                                        <label for="SampleType_1" class="col-md-3 control-label">樣品種類一:</label>
                                        <div class="col-md-8">
                                            <select id="SampleType_1" name="SampleType_1" class="form-control" required
                                                onchange="updateUnit_1()" disabled>
                                                <option value="">請選擇樣品種類</option>
                                                <option value="EDTA紫頭管-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "EDTA紫頭管-全血") {?>selected<?php }?>>
                                                    EDTA紫頭管-全血</option>
                                                <option value="Streck cfDNA BCT(迷彩管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "Streck cfDNA BCT(迷彩管)-全血") {?>selected<?php }?>>Streck
                                                    cfDNA
                                                    BCT(迷彩管)-全血</option>
                                                <option value="Streck RNA Complete BCT(橘頭管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "Streck RNA Complete BCT(橘頭管)-全血") {?>selected<?php }?>>
                                                    Streck
                                                    RNA Complete BCT(橘頭管)-全血</option>
                                                <option value="5 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "5 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>5 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="10 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "10 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>10 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="染色圈片" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "染色圈片") {?>selected<?php }?>>染色圈片
                                                </option>
                                                <option value="粗針穿刺檢體" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "粗針穿刺檢體") {?>selected<?php }?>>粗針穿刺檢體
                                                </option>
                                                <option value="gDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "gDNA") {?>selected<?php }?>>gDNA
                                                </option>
                                                <option value="口腔拭子-口腔黏膜細胞" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "口腔拭子-口腔黏膜細胞") {?>selected<?php }?>>
                                                    口腔拭子-口腔黏膜細胞</option>
                                                <option value="生資分析" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "生資分析") {?>selected<?php }?>>生資分析
                                                </option>
                                                <option value="細胞懸浮液" <?php if ($_smarty_tpl->tpl_vars['SampleType_1']->value == "細胞懸浮液") {?>selected<?php }?>>細胞懸浮液
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
" readonly>
                                            <span class="input-group-addon" id="SampleUnit_1"
                                                readonly><?php echo $_smarty_tpl->tpl_vars['SampleUnit_1']->value;?>
</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>樣品二</legend>

                                    <!---- 樣品種類二 ---->
                                    <div class="form-group">
                                        <label for="SampleType_2" class="col-md-3 control-label">樣品種類二:</label>
                                        <div class="col-md-8">
                                            <select id="SampleType_2" name="SampleType_2" class="form-control"
                                                onchange="updateUnit_2()" disabled>
                                                <option value="">請選擇樣品種類</option>
                                                <option value="EDTA紫頭管-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "EDTA紫頭管-全血") {?>selected<?php }?>>
                                                    EDTA紫頭管-全血</option>
                                                <option value="Streck cfDNA BCT(迷彩管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "Streck cfDNA BCT(迷彩管)-全血") {?>selected<?php }?>>Streck
                                                    cfDNA
                                                    BCT(迷彩管)-全血</option>
                                                <option value="Streck RNA Complete BCT(橘頭管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "Streck RNA Complete BCT(橘頭管)-全血") {?>selected<?php }?>>
                                                    Streck
                                                    RNA Complete BCT(橘頭管)-全血</option>
                                                <option value="5 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "5 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>5 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="10 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "10 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>10 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="染色圈片" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "染色圈片") {?>selected<?php }?>>染色圈片
                                                </option>
                                                <option value="粗針穿刺檢體" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "粗針穿刺檢體") {?>selected<?php }?>>粗針穿刺檢體
                                                </option>
                                                <option value="gDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "gDNA") {?>selected<?php }?>>gDNA
                                                </option>
                                                <option value="口腔拭子-口腔黏膜細胞" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "口腔拭子-口腔黏膜細胞") {?>selected<?php }?>>
                                                    口腔拭子-口腔黏膜細胞</option>
                                                <option value="生資分析" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "生資分析") {?>selected<?php }?>>生資分析
                                                </option>
                                                <option value="細胞懸浮液" <?php if ($_smarty_tpl->tpl_vars['SampleType_2']->value == "細胞懸浮液") {?>selected<?php }?>>細胞懸浮液
                                                </option>
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
" readonly>
                                            <span class="input-group-addon" id="SampleUnit_2"
                                                readonly><?php echo $_smarty_tpl->tpl_vars['SampleUnit_2']->value;?>
</span>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>樣品三</legend>

                                    <!---- 樣品種類三 ---->
                                    <div class="form-group ">
                                        <label for="SampleType_3" class="col-md-3 control-label">樣品種類三:</label>
                                        <div class="col-md-8">
                                            <select id="SampleType_3" name="SampleType_3" class="form-control"
                                                onchange="updateUnit_3()" disabled>
                                                <option value="">請選擇樣品種類</option>
                                                <option value="EDTA紫頭管-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "EDTA紫頭管-全血") {?>selected<?php }?>>
                                                    EDTA紫頭管-全血</option>
                                                <option value="Streck cfDNA BCT(迷彩管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "Streck cfDNA BCT(迷彩管)-全血") {?>selected<?php }?>>Streck
                                                    cfDNA
                                                    BCT(迷彩管)-全血</option>
                                                <option value="Streck RNA Complete BCT(橘頭管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "Streck RNA Complete BCT(橘頭管)-全血") {?>selected<?php }?>>
                                                    Streck
                                                    RNA Complete BCT(橘頭管)-全血</option>
                                                <option value="5 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "5 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>5 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="10 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "10 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>10 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="染色圈片" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "染色圈片") {?>selected<?php }?>>染色圈片
                                                </option>
                                                <option value="粗針穿刺檢體" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "粗針穿刺檢體") {?>selected<?php }?>>粗針穿刺檢體
                                                </option>
                                                <option value="gDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "gDNA") {?>selected<?php }?>>gDNA
                                                </option>
                                                <option value="口腔拭子-口腔黏膜細胞" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "口腔拭子-口腔黏膜細胞") {?>selected<?php }?>>
                                                    口腔拭子-口腔黏膜細胞</option>
                                                <option value="生資分析" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "生資分析") {?>selected<?php }?>>生資分析
                                                </option>
                                                <option value="細胞懸浮液" <?php if ($_smarty_tpl->tpl_vars['SampleType_3']->value == "細胞懸浮液") {?>selected<?php }?>>細胞懸浮液
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
" readonly>
                                            <span class="input-group-addon" id="SampleUnit_3"
                                                readonly><?php echo $_smarty_tpl->tpl_vars['SampleUnit_3']->value;?>
</span>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>樣品四</legend>

                                    <!---- 樣品種類四 ---->
                                    <div class="form-group ">
                                        <label for="SampleType_4" class="col-md-3 control-label">樣品種類四:</label>
                                        <div class="col-md-8">
                                            <select id="SampleType_4" name="SampleType_4" class="form-control"
                                                onchange="updateUnit_4()" disabled>
                                                <option value="">請選擇樣品種類</option>
                                                <option value="EDTA紫頭管-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "EDTA紫頭管-全血") {?>selected<?php }?>>
                                                    EDTA紫頭管-全血</option>
                                                <option value="Streck cfDNA BCT(迷彩管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "Streck cfDNA BCT(迷彩管)-全血") {?>selected<?php }?>>Streck
                                                    cfDNA
                                                    BCT(迷彩管)-全血</option>
                                                <option value="Streck RNA Complete BCT(橘頭管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "Streck RNA Complete BCT(橘頭管)-全血") {?>selected<?php }?>>
                                                    Streck
                                                    RNA Complete BCT(橘頭管)-全血</option>
                                                <option value="5 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "5 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>5 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="10 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "10 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>10 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="染色圈片" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "染色圈片") {?>selected<?php }?>>染色圈片
                                                </option>
                                                <option value="粗針穿刺檢體" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "粗針穿刺檢體") {?>selected<?php }?>>粗針穿刺檢體
                                                </option>
                                                <option value="gDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "gDNA") {?>selected<?php }?>>gDNA
                                                </option>
                                                <option value="口腔拭子-口腔黏膜細胞" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "口腔拭子-口腔黏膜細胞") {?>selected<?php }?>>
                                                    口腔拭子-口腔黏膜細胞</option>
                                                <option value="生資分析" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "生資分析") {?>selected<?php }?>>生資分析
                                                </option>
                                                <option value="細胞懸浮液" <?php if ($_smarty_tpl->tpl_vars['SampleType_4']->value == "細胞懸浮液") {?>selected<?php }?>>細胞懸浮液
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
" readonly>
                                            <span class="input-group-addon" id="SampleUnit_4"
                                                readonly><?php echo $_smarty_tpl->tpl_vars['SampleUnit_4']->value;?>
</span>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>樣品五</legend>

                                    <!---- 樣品種類五 ---->
                                    <div class="form-group ">
                                        <label for="SampleType_5" class="col-md-3 control-label">樣品種類五:</label>
                                        <div class="col-md-8">
                                            <select id="SampleType_5" name="SampleType_5" class="form-control"
                                                onchange="updateUnit_5()" disabled>
                                                <option value="">請選擇樣品種類</option>
                                                <option value="EDTA紫頭管-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "EDTA紫頭管-全血") {?>selected<?php }?>>
                                                    EDTA紫頭管-全血</option>
                                                <option value="Streck cfDNA BCT(迷彩管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "Streck cfDNA BCT(迷彩管)-全血") {?>selected<?php }?>>Streck
                                                    cfDNA
                                                    BCT(迷彩管)-全血</option>
                                                <option value="Streck RNA Complete BCT(橘頭管)-全血" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "Streck RNA Complete BCT(橘頭管)-全血") {?>selected<?php }?>>
                                                    Streck
                                                    RNA Complete BCT(橘頭管)-全血</option>
                                                <option value="5 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "5 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>5 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="10 ㎛ FFPE玻片(不含圈片)" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "10 ㎛ FFPE玻片(不含圈片)") {?>selected<?php }?>>10 ㎛ FFPE玻片(不含圈片)</option>
                                                <option value="染色圈片" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "染色圈片") {?>selected<?php }?>>染色圈片
                                                </option>
                                                <option value="粗針穿刺檢體" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "粗針穿刺檢體") {?>selected<?php }?>>粗針穿刺檢體
                                                </option>
                                                <option value="gDNA" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "gDNA") {?>selected<?php }?>>gDNA
                                                </option>
                                                <option value="口腔拭子-口腔黏膜細胞" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "口腔拭子-口腔黏膜細胞") {?>selected<?php }?>>
                                                    口腔拭子-口腔黏膜細胞</option>
                                                <option value="生資分析" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "生資分析") {?>selected<?php }?>>生資分析
                                                </option>
                                                <option value="細胞懸浮液" <?php if ($_smarty_tpl->tpl_vars['SampleType_5']->value == "細胞懸浮液") {?>selected<?php }?>>細胞懸浮液
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
" readonly>
                                            <span class="input-group-addon" id="SampleUnit_5"
                                                readonly><?php echo $_smarty_tpl->tpl_vars['SampleUnit_5']->value;?>
</span>
                                        </div>
                                    </div>
                                </fieldset>



                            </div>
                            <!---- 第三排 ---->

                            <!---- 第三排 ---->
                            <div class="col-md-4">
                                <!---- 簽收人 ---->
                                <div class="form-group">
                                    <label for="Receiving" class="col-md-3 control-label">簽收人:</label>
                                    <div class="col-md-8">
                                        <select id="Receiving" name="Receiving" class="form-control" required disabled>
                                            <option value="">請選擇簽收人</option>
                                            <option value="王許安" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "王許安") {?>selected<?php }?>>王許安</option>
                                            <option value="林庭萱" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "林庭萱") {?>selected<?php }?>>林庭萱</option>
                                            <option value="黃志凱" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "黃志凱") {?>selected<?php }?>>黃志凱</option>
                                            <option value="陳奕勳" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "陳奕勳") {?>selected<?php }?>>陳奕勳</option>
                                            <option value="張本樺" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "張本樺") {?>selected<?php }?>>張本樺</option>
                                            <option value="沈英涵" <?php if ($_smarty_tpl->tpl_vars['Receiving']->value == "沈英涵") {?>selected<?php }?>>沈英涵</option>
                                        </select>
                                    </div>
                                </div>
                                <!---- 覆核人員 ---->
                                <div class="form-group">
                                    <label for="Receiving2" class="col-md-3 control-label">覆核人員:</label>
                                    <div class="col-md-8">
                                        <select id="Receiving2" name="Receiving2" class="form-control" required
                                            disabled>
                                            <option value="">請選擇覆核人員</option>
                                            <option value="黃志凱" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "黃志凱") {?>selected<?php }?>>黃志凱</option>
                                            <option value="陳奕勳" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "陳奕勳") {?>selected<?php }?>>陳奕勳</option>
                                            <option value="張本樺" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "張本樺") {?>selected<?php }?>>張本樺</option>
                                            <option value="王許安" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "王許安") {?>selected<?php }?>>王許安</option>
                                            <option value="林庭萱" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "林庭萱") {?>selected<?php }?>>林庭萱</option>
                                            <option value="沈英涵" <?php if ($_smarty_tpl->tpl_vars['Receiving2']->value == "沈英涵") {?>selected<?php }?>>沈英涵</option>
                                        </select>
                                    </div>
                                </div>
                                <!---- TAT最終日 ---->
                                <div class="form-group">
                                    <label for="DueDate" class="col-md-3 control-label">TAT最終日:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="DueDate" name="DueDate" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['DueDate']->value;?>
" readonly>
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
" readonly>
                                    </div>
                                </div>
                                <!---- 客戶郵件 ---->
                                <div class="form-group">
                                    <label for="CustomerEmail" class="col-md-3 control-label">聯絡人信箱:</label>
                                    <div class="col-md-8">
                                        <input type="email" id="CustomerEmail" name="CustomerEmail" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['CustomerEmail']->value;?>
" placeholder="請輸入正確E-mail格式" readonly>
                                    </div>
                                </div>
                                <!---- 客戶郵件2 -->
                                <div class="form-group">
                                    <label for="ccemail" class="col-md-3 control-label">信箱(CC副本):</label>
                                    <div class="col-md-8">
                                        <input type="email" id="ccemail" name="ccemail" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['ccemail']->value;?>
" placeholder="請輸入正確E-mail格式" readonly>
                                    </div>
                                </div>




                                <!---- 客戶電話 ---->
                                <div class="form-group">
                                    <label for="CustomerPhone" class="col-md-3 control-label">聯絡電話:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerPhone" name="CustomerPhone" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['CustomerPhone']->value;?>
" readonly>
                                    </div>
                                </div>
                                <!---- 報告發送狀態 ---->

                                <div class="form-group">
                                    <label for="ReportStatus" class="col-md-3 control-label">報告進度:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportStatus" name="ReportStatus" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['ReportStatus']->value;?>
" readonly>
                                    </div>
                                </div>

                                <!---- 報告退回原因，有值才顯示欄位 ---->
                                <?php if ($_smarty_tpl->tpl_vars['RejectReason']->value) {?>
                                <div class="form-group">
                                    <label for="RejectReason" class="col-md-3 control-label">報告退回原因:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="RejectReason" name="RejectReason" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['RejectReason']->value;?>
" readonly>
                                    </div>
                                </div>
                                <?php }?>

                            </div>
                        </div>
                    </div>

                <!-- Page 2 -->
                <div id="page2" class="page">
                    <div class="form-horizontal" role="form">

                        <div class="col-md-6">


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
                        <div class="col-md-6">
                            <!---- 實驗室核准日期 ---->
                            <div class="form-group">
                                <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                <label for="Approved1At" class="col-md-3 control-label">實驗室核准日:</label>
                                <div class="col-md-8">
                                    <input type="text" id="Approved1At" name=Approved1At class="form-control" readonly
                                        value="<?php echo $_smarty_tpl->tpl_vars['Approved1At']->value;?>
">
                                </div>
                            </div>
                            <!---- 醫師核准日期 ---->
                            <div class="form-group">
                                <label for="Approved2At" class="col-md-3 control-label">醫師核准日:</label>
                                <div class="col-md-8">
                                    <input type="text" id="Approved2At" name=Approved2At class="form-control" readonly
                                        value="<?php echo $_smarty_tpl->tpl_vars['Approved2At']->value;?>
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
                        <?php if ($_smarty_tpl->tpl_vars['ReportStatus']->value == '0' || $_smarty_tpl->tpl_vars['ReportStatus']->value == '10') {?>
                        <p id="ReportApproveButton">
                            <button type="button" class="btn btn-danger btn-md" id="BtnApproveExit"
                                name="BtnApproveExit" style="font-weight:bold;font-size:20px;margin:30px;">
                                <i class="fa fa-home"></i> 離 開</button>
                        </p>
                        <?php } elseif ($_smarty_tpl->tpl_vars['ReportStatus']->value == '1') {?>
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
                        <?php } else { ?>
                        <p id="ReportApproveButton">
                            <button type="button" class="btn btn-danger btn-md" id="BtnApproveExit"
                                name="BtnApproveExit" style="font-weight:bold;font-size:20px;margin:30px;">
                                <i class="fa fa-home"></i> 離 開</button>
                            <button type="button" class="btn btn-danger btn-md" id="BtnApproveReject"
                                name="BtnApproveReject" style="font-weight:bold;font-size:20px;margin:30px;">
                                <i class="fa fa-eject"></i> 退 回</button>

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
' type='application/pdf' width='100%'
                            height='1000px' />
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
</form>
<?php echo '<script'; ?>
>
    function checkTestUnit() {
        var testUnit = document.getElementById('test_unit').value;
        var probandNameGroup = document.getElementById('proband_name_group');

        if (testUnit === 'JB_Lab_ISO') {
            probandNameGroup.style.display = 'flex';
        } else {
            probandNameGroup.style.display = 'none';
        }
    }

    function navigatePage(event) {
        event.preventDefault(); // 阻止默认行为
        var currentPage = document.querySelector('.page.active');
        var currentPageId = currentPage.id;
        var navButton = document.getElementById('navButton');

        if (currentPageId === 'page1') {
            showPage(2);
            navButton.innerText = '上一頁';
        } else if (currentPageId === 'page2') {
            showPage(1);
            navButton.innerText = '查看簽核狀態';
        }
    }

    function showPage(pageNumber) {
        var pages = document.querySelectorAll('.page');
        pages.forEach(function (page) {
            page.classList.remove('active');
        });
        document.getElementById('page' + pageNumber).classList.add('active');
    }

    // 初始化时检查一次
    checkTestUnit();
<?php echo '</script'; ?>
>
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
<!---------------------------End-----------------------------><?php }
}
