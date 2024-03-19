<?php
/* Smarty version 4.3.4, created on 2024-03-05 11:20:50
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\ViewStatistics.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65e68f926c5828_62910452',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95527f933fc6689f64ad77238d2f36dcbe66c7d7' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\ViewStatistics.tpl',
      1 => 1709608162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:homecss.tpl' => 1,
    'file:js_Log_table.tpl' => 1,
    'file:header.tpl' => 1,
  ),
),false)) {
function content_65e68f926c5828_62910452 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<title>統計管理查詢</title>
<html>
    <head>
        <!-- THIS IS THE CSS OF HOME.PHP -->
        <?php $_smarty_tpl->_subTemplateRender("file:homecss.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender("file:js_Log_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </head>
    <body> 
        <!-- header.tpl THIS PAGE IS FOR HEADER OF HOME.PHP (LOGO AND AGENT NAME)
         <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> -->
        <div class="container" style="width:100%;">
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['StatisticsPage']->value;
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_subTemplateRender($_prefixVariable1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
    </body>
</html>
<?php }
}
