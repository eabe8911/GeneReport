<!DOCTYPE html>
<title>麗寶基因報告系統</title>
<html>

<head>
    <!-- THIS IS THE CSS OF HOME.PHP-->
    {include file="homecss.tpl"}
    {include file="js_ReportImportData.tpl"}


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
        {$Hiddenfield1}{$Hiddenfield2}{$Hiddenfield3}{$Hiddenfield4}{$Hiddenfield5}

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
                                            value="{$ReportID}" required>
                                    </div>
                                </div>

                                <!-- Nucleic acid -->
                                <div class="form-group">
                                    <label for="Nanodrop_Conc" class="col-md-3 control-label">Nanodrop
                                        Conc.(ng/㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Nanodrop_Conc" name="Nanodrop_Conc" class="form-control"
                                            required value="{$Nanodrop_Conc}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Qubit_Conc" class="col-md-3 control-label">Qubit
                                        Conc.<br>(ng/㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Qubit_Conc" name="Qubit_Conc" class="form-control"
                                            required value="{$Qubit_Conc}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Volumn" class="col-md-3 control-label">Volumn<br> <small>(㎕)</small>:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Volumn" name="Volumn" class="form-control" required
                                            value="{$Volumn}">
                                    </div>
                                </div>
<!-- 
                                <div class="form-group">
                                    <label for="Nanodrop_Yield"
                                        class="col-md-3 control-label">Nanodrop_Yield<br>(ng):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Nanodrop_Yield" name="Nanodrop_Yield"
                                            class="form-control" required value="{$Nanodrop_Yield}">
                                    </div>
                                </div> -->

                                <div class="form-group row mb-3">
                                    <label for="Nanodrop_Yield" class="col-md-3 control-label">
                                        Nanodrop Yield <br> <small>(ng)</small>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="Nanodrop_Yield" name="Nanodrop_Yield"
                                            class="form-control" required value="{$Nanodrop_Yield}" placeholder="輸入濃度">
                                    </div>
                                </div>
                                

                                <!-- <div class="form-group">
                                    <label for="Qubit_Yield" class="col-md-3 control-label">Qubit_Yield<br>(ng):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Qubit_Yield" name="Qubit_Yield" class="form-control"
                                            required value="{$Qubit_Yield}">
                                    </div>
                                </div> -->

                                <div class="form-group row mb-3">
                                    {$Method}
                                    {$ReportName}
                                    {$sample_type_r1}

                                    <label for="Qubit_Yield" class="col-md-3 col-form-label text-md-right">Qubit Yield <br><small>(ng)</small>:</label>
                                    <div class="col-md-8">
                                        <input type="number" id="Qubit_Yield" name="Qubit_Yield" class="form-control" required value="{$Qubit_Yield}" min="0" step="any">
                                        <div class="invalid-feedback" id="Qubit_Yield_Error" style="display:none;">
                                            Qubit_Yield 需大於 500 ng。
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="OD280" class="col-md-3 control-label">OD 260/280:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="OD280" name="OD280" class="form-control" required
                                            value="{$OD280}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="OD230" class="col-md-3 control-label">OD 260/230:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="OD230" name="OD230" class="form-control" required
                                            value="{$OD230}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Storage" class="col-md-3 control-label">儲存位置:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Storage" name="Storage" class="form-control" required
                                            value="{$Storage}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Extraction_date" class="col-md-3 control-label">萃取時間:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="Extraction_date" name="Extraction_date"
                                            class="form-control" value="{$Extraction_date}" required>
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

                            {if $Method == 'NGS'}
                            <!-- Fragmentation & Library -->
                            <div class="col-md-4">
                                <h3 style="text-align:center;">Fragmentation</h3>

                                <div class="form-group">
                                    <label for="F_Method" class="col-md-3 control-label">Method:</label>
                                    <div class="col-md-8">
                                        <select id="F_Method" name="F_Method" class="form-control" required>
                                            <option value="0" {if $F_Method=='0' }selected{/if}>請選擇</option>
                                            <option value="1" {if $F_Method=='1' }selected{/if}>covaris</option>
                                            <option value="2" {if $F_Method=='2' }selected{/if}>enzyme digestion
                                            </option>
                                            <option value="3" {if $F_Method=='3' }selected{/if}>others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="F_Conc" class="col-md-3 control-label">Fragment Conc.<br>(ng/㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="F_Conc" name="F_Conc" class="form-control" required
                                            value="{$F_Conc}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="F_Length" class="col-md-3 control-label">Bioanalyzer Length(bp):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="F_Length" name="F_Length" class="form-control" required
                                            value="{$F_Length}">
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
                                            value="{$BarcodeNo}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Library_Conc" class="col-md-3 control-label">Conc<br>(ng/㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Library_Conc" name="Library_Conc" class="form-control"
                                            required value="{$Library_Conc}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Library_Volumn" class="col-md-3 control-label">Volumn(㎕):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Library_Volumn" name="Library_Volumn"
                                            class="form-control" required value="{$Library_Volumn}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Library_Yield" class="col-md-3 control-label">Yield(ng):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Library_Yield" name="Library_Yield" class="form-control"
                                            required value="{$Library_Yield}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Library_Meansize" class="col-md-3 control-label">Size:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Library_Meansize" name="Library_Meansize"
                                            class="form-control" required value="{$Library_Meansize}">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="Library_date" class="col-md-3 control-label">建庫時間:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="Library_date" name="Library_date" class="form-control"
                                            value="{$Library_date}" required>
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
                                            <option value="0" {if $Platform=='0' }selected{/if}>請選擇</option>
                                            <option value="MGI-G400" {if $Platform=='MGI-G400' }selected{/if}>MGI-G400</option>
                                            <option value="MGI-G50" {if $Platform=='MGI-G50' }selected{/if}>MGI-G50</option>
                                            <option value="S5" {if $Platform=='S5' }selected{/if}>S5
                                            </option>
                                            <option value="NS500" {if $Platform=='NS500' }selected{/if}>NS500
                                            </option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ChipID" class="col-md-3 control-label">晶片ID:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ChipID" name="ChipID" class="form-control" required
                                            value="{$ChipID}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="On_date" class="col-md-3 control-label">上機時間:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="On_date" name="On_date" class="form-control"
                                            value="{$On_date}" required>
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
                                        <textarea id="Remark" name="Remark" class="form-control" >{$Remark}</textarea>
                                    </div>
                                </div>
                            </div>

                            {elseif $Method == 'qPCR'}
                            <!-- 上機資訊 -->
                            <div class="col-md-4">
                                <h3 style="text-align:center;">上機資訊</h3>
                                <div class="form-group">
                                    <label for="Platform" class="col-md-3 control-label">上機平台:</label>
                                    <div class="col-md-8">
                                        <select id="Platform" name="Platform" class="form-control" required>
                                            <option value="0" {if $Platform=='0' }selected{/if}>請選擇</option>
                                            <option value="7500 Fast" {if $Platform=='7500 Fast' }selected{/if}>7500 Fast</option>
                                            <option value="QS5" {if $Platform=='QS5' }selected{/if}>QS5</option>
                                            <option value="LC480" {if $Platform=='LC480' }selected{/if}>LC480
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="On_date" class="col-md-3 control-label">上機時間:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="On_date" name="On_date" class="form-control"
                                            value="{$On_date}" required>
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
                                        <textarea id="Remark" name="Remark" class="form-control" >{$Remark}</textarea>
                                    </div>
                                </div>
                            </div>

                            {elseif $Method == 'Sanger'}
                            <!-- 上機資訊 -->
                            <div class="col-md-4">

                                <h3 style="text-align:center;">備註說明</h3>
                                <div class="form-group">
                                    <label for="Remark" class="col-md-3 control-label">備註:</label>
                                    <div class="col-md-8">
                                        <textarea id="Remark" name="Remark" class="form-control" >{$Remark}</textarea>
                                    </div>
                                </div>
                            </div>
                            {else}
                            其他
                            {/if}

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
                        {if $Nanodrop_Conc == ''}
                        <button type="button" class="btn btn-danger btn-md" id="BtnSampleEdit"
                            style="font-weight:bold;font-size:20px;margin:30px;">
                            <i class="fa fa-edit"></i> 新 增</button>
                        {else}
                        <button type="button" class="btn btn-danger btn-md" id="BtnSampleUpdate"
                            style="font-weight:bold;font-size:20px;margin:30px;">
                            <i class="fa fa-edit"></i> 修 改</button>
                        {/if}
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
<script>
    function validateQubitYield() {
        const qubitInput = document.getElementById('Qubit_Yield');
        const errorDiv = document.getElementById('Qubit_Yield_Error');

        // 模擬你的條件，實際上這些變數可以用後端輸出進來
        const ReportName = "{$ReportName}";
        const Method = "{$Method}";
        const sample_type_r1 = "{$sample_type_r1}";

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
</script>
</body>

</html>