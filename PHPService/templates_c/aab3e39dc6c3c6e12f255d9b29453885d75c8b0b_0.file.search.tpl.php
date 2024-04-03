<?php
/* Smarty version 4.3.4, created on 2024-04-03 16:24:35
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660d124380c967_47518882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aab3e39dc6c3c6e12f255d9b29453885d75c8b0b' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\search.tpl',
      1 => 1712132673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660d124380c967_47518882 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\vendor\\smarty\\smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統計管理查詢</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10;
            padding: 10;
            background-color: #f0f0f0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4c74af;
            color: white;
            padding: 7px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #a0aec4;
        }

        #result {
            padding: 20px;
            background-color: #ddd;
            margin-bottom: 15px;
        }

        .form-hint {
            color: rgb(255, 0, 0);
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        .report-link {
            margin-bottom: -15px;  /* 调整行间距 */
            margin-right: -15px;  /* 调整列间距 */
        }

    </style>
</head>

<body>
    <h2><b>麗寶基因報告-統計查詢</b></h2>
    <!-- <button class="btn btn-danger btn-md"> <a href="home.php">回首頁</a></button> -->
    <button class="btn btn-primary btn-md" onclick="location.href='home.php'">回首頁</button>

    <form action="Statistics.php" id="search" name="search" method="post">
        <!-- 送檢單位 -->

        <div class="form-group col-md-4">
            <br>
            <!-- 提醒日期為必填欄位 -->
            <span class="form-hint">*日期區間為必填欄位</span>
            <label for="StartDate"><span style="color: red;">*</span>起始日期:</label>
            <input type="date" id="StartDate" name="StartDate" class="form-control" required="required">
            <label for="EndDate"><span style="color: red;">*</span>結束日期:</label>
            <input type="date" id="EndDate" name="EndDate" class="form-control" required="required">

            <br>
            <?php echo smarty_function_html_options(array('name'=>'ReportTypeList','id'=>'ReportTypeList','options'=>array(''=>'請選擇檢測單位')+$_smarty_tpl->tpl_vars['ReportListOptions']->value,'class'=>"form-control"),$_smarty_tpl);?>

            <br>
            <?php echo smarty_function_html_options(array('name'=>'HospitalList','id'=>'HospitalList','options'=>array(''=>'請選擇送檢單位')+$_smarty_tpl->tpl_vars['HospitalListOptions']->value,'class'=>"form-control"),$_smarty_tpl);?>

            <br>
            <?php echo smarty_function_html_options(array('name'=>'Approved1','id'=>'Approved1','options'=>array(''=>'請選擇簽核醫檢師')+$_smarty_tpl->tpl_vars['ApprovedOptions']->value,'class'=>"form-control"),$_smarty_tpl);?>


            <br>
            <div style="text-align: right;">
                <input type="submit" name="Search" class="btn btn-primary" value="Search" tabindex=2>
            </div>
            <br>
        </div>
        <div class="form-group col-md-4">
            <label>
                <br> 
                <h3>統計結果數量：<?php echo $_smarty_tpl->tpl_vars['result']->value;?>
</h3> 
                <ul>
                    <li>日期範圍：<?php echo $_smarty_tpl->tpl_vars['StartDate']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['EndDate']->value;?>
</li>
                    <li>檢測單位：<?php echo $_smarty_tpl->tpl_vars['ReportTypeName']->value;?>
</li>
                    <li>送檢單位：<?php echo $_smarty_tpl->tpl_vars['HospitalListName']->value;?>
</li>
                    <li>簽核醫檢師：<?php echo $_smarty_tpl->tpl_vars['Approved1Name']->value;?>
</li>
                </ul>
            <label>&nbsp;&nbsp;&nbsp;&nbsp;報告編號：
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result1']->value, 'item');
$_smarty_tpl->tpl_vars['item']->iteration = 0;
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['item']->iteration++;
$__foreach_item_0_saved = $_smarty_tpl->tpl_vars['item'];
?>
                <div class="report-link">
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $_smarty_tpl->tpl_vars['item']->iteration;?>
. <a href="ReportDetailMaintain.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                    target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['ReportID'];?>
</a><br>
                </div>
                <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> <br>
            </label>
        </div>
    </form>

    <!-- 如果有回傳值接收php回傳 -->

</body>

</html><?php }
}
