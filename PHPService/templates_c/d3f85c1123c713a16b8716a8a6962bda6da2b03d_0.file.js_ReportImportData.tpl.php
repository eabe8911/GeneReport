<?php
/* Smarty version 4.3.4, created on 2024-02-17 16:58:36
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\js_ReportImportData.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d0753ca458e6_07466592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3f85c1123c713a16b8716a8a6962bda6da2b03d' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\js_ReportImportData.tpl',
      1 => 1692168218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d0753ca458e6_07466592 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    
        //----------------------------------
        //功能名稱 : 會員資料維護
        //建立日期 : 2023/01/04 09:38
        //建立人員 : Max Cheng
        //修改日期 : 
        //修改人員 : Max Cheng
        //----------------------------------
        $(document).ready(function() {

            $('#BtnImportCancel').click(function() {
                $('#ReportMode').val('CANCEL');
                window.location.replace('home.php');
            });
        });
    
<?php echo '</script'; ?>
><?php }
}
