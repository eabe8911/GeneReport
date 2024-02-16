<?php
/* Smarty version 4.3.1, created on 2023-05-19 14:48:57
  from '/var/www/html/templates/js_ReportImportData.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64671bd991adc7_16726289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b268ed9570277bf60e4f16c55122b2cd0c65529' => 
    array (
      0 => '/var/www/html/templates/js_ReportImportData.tpl',
      1 => 1684478266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64671bd991adc7_16726289 (Smarty_Internal_Template $_smarty_tpl) {
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
