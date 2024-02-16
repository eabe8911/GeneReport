<?php
/* Smarty version 4.3.1, created on 2024-01-04 11:52:41
  from '/var/www/html/templates/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65962b898f9a77_45838815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88dbf58bd600aa27802129682ad443d483d9dea4' => 
    array (
      0 => '/var/www/html/templates/header.tpl',
      1 => 1692946737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65962b898f9a77_45838815 (Smarty_Internal_Template $_smarty_tpl) {
?><header style="border-bottom: 1px solid #ccc; display: flex; padding: 0.5em 1em; justify-content: space-between;">
    <div class="member-site-identity">
        <a href="home.php"><?php echo $_smarty_tpl->tpl_vars['Logo']->value;?>
</a>
        <h1 style="font-family:Microsoft JhengHei;"><?php echo $_smarty_tpl->tpl_vars['LogoName']->value;?>
</h1>
    </div>
    <nav class="member-site-navigation">
        <ul class="nav" style="display: inline-block;">
            <li style="display: inline-block;">
                <h3><?php echo $_smarty_tpl->tpl_vars['DisplayName']->value;?>
 您好 </h3>
            </li>
            <li style="display: inline-block;"><a id="logout" name="logout" href="index.php">
                    <h3>登 出</h3>
                </a></li>
        </ul>
    </nav>
</header><?php }
}
