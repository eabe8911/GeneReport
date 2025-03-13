<script type="text/javascript">
  {literal}
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
        case 'ADDsample':
          $('#ReportViewButton').hide();
          $('#ReportQueryButton').show();
          $('#ReportConfirmButton').hide();
          setSampleFieldsReadonly(true);
          $('#ReportID').prop('readonly', true);
          break;
        case 'UpdateSample':
          $('#ReportViewButton').hide();
          $('#ReportQueryButton').show();
          $('#ReportConfirmButton').hide();
          setSampleFieldsReadonly(true);
          $('#ReportID').prop('readonly', true);
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

        // Edit BtnReportEditCustomer using ReportID
        $('#BtnReportEditCustomer').click(function() {
        $('#ReportMode').val('EDIT');
        // set button for confirm
        $('#ReportQueryButton').hide();
        $('#ReportConfirmButton').show();
        setCustomerFieldsReadonly(false);
      });


      $('#BtnReportEditccemail').click(function() {
        $('#ReportMode').val('EDITCC');
        // set button for confirm
        $('#ReportQueryButton').hide();
        $('#ReportConfirmButton').show();
        // setFieldsReadonly(false);
        setFieldsEditable(false);

      });

      $('#BtnReportEditPDF').click(function() {
        $('#ReportMode').val('EDIT');
        // set button for confirm
        $('#ReportQueryButton').hide();
        $('#ReportConfirmButton').show();
        // setFieldsReadonly(false);
        setFieldsUploadPDF(false);

      });

      $('#BtnReportCancel').click(function() {
        $('#ReportMode').val('CANCEL');
        window.location.replace('home.php');
      });

      $('#BtnReportViewExit').click(function() {
        // $('#ReportMode').val('EXIT');
        // window.location.replace('home.php');
        $('#ReportMode').val('EXIT');
        window.history.back();
      });

      $('#BtnReportExit').click(function() {
        $('#ReportMode').val('EXIT');
        window.location.replace('home.php');
      });

      $('#BtnSampleExit').click(function() {
        $('#ReportMode').val('EXIT');
        window.history.back();
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
      $("#ReportUploadLogoPDF").change(function() {
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.readAsDataURL(this.files[0]);
          $('#LogoFile').val(this.files[0].name);
          reader.onload = function(e) {
            $('#LogoFile').attr('src', e.target.result);
          }
        }
      });

      $('#BtnSampleEdit').click(function() {
        $('#ReportMode').val('ADDsample');
        // set button for confirm
        $('#ReportQueryButton').hide();
        $('#ReportConfirmButton').show();
        setSampleFieldsReadonly(false);
      });

      $('#BtnSampleUpdate').click(function() {
        $('#ReportMode').val('UpdateSample');
        // set button for confirm
        $('#ReportQueryButton').hide();
        $('#ReportConfirmButton').show();
        setSampleFieldsReadonly(false);
      });

      
    });

    // set fields to readonly
    function setFieldsReadonly(state) {
      // $('#ReportID').prop('readonly', state);
      
      $('#ReportTemplate').prop('disabled', state);

      $('#ReportName').prop('disabled', state);
      $('#proband_name').prop('disabled', state);
      $('#HospitalList').prop('disabled', state);
      $('#Department').prop('disabled', state);
      $('#HospitalList_Dr').prop('disabled', state);
      $('#method').prop('disabled', state);
      $('#proband_name').prop('readonly', state);
      $('#CustomerName').prop('readonly', state);
      $('#CustomerEmail').prop('readonly', state);
      $('#ccemail').prop('readonly', state);
      $('#CustomerPhone').prop('readonly', state);
      $('#ReportType').prop('disabled', state);
      $('#SampleNo').prop('disabled', state);
      $('#PatientID').prop('disabled', state);
      $('#scID').prop('disabled', state);
      $('#scdate').prop('readonly', state);
      $('#rcdate').prop('readonly', state);  
      $('#Submitdate').prop('readonly', state);   
      $('#DueDate').prop('readonly', state);
      $('#RejectReason').prop('readonly', state);
      $('#TemplateID').prop('disabled', state);
      $('#ReportStatus').prop('readonly', state);
      $('#SampleType_1').prop('disabled', state);
      $('#SampleType_2').prop('disabled', state);
      $('#SampleType_3').prop('disabled', state);
      $('#SampleType_4').prop('disabled', state);
      $('#SampleType_5').prop('disabled', state);
      $('#SampleQuantity_1').prop('disabled', state);
      $('#SampleQuantity_2').prop('disabled', state);
      $('#SampleQuantity_3').prop('disabled', state);
      $('#SampleQuantity_4').prop('disabled', state);
      $('#SampleQuantity_5').prop('disabled', state);

      $('#Diseases').prop('disabled', state);
      $('#Tumor_percentae').prop('disabled', state);
      $('#Receiving').prop('disabled', state);
      $('#Receiving2').prop('disabled', state);
      $('#DisplayUploadButton').prop('hidden', state);
    }

    function setCustomerFieldsReadonly(state) {
      // $('#ReportID').prop('readonly', state);
      
      $('#CustomerName').prop('readonly', state);
      $('#CustomerEmail').prop('readonly', state);
      $('#ccemail').prop('readonly', state);
      $('#CustomerPhone').prop('readonly', state);
    }

    function setSampleFieldsReadonly(state) {
      // $('#ReportID').prop('readonly', state);
      
      $('#Nanodrop_Conc').prop('readonly', state);
      $('#Qubit_Conc').prop('readonly', state);
      $('#Volumn').prop('readonly', state);
      $('#Nanodrop_Yield').prop('readonly', state);
      $('#Qubit_Yield').prop('readonly', state);
      $('#OD280').prop('readonly', state);
      $('#OD230').prop('readonly', state);
      $('#Length').prop('readonly', state);
      $('#Storage ').prop('readonly', state);
      $('#ChipID').prop('readonly', state);
      $('#F_Method').prop('disabled', state);
      $('#F_Conc').prop('readonly', state);
      $('#F_Length').prop('readonly', state);
      $('#BarcodeNo').prop('readonly', state);
      $('#Library_Conc').prop('readonly', state);
      $('#Library_Volumn').prop('readonly', state);
      $('#Library_Yield').prop('readonly', state);
      $('#Library_Meansize').prop('readonly', state);
      $('#Platform').prop('disabled', state);
      $('#Remark').prop('readonly', state);
      $('#Clean_reads').prop('readonly', state);
      $('#Extraction_date').prop('disabled', state);
      $('#Library_date').prop('disabled', state);
      $('#On_date').prop('disabled', state);
      $('#Analysis_date').prop('readonly', state);
      $('#Remark').prop('readonly', state);
    }

    
    //set email editable
    function setFieldsEditable(state) {
      // $('#CustomerEmail').prop('readonly', state);
      $('#ccemail').prop('readonly', state);
    }

    // //set upload button PDF
    function setFieldsUploadPDF(state) {
      $('#DisplayUploadButton').prop('hidden', state);
      //移除disabled屬性
      

    }

    // 設定 jQuery 日期選擇器
    $(function() {
      $("#DueDate").datepicker({dateFormat: 'yy-mm-dd'});
    })

  {/literal}
</script>
<!-----------------------------end----------------------------------------->