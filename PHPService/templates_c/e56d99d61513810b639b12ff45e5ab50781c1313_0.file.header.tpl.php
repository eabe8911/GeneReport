<?php
/* Smarty version 4.3.4, created on 2024-02-17 10:47:23
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d01e3bcb78f3_65216538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e56d99d61513810b639b12ff45e5ab50781c1313' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\header.tpl',
      1 => 1692946737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d01e3bcb78f3_65216538 (Smarty_Internal_Template $_smarty_tpl) {
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
