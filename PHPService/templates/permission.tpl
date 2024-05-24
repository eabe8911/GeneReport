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
                <h2 class="text-center"><strong class="login" style="font-family:Microsoft JhengHei;">使用者權限管理</strong></h2>
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
                            <input class="form-control" type="password" name="Password" id="Password" placeholder="請輸入密碼"
                                required>
                            <!-- <br><a href="forgot.php">忘記密碼了嗎?</a><br> -->
                        </div>
                    </div>
                    <!-- double check password -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="pw2" id="pw2" placeholder="請再次輸入密碼"
                                required>
                        </div>
                    </div>
                    <div class="form-group>
                        <div class="col-xs-12">
                            <select class="form-control" name="Permission" id="Permission" required>
                                <option value="">請選擇權限</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
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
                    <br>
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