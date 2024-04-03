<?php
/* Smarty version 4.3.4, created on 2024-04-02 16:26:51
  from 'C:\Users\tina.xue\Documents\Tina\projects\GeneReport\PHPService\templates\js_ReportDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_660bc14b48cc05_71354498',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9dc2a2755c788183a0b94980392c5a85ac9efbe8' => 
    array (
      0 => 'C:\\Users\\tina.xue\\Documents\\Tina\\projects\\GeneReport\\PHPService\\templates\\js_ReportDetail.tpl',
      1 => 1712046408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660bc14b48cc05_71354498 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
  
    //----------------------------------
    //功能名稱 : 會員資料維護
    //建立日期 : 2023/01/04 09:38
    //建立人員 : Max Cheng
    //修改日期 : 
    //修改人員 : Tina
    //----------------------------------
    $(document).ready(function() {
      // check the permission of user
      var permission = $('#Permission').val();
      if (permission < 0) {
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
          $('#ReportViewButton').hide();
          $('#ReportQueryButton').hide();
          $('#ReportConfirmButton').show();
          setFieldsReadonly(false);
          $('#ReportID').prop('readonly', false);
          $('#ReportStatus').prop('readonly', true);
          break;
        case 'VIEW':
          $('#ReportViewButton').show();
          $('#ReportQueryButton').hide();
          $('#ReportConfirmButton').hide();
          setFieldsReadonly(true);
          $('#ReportID').prop('readonly', true);
          break;
        case 'EDIT':
          $('#ReportViewButton').hide();
          $('#ReportQueryButton').hide();
          $('#ReportConfirmButton').show();
          setFieldsReadonly(false);
          $('#ReportID').prop('readonly', true);
          break;
        case 'UPDATE':
          $('#ReportViewButton').hide();
          $('#ReportQueryButton').hide();
          $('#ReportConfirmButton').show();
          setFieldsReadonly(false);
          $('#ReportID').prop('readonly', true);
          break;
        case 'DELELE':
          $('#ReportViewButton').hide();
          $('#ReportQueryButton').hide();
          $('#ReportConfirmButton').show();
          setFieldsReadonly(false);
          break;
        default:
          $('#ReportViewButton').hide();
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

      $('#BtnReportEditccemail').click(function() {
        $('#ReportMode').val('EDIT');
        // set button for confirm
        $('#ReportQueryButton').hide();
        $('#ReportConfirmButton').show();
        // setFieldsReadonly(false);
        setFieldsEditable(false);

      });

      $('#BtnReportCancel').click(function() {
        $('#ReportMode').val('CANCEL');
        window.location.replace('home.php');
      });

      $('#BtnReportViewExit').click(function() {
        $('#ReportMode').val('EXIT');
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
      $("#ReportApply").change(function() {
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.readAsDataURL(this.files[0]);
          $('#apply_pdf').val(this.files[0].name);
          reader.onload = function(e) {
            $('#ApplyFile').attr('src', e.target.result);
          }
        }
      });
      
    });

    // set fields to readonly
    function setFieldsReadonly(state) {
      // $('#ReportID').prop('readonly', state);
      $('#ReportName').prop('readonly', state);
      $('#HospitalList').prop('disabled', state);
      $('#CustomerName').prop('readonly', state);
      $('#CustomerEmail').prop('readonly', state);
      $('#ccemail').prop('readonly', state);
      $('#CustomerPhone').prop('readonly', state);
      $('#ReportType').prop('disabled', state);
      $('#SampleID').prop('disabled', state);
      $('#PatientID').prop('disabled', state);
      $('#scID').prop('disabled', state);
      $('#scdate').prop('readonly', state);
      $('#rcdate').prop('readonly', state);     
      $('#DueDate').prop('readonly', state);
      $('#RejectReason').prop('readonly', state);
      $('#TemplateID').prop('disabled', state);
      $('#ReportStatus').prop('readonly', state);
      $('#DisplayUploadButton').prop('hidden', state);
    }

    //set email editable
    function setFieldsEditable(state) {
      // $('#CustomerEmail').prop('readonly', state);
      $('#ccemail').prop('readonly', state);
    }

    // 設定 jQuery 日期選擇器
    $(function() {
      $("#DueDate").datepicker({dateFormat: 'yy-mm-dd'});
    })

  
<?php echo '</script'; ?>
>
<!-----------------------------end-----------------------------------------><?php }
}
