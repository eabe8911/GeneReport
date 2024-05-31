<?php
/* Smarty version 4.3.4, created on 2024-05-31 10:56:33
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\header_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_665990c1b51028_73234845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72709b614568c486ecb409360a8ed7cd772c3200' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\header_home.tpl',
      1 => 1717145790,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_665990c1b51028_73234845 (Smarty_Internal_Template $_smarty_tpl) {
?><header style="border-bottom: 1px solid #ccc; display: flex; padding: 0.5em 1em; justify-content: space-between;">
    <div class="member-site-identity">
        <?php echo $_smarty_tpl->tpl_vars['Logo']->value;?>

        <h1 style="font-family:Microsoft JhengHei;"><?php echo $_smarty_tpl->tpl_vars['LogoName']->value;?>
</h1>
    </div>
    <style>
        select {
            width: 200px;
            height: 30px;
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
    <nav class="member-site-navigation">
        <ul class="nav" style="display: inline-block;">
            <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 3) {?>
            <li style="display: inline-block;">
                <h3><?php echo $_smarty_tpl->tpl_vars['DisplayName']->value;?>
 您好 （身分：醫師）</h3>
            </li>
            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 2) {?>
            <li style="display: inline-block;">
                <h3><?php echo $_smarty_tpl->tpl_vars['DisplayName']->value;?>
 您好 （身分：醫檢師）</h3>
            </li>
            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 1) {?>
            <li style="display: inline-block;">
                <h3><?php echo $_smarty_tpl->tpl_vars['DisplayName']->value;?>
 您好 （身分：生資人員）</h3>
            </li>
            <?php } else { ?>
            <li style="display: inline-block;">
                <h3><?php echo $_smarty_tpl->tpl_vars['DisplayName']->value;?>
 您好 </h3>
            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['Role']->value == 1) {?>
            <li style="display: inline-block;">
                <h3>，單位：JB_Lab_ISO</h3>
            </li>
            <?php } elseif ($_smarty_tpl->tpl_vars['Role']->value == 2) {?>
            <li style="display: inline-block;">
                <h3>，單位：JB_Lab_LDTS</h3>
            </li>
            <?php } elseif ($_smarty_tpl->tpl_vars['Role']->value == 3) {?>
            <li style="display: inline-block;">
                <h3>，單位：怡仁所</h3>
            </li>
            <?php } elseif ($_smarty_tpl->tpl_vars['Role']->value == 4) {?>
            <li style="display: inline-block;">
                <h3>，單位：泓采診所</h3>
            </li>
            <?php } elseif ($_smarty_tpl->tpl_vars['Role']->value == 5) {?>
            <li style="display: inline-block;">
                <h3>，單位：新光醫院</h3>
            </li>
            <?php } else { ?>
            <li style="display: inline-block;">
                <h3> </h3>
            </li>
            <?php }?>




            <!-- <li style="display: inline-block;"><h3><?php echo $_smarty_tpl->tpl_vars['DisplayName']->value;?>
 您好</h3></li> -->

            <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 2 || $_smarty_tpl->tpl_vars['Permission']->value == 9) {?>
            <li style="display: inline-block;"><a id="addReport" name="addReport" href="<?php echo $_smarty_tpl->tpl_vars['addReport']->value;?>
">
                    <h3>新增報告</h3>
                </a></li>

            <li style="display: inline-block;"><a id="ImportReport" name="ImportReport" href="<?php echo $_smarty_tpl->tpl_vars['ImportReport']->value;?>
">
                    <h3>批次匯入報告</h3>
                </a></li>

            <li style="display: inline-block;">
                <select id="userOptions" name="userOptions" onchange="location = this.value;">
                    <option value="">會員管理</option>
                    <option value="changePassword.php">更改密碼</option>
                    <option value="log_table.php">紀錄查詢</option>
                    <option value="Statistics.php">統計管理</option>
                    <option value="download.html">下載滿意度問卷</option>
                    <?php if ($_smarty_tpl->tpl_vars['Permission']->value == 9) {?>
                    <option value="permission.php">使用者權限管理</option>
                    <?php }?>
                    <option value="index.php">登出</option>
                </select>
            </li>
            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 6) {?>
            <li style="display: inline-block;">
                <select id="userOptions" name="userOptions" onchange="location = this.value;">
                    <option value="">會員管理</option>
                    <option value="changePassword.php">更改密碼</option>
                    <option value="log_table.php">紀錄查詢</option>
                    <option value="Statistics.php">統計管理</option>
                    <option value="download.html">下載滿意度問卷</option>
                    <option value="index.php">登出</option>
                </select>
            </li>
            <?php } elseif ($_smarty_tpl->tpl_vars['Permission']->value == 4) {?>
            <li style="display: inline-block;">
                <select id="userOptions" name="userOptions" onchange="location = this.value;">
                    <option value="">會員管理</option>
                    <option value="changePassword.php">更改密碼</option>
                    <option value="download.html">下載滿意度問卷</option>
                    <option value="index.php">登出</option>
                </select>
            </li>


            <?php } else { ?>

            <li style="display: inline-block;">
                <select id="userOptions" name="userOptions" onchange="location = this.value;">
                    <option value="">會員管理</option>
                    <option value="changePassword.php">更改密碼</option>
                    <!-- <option value="log_table.php">紀錄查詢</option> -->
                    <option value="index.php">登出</option>
                </select>
            </li>
            <?php }?>
        </ul>
    </nav>
</header><?php }
}
