<?php
/* Smarty version 4.3.4, created on 2024-02-17 10:01:20
  from 'C:\Users\tina.xue\Documents\Tina\projects\reporter\PHPService\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d013700c1f16_46323893',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '416426cc7b0b305167575d21db2184b215eaf87e' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\reporter\\PHPService\\templates\\index.tpl',
      1 => 1692610028,
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
function content_65d013700c1f16_46323893 (Smarty_Internal_Template $_smarty_tpl) {
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
        <!-- LOGIN START -->
        <div class="wrapper-page">
            <div class="card-box login">
                <div class="panel-heading" style="text-align:center">
                    <h2 class="text-center"><strong class="login" style="font-family:Microsoft JhengHei;">請登入</strong></h2>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" method="post" action="<?php echo $_smarty_tpl->tpl_vars['FormAction']->value;?>
">
                        <?php echo $_smarty_tpl->tpl_vars['Hiddenfield']->value;?>

                        <div class="alert alert-danger alert-container" id="alert" <?php echo $_smarty_tpl->tpl_vars['ShowErrorMessage']->value;?>
>
                            <strong><center><?php echo $_smarty_tpl->tpl_vars['ErrorMessage']->value;?>
</center></strong>
                        </div>
                        <div class="form-group" >
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="Account" id="Account" placeholder="帳號" value="<?php echo $_smarty_tpl->tpl_vars['Account']->value;?>
" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="Password" id="Password" placeholder="密碼" value="<?php echo $_smarty_tpl->tpl_vars['Password']->value;?>
" required>
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
</html><?php }
}
