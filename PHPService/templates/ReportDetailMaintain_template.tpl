<!--POP UP MODAL TO VIEW MEMBER DETAILS AND RESULTS FOR Member Information-->
<form method="post" action="{$FormAction}" name="FormReportDetail" id="FormReportDetail" enctype="multipart/form-data">
    {$Hiddenfield1}{$Hiddenfield2}{$Hiddenfield3}{$Hiddenfield4}{$Hiddenfield5}{$Hiddenfield6}
    <div class="container-fluid" style="width:100%;">
        <div class="row"><br>
            <!---- Member Details ---->
            <div class="col-sm-12">
                <div class="card-box" style="height:100%;">
                    <div class="row">
                        <div class="form-horizontal" role="form">
                            <!---- 第一排 ---->
                            <div class="col-md-4">
                                <!---- 報告編號 ---->
                                <div class="form-group">
                                    <label for="ReportID" class="col-md-3 control-label">報告編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportID" name="ReportID" class="form-control" required
                                            value="{$ReportID}">
                                    </div>
                                </div>
                                <!---- 檢體編號 ---->
                                <div class="form-group">
                                    <label for="SampleNo" class="col-md-3 control-label">檢體編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleNo" name="SampleNo" class="form-control" required
                                            value="{$SampleNo}">
                                    </div>
                                </div>
                                <!---- 病歷編號 ---->
                                <div class="form-group">
                                    <label for="PatientID" class="col-md-3 control-label">病歷編號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="PatientID" name="PatientID" class="form-control" required
                                            value="{$PatientID}">
                                    </div>
                                </div>
                                <!---- 採檢單號 ---->
                                <div class="form-group">
                                    <label for="scID" class="col-md-3 control-label">採檢單號:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="scID" name="scID" class="form-control" required
                                            value="{$scID}">
                                    </div>
                                </div>
                                <!---- 採集日期 ---->
                                <div class="form-group">
                                    <label for="scdate" class="col-md-3 control-label">採集日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="scdate" name="scdate" class="form-control"
                                            required value="{$scdate}">
                                    </div>
                                </div>
                                <!---- 收檢日期 ---->
                                <div class="form-group">
                                    <label for="rcdate" class="col-md-3 control-label">收檢日期:</label>
                                    <div class="col-md-8">
                                        <input type="datetime-local" id="rcdate" name="rcdate" class="form-control"
                                            required value="{$rcdate}">
                                    </div>
                                </div>

                                {if $Permission eq 1 or $Permission eq 2 or $Permission eq 4 or $Permission eq 5 or
                                $Permission eq 9 }
                                <div class="form-group">
                                    <label for="main-menu" class="col-md-3 control-label">報告類型:</label>
                                    <div class="col-md-8">


                                        <select id="ReportTemplate" name="ReportTemplate" class="form-control"
                                            onchange="populateSubmenu(this, document.getElementById('ReportName'))">
                                            <option value="">Select a category</option>
                                            <option value="M1">M1 系列</option>
                                            <option value="M2">M2 系列</option>
                                            <option value="O1">O1 系列</option>
                                            <option value="P1">P1 系列</option>
                                            <option value="P2">P2 系列</option>
                                            <option value="P3">P3 系列</option>
                                            <option value="S1">S1 系列</option>
                                            <option value="S2">S2 系列</option>
                                            <option value="S3">S3 系列</option>
                                            <option value="W1">W1 系列</option>
                                            <option value="W2">W2 系列</option>
                                            <option value="W3">W3 系列</option>
                                            <option value="W4">W4 系列</option>
                                            <option value="W5">W5 系列</option>
                                            <option value="W6">W6 系列</option>
                                            <option value="R9">R9 系列</option>



                                        </select>
                                    </div>
                                </div>
                                {/if}
                                <div class="form-group">

                                    <label for="ReportName" class="col-md-3 control-label">報告名稱:</label>
                                    <div class="col-md-8">

                                        <select id="ReportName" name="ReportName" class="form-control" required>
                                            <option value="{$ReportName}">{$ReportName}</option>
                                        </select>
                                    </div>
                                </div>

                                <!---- 送檢單位 ---->
                                <div class="form-group">
                                    <label for="HospitalList" class="col-md-3 control-label">送檢單位:</label>
                                    <div class="col-md-8">

                                        <!-- {html_options name=HospitalList id=HospitalList options=['' => '請選擇...'] +
                                        $HospitalListOptions
                                        selected=$HospitalListSelect class="form-control" required="required"} -->
                                        <select id="HospitalList" name="HospitalList" class="form-control"
                                            onchange="hospitalSubmenu(this, document.getElementById('CustomerName'))">
                                            <option value="">Select a category</option>
                                            <option value="1" {if $HospitalListSelect==1}selected{/if}>輔大醫院</option>
                                            <option value="2" {if $HospitalListSelect==2}selected{/if}>新光醫院</option>
                                            <option value="3" {if $HospitalListSelect==3}selected{/if}>台北市立聯合醫院</option>
                                            <option value="4" {if $HospitalListSelect==4}selected{/if}>台北慈濟醫院</option>
                                            <option value="5" {if $HospitalListSelect==5}selected{/if}>台北榮民總醫院</option>
                                            <option value="6" {if $HospitalListSelect==6}selected{/if}>恩主公醫院</option>
                                            <option value="7" {if $HospitalListSelect==7}selected{/if}>雙和醫院</option>
                                            <option value="8" {if $HospitalListSelect==8}selected{/if}>國泰醫院</option>
                                            <option value="9" {if $HospitalListSelect==9}selected{/if}>怡仁醫院</option>
                                            <option value="10" {if $HospitalListSelect==10}selected{/if}>淡水馬偕醫院</option>
                                            <option value="11" {if $HospitalListSelect==11}selected{/if}>三軍總醫院_台北內湖
                                            </option>
                                            <option value="12" {if $HospitalListSelect==12}selected{/if}>中山醫院</option>
                                            <option value="13" {if $HospitalListSelect==13}selected{/if}>新家生醫_聯新醫院
                                            </option>
                                            <option value="14" {if $HospitalListSelect==14}selected{/if}>台北市立萬芳醫院
                                            </option>
                                            <option value="15" {if $HospitalListSelect==15}selected{/if}>臺北醫學大學附設醫院
                                            </option>
                                            <option value="16" {if $HospitalListSelect==16}selected{/if}>台中國軍總醫院
                                            </option>
                                            <option value="17" {if $HospitalListSelect==17}selected{/if}>統誠醫療</option>
                                            <option value="18" {if $HospitalListSelect==18}selected{/if}>彰化秀傳醫院</option>
                                            <option value="19" {if $HospitalListSelect==19}selected{/if}>
                                                國立臺灣大學醫學院附設醫院雲林分院</option>
                                            <option value="20" {if $HospitalListSelect==20}selected{/if}>光田綜合醫院</option>
                                            <option value="21" {if $HospitalListSelect==21}selected{/if}>澄清綜合醫院中港分院
                                            </option>
                                            <option value="22" {if $HospitalListSelect==22}selected{/if}>竹山秀傳醫院</option>
                                            <option value="23" {if $HospitalListSelect==23}selected{/if}>烏日林新醫院</option>
                                            <option value="24" {if $HospitalListSelect==24}selected{/if}>彰濱秀傳醫院</option>
                                            <option value="25" {if $HospitalListSelect==25}selected{/if}>大千綜合醫院</option>
                                            <option value="26" {if $HospitalListSelect==26}selected{/if}>員榮醫療社團法人員榮醫院
                                            </option>
                                            <option value="27" {if $HospitalListSelect==27}selected{/if}>彰化基督教醫院
                                            </option>
                                            <option value="28" {if $HospitalListSelect==28}selected{/if}>台中榮民總醫院
                                            </option>
                                            <option value="29" {if $HospitalListSelect==29}selected{/if}>台南市立醫院</option>
                                            <option value="30" {if $HospitalListSelect==30}selected{/if}>麻豆新樓醫院</option>
                                            <option value="31" {if $HospitalListSelect==31}selected{/if}>台南新樓醫院</option>
                                            <option value="32" {if $HospitalListSelect==32}selected{/if}>屏東基督教醫院
                                            </option>
                                            <option value="33" {if $HospitalListSelect==33}selected{/if}>高雄長庚醫院</option>
                                            <option value="34" {if $HospitalListSelect==34}selected{/if}>高雄醫學大學附設醫院
                                            </option>
                                            <option value="35" {if $HospitalListSelect==35}selected{/if}>連江醫院</option>
                                            <option value="36" {if $HospitalListSelect==36}selected{/if}>一般客戶or泓采代採
                                            </option>
                                        </select>


                                    </div>

                                </div>

                                <!---- 檢測單位 ---->
                                <div class="form-group">
                                    <label for="ReportType" class="col-md-3 control-label">檢測單位:</label>
                                    <div class="col-md-8">

                                        {html_options name=ReportType id=ReportType options=['' => '請選擇...'] +
                                        $ReportTypeOptions
                                        selected=$ReportTypeSelect class="form-control" required="required"}

                                    </div>
                                </div>

                                <!---- 報告樣板 ---->
                                {if $Permission eq 1 or $Permission eq 2 or $Permission eq 4 or $Permission eq 5 or
                                $Permission eq 9 }
                                <div class="form-group">
                                    <label for="TemplateID" class="col-md-3 control-label">報告樣板:</label>
                                    <div class="col-md-8">

                                        {html_options name=TemplateID id=TemplateID options=['' => '請選擇...'] +
                                        $TemplateOptions
                                        selected=$TemplateSelect class="form-control" required="required"}
                                    </div>
                                </div>
                                {/if}
                            </div>
                            <!---- 第二排 ---->
                            <div class="col-md-4">
                                <!---- 樣品種類一 ---->
                                <div class="form-group">
                                    <label for="SampleType_1" class="col-md-3 control-label">樣品種類一:</label>
                                    <div class="col-md-8">
                                        <select id="SampleType_1" name="SampleType_1" class="form-control" required onchange="updateUnit()">                                            <option value="">請選擇樣品種類</option>
                                            <option value="EDTA紫頭管-全血" {if $SampleType_1 == "EDTA紫頭管-全血"}selected{/if}>EDTA紫頭管-全血</option>
                                            <option value="Streck cfDNA BCT(迷彩管)-全血" {if $SampleType_1 == "Streck cfDNA BCT(迷彩管)-全血"}selected{/if}>Streck cfDNA BCT(迷彩管)-全血</option>
                                            <option value="Streck RNA Complete BCT(橘頭管)-全血" {if $SampleType_1 == "Streck RNA Complete BCT(橘頭管)-全血"}selected{/if}>Streck RNA Complete BCT(橘頭管)-全血</option>
                                            <option value="5 ㎛ FFPE玻片(不含圈片)" {if $SampleType_1 == "5 ㎛ FFPE玻片(不含圈片)"}selected{/if}>5 ㎛ FFPE玻片(不含圈片)</option>
                                            <option value="10 ㎛ FFPE玻片(不含圈片)" {if $SampleType_1 == "10 ㎛ FFPE玻片(不含圈片)"}selected{/if}>10 ㎛ FFPE玻片(不含圈片)</option>
                                            <option value="染色圈片" {if $SampleType_1 == "染色圈片"}selected{/if}>染色圈片</option>
                                            <option value="粗針穿刺檢體" {if $SampleType_1 == "粗針穿刺檢體"}selected{/if}>粗針穿刺檢體</option>
                                            <option value="gDNA" {if $SampleType_1 == "gDNA"}selected{/if}>gDNA</option>
                                            <option value="口腔拭子-口腔黏膜細胞" {if $SampleType_1 == "口腔拭子-口腔黏膜細胞"}selected{/if}>口腔拭子-口腔黏膜細胞</option>
                                            <option value="生資分析" {if $SampleType_1 == "生資分析"}selected{/if}>生資分析</option>
                                            <option value="細胞懸浮液" {if $SampleType_1 == "細胞懸浮液"}selected{/if}>細胞懸浮液</option>
                                            <option value="其他(請手動輸入樣品種類)" {if $SampleType_1 == "其他(請手動輸入樣品種類)"}selected{/if}>其他(請手動輸入樣品種類)</option>
                                        </select>
                                    </div>
                                </div>
                                <!---- 樣品數量一 ---->
                                <div class="form-group">
                                    <label for="SampleQuantity_1" class="col-md-2 control-label">樣品數量一:</label>
                                    <div class="col-md-8">
                                        <input type="number" id="SampleQuantity_1" name="SampleQuantity_1"
                                            class="form-control" required value="{$SampleQuantity_1}">
                                            <span id="unit">單位</span>

                                    </div>
                                </div>
                                <!---- 樣品單位一 ---->
                                <!-- <div class="form-group">
                                    <label for="SampleQuantity_1" class="col-md-3 control-label">樣品數量:</label>
                                    <div class="col-md-8">
                                        <input type="number" id="SampleQuantity_1" name="SampleQuantity_1" class="form-control" required>
                                        <span id="unit">單位</span>
                                    </div>
                                    
                                </div> -->
                                <!---- 樣品種類二 ---->
                                <div class="form-group">
                                    <label for="SampleType_2" class="col-md-3 control-label">樣品種類二:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleType_2" name="SampleType_2" class="form-control"
                                             value="{$SampleType_2}">
                                    </div>
                                </div>
                                <!---- 樣品數量二 ---->
                                <div class="form-group">
                                    <label for="SampleQuantity_2" class="col-md-3 control-label">樣品數量二:</label>
                                    <div class="col-md-8">
                                        <input type="number" id="SampleQuantity_2" name="SampleQuantity_2"
                                            class="form-control"  value="{$SampleQuantity_2}">
                                    </div>
                                </div>
                                <!---- 樣品單位二 ---->
                                <div class="form-group">
                                    <label for="SampleUnit_2" class="col-md-3 control-label">樣品單位二:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleUnit_2" name="SampleUnit_2" class="form-control"
                                             value="{$SampleUnit_2}">
                                    </div>
                                </div>
                                <!---- 樣品種類三 ---->
                                <div class="form-group">
                                    <label for="SampleType_3" class="col-md-3 control-label">樣品種類三:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleType_3" name="SampleType_3" class="form-control"
                                             value="{$SampleType_3}">
                                    </div>
                                </div>
                                <!---- 樣品數量三 ---->
                                <div class="form-group">
                                    <label for="SampleQuantity_3" class="col-md-3 control-label">樣品數量三:</label>
                                    <div class="col-md-8">
                                        <input type="number" id="SampleQuantity_3" name="SampleQuantity_3"
                                            class="form-control"  value="{$SampleQuantity_3}">
                                    </div>
                                </div>
                                <!---- 樣品單位三 ---->
                                <div class="form-group">
                                    <label for="SampleUnit_3" class="col-md-3 control-label">樣品單位三:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleUnit_3" name="SampleUnit_3" class="form-control"
                                             value="{$SampleUnit_3}">
                                    </div>
                                </div>
                                <!---- 樣品種類四 ---->
                                <div class="form-group">
                                    <label for="SampleType_4" class="col-md-3 control-label">樣品種類四:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleType_4" name="SampleType_4" class="form-control"
                                             value="{$SampleType_4}">
                                    </div>
                                </div>
                                <!---- 樣品數量四 ---->
                                <div class="form-group">
                                    <label for="SampleQuantity_4" class="col-md-3 control-label">樣品數量四:</label>
                                    <div class="col-md-8">
                                        <input type="number" id="SampleQuantity_4" name="SampleQuantity_4"
                                            class="form-control"  value="{$SampleQuantity_4}">
                                    </div>
                                </div>
                                <!---- 樣品單位四 ---->
                                <div class="form-group">
                                    <label for="SampleUnit_4" class="col-md-3 control-label">樣品單位四:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleUnit_4" name="SampleUnit_4" class="form-control"
                                             value="{$SampleUnit_4}">
                                    </div>
                                </div>
                                <!---- 樣品種類五 ---->
                                <div class="form-group">
                                    <label for="SampleType_5" class="col-md-3 control-label">樣品種類五:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleType_5" name="SampleType_5" class="form-control" 
                                            value="{$SampleType_5}">
                                    </div>
                                </div>
                                <!---- 樣品數量五 ---->
                                <div class="form-group">
                                    <label for="SampleQuantity_5" class="col-md-3 control-label">樣品數量五:</label>
                                    <div class="col-md-8">
                                        <input type="number" id="SampleQuantity_5" name="SampleQuantity_5" class="form-control" 
                                            value="{$SampleQuantity_5}">
                                    </div>
                                </div>
                                <!---- 樣品單位五 ---->
                                <div class="form-group">
                                    <label for="SampleUnit_5" class="col-md-3 control-label">樣品單位五:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="SampleUnit_5" name="SampleUnit_5" class="form-control" 
                                            value="{$SampleUnit_5}">
                                    </div>
                                </div>

                            </div>

                            <!---- 第三排 ---->
                            <div class="col-md-4">
                                <!---- 簽收人 ---->
                                <div class="form-group">
                                    <label for="Receiving" class="col-md-3 control-label">簽收人:</label>
                                    <div class="col-md-8">
                                        <select id="Receiving" name="Receiving" class="form-control" required>
                                            <option value="">請選擇簽收人</option>
                                            <option value="王許安" {if $Receiving == "王許安"}selected{/if}>王許安</option>
                                            <option value="林庭萱" {if $Receiving == "林庭萱"}selected{/if}>林庭萱</option>
                                            <option value="黃志凱" {if $Receiving == "黃志凱"}selected{/if}>黃志凱</option>
                                            <option value="陳奕勳" {if $Receiving == "陳奕勳"}selected{/if}>陳奕勳</option>
                                            <option value="張本樺" {if $Receiving == "張本樺"}selected{/if}>張本樺</option>
                                        </select>
                                    </div>
                                </div>
                                <!---- 覆核人員 ---->
                                <div class="form-group">
                                    <label for="Receiving2" class="col-md-3 control-label">覆核人員:</label>
                                    <div class="col-md-8">
                                        <select id="Receiving2" name="Receiving2" class="form-control" required>
                                            <option value="">請選擇覆核人員</option>
                                            <option value="黃志凱" {if $Receiving2 == "黃志凱"}selected{/if}>黃志凱</option>
                                            <option value="陳奕勳" {if $Receiving2 == "陳奕勳"}selected{/if}>陳奕勳</option>
                                            <option value="張本樺" {if $Receiving2 == "張本樺"}selected{/if}>張本樺</option>
                                        </select>
                                    </div>
                                </div>
                                <!---- TAT最終日 ---->
                                <div class="form-group">
                                    <label for="DueDate" class="col-md-3 control-label">TAT最終日:</label>
                                    <div class="col-md-8">
                                        <input type="date" id="DueDate" name="DueDate" class="form-control" required
                                            value="{$DueDate}">
                                    </div>
                                </div>
                                <!---- 客戶名稱 ---->
                                <div class="form-group">
                                    <label for="CustomerName" class="col-md-3 control-label">聯絡人名稱:</label>
                                    <div class="col-md-8">
                                        <!-- <select id="CustomerName" name="CustomerName" class="form-control" required>
                                            <option value="{$CustomerName}">{$CustomerName}</option>
                                        </select> -->
                                        <input type="text" id="CustomerName" name="CustomerName" class="form-control"
                                            required value="{$CustomerName}">
                                    </div>
                                </div>
                                <!---- 客戶郵件 ---->
                                <div class="form-group">
                                    <label for="CustomerEmail" class="col-md-3 control-label">聯絡人信箱:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerEmail" name="CustomerEmail" class="form-control"
                                            required value="{$CustomerEmail}">
                                    </div>
                                </div>
                                <!---- 客戶郵件2 -->
                                <div class="form-group">
                                    <label for="ccemail" class="col-md-3 control-label">信箱(副本):</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ccemail" name="ccemail" class="form-control"
                                            value="{$ccemail}">
                                    </div>
                                </div>

                                <!---- 客戶電話 ---->
                                <div class="form-group">
                                    <label for="CustomerPhone" class="col-md-3 control-label">聯絡電話:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="CustomerPhone" name="CustomerPhone" class="form-control"
                                            required value="{$CustomerPhone}">
                                    </div>
                                </div>
                                <!---- 報告發送狀態 ---->

                                <div class="form-group">
                                    <label for="ReportStatus" class="col-md-3 control-label">報告進度:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="ReportStatus" name="ReportStatus" class="form-control"
                                            value="{$ReportStatus}">
                                    </div>
                                </div>

                                <!---- 報告退回原因，有值才顯示欄位 ---->
                                {if $RejectReason}
                                <div class="form-group">
                                    <label for="RejectReason" class="col-md-3 control-label">報告退回原因:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="RejectReason" name="RejectReason" class="form-control"
                                            value="{$RejectReason}">
                                    </div>
                                </div>
                                {/if}

                                <!-- 發信通知按紐，permission == 2 才顯示按紐 -->
                                <!-- {if $Permission eq 2}
                                <div class="form-group text-center">
                                    <form method="post" action="{$FormEmail}" name="FormSendEmail" id="FormSendEmail">
                                        <input type="hidden" id="ReportID" name="ReportID" value="{$ReportID}">
                                        <input type="hidden" id="CustomerEmail" name="CustomerEmail"
                                            value="{$CustomerEmail}">   
                                        <input type="hidden" id="ccemail" name="ccemail" value="{$ccemail}">
                                        <button type="submit" class="btn btn-primary btn-md" id="BtnSendEmail"
                                            style="font-weight:bold;font-size:20px;margin:30px;">
                                            <i class="fa fa-envelope"></i> 發送通知</button>
        
                                {/if}
                                -- 上傳報告 -- -->
                                <div class="form-group" id="DisplayUploadButton">
                                    <center>
                                        {if $Permission eq 1 or $Permission eq 9 }

                                        <label type="button" class="btn btn-primary btn-block"
                                            style="font-weight:bold;font-size:20px;width:40%;;margin:30px;">
                                            <input id="ReportUploadPDF" name="ReportUploadPDF" style="display:none;"
                                                type="file" accept="application/pdf" />
                                            <i class="fa fa-file-pdf"></i> 上傳報告結果
                                        </label>

                                        {else}

                                        <label type="button" class="btn btn-primary btn-block"
                                            style="font-weight:bold;font-size:20px;width:40%;;margin:30px;">
                                            <input id="ReportApply" name="ReportApply" style="display:none;" type="file"
                                                accept="application/pdf" />
                                            <i class="fa fa-file-pdf"></i> 上傳申請單
                                        </label>
                                        {/if}
                                        <!-- <label type="button" class="btn btn-primary btn-block"
                                            style="font-weight:bold;font-size:20px;width:40%;;margin:30px;">
                                            <input id="ReportUploadLogoPDF" name="ReportUploadLogoPDF"
                                                style="display:none;" type="file" accept="application/pdf" />
                                            <i class="fa fa-file-pdf"></i> 上傳院所版本
                                        </label> -->


                                        <!-- <input type="file" id="Apply" name="Apply" /> -->

                                    </center>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!---- button area ---->
                    <div>
                        <div id="ds1" align="center">
                            <p id="Message">
                            <div class="alert alert-danger alert-container" id="alert" {$ShowErrorMessage}>
                                <strong>
                                    <center>
                                        <h1>{$ErrorMessage}</h1>
                                    </center>
                                </strong>
                            </div>
                            </p>
                            <p id="ReportViewButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportViewExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>

                            </p>
                            {if $Permission == 1}
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEditPDF"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修 改</button>

                            </p>
                            {elseif $Permission == 2}
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEdit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修 改</button>

                            </p>
                            {elseif $Permission == 4 or $Permission == 5 or $Permission == 9}
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEdit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修 改</button>
                            </p>
                            {elseif $Permission == 6}
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportDelete"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-trash"></i> 刪 除</button>
                            </p>
                            {elseif $Permission == 3}
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                            </p>


                            <!-- {elseif $Permission == 4}
                            <p id="ReportQueryButton">
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportExit"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-eject"></i> 離 開</button>
                                <button type="button" class="btn btn-danger btn-md" id="BtnReportEditccemail"
                                    style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-edit"></i> 修改郵件</button> -->

                            {/if}
                            <!--SUBMIT BUTTON IS CONNECTED TO HOME.PHP-->
                            <p id="ReportConfirmButton">
                                <button type="button" class="btn btn-custom btn-danger btn-md" id=BtnReportCancel
                                    name=BtnReportCancel style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-window-close"></i> 取 消</button>
                                <button type="submit" class="btn btn-custom btn-success btn-md" id=BtnReportSubmit
                                    name=BtnReportSubmit style="font-weight:bold;font-size:20px;margin:30px;">
                                    <i class="fa fa-paper-plane"></i> 確 認</button>
                            </p>
                        </div>
                    </div>
                    <!---- PDF Preview ---->
                    <div class="row" id="PDFArea">
                        <div class="form-horizontal" role="form">

                            <div class="col-md-12">
                                <embed id='PDFPreview' name='PDFPreview' src='{$PDFPreview}' type='application/pdf'
                                    width='100%' height='1000px' />
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <!---- Apply Preview -->
                    <div class="row" id="ApplyArea">
                        <div class="form-horizontal" role="form">
                            <div class="col-md-12">
                                <embed id='ApplyFile' name='ApplyFile' src='{$ApplyFile}' type='application/pdf'
                                    width='100%' height='1000px' />
                            </div>
                        </div>
                    </div>
                    <!-- pdf-output -->
                    <div class="row" id="pdf-output">
                        <div class="form-horizontal" role="form">
                            <div class="col-md-12" style="text-align: center;">
                                {$output}
                            </div>
                        </div>

                        <br>
                        <br>
                        <!---- LooPDF Preview -->
                        <!-- <div class="row" id="LogoPDFArea">
                        <div class="form-horizontal" role="form">
                            <div class="col-md-12">
                                <embed id='LogoFile' name='LogoFile' src='{$LogoFile}' type='application/pdf'
                                    width='100%' height='1000px' />
                            </div>
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
        </div>
