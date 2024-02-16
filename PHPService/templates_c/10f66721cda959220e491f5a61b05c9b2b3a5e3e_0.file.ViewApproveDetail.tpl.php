<?php
/* Smarty version 4.3.1, created on 2024-01-04 13:35:54
  from '/var/www/html/templates/ViewApproveDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_659643bac496c7_72822552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10f66721cda959220e491f5a61b05c9b2b3a5e3e' => 
    array (
      0 => '/var/www/html/templates/ViewApproveDetail.tpl',
      1 => 1700123220,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:homecss.tpl' => 1,
    'file:js_ApproveDetail.tpl' => 1,
    'file:header.tpl' => 1,
  ),
),false)) {
function content_659643bac496c7_72822552 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<title>麗寶基因報告系統</title>
<html>
    <head>
        <!-- THIS IS THE CSS OF HOME.PHP-->
        <?php $_smarty_tpl->_subTemplateRender("file:homecss.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender("file:js_ApproveDetail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </head>
    <body> 
        <!--header.tpl THIS PAGE IS FOR HEADER OF HOME.PHP (LOGO AND AGENT NAME)--->
        <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <div class="container" style="width:100%;">
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['IncludePage']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
    </body>
</html>
<?php }
}
