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
                    <h2 class="text-center"><strong class="login" style="font-family:Microsoft JhengHei;">請登入</strong></h2>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" method="post" action="{$FormAction}">
                        {$Hiddenfield}
                        <div class="alert alert-danger alert-container" id="alert" {$ShowErrorMessage}>
                            <strong><center>{$ErrorMessage}</center></strong>
                        </div>
                        <div class="form-group" >
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="Account" id="Account" placeholder="帳號" value="{$Account}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="Password" id="Password" placeholder="密碼" value="{$Password}" required>
                                <!-- <br><a href="forgot.php">忘記密碼了嗎?</a><br> -->
                            </div>
                        </div>
                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase waves-effect waves-light btn-lg" name="Submit" id="Submit">
                                確定
                                </button>
                            </div>
                        </div>
                        <div class="text-center"></div>
                    </form>
                </div>
                </div>
        </div>
    </body>
</html>