<?php
/* Smarty version 4.3.4, created on 2024-02-20 17:12:34
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\js_Log_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d46d02244cf0_31208456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '332f3b8d369adc0fcc85be55b520a11e472cc327' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\js_Log_table.tpl',
      1 => 1700818739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d46d02244cf0_31208456 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">



var logdata = $("#logdata").val();


console.log(logdata);  // Add this line
$(document).ready(function () {
    var logdata = $
    jQuery("#jqGrid_Log").jqGrid({
        datatype: "local",
        data: logdata,
        colModel: [
            { label: 'ID', name: 'ID', width: 60, sorttype: 'number', sortable: true },
            { label: '人員', name: 'user', width: 60 },
            { label: '異動日期', name: 'transaction', width: 220 },
            { label: '修改狀態', name: 'status', width: 100 },
            { label: '指令', name: 'command', width: 220 },
            { label: '內容', name: 'json', width: 220 }
        ],
        viewrecords: true,
        width: 780,
        height: 250,
        rowNum: 20,
        pager: "#jqGridPager_Log"

        
    });

});

<?php echo '</script'; ?>
><?php }
}
