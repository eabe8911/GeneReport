<script type="text/javascript">
{literal}


var logdata = $("#logdata").val();


console.log(logdata);  // Add this line
$(document).ready(function () {
    var logdata = $
    jQuery("#jqGrid_Log").jqGrid({
        datatype: "local",
        data: logdata,
        colModel: [
            { label: 'ID', name: 'ID', width: 60, sorttype: 'number', sortable: true },
            { label: '人員', name: 'user', width: 60 },
            { label: '異動日期', name: 'transaction', width: 220 },
            { label: '修改狀態', name: 'status', width: 100 },
            { label: '指令', name: 'command', width: 220 },
            { label: '內容', name: 'json', width: 220 }
        ],
        viewrecords: true,
        width: 780,
        height: 250,
        rowNum: 20,
        pager: "#jqGridPager_Log"

        
    });

});
{/literal}
</script>