<?php
/* Smarty version 4.3.1, created on 2023-05-23 17:15:07
  from '/var/www/html/templates/js_ApproveDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_646c841be6f050_09820539',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '476009ef318238eedc345c838a865cd7bc9c9a4a' => 
    array (
      0 => '/var/www/html/templates/js_ApproveDetail.tpl',
      1 => 1684833071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646c841be6f050_09820539 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
    
        // This is the function that will be called when the user clicks on the button
        $(document).ready(function() {
            $('#ReportType').prop('disabled', true);

            // check the permission of user
            var permission = $('#Permission').val();
            if (permission < 2) {
                $.confirm({
                    title: '您 的 權 限 不 足',
                    content: '<h3>您無法執行此功能，將回到首頁。</h3>',
                    type: 'red',
                    buttons: {
                        ok: {
                            text: "確   定",
                            btnClass: 'btn-red',
                            keys: ['enter'],
                            action: function() {
                                console.log('the user clicked confirm');
                                $('#ReportMode').val('DELETE');
                                window.location.replace('home.php');
                            }
                        }
                    }
                });
            }
            // when exit button clicked
            $('#BtnApproveExit').click(function() {
                $('#ApproveMode').val('EXIT');
                window.location.replace('home.php');
            })

            // when reject button clicked
            $('#BtnApproveReject').click(function() {
                if ($('#FileName').val() == '' || $('#FileName').val() == null) {
                    $.alert({
                        title: '報告尚未上傳',
                        content: '<h3>報告尚未上傳。</h3>',
                        type: 'red',
                        buttons: {
                            ok: {
                                text: "確   定",
                                btnClass: 'btn-red',
                                keys: ['enter'],
                                action: function() {
                                    console.log('the user clicked confirm');
                                }
                            }
                        }
                    });
                    return;
                }
                $('#ApproveMode').val('REJECT');
                $('#FormApproveDetail').submit();
            })

            // when approve button clicked
            $('#BtnApprovePass').click(function() {
                if ($('#FileName').val() == '' || $('#FileName').val() == null) {
                    $.alert({
                        title: '報告尚未上傳',
                        content: '<h3>報告尚未上傳。</h3>',
                        type: 'red',
                        buttons: {
                            ok: {
                                text: "確   定",
                                btnClass: 'btn-red',
                                keys: ['enter'],
                                action: function() {
                                    console.log('the user clicked confirm');
                                }
                            }
                        }
                    });
                    return;
                }

                $('#ApproveMode').val('PASS');
                $('#FormApproveDetail').submit();
            })
        });

    
<?php echo '</script'; ?>
><?php }
}
