<?php
/* Smarty version 4.3.1, created on 2023-05-23 09:12:39
  from '/var/www/html/templates/header_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_646c838705f534_96153040',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99ef026e162c527da77c71c62334bf300f580c93' => 
    array (
      0 => '/var/www/html/templates/header_home.tpl',
      1 => 1684833071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646c838705f534_96153040 (Smarty_Internal_Template $_smarty_tpl) {
?><header style="border-bottom: 1px solid #ccc; display: flex; padding: 0.5em 1em; justify-content: space-between;">
<div class="member-site-identity">
    <?php echo $_smarty_tpl->tpl_vars['Logo']->value;?>

    <h1 style="font-family:Microsoft JhengHei;"><?php echo $_smarty_tpl->tpl_vars['LogoName']->value;?>
</h1>
</div>
<nav class="member-site-navigation">
    <ul class="nav" style="display: inline-block;">
        <li style="display: inline-block;"><h3><?php echo $_smarty_tpl->tpl_vars['DisplayName']->value;?>
 您好</h3></li>
        <li style="display: inline-block;"><a id="addReport" name="addReport" href="<?php echo $_smarty_tpl->tpl_vars['addReport']->value;?>
"><h3>新增報告</h3></a></li>
        <li style="display: inline-block;"><a id="ImportReport" name="ImportReport" href="<?php echo $_smarty_tpl->tpl_vars['ImportReport']->value;?>
"><h3>批次匯入報告</h3></a></li>
        <li style="display: inline-block;"><a id="logout" name="logout" href="index.php"><h3>登 出</h3></a></li>
    </ul>
</nav>
</header>
<?php }
}
