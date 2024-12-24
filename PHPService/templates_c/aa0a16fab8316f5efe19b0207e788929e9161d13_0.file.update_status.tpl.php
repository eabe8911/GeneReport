<?php
/* Smarty version 4.3.4, created on 2024-12-10 14:59:34
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\update_status.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6757e6d6121a91_90790481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa0a16fab8316f5efe19b0207e788929e9161d13' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\update_status.tpl',
      1 => 1733813972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6757e6d6121a91_90790481 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>審核送檢單位</title>
    <?php echo '<script'; ?>
>
        function updateHospitalName() {
            var select = document.getElementById("hospitalSelect");
            var input = document.getElementById("HospitalName");
            input.value = select.options[select.selectedIndex].value;
        }
    <?php echo '</script'; ?>
>
</head>

<body>
    <div>
        <h1>審核送檢單位</h1>
        <form action="update_status.php" method="POST">
            <!-- 送檢單位 -->
            <label for="hospitalSelect">選擇送檢單位:</label>
            <select id="hospitalSelect" name="hospitalSelect" onchange="updateHospitalName()">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['hospitalNames']->value, 'hospitalName');
$_smarty_tpl->tpl_vars['hospitalName']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['hospitalName']->value) {
$_smarty_tpl->tpl_vars['hospitalName']->do_else = false;
?>
                    <option value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['hospitalName']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['hospitalName']->value, ENT_QUOTES, 'UTF-8', true);?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <br><br>
            <label for="HospitalName">送檢單位名稱:</label>
            <input type="text" id="HospitalName" name="HospitalName" value="" readonly>
            <!-- 狀態 -->
            <label for="status">狀態:</label>
            <select id="status" name="Status" required>
                <option value="approved">批准</option>
                <option value="pending">待審核</option>
                <option value="rejected">拒絕</option>
            </select>
            <br><br>
        
            <!-- 提交按鈕 -->
            <button type="submit">更新狀態</button>
        </form>
    </div>
</body>

</html><?php }
}
