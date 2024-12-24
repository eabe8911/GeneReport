<!DOCTYPE html>
<html lang="en">
<title>麗寶基因報告系統</title>

<head>
    {include file="indexdesign.tpl" }
    {include file="homecss.tpl"}
</head>

<body style="font-family:Microsoft JhengHei;">
    {include file="indexheader.tpl" }

    <!-- LOGIN START -->
    <div class="wrapper-page">
        <div class="card-box login">
            <div class="panel-heading" style="text-align:center">
                <h2 class="text-center"><strong class="login" style="font-family:Microsoft JhengHei;">使用者權限管理</strong></h2>
            </div>
            <div class="panel-body">
                <form class="form-horizontal m-t-20" method="post" action="{$FormAction}" >
                    {$Hiddenfield}
                    <div class="alert alert-danger alert-container" id="alert" {$ShowErrorMessage}>
                        <strong>
                            <center>{$ErrorMessage}</center>
                        </strong>
                    </div>
                    <!-- success message -->
                    <div class="alert alert-success alert-container" id="success" {$Message}>
                        <strong>
                            <center>{$Message}</center>
                        </strong>

                    <!-- Account -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="Account" id="Account" placeholder="帳號" value="{$Account}"
                                required autofocus>
                        </div>
                    </div>


                    <div class="form-group>
                        <div class="col-xs-12">
                            <select class="form-control" name="Permission" id="Permission" required>
                                <option value="">請選擇權限</option>
                                <option value="0">0 唯讀</option>
                                <option value="1">1 生資人員(上傳報告)</option>
                                <option value="21">21 ISO簽核醫檢師(簽核、退回報告)</option>
                                <option value="22">22 LDTS簽核醫師(簽核、退回報告)</option>
                                <option value="3">3 醫師(簽核、退回報告)</option>
                                <option value="4">4 實驗室專人(寄送報告)</option>
                                <option value="5">5 收檢人員(新增、修改、上傳申請單)</option>
                                <option value="6">6 監控查核(查看紀錄)</option>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <div class="col-xs-12">
                            {$Message}
                        </div>
                    </div> -->

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button type="submit"
                                class="btn btn-primary btn-block text-uppercase waves-effect waves-light btn-lg"
                                name="Submit" id="Submit">
                                確定
                            </button>
                        </div>

                    </div>



                    <a href="home.php" name="login_back" id="login_back" style="display: block; text-align: center;">
                        返回
                    </a>
                    <div class="text-center"></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>