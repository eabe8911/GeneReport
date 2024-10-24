<?php
/* Smarty version 4.3.4, created on 2024-10-23 16:48:05
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\log_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6718b84562f001_82243164',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a3130163c58d833e47d45c4e12300598cd5a6fe' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\log_table.tpl',
      1 => 1729673283,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6718b84562f001_82243164 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <title>麗寶基因報告-LOG紀錄查詢</title>
    <meta charset="utf-8">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/css/ui.jqgrid.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 3px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #54585d;
            color: #ffffff;
            font-weight: bold;
            font-size: 13px;
            border: 1px solid #54585d;
            position: sticky;
            top: 0;

        }

        tr:hover {
            background-color: #dde7dee1;
        }

        #myInput {
            border: 2px solid #cfcdcd;
            background-color: #f9f9f9;
            font-size: 16px;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            $('#log_table').DataTable();
        });

        function myFunction() {
            var input, filter, table, tr, i, j, td, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("log_table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                var tds = tr[i].getElementsByTagName("td");
                for (j = 0; j < tds.length; j++) {
                    td = tds[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }

    <?php echo '</script'; ?>
>

</head>

<body>


    <h2><b>麗寶基因報告-LOG紀錄查詢</b></h2>
    <!-- <button class="btn btn-danger btn-md"> <a href="home.php">回首頁</a></button> -->
    <button class="btn btn-primary btn-md" onclick="location.href='home.php'">回首頁</button>
    <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" style="float: right;"> -->
    <!-- <input type="date" id="myDateInput" onchange="myFunction()" style="float: right;"> -->
    <div class="row">
        <!---- 預約日期 ---->
        <div class="col-md-5" style="padding:10px">
            <label for="query_appoint_date" style="text-align:right;font-size:20px;">日期：</label>
            <input type="text" id="query_appoint_date" style="font-weight:bold;font-size:20px;">
            <button id="BtnQuery" class="btn btn-custom btn-info btn-md" style="font-size:18px"><i class="fa fa-search"></i> 查 詢 </button>
        </div>
        <!---- 查詢 ---->
        <div class="col-md-3" style="float:right;">
            <input type="search" class="form-control input-md" id="myInput" onkeyup="myFunction()" placeholder="Search" style="font-weight:bold;font-size:20px;">
        </div>
    </div>
    <br><br>
    <table id="log_table" border='1' style="text-align: center;">
        <tr style="text-align: center;">
        </tr>
        <tr style="text-align: center;">
            <th style="width:40px; text-align: center; font-size: 20px;">ID</th>
            <th style="width:30px; text-align: center; font-size: 20px;">人員</th>
            <th style="width:100px; text-align: center; font-size: 20px;">異動日期</th>
            <th style="width:80px; text-align: center; font-size: 20px;">操作</th>
            <!-- <th style="width:120px; text-align: center; font-size: 20px;">指令</th> -->
            <th style="width:220px; text-align: center; font-size: 20px;">內容</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['logdata']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
        <tr>
            <td style="text-align: center; font-size: 18px;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['ID'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td style="text-align: center; font-size: 18px;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['user'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td style="text-align: center; font-size: 18px;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['transaction'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td style="text-align: center; font-size: 18px;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['status'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <!-- <td style="text-align: center; font-size: 18px;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['command'], ENT_QUOTES, 'UTF-8', true);?>
</td> -->
            <td style="white-space: pre-wrap; font-size: 15px;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['json'], ENT_QUOTES, 'UTF-8', true);?>
</td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
    <input type="hidden" id="logdata" value="<?php echo $_smarty_tpl->tpl_vars['logdata']->value;?>
" />

    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            $('#log_table').DataTable();
        });
    <?php echo '</script'; ?>
>


</body>


</html><?php }
}
