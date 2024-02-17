<!--THIS JQUERY AND CSS IS FOR JQGRID TABLE-->
<script type="text/ecmascript" src="js/prettify/prettify.js"></script>
<link rel="stylesheet" href="css/prettify.css" />
<script type="text/ecmascript" src="js/codetabs-b.js"></script>
<!--JQUERY OF HOME.PHP-->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/plugins/peity/jquery.peity.min.js"></script>
<script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
<script src="assets/pages/jquery.dashboard.js"></script>
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
<script src="assets/plugins/jsgrid/js/jsgrid.min.js"></script>
<script src="assets/pages/jquery.jsgrid.init.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="assets/plugins/jquery-ui/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/jquery.jqGrid.resizeGrid.js"></script>
<!-- Add this inside the <head> tag of your HTML file -->
<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/jqgrid@4.15.5/dist/ui.jqgrid-bootstrap-ui.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!----------------------------------------------------------------------------->
<script type="text/javascript">
    {literal}
        //----------------------------------
        //功能名稱 : Home page JavaScript Function
        //建立日期 : 2023/01/04 09:38
        //建立人員 : Max Cheng
        //修改日期 : 2023/01/05 10:17
        //修改人員 : Max Cheng
        //----------------------------------
        var rowData = [];
        var mode = "";
        $(document).ready(function() {
            // 20220728:取得今天的年月日填入搜尋欄位
            const today = new Date();
            const yyyy = today.getFullYear();
            let mm = today.getMonth() + 1; // Months start at 0!
            let dd = today.getDate();
            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;
            const formattedToday = yyyy + '-' + mm + '-' + dd;
            var Height = Math.floor(($(window).height()) - 260);
            var Width = Math.floor(($(window).width()) - 40);
            var UserID = $("#UserID").val();
            var Permission = $("#Permission").val();
            var Role = $("#Role").val();
            var Character = $("#Character").val();
            jQuery("#jqGrid").jqGrid({
                // 連結資料擷取程式
                url: "GetReportList.php?userid=" + UserID + "&permission=" + Permission + "&role=" + Role + "&character=" + Character,
                datatype: "json",
                width: Width,
                height: Height,
                //autowidth: true,
                shrinkToFit: true,
                colModel: [
                    {label:"id", name: "id", hidden: true},
                    {label:"編號", name: "ReportID", width:"5%", align: "center"},
                    {label:"名稱", name: "ReportName", width:'10%'},
                    {label:"檔案", name: "FileName", hidden: true},
                    {label:"實驗室審核", name: "Approved1", width:"5%", align: "center"},
                    {label:"日期", name: "Approved1At", width:'6%', align: "center", formatter: "date", formatoptions: { srcformat: "ISO8601Long", newformat: "Y-m-d H:i:s" }},
                    {label:"醫師審核", name: "Approved2", width:'5%', align: "center"},
                    {label:"日期", name: "Approved2At", width:'6%', align:"center", formatter: "date", formatoptions: { srcformat: "ISO8601Long", newformat: "Y-m-d H:i:s" }},
                    {label:"送檢單位編號", name: "ReportType", width:'5%', hidden: true},
                    {label:"送檢單位", name: "OrgName", width:'5%'},
                    {label:"TAT最終日", name: "DueDate", width:'5%', align: "center", formatter: "date", formatoptions: { srcformat: "ISO8601Long", newformat: "Y-m-d" }},
                    {label:"簡述", name: "ReportDescription", hidden: true},
                    {label:"狀態", name: "ReportStatus", width:'5%', align: "center"},
                    {label:"建立日期", name: "CreatedAt", formatter: "date", formatoptions: { srcformat: "ISO8601Long", newformat: "Y-m-d H:i:s" }, hidden: true},
                    {label:"更新日期", name: "UpdatedAt", width:'5%', formatter: "date", formatoptions: { srcformat: "ISO8601Long", newformat: "Y-m-d H:i:s" }},
                    // 設定功能欄位，依照Permission設定為修改或審核
                    {label:"功能", name: "Function", width:'5%', align: "center", formatter: function (cellvalue, options, rowObject) {
                    return imageLinkFormatter(cellvalue, options, rowObject, 'ui-icon-pencil', 'edit-link-class', Permission); } },
                    // {label:"修  改", name: "Update", width:'5%', align: "center", formatter: function (cellvalue, options, rowObject) {
                    // return imageLinkFormatter(cellvalue, options, rowObject, 'ui-icon-pencil', 'edit-link-class', 'Edit'); } },
                    // {label:"核  准", name: "CheckIn", width:'5%', align: "center", formatter: function (cellvalue, options, rowObject) {
                    // return imageLinkFormatter(cellvalue, options, rowObject, 'ui-icon-pencil', 'edit-link-class', 'Appove'); } },
                ],
                // rowNum:NumOfRow,
                rowNum: 1000,
                rowTotal: 10000,
                // loadonce:true,
                mtype: "GET",
                gridview: true,
                pager: "#jqGridPager",
                viewrecords: true,
                // ondblClickRow: function (id) {
                //     rowData = jQuery(this).getRowData(id);
                //     ViewAppointPage(id);
                // },
                // onClickRow: function (id){
                //     rowData = jQuery(this).getRowData(id);
                // }
            });


            /**THIS FUNCTION IS FOR SEARCH AND TO FILTER ANY CHARACTER**/
            var timer;
            $("#SearchTable").on("keyup", function() {
                var self = this;
                if (timer) { clearTimeout(timer); }
                timer = setTimeout(function() {
                    $("#jqGrid").jqGrid('filterInput', self.value);
                }, 0);
            });

        });

        function imageLinkFormatter(cellval, options, rowObject, icon, link_class, link_action) {
            //get ID
            var ID = rowObject[0];
            //console.log(dump(rowObject));
            // var img = '<span class="ui-icon ' + icon + ' icon"><span/>';    
            // var link = '<a href="#' + link_action + '/id/' + rowObject.id + '" class="' +
            //     link_class + '" rel="' + rowObject.id + '">' + img + '</a>';
            switch (link_action) {
                case '0':
                var link = "<button class='btn btn-primary' onclick='ReportView(" + ID + ");'>檢視報告</button>";
                    break;
                case '1':
                    var link = "<button class='btn btn-primary' onclick='ReportEdit(" + ID + ");'>修改報告</button>";
                    break;
                case 'Delete':
                    var link = "<button class='btn btn-primary' onclick='ReportDelete(" + ID + ");'>刪  除</button>";
                    break;
                case '2':
                case '3':
                    var link = "<button class='btn btn-primary' onclick='ReportApprove(" + ID + ");'>報告簽核</button>";
                    break;
                default:
                    var link = "<button class='btn btn-primary' onclick='ViewAppointPage(" + ID + ");'>無權限</button>";
                    break;
            }
            return link;
        }

        function dump(obj) {
            var out = '';
            for (var i in obj) {
                out += i + ": " + obj[i] + "\n";
            }

            alert(out);

            // or, if you wanted to avoid alerts...

            var pre = document.createElement('pre');
            pre.innerHTML = out;
            document.body.appendChild(pre)
        }

        function btnCommand() {
            // var id = jQuery("#jqGrid").jqGrid('getGridParam', 'selrow');
            // alert(rowData['id']);
            return "<button class='btn btn-primary' onclick='ViewAppointPage(id);'>檢視報告</button>";
        }

        function btnCheckIn() {
            return "<button class='btn btn-primary' onclick='ShowQRCode();'>報 到</button>";
        }

        function btnUpdate(cellvalue, options, rowObject) {
            return "<button class='btn btn-primary' onclick='ViewAppointPage(id);'>修 改</button>";
        }

        function ShowQRCode() {
            // TODO: Get QRCode from backend.
            // TODO: Show the QRCode on screen.
            $("#ShowQRCode").modal({backdrop: "static"});
        }

        function ReportView(id) {
            window.location.replace("ReportDetailMaintain.php?ReportMode=VIEW&id=" + id, "_self");
        }

        function ReportEdit(id) {
            window.location.replace("ReportDetailMaintain.php?ReportMode=UPDATE&id=" + id, "_self");
        }

        function ReportDelete(id) {
            window.location.replace("ReportDetailMaintain.php?ReportMode=DELETE&id=" + id, "_self");
        }

        function ReportApprove(id) {
            window.location.replace("ReportDetailApprove.php?id=" + id, "_self");
        }

        // 設定 jQuery 日期選擇器
        $(function() {
            //$("#appoint_date").datepicker({ dateFormat: 'yy-mm-dd' });
            //$("#checkin_date").datepicker({ dateFormat: 'yy-mm-dd' });
            $("#query_appoint_date").datepicker({dateFormat: 'yy-mm-dd'});
            $("#DueDate").datepicker({dateFormat: 'yy-mm-dd'});
        })

    {/literal}
</script>
<!----------------------------------End---------------------------------------->