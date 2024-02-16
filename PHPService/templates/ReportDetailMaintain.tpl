<!--POP UP MODAL TO VIEW MEMBER DETAILS AND RESULTS FOR Member Information-->
<form method="post" action="{$FormAction}" name="FormReportDetail" id="FormReportDetail" enctype="multipart/form-data">
    {$Hiddenfield1}{$Hiddenfield2}{$Hiddenfield3}{$Hiddenfield4}{$Hiddenfield5}{$Hiddenfield6}
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
                                            value="{$ReportID}">
                                    </div>
                                </div>
                                <!---- 報告名稱 ---->
                                <div class="form-group">
                                    <label for="ReportName" class="col-md-3 control-label">報告名稱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportName" name="ReportName" class="form-control"
                                            required value="{$ReportName}">
                                    </div>
                                </div>
                                <!---- 送檢單位 ---->
                                <div class="form-group">
                                    <label for="HospitalList" class="col-md-3 control-label">送檢單位:</label>
                                    <div class="col-md-8">
                                        <!-- {html_options} 生成HTML 下拉式選單 -->
                                        <!-- {html_options name=HospitalList id=HospitalList options=$HospitalListOptions
                                        selected='na' class="form-control" required="required"} -->
                                        {html_options name=HospitalList id=HospitalList options=['' => '請選擇...'] +
                                        $HospitalListOptions
                                        selected=$HospitalListSelect class="form-control" required="required"}
                                    </div>
                                    <!-- <div class="col-md-8">
                                        <input type="text" id="HospitalList" name="HospitalList"
                                            class="form-control" value="{$HospitalList}">
                                    </div> -->
                                </div>

                                <!---- 檢測單位 ---->
                                <div class="form-group">
                                    <label for="ReportType" class="col-md-3 control-label">檢測單位:</label>
                                    <div class="col-md-8">
                                        <!-- {html_options} 生成HTML 下拉式選單 -->
                                        <!-- {html_options name=ReportType id=ReportType  options=['' => '請選擇...'] + $ReportTypeOptions
                                        selected=$ReportTypeSelect class="form-control" required="required"} -->
                                        {html_options name=ReportType id=ReportType options=['' => '請選擇...'] +
                                        $ReportTypeOptions
                                        selected=$ReportTypeSelect class="form-control" required="required"}

                                    </div>
                                </div>

                                <!---- 報告樣板 ---->
                                <div class="form-group">
                                    <label for="TemplateID" class="col-md-3 control-label">報告樣板:</label>
                                    <div class="col-md-8">
                                        <!-- {html_options name=TemplateID id=TemplateID options=$TemplateOptions
                                        selected=$TemplateSelect class="form-control" required="required"} -->
                                        {html_options name=TemplateID id=TemplateID options=['' => '請選擇...'] +
                                        $TemplateOptions
                                        selected=$TemplateSelect class="form-control" required="required"}
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
                                            value="{$SampleID}">
                                    </div>
                                </div>
                                <!---- 病歷編號 ---->
                                <div class="form-group">
                                    <label for="PatientID" class="col-md-3 control-label">病歷編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="PatientID" name="PatientID" class="form-control" required
                                            value="{$PatientID}">
                                    </div>
                                </div>
                                <!---- 採檢單號 ---->
                                <div class="form-group">
                                    <label for="scID" class="col-md-3 control-label">採檢單號</label>
                                    <div class="col-md-8">
                                        <input type="text" id="scID" name="scID" class="form-control" required value="{$scID}">
                                    </div>
                                </div>
                                <!---- 採集日期 ---->
                                <div class="form-group">
                                    <label for="scdate" class="col-md-3 control-label">採集日期:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="scdate" name="scdate" class="form-control" required
                                            value="{$scdate}">
                                    </div>
                                </div>
                                <!---- 收檢日期 ---->
                                <div class="form-group">
                                    <label for="rcdate" class="col-md-3 control-label">收檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="rcdate" name="rcdate" class="form-control" required
                                            value="{$rcdate}">
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
                                            value="{$DueDate}">
                                    </div>
                                </div>
                                <!---- 客戶名稱 ---->
                                <div class="form-group">
                                    <label for="CustomerName" class="col-md-3 control-label">客戶名稱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerName" name="CustomerName" class="form-control"
                                            required value="{$CustomerName}">
                                    </div>
                                </div>
                                <!---- 客戶郵件 ---->
                                <div class="form-group">
                                    <label for="CustomerEmail" class="col-md-3 control-label">客戶郵件:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerEmail" name="CustomerEmail" class="form-control"
                                            required value="{$CustomerEmail}">
                                    </div>
                                </div>
                                <!---- 客戶電話 ---->
                                <div class="form-group">
                                    <label for="CustomerPhone" class="col-md-3 control-label">客戶電話:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerPhone" name="CustomerPhone" class="form-control"
                                            required value="{$CustomerPhone}">
                                    </div>
                                </div>
                                <!---- 報告發送狀態 ---->

                                <div class="form-group">
                                    <label for="ReportStatus" class="col-md-3 control-label">報告進度</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportStatus" name="ReportStatus" class="form-control"
                                            value="{$ReportStatus}">
                                    </div>
                                </div>

                                <!---- 報告退回原因，有值才顯示欄位 ---->
                                {if $RejectReason}
                                <div class="form-group">
                                    <label for="RejectReason" class="col-md-3 control-label">報告退回原因:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="RejectReason" name="RejectReason" class="form-control"
                                            value="{$RejectReason}">
                                    </div>
                                </div>
                                {/if}

                                <!---- 上傳報告 ---->
                                <div class="form-group" id="DisplayUploadButton">
                                    <center>
                                        <label type="button" class="btn btn-primary btn-block"
                                            style="font-weight:bold;font-size:20px;width:40%;;margin:30px;">
                                            <input id="ReportUploadPDF" name="ReportUploadPDF" style="display:none;"
                                                type="file" accept="application/pdf" />
                                            <i class="fa fa-file-pdf"></i> 上 傳 報 告
                                        </label>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---- button area ---->
                    <div>
                        <div id="ds1" align="center">
                            <p id="Message">
                            <div class="alert alert-danger alert-container" id="alert" {$ShowErrorMessage}>
                                <strong>
                                    <center>
                                        <h1>{$ErrorMessage}</h1>
                                    </center>
                                </strong>
                            </div>
                            </p>
                            <p id="ReportViewButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportViewExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                            </p>
                            {if $Permission != 4}
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
                            {else}

                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                            </p>
                            {/if}
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
                                <embed id='PDFPreview' name='PDFPreview' src='{$PDFPreview}' type='application/pdf'
                                    width='100%' height='1000px' />
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</form>

<!---------------------------End----------------------------->