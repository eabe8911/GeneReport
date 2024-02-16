<?php
/* Smarty version 4.3.1, created on 2024-01-26 16:08:16
  from '/var/www/html/templates/changePassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65b36870104452_11144567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d73f0f09e579384215051eb98100b3505938360' => 
    array (
      0 => '/var/www/html/templates/changePassword.tpl',
      1 => 1706256244,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:indexdesign.tpl' => 1,
    'file:homecss.tpl' => 1,
    'file:indexheader.tpl' => 1,
  ),
),false)) {
function content_65b36870104452_11144567 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<title>麗寶基因報告系統</title>

<head>
    <?php $_smarty_tpl->_subTemplateRender("file:indexdesign.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php $_smarty_tpl->_subTemplateRender("file:homecss.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>

<body style="font-family:Microsoft JhengHei;">
    <?php $_smarty_tpl->_subTemplateRender("file:indexheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php echo '<script'; ?>
>
        function validatePassword(){
            var newPassword = document.getElementById("NewPassword").value;
            var confirmPassword = document.getElementById("newpw2").value;
            if(newPassword != confirmPassword) {
                alert("兩次輸入的密碼不一致");
                return false;
            }
            return true;
        }
    <?php echo '</script'; ?>
>
    <!-- LOGIN START -->
    <div class="wrapper-page">
        <div class="card-box login">
            <div class="panel-heading" style="text-align:center">
                <h2 class="text-center"><strong class="login" style="font-family:Microsoft JhengHei;">會員管理</strong></h2>
            </div>
            <div class="panel-body">
                <form class="form-horizontal m-t-20" method="post" action="<?php echo $_smarty_tpl->tpl_vars['FormAction']->value;?>
" onsubmit="return validatePassword();">
                    <?php echo $_smarty_tpl->tpl_vars['Hiddenfield']->value;?>

                    <div class="alert alert-danger alert-container" id="alert" <?php echo $_smarty_tpl->tpl_vars['ShowErrorMessage']->value;?>
>
                        <strong>
                            <center><?php echo $_smarty_tpl->tpl_vars['ErrorMessage']->value;?>
</center>
                        </strong>
                    </div>
                    <!-- Account -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="Account" id="Account" placeholder="帳號" value="<?php echo $_smarty_tpl->tpl_vars['Account']->value;?>
"
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

</html><?php }
}