</form>
<script>
    function populateSubmenu(mainMenu, subMenu) {
        var subMenuData = {
            "M1": [
                "M101-01 Pathogen Fast Identification (DNA)",
                "M102-01 Pathogen Fast Identification (RNA)",
                "M103-01 Pathogen Fast Identification"
            ],
            "M2": [
                "M201-01 Mycoplasma (General)",
                "M202-01 Mycoplasma (Express)"
            ],
            "O1": [
                "O101-01 Circulating Tumor Cell (CTC) Assay Report"
            ],
            "P1": [
                "P101-01 Lihpao Multi-cancer Target Drug Panel",
                "P101-02 Lihpao Comprehensive CDx-30 Genes (FFPE)",
                "P101-03 Lihpao Multi-cancer Target Drug Genetic Testing",
                "P102-01 Lihpao CRC Target Drug Panel",
                "P102-02 Lihpao CRC Target Drug Genetic Testing",
                "P103-01 Lihpao NSCLC Target Drug Panel",
                "P103-02 Lihpao NSCLC Target Drug Genetic Testing",
                "P104-01 Lihpao BRCA1/2 Germline Panel",
                "P104-02 Lihpao Germline BRCA1/2 Genetic Testing",
                "P105-01 Lihpao Multi-cancer Target Drug RNA Panel",
                "P105-02 Lihpao Multi-Cacner Target Drug RNA Genetic Testing",
                "P106-01 Lihpao Lung Fusion Target Drug Panel",
                "P107-01 Lihpao Lung Cancer Comprehensive Target Drug Panel",
                "P108-01 Next-generation sequencing for Breast cancer",
                "P109-01 Next-generation sequencing for Colon cancer",
                "P110-01 CDx DNA Genetic Testing_HS",
                "P111-01 CDx DNA Genetic Testing_S5",
                "P111-02 Tumor DNA Genetic Testing",
                "P112-01 CDx RNA Genetic Testing_HS",
                "P113-01 CDx RNA Genetic Testing_S5",
                "P113-02 Tumor RNA Genetic Testing",
                "P115-01 Lihpao Multi-cancer Target Drug Panel_HS",
                "P116-01 Lihpao CRC Target Drug Panel_HS",
                "P117-01 Lihpao NSCLC Target Drug Panel_HS",
                "P118-01 Lihpao Multi-cancer Target Drug Panel (Comprehensive Version)"
            ],
            "P2": [
                "P201-01 BRCA1/2 of Somatic Genetic Testing",
                "P202-01 ARVC Panel",
                "P203-01 HCM Panel",
                "P204-01 NOTCH3 EGFr Domain, Exon 2-24"
            ],
            "P3": [
                "P301-01 BRCA1/2 of Somatic and Germline Genetic Testing"
            ],
            "S1": [
                "S101-01 EGFR 29 Mutations Detection",
                "S102-01 KRAS Mutation Detection",
                "S103-01 BRAF V600 Mutations Detection"
            ],
            "S2": [
                "S201-01 APOE Genotyping",
                "S202-01 Metabolism Trio Genetic Testing",
                "S203-01 CYP1A2 Genotyping",
                "S204-01 ADH1B Genotyping",
                "S205-01 ALDH2 Genotyping",
                "S206-01 NOTCH3 R544C Genotyping",
                "S208-01 CYP2C19 *2/*3 Genotyping"
            ],
            "S3": [
                "S301-01 Sanger Sequencing",
                "S302-01 NOTCH3 R544C Genotyping",
                "S303-01 CYP2C19 *2/*3 Genotyping",
                "S304-01 DPD Deficiency Genetic Testing",
                "S305-01 BDNF rs6265 Genotyping",
                "S306-01 PKD genetic testing genetic testing (Hotspot)",
                "S307-01 TGFBI (Hotspots) Genetic Testing"
            ],
            "W1": [
                "W100-01 Hereditary Cancer Genetic Testing",
                "W101-01 Prostate Cancer Germline Genetic Testing"
            ],
            "W2": [
                "W200-01 Cardiovascular Disease Genetic Testing",
                "W201-01 ARVC Genetic Testing",
                "W202-01 HCM Genetic Testing",
                "W203-01 DCM Genetic Testing",
                "W204-01 TAAD Genetic Testing",
                "W205-01 ATS Genetic Testing",
                "W206-01 DMVD Genetic Testing",
                "W207-01 Familial Hypercholesterolemia Genetic Testing",
                "W208-01 Marfan Syndrome Genetic Testing",
                "W209-01 Arrhythmia Genetic Testing",
                "W210-01 Brugada Syndrome Genetic Testing",
                "W211-01 Catecholaminergic Polymorphic Ventricular Tachycardia Genetic Testing",
                "W212-01 Long QT Syndrome Genetic Testing",
                "W213-01 Short QT Syndrome Genetic Testing",
                "W214-01 ARVC Genetic Testing",
                "W215-01 HCM Genetic Testing",
                "W216-01 Familial hypercholesterolemia genetic testing",
                "W217-01 Aortopathy genetic testing",
                "W218-01 SADS genetic testing",
                "W219-01 Cardiovascular disease genetic testing"
            ],
            "W3": [
                "W300-01 Neurological Disease Genetic Testing",
                "W301-01 Cerebral Small Vessel Disease Genetic Testing",
                "W302-01 Parkinsonism Genetic Testing",
                "W303-01 Hereditary Spastic Paraplegia Genetic Testing",
                "W304-01 Dystonia Genetic Testing",
                "W305-01 Cognitive Disorder Genetic Testing",
                "W306-01 Wilson's disease Genetic Testing",
                "W307-01 Neurofibromatosis Genetic Testing",
                "W308-01 Ataxia Genetic Testing",
                "W309-01 Tuberous Sclerosis Genetic Testing",
                "W310-01 Amyotrophic Lateral Sclerosis Genetic Testing",
                "W311-01 Leukodystrophy Genetic Testing",
                "W312-01 Von-Hippel-Lindau Disease Genetic Testing",
                "W313-01 Charcot-Marie-Tooth Disease Genetic Testing",
                "W314-01 Cerebral Autosomal Dominant Arteriopathy with Subcortical Infarcts and Leukoencephalopathy Genetic Testing",
                "W314-02 CADASIL Genetic Testing",
                "W315-01 Lysosomal Storage Disease Genetic Testing",
                "W316-01 Tourette's Syndrome Genetic Testing",
                "W317-01 MELAS Syndrome Genetic Testing",
                "W318-01 Multiple System Atrophy Genetic Testing",
                "W319-01 Primary Lateral Sclerosis Genetic Testing",
                "W320-01 Familial Amyloid Polyneuropathy Genetic Testing",
                "W321-01 Epilepsy Genetic Testing",
                "W322-01 Common Neurological Disease Genetic Testing",
                "W323-01 Inherited Stroke Genetic Testing"
            ],
            "W4": [
                "W401-01 Genetic Carrier Screening v1.0",
                "W402-01 Genetic Carrier Screening v2.0",
                "W403-01 Genetic Carrier Screening v3.0"
            ],
            "W5": [
                "W501-01 Healthy Weight Genetic Testing",
                "W502-01 Healthy Weight Genetic Testing for Monogenic Disorders",
                "W503-01 Skin Care Genetic Testing",
                "W504-01 Skin Immunity Genetic Testing",
                "W505-01 Bone Health Genetic Testing (Female)",
                "W506-01 Bone Health Genetic Testing (Male)",
                "W507-01 Alcohol Metabolism Genetic Testing",
                "W508-01 Height Potential Genetic Testing",
                "W509-01 Personality Genetic Testing",
                "W510-01 Athletic Performance Genetic Testing",
                "W511-01 Uterine Care Genetic Testing",
                "W512-01 Genetic Predisposition Testing for Type 2 Diabetes",
                "W513-01 Eye Health Genetic Testing",
                "W514-01 Eye Health Genetic Testing for Monogenic Disorders",
                "W515-01 Hair Care Genetic Testing (Female)",
                "W516-01 Hair Care Genetic Testing (Male)",
                "W517-01 Sleep Care Genetic Testing (Female)",
                "W518-01 Sleep Care Genetic Testing (Male)",
                "W519-01 Genetic Predisposition Testing for Precocious Puberty (Female)",
                "W520-01 Genetic Predisposition Testing for Precocious Puberty (Male)",
                "W521-01 Cerebrovascular Health Genetic Testing (Female)",
                "W522-01 Cerebrovascular Health Genetic Testing (Male)",
                "W523-01 Cerebrovascular Health Genetic Testing for Monogenic Disorders",
                "W524-01 Genetic Predisposition Testing for Chronic Kidney Disease",
                "W525-01 Genetic Predisposition Testing for Urolithiasis and Nephrolithiasis",
                "W526-01 Genetic Predisposition Testing for Gastroesophageal Reflux Disease",
                "W527-01 Genetic Predisposition Testing for Longevity (Female)",
                "W527-02 Longevity Genetic Testing (Female)",
                "W528-01 Genetic Predisposition Testing for Longevity (Male)",
                "W528-02 Longevity Genetic Testing (Male)",
                "W529-01 Chest Care Genetic Testing",
                "W530-01 Caffeine Metabolism Genetic Testing",
                "W531-01 Cholesterol Metabolism Genetic Testing",
                "W532-01 Liver Health Genetic Testing"
            ],
            "W6": [
                "W601-01 Glaucoma Genetic Testing",
                "W602-01 Macular Degeneration Genetic Testing"
            ],
            "R9": [
                "R9 客製化報告"
            ]
        };

        var selectedCategory = mainMenu.value;
        var options = subMenuData[selectedCategory] || [];

        subMenu.innerHTML = '';

        options.forEach(function (option) {
            var opt = document.createElement('option');
            opt.value = option;
            opt.innerHTML = option;
            subMenu.appendChild(opt);
        });
    }

    // function hospitalSubmenu(hospitalMenu, subhospitalMenu) {
    //     var hospitalData = {
    //         "1": ["王智鴻"],
    //         "2": ["連立明", "林冠佑", "蔣介雅", "張名鑫", "許維志", "張安娜", "陳威宏"],
    //         "3": ["朱素娟"],
    //         "4": ["劉修勳", "許博荏"],
    //         "5": ["莊茜"],
    //         "6": ["孫瑜", "劉長袖", "鍾季廷", "呂建榮"],
    //         "7": ["王韻筑", "黃立楷", "黃媚莉", "陳嘉泓", "鄭芸詠"],
    //         "8": ["洪琨景"],
    //         "9": [""],
    //         "10": ["傅維仁", "黃勇評"],
    //         "11": ["宋岳峰", "周中興", "劉懿", "葉大全", "徐昌鴻"],
    //         "12": ["呂彥瑢"],
    //         "13": ["葉怡君"],
    //         "14": ["陳鴻儒", "宋家瑩"],
    //         "15": ["胡昭榮"],
    //         "16": ["馬松蔚", "王雪君"],
    //         "17": [""],
    //         "18": ["美玲"],
    //         "19": [""],
    //         "20": ["趙育萱"],
    //         "21": ["孫敏珠"],
    //         "22": ["黃忠諺"],
    //         "23": [""],
    //         "24": ["魏誠佑"],
    //         "25": [""],
    //         "26": ["涂川洲"],
    //         "27": ["陳彥中", "巫錫霖"],
    //         "28": ["傅雲慶"],
    //         "29": ["王淑貞"],
    //         "30": ["林士君"],
    //         "31": ["蔡耀隆"],
    //         "32": ["陳詩怡"],
    //         "33": ["蔡孟翰"],
    //         "34": ["劉怡慶", "徐仲豪"],
    //         "35": ["陳鴻斌"],
    //         "36": ["泓采診所"]


    //     };
    //     var selectedCategory = hospitalMenu.value;
    //     var options = hospitalData[selectedCategory] || [];

    //     subhospitalMenu.innerHTML = '';

    //     options.forEach(function (option) {
    //         var opt = document.createElement('option');
    //         opt.value = option;
    //         opt.innerHTML = option;
    //         subhospitalMenu.appendChild(opt);
    //     });

    // }


