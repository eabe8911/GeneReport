<?php
/* Smarty version 4.3.4, created on 2025-02-08 10:59:06
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\Addsample2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67a6c87a239537_29019796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60c9b3ca18b4ac8cb874059db4a5668783b74ff1' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\Addsample2.tpl',
      1 => 1738983479,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:homecss.tpl' => 1,
    'file:js_ReportImportData.tpl' => 1,
  ),
),false)) {
function content_67a6c87a239537_29019796 (Smarty_Internal_Template $_smarty_tpl) {
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
    <form action="Addsample2.php" name="Addsample2" method="post">
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
                    <div class="card-box" style="height: 700px;">
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
                                    <label for="Volumn" class="col-md-3 control-label">Volumn(㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Volumn" name="Volumn" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['Volumn']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Nanodrop_Yield"
                                        class="col-md-3 control-label">Nanodrop_Yield<br>(ng):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Nanodrop_Yield" name="Nanodrop_Yield"
                                            class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['Nanodrop_Yield']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Qubit_Yield" class="col-md-3 control-label">Qubit_Yield<br>(ng):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Qubit_Yield" name="Qubit_Yield" class="form-control"
                                            required value="<?php echo $_smarty_tpl->tpl_vars['Qubit_Yield']->value;?>
">
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
                                    <label for="Length" class="col-md-3 control-label">Length<br>(bp) > 15kb:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Length" name="Length" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['Length']->value;?>
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


                            </div> <!-- /.col-md-4 -->
                            <!-- Fragmentation -->

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



                                <!-- Library -->
                                <h3 style="text-align:center;">Library</h3>

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
                                    <label for="Library_Meansize" class="col-md-3 control-label">Mean size:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Library_Meansize" name="Library_Meansize"
                                            class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['Library_Meansize']->value;?>
">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="BarcodeNo" class="col-md-3 control-label">Barcode No.:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="BarcodeNo" name="BarcodeNo" class="form-control" required
                                            value="<?php echo $_smarty_tpl->tpl_vars['BarcodeNo']->value;?>
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
                            </div> <!-- /.col-md-4 -->

                            <div class="col-md-4">
                                <h3 style="text-align:center;">上機資訊</h3>
                                <div class="form-group">
                                    <label for="Platform" class="col-md-3 control-label">上機平台:</label>
                                    <div class="col-md-8">
                                        <select id="Platform" name="Platform" class="form-control" required>
                                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == '0') {?>selected<?php }?>>請選擇</option>
                                            <option value="MGI" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == 'MGI') {?>selected<?php }?>>MGI</option>
                                            <option value="S5" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == 'S5') {?>selected<?php }?>>S5</option>
                                            <option value="illumina" <?php if ($_smarty_tpl->tpl_vars['Platform']->value == 'illumina') {?>selected<?php }?>>illumina
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



                                <!-- <div class="form-group">
                                    <label for="Analysis_date" class="col-md-3 control-label">分析時間:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="Analysis_date" name="Analysis_date" class="form-control"
                                            required>
                                    </div>
                                </div> -->

                            </div> <!-- /.col-md-4 -->

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

</body>

</html><?php }
}
