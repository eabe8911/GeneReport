<!DOCTYPE html>
<html lang="en">
<title>麗寶基因報告系統</title>

<head>
    {include file="indexdesign.tpl" }
    {include file="homecss.tpl"}
</head>

<body style="font-family:Microsoft JhengHei;">
    {include file="indexheader.tpl" }
    <script>
        function validatePassword(){
            var newPassword = document.getElementById("NewPassword").value;
            var confirmPassword = document.getElementById("newpw2").value;
            if(newPassword != confirmPassword) {
                alert("兩次輸入的密碼不一致");
                return false;
            }
            return true;
        }
    </script>
    <!-- LOGIN START -->
    <div class="wrapper-page">
        <div class="card-box login">
            <div class="panel-heading" style="text-align:center">
                <h2 class="text-center"><strong class="login" style="font-family:Microsoft JhengHei;">會員管理</strong></h2>
            </div>
            <div class="panel-body">
                <form class="form-horizontal m-t-20" method="post" action="{$FormAction}" onsubmit="return validatePassword();">
                    {$Hiddenfield}
                    <div class="alert alert-danger alert-container" id="alert" {$ShowErrorMessage}>
                        <strong>
                            <center>{$ErrorMessage}</center>
                        </strong>
                    </div>
                    <!-- Account -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="Account" id="Account" placeholder="帳號" value="{$Account}"
                                required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="OldPassword" id="OldPassword" placeholder="請輸入舊密碼"
                                required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="NewPassword" id="NewPassword" placeholder="請輸入新密碼"
                                required>
                            <!-- <br><a href="forgot.php">忘記密碼了嗎?</a><br> -->
                        </div>
                    </div>
                    <!-- double check password -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="newpw2" id="newpw2" placeholder="請再次輸入新密碼"
                                required>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button type="submit"
                                class="btn btn-primary btn-block text-uppercase waves-effect waves-light btn-lg"
                                name="Submit" id="Submit">
                                確定
                            </button>
                        </div>
                    </div>
                    <!-- login -->
                    <a href="javascript:window.history.back();" name="login_back" id="login_back" style="display: block; text-align: center;">
                        返回
                    </a>
                    <div class="text-center"></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>