<?php
/* Smarty version 4.3.4, created on 2025-02-18 16:20:20
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\Addsample.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67b442c48f09f7_44264316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79a487a3027a6fe3570d05f01ec6e9d73b741b66' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\Addsample.tpl',
      1 => 1739866817,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:homecss.tpl' => 1,
    'file:js_ReportImportData.tpl' => 1,
  ),
),false)) {
function content_67b442c48f09f7_44264316 (Smarty_Internal_Template $_smarty_tpl) {
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
<style>
    .page {
        display: none;
    }

    .page.active {
        display: block;
    }
</style>


<body>

    <!--header.tpl THIS PAGE IS FOR HEADER OF HOME.PHP (LOGO AND AGENT NAME)--->
    <form action="Addsample.php" name="Addsample" onsubmit="return validateQubitYield()" method="post">
        <?php echo $_smarty_tpl->tpl_vars['Hiddenfield1']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield2']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield3']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield4']->value;
echo $_smarty_tpl->tpl_vars['Hiddenfield5']->value;?>


        <div class="container-fluid" style="width:100%;">
            <div class="row">
                <input type="hidden" id="uuid">
                <div class="col-sm-12">

                    <!-- Page 1 -->
                    <div class="card-box" style="height: 800px;">
                        <div class="form-horizontal" role="form">
                            <!---- 第一排 ---->
                            <div class="col-md-4">
                                <h3 style="text-align:center;">Nucleic acid</h3>
                                <!-- 系統流水號 (id) 自動遞增，無需輸入 -->
                                <div class="form-group">
                                    <label for="ReportID" class="col-md-3 control-label">ReportID:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportID" name="ReportID" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['ReportID']->value;?>
" required>
                                    </div>
                                </div>

                                <!-- Nucleic acid -->
                                <div class="form-group">
                                    <label for="Nanodrop_Conc" class="col-md-3 control-label">Nanodrop
                                        Conc.(ng/㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Nanodrop_Conc" name="Nanodrop_Conc" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['Nanodrop_Conc']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Qubit_Conc" class="col-md-3 control-label">Qubit
                                        Conc.<br>(ng/㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Qubit_Conc" name="Qubit_Conc" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['Qubit_Conc']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Volumn" class="col-md-3 control-label">Volumn<br> <small>(㎕)</small>:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Volumn" name="Volumn" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['Volumn']->value;?>
">
                                    </div>
                                </div>
<!-- 
                                <div class="form-group">
                                    <label for="Nanodrop_Yield"
                                        class="col-md-3 control-label">Nanodrop_Yield<br>(ng):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Nanodrop_Yield" name="Nanodrop_Yield"
                                            class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['Nanodrop_Yield']->value;?>
">
                                    </div>
                                </div> -->

                                <div class="form-group row mb-3">
                                    <label for="Nanodrop_Yield" class="col-md-3 control-label">
                                        Nanodrop Yield <br> <small>(ng)</small>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="Nanodrop_Yield" name="Nanodrop_Yield"
                                            class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['Nanodrop_Yield']->value;?>
" placeholder="輸入濃度">
                                    </div>
                                </div>
                                

                                <!-- <div class="form-group">
                                    <label for="Qubit_Yield" class="col-md-3 control-label">Qubit_Yield<br>(ng):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Qubit_Yield" name="Qubit_Yield" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['Qubit_Yield']->value;?>
">
                                    </div>
                                </div> -->

                                <div class="form-group row mb-3">
                                    <?php echo $_smarty_tpl->tpl_vars['Method']->value;?>

                                    <?php echo $_smarty_tpl->tpl_vars['ReportName']->value;?>

                                    <?php echo $_smarty_tpl->tpl_vars['sample_type_r1']->value;?>


                                    <label for="Qubit_Yield" class="col-md-3 col-form-label text-md-right">Qubit Yield <br><small>(ng)</small>:</label>
                                    <div class="col-md-8">
                                        <input type="number" id="Qubit_Yield" name="Qubit_Yield" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['Qubit_Yield']->value;?>
" min="0" step="any">
                                        <div class="invalid-feedback" id="Qubit_Yield_Error" style="display:none;">
                                            Qubit_Yield 需大於 500 ng。
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="OD280" class="col-md-3 control-label">OD 260/280:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="OD280" name="OD280" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['OD280']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="OD230" class="col-md-3 control-label">OD 260/230:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="OD230" name="OD230" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['OD230']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Storage" class="col-md-3 control-label">儲存位置:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Storage" name="Storage" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['Storage']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Extraction_date" class="col-md-3 control-label">萃取時間:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="Extraction_date" name="Extraction_date"
                                            class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['Extraction_date']->value;?>
" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Nucleic_acid_person" class="col-md-3 control-label">操作人員</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Nucleic_acid_person" name="Nucleic_acid_person" class="form-control"
                                        value="" required>
                                    </div>
                                </div>


                            </div> <!-- /.col-md-4 -->

                            <?php if ($_smarty_tpl->tpl_vars['Method']->value == 'NGS') {?>
                            <!-- Fragmentation & Library -->
                            <div class="col-md-4">
                                <h3 style="text-align:center;">Fragmentation</h3>

                                <div class="form-group">
                                    <label for="F_Method" class="col-md-3 control-label">Method:</label>
                                    <div class="col-md-8">
                                        <select id="F_Method" name="F_Method" class="form-control" required>
                                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['F_Method']->value == '0') {?>selected<?php }?>>請選擇</option>
                                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['F_Method']->value == '1') {?>selected<?php }?>>covaris</option>
                                            <option value="2" <?php if ($_smarty_tpl->tpl_vars['F_Method']->value == '2') {?>selected<?php }?>>enzyme digestion
                                            </option>
                                            <option value="3" <?php if ($_smarty_tpl->tpl_vars['F_Method']->value == '3') {?>selected<?php }?>>others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="F_Conc" class="col-md-3 control-label">Fragment Conc.<br>(ng/㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="F_Conc" name="F_Conc" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['F_Conc']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="F_Length" class="col-md-3 control-label">Bioanalyzer Length(bp):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="F_Length" name="F_Length" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['F_Length']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Fragmentation_person" class="col-md-3 control-label">操作人員</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Fragmentation_person" name="Fragmentation_person" class="form-control"
                                        value="" required>
                                    </div>
                                </div>




                                <!-- Library -->
                                <h3 style="text-align:center;">Library</h3>
                                <div class="form-group">
                                    <label for="BarcodeNo" class="col-md-3 control-label">Barcode No.:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="BarcodeNo" name="BarcodeNo" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['BarcodeNo']->value;?>
">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Library_Conc" class="col-md-3 control-label">Conc<br>(ng/㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Library_Conc" name="Library_Conc" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['Library_Conc']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Library_Volumn" class="col-md-3 control-label">Volumn(㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Library_Volumn" name="Library_Volumn"
                                            class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['Library_Volumn']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Library_Yield" class="col-md-3 control-label">Yield(ng):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Library_Yield" name="Library_Yield" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['Library_Yield']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Library_Meansize" class="col-md-3 control-label">Size:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Library_Meansize" name="Library_Meansize"
                                            class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['Library_Meansize']->value;?>
">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="Library_date" class="col-md-3 control-label">建庫時間:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="Library_date" name="Library_date" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['Library_date']->value;?>
" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Library_person" class="col-md-3 control-label">操作人員</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Library_person" name="Library_person" class="form-control"
                                        value="" required>
                                    </div>
                                </div>
                            </div> 
                            <!-- 上機資訊 -->
                            <div class="col-md-4">
                                <h3 style="text-align:center;">上機資訊</h3>
                                <div class="form-group">
                                    <label for="Platform" class="col-md-3 control-label">上機平台:</label>
                                    <div class="col-md-8">
                                        <select id="Platform" name="Platform" class="form-control" required>
                                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == '0') {?>selected<?php }?>>請選擇</option>
                                            <option value="MGI-G400" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == 'MGI-G400') {?>selected<?php }?>>MGI-G400</option>
                                            <option value="MGI-G50" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == 'MGI-G50') {?>selected<?php }?>>MGI-G50</option>
                                            <option value="S5" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == 'S5') {?>selected<?php }?>>S5
                                            </option>
                                            <option value="NS500" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == 'NS500') {?>selected<?php }?>>NS500
                                            </option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ChipID" class="col-md-3 control-label">晶片ID:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ChipID" name="ChipID" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['ChipID']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="On_date" class="col-md-3 control-label">上機時間:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="On_date" name="On_date" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['On_date']->value;?>
" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Platform_person" class="col-md-3 control-label">操作人員</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Platform_person" name="Platform_person" class="form-control"
                                        value="" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="Remark" class="col-md-3 control-label">Capture:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Remark" name="Remark" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Clean  reads Q30 (%)" class="col-md-3 control-label">Clean reads
                                        Q30(%):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Clean_reads"
                                            name="Clean_reads" class="form-control" required>
                                    </div>
                                </div> -->

                                <br><br>
                                <h3 style="text-align:center;">備註說明</h3>
                                <div class="form-group">
                                    <label for="Remark" class="col-md-3 control-label">備註:</label>
                                    <div class="col-md-8">
                                        <textarea id="Remark" name="Remark" class="form-control" ><?php echo $_smarty_tpl->tpl_vars['Remark']->value;?>
</textarea>
                                    </div>
                                </div>
                            </div>

                            <?php } elseif ($_smarty_tpl->tpl_vars['Method']->value == 'qPCR') {?>
                            <!-- 上機資訊 -->
                            <div class="col-md-4">
                                <h3 style="text-align:center;">上機資訊</h3>
                                <div class="form-group">
                                    <label for="Platform" class="col-md-3 control-label">上機平台:</label>
                                    <div class="col-md-8">
                                        <select id="Platform" name="Platform" class="form-control" required>
                                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == '0') {?>selected<?php }?>>請選擇</option>
                                            <option value="7500 Fast" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == '7500 Fast') {?>selected<?php }?>>7500 Fast</option>
                                            <option value="QS5" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == 'QS5') {?>selected<?php }?>>QS5</option>
                                            <option value="LC480" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == 'LC480') {?>selected<?php }?>>LC480
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="On_date" class="col-md-3 control-label">上機時間:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="On_date" name="On_date" class="form-control"
                                            value="<?php echo $_smarty_tpl->tpl_vars['On_date']->value;?>
" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Platform_person" class="col-md-3 control-label">操作人員</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Platform_person" name="Platform_person" class="form-control"
                                        value="" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="Remark" class="col-md-3 control-label">Capture:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Remark" name="Remark" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Clean  reads Q30 (%)" class="col-md-3 control-label">Clean reads
                                        Q30(%):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Clean_reads"
                                            name="Clean_reads" class="form-control" required>
                                    </div>
                                </div> -->

                                <br><br>
                                <h3 style="text-align:center;">備註說明</h3>
                                <div class="form-group">
                                    <label for="Remark" class="col-md-3 control-label">備註:</label>
                                    <div class="col-md-8">
                                        <textarea id="Remark" name="Remark" class="form-control" ><?php echo $_smarty_tpl->tpl_vars['Remark']->value;?>
</textarea>
                                    </div>
                                </div>
                            </div>

                            <?php } elseif ($_smarty_tpl->tpl_vars['Method']->value == 'Sanger') {?>
                            <!-- 上機資訊 -->
                            <div class="col-md-4">

                                <h3 style="text-align:center;">備註說明</h3>
                                <div class="form-group">
                                    <label for="Remark" class="col-md-3 control-label">備註:</label>
                                    <div class="col-md-8">
                                        <textarea id="Remark" name="Remark" class="form-control" ><?php echo $_smarty_tpl->tpl_vars['Remark']->value;?>
</textarea>
                                    </div>
                                </div>
                            </div>
                            <?php } else { ?>
                            其他
                            <?php }?>

                        </div> <!-- /.form-horizontal -->
                    </div> <!-- /.card-box -->
                </div> <!-- /.col-sm-12 -->
            </div> <!-- /.row -->
            <div>
                <div id="ds1" align="center">
                    <p id="ReportQueryButton">
                        <button type="button" class="btn btn-danger btn-md" id="BtnSampleExit"
                            style="font-weight:bold;font-size:20px;margin:30px;">
                            <i class="fa fa-eject"></i> 離 開</button>
                        <?php if ($_smarty_tpl->tpl_vars['Nanodrop_Conc']->value == '') {?>
                        <button type="button" class="btn btn-danger btn-md" id="BtnSampleEdit"
                            style="font-weight:bold;font-size:20px;margin:30px;">
                            <i class="fa fa-edit"></i> 新 增</button>
                        <?php } else { ?>
                        <button type="button" class="btn btn-danger btn-md" id="BtnSampleUpdate"
                            style="font-weight:bold;font-size:20px;margin:30px;">
                            <i class="fa fa-edit"></i> 修 改</button>
                        <?php }?>
                    <p id="ReportConfirmButton">
                        <button type="button" class="btn btn-custom btn-danger btn-md" id=BtnReportCancel
                            name=BtnReportCancel style="font-weight:bold;font-size:20px;margin:30px;">
                            <i class="fa fa-window-close"></i> 取 消</button>
                        <button type="submit" class="btn btn-custom btn-success btn-md" id=BtnReportSubmit
                            name=BtnReportSubmit style="font-weight:bold;font-size:20px;margin:30px;">
                            <i class="fa fa-paper-plane"></i> 確 認</button>
                    </p>
                    </p>
                </div>

            </div>
        </div> <!-- /.container-fluid -->

    </form> <!-- /form -->
<?php echo '<script'; ?>
>
    function validateQubitYield() {
        const qubitInput = document.getElementById('Qubit_Yield');
        const errorDiv = document.getElementById('Qubit_Yield_Error');

        // 模擬你的條件，實際上這些變數可以用後端輸出進來
        const ReportName = "<?php echo $_smarty_tpl->tpl_vars['ReportName']->value;?>
";
        const Method = "<?php echo $_smarty_tpl->tpl_vars['Method']->value;?>
";
        const sample_type_r1 = "<?php echo $_smarty_tpl->tpl_vars['sample_type_r1']->value;?>
";

        // 驗證條件：ReportName 以 W 或 P 開頭，Method = NGS，sample_type_r1 屬於指定範圍
        const isTargetCondition =
            (ReportName.startsWith('W') || ReportName.startsWith('P')) &&
            Method === 'NGS' &&
            (sample_type_r1 === '血液檢體' || sample_type_r1 === '口腔黏膜');

        if (isTargetCondition) {
            if (parseFloat(qubitInput.value) <= 500 || isNaN(qubitInput.value)) {
                qubitInput.classList.add('is-invalid');
                errorDiv.style.display = 'block';
                return false;
            } else {
                qubitInput.classList.remove('is-invalid');
                errorDiv.style.display = 'none';
            }
        } else {
            // 條件不符時，無需檢查，確保清除錯誤狀態
            qubitInput.classList.remove('is-invalid');
            errorDiv.style.display = 'none';
        }
        return true;
    }

    // 事件綁定：輸入變化時驗證
    document.getElementById('Qubit_Yield').addEventListener('input', validateQubitYield);

    // 可在表單提交時調用這個函式進行最後驗證，例如：
    // <form onsubmit="return validateQubitYield()">
<?php echo '</script'; ?>
>
</body>

</html><?php }
}
