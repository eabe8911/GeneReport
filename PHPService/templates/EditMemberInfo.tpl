<!--POP UP MODAL TO VIEW MEMBER DETAILS AND RESULTS FOR CONSULTATION-->
<form method="post" id="{$FormID}" action="{$FormAction}">
    {$Hiddenfield1}{$Hiddenfield2}{$Hiddenfield3}{$Hiddenfield4}
    <div class="modal-dialog container-fluid" style="width:95%;">
        <div class="modal-content p-0 b-0">
            <div class="panel panel-color panel-danger">
                <div class="panel-heading">
                    <!--THE x BUTTON TO CLOSE THE MODAL POP UP OR MEMBER DETAILS POP UP-->
                    <button id="btnCloseDetail" type="button" data-dismiss="modal" style="float:right;"><i
                            class="fa fa-times" aria-hidden="true"></i></button>
                    <!--TITLE OF MODAL POP UP-->
                    <h4 class="text-center" style="font-weight:bold;font-size:20px;color:white;">基本資料維護</h4>
                </div>
                <div class="container-fluid" style="width:100%;">
                    <div class="row"><br>
                        <!---- Member Details ---->
                        <input type="hidden" id="uuid">
                        <div class="col-sm-12">
                            <div class="card-box" style="height:100%;">

                                <div class="row">
                                    <div class="form-horizontal" role="form">

                                        <!---- 第一排 ---->
                                        <div class="col-md-4" style="right:1%;">
                                            <!---- 中文姓名 ---->
                                            <div class="form-group">
                                                <!--HEALTHCARD STATUS FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=ChineseName class="col-md-3 control-label">中文姓名:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=ChineseName name=ChineseName
                                                        class="form-control" value={$ChineseName}>
                                                </div>
                                            </div>
                                            <!---- 英文姓名 ---->
                                            <div class="form-group">
                                                <!--PRINCIPAL NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=EnglishName class="col-md-3 control-label">英文姓名:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=EnglishName name=EnglishName
                                                        class="form-control" value={$EnglishName}>
                                                </div>
                                            </div>
                                            <!---- 身分證號 ---->
                                            <div class="form-group">
                                                <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=PID class="col-md-3 control-label">身分證號/居留證號:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=PID name=PID class="form-control"
                                                        value={$PID}>
                                                </div>
                                            </div>
                                            <!---- 護照號碼 ---->
                                            <div class="form-group">
                                                <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=PassportID class="col-md-3 control-label">護照號碼:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=PassportID name=PassportID
                                                        class="form-control" value={$PassportID}>
                                                </div>
                                            </div>
                                            <!---- 性別 ---->
                                            <div class="form-group">
                                                <!--MEMBER BALANCE FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=Gender class="col-md-3 control-label">性別:</label>
                                                <div class="col-md-8">
                                                    {html_options name=Gender id=Gender options=$GenderOptions selected=$GenderSelect class="form-control"}
                                                </div>
                                            </div>
                                        </div>
                                        <!---- 第二排 ---->
                                        <div class="col-md-4 container-fluid" style="right:2%;">
                                            <!---- 生日 ---->
                                            <div class="form-group">
                                                <!--CARDNUMBER FIELD, THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=Birthday class="col-md-3 control-label">生日:</label>
                                                <div class="col-md-8">
                                                    <input type="date" id=Birthday name=Birthday class="form-control"
                                                        value={$Birthday}>
                                                </div>
                                            </div>
                                            <!---- 台胞證號 ---->
                                            <div class="form-group">
                                                <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=MTPID class="col-md-3 control-label">台胞證號:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=MTPID name=MTPID class="form-control"
                                                        value={$MTPID}>
                                                </div>
                                            </div>
                                            <!---- 健保卡號 ---->
                                            <div class="form-group">
                                                <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=HICardID class="col-md-3 control-label">健保卡號:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=HICardID name=HICardID class="form-control"
                                                        value={$HICardID}>
                                                </div>
                                            </div>
                                            <!---- 手機號碼 ---->
                                            <div class="form-group">
                                                <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=PhoneNo class="col-md-3 control-label">手機號碼:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=PhoneNo name=PhoneNo class="form-control"
                                                        value={$PhoneNo}>
                                                </div>
                                            </div>
                                            <!---- 通訊地址 ---->
                                            <div class="form-group">
                                                <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=Address class="col-md-3 control-label">通訊地址:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=Address name=Address class="form-control"
                                                        value={$Address}>
                                                </div>
                                            </div>
                                        </div>
                                        <!---- 第三排 ---->
                                        <div class="col-md-4">
                                            <!---- 國籍 ---->
                                            <div class="form-group">
                                                <!--MEMBER BALANCE FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=Nationality class="col-md-3 control-label">國籍:</label>
                                                <div class="col-md-8">
                                                    {html_options name=Nationality id=Nationality options=$NationalityOptions selected=$NationalitySelect class="form-control"}
                                                </div>
                                            </div>
                                            <!---- 電子郵件 ---->
                                            <div class="form-group">
                                                <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=Email class="col-md-3 control-label">電子郵件:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=Email name=Email class="form-control"
                                                        value={$Email}>
                                                </div>
                                            </div>
                                            <!---- 公司抬頭 ---->
                                            <div class="form-group">
                                                <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=TaxIDName class="col-md-3 control-label">公司抬頭:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=TaxIDName name=TaxIDName class="form-control"
                                                        value={$TaxIDName}>
                                                </div>
                                            </div>
                                            <!---- 公司統編 ---->
                                            <div class="form-group">
                                                <!--MEMBER NAME FIELD , THIS FIELD IS CONNECTED TO HOME.PHP-->
                                                <label for=TaxID class="col-md-3 control-label">公司統編:</label>
                                                <div class="col-md-8">
                                                    <input type="text" id=TaxID name=TaxID class="form-control"
                                                        value={$TaxID}>
                                                </div>
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
                                <div class="alert alert-danger alert-container" id="alert" {$ShowErrorMessage}>
                                    <strong>
                                        <center>
                                            <h1>{$ErrorMessage}</h1>
                                        </center>
                                    </strong>
                                </div>
                                </p>
                                <!-- <p id="viewMemberQuery">
                                    <button class="btn btn-danger btn-md" id="BtnMemberExit" style="font-weight:bold;font-size:20px;margin:30px;" onclick="MemberExit();">
                                    <i class="fa fa-eject"></i> 離 開</button> 
                                    <button class="btn btn-danger btn-md" id="BtnMemberEdit" style="font-weight:bold;font-size:20px;margin:30px;" onclick="MemberUpdate();">
                                    <i class="fa fa-edit"></i> 修 改</button> 
                                    <button class="btn btn-danger btn-md" id="BtnMemberDelete" style="font-weight:bold;font-size:20px;margin:30px;" onclick="MemberDelete();">
                                    <i class="fa fa-trash"></i> 刪 除</button>
                                </p> -->
                                <!--SUBMIT BUTTON IS CONNECTED TO HOME.PHP-->
                                <p id="viewMemberModify">
                                    <button type="button" class="btn btn-custom btn-danger btn-md" id=BtnMemberCancel
                                        name=BtnMemberCancel style="font-weight:bold;font-size:20px;margin:30px;">
                                        <i class="fa fa-window-close"></i> 取 消</button>
                                    <button type="button" class="btn btn-custom btn-success btn-md" id=BtnMemberSubmit
                                        name=BtnMemberSubmit style="font-weight:bold;font-size:20px;margin:30px;">
                                        <i class="fa fa-paper-plane"></i> 確 認</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $('#BtnMemberCancel').click(function() {

            if ($('#MemberMode').val() === 'UPDATE') {
                // ("UPDATE");
                window.location.replace('home.php');
            }
            if ($('#MemberMode').val() === 'ADD') {
                // alert("ADD");
                window.location.replace('index.php');
            }

        });

        $('#BtnMemberSubmit').click(function() {
            // TODO: Check Data
            $('#UpdateMemberInfo').submit();
        });
    });
</script>
<!---------------------------End----------------------------->