</script>
<script>
    // Define the contacts for each hospital
    const hospitalContacts = {
        "1": ["王智鴻"],
        "2": ["連立明", "林冠佑", "蔣介雅", "張名鑫", "許維志", "張安娜", "陳威宏"],
        "3": ["朱素娟"],
        "4": ["劉修勳", "許博荏"],
        "5": ["莊茜"],
        "6": ["孫瑜", "劉長袖", "鍾季廷", "呂建榮"],
        "7": ["王韻筑", "黃立楷", "黃媚莉", "陳嘉泓", "鄭芸詠"],
        "8": ["洪琨景"],
        "9": [""],
        "10": ["傅維仁", "黃勇評"],
        "11": ["宋岳峰", "周中興", "劉懿", "葉大全", "徐昌鴻"],
        "12": ["呂彥瑢"],
        "13": ["葉怡君"],
        "14": ["陳鴻儒", "宋家瑩"],
        "15": ["胡昭榮"],
        "16": ["馬松蔚", "王雪君"],
        "17": [""],
        "18": ["美玲"],
        "19": [""],
        "20": ["趙育萱"],
        "21": ["孫敏珠"],
        "22": ["黃忠諺"],
        "23": [""],
        "24": ["魏誠佑"],
        "25": [""],
        "26": ["涂川洲"],
        "27": ["陳彥中", "巫錫霖"],
        "28": ["傅雲慶"],
        "29": ["王淑貞"],
        "30": ["林士君"],
        "31": ["蔡耀隆"],
        "32": ["陳詩怡"],
        "33": ["蔡孟翰"],
        "34": ["劉怡慶", "徐仲豪"],
        "35": ["陳鴻斌"],
        "36": ["泓采診所"]
    };

    // Get references to the select elements
    const hospitalSelect = document.getElementById('HospitalList');
    const contactSelect = document.getElementById('CustomerName');

    // Add an event listener to the hospital select element
    hospitalSelect.addEventListener('change', function () {
        // Get the selected hospital
        const selectedHospital = this.value;

        // Clear the current options in the contact select element
        contactSelect.innerHTML = '';

        // Populate the contact select element with the new options
        if (hospitalContacts[selectedHospital]) {
            hospitalContacts[selectedHospital].forEach(function (contact) {
                const option = document.createElement('option');
                option.value = contact;
                option.text = contact;
                contactSelect.appendChild(option);
            });
        }
    });

    // Optionally, trigger the change event to populate the contacts on page load
    hospitalSelect.dispatchEvent(new Event('change'));
</script>
<script>
    function updateUnit() {
        var sampleType = document.getElementById('SampleType_1').value;
        var unitSpan = document.getElementById('unit');
        
        if (sampleType === "EDTA紫頭管-全血" || 
            sampleType === "Streck cfDNA BCT(迷彩管)-全血" || 
            sampleType === "Streck RNA Complete BCT(橘頭管)-全血") {
            unitSpan.textContent = "毫升";
        } else if (sampleType === "5 ㎛ FFPE玻片(不含圈片)" || 
                   sampleType === "10 ㎛ FFPE玻片(不含圈片)" || 
                   sampleType === "染色圈片" || 
                   sampleType === "粗針穿刺檢體") {
            unitSpan.textContent = "片";
        } else if (sampleType === "gDNA" || 
                   sampleType === "口腔拭子-口腔黏膜細胞") {
            unitSpan.textContent = "管";
        } else {
            unitSpan.textContent = "單位";
        }
    }
</script>
<!---------------------------End----------------------------->