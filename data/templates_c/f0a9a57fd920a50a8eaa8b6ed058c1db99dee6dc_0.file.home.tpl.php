<?php
/* Smarty version 4.3.1, created on 2023-05-23 09:12:39
  from '/var/www/html/templates/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_646c83870577e1_11844422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0a9a57fd920a50a8eaa8b6ed058c1db99dee6dc' => 
    array (
      0 => '/var/www/html/templates/home.tpl',
      1 => 1684833071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:homecss.tpl' => 1,
    'file:js_home.tpl' => 1,
    'file:header_home.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_646c83870577e1_11844422 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<title>麗寶基因報告系統</title>

<head>
    <!-- THIS IS THE CSS OF HOME.PHP-->
    <?php $_smarty_tpl->_subTemplateRender("file:homecss.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!--homejs.tpl IS JAVASCRIPT PAGE FOR HOME-->
    <?php $_smarty_tpl->_subTemplateRender("file:js_home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>

<body>
    <!--header.tpl THIS PAGE IS FOR HEADER OF HOME.PHP (LOGO AND AGENT NAME)--->
    <?php $_smarty_tpl->_subTemplateRender("file:header_home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="row" style="margin-left: 10px;margin-right: 10px;">
        <!---- 預約日期 ---->
        <div class="col-md-5" style="padding:10px">
            <label for="query_appoint_date" style="text-align:right;font-size:20px;">日期：</label>
            <input type="text" id="query_appoint_date" style="font-weight:bold;font-size:20px;">
            <button id="BtnQuery" class="btn btn-custom btn-info btn-md" style="font-size:16px"><i
                    class="fa fa-search"></i> 查 詢 </button>
        </div>
        <!---- 查詢 ---->
        <div class="col-md-3" style="float:right;padding:10px">
            <input type="search" class="form-control input-md" id="SearchTable" name="SearchTable" placeholder="Search"
                style="font-weight:bold;font-size:20px;">
        </div>
    </div>
    <center>
        <div>
            <!--THIS IS THE JQGRID TABLE ,AND THIS FIELD IS CONNECTED TO HOME.PHP-->
            <table id="<?php echo $_smarty_tpl->tpl_vars['jqGrid']->value;?>
"></table>
            <div id="<?php echo $_smarty_tpl->tpl_vars['jqGridPager']->value;?>
"></div>
        </div>
    </center>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>

</html><?php }
}
