<!--POP UP MODAL TO VIEW MEMBER DETAILS AND RESULTS FOR Member Information-->
<form method="post" action="{$FormAction}" name="FormApproveDetail" id="FormApproveDetail">
    {$Hiddenfield1}{$Hiddenfield2}{$Hiddenfield3}{$Hiddenfield4}{$Hiddenfield5}{$Hiddenfield6}{$Hiddenfield7}
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
                                            value="{$ReportID}">
                                    </div>
                                </div>
                                <!---- 報告名稱 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="ReportName" class="col-md-3 control-label">報告名稱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportName" name=ReportName class="form-control" readonly
                                            value="{$ReportName}">
                                    </div>
                                </div>
                                <!---- 報告簡述 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="ReportDescription" class="col-md-3 control-label">報告簡述:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportDescription" name=ReportDescription
                                            class="form-control" readonly value="{$ReportDescription}">
                                    </div>
                                </div>
                                <!---- 送檢單位 ---->
                                <div class="form-group">
                                    <label for="ReportType" class="col-md-3 control-label">送檢單位:</label>
                                    <div class="col-md-8">
                                        {html_options name=ReportType id=ReportType options=$ReportTypeOptions selected=$ReportTypeSelect class="form-control"}
                                    </div>
                                </div>

                                {* <!---- 報告狀態 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="ReportStatus" class="col-md-3 control-label">報告狀態:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportStatus" name=ReportStatus class="form-control"
                                            readonly value="{$ReportStatus}">
                                    </div>
                                </div> *}

                            </div>
                            <!---- 第二排 ---->
                            <div class="col-md-4">
                                <!---- TAT最終日 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="DueDate" class="col-md-3 control-label">TAT最終日:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="DueDate" name=DueDate class="form-control"
                                            readonly value="{$DueDate}">
                                    </div>
                                </div>
                                <!---- 客戶名稱 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="CustomerName" class="col-md-3 control-label">客戶名稱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerName" name=CustomerName class="form-control"
                                            readonly value="{$CustomerName}">
                                    </div>
                                </div>
                                <!---- 客戶郵件 ---->
                                <div class="form-group">
                                    <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="CustomerEmail" class="col-md-3 control-label">客戶郵件:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerEmail" name=CustomerEmail class="form-control"
                                            readonly value="{$CustomerEmail}">
                                    </div>
                                </div>
                                <!---- 客戶電話 ---->
                                <div class="form-group">
                                    <label for="CustomerPhone" class="col-md-3 control-label">客戶電話:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerPhone" name="CustomerPhone" class="form-control"
                                            readonly value="{$CustomerPhone}">
                                    </div>
                                </div>

                            </div>
                            <!---- 第三排 ---->
                            <div class="col-md-4">
                                <!---- 實驗室核准 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Approved1" class="col-md-3 control-label">實驗室核准:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved1" name=Approved1 class="form-control" readonly
                                            value="{$Approved1}">
                                    </div>
                                </div>
                                <!---- 核准日期 ---->
                                <div class="form-group">
                                    <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                    <label for="Approved1At" class="col-md-3 control-label">核准日期:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved1At" name=Approved1At class="form-control"
                                            readonly value="{$Approved1At}">
                                    </div>
                                </div>
                                <!---- 醫師核准 ---->
                                <div class="form-group">
                                    <label for="Approved2" class="col-md-3 control-label">醫師核准:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved2" name=Approved2 class="form-control" readonly
                                            value="{$Approved2}">
                                    </div>
                                </div>
                                <!---- 核准日期 ---->
                                <div class="form-group">
                                    <label for="Approved2At" class="col-md-3 control-label">核准日期:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="Approved2At" name=Approved2At class="form-control"
                                            readonly value="{$Approved2At}">
                                    </div>
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
    </div>
</form>
<!---------------------------End----------------------------->