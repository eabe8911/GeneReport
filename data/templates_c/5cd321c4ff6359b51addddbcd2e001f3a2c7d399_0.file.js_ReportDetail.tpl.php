<?php
/* Smarty version 4.3.1, created on 2023-05-23 17:12:44
  from '/var/www/html/templates/js_ReportDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_646c838c0b5011_81638924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cd321c4ff6359b51addddbcd2e001f3a2c7d399' => 
    array (
      0 => '/var/www/html/templates/js_ReportDetail.tpl',
      1 => 1684833071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646c838c0b5011_81638924 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
  
    //----------------------------------
    //功能名稱 : 會員資料維護
    //建立日期 : 2023/01/04 09:38
    //建立人員 : Max Cheng
    //修改日期 : 
    //修改人員 : Max Cheng
    //----------------------------------
    $(document).ready(function() {
      // check the permission of user
      var permission = $('#Permission').val();
      if (permission < 1) {
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

      switch ($('#ReportMode').val()) {
        case 'ADD':
          $('#ReportQueryButton').hide();
          $('#ReportConfirmButton').show();
          setFieldsReadonly(false);
          $('#ReportID').prop('readonly', false);
          break;
        case 'EDIT':
          $('#ReportQueryButton').hide();
          $('#ReportConfirmButton').show();
          setFieldsReadonly(false);
          $('#ReportID').prop('readonly', true);
          break;
        case 'UPDATE':
          $('#ReportQueryButton').hide();
          $('#ReportConfirmButton').show();
          setFieldsReadonly(false);
          $('#ReportID').prop('readonly', true);
          break;
        case 'DELELE':
          $('#ReportQueryButton').hide();
          $('#ReportConfirmButton').show();
          setFieldsReadonly(false);
          break;
        default:
          $('#ReportQueryButton').show();
          $('#ReportConfirmButton').hide();
          setFieldsReadonly(true);
          $('#ReportID').prop('readonly', true);
          break;
      }
      // Edit Report using ReportID
      $('#BtnReportEdit').click(function() {
        $('#ReportMode').val('EDIT');
        // set button for confirm
        $('#ReportQueryButton').hide();
        $('#ReportConfirmButton').show();
        setFieldsReadonly(false);
      });

      $('#BtnReportCancel').click(function() {
        $('#ReportMode').val('CANCEL');
        window.location.replace('home.php');
      });

      $('#BtnReportExit').click(function() {
        $('#ReportMode').val('EXIT');
        window.location.replace('home.php');
      });

      // Delete Report using ReportID
      $('#BtnReportDelete').click(function() {
        $.confirm({
          title: '刪 除 報 告',
          content: '<h3>確定刪除此份報告嗎？</h3>',
          type: 'red',
          buttons: {
            ok: {
              text: "確   定",
              btnClass: 'btn-red',
              keys: ['enter'],
              action: function() {
                console.log('the user clicked confirm');
                $('#ReportMode').val('DELETE');
                $('#FormReportDetail').submit();
              }
            },
            cancel: {
              text: "取   消",
              brnClass: 'btn-default',
              keys: ['esc'],
              action: function() {
                console.log('the user clicked cancel');
              }
            }
          }
        });
      });

      $("#ReportUploadPDF").change(function() {
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.readAsDataURL(this.files[0]);
          $('#FileName').val(this.files[0].name);
          reader.onload = function(e) {
            $('#PDFPreview').attr('src', e.target.result);
          }
        }
      });
    });

    // set fields to readonly
    function setFieldsReadonly(state) {
      // $('#ReportID').prop('readonly', state);
      $('#ReportName').prop('readonly', state);
      $('#ReportDescription').prop('readonly', state);
      $('#CustomerName').prop('readonly', state);
      $('#CustomerEmail').prop('readonly', state);
      $('#CustomerPhone').prop('readonly', state);
      $('#ReportType').prop('disabled', state);
      $('#DueDate').prop('readonly', state);
      $('#TemplateID').prop('disabled', state);
      $('#ReportStatus').prop('readonly', state);
      $('#DisplayUploadButton').prop('hidden', state);
    }

        // 設定 jQuery 日期選擇器
        $(function() {
            $("#DueDate").datepicker({dateFormat: 'yy-mm-dd'});
        })

  
<?php echo '</script'; ?>
>
<!-----------------------------end-----------------------------------------><?php }
}
