<?php
/* Smarty version 4.3.1, created on 2023-05-23 17:12:44
  from '/var/www/html/templates/ViewReportDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_646c838c0b15a9_28019258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51604183c60c2cca02b22d2a0e1263f95d195542' => 
    array (
      0 => '/var/www/html/templates/ViewReportDetail.tpl',
      1 => 1684833071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:homecss.tpl' => 1,
    'file:js_ReportDetail.tpl' => 1,
    'file:header.tpl' => 1,
  ),
),false)) {
function content_646c838c0b15a9_28019258 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<title>麗寶基因報告系統</title>
<html>
    <head>
        <!-- THIS IS THE CSS OF HOME.PHP-->
        <?php $_smarty_tpl->_subTemplateRender("file:homecss.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender("file:js_ReportDetail.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
