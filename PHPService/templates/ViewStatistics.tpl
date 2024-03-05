<!DOCTYPE html>
<title>統計管理查詢</title>
<html>
    <head>
        <!-- THIS IS THE CSS OF HOME.PHP -->
        {include file="homecss.tpl"}
        {include file="js_Log_table.tpl"}
    </head>
    <body> 
        <!-- header.tpl THIS PAGE IS FOR HEADER OF HOME.PHP (LOGO AND AGENT NAME)
         {include file="header.tpl"} -->
        <div class="container" style="width:100%;">
                {include file={$StatisticsPage}}
        </div>
    </body>
</html>
