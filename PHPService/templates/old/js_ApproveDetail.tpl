<script type="text/javascript">
    {literal}
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

    {/literal}
</script>