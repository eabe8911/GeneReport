<?php
/* Smarty version 4.3.4, created on 2024-12-09 14:50:24
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\insert_hospital.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67569330799fa0_27766406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '062afd69e16e4b7069f06bec4d35ac1dca34b078' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\insert_hospital.tpl',
      1 => 1733727021,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67569330799fa0_27766406 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增送檢單位</title>


</head>

<body>
    <div>
        <h1>新增送檢單位</h1>
        <form action="insert_hospital.php" name="InsertHospital" method="POST">
            <!-- 送檢單位名稱 -->
            <label for="HospitalName">送檢單位名稱:</label>
            <input type="text" id="HospitalName" name="HospitalName" required>
            <br><br>

            <!-- 提交者 -->
            <label for="SubmittedBy">提交者:</label>
            <input type="text" id="SubmittedBy" name="SubmittedBy" value="<?php echo $_smarty_tpl->tpl_vars['SubmittedBy']->value;?>
" required>
            <br><br>

            <!-- 提交按鈕 -->
            <button type="submit">提交</button>
        </form>
    </div>
</body>

</html><?php }
}
