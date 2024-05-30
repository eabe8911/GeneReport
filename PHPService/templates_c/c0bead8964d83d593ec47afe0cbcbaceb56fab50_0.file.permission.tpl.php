<?php
/* Smarty version 4.3.4, created on 2024-05-28 15:53:10
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\permission.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66558d667aad35_69916369',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0bead8964d83d593ec47afe0cbcbaceb56fab50' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\permission.tpl',
      1 => 1716882788,
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
function content_66558d667aad35_69916369 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h2 class="text-center"><strong class="login" style="font-family:Microsoft JhengHei;">使用者權限管理</strong></h2>
            </div>
            <div class="panel-body">
                <form class="form-horizontal m-t-20" method="post" action="<?php echo $_smarty_tpl->tpl_vars['FormAction']->value;?>
" >
                    <?php echo $_smarty_tpl->tpl_vars['Hiddenfield']->value;?>

                    <div class="alert alert-danger alert-container" id="alert" <?php echo $_smarty_tpl->tpl_vars['ShowErrorMessage']->value;?>
>
                        <strong>
                            <center><?php echo $_smarty_tpl->tpl_vars['ErrorMessage']->value;?>
</center>
                        </strong>
                    </div>
                    <!-- success message -->
                    <div class="alert alert-success alert-container" id="success" <?php echo $_smarty_tpl->tpl_vars['Message']->value;?>
>
                        <strong>
                            <center><?php echo $_smarty_tpl->tpl_vars['Message']->value;?>
</center>
                        </strong>

                    <!-- Account -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="Account" id="Account" placeholder="帳號" value="<?php echo $_smarty_tpl->tpl_vars['Account']->value;?>
"
                                required autofocus>
                        </div>
                    </div>


                    <div class="form-group>
                        <div class="col-xs-12">
                            <select class="form-control" name="Permission" id="Permission" required>
                                <option value="">請選擇權限</option>
                                <option value="0">0 唯讀</option>
                                <option value="1">1 管理者(新增、刪除、修改報告)</option>
                                <option value="2">2 醫檢師(簽核、退回報告)</option>
                                <option value="3">3 醫師(簽核、退回報告)</option>
                                <option value="4">4 實驗室專人(寄送報告)</option>
                                <option value="6">6 監控查核(查看紀錄)</option>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <div class="col-xs-12">
                            <?php echo $_smarty_tpl->tpl_vars['Message']->value;?>

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

</html><?php }
}